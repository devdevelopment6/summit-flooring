<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



	public $data;

	

	function __construct() {

		parent::__construct();



		$this->load->helper('url');

		$this->load->library('Color_image_lib');

  		$this->load->model('Model_color');

		$this->load->model('common_model');

	}

			

	function load_view($view = "")

	{

		$loginuser = $this->session->userdata('logedin_user');

		$this->data['user_gallery'] = false;

		$this->data['gallery_indoor_albums'] = false;

		$this->data['gallery_outdoor_albums'] = false;

		$this->data['logo_images'] = false;

		

		if($loginuser){

			$user_id = $this->session->userdata['logedin_user']['id'];

			$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			if($gallery_details!=false){

				$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

				$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

			}

			$logo_images = $this->common_model->get_by_condition('user_logos',array('user_id'=>$loginuser['id']));

			$this->data['last_img']=$this->common_model->get_by_condition('saved_album',array("user_id" => $loginuser['id']),array("id","desc"));

			$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$loginuser['id']));

			$this->data['logo_images'] = $logo_images;

		}

		

			

		$this->load->view($view, $this->data);

	}



	public function index()

	{

		$filter = array(

			'status' => '0',

		);

		

		$this->data['colors']=$this->Model_color->selectquery('color_room',$filter);

		$loginuser = $this->session->userdata('logedin_user');

		$this->data['user_gallery'] = false;

		$this->data['settings'] = $this->common_model->get_single('color_innovator_settings',array('id'=>1));

		if($loginuser){

			

			$this->data['last_img']=$this->common_model->get_by_condition('saved_album',array("user_id" => $loginuser['id']),array("id","desc"));

			$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$loginuser['id']));

		}

		$this->load_view("home");

	}

	public function get_single_details_colors(){

		$colors=$this->input->post('color_id');

		$colors_data=$this->common_model->get_single('color_room',array('id'=>$colors));

		echo json_encode($colors_data);

		exit();

		

	}

	public function get_details_colors(){

		$colors=$this->input->post('colors');

		$data=array();

		$count=0;

		foreach($colors as $color){

			$colors_data=$this->common_model->get_single('color_room',array('id'=>$color[0]));

			$colors_data['count']=$color[1];

			$data[]=$colors_data;

			$count++;

		}

		echo json_encode($data);

		exit();

	}

	public function get_image_by_formula($cat = '',$formula = '')

	{

		$info = array();

		$formula1 = explode("-",$formula);

		$cnt = count($formula1) - 1;

		for($i=0;$i<count($formula1);$i++){

			$array = array();

			if($i!=$cnt)

			{

				$fomula_ele = explode("_",$formula1[$i]);

				//print_r($fomula_ele[1]);

				$array['percent'] = $fomula_ele[1];

				$array['r'] = $fomula_ele[2];

				$array['g'] = $fomula_ele[3];

				$array['b'] = $fomula_ele[4];

				$array['flecks_size'] = $fomula_ele[5];

				$array['id'] = $fomula_ele[0];

				$info[] = $array;

			}

			else if($i==$cnt){

				$info[] = array('time_stamp' => $formula1[$i]);

			}

		}

		if($this->session->userdata('request_sample_formula')){

			$this->session->unset_userdata('request_sample_formula');

		}

		$this->session->set_userdata('request_sample_formula',$formula);

		

		$this->color_image_lib->createImage($info);

		$this->data['swatch_image'] = base_url().'images/'.$formula.'.jpg';

		$this->data['swatch_image_name'] = $formula.'.jpg';

		$this->data['info'] = $info;

		$this->load_view('get_image_by_formula');

	}

	public function send_to_email()

	{

		$email_info = $this->input->post('email_data'); //$_REQUEST["email"];

        //print_r($email_info);die;

		$filename = basename($email_info['imageSwatch']); 

		$filename1 = explode('.',$filename);

		/*$data1= array(

			'image_info'		=>  $email_info['color_formula'],

			'created_date'		=>	date('Y-m-d H:i:s'),

			'swatch_name'		=>  $email_info['name_swatch'],

			'org_image_path'	=>	$email_info['imageSwatch'],

			'org_image_name'	=>	$filename,

		);

		$table="saved_album";

		$id = $this->Model_color->insert_data($table, $data1);*/

		$email_user = $email_info['email'];

		$email_image_src = $email_info['imageSwatch'];

		$formula = $email_info['color_formula'];

		$name_swatch = $email_info['name_swatch'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = $formula1;

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/1/'.$filename1[0], "To request a color sample of this swatch please click here.");

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text



		$this->email->initialize($config);

		$this->email->from('info@summit-flooring.com', 'Summit Flooring');

		$this->email->to($email_user);

		$this->email->cc('sales@summit-flooring.com');

		$this->email->subject('Summit Flooring - The Color Innovator - Your Favorite Swatch');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summitflooring" target="_blank">' . $email_twitter_icon . '</a>';



		$email_dino_logo = '<img src="https://s3.amazonaws.com/summit-flooring/logo.png">';



		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		$this->email->message('Thank you for using the Summit Flooring Color Innovator! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/><br/>Stay in the loop with  Flooring Color news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $subscribe_link . '&#160;' . $email_facebook . '&#160;' . $email_twitter . '<br/><br/>' . $email_dino_logo . '');

		$this->email->send();

	}

	public function send_to_email_with_logo()

	{

		$email_info = $this->input->post('email_data');

		//print_r($email_info);

		$email_user = $email_info['email'];

		$logo_image = $email_info['logo_image'];

		$swatch_id = $email_info['swatch_id'];

		

		$swatch_details = $this->common_model->get_single('saved_album',array('id'=>$swatch_id));

		if($swatch_details!=false){

			$filename = basename($swatch_details['org_image_name']); 

			$filename1 = explode(".",$swatch_details['org_image_name']);

			

			$email_image_src = $swatch_details['org_image_path'];

			$formula = $swatch_details['image_info'];

			$name_swatch = $swatch_details['swatch_name'];

			

			$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

			$logo_image_section1 = '<img  style="width:300px; height:auto;" src="' . $logo_image . '"/>';

			

			$logo_image_section = '<div style="width:325px; height:270px;"><div style="width:100%;height:100%;background-image:url('.$email_image_src.');background-size:9% 9%;z-index: 100;"><div style="width:100%;height:100%;background-size:13% 13%;position:relative;background-image:url('.$email_image_src.');text-align: center;opacity: 0.6;z-index: -1;"><img src="'.$logo_image.'" style="width:100px;margin:25% auto;z-index:999;"></div></div></div>';

			

			$replace = array("% ", " -", "- ");

			$insert = array("%<br/>", " - <strong>", "</strong> - ");

			$formula1 = str_replace($replace, $insert, $formula);

			

			$html_email = $formula1;

			$request_sample_url = explode("/", $email_image_src);

			$request_url = explode(".", $request_sample_url[5]);

			$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

			

			$this->load->library('email');		

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('info@summit-flooring.com', ' Flooring Color');

			$this->email->to($email_user);

			$this->email->cc('sales@summit-flooring.com');

			$this->email->subject(' Flooring Color - The Color Innovator - Swatch With Logo');



			$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

			$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



			$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

			$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';



			$email_dino_logo = '<img src="https://s3.amazonaws.com/summit-flooring/logo.png">';



			$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

			$this->email->message('Thank you for using the  Flooring Color Color Innovator! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image .'<br/><br/>'.$logo_image_section1.'<br/><br/>'. $logo_image_section. '<br/><br/>Stay in the loop with  Flooring Color news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $subscribe_link . '&#160;' . $email_facebook . '&#160;' . $email_twitter . '<br/><br/>' . $email_dino_logo . '');

			$this->email->send();

		}

	}	

	public function update_user()

	{

		if($this->session->userdata('logedin_user'))

		{

			$loged_in_user = $this->session->userdata('logedin_user');

			$filter = array('id' => $loged_in_user['id']);

			$details = array(

				'name'=> $this->input->post('user_name'),

				'email'=> $this->input->post('useremail'),

				'mobile'=>$this->input->post('usermobile'),

			);

			if($this->input->post('usernewpwd')!=''){

				$details['password'] = md5($this->input->post('usernewpwd'));

			}

			$flag = $this->common_model->update_data('users',$details,$filter);

			if($flag != false){

				echo json_encode(true);

			}

			else

			{

				echo json_encode(false);

			}

		}

		else

		{

			echo json_encode(false);

		}

	}

	function update_contact_information(){

		if($this->session->userdata('logedin_user'))

		{

			$loged_in_user = $this->session->userdata('logedin_user');

			$data = array(

				'address'=>$this->input->post('address'),

				'city'=>$this->input->post('city'),

				'zipcode'=>$this->input->post('zipcode'),

				'mobile'=>$this->input->post('mobile'),

				'fax' => $this->input->post('fax'),

				'state' => $this->input->post('state'),

				'modified_datetime'=>date('Y-m-d H:i:s'),

			);



			$user_id = $loged_in_user['id'];

			$flag = $this->common_model->update_data('users',$data,array('id'=>$user_id));

			if($flag != false){

				echo json_encode(true);

			}

			else

			{

				echo json_encode(false);

			}

		}

		else

		{

			echo json_encode(false);

		}

	}

	public function get_logged_in_user(){

		if($this->session->userdata('logedin_user'))

		{

			$loged_in_user = $this->session->userdata('logedin_user');

			$data_user=$this->common_model->get_single('users',array('id'=>$loged_in_user['id']));

			unset($data_user["password"]);

			echo json_encode($data_user);

		}

		else

		{

			echo json_encode(false);

		}

	}

	function check_mail_exist(){

		$email=$this->input->post('emails');

	

		if($this->session->userdata('logedin_user'))

		{

			$loged_in_user = $this->session->userdata('logedin_user');

			$emails_data=$this->common_model->get_single('users',array('email'=>$email,'id != ' => $loged_in_user['id']));

		}

		else

		{

			$emails_data=$this->common_model->get_single('users',array('email'=>$email));

		}

		if($emails_data != false)

			echo json_encode(FALSE);

		else

			echo json_encode(TRUE);

	}

	function add_reg_user(){

		$data1=array();

		$data1['name']=$this->input->post('name');

		$data1['email']=$this->input->post('newemail');

		$password = random_string('alnum',8);

		$data1['password']=md5($password);

		$data1['created_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->insert_data('users', $data1);

		if($flag!=false){

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('sales@summit-flooring.com', 'Color Innovator');

			$this->email->to($data1['email']);

			$this->email->cc('sales@summit-flooring.com');

			$this->email->subject('Color Innovator - Registration Details');



			$message = "Dear <b>".$data1['name']."</b> ";

			$message .= "<h5>Welcome to Color Innovator!!</h5>";

			$message .= "<p>Your registration is completed successfully. Your registration details are given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$data1['email']."</p> ";

			$message .= "<p><b>Password : </b>".$password."</p> ";

			

			$this->email->message($message);

			if($this->email->send()){};

			

			echo true;

		}

		else{

			echo false;

		}

	}

	function login_user(){

		$filter=array(

			'email'=>$this->input->post('email'),

		);

		$flag=$this->common_model->get_single('users',$filter);

		if($flag!=false){

			$filters=array(

				'id'=>$flag['id'],

				'password'=>md5($this->input->post('pwd')),

			);

			$user=$this->common_model->get_single('users',$filters);

			if($user!=false){

				unset($user["password"]);

				$this->session->set_userdata('logedin_user',$user);

				$user = json_encode($user);

				print_r($user);

			}

			else{

				echo false;

			}

			

		}else{

			echo "not_exist";

		}

		

	}

	function new_login_user(){

		$filter=array(

			'email'=>$this->input->post('login_email'),

		);

		$flag=$this->common_model->get_single('users',$filter);

		if($flag!=false){

			$filters=array(

				'id'=>$flag['id'],

				'password'=>md5($this->input->post('login_pwd')),

			);

			$user=$this->common_model->get_single('users',$filters);

			if($user!=false){

				unset($user["password"]);

				$this->session->set_userdata('logedin_user',$user);

				$user = json_encode($user);

				redirect('home');

			}

			else{

				$this->session->set_flashdata('login_error','Entered password is incorrect!!');

				redirect('home/login_register');

			}

			

		}else{

			$this->session->set_flashdata('login_error','Account is not exist for this email!!');

			redirect('home/login_register');

		}

		

	}

	function add_new_reg_user(){

		$data1=array();

		$data1['name']=$this->input->post('register_name');

		$data1['email']=$this->input->post('register_newemail');

		$password = random_string('alnum',8);

		$data1['password']=md5($password);

		$data1['created_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->insert_data('users', $data1);

		if($flag!=false){

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('sales@summit-flooring.com', 'Color Innovator');

			$this->email->to($data1['email']);

			$this->email->cc('sales@summit-flooring.com');

			$this->email->subject('Color Innovator - Registration Details');



			$message = "Dear <b>".$data1['name']."</b> ";

			$message .= "<h5>Welcome to Color Innovator!!</h5>";

			$message .= "<p>Your registration is completed successfully. Your registration details are given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$data1['email']."</p> ";

			$message .= "<p><b>Password : </b>".$password."</p> ";

			

			$this->email->message($message);

			if($this->email->send()){};

			$this->session->set_flashdata('reg_success',"Registration successfully done. Check your email account for login details.");

			redirect('home/login_register');

		}

		else{

			redirect('home/login_register');

		}

	}

	function get_exist_gal(){

		$user_id=$this->input->post('user_id');

		$result=array();

		$gallery_id=$this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

		if($gallery_id!=false){

			$result['gallery_data']=$gallery_id;

			$indoor_images = false;

			$outdoor_images = false;

			$gallery_images_indoor_images=$this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_id['id'],'category_id'=>1));

			if($gallery_images_indoor_images!=false){

				foreach($gallery_images_indoor_images as $gal_img){

					$indoor_images .=  '<div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks"><div class="inner_div"><img src="'.base_url().'images/'.$gal_img['org_image_name'].'" data-id="'.$gal_img['id'].'"></div><a href="'.base_url().'home/request_sample_swatch/'.$gal_img['id'].'" data-id="'.$gal_img['id'].'" class="btn btn-sm btn-info request_sample_btn col-xs-12" target="_blank">Request Sample</a></div>';

				}

			}

			$result['indoor_gal_images'] = $indoor_images;

			$gallery_images_outdoor_images=$this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_id['id'],'category_id'=>2));

			if($gallery_images_outdoor_images!=false){

				foreach($gallery_images_outdoor_images as $gal_img){

					$outdoor_images .=  '<div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks"><div class="inner_div"><img src="'.base_url().'images/'.$gal_img['org_image_name'].'" data-id="'.$gal_img['id'].'"></div><a href="'.base_url().'home/request_sample_swatch/'.$gal_img['id'].'" data-id="'.$gal_img['id'].'" class="btn btn-sm btn-info request_sample_btn col-xs-12" target="_blank">Request Sample</a></div>';

				}

			}

			$result['outdoor_gal_images'] = $outdoor_images;

			

			echo json_encode($result);

		}

		else{

			echo false;

		}

	}

	public function get_current_cat(){

		if($this->session->userdata('colors_category_list'))

		{	

			$category = $this->session->userdata('colors_category_list');

			echo json_encode($category['category']);

		}

		else{

			echo json_encode(false);

		}

	}

	function save_image()

	{ 

		  $image_info = array();

		  $image_info = $this->input->post('image_info');

		  $img_path = $image_info['img_request_url'];

		  $id = $this->input->post('id');

		  $filename = basename($img_path); 

		  if($id != "" || $id != NULL){

			  $data= array(

			   'image_info'  => $image_info['img_request_info'],

			   'created_date'  => date('Y-m-d H:i:s'),

			   'user_id' => $id,

			   'swatch_name'  => $image_info['img_request_name'],

			   'org_image_path' => $image_info['img_request_url'],

			   'org_image_name' => $filename,

			  );

		  }

		  else

		  {

			  $data= array(

			   'image_info'  => $image_info['img_request_info'],

			   'created_date'  => date('Y-m-d H:i:s'),

			   'swatch_name'  => $image_info['img_request_name'],

			   'org_image_path' => $image_info['img_request_url'],

			   'org_image_name' => $filename,

			  );  

		  }

		  if($this->session->userdata('colors_category_list'))

		  {	

			$category = $this->session->userdata('colors_category_list');

			$data['category_id'] = $category['category'];

		  }

		  $table="saved_album";

		  $id = $this->Model_color->insert_data($table, $data); 

		  $current_cat_array = $this->session->userdata('colors_category_list');

		  $response_array = array();	

		  $saved_album = array();

		  if($this->session->userdata('saved_album_session')=='')

		  {

			  $saved_album[$current_cat_array['category']][] = $id;

			  $this->session->set_userdata('saved_album_session',$saved_album);

		  }

		  else

		  {

			  $old_session = $this->session->userdata('saved_album_session'); 

			  $old_session[$current_cat_array['category']][] = $id;

			  $this->session->unset_userdata('saved_album_session');

			  $this->session->set_userdata('saved_album_session',$old_session);

		  }	

		 $response_array['category'] = $current_cat_array['category'];

		 $response_array['id'] = $id;

		 echo json_encode($response_array);

	 }

	

	function create_color_session(){

		$colors=$this->input->post('colors');

		$session_colors=array();

		//echo json_encode($colors);

		//$this->session->unset_userdata('colors_list');

		$current_session_colors=$this->session->userdata('colors_list');

		

		if($current_session_colors!='' && $current_session_colors != NULL){

			$session_colors=$current_session_colors;

			//exit();

			//die;

		}

		$col=array();

		foreach($colors as $color){

			$col[]=$color[4];

			$session_colors[$color[4]]['id']=$color[0];

			$session_colors[$color[4]]['value']=$color[1];

			$session_colors[$color[4]]['fine']=$color[2];

			$session_colors[$color[4]]['coarse']=$color[3];

		}

		foreach($session_colors as $key=>$sess){

			if(!in_array($key,$col)){

				unset($session_colors[$key]);

			}

		}

		//$this->session->unset_userdata('colors_list');

		$this->session->set_userdata('colors_list',$session_colors);

		echo json_encode($this->session->userdata('colors_list'));

		exit();

	}

	function create_new_color_session(){

		$colors=$this->input->post('colors');

		$mix_it_array=array();

		$new_array=array();

		if($this->session->userdata('colors_list')!='' && $this->session->userdata('colors_list')!=NULL){

			$mix_it_array=$this->session->userdata('colors_list');

		}

		$i=0;

		foreach($colors as $color){

			if(!array_key_exists($color[4],$mix_it_array)){

				$new_array[$color[4]]['id']=$color[0];

				$new_array[$color[4]]['value']=$color[1];

				$new_array[$color[4]]['fine']=$color[2];

				$new_array[$color[4]]['coarse']=$color[3];

			}

			$i++;

		}

		$final_array=$mix_it_array+$new_array;

		//print_r($final_array);

		//$this->session->unset_userdata('colors_list');

		$this->session->set_userdata('colors_list',$final_array);

		echo json_encode($this->session->userdata('colors_list'));

		exit();

	}

	

	function create_five_session(){

		$set=$this->input->post('set');

		

		if($this->session->userdata('colors_list')!='' && $this->session->userdata('colors_list')!=NULL){

			$mix_it_array=$this->session->userdata('colors_list');

		}

		$i=0;

		$this->session->set_userdata('done_step', $set);

		echo json_encode($this->session->userdata('colors_list'));

		exit();

	}

	

	function create_category_session(){

		$category=$this->input->post('category');

		$new_array=array();

		$new_array["category"]= $category;

		$this->session->unset_userdata('colors_category_list');

		$this->session->set_userdata('colors_category_list',$new_array);

		echo json_encode($this->session->userdata('colors_category_list'));

		exit();

	}

	

  

	function get_color_session(){

		$colors = $this->session->userdata('colors_list');

		echo json_encode($colors);

		exit();

	}

	function color_session_remove(){

		//$this->session->unset_userdata('colors_list');

	}



	function logout(){

		$this->session->unset_userdata('saved_album_session');

		$this->session->unset_userdata('logedin_user');

		//$this->session->unset_userdata('colors_category_list');

		redirect('home');

	}



	function remove_color()

	{

		$color = $this->input->post("color");

		$current_session_colors = $this->session->userdata('colors_list');

		$removed_colors = array();

		for($i = 0;$i<count($current_session_colors);$i++)

		{

			if($color == $current_session_colors[$i]['id'])

			{

				unset($current_session_colors[$i]);

			}

		}



		$current_session_colors = array_values($current_session_colors);



		$this->session->set_userdata("colors_list", $current_session_colors);



		exit();

	}

	

	function edit_account()

	{

		

	}

	function destroy_step2_3_details(){

		$this->session->unset_userdata('colors_category_list');

		$this->session->unset_userdata('colors_list');

		//$this->session->unset_userdata('saved_album_session');

	}

	function view_gallery()

	{

		$loginuser = $this->session->userdata('logedin_user');

		$this->data['user_gallery'] = false;

		$this->data['saved_albums_indoor'] = false;

		$this->data['saved_albums_outdoor'] = false;

		

		if($loginuser)

		{

			$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$loginuser['id']));

			if($this->data['user_gallery']!=false){

				$this->data['saved_albums_indoor'] = $this->common_model->get_by_condition('saved_album',array('user_id'=>$loginuser['id'],'gallery_id'=>$this->data['user_gallery']['id'],'category_id'=>1));

				$this->data['saved_albums_outdoor'] = $this->common_model->get_by_condition('saved_album',array('user_id'=>$loginuser['id'],'gallery_id'=>$this->data['user_gallery']['id'],'category_id'=>2));

			}

			$this->load->view('view_gallery',$this->data);

		}

		else{

			redirect('home');

		}

	}

	function delete_album(){

		$id = $this->input->post('id');

		$catid = $this->input->post('catid');

		$gallery = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($gallery != false){

			/*if(file_exists(FCPATH.'images/'.$gallery['org_image_name']) && !is_dir(FCPATH.'images/'.$gallery['org_image_name'])){

				unlink(FCPATH.'images/'.$gallery['org_image_name']);

			}*/

			if($this->session->userdata('saved_album_session')!='')

			{

				$old_session = $this->session->userdata('saved_album_session'); 

				if (($key = array_search($id, $old_session[$catid])) !== false) {

					unset($old_session[$catid][$key]);

				}

				$this->session->unset_userdata('saved_album_session');

				if(count($old_session)>0){

					$this->session->set_userdata('saved_album_session',$old_session);

				}

			}

			$this->common_model->delete_data('saved_album',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	public function get_swatch_by_id()

	{

		$return_array 		= array();

		$formula_list 		= '';

		$new_formula_list 	= '';

		

		$info 	= array();

		$id 	= $this->input->post('id');

		

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($swatch!=false)

		{

			$formula = $swatch['org_image_name'];

			$formula1 = explode("-",$formula);

			$cnt = count($formula1) - 1;

			for($i=0;$i<count($formula1);$i++){

				$array = array();

				if($i!=$cnt)

				{

					$fomula_ele = explode("_",$formula1[$i]);

					//print_r($fomula_ele[1]);

					$array['percent'] = $fomula_ele[1];

					$array['r'] = $fomula_ele[2];

					$array['g'] = $fomula_ele[3];

					$array['b'] = $fomula_ele[4];

					$array['flecks_size'] = $fomula_ele[5];

					$array['id'] = $fomula_ele[0];

					$info[] = $array;

				}

				else if($i==$cnt){

					$info[] = array('time_stamp' => $formula1[$i]);

				}

			}			

		}

		for($i=0;$i<count($info)-1;$i++){

			$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));

			if($single_color != false){

				$formula_list .= '<li class="col-md-12 col-sm-12 col-xs-12">

								<div class="col-md-4 col-xs-12 col-sm-4">

									<img src="'.base_url().'uploads/colors/'.$single_color['color_img'].'" style="width:100%;">

								</div>

								<div class="col-md-8 col-xs-12 col-sm-8">

									<h5>'.$single_color['color_title'].'</h5>

									<h5>'.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>

								</div>

						    </li>';



			    $new_formula_list .= '<li class="col-md-12 col-sm-12 col-xs-12">

					

									<div class="col-md-12 col-xs-12 col-sm-12">

										<h5><b>'.$single_color['color_title'].'</b> - '.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>

									</div>

							    </li>';

			}

		}

		$return_array['formula_list'] 		= $formula_list;

		$return_array['new_formula_list'] 	= $new_formula_list;

		$return_array['swatch_image'] 		= $swatch['org_image_path'];

		$return_array['swatch_name'] 		= $swatch['swatch_name'];

		echo json_encode($return_array);

	}

	function delete_swatch(){

		$id = $this->input->post('id');

		$cat = $this->input->post('cat');

		$gallery = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($gallery != false){

			if($this->session->userdata('saved_album_session')!='')

			{

				$old_session = $this->session->userdata('saved_album_session'); 

				

				if (($key = array_search($id, $old_session[$cat])) !== false) {

					unset($old_session[$cat][$key]);

				}

				$this->session->unset_userdata('saved_album_session');

				if(count($old_session)>0){

					$this->session->set_userdata('saved_album_session',$old_session);

				}

			}

			$this->common_model->delete_data('saved_album',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	function set_request_sample_session(){

		$id = $this->input->post('id');

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($swatch!= false){

			$org_image_name = explode(".",$swatch['org_image_name']);

			if($this->session->userdata('request_sample_formula')){

				$this->session->unset_userdata('request_sample_formula');

			}

			$this->session->set_userdata('request_sample_formula',$org_image_name[0]);

		}

	}

	function get_request_sample_session_details()

	{

		if($this->session->userdata('request_sample_formula'))

		{

			//echo $this->session->userdata('request_sample_formula');die;

			$details = $this->get_image_by_formula_ajax($this->session->userdata('request_sample_formula'));

			$details['user'] = false;

			if($this->session->userdata('logedin_user')!=''){

				$user = $this->common_model->get_single('users',array('id'=>$this->session->userdata['logedin_user']['id']));

				$details['user'] = $user;

			}

			echo json_encode($details);

		}

		else

		{

			echo json_encode(FALSE);

		}

	}

	public function request_sample_swatch($id){

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		$org_image_name = explode(".",$swatch['org_image_name']);

		$details = $this->get_image_by_formula_ajax($org_image_name[0]);

		//print_r($details);die;

		$details['user'] = false;

		if($this->session->userdata('logedin_user')!=''){

			$user = $this->common_model->get_single('users',array('id'=>$this->session->userdata['logedin_user']['id']));

			$details['user'] = $user;

		}

		$this->data['details'] = $details;

		$this->load_view('request_sample_form');

	}

	public function get_image_by_formula_ajax($formula = '')

	{

		$data = array();

		$info = array();

		$formula1 = explode("-",$formula);

		$formula_list = '';

		$cnt = count($formula1) - 1;

		for($i=0;$i<count($formula1);$i++){

			$array = array();

			if($i!=$cnt)

			{

				$fomula_ele = explode("_",$formula1[$i]);

				//print_r($fomula_ele[1]);

				$array['percent'] = $fomula_ele[1];

				$array['r'] = $fomula_ele[2];

				$array['g'] = $fomula_ele[3];

				$array['b'] = $fomula_ele[4];

				$array['flecks_size'] = $fomula_ele[5];

				$array['id'] = $fomula_ele[0];

				$info[] = $array;

			}

			else if($i==$cnt){

				$info[] = array('time_stamp' => $formula1[$i]);

			}

		}

		for($i=0;$i<count($info)-1;$i++){

			

			$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));

			if($single_color != false){

				$formula_list .= '<li class="col-md-12 col-sm-12 col-xs-12">

								

								<div class="col-md-12 col-xs-12 col-sm-12">

									<h5><b>'.$single_color['color_title'].'</b> - '.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>

								</div>

						    </li>';

			}

		}

		$this->color_image_lib->createImage($info);

	    $data['swatch_image'] = base_url().'images/'.$formula.'.jpg';

		$data['info'] = $info;

		$data['formula_list'] = $formula_list;

		return $data;

	}

	function request_sample()

	{

		$post_data = $this->input->post('frm');

		

		$formula = $this->input->post('formula');

		$swatch_image_request = $this->input->post('swatch_image_request');

	

		parse_str($post_data, $post_data_array);

		$data = array(

			'current_project'=>$post_data_array['current_project'],

			'future_project'=>$post_data_array['future_project'],

			'square_footage'=>$post_data_array['square_footage'],

			'other_products'=>$post_data_array['other_products'],

			'additional_notes'=>$post_data_array['additional_notes'],

			'name'=>$post_data_array['request_name'],

			'company'=>$post_data_array['request_company'],

			'address'=>$post_data_array['request_address'],

			'city'=>$post_data_array['request_city'],

			'state'=>$post_data_array['request_state'],

			'zipcode'=>$post_data_array['request_zipcode'],

			'email_id'=>$post_data_array['request_email'],

			'telephone'=>$post_data_array['request_telephone'],

			'yourself'=>$post_data_array['yourself'],

			'swatch_image_link'=>$swatch_image_request,

			'swatch_formula'=>$formula,

			'created_datetime'=>date('Y-m-d H:i:s'),

		);

		if(key_exists('interior_floor',$post_data_array) && $post_data_array['interior_floor'] && !empty($post_data_array['interior_floor'])){

			$data['interior_floor'] = implode(",",$post_data_array['interior_floor']);

		}

		if(key_exists('exterior_floor',$post_data_array) && $post_data_array['exterior_floor'] && !empty($post_data_array['exterior_floor'])){

			$data['exterior_floor'] = implode(",",$post_data_array['exterior_floor']);

		}

		if(array_key_exists('project_description',$post_data_array)){

			$data['self_description'] = $post_data_array['project_description'];

		}

		if(array_key_exists('request_fax',$post_data_array)){

			$data['fax'] = $post_data_array['request_fax'];

		}

		$flag = $this->common_model->insert_data('sample_request_table', $data);

		if($flag!=false){

			

			if($this->session->userdata('logedin_user')!='' && array_key_exists('save_as_contact',$post_data_array) && $post_data_array['save_as_contact']){

				$data1 = array(

					'address'=>$post_data_array['request_address'],

					'city'=>$post_data_array['request_city'],

					'state'=>$post_data_array['request_state'],

					'zipcode'=>$post_data_array['request_zipcode'],

					'mobile'=>$post_data_array['request_telephone'],

					'fax'=>$post_data_array['request_fax'],

					'modified_datetime'=>date('Y-m-d H:i:s'),

				);

				$this->common_model->update_data('users', $data1,array('id'=>$this->session->userdata['logedin_user']['id'])); 

			}

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('sales@summit-flooring.com', 'Color Innovator');

			$this->email->to('sales@summit-flooring.com');			

			$this->email->subject('Color Innovator - Product Request Sample Form');

			$message = '<h3>New Product Request Found</h3>';

			if($post_data_array['swatch_image_path']!=''){

				$message.= '<img src="'.$post_data_array['swatch_image_path'].'" style="width:325px;height:270px" />';

			}

			if($post_data_array['swatch_image_formula']!=''){

				$message.= '<ul style="display:inline-block;">'.$post_data_array['swatch_image_formula'].'</ul><br>';

			}

			$message.= '<b>Name</b> : '.$post_data_array['request_name'].'<br>';

			$message.= '<b>Company</b> : '.$post_data_array['request_company'].'<br>';

			$message.= '<b>Address</b> : '.$post_data_array['request_address'].'<br>';

			$message.= '<b>City</b> : '.$post_data_array['request_city'].'<br>';

			$message.= '<b>State/Province</b> : '.$post_data_array['request_state'].'<br>';

			$message.= '<b>Zip/Postal</b> : '.$post_data_array['request_zipcode'].'<br>';

			$message.= '<b>Email Id</b> : '.$post_data_array['request_email'].'<br>';

			$message.= '<b>Telephone</b> : '.$post_data_array['request_telephone'].'<br>';

			$message.= '<b>Fax</b> : '.$post_data_array['request_fax'].'<br>';

			$message.= '<b>Tell us about yourself</b> : '.$post_data_array['yourself'].'<br>';

			$message.= '<b>Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage)</b> <br>';

			$message.= $post_data_array['project_description'].'<br>';

			$this->email->message($message);

			if($this->email->send()){

			}

			//$this->session->unset_userdata('request_sample_formula');

			echo true;

		}

		else

		{

			echo false;

		}

	}

	public function send_to_email_from_gallery()

	{

		$email = $this->input->post('send_email_gal'); //$_REQUEST["email"];

        //print_r($email_info);die;

		$swatch_id = $this->input->post('swatch_image_id');

		

		$table="saved_album";

		$swatch_details = $this->common_model->get_single($table, array('id'=>$swatch_id));

		

		$filename = basename($swatch_details['org_image_name']); 

		$filename1 = explode(".",$swatch_details['org_image_name']);

		

		$email_user = $email;

		$email_image_src = $swatch_details['org_image_path'];

		$formula = $swatch_details['image_info'];

		$name_swatch = $swatch_details['swatch_name'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = str_replace("Your Formula","<b>Your Formula</b><br />",$formula1);

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text



		$this->email->initialize($config);

		$this->email->from('sales@summit-flooring.com', 'Color Innovator');

		$this->email->to($email_user);

		$this->email->cc('sales@summit-flooring.com');

		$this->email->subject('Color Innovator - Your Favorite Swatch');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summitflooring" target="_blank">' . $email_twitter_icon . '</a>';



		$email_dino_logo = '<img  style="width:190px;height:48px;" src="https://theoneco.forttechnology.net/~summitflooring/color_conductor/home_assets/images/logo.png" alt="">';

		$email_sumit_logo = '<img  style="width:190px;height:48px;" src="https://theoneco.forttechnology.net/~summitflooring/color_conductor/home_assets/images/submit-flooring.png" alt="">';



		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		$this->email->message('Thank you for using Color Innovator! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/>Stay in the loop with Color Innovator news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $subscribe_link . '&#160;' . $email_facebook . '&#160;' . $email_twitter . '<br/><br/>' . $email_dino_logo . '&#160;&#160;&#160;' . $email_sumit_logo );

		$this->email->send();

		echo true;

	}

	public function google_recaptcha_verify()

	{

		$recaptcha = $this->input->post('g-recaptcha-response');

		if($recaptcha && !empty($recaptcha))

		{

			$secret = '6LcYZ0AUAAAAACkDvVROfwkqPAeunnedx74A4w2T';

			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha);

			$responseData = json_decode($verifyResponse);

			if($responseData->success)

			{

				echo json_encode(TRUE);

			}

			else

			{

				echo json_encode(FALSE);

			}

		}

	}

	function check_mail_not_exist(){

		$email=$this->input->post('emails');

		$filter = array('email'=>$email);

		$emails_data=$this->common_model->get_single('users',$filter);

		if($emails_data!=false)

			echo json_encode(TRUE);

		else

			echo json_encode(FALSE);

	}

	function forgot_password_reset()

	{

		$filter=array(

			'email'=>$this->input->post('forgot_email'),

		);

		$new_password = random_string('alnum',8);

		$data1 = [];

		$data1['password']=md5($new_password);

		$data1['modified_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->update_data('users', $data1,$filter);

		if($flag!=false){

			$details = $this->common_model->get_single('users',$filter);

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('sales@summit-flooring.com', 'Color Innovator');

			$this->email->to($details['email']);

			$this->email->cc('sales@summit-flooring.com');

			$this->email->subject('Color Innovator - Password Recover');



			$message = "Dear <b>".$details['name']."</b> ";

			$message .= "<p>Your new login password for <b>Color Innovator </b>account is given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$details['email']."</p> ";

			$message .= "<p><b>Password : </b>".$new_password."</p> ";

			

			$this->email->message($message);

			$this->email->send();

			

			

			//$data_user=$this->common_model->get_single('users',array('id'=>$flag));

			//$this->session->set_userdata('logedin_user',$data_user);

			//unset($data_user["password"]);

			//$user = json_encode($data_user);

			echo true;

		}

		else{

			echo false;

		}

	}

	public function upload_logo_images(){

		$logedin_user = $this->session->userdata('logedin_user');

		$flag = false;

		if(isset($_FILES['browse_custom_image2'])){

			$upload_image=$this->common_model->custom_upload('browse_custom_image2','user_logo_images/'.$logedin_user['id'].'/',$allowd="JPG|jpg|png|PNG|jpeg|svg|gif|SVG|GIF","");

			if($upload_image){

				$file_name=$upload_image['file_name'];

				$flag=$this->common_model->insert_data('user_logos',array('image_name'=>$file_name,'user_id'=>$logedin_user['id'],'created_datetime'=>date('Y-m-d H:i:s')));

				if($flag!=false){

					echo $flag;

				}

			}

		}

	}

	public function get_user_logos_slider(){

		$logedin_user = $this->session->userdata('logedin_user');

		$html = '';

		$logo_images = $this->common_model->get_by_condition('user_logos',array('user_id'=>$logedin_user['id']));

		if($logo_images!=false){

			foreach($logo_images as $image){

			

				if(file_exists(FCPATH.'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name']) && !is_dir(FCPATH.'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name'])){

					$html .= '<div class="item"><img src="'.base_url().'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name'].'" /></div>';

				}

			}

		}

		echo json_encode($html);

	}

	public function go_to_place_from_generated(){

	  $data= array(

	   'category_id' => $this->input->post('image_category'),

	   'image_info'  =>  $this->input->post('image_info'),

	   'created_date' => date('Y-m-d H:i:s'),

	   'swatch_name' => $this->input->post('your_swatch_name'),

	   'org_image_path' => $this->input->post('generated_swatch_image'),

	   'org_image_name' => $this->input->post('org_image_name'),

	  );

	  $table="saved_album";

	  $id = $this->common_model->insert_data($table, $data); 

		$saved_album = array();

		if($this->session->userdata('saved_album_session')=='')

		{

			$saved_album[$this->input->post('image_category')][] = $id;

			$this->session->set_userdata('saved_album_session',$saved_album);

			//$this->session->unset_userdata('created_image_data');

		}

		else

		{

			$old_session = $this->session->userdata('saved_album_session'); 

			$old_session[$this->input->post('image_category')][] = $id;

			$this->session->unset_userdata('saved_album_session');

			$this->session->set_userdata('saved_album_session',$old_session);

			//$this->session->unset_userdata('created_image_data');

		}

		// $this->session->set_userdata('request_sample_formula',$org_image_name[0]);

	   echo true;

	}



	public function save_transparent_image()

	{

		$user_id 				= $this->input->post('user_id');

		$logo_transparent_name 	= $this->input->post('name_swatch');

		$ids 	 				= $this->input->post('id');



		$album_ids  = explode(',',$ids);

		$flag = false;



		foreach($album_ids as $id)

		{

			$data = array(

						'user_id' 				=> $user_id,

						'logo_transparent_name' => $logo_transparent_name,

						'album_id' 				=> $id 

					);



			$isExists = $this->common_model->get_single('saved_to_logo_transparent',$data);



			if($isExists == false)

			{

				$flag = $this->common_model->insert_data('saved_to_logo_transparent',$data);

			}

		}	



		if($flag != false)

		{

			echo json_encode(TRUE);

		}

		else

		{

			echo json_encode(FALSE);

		}

	}

	public function login_register()

	{

		$loginuser = $this->session->userdata('logedin_user');

		

		if(!$loginuser)

		{

			$this->load->view('view_login_register',$this->data);

		}

		else

		{

			redirect('home');

		}	

	}

}

?>