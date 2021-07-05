<?php

GFForms::include_payment_addon_framework();

class GFMONDCA extends GFPaymentAddOn {

	protected $_version = GF_MONDCA_VERSION;
	protected $_min_gravityforms_version = '1.9.12';
	protected $_slug = 'gravityforms-mondca';
	protected $_path = 'gravityforms-mondca/mondca.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Moneris Direct CA Add-On';
	protected $_short_title = 'Moneris Direct CA';
	protected $_requires_credit_card = true;
	protected $_supports_callbacks = false;

	// Members plugin integration
	protected $_capabilities = array(
		'gravityforms_mondca',
		'gravityforms_mondca_uninstall',
		'gravityforms_mondca_plugin_page'
	);

	// Permissions
	protected $_capabilities_settings_page = 'gravityforms_mondca';
	protected $_capabilities_form_settings = 'gravityforms_mondca';
	protected $_capabilities_uninstall = 'gravityforms_mondca_uninstall';
	protected $_capabilities_plugin_page = 'gravityforms_mondca_plugin_page';

	/**
	 * @var array $_args_for_deprecated_hooks Will hold a few arrays which are needed by some deprecated hooks, keeping them out of the $authorization array so that potentially sensitive data won't be exposed in logging statements.
	 */
	private $_args_for_deprecated_hooks = array();

