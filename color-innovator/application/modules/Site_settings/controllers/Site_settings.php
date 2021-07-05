<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Site_settings extends MX_Controller {
	
	public $data, $logedin;
	
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		
		$this->logedin = $this->session->userdata("logedin");
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		
		//$this->load->model('model_admin');
		//$this->load->model('ModelUserpermitions');
		$this->load->model('common_model');
		$this->data['logedin'] = $this->logedin;
		
		if ($this->logedin == "") {
			redirect("admin_login");
		}
		$this->data['activemenu'] = "Site Settings";
		$this->data['title'] = "Site Settings";
		$this->data['page'] = "";
		$this->data['panel'] = "Site Settings";
	}
	
	function load_view($view = "site_settings")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function index()
	{
		$this->data['settings']=$this->common_model->get_single('site_settings_table',array('id'=>1));
		$this->data['page']     = "Update Settings";
		$view='site_settings';
		$this->load_view($view);
	}
	function update_settings(){
		$data_array=$this->get_site_settings_data();
		$get_single_settings=$this->common_model->get_single('site_settings_table',array('id'=>1));
		if($get_single_settings!=false){
			$data_array['updated_datetime']=date('Y-m-d H:i:s');
			$this->common_model->update_data('site_settings_table',$data_array,array('id'=>1));
		}
		else{
			$data_array['created_datetime']=date('Y-m-d H:i:s');
			$this->common_model->insert_data('site_settings_table',$data_array);
		}
		$this->set_success("Site Settings Updated Successfully!!");
		redirect('site_settings');
		
	}
	function get_site_settings_data(){
		$data =array();
		$data['step_one_title']=$this->input->post('step_one_title');
	    $data['step_one_editor']=$this->input->post('step_one_editor');
	    $data['step_two_title']=$this->input->post('step_two_title');
	    $data['step_two_editor']=$this->input->post('step_two_editor');
	    $data['step_three_title']=$this->input->post('step_three_title');
	    $data['step_three_editor']=$this->input->post('step_three_editor');
		$data['step_four_title']=$this->input->post('step_four_title');
		$data['step_four_editor']=$this->input->post('step_four_editor');
	    $data['step_five_title']=$this->input->post('step_five_title');
		$data['step_five_editor']=$this->input->post('step_five_editor');
	    return $data;
	}
	function set_error($alert = "")
	{
		$this->session->set_flashdata("error", $alert);
		return true;
	}

	function set_success($alert = "")
	{
		$this->session->set_flashdata("success", $alert);
		return true;
	}
}