<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Application_categories extends CI_Controller {
	
	public $data, $logedin, $error, $success;
	
	function __construct() {
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
		$this->data['activemenu'] = "Application Categories";
		$this->data['title'] = "Application Categories";
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
	
	function add_application_category()
	{
	    $this->data['page'] = "Application Categories";
		$this->data['title'] = "Application Categories";
		$this->data['panel']    = "Dashboard";
		$view = "application_categories/add_application_category";
		$this->load_view($view);
	}
	
	function view_application_categories()
	{
		$this->data['page'] = "Application Categories";
		$this->data['title'] = "Application Categories";
		$this->data['panel']    = "Dashboard";
		$view = "application_categories/view_application_categories";
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
		$data=array();
		$data['category_name']=$this->input->post('cat_name');
		$data['header_title']=$this->input->post('title');
		$data['header_content']=$this->input->post('header_content');
		$data['section_title']=$this->input->post('section_title');
		$data['section_content']=$this->input->post('section_content');
		$data['display_order']=$this->input->post('display_order');
		if($this->input->post('category_status')){
			$data['status']=1;
		}
		else{
			$data['status']=0;
		}
		return $data;
	}
	
	function insert_application_category()
	{
		$data=$this->get_post_data();
		$data['created_datetime']=date('Y-m-d H:i:s');
		$table='application_categories';
		$flag=$this->common_model->insert_data($table,$data);
       
		if($flag!=false)
		{	
			$data = array();
			if($_FILES['banner_image']['name']!=''){
				
				$homepage_image=$this->common_model->upload('banner_image','category_banner_images/'.$flag.'/',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($homepage_image!=false){
					$data['banner_image']=$homepage_image['file_name'];
				}
			}
			if($_FILES['section_image']['name']!=''){
				$section_image=$this->common_model->upload('section_image','category_section_images/'.$flag.'/',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($section_image!=false){
					$data['section_image']=$section_image['file_name'];
				}
			}
			if($_FILES['application_banner_image']['name'] != ''){
				$app_section_image=$this->common_model->upload('application_banner_image','category_application_images/'.$flag.'/',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($app_section_image!=false){
					$data['application_banner_image']=$app_section_image['file_name'];
				}
			}
			$this->common_model->update_data($table,$data,array('id'=>$flag));
			$this->set_success("Application Category Added Successfully");
		}
		else
		{
			$this->set_success("Application Category not inserted");
		}
		redirect('application_categories/view_application_categories');
	}
	
	function get_application_categories()
	 {
        $joinColumsName =array("id as cid,id,category_name,status");
        $aColumns       = array("cid","category_name","status");
        $findColumns    = array("id","category_name");
	
		$sTable = 'application_categories';

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
		$j=0;
        foreach($rResult->result_array() as $aRow) {
			
            $row = array();
			
            foreach ($aColumns as $col) {
				
				if( $col == 'cid')
				{
					$aRow['cid']=++$j;
				}
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Deactive';
					}
				}
                $row[] = $aRow[$col];
				
            }

            //print_r($city);

            $row[] = '<div class="action-buttons">
						<a class="green" href="'.base_url().'application_categories/edit_application_category/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
                       
						<a class="red delete_link" href="'.base_url().'application_categories/delete_application_category/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';
			
            $output['aaData'][] = $row;

        }

        echo json_encode($output);
    }
	
	function delete_application_category($id='')
	{
		
		$data=$this->common_model->get_single('application_categories',array('id'=>$id));
		if($data!=false)
		{
			if($data['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']))
			{
				unlink(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']);
			}
			if($data['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']))
			{
				unlink(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']);
			}
if($data['section_image']!='' && file_exists(FCPATH.'uploads/category_section_images/'.$data['id'].'/'.$data['section_image']) && !is_dir(FCPATH.'uploads/category_section_images/'.$data['id'].'/'.$data['section_image']))
			{
				unlink(FCPATH.'uploads/category_section_images/'.$data['id'].'/'.$data['section_image']);
			}
			if($data['section_image']!='' && file_exists(FCPATH.'uploads/category_section_images/'.$data['id'].'/thumbs/'.$data['section_image']) && !is_dir(FCPATH.'uploads/category_section_images/'.$data['id'].'/thumbs/'.$data['section_image']))
			{
				unlink(FCPATH.'uploads/category_section_images/thumbs/'.$data['id'].'/'.$data['section_image']);
			}
			
			if($data['application_banner_image']!='' && file_exists(FCPATH.'uploads/category_application_images/'.$data['id'].'/'.$data['application_banner_image']) && !is_dir(FCPATH.'uploads/category_application_images/'.$data['id'].'/'.$data['application_banner_image']))
			{
				unlink(FCPATH.'uploads/category_application_images/'.$data['id'].'/'.$data['application_banner_image']);
			}
			if($data['application_banner_image']!='' && file_exists(FCPATH.'uploads/category_application_images/'.$data['id'].'/thumbs/'.$data['application_banner_image']) && !is_dir(FCPATH.'uploads/category_application_images/'.$data['id'].'/thumbs/'.$data['application_banner_image']))
			{
				unlink(FCPATH.'uploads/category_application_images/thumbs/'.$data['id'].'/'.$data['application_banner_image']);
			}
			
			$this->common_model->delete_data('application_sub_categories',array('category_id'=>$id));
			$this->common_model->delete_data('application_details',array('category_id'=>$id));
			$flag=$this->common_model->delete_data('application_categories',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}	
		}
		redirect('application_categories/view_application_categories');
	}
	
	function edit_application_category($id='')
	{
		
		$this->data['page'] = "Edit Application Category";
		$this->data['title'] = "Edit Application Category";
		$this->data['panel']    = "Dashboard";
		$this->data['application_category']=$this->common_model->get_single('application_categories',array('id'=>$id));
		$view = "application_categories/edit_application_category";
		$this->load_view($view);
	}
	
	function update_application_category()
	{
		$data=$this->get_post_data();
		$data['modified_datetime']=date('Y-m-d H:i:s');
		$id=$this->input->post('cat_id');
		$table='application_categories';
		$filter=array('id'=>$id);
		$data2=$this->common_model->get_single($table,$filter);
        if($data2!=false)
		{	
			if($_FILES['banner_image']['name']!=''){
				if($data2['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/'.$data2['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/'.$data2['banner_image']))
				{
					unlink(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/'.$data2['banner_image']);
				}
				if($data2['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/thumbs/'.$data2['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/thumbs/'.$data2['banner_image']))
				{
					unlink(FCPATH.'uploads/category_banner_images/'.$data2['id'].'/thumbs/'.$data2['banner_image']);
				}
				
				$homepage_image=$this->common_model->upload('banner_image','category_banner_images/'.$data2['id'].'/',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($homepage_image!=false){
					$data['banner_image']=$homepage_image['file_name'];
				}
			}
			if($_FILES['section_image']['name']!=''){
				if($data2['section_image']!='' && file_exists(FCPATH.'uploads/category_section_images/'.$data2['id'].'/'.$data2['section_image']) && !is_dir(FCPATH.'uploads/category_section_images/'.$data2['id'].'/'.$data2['section_image']))
				{
					unlink(FCPATH.'uploads/category_section_images/'.$data2['id'].'/'.$data2['banner_image']);
				}
				if($data2['section_image']!='' && file_exists(FCPATH.'uploads/category_section_images/'.$data2['id'].'/thumbs/'.$data2['section_image']) && !is_dir(FCPATH.'uploads/category_section_images/'.$data2['id'].'/thumbs/'.$data2['section_image']))
				{
					unlink(FCPATH.'uploads/category_section_images/thumbs/'.$data2['id'].'/'.$data2['banner_image']);
				}
				$section_image=$this->common_model->upload('section_image','category_section_images/'.$data2['id'].'/',$allowd="jpg|jpeg|png|svg",array());
				if($section_image!=false){
					$data['section_image']=$section_image['file_name'];
				}
			}
			if($_FILES['application_banner_image']['name'] != ''){
				if($data2['application_banner_image']!='' && file_exists(FCPATH.'uploads/category_application_images/'.$data2['id'].'/'.$data2['application_banner_image']) && !is_dir(FCPATH.'uploads/category_application_images/'.$data2['id'].'/'.$data2['application_banner_image']))
				{
					unlink(FCPATH.'uploads/category_application_images/'.$data2['id'].'/'.$data2['application_banner_image']);
				}
				if($data2['application_banner_image']!='' && file_exists(FCPATH.'uploads/category_application_images/'.$data2['id'].'/thumbs/'.$data2['application_banner_image']) && !is_dir(FCPATH.'uploads/category_application_images/'.$data2['id'].'/thumbs/'.$data2['application_banner_image']))
				{
					unlink(FCPATH.'uploads/category_application_images/thumbs/'.$data2['id'].'/'.$data2['application_banner_image']);
				}
				$app_section_image=$this->common_model->upload('application_banner_image','category_application_images/'.$data2['id'].'/',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($app_section_image!=false){
					$data['application_banner_image']=$app_section_image['file_name'];
				}
			}
			$flag=$this->common_model->update_data($table,$data,$filter);
			//print_r($flag);
			if($flag != false)
			{
				$this->set_success("Application Category updated Successfully");
			}
			else
			{
				$this->set_error("Application Category not updated!!");
			}
		}
		else
		{
			$this->set_success("Unknown Error...!!!");
		}
		redirect('application_categories/view_application_categories');
	}
	function delete_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "application_categories";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			if($data['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']))
			{
				unlink(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['banner_image']);
			}
			if($data['banner_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']))
			{
				unlink(FCPATH.'uploads/category_banner_images/'.$data['id'].'/thumbs/'.$data['banner_image']);
			}
			$data1 = array("banner_image"=>NULL);
			$flag = $this->common_model->update_data($table,$data1,$filter);
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
	function delete_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "application_categories";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			if($data['section_image']!='' && file_exists(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['section_image']) && !is_dir(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['section_image']))
			{
				unlink(FCPATH.'uploads/category_banner_images/'.$data['id'].'/'.$data['section_image']);
			}
			if($data['section_image']!='' && file_exists(FCPATH.'uploads/category_section_images/'.$data['id'].'/thumbs/'.$data['section_image']) && !is_dir(FCPATH.'uploads/category_section_images/'.$data['id'].'/thumbs/'.$data['section_image']))
			{
				unlink(FCPATH.'uploads/category_section_images/'.$data['id'].'/thumbs/'.$data['section_image']);
			}
			$data1 = array("section_image"=>NULL);
			$flag = $this->common_model->update_data($table,$data1,$filter);
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
}