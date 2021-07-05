<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ModelUserpermitions extends CI_Model

{

	function __construct()

	{

		parent::__construct();

		//$this->load->library("../modules/Admin/Admin");

	}



	function permitions()

	{

		$methods['Admin'] = array(

				'change_password'   => "Change Password",

				'user_types'        => 'View Usertypes',

				'add_usertypes'     => 'Add New Usertype',

				'delete_usertype'   => 'Delete Usertype',

				'update_usertype'   => 'Update usertype'

			);



		$controllers['Admin'] = get_class_methods(new Admin());

		echo "<pre>";

		print_r($controllers);die;



		$restrict = array();



		foreach($controllers as $controller => $value)

		{

			foreach($methods[$controller] as $method => $method_text)

			{

				if(in_array($method, $controllers[$controller]))

				{

					$restrict[] = array('method' => $controller.'/'.$method, 'text' => $method_text);

				}

			}

		}



		echo "<pre>";

		print_r($restrict);

		die;

	}



	function check_permition($link, $type)

	{

		$filter = array('link' => $link, 'usertype' => $type, 'privacy' => 1);

		$table  = "role_permitions";

		$data   = $this->db->get_where($table, $filter);
		
		if($data->num_rows() > 0)

		{

			return 1;

		}

		else

		{

			return 0;

		}

	}





}

?>