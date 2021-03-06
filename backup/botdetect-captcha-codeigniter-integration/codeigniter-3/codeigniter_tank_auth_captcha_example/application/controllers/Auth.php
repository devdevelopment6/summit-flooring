<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }

    function index()
    {
        if ($message = $this->session->flashdata('message')) {
            $this->load->view('auth/general_message', array('message' => $message));
        } else {
            redirect('/auth/login/');
        }
    }

    /**
     * Login user on the site
     *
     * @return void
     */
    function login()
    {
        if ($this->tank_auth->is_logged_in()) {	// logged in
            redirect('');

        } elseif ($this->tank_auth->is_logged_in(FALSE)) { // logged in, not activated
            redirect('/auth/send_again/');

        } else {
            // load the BotDetect Captcha library and set its parameter
            $this->load->library('botdetect/BotDetectCaptcha', array(
                'captchaConfig' => 'LoginCaptcha'
            ));

            // validate the user-entered Captcha code when the form is submitted
            $code = $this->input->post('CaptchaCode');
            $isHuman = $this->botdetectcaptcha->Validate($code);

             // captcha code input field is required
            $this->form_validation->set_rules('CaptchaCode', 'Captcha Code', 'required');

            $data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                            $this->config->item('use_username', 'tank_auth'));
            $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

            $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('remember', 'Remember me', 'integer');

            // Get login for counting attempts to login
            if ($this->config->item('login_count_attempts', 'tank_auth') AND
                            ($login = $this->input->post('login'))) {
                    $login = $this->security->xss_clean($login);
            } else {
                    $login = '';
            }

            $data['errors'] = array();

            if ($this->form_validation->run()) {	// validation ok
                // validate captcha and Login
                if ($isHuman && $this->tank_auth->login(
                    $this->form_validation->set_value('login'),
                    $this->form_validation->set_value('password'),
                    $this->form_validation->set_value('remember'),
                    $data['login_by_username'],
                    $data['login_by_email'])) {	// success
                    redirect('');

                } else {

                    // Captcha validation failed, show error message
                    if (!$isHuman) {
                        $data['errors']['captchaValidationMessage'] = 'CAPTCHA validation failed, please try again.';
                    }

                    $errors = $this->tank_auth->get_error_message();
                    if (isset($errors['banned'])) {								// banned user
                        $this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

                    } elseif (isset($errors['not_activated'])) {				// not activated user
                        redirect('/auth/send_again/');

                    } else {													// fail
                        foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            // make Captcha Html accessible to View code
            $data['captchaHtml'] = $this->botdetectcaptcha->Html();


            $this->load->view('auth/login_form', $data);
        }
    }

    /**
     * Logout user
     *
     * @return void
     */
    function logout()
    {
        $this->tank_auth->logout();

        $this->_show_message($this->lang->line('auth_message_logged_out'));
    }

    /**
     * Register user on the site
     *
     * @return void
     */
    function register()
    {
        if ($this->tank_auth->is_logged_in()) {									// logged in
            redirect('');

        } elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
            redirect('/auth/send_again/');

        } elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
            $this->_show_message($this->lang->line('auth_message_registration_disabled'));

        } else {

            // load the BotDetect Captcha library and set its parameter
            $this->load->library('botdetect/BotDetectCaptcha', array(
                'captchaConfig' => 'RegisterCaptcha'
            ));

            // validate the user-entered Captcha code when the form is submitted
            $code = $this->input->post('CaptchaCode');
            $isHuman = $this->botdetectcaptcha->Validate($code);

            // captcha code input field is required
            $this->form_validation->set_rules('CaptchaCode', 'Captcha Code', 'required');

            $use_username = $this->config->item('use_username', 'tank_auth');
            if ($use_username) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
            }
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');


            $data['errors'] = array();

            $email_activation = $this->config->item('email_activation', 'tank_auth');

            if ($this->form_validation->run()) { // validation ok
                if ( $isHuman && !is_null($data = $this->tank_auth->create_user(
                                $use_username ? $this->form_validation->set_value('username') : '',
                                $this->form_validation->set_value('email'),
                                $this->form_validation->set_value('password'),
                                $email_activation))) {	// success

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    if ($email_activation) { // send "activate" email
                        $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                        $this->_send_email('activate', $data['email'], $data);

                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_1'));

                    } else {
                        if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

                            $this->_send_email('welcome', $data['email'], $data);
                        }
                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
                    }
                } else {

                    // Captcha validation failed, show error message
                    if (!$isHuman) {
                        $data['errors']['captchaValidationMessage'] = 'CAPTCHA validation failed, please try again.';
                    }

                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            // make Captcha Html accessible to View code
            $data['captchaHtml'] = $this->botdetectcaptcha->Html();

            $data['use_username'] = $use_username;			

            $this->load->view('auth/register_form', $data);
        }
    }

    /**
     * Send activation email again, to the same or new email address
     *
     * @return void
     */
    function send_again()
    {
        if (!$this->tank_auth->is_logged_in(FALSE)) {							// not logged in or activated
            redirect('/auth/login/');

        } else {

            // load the BotDetect Captcha library and set its parameter
            $this->load->library('botdetect/BotDetectCaptcha', array(
                'captchaConfig' => 'SendAgainCaptcha'
            ));

            // validate the user-entered Captcha code when the form is submitted
            $code = $this->input->post('CaptchaCode');
            $isHuman = $this->botdetectcaptcha->Validate($code);

            // Captcha Code input field is required
            $this->form_validation->set_rules('CaptchaCode', 'Captcha Code', 'required');

            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if ($isHuman && !is_null($data = $this->tank_auth->change_email(
                                $this->form_validation->set_value('email')))) {	// success

                    $data['site_name']	= $this->config->item('website_name', 'tank_auth');
                    $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $data['email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));

                } else {

                    // Captcha validation failed, show error message
                    if (!$isHuman) {
                        $data['errors']['captchaValidationMessage'] = 'CAPTCHA validation failed, please try again.';
                    }

                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            // make Captcha Html accessible to View code
            $data['captchaHtml'] = $this->botdetectcaptcha->Html();

            $this->load->view('auth/send_again_form', $data);
        }
    }

    /**
     * Activate user account.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function activate()
    {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Activate user
        if ($this->tank_auth->activate_user($user_id, $new_email_key)) { // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));

        } else { // fail
            $this->_show_message($this->lang->line('auth_message_activation_failed'));
        }
    }

    /**
     * Generate reset code (to change password) and send it to user
     *
     * @return void
     */
    function forgot_password()
    {
        if ($this->tank_auth->is_logged_in()) {	// logged in
            redirect('');

        } elseif ($this->tank_auth->is_logged_in(FALSE)) { // logged in, not activated
            redirect('/auth/send_again/');

        } else {

            // load the BotDetect Captcha library and set its parameter
            $this->load->library('botdetect/BotDetectCaptcha', array(
                'captchaConfig' => 'ForgotPasswordCaptcha'
            ));

            // validate the user-entered Captcha code when the form is submitted
            $code = $this->input->post('CaptchaCode');
            $isHuman = $this->botdetectcaptcha->Validate($code);

            // Captcha Code input field is required
            $this->form_validation->set_rules('CaptchaCode', 'Captcha Code', 'required');

            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if ($isHuman && !is_null($data = $this->tank_auth->forgot_password(
                                $this->form_validation->set_value('login')))) {

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with password activation link
                    $this->_send_email('forgot_password', $data['email'], $data);

                    $this->_show_message($this->lang->line('auth_message_new_password_sent'));

                } else {

                    // Captcha validation failed, show error message
                    if (!$isHuman) {
                        $data['errors']['captchaValidationMessage'] = 'CAPTCHA validation failed, please try again.';
                    }

                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            // make Captcha Html accessible to View code
            $data['captchaHtml'] = $this->botdetectcaptcha->Html();

            $this->load->view('auth/forgot_password_form', $data);
        }
    }

    /**
     * Replace user password (forgotten) with a new one (set by user).
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_password()
    {
        $user_id = $this->uri->segment(3);
        $new_pass_key = $this->uri->segment(4);

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $data['errors'] = array();

        if ($this->form_validation->run()) { // validation ok
            if (!is_null($data = $this->tank_auth->reset_password(
                            $user_id, $new_pass_key,
                            $this->form_validation->set_value('new_password')))) {	// success

                $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                // Send email with new password
                $this->_send_email('reset_password', $data['email'], $data);

                $this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));

            } else {														// fail
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        } else {
            // Try to activate user by password key (if not activated yet)
            if ($this->config->item('email_activation', 'tank_auth')) {
                $this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
            }

            if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        }
        $this->load->view('auth/reset_password_form', $data);
    }

    /**
     * Change user password
     *
     * @return void
     */
    function change_password()
    {
        if (!$this->tank_auth->is_logged_in()) { // not logged in or not activated
            redirect('/auth/login/');

        } else {
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if ($this->tank_auth->change_password(
                                $this->form_validation->set_value('old_password'),
                                $this->form_validation->set_value('new_password'))) {	// success
                    $this->_show_message($this->lang->line('auth_message_password_changed'));

                } else { // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }
            $this->load->view('auth/change_password_form', $data);
        }
    }

    /**
     * Change user email
     *
     * @return void
     */
    function change_email()
{
        if (!$this->tank_auth->is_logged_in()) { // not logged in or not activated
            redirect('/auth/login/');

        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if (!is_null($data = $this->tank_auth->set_new_email(
                                $this->form_validation->set_value('email'),
                                $this->form_validation->set_value('password')))) { // success

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with new email address and its activation link
                    $this->_send_email('change_email', $data['new_email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }
            $this->load->view('auth/change_email_form', $data);
        }
    }

    /**
     * Replace user email with a new one.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_email()
    {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Reset email
        if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) { // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));

        } else { // fail
            $this->_show_message($this->lang->line('auth_message_new_email_failed'));
        }
    }

    /**
     * Delete user from the site (only when user is logged in)
     *
     * @return void
     */
    function unregister()
    {
        if (!$this->tank_auth->is_logged_in()) { // not logged in or not activated
            redirect('/auth/login/');

        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if ($this->tank_auth->delete_user(
                                $this->form_validation->set_value('password'))) { // success
                    $this->_show_message($this->lang->line('auth_message_unregistered'));

                } else { // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v) {
                        $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }
            $this->load->view('auth/unregister_form', $data);
        }
    }

    /**
     * Show info message
     *
     * @param	string
     * @return	void
     */
    function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
        redirect('/auth/');
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data)
    {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->email->send();
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/Auth.php */