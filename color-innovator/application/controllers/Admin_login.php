<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin_login extends CI_Controller {

	

	public $data,$logedin, $error, $success;

	

	function __construct() {

		parent::__construct();



		$this->logedin = $this->session->userdata("logedin");

		

		$this->load->helper('url');

		$this->load->library('Color_image_lib');

		$this->load->model('Model_color');

		

		$this->data['error']	= $this->session->flashdata("error");

		$this->data['success']	= $this->session->flashdata("success");

		

		$captcha_config =  array(  'captchaConfig' => 'admincaptcha' , "CaptchaId" => 'admincaptcha');

		//$this->load->library('botdetect/BotDetectCaptcha', $captcha_config);

		//$this->data['captcha'] = $this->botdetectcaptcha->Html();

		

		$this->data['title']	= "Admin Login";

		$this->data['page']		= "Admin Login";

		

		//$this->load->model('common_model');

		$this->load->model('common_model');

	}



	function index()

	{

		if($this->logedin != "")

		{

			redirect("admin");

		}		

		$this->load_view();

	}



	function load_view($view = "admin_login")

	{

		$this->load->view("admin/".$view, $this->data);

	}

	

	function load_view_2($view = "")

	{

	    if($view!="")

	    {

		    $this->load->view($view, $this->data);

	    }

	}

	

	function authorize()

	{

		$username = $this->input->post("username");



		$password = md5($this->input->post("password"));



		//$captcha = $this->input->post("captcha");



		/*if($this->botdetectcaptcha->Validate($captcha))

		{*/

			

			if($username == "" || $password == "")

			{

				redirect("admin_login");

			}

			



			$filter = array('username' => $username, 'password' => $password);

			$table 	= 'admin_login_new';

			$data = $this->common_model->get_single($table, $filter);

			

			

			if($data != false)

			{

				

				if(strcmp($username, $data['username']) == 0 && strcmp($password, $data['password']) == 0)

				{

					unset($data['password']);



					$filter = array("id" => $data['user_type_id']);



					$table = "user_types";



					$type = $this->common_model->get_single($table, $filter);

					//print($type);



					if ($type != false) {



						$data['user_type_name'] = $type['user_type_name'];

					}

					$this->session->set_userdata('logedin', $data);

					

				}

				else{

					$this->session->set_flashdata("error", "Invalid Username DSFSD Or Password!");

				}

			}

			else

			{

				$this->session->set_flashdata("error", "Invalid Username DSFS122 Or Password!");

			}

		/*}

		else

		{

			$this->session->set_flashdata("error", "ERROR! Invalid Captcha code!");

		}
*/
		redirect("admin_login");

	}

	

	function send_password(){



		$email = $this->input->post("email");

        

        //echo $email;die;

        

		$table = "admin_login_new";



       	$filter =  array("email" => $email);



        $token['token']=md5(uniqid(rand(), true));

		

        $succ = $this->common_model->update_data($table,$token,$filter);

		if($succ != "")

		{

            $flag = $this->common_model->get_single($table, $filter);



            if($flag !="")

            {

                $email = $flag['email'];

                

                $from = 'info@summit-flooring.com';

                

                $this->email->from($from);



                $this->email->to($email);

                

                $this->email->subject('Your User Name And Password');



                $key = $flag['token'];



                $message = "Please click this url to change your password ". base_url()."admin_login/reset_now/".$key ;



                $this->email->message($message);



                $msg=$this->email->send();



                if($msg != "")

                {

                    $this->session->set_flashdata('success', "Your password and user name send on your email address.");

                }

                else

                {

                    $this->session->set_flashdata("error", "ERROR! While Processing");

                }

            }

            else

            {

                $this->session->flashdata("error","Error in Token generation");

            }

		}

		else{

				$this->session->set_flashdata("error", "PLASE Enter Corret Email address");

		}

		redirect("admin_login");

	}

	

	function reset_now()

    {

        $this->load_view_2("reset_password");

    }

    

    function resetnew_password($token)

    {

        $new_pass = $this->input->get_post("pass");

        $rpt_pass = $this->input->get_post("conf_pass");

        

        if ($new_pass == "" || $rpt_pass == "") {

            $this->session->set_flashdata("error", "Please Insert all fields correctly!");

            redirect("admin_login/");

            exit;

        }

        

        if($new_pass != "")

        {

            $new_pass = md5($this->input->get_post("pass"));

        }

        if($rpt_pass != '') 

        {

            $rpt_pass = md5($this->input->get_post("conf_pass"));

        }

       



        if ($new_pass != $rpt_pass) {

            $this->session->set_flashdata("error", "New Password and Repeat New Password are not equal");

            redirect('admin_login/');

        } else {

            $filter = array('token' => $token);

            $table = "admin_login_new";

            $flag = $this->common_model->get_single($table, $filter);

			

            if ($flag != false) {



                $data = array("password" => $new_pass);



                $flag = $this->common_model->update_data($table, $data, $filter);



                if ($flag != false) {



                    $this->session->set_flashdata("success", "Your password has been changed successfully!");



                } else {



                    $this->session->set_flashdata("error", "ERROR! Unknown Error!");



                }



            } else {



                $this->session->set_flashdata("error", "Authentication Failed, Incorrent Admin password");



            }

            redirect('admin_login/');

        }

    }

}