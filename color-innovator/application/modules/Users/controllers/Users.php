<?php

defined('BASEPATH') or exit('No Direct Scrept Allowed!');

class Users extends MX_Controller
{
	public $data, $logedin, $error, $success;

	function __construct()
	{
		parent::__construct();
		$this->logedin = $this->session->userdata("logedin");
		$this->data['logedin'] = $this->logedin;
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");
		$this->load->model('common_model');
		$this->data['activemenu'] = "Users";
		$this->data['title'] = "Users";
		$this->data['page'] = "";
		$this->data['panel'] = "Dashboard";

		//$this->load->module("menu/Menu");
	}

	function index()
	{
		$this->data['activemenu'] = "View Users";
		$this->data['page'] = "View Users";
		$view = "view_users";
		$this->load_view($view);
	}
	function load_view($view = "view_users")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}

	function create_user()
	{
		$this->data['activemenu'] = "Add User";
		$this->data['page'] = "Add New User";
		$view = "create_user";
		$this->load_view($view);
	}

	function create_new_user()
	{
		$data = $this->get_user_post();
		$data['created_datetime'] = date('Y-m-d H:i:s');
		$table = "users";

		$flag = $this->common_model->insert_data($table, $data);

		if($flag != false)
		{
			
			$this->set_success("New User : ".$data['user_name']." created successfuly!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}

		redirect("users/create_user");
	}

	function get_user_post()
	{
		$data['user_name']    = $this->input->post('user_name');
		$data['email']     = $this->input->post('email_id');
		$data['mobile']       = $this->input->post('mobile');
		if($this->input->post('password')!=''){
			$data['password']  = md5($this->input->post('password'));
		}
		$data['status']     = $this->input->post('status');
		$data['ip_address']    = $this->input->ip_address();
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

	function get_users()
	{
		$joinColumsName = array("cl.id, cl.user_name, cl.email, cl.mobile,cl.status,cl.created_datetime");
		$aColumns       = array("user_name", "email", "mobile","status");
		$findColumns    = array('user_name','email','mobile');
		$sTable = 'users AS cl';

		$iDisplayStart  = $this->input->get_post('iDisplayStart', true);

		$iDisplayLength = $this->input->get_post('iDisplayLength', true);

		$iSortCol_0     = $this->input->get_post('iSortCol_0', true);

		$iSortingCols   = $this->input->get_post('iSortingCols', true);

		$sSearch        = $this->input->get_post('sSearch', true);

		$sEcho          = $this->input->get_post('sEcho', true);

		// Paging

		if(isset($iDisplayStart) && $iDisplayLength != '-1')

		{

			$this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));

		}

		// Ordering

		if(isset($iSortCol_0))

		{

			for($i=0; $i<intval($iSortingCols); $i++)

			{

				$iSortCol = $this->input->get_post('iSortCol_'.$i, true);

				$bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);

				$sSortDir = $this->input->get_post('sSortDir_'.$i, true);

				if($bSortable == 'true')
				{
					$this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
				}

			}

		}

		/*

		* Filtering

		* NOTE this does not match the built-in DataTables filtering which does it

		* word by word on any field. It's possible to do here, but concerned about efficiency

		* on very large tables, and MySQL's regex functionality is very limited

		*/

		if(isset($sSearch) && !empty($sSearch))

		{

			for($i=0; $i<count($findColumns); $i++)

			{

				$bSearchable = $this->input->get_post('bSearchable_'.$i, true);

				// Individual column filtering

				if(isset($bSearchable) && $bSearchable == 'true'){

					if($i==0)

					{

						$this->db->where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

					}

					elseif($i==count($findColumns))

					{

						$this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' )");

					}

					else

					{

						$this->db->or_where($findColumns[$i]." LIKE '%".$this->db->escape_like_str($sSearch)."%' ");

					}

					//$mCount++;

				}

			}

		}


		// Select Data

		$this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $joinColumsName)), false);

		$rResult = $this->db->get($sTable);

		// Data set length after filtering

		$this->db->select('FOUND_ROWS() AS found_rows');

		$iFilteredTotal = $this->db->get()->row()->found_rows;

		// Total data set length

		$iTotal = $this->db->count_all($sTable);

		// Output

		$output = array(

			'sEcho' => intval($sEcho),

			'iTotalRecords' => $iTotal,

			'iTotalDisplayRecords' => $iFilteredTotal,

			'aaData' => array()

		);
		$i=0;
		foreach($rResult->result_array() as $aRow) {

			$row = array();

			$row[]=++$i;
			foreach ($aColumns as $col) {
				if($col=='status'){
					if($aRow['status']==0){
						$aRow['status']="Inactive";
					}
					else
					{
						$aRow['status']="Active";
					}
				}
				$row[] = $aRow[$col];

			}

			$row[] = '<div class="action-buttons">
						<a class="green" href="'.base_url().'users/edit_user/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red delete_user" data-id="'.$aRow['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function delete_user($id = "")
	{
		if ($id != "")
		{
			$filter = array("id" => $id);
			$table = "users";

			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$flag = $this->common_model->delete_data($table,$filter);

				if ($flag != false)
				{
					$this->set_success("User '" . $data['user_name'] . "' Deleted successfuly!");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
				}
			}
			else
			{
				$this->set_error("ERROR! Record Does not exists.");
			}
		}
		else
		{
			$this->set_error("ERROR! unkown Error!");
		}

		redirect("users");
	}

	function edit_user($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "users";			
			$data = $this->common_model->get_single($table, $filter);
			if ($data != false) {
				$this->data['user'] = $data;
					
			} else {
				$this->set_error("ERROR! Record Does not exists.");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
		}
		$view = "view_edit_user";
		$this->data['page'] = "Edit User - ".$data['user_name'];
		$this->load_view($view);

	}

	function update_user($id = "")
	{
		if ($id != "") {
			$filter = array("id" => $id);
			$table = "users";

			$flag = $this->common_model->get_single($table, $filter);
			if ($flag != false) {

				$data = $this->get_user_post();
				$data['modified_datetime'] = date('Y-m-d H:i:s');

				$flag = $this->common_model->update_data($table, $data, $filter);
				if($flag != false)
				{
					$this->set_success("User updated successfuly!");
				}
				else{
					$this->set_error("ERROR! While updating user profile!");
				}

			} else {
				$this->set_error("ERROR! Record Does not exists.");
				redirect("users");
			}
		} else {
			$this->set_error("ERROR! unkown Error!");
			redirect("users");
		}

		redirect("users/edit_user/".$id);
	}
	function check_email($email_id=""){
		$email_id = $this->input->post('email');
		$table='users';
		$email_value=$this->common_model->get_single($table,array('email'=>$email_id));
		if($email_value != false)
			echo json_encode(FALSE);
		else
			echo json_encode(TRUE);
	
	}
	function check_email_edit($email_id="",$client_id=""){
		$email_id = $this->input->post('email');
		$user_id=$this->input->post('user_id');
		$table='users';
		$email_value=$this->common_model->get_single($table,array('email'=>$email_id,'id!='=>$user_id));
		if($email_value != false)
			echo json_encode(FALSE);
		else
			echo json_encode(TRUE);
	
	}
	function delete_multiple_users()
	{
		$flag = false;
		$i = 0;
		$users =  $this->input->post('mul_del');
		$no=count($clients);
		if($users == "" || $users == NULL)
		{
			$this->set_error("You did not Select any record.");
		}
		else
		{
			for($i=0;$i<count($users);$i++){	
				$filter = array("id=" => $users[$i]);
				$flag = $this->common_model->delete_data('users', $filter);
				if($flag != false)
				{
					$this->set_success($no." Record(s) Deleted successfuly!");
				}
				else
				{
					$this->set_error("Error! While Processing!");
				}
			}
		}
		
	redirect("users");
	}
}

?>