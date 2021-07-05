<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Product_page extends CI_Controller
{

	public $data, $logedin, $error, $success;

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->logedin = $this->session->userdata("logedin");

		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");

		$this->load->model('model_admin');
		$this->load->model('common_model');
		$this->load->model('ModelUserpermitions');
		$this->data['logedin'] = $this->logedin;

		if ($this->logedin == "") {
			redirect("admin_login");
		}
		$this->data['activemenu'] = "Product Page";
		$this->data['title'] = "Product Page";
		$this->data['page'] = "";
		$this->data['panel'] = "Dashboard";
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

	function view_category()
	{
		$this->data['page'] = "Product Page";
		$this->data['title'] = "Product Page";
		$this->data['panel']    = "Dashboard";
		$view = "view_product_page";
		$this->load_view($view);
	}

	function load_view($view = "")
	{
		$this->load->view('admin/header', $this->data);
		$this->load->view('admin/sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/footer');
	}

	function get_post_data()
	{
		$name=$this->input->post('category_name');
		$content=$this->input->post('description');
		$middle_title_1=$this->input->post('middle_title_1');
		$middle_title_2=$this->input->post('middle_title_2');
		$middle_title_3=$this->input->post('middle_title_3');
		$middle_title_4=$this->input->post('middle_title_4');
		$middle_content_1=$this->input->post('middle_content_1');
		$middle_content_2=$this->input->post('middle_content_2');
		$middle_content_3=$this->input->post('middle_content_3');
		$middle_content_4=$this->input->post('middle_content_4');

		$status=$this->input->post('status');
		$now = date('Y-m-d H:i:s');

		$data=array(
			'name'=>$name,
			'category_content'=>$content,
			'middle_content_title_1'=>$middle_title_1,
			'middle_content_1'=>$middle_content_1,
			'middle_content_title_2'=>$middle_title_2,
			'middle_content_2'=>$middle_content_2,
			'middle_content_title_3'=>$middle_title_3,
			'middle_content_3'=>$middle_content_3,
			'middle_content_title_4'=>$middle_title_4,
			'middle_content_4'=>$middle_content_4,
			'status'=>$status,
			'created'=>$now
		);
		if($_FILES['indoor_banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('indoor_banner_image','product_page_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		return $data;
	}

	function delete_category_banner_image()
	{
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
		$table = "product_category";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("banner_image"=>'Image.jpg');
			$flag = $this->common_model->update_data($table,$data,$filter);
			if ($flag != false)
			{
				return "1";
			}
			else
			{
				return "0";
			}
		}
		else
		{
			return "0";
		}
		return "0";
	}

	function add_product_page()
	{
		$this->data['page'] = "Product Page Category";
		$this->data['title'] = "Product Page Category";
		$this->data['panel']    = "Dashboard";
		$view = "add_product_page_category";
		$this->load_view($view);
	}

	function add_product_page_category()
	{
		$data=$this->get_post_data();
		$table='product_page';
		$flag=$this->common_model->insert_data($table,$data);

		if($flag!=false)
		{
			$this->set_success("Product Page Category Added Successfully");
		}
		else
		{
			$this->set_success("Product Page Category not inserted");
		}
		redirect('product_page/view_category');
	}

	function get_product_category()
	{
		$joinColumsName =array("id,name,status,");
		$aColumns       = array("id","name","status");
		$findColumns    = array("id","name");

		$sTable = 'product_page';

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
			'sEcho' => intval($sEcho),

			'iTotalRecords' => $iTotal,

			'iTotalDisplayRecords' => $iFilteredTotal,

			'aaData' => array()
		);

		foreach($rResult->result_array() as $aRow) {


			$row = array();


			foreach ($aColumns as $col) {

				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Inactive';
					}
				}
				$row[] = $aRow[$col];

			}

			//print_r($city);

			$row[] = '<div class="hidden-sm  action-buttons">
						<a class="green" href="'.base_url().'product_page/edit_category/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
                       
						<a class="red delete_link" href="'.base_url().'product_page/delete_product_category/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';

			$output['aaData'][] = $row;

		}

		echo json_encode($output);
	}

	function delete_product_category($id='')
	{

		$data=$this->common_model->get_single('product_page',array('id'=>$id));
		if($data!=false)
		{
			$flag=$this->common_model->delete_data('product_page',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}
		}
		redirect('product_page/view_category');
	}

	function edit_category($id='')
	{

		$this->data['page'] = "Edit Product Page";
		$this->data['title'] = "Edit Product Page";
		$this->data['panel']    = "Dashboard";

		$this->data['categories']=$this->common_model->get_single('product_page',array('id'=>$id));
		$view = "edit_product_page";
		$this->load_view($view);
	}

	function update_product_category()
	{
		$data=$this->get_post_data();
		$id=$this->input->post('category_id');
		$table='product_page';
		$filter=array('id'=>$id);
		$data2=$this->common_model->get_single($table,$filter);
		if($data2!=false)
		{
			$flag=$this->common_model->update_data($table,$data,$filter);
			//print_r($flag);
			if($flag != false)
			{
				$this->set_success("Product Page updated Successfully");
			}
			else
			{
				$this->set_error("Product Page not updated Successfully");
			}
		}
		else
		{
			$this->set_success("Unknown Error...!!!");
		}
		redirect('product_page/view_category');
	}

}