	private static $_instance = null;

	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new GFMONDCA();
		}

		return self::$_instance;
	}

	//----- SETTINGS PAGES ----------//
	public function plugin_settings_fields() {
		$description = '<p style="text-align: left;">' . sprintf( esc_html__( 'Moneris Direct CA is a payment gateway for merchants. Use Gravity Forms to collect payment information and process it through your Moneris Direct CA account. If you don\'t have a account, you can %ssign up for one here%s', 'gravityforms-mondca' ), '<a href="http://www.moneris.com" target="_blank">', '</a>' ) . '</p>';

		return array(
			array(
				'title'       => esc_html__( 'Account Information', 'gravityforms-mondca' ),
				'description' => $description,
				'fields'      => array(
					array(
						'name'          => 'mode',
						'label'         => esc_html__( 'Mode', 'gravityforms-mondca' ),
						'type'          => 'radio',
						'default_value' => 'test',
						'choices'       => array(
							array(
								'label' => esc_html__( 'Production', 'gravityforms-mondca' ),
								'value' => 'production',
							),
							array(
								'label' => esc_html__( 'Test', 'gravityforms-mondca' ),
								'value' => 'test',
							),
						),
						'horizontal'    => true,
					),
					array(
						'name'              => 'store_id',
						'label'             => esc_html__( 'Store ID', 'gravityforms-mondca' ),
						'type'              => 'text',
						'class'             => 'medium',
						'default_value'			=> '',
					),
					array(
						'name'              => 'api_token',
						'label'             => esc_html__( 'API Token', 'gravityforms-mondca' ),
						'type'              => 'text',
						'class'             => 'medium',
						'default_value' 		=> '',
					),
					array(
						'name'          => 'transaction',
						'label'         => esc_html__( 'Transaction', 'gravityforms-mondca' ),
						'type'          => 'radio',
						'default_value' => 'purchase',
						'choices'       => array(
							array(
								'label' => esc_html__( 'Purchase', 'gravityforms-mondca' ),
								'value' => 'purchase',
							),
							array(
								'label' => esc_html__( 'Pre-Authorization', 'gravityforms-mondca' ),
								'value' => 'preauth',
							),
						),
						'horizontal'    => true,
					),
				),
			),
		);
	}

	public function settings_store_id( $field, $echo = true ) {

		$store_id_field = $this->settings_text( $field, false );

		$caption = sprintf( esc_html__( 'This is the Username you use to login to your Merchant Account with Moneris Canada', 'gravityforms-mondca' ), '<strong>', '</strong>' );

		if ( $echo ) {
			echo $store_id_field . '</br><small>' . $caption . '</small>';
		}

		return $store_id_field . '</br><small>' . $caption . '</small>';

	}

	public function settings_api_token( $field, $echo = true ) {

		$api_token_field = $this->settings_text( $field, false );

		$caption = sprintf( esc_html__( 'This is the api_token you use to login to your Merchant Account with Moneris Canada.', 'gravityforms-mondca' ), '<strong>', '</strong>' );

		if ( $echo ) {
			echo $api_token_field . '</br><small>' . $caption . '</small>';
		}

		return $api_token_field . '</br><small>' . $caption . '</small>';

	}

	public function is_valid_plugin_key() {
		return $this->is_valid_key();
	}

	public function is_valid_custom_key() {
		//get override settings
		$apiSettingsEnabled = $this->get_setting( 'apiSettingsEnabled' );
		if ( $apiSettingsEnabled ) {
			$custom_settings['overrideStoreID'] = $this->get_setting( 'overrideStoreID' );
			$custom_settings['overrideAPIToken']   = $this->get_setting( 'overrideAPIToken' );
			$custom_settings['overrideMode']   = $this->get_setting( 'overrideMode' );
			$custom_settings['overrideTransaction']   = $this->get_setting( 'overrideTransaction' );

			return $this->is_valid_key( $custom_settings );
		}

		return false;
	}

	public function is_valid_key( $settings = array() ) {
		$api_settings = $this->get_aim( $settings );

		if ( empty($api_settings['store_id']) || empty($api_settings['api_token']) || empty($api_settings['mode']) || empty($api_settings['transaction']) ) {
			$this->log_debug( __METHOD__ . '(): Please make sure you have entered the correct settings.' );

			return false;
		} else {
			return true;
		}
	}

	private function get_aim( $local_api_settings = array() ) {

		if ( ! empty( $local_api_settings ) ) {
			$api_settings = array(
				'store_id'  => rgar( $local_api_settings, 'overrideStoreID' ),
				'mode'      => rgar( $local_api_settings, 'overrideMode' ),
				'api_token' => rgar( $local_api_settings, 'overrideAPIToken' ),
				'transaction' => rgar( $local_api_settings, 'overrideTransaction' )
			);
		} else {
			$api_settings = $this->get_api_settings( $local_api_settings );
		}

		return $api_settings;
	}

	private function get_api_settings( $local_api_settings ) {

		//for Moneris Direct CA, each feed can have its own login id and transaction key specified which overrides the master plugin one
		//use the custom settings if found, otherwise use the master plugin settings

		$apiSettingsEnabled = $this->current_feed['meta']['apiSettingsEnabled'];

		if ( $apiSettingsEnabled ) {

			$store_id  = $this->current_feed['meta']['overrideStoreID'];
			$api_token = $this->current_feed['meta']['overrideAPIToken'];
			$mode = $this->current_feed['meta']['overrideMode'];
			$transaction = $this->current_feed['meta']['overrideTransaction'];

			return array( 'store_id' => $store_id, 'api_token' => $api_token, 'mode' => $mode, 'transaction' => $transaction );

		} else {
			$settings = $this->get_plugin_settings();

			return array(
				'store_id'  => rgar( $settings, 'store_id' ),
				'api_token' => rgar( $settings, 'api_token' ),
				'mode' => rgar( $settings, 'mode' ),
				'transaction' => rgar( $settings, 'transaction' )
			);
		}

	}

	//-------- Form Settings ---------

	/**
	 * Prevent feeds being listed or created if the api keys aren't valid.
	 *
	 * @return bool
	 */
	public function can_create_feed() {
		return $this->is_valid_plugin_key();
	}

	public function feed_settings_fields() {
		$default_settings = parent::feed_settings_fields();

		$transaction_type = parent::get_field( 'transactionType', $default_settings );
		$choices          = $transaction_type['choices'];
		$add_donation     = true;
		unset($transaction_type[2]);
		unset($choices[2]);
		foreach ( $choices as $choice ) {
			//add donation option if it does not already exist
			if ( $choice['value'] == 'donation' ) {
				$add_donation = false;
			}
		}
		if ( $add_donation ) {
			//add donation transaction type
			$choices[] = array( 'label' => __( 'Donations', 'gravityforms-mondca' ), 'value' => 'donation' );
		}
		$transaction_type['choices'] = $choices;
		$default_settings            = $this->replace_field( 'transactionType', $transaction_type, $default_settings );

		//remove default options before adding custom
		$default_settings = parent::remove_field( 'options', $default_settings );

		$fields = array(
			array(
				'name'    => 'options',
				'label'   => esc_html__( 'Options', 'gravityforms-mondca' ),
				'type'    => 'options',
				'tooltip' => '<h6>' . esc_html__( 'Options', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Turn on or off the available Moneris Direct CA checkout options.', 'gravityforms-mondca' ),
			),
		);

		//Add post fields if form has a post
		$form = $this->get_current_form();

		$default_settings = $this->add_field_after( 'billingInformation', $fields, $default_settings );

		$fields = array(
			array(
				'name'     => 'apiSettingsEnabled',
				'label'    => esc_html__( 'API Settings', 'gravityforms-mondca' ),
				'type'     => 'checkbox',
				'tooltip'  => '<h6>' . esc_html__( 'API Settings', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Override the settings provided on the Moneris Direct CA Settings page and use these instead for this feed.', 'gravityforms-mondca' ),
				'onchange' => "if(jQuery(this).prop('checked')){
										jQuery('#gaddon-setting-row-overrideMode').show();
										jQuery('#gaddon-setting-row-overrideStoreID').show();
										jQuery('#gaddon-setting-row-overrideAPIToken').show();
										jQuery('#gaddon-setting-row-overrideTransaction').show();
									} else {
										jQuery('#gaddon-setting-row-overrideMode').hide();
										jQuery('#gaddon-setting-row-overrideStoreID').hide();
										jQuery('#gaddon-setting-row-overrideAPIToken').hide();
										jQuery('#gaddon-setting-row-overrideTransaction').hide();
										jQuery('#overrideMode').val('');
										jQuery('#overrideStoreID').val('');
										jQuery('#overrideAPIToken').val('');
										jQuery('#overrideTransaction').val('');
										jQuery('i').removeClass('icon-check fa-check');
									}",
				'choices'  => array(
					array(
						'label' => 'Override Default Settings',
						'name'  => 'apiSettingsEnabled',
					),
				)
			),
			array(
				'name'          => 'overrideMode',
				'label'         => esc_html__( 'Mode', 'gravityforms-mondca' ),
				'type'          => 'radio',
				'default_value' => 'test',
				'hidden'        => ! $this->get_setting( 'apiSettingsEnabled' ),
				'tooltip'       => '<h6>' . esc_html__( 'Mode', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Select either Production or Test mode to override the chosen mode on the Moneris Direct CA Settings page.', 'gravityforms-mondca' ),
				'choices'       => array(
					array(
						'label' => esc_html__( 'Production', 'gravityforms-mondca' ),
						'value' => 'production',
					),
					array(
						'label' => esc_html__( 'Test', 'gravityforms-mondca' ),
						'value' => 'test',
					),
				),
				'horizontal'    => true,
			),
			array(
				'name'              => 'overrideStoreID',
				'label'             => esc_html__( 'Store ID', 'gravityforms-mondca' ),
				'type'              => 'text',
				'class'             => 'medium',
				'hidden'            => ! $this->get_setting( 'apiSettingsEnabled' ),
				'tooltip'           => '<h6>' . esc_html__( 'Store ID', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Enter a new value to override the Store ID on the Moneris Direct CA Settings page.', 'gravityforms-mondca' ),
			),
			array(
				'name'              => 'overrideAPIToken',
				'label'             => esc_html__( 'API Token', 'gravityforms-mondca' ),
				'type'              => 'text',
				'class'             => 'medium',
				'hidden'            => ! $this->get_setting( 'apiSettingsEnabled' ),
				'tooltip'           => '<h6>' . esc_html__( 'API Token', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Enter a new value to override the API Token on the Moneris Direct CA Settings page.', 'gravityforms-mondca' ),
			),
			array(
				'name'          => 'overrideTransaction',
				'label'         => esc_html__( 'Transaction', 'gravityforms-mondca' ),
				'type'          => 'radio',
				'default_value' => 'purchase',
				'hidden'        => ! $this->get_setting( 'apiSettingsEnabled' ),
				'tooltip'       => '<h6>' . esc_html__( 'Mode', 'gravityforms-mondca' ) . '</h6>' . esc_html__( 'Select either Purchase or Pre-Authorization mode to override the chosen mode on the Moneris Direct CA Settings page.', 'gravityforms-mondca' ),
				'choices'       => array(
					array(
						'label' => esc_html__( 'Purchase', 'gravityforms-mondca' ),
						'value' => 'purchase',
					),
					array(
						'label' => esc_html__( 'Pre-Authorization', 'gravityforms-mondca' ),
						'value' => 'preauth',
					),
				),
				'horizontal'    => true,
			),
		);

		$default_settings = $this->add_field_after( 'conditionalLogic', $fields, $default_settings );

		return $default_settings;
	}

	public function settings_options( $field, $echo = true ) {
		$checkboxes = array(
			'name'    => 'options_checkboxes',
			'type'    => 'checkboxes',
			'choices' => array(
				array(
					'label' => esc_html__( 'Send Moneris Direct CA email receipt.', 'gravityforms-mondca' ),
					'name'  => 'enableReceipt'
				),
			)
		);

		$html = $this->settings_checkbox( $checkboxes, false );

		if ( $echo ) {
			echo $html;
		}

		return $html;
	}

	public function checkbox_input_change_post_status( $choice, $attributes, $value, $tooltip ) {
		$markup = $this->checkbox_input( $choice, $attributes, $value, $tooltip );

		$dropdown_field = array(
			'name'     => 'update_post_action',
			'choices'  => array(
				array( 'label' => '' ),
				array( 'label' => esc_html__( 'Mark Post as Draft', 'gravityforms-mondca' ), 'value' => 'draft' ),
				array( 'label' => esc_html__( 'Delete Post', 'gravityforms-mondca' ), 'value' => 'delete' ),

			),
			'onChange' => "var checked = jQuery(this).val() ? 'checked' : false; jQuery('#change_post_status').attr('checked', checked);",
		);
		$markup .= '&nbsp;&nbsp;' . $this->settings_select( $dropdown_field, false );

		return $markup;
	}

	public function supported_billing_intervals() {
		//authorize.net does not use years or weeks, override framework function
		$billing_cycles = array(
			'day'   => array( 'label' => esc_html__( 'day(s)', 'gravityforms-mondca' ), 'min' => 7, 'max' => 365 ),
			'month' => array( 'label' => esc_html__( 'month(s)', 'gravityforms-mondca' ), 'min' => 1, 'max' => 12 )
		);

		return $billing_cycles;
	}

	/**
	 * Append the phone field to the default billing_info_fields added by the framework.
	 *
	 * @return array
	 */
	public function billing_info_fields() {

		$fields = parent::billing_info_fields();

		$fields[] = array(
				'name'     => 'phone',
				'label'    => esc_html__( 'Phone', 'gravityforms-mondca' ),
				'required' => false
		);

		return $fields;
	}

	/**
	 * Add supported notification events.
	 *
	 * @param array $form The form currently being processed.
	 *
	 * @return array
	 */
	public function supported_notification_events( $form ) {
		if ( ! $this->has_feed( $form['id'] ) ) {
			return false;
		}

		return array(
				'complete_payment'          => esc_html__( 'Payment Completed', 'gravityforms-mondca' ),
		);
	}

	public function convert_interval( $interval, $to_type ) {
		//convert single character into long text for new feed settings or convert long text into single character for sending to paypal
		//$to_type: text (change character to long text), OR char (change long text to character)
		if ( empty( $interval ) ) {
			return '';
		}

		$new_interval = '';
		if ( $to_type == 'text' ) {
			//convert single char to text
			switch ( strtoupper( $interval ) ) {
				case 'D' :
					$new_interval = 'day';
					break;
				case 'W' :
					$new_interval = 'week';
					break;
				case 'M' :
					$new_interval = 'month';
					break;
				case 'Y' :
					$new_interval = 'year';
					break;
				default :
					$new_interval = $interval;
					break;
			}
		} else {
			//convert text to single char
			switch ( strtolower( $interval ) ) {
				case 'day' :
					$new_interval = 'D';
					break;
				case 'week' :
					$new_interval = 'W';
					break;
				case 'month' :
					$new_interval = 'M';
					break;
				case 'year' :
					$new_interval = 'Y';
					break;
				default :
					$new_interval = $interval;
					break;
			}
		}

		return $new_interval;
	}

	//------ AUTHORIZE AND CAPTURE SINGLE PAYMENT ------//
	public function authorize( $feed, $submission_data, $form, $entry ) {

		$txnArray = $this->get_payment_transaction( $feed, $submission_data, $form, $entry );

		$config    = $this->get_config( $feed, $submission_data );
		$form_data = $this->get_form_data( $submission_data, $form, $config );

		$names = $this->get_first_last_name( $submission_data['card_name'] );

		$settings = $this->get_aim();

		$mpgCustInfo = new mpgCustInfo();

		/********************** Set Customer Information **********************/

		$billing = array(
			'first_name' => $names["first_name"],
			'last_name' => $names["last_name"],
			'address' => $submission_data["address"]. ' ' .$submission_data["address2"],
			'city' => $submission_data["city"],
			'province' => $submission_data["state"],
			'postal_code' => $submission_data["zip"],
			'country' => $submission_data["country"],
			'phone_number' => $submission_data["phone"]
		);

		foreach ($submission_data["line_items"] as $key => $value) {

			$item[$key] = array(
			               'name'=>$value['name'],
			               'quantity'=>$value['quantity'],
			               'product_code'=>$value['id'],
			               'extended_amount'=>$value['unit_price']
			               );

			$mpgCustInfo->setItems($item[$key]);
		}



		/************************** CVD Variables *****************************/
		$cvd_indicator = '1';
		$cvd_value = $txnArray['cvd'];
		/********************** AVS Associative Array *************************/
		$avsTemplate = array(
							'avs_street_number'=>$submission_data["address"],
							'avs_street_name' =>$submission_data["address2"],
							'avs_zipcode' => $submission_data["zip"],
							);
		/********************** CVD Associative Array *************************/
		$cvdTemplate = array(
							'cvd_indicator' => $cvd_indicator,
							'cvd_value' => $cvd_value
							);
		/************************** AVS Object ********************************/
		$mpgAvsInfo = new mpgAvsInfo ($avsTemplate);
		/************************** CVD Object ********************************/
		$mpgCvdInfo = new mpgCvdInfo ($cvdTemplate);


		$mpgCustInfo->setBilling($billing);
		$mpgCustInfo->setEmail($submission_data["email"]);

		/********************** Transaction Object ****************************/

		$mpgTxn = new mpgTransaction($txnArray['txn']);

		/******************** Set Customer Information ************************/

		$mpgTxn->setCustInfo($mpgCustInfo);

		/************************ Set AVS and CVD *****************************/
		
		$mpgTxn->setAvsInfo($mpgAvsInfo);
		$mpgTxn->setCvdInfo($mpgCvdInfo);

		/************************ Request Object ******************************/

		$mpgRequest = new mpgRequest($mpgTxn);

		$testmode = $settings['mode'];

		if ( $testmode != 'production' )
			$mpgRequest->setTestMode(true);

		/*********************** HTTPSPost Object ****************************/

		$mpgHttpPost = new mpgHttpsPost($settings['store_id'],$settings['api_token'],$mpgRequest);

		/*************************** Response *********************************/

		$mpgResponse = $mpgHttpPost->getMpgResponse();

		$txnno = $mpgResponse->getTxnNumber();
		$receipt = explode("|",$mpgResponse->getReceiptId());
		$respcode = $mpgResponse->getResponseCode();
		$refnum = $mpgResponse->getReferenceNum();
		$auth = $mpgResponse->getAuthCode();
		$message = $mpgResponse->getMessage();

		if( $respcode < '50' && $respcode > '0' ){

				$this->log_debug( __METHOD__ . "(): Payment successful. Amount: {$submission_data['payment_amount']}. Transaction Id: {$txnno}." );

				$auth = array(
					'is_authorized'  => true,
					'transaction_id' => $txnno,
					'captured_payment' => array(
						'is_success'     => true,
						'error_message'  => '',
						'transaction_id' => $txnno,
						'amount'         => $submission_data['payment_amount']
					),
				);

		}else{
			$this->log_error( __METHOD__ . '(): Payment failed. Response => ' . print_r( $mpgResponse, true ) );

			$auth = array(
				'is_authorized'  => false,
				'error_message'  => $message
			);
		}

		return $auth;

	}

	public function get_payment_transaction( $feed, $submission_data, $form, $entry ) {

		$settings = $this->get_aim();

		$feed_name = rgar( $feed['meta'], 'feedName' );
		$this->log_debug( __METHOD__ . "(): Initializing new MONDCA object based on feed #{$feed['id']} - {$feed_name}." );

		$order_id = empty( $invoice_number ) ? uniqid() : $invoice_number; //???

		$amount = number_format($submission_data['payment_amount'], 2, '.', '');

		if( $settings['transaction'] != '' ){
			$type = $settings['transaction'];
		}else{
			$type = 'purchase';
		}

		
		$cust_id = '';
    	$crypt = '7';
		$pan = $submission_data["card_number"];
		$cvd = $submission_data["card_security_code"];
		$expiry_date = str_pad($submission_data["card_expiration_date"][0], 2, "0", STR_PAD_LEFT).substr($submission_data["card_expiration_date"][1], -2);
		$stamp = date("YdmHisB");
		$orderid = $stamp.'|'.$order_id;

		/***************** Transactional Associative Array ********************/

		$txnArray['txn'] = array(
			'type' => $type,
			'order_id' => $orderid,
			'cust_id' => $cust_id,
			'amount' => $amount,
			'pan' => $pan,
			'expdate' => $expiry_date,
      		'crypt_type'=> $crypt,
			'dynamic_descriptor' => ''
		);

		$txnArray['cvd'] = $cvd;

		$this->log_debug( __METHOD__ . '(): $submission_data line_items => ' . print_r( $submission_data['line_items'], 1 ) );

		return $txnArray;
		
	}

	/**
	 * Check if the current entry was processed by this add-on.
	 *
	 * @param int $entry_id The ID of the current Entry.
	 *
	 * @return bool
	 */
	public function is_payment_gateway( $entry_id ) {

		if ( $this->is_payment_gateway ) {
			return true;
		}

		$gateway = gform_get_meta( $entry_id, 'payment_gateway' );

		return in_array( $gateway, array( 'Moneris Direct CA', $this->_slug ) );
	}

	// HELPERS
	private function remove_spaces( $text ) {

		$text = str_replace( "\t", ' ', $text );
		$text = str_replace( "\n", ' ', $text );
		$text = str_replace( "\r", ' ', $text );

		return $text;

	}

	private function truncate( $text, $max_chars ) {
		if ( strlen( $text ) <= $max_chars ) {
			return $text;
		}

		return substr( $text, 0, $max_chars );
	}

	private function get_first_last_name( $text ) {
		$names      = explode( ' ', $text );
		$first_name = rgar( $names, 0 );
		$last_name  = '';
		if ( count( $names ) > 1 ) {
			$last_name = rgar( $names, count( $names ) - 1 );
		}

		$names_array = array( 'first_name' => $first_name, 'last_name' => $last_name );

		return $names_array;
	}

	// Convert submission_data into form_data for hooks backwards compatibility
	private function get_form_data( $submission_data, $form, $config ) {

		$form_data = array();

		// getting billing information
		$form_data['form_title'] = $submission_data['form_title'];
		$form_data['email']      = $submission_data['email'];
		$form_data['address1']   = $submission_data['address'];
		$form_data['address2']   = $submission_data['address2'];
		$form_data['city']       = $submission_data['city'];
		$form_data['state']      = $submission_data['state'];
		$form_data['zip']        = $submission_data['zip'];
		$form_data['country']    = $submission_data['country'];
		$form_data['phone']      = $submission_data['phone'];

		$form_data['card_number']     = $submission_data['card_number'];
		$form_data['expiration_date'] = $submission_data['card_expiration_date'];
		$form_data['security_code']   = $submission_data['card_security_code'];
		$names                        = $this->get_first_last_name( $submission_data['card_name'] );
		$form_data['first_name']      = $names['first_name'];
		$form_data['last_name']       = $names['last_name'];

		// form_data line items
		$i = 0;
		foreach ( $submission_data['line_items'] as $line_item ) {
			$form_data['line_items'][ $i ]['item_id']          = $line_item['id'];
			$form_data['line_items'][ $i ]['item_name']        = $line_item['name'];
			$form_data['line_items'][ $i ]['item_description'] = $line_item['description'];
			$form_data['line_items'][ $i ]['item_quantity']    = $line_item['quantity'];
			$form_data['line_items'][ $i ]['item_unit_price']  = $line_item['unit_price'];
			$form_data['line_items'][ $i ]['item_taxable']     = 'Y';
			$i ++;
		}

		$form_data['amount']     = $submission_data['payment_amount'];
		$form_data['fee_amount'] = $submission_data['setup_fee'];

		// need an easy way to filter the order info as it is not modifiable once it is added to the transaction object
		$form_data = gf_apply_filters( 'gform_mondca_form_data', $form['id'], $form_data, $form, $config );

		return $form_data;
	}

	// Convert feed into config for hooks backwards compatibility
	private function get_config( $feed, $submission_data ) {

		$config = array();

		$config['id']        = $feed['id'];
		$config['form_id']   = $feed['form_id'];
		$config['is_active'] = $feed['is_active'];

		$config['meta']['type']               = rgar( $feed['meta'], 'transactionType' );
		$config['meta']['enable_receipt']     = rgar( $feed['meta'], 'enableReceipt' );
		$config['meta']['update_post_action'] = rgar( $feed['meta'], 'update_post_action' );

		$config['meta']['mondca_conditional_enabled'] = rgar( $feed['meta'], 'feed_condition_conditional_logic' );
		if ( $feed['meta']['feed_condition_conditional_logic'] ) {
			$config['meta']['mondca_conditional_field_id'] = $feed['meta']['feed_condition_conditional_logic_object']['conditionalLogic']['rules'][0]['fieldId'];
			$config['meta']['mondca_conditional_operator'] = $feed['meta']['feed_condition_conditional_logic_object']['conditionalLogic']['rules'][0]['operator'];
			$config['meta']['mondca_conditional_value']    = $feed['meta']['feed_condition_conditional_logic_object']['conditionalLogic']['rules'][0]['value'];
		}

		if ( $feed['meta']['transactionType'] == 'subscription' ) {
			$config['meta']['recurring_amount_field'] = $feed['meta']['recurringAmount'];
			$config['meta']['billing_cycle_number']   = $feed['meta']['billingCycle_length'];
			$config['meta']['billing_cycle_type']     = $feed['meta']['billingCycle_unit'] == 'day' ? 'D' : 'M';
			$config['meta']['recurring_times']        = $feed['meta']['recurringTimes'];
			$config['meta']['setup_fee_enabled']      = $feed['meta']['setupFee_enabled'];
			$config['meta']['setup_fee_amount_field'] = $feed['meta']['setupFee_product'];
			$config['meta']['trial_period_enabled']   = $feed['meta']['trial_enabled'];
			if ( $feed['meta']['trial_enabled'] ) {
				$config['meta']['trial_period_number'] = 1;
				$config['meta']['trial_amount']        = $submission_data['trial'];
			}

		}

		$config['meta']['api_settings_enabled'] = rgar( $feed['meta'], 'apiSettingsEnabled' );
		$config['meta']['mode']             = rgar( $feed['meta'], 'overrideMode' );
		$config['meta']['store_id']            = rgar( $feed['meta'], 'overrideStoreID' );
		$config['meta']['api_token']              = rgar( $feed['meta'], 'overrideAPIToken' );
		$config['meta']['transaction']              = rgar( $feed['meta'], 'overrideTransaction' );

		$config['meta']['customer_fields']['email']    = rgar( $feed['meta'], 'billingInformation_email' );
		$config['meta']['customer_fields']['address1'] = rgar( $feed['meta'], 'billingInformation_address' );
		$config['meta']['customer_fields']['address2'] = rgar( $feed['meta'], 'billingInformation_address2' );
		$config['meta']['customer_fields']['city']     = rgar( $feed['meta'], 'billingInformation_city' );
		$config['meta']['customer_fields']['state']    = rgar( $feed['meta'], 'billingInformation_state' );
		$config['meta']['customer_fields']['zip']      = rgar( $feed['meta'], 'billingInformation_zip' );
		$config['meta']['customer_fields']['country']  = rgar( $feed['meta'], 'billingInformation_country' );

		return $config;

	}

}
