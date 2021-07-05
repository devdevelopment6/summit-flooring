<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public $data, $logedin, $error, $success;
	
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		
		$this->logedin = $this->session->userdata("logedin");
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		
		$this->load->model('model_admin');
		$this->load->model('ModelUserpermitions');
		$this->load->model('common_model');
		$this->data['logedin'] = $this->logedin;
		
		if ($this->logedin == "") {
			redirect("admin_login");
		}
		$this->data['activemenu'] = "Dashboard";
		$this->data['title'] = "Dashboard";
		$this->data['page'] = "";
		$this->data['panel'] = "Dashboard";
	}
	
	function index()
	{
		$this->data['title']    = "Dashboard";
		$this->data['page']     = "Dashboard";
		$this->data['panel']    = "Home";
		$this->load_view();
	}
	
	function load_view($view = "dashboard")
	{
		$this->load->view('admin/header', $this->data);
		$this->load->view('admin/sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/footer');
	}
	
	function change_password()
	{
		$logedin = $this->session->userdata("logedin");

		if ($logedin['user_type_name'] == 'Super Admin' && $logedin['username'] == 'Superadmin' && $logedin['id'] == 1) {
			$filter = array("id" => $logedin['id']);
			$table = "admin_login_new";
			$getData = $this->common_model->get_single($table, $filter);
			$this->data['user'] = $getData;
		}

		$this->data['page'] = "Change password";
		$this->data['title'] = "Change Password";
		$view = "change_password";
		$this->load_view($view);
	}
	function settings()
	{
		$logedin = $this->session->userdata("logedin");

		if ($logedin['user_type_name'] == 'Super Admin' && $logedin['username'] == 'Superadmin' && $logedin['id'] == 1) {
			$filter = array("id" => $logedin['id']);
			$table = "admin_login_new";
			$getData = $this->common_model->get_single($table, $filter);
			$this->data['user'] = $getData;
		}
		$this->data['settings'] = $this->common_model->get_single('color_innovator_settings',array('id'=>1));
		$this->data['page'] = "Manage Color Innovator Settings";
		$this->data['title'] = "Manage Color Innovator Settings";
		$view = "admin/color_innovator_settings";
		$this->load_view($view);
	}
	function manage_color_inovator_settings()
	{
		$data = array();
		$data['make_section_content'] = $this->input->post('make_section_content');
		$data['logo_section_content'] = $this->input->post('logo_section_content');
		$table = 'color_innovator_settings';
		$settings = $this->common_model->get_single($table,array('id'=>1));
		if($settings!=false){
			$this->common_model->update_data($table,$data,array('id'=>1));	
			$this->session->set_flashdata("success", "Setting details updated successfully!");
		}
		else{
			$data['id'] = 1;
			$this->common_model->insert_data($table,$data);
			$this->session->set_flashdata("success", "Setting details inserted successfully!");
		}
		redirect("admin/settings");
	}
	function check_verify_password()
	{
		$current = md5($this->input->post("current_password"));

		$new_pass = md5($this->input->post("new_password"));

		$rpt_pass = md5($this->input->post("rpt_new_password"));

		if ($current == "" || $new_pass == "" || $rpt_pass == "") {
			$this->session->set_flashdata("error", "Please Insert all fields correctly!");
			redirect("admin/change_password");
			exit;
		}
		if ($new_pass != $rpt_pass) {
			$this->session->set_flashdata("error", "New Password and Repeat New Password are not equal");
		} else {
			$filter = array('id' => $this->data['logedin']['id'], 'password' => $current);
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
		}
		redirect("admin/change_password");
	}
	function logout()
	{
		$this->session->unset_userdata("logedin");
		$this->session->set_flashdata("success", "You are Successfuly Logged Out");
		redirect("admin_login");
	}
}