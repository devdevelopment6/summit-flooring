<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Manage_home extends CI_Controller {
	
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
		$this->data['activemenu'] = "CMS Pages";
		$this->data['title'] = "Manage Home";
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
	
	function index()
	{
	    $this->data['page'] = "About Us";
		$this->data['title'] = "About Us";
		$this->data['panel']    = "Dashboard";
		$view = "manage_about";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/header', $this->data);
		$this->load->view('admin/sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/footer');
	}
	
	function manage_homepage(){
	    $this->data['page'] = "Home";
		$this->data['title'] = "Home";
		$view = "manage_homepage";
		$this->load_view($view);
	}
	function add_homepage()
	{
		$this->data['page'] = "Home";
		$this->data['title'] = "Home Content";
		$view = "add_homepage_content";
		$this->load_view($view);
	}
	
	function homepage_post_data()
    {
        $now = date('Y-m-d H:i:s');
		
        $data['top_content_title'] 		= 	$this->input->get_post('top_content_title');
		$data['top_content']=	$this->input->get_post('top_content');
		
		$data['middle_content_title_1']		=	$this->input->get_post('middle_content_title_1');
		$data['middle_content_1']				=	$this->input->get_post('middle_content_1');
		
		$data['middle_content_title_2']				=	$this->input->get_post('middle_content_title_2');
		$data['middle_content_2']				=	$this->input->get_post('middle_content_2');
		
		$data['middle_content_title_3']				=	$this->input->get_post('middle_content_title_3');
		$data['middle_content_3']				=	$this->input->get_post('middle_content_3');
		
		$data['bottom_content_title']				=	$this->input->get_post('bottom_content_title');
		$data['bottom_content']				=	$this->input->get_post('bottom_content');
		
		$data['testimonial_content']				=	$this->input->get_post('testimonial_content');
		$data['bottom_info_title']				=	$this->input->get_post('bottom_info_title');
		$data['bottom_info_content']				=	$this->input->get_post('bottom_info_content');
		
		if($_FILES['banner_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_image','home_banner_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['banner_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['banner_title_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_title_image','home_banner_title_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['banner_title_image']=$homepage_image['file_name'];
            }
        }
		
		$data['status']				=	$this->input->get_post('status');
			
		return $data;
    }
	
	function add_homepage_content()
	{
		$table="home_content";
		$data=$this->homepage_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
			if($flag!= '')
			{
				$this->set_success("Home Content Added Successfully");
				redirect("manage_home/manage_homepage/");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
				redirect("manage_home/manage_homepage/");
			}																																																				
		redirect("manage_home/manage_homepage/");
	}
	
	function delete_banner_image()
    {
		$id			=	$this->input->get_post('id');
        $table = "home_content";
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
    }
	
	function get_home_content()
    {
        $joinColumsName =array("id,top_content_title,top_content,middle_content_title_1,middle_content_1,middle_content_title_2,middle_content_2,middle_content_title_3,middle_content_3,bottom_content_title,bottom_content,status,created_date,updated_date");
        $aColumns       = array("id","top_content_title","middle_content_title_1","middle_content_title_2","middle_content_title_3","bottom_content_title","status");
        $findColumns    = array("id","top_content_title","middle_content_title_1","middle_content_title_2","status");
        $sTable = 'home_content';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_home_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_header_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_home_content($id='')
	{
		$this->data['title'] = "Home";
		$this->data['page'] = "Home";
        if($id!=''){	
			$this->data['home']		=	$this->common_model->get_single('home_content',array('id'=>$id));
			$view="edit_home_content";
        	$this->load_view($view);
        }
	}
	
	function update_home_content($id="")
	{
		$table="home_content";
        $result=$this->homepage_post_data();
		$filter=array('id'=>$id);
		$data = $result;

			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Home Content Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_homepage/");
	}
	
	function manage_header(){
	    $this->data['page'] = "Header Content";
		$this->data['title'] = "Header Content";
		$view = "manage_header";
		$this->load_view($view);
	}
	
	function add_header()
	{
		$this->data['page'] = "Header Content";
		$this->data['title'] = "Header Content";
		$view = "add_header";
		$this->load_view($view);
	}
	
	function header_post_data()
    {
        $now = date('Y-m-d H:i:s');
		
        $data['header_title'] 	= 	$this->input->get_post('header_title');
		$data['header_short_content']	=	$this->input->get_post('header_short_content');
		$data['header_content']	=	$this->input->get_post('header_content');
		$data['status']			=	$this->input->get_post('status');
		
		return $data;
    }
	
		function add_header_content()
		{
			$table="header_content";
			$data=$this->header_post_data();
			
			$now = date('Y-m-d H:i:s');
			$data['created_date']	= $now;
			
			$flag=$this->common_model->insert_data($table,$data);
				if($flag!= '')
				{
					$this->set_success("Header Content Added Successfully");
					redirect("manage_home/manage_header/");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
					redirect("manage_home/manage_header/");
				}																																																				
			redirect("manage_home/manage_header/");
		}
			
		function get_header_content()
    	{
        $joinColumsName =array("id,header_title,header_short_content,status,header_content,created_date,updated_date");
        $aColumns       = array("id","header_title","header_short_content","status");
        $findColumns    = array("id","header_title","header_short_content","status");
        $sTable = 'header_content';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_header_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red delete_link" href="'.base_url().'manage_home/delete_header_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
		
	function edit_header_content($id='')
	{
		$this->data['title'] = "About Us";
		$this->data['page'] = "About Us";
        if($id!=''){	
			$this->data['header_content']		=	$this->common_model->get_single('header_content',array('id'=>$id));
			$view="edit_header_content";
        	$this->load_view($view);
        }
	}
	
	function update_header_content($id="")
	{
		$table="header_content";
        $result=$this->header_post_data();
		$filter=array('id'=>$id);
		$data = $result;

			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Header Content Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_header/");
	}
	
	function delete_header_content($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "header_content";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("Header Content Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("Header Content Deleted successfuly!");
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
            $this->set_error("ERROR! Unknown Error!");
        }
        redirect("manage_home/manage_header/");
    }
	
	function manage_about(){
	    $this->data['page'] = "About Us";
		$this->data['title'] = "About Us";
		$view = "manage_about";
		$this->load_view($view);
	}
	
	function add_about_content()
	{
		$this->data['page'] = "About Us";
		$this->data['title'] = "About Us";
		$view = "add_about_content";
		$this->load_view($view);
	}
	
	function about_post_data()
    {
        $now = date('Y-m-d H:i:s');
		
        $data['top_content_title'] 		= 	$this->input->get_post('top_content_title');
		$data['top_content']			=	$this->input->get_post('top_content');
		
		$data['banner_content_title_1']	=	$this->input->get_post('banner_content_title_1');
		$data['banner_content_1']		=	$this->input->get_post('banner_content_1');
		
		$data['banner_content_title_2']	=	$this->input->get_post('banner_content_title_2');
		$data['banner_content_2']		=	$this->input->get_post('banner_content_2');
		
		$data['banner_content_title_3']	=	$this->input->get_post('banner_content_title_3');
		$data['banner_content_3']		=	$this->input->get_post('banner_content_3');
		
		$data['banner_content_title_4']	=	$this->input->get_post('banner_content_title_4');
		$data['banner_content_4']		=	$this->input->get_post('banner_content_4');
		
		$data['banner_content_title_5']	=	$this->input->get_post('banner_content_title_5');
		$data['banner_content_5']		=	$this->input->get_post('banner_content_5');
		
		$data['community_title']	=	$this->input->get_post('community_title');
		$data['community_short_content']		=	$this->input->get_post('community_short_content');
		$data['community_involvement_content']		=	$this->input->get_post('community_content');
		
		$data['status']					=	$this->input->get_post('status');
		//$data['created_date']			=	$now;
		//$data['updated_date']			=	$now;
		
		return $data;
    }
	
	function add_content()
	{
		$table="about_content";
        $data=$this->about_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
			if($flag!= '')
			{
				$this->set_success("Content Added Successfully");
				redirect("manage_home/manage_about/");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
				redirect("manage_home/manage_about/");
			}																																																				
        redirect("manage_home/manage_about/");
	}
	
	 function get_about_content()
    	{
        $joinColumsName =array("id,top_content_title,top_content,banner_content_title_1,banner_content_1,banner_content_title_2,banner_content_2,,banner_content_title_3,banner_content_3,banner_content_title_4,banner_content_4,banner_content_title_5,banner_content_title_5,status,created_date,updated_date");
        $aColumns       = array("id","top_content_title","banner_content_title_1","banner_content_title_2","banner_content_title_3","banner_content_title_4","banner_content_title_5","status");
        $findColumns    = array("id","top_content_title","banner_content_title_1","banner_content_title_2");
        $sTable = 'about_content';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_content($id='')
	{
		$this->data['title'] = "About Us";
		$this->data['page'] = "About Us";
        if($id!=''){	
			$this->data['content']		=	$this->common_model->get_single('about_content',array('id'=>$id));
			$view="edit_content";
        	$this->load_view($view);
        }
	}
	
	function update_content($id="")
	{
		$table="about_content";
        $result=$this->about_post_data();
		$filter=array('id'=>$id);
		$data = $result;

			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Content Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_about/");
	}
	
	function delete_content($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "about_content";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("Content Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("Content Deleted successfuly!");
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
            $this->set_error("ERROR! Unknown Error!");
        }
        redirect("manage_home/manage_about/");
    }
	
	function manage_products(){
	    $this->data['page'] = "Products";
		$this->data['title'] = "Products";
		$view = "manage_products";
		$this->load_view($view);
	}
	
	function add_product_form()
	{
		$this->data['page'] = "Products";
		$this->data['title'] = "Products";
		$view = "add_product_content";
		$this->load_view($view);
	}
	
	function product_post_data()
    {
        $now = date('Y-m-d H:i:s');
		
        $data['title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['product_content2'] = $this->input->get_post('product_content2');
		$data['custom_design_content'] = $this->input->get_post('custom_design_content');
		$data['custom_logo_colors_content'] = $this->input->get_post('custom_logo_colors_content');
		$data['custom_products_content'] = $this->input->get_post('custom_products_content');
		$data['inquiries_content'] = $this->input->get_post('inquiries_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');
		
		if($_FILES['banner_image']['name']!=''){
            $homepage_image=$this->common_model->upload('banner_image','product_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['banner_image']=$homepage_image['file_name'];
            }
        }
		return $data;
    }
	
	function delete_product_category_banner_image()
    {
		$id			=	$this->input->get_post('id');
        $table = "product_content";
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
	
	function add_product_content()
	{
		$table="product_content";
        $data=$this->product_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
			if($flag!= '')
			{
				$this->set_success("Product Content Added Successfully");
				redirect("manage_home/manage_products/");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
				redirect("manage_home/manage_products/");
			}																																																				
        redirect("manage_home/manage_products/");
	}
	
	function get_productcontent()
    	{
        $joinColumsName =array("id,title,header_content,product_content,status,created_date,updated_date");
        $aColumns       = array("id","title","header_content","status");
        $findColumns    = array("id","product_content");
        $sTable = 'product_content';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
            foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}
				
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_product_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
	
	function edit_product_content($id='')
	{
		$this->data['title'] = "Products";
		$this->data['page'] = "Products";
        if($id!=''){	
			$this->data['product']		=	$this->common_model->get_single('product_content',array('id'=>$id));
			$view="edit_product_content";
        	$this->load_view($view);
        }
	}
	
	function update_product_content($id="")
	{
		$table="product_content";
        $result=$this->product_post_data();
		$filter=array('id'=>$id);
		$data = $result;

			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Product Content Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_products/");
	}
	
	function delete_product_content($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "product_content";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("Product Content Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("Product Content Deleted successfuly!");
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
            $this->set_error("ERROR! unknown Error!");
        }
        redirect("manage_home/manage_products/");
    }
	
	function manage_contacts(){
	    $this->data['page'] = "Contacts";
		$this->data['title'] = "Contacts";
		$contacts	=	$this->common_model->get_all('contacts');
		$this->data['contacts'] = $contacts[0];
		$view = "manage_contacts";
		$this->load_view($view);
	}
	
	function contact_post_data()
    {
        $now = date('Y-m-d H:i:s');
		
        $data['toll_free_contact'] 			= 	$this->input->get_post('toll_free');
		$data['direct_contact']			=	$this->input->get_post('direct_contact');
		$data['fax_toll_free']			=	$this->input->get_post('fax_toll_free');
		$data['fax_direct_contacat']			=	$this->input->get_post('fax_direct');
		$data['email']			=	$this->input->get_post('email');
		$data['phone_no']		=	$this->input->get_post('phone_no');
		$data['address']	=	$this->input->get_post('address');
		$data['fb_link']	=	$this->input->get_post('fb_link');
		$data['pinterest_link']	=	$this->input->get_post('pin_link');
		$data['linkedin_link']	=	$this->input->get_post('linkedin');
		$data['twitter_link']	=	$this->input->get_post('twitter_link');
		//$data['created_date']	=	$now;
		$data['updated_date']	=	$now;
		
		return $data;
    }
    function update_contacts($id="")
	{
		$table="contacts";
        $result=$this->contact_post_data();
		$filter=array('id'=>$id);
		$data = $result;

			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Contact Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_contacts/");
	}
	
	function manage_news(){
	    $this->data['page'] = "News";
		$this->data['title'] = "News";
		$view = "manage_news";
		$this->load_view($view);
	}
	
	function add_news_form()
	{
		$this->data['page'] = "News";
		$this->data['title'] = "News";
		$view = "add_news";
		$this->load_view($view);
	}
	
	function news_post_data(){
		
		$data['news_title']	=	$this->input->get_post('news_title');
		$data['author']	=	$this->input->get_post('author');
		$publish_date = $this->input->get_post('publish_date');

		$data['publish_date']	=	date("Y-m-d", strtotime(strtolower(trim($publish_date))));
		$data['short_content']	=	$this->input->get_post('short_content');
		$data['news_content']		=	$this->input->get_post('news_content');
        $data['status'] = $this->input->get_post('status');
		
		if(count($_FILES['images']) > 0)
		{
		 	$files = $_FILES['images'];
			if($files['name'][0] != '')
			{
				for($i=0;$i<count($files['name']);$i++)
				{
				  $_FILES['images']['name']      = $files['name'][$i];
				  $_FILES['images']['type']      = $files['type'][$i];
				  $_FILES['images']['tmp_name']  = $files['tmp_name'][$i];
				  $_FILES['images']['error']     = $files['error'][$i];
				  $_FILES['images']['size']      = $files['size'][$i];
		
				  $part_image=$this->common_model->upload('images','news_images',$allowd="jpg|jpeg|png",array('width'=>220,'height'=>230));
		
					if($part_image != false)
					{
						$data1['image'][]=$part_image['file_name'];
					}
				}
			}else{
				$data1['image'][] = "Image.jpg";
			}
		}
		
		$data['images'] = implode(",",$data1['image']);
        return $data;
		
		//for single image
		/*if($_FILES['news_image']['name']!=''){
            $banner_image=$this->common_model->upload('main_product_image','default',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($banner_image!=false){
                $data['news_image']=$banner_image['file_name'];
            }
        }
		return $data;*/
	}
	
	function add_news()
	{
		$table="news";
        $data=$this->news_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
			if($flag!= '')
			{
				$this->set_success("News Added Successfully");
				redirect("manage_home/manage_news/");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
				redirect("manage_home/manage_news/");
			}																																																				
        redirect("manage_home/manage_news/");
	}
	
	 function get_newslist()
    	{
        $joinColumsName =array("id,news_title,author,publish_date,images,short_content,news_content,,status,created_date,updated_date");
        $aColumns       = array("id","news_title","author","publish_date","status");
        $findColumns    = array("id","news_title","author");
        $sTable = 'news';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_news/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_news/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
	
	function edit_news($id='')
	{
        if($id!=''){	
			$this->data['news']		=	$this->common_model->get_single('news',array('id'=>$id));
			$view="edit_news";
        	$this->load_view($view);
        }
	}
	
	function update_news($id="")
    {
        $table="news";
        $result=$this->news_post_data();
        $filter=array('id'=>$id);
		$now = date('Y-m-d H:i:s');
		$result['updated_date']	= $now;
		$data = $result;
			$get_data = $this->common_model->get_single($table,$filter);
				if($result['images'] == "Image.jpg"){
					$data['images'] = $get_data['images'];
				}else{
					$data['images'] = $result['images'];
				}
			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("News Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_news/");
    }
	
	function delete_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "news";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				
				$images = explode(",",$data['images']);
				$res = "";
				foreach($images as $key=>$value){
					if($key != $image_id){
						$res[] = $value;
					}
				}
				$image = implode(",",$res);
				$data = array("images"=>$image);
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
	
	function delete_news($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "news";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("News Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("News Deleted successfuly!");
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
            $this->set_error("ERROR! unknown Error!");
        }
        redirect("manage_home/manage_news/");
    }
	
	function manage_blogs(){
	    $this->data['page'] = "Blogs";
		$this->data['title'] = "Blogs";
		$view = "manage_blogs";
		$this->load_view($view);
	}
	
	function add_blogs_form()
	{
		$this->data['page'] = "Blogs";
		$this->data['title'] = "Blogs";
		$view = "add_blogs";
		$this->load_view($view);
	}
	
	function blogs_post_data(){
		
		$data['blog_title']	=	$this->input->get_post('news_title');
		$blog_url = $this->input->get_post('blog_url');
		$data['blog_url'] 		= str_replace(array(' ',"/","_"),"-",$blog_url);
		$data['author']	=	$this->input->get_post('author');
		$publish_date = $this->input->get_post('publish_date');

		$data['publish_date']	=	date("Y-m-d", strtotime(strtolower(trim($publish_date))));
		$data['short_content']	=	$this->input->get_post('short_content');
		$data['news_content']		=	$this->input->get_post('news_content');
        $data['status'] = $this->input->get_post('status');
		
		if(count($_FILES['images']) > 0)
		{
		 	$files = $_FILES['images'];
			if($files['name'][0] != '')
			{
				for($i=0;$i<count($files['name']);$i++)
				{
				  $_FILES['images']['name']      = $files['name'][$i];
				  $_FILES['images']['type']      = $files['type'][$i];
				  $_FILES['images']['tmp_name']  = $files['tmp_name'][$i];
				  $_FILES['images']['error']     = $files['error'][$i];
				  $_FILES['images']['size']      = $files['size'][$i];
		
				  $part_image=$this->common_model->upload('images','blogs_images',$allowd="jpg|jpeg|png",array('width'=>220,'height'=>230));
		
					if($part_image != false)
					{
						$data1['image'][]=$part_image['file_name'];
					}
				}
			}else{
				$data1['image'][] = "Image.jpg";
			}
		}
		
		$data['images'] = implode(",",$data1['image']);
        return $data;
		
		//for single image
		/*if($_FILES['news_image']['name']!=''){
            $banner_image=$this->common_model->upload('main_product_image','default',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($banner_image!=false){
                $data['news_image']=$banner_image['file_name'];
            }
        }
		return $data;*/
	}
	
	function add_blogs()
	{
		$table="blogs";
        $data=$this->blogs_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
			if($flag!= '')
			{
				$this->set_success("Blog Added Successfully");
				redirect("manage_home/manage_blogs/");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
				redirect("manage_home/manage_blogs/");
			}																																																				
        redirect("manage_home/manage_blogs/");
	}
	
	 function get_blogslist()
    	{
        $joinColumsName =array("id,blog_title,author,publish_date,images,short_content,news_content,,status,created_date,updated_date");
        $aColumns       = array("id","blog_title","author","publish_date","status");
        $findColumns    = array("id","blog_title","author");
        $sTable = 'blogs';

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
            //$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
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

            $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_blogs/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_blogs/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
	
	function edit_blogs($id='')
	{
        if($id!=''){	
			$this->data['blogs']		=	$this->common_model->get_single('blogs',array('id'=>$id));
			$view="edit_blogs";
        	$this->load_view($view);
        }
	}
	
	function update_blogs($id="")
    {
        $table="blogs";
        $result=$this->blogs_post_data();
        $filter=array('id'=>$id);
		$now = date('Y-m-d H:i:s');
		$result['updated_date']	= $now;
		$data = $result;
			$get_data = $this->common_model->get_single($table,$filter);
				if($result['images'] == "Image.jpg"){
					$data['images'] = $get_data['images'];
				}else{
					$data['images'] = $result['images'];
				}
			$update=$this->common_model->update_data($table,$data,$filter);
			if($update!=false){
				$this->set_success("Blogs Updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}																																																 		
        redirect("manage_home/manage_blogs/");
    }
	
	function delete_blog_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "blogs";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				
				$images = explode(",",$data['images']);
				$res = "";
				foreach($images as $key=>$value){
					if($key != $image_id){
						$res[] = $value;
					}
				}
				$image = implode(",",$res);
				$data = array("images"=>$image);
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
	
	function delete_blogs($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "blogs";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("Blogs Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("Blogs Deleted successfuly!");
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
            $this->set_error("ERROR! Unknown Error!");
        }
        redirect("manage_home/manage_blogs/");
    }

	function manage_fitness(){
		$this->data['page'] = "Fitness";
		$this->data['title'] = "Fitness";
		$contacts	=	$this->common_model->get_all('fitness_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_fitness";
		$this->load_view($view);
	}

	function add_fitness_form()
	{
		$this->data['page'] = "Fitness";
		$this->data['title'] = "Fitness";
		$view = "add_fitness_content";
		$this->load_view($view);
	}

	function fitness_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','fitness_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','fitness_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function add_fitness_content()
	{
		$table="fitness_content";
		$data=$this->fitness_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Fitness Content Added Successfully");
			redirect("manage_home/manage_fitness/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_fitness/");
		}
		redirect("manage_home/manage_fitness/");
	}

	function delete_fitness_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "fitness_content";
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

	function delete_fitness_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "fitness_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function get_fitnesscontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'fitness_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_fitness_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_fitness_content($id='')
	{
		$this->data['title'] = "Fitness";
		$this->data['page'] = "Fitness";
		if($id!=''){
			$this->data['fitness']		=	$this->common_model->get_single('fitness_content',array('id'=>$id));
			$view="edit_fitness_content";
			$this->load_view($view);
		}
	}

	function update_fitness_content($id="")
	{
		$table="fitness_content";
		$result=$this->fitness_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Fitness Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_fitness/");
	}

	function manage_commercial(){
		$this->data['page'] = "Commercial";
		$this->data['title'] = "Commercial";
		$contacts	=	$this->common_model->get_all('commercial_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_commercial";
		$this->load_view($view);
	}

	function add_commercial_form()
	{
		$this->data['page'] = "Commercial";
		$this->data['title'] = "Commercial";
		$view = "add_commercial_content";
		$this->load_view($view);
	}

	function commercial_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','commercial_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','commercial_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_commercial_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "commercial_content";
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

	function delete_commercial_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "commercial_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_commercial_content()
	{
		$table="commercial_content";
		$data=$this->commercial_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Commercial Content Added Successfully");
			redirect("manage_home/manage_commercial/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_commercial/");
		}
		redirect("manage_home/manage_commercial/");
	}

	function get_commercialcontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'commercial_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_commercial_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_commercial_content($id='')
	{
		$this->data['title'] = "Commercial";
		$this->data['page'] = "Commercial";
		if($id!=''){
			$this->data['commercial']		=	$this->common_model->get_single('commercial_content',array('id'=>$id));
			$view="edit_commercial_content";
			$this->load_view($view);
		}
	}

	function update_commercial_content($id="")
	{
		$table="commercial_content";
		$result=$this->commercial_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Commercial Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_commercial/");
	}

	function manage_hospitality(){
		$this->data['page'] = "Hospitality";
		$this->data['title'] = "Hospitality";
		$contacts	=	$this->common_model->get_all('hospitality_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_hospitality";
		$this->load_view($view);
	}

	function add_hospitality_form()
	{
		$this->data['page'] = "Hospitality";
		$this->data['title'] = "Hospitality";
		$view = "add_hospitality_content";
		$this->load_view($view);
	}

	function hospitality_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','hospitality_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','hospitality_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_hospitality_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "hospitality_content";
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

	function delete_hospitality_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "hospitality_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_hospitality_content()
	{
		$table="hospitality_content";
		$data=$this->hospitality_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Hospitality Content Added Successfully");
			redirect("manage_home/manage_hospitality/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_hospitality/");
		}
		redirect("manage_home/manage_hospitality/");
	}

	function get_hospitalitycontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'hospitality_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_hospitality_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_hospitality_content($id='')
	{
		$this->data['title'] = "Hospitality";
		$this->data['page'] = "Hospitality";
		if($id!=''){
			$this->data['hospitality']		=	$this->common_model->get_single('hospitality_content',array('id'=>$id));
			$view="edit_hospitality_content";
			$this->load_view($view);
		}
	}

	function update_hospitality_content($id="")
	{
		$table="hospitality_content";
		$result=$this->hospitality_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Hospitality Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_hospitality/");
	}

	function manage_educational(){
		$this->data['page'] = "Educational";
		$this->data['title'] = "Educational";
		$contacts	=	$this->common_model->get_all('educational_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_educational";
		$this->load_view($view);
	}

	function add_educational_form()
	{
		$this->data['page'] = "Educational";
		$this->data['title'] = "Educational";
		$view = "add_educational_content";
		$this->load_view($view);
	}

	function educational_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','educational_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','educational_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_educational_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "educational_content";
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

	function delete_educational_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "educational_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_educational_content()
	{
		$table="educational_content";
		$data=$this->educational_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Educational Content Added Successfully");
			redirect("manage_home/manage_educational/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_educational/");
		}
		redirect("manage_home/manage_educational/");
	}

	function get_educationalcontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'educational_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_educational_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_educational_content($id='')
	{
		$this->data['title'] = "Educational";
		$this->data['page'] = "Educational";
		if($id!=''){
			$this->data['educational']		=	$this->common_model->get_single('educational_content',array('id'=>$id));
			$view="edit_educational_content";
			$this->load_view($view);
		}
	}

	function update_educational_content($id="")
	{
		$table="educational_content";
		$result=$this->educational_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Educational Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_educational/");
	}

	function manage_healthcare(){
		$this->data['page'] = "Health Care";
		$this->data['title'] = "Health Care";
		$contacts	=	$this->common_model->get_all('healthcare_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_healthcare";
		$this->load_view($view);
	}

	function add_healthcare_form()
	{
		$this->data['page'] = "Health Care";
		$this->data['title'] = "Health Care";
		$view = "add_healthcare_content";
		$this->load_view($view);
	}

	function healthcare_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','healthcare_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','healthcare_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_healthcare_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "healthcare_content";
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

	function delete_healthcare_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "healthcare_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_healthcare_content()
	{
		$table="healthcare_content";
		$data=$this->healthcare_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Health Care Content Added Successfully");
			redirect("manage_home/manage_healthcare/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_healthcare/");
		}
		redirect("manage_home/manage_healthcare/");
	}

	function get_healthcarecontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'healthcare_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_healthcare_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_healthcare_content($id='')
	{
		$this->data['title'] = "Health Care";
		$this->data['page'] = "Health Care";
		if($id!=''){
			$this->data['healthcare']		=	$this->common_model->get_single('healthcare_content',array('id'=>$id));
			$view="edit_healthcare_content";
			$this->load_view($view);
		}
	}

	function update_healthcare_content($id="")
	{
		$table="healthcare_content";
		$result=$this->healthcare_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Health Care Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_healthcare/");
	}

	function manage_other(){
		$this->data['page'] = "Other";
		$this->data['title'] = "Other";
		$contacts	=	$this->common_model->get_all('other_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_other";
		$this->load_view($view);
	}

	function add_other_form()
	{
		$this->data['page'] = "Other";
		$this->data['title'] = "Other";
		$view = "add_other_content";
		$this->load_view($view);
	}

	function other_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','other_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','other_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_other_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "other_content";
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

	function delete_other_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "other_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_other_content()
	{
		$table="other_content";
		$data=$this->other_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Other Content Added Successfully");
			redirect("manage_home/manage_other/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_other/");
		}
		redirect("manage_home/manage_other/");
	}

	function get_othercontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'other_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_other_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_other_content($id='')
	{
		$this->data['title'] = "Other";
		$this->data['page'] = "Other";
		if($id!=''){
			$this->data['other']		=	$this->common_model->get_single('other_content',array('id'=>$id));
			$view="edit_other_content";
			$this->load_view($view);
		}
	}

	function update_other_content($id="")
	{
		$table="other_content";
		$result=$this->other_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Other Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_other/");
	}

	function manage_location(){
		$this->data['page'] = "Location";
		$this->data['title'] = "Location";
		$contacts	=	$this->common_model->get_all('location_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_location";
		$this->load_view($view);
	}

	function add_location_form()
	{
		$this->data['page'] = "location";
		$this->data['title'] = "location";
		$view = "add_location_content";
		$this->load_view($view);
	}

	function location_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$this->input->get_post('title');
		$data['header_content'] 			= 	$this->input->get_post('header_content');
		$data['section_title'] 			= 	$this->input->get_post('section_title');
		$data['section_content'] 			= 	$this->input->get_post('section_content');
		//$data['icon']			=	$this->input->get_post('icon');
		//$data['product_content']=	$this->input->get_post('product_content');
		$data['status']			=	$this->input->get_post('status');

		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','location_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_image']['name']!=''){
			$section_image=$this->common_model->upload('section_image','location_category_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_image']=$section_image['file_name'];
			}
		}
		return $data;
	}

	function delete_location_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "location_content";
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

	function delete_location_category_section_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "location_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image"=>'Image.jpg');
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

	function add_location_content()
	{
		$table="location_content";
		$data=$this->location_post_data();

		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("location Content Added Successfully");
			redirect("manage_home/manage_location/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_location/");
		}
		redirect("manage_home/manage_location/");
	}

	function get_locationcontent()
	{
		$joinColumsName =array("id,header_title,header_content,section_title,section_content,status,created_date,updated_date");
		$aColumns       = array("id","header_title","header_content","section_title","section_content","status");
		$findColumns    = array("id","header_title");
		$sTable = 'location_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_location_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_location_content($id='')
	{
		$this->data['title'] = "Location";
		$this->data['page'] = "Location";
		if($id!=''){
			$this->data['location']		=	$this->common_model->get_single('location_content',array('id'=>$id));
			$view="edit_location_content";
			$this->load_view($view);
		}
	}

	function update_location_content($id="")
	{
		$table="location_content";
		$result=$this->location_post_data();
		$filter=array('id'=>$id);
		$data = $result;

		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false){
			$this->set_success("Location Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_location/");
	}

	function manage_case_study(){
		$this->data['page'] = "Case Study";
		$this->data['title'] = "Case Study";
		$contacts	=	$this->common_model->get_all('case_study_content');
		//$this->data['contacts'] = $contacts[0];
		$view = "manage_case_study";
		$this->load_view($view);
	}

	function add_case_study_form()
	{
		$this->data['page'] = "Case Study";
		$this->data['title'] = "Case Study";
		$view = "add_case_study_content";
		$this->load_view($view);
	}

	function add_case_study_content()
	{
		$table="case_study_content";
		$data=$this->case_study_post_data();
		
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;

		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
		{
			$this->set_success("Case Study Content Added Successfully");
			redirect("manage_home/manage_case_study/");
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("manage_home/manage_case_study/");
		}
		redirect("manage_home/manage_case_study/");
	}

	function get_case_studycontent()
	{
		$joinColumsName =array("id,`header_title`, `banner_image`, `header_content`, `section_logo1`, `section_title1`, `section_content1`, `testimonial1`,`status`, `created_date`,`updated_date`");
		$aColumns       = array("id","header_title","header_content","section_title1","section_content1","status");
		$findColumns    = array("id","header_title");
		$sTable = 'case_study_content';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'icon')
				{
					$aRow['icon'] = '<i class="fa '.$aRow['icon'].'" aria-hidden="true"></i>';
				}

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

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_case_study_content/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<!--<a class="red delete_link" href="'.base_url().'manage_home/delete_product_content/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>-->
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}

	function edit_case_study_content($id='')
	{
		$this->data['title'] = "Case Study";
		$this->data['page'] = "Case Study";
		if($id!=''){
			$this->data['case_study'] =	$this->common_model->get_single('case_study_content',array('id'=>$id));
			$view="edit_case_study_content";
			$this->load_view($view);
		}
	}
	
	function case_study_post_data()
	{
		$now = date('Y-m-d H:i:s');

		$data['header_title'] 			= 	$_POST['title'];
		$data['header_content'] 		= 	$_POST['header_content'];
		$data['section_title1'] 		= 	$_POST['section_title1'];
		$data['section_content1'] 		= 	$_POST['section_content1'];
		$data['testimonial1'] 			= 	$_POST['testimonial1'];
		$data['status']					=	$_POST['status'];
		$data1['image_title']			=	$_POST['image_title'];
		
		if($_FILES['banner_image']['name']!=''){
			$homepage_image=$this->common_model->upload('banner_image','case_study_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
			if($homepage_image!=false){
				$data['banner_image']=$homepage_image['file_name'];
			}
		}
		if($_FILES['section_logo1']['name']!=''){
			$section_image=$this->common_model->upload('section_logo1','case_study_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$data['section_logo1']=$section_image['file_name'];
			}
		}
		
		if($_FILES['section_images']['name'] != '') {
			$section_image1 = array();
			$cpt = count($_FILES['section_images']['name']);

			for ($i = 0; $i < $cpt; $i++) {
				$section_image1 = "";
				if($_FILES['section_images']['name'][$i] != "" || $_FILES['section_images']['name'][$i] != NULL){
					$_FILES['section_image']['name'] = $_FILES['section_images']['name'][$i];
					$_FILES['section_image']['type'] = $_FILES['section_images']['type'][$i];
					$_FILES['section_image']['tmp_name'] = $_FILES['section_images']['tmp_name'][$i];
					$_FILES['section_image']['error'] = $_FILES['section_images']['error'][$i];
					$_FILES['section_image']['size'] = $_FILES['section_images']['size'][$i];
	
					$section_image1 = $this->common_model->upload('section_image', 'case_study_category_image', $allowd = "jpg|jpeg|png|svg", array('width' => 200, 'height' => 300));
				}
				$data1['section_images'][] = $section_image1['file_name'];
			}
		}
		
		if($_FILES['section_documents']['name'] != '') {
			$section_doc = array();
			$cpt1 = count($_FILES['section_documents']['name']);

			for ($i = 0; $i < $cpt1; $i++) {
				$section_doc = "";
				if($_FILES['section_documents']['name'][$i] != "" || $_FILES['section_documents']['name'][$i] != NULL){
					$_FILES['section_document']['name'] = $_FILES['section_documents']['name'][$i];
					$_FILES['section_document']['type'] = $_FILES['section_documents']['type'][$i];
					$_FILES['section_document']['tmp_name'] = $_FILES['section_documents']['tmp_name'][$i];
					$_FILES['section_document']['error'] = $_FILES['section_documents']['error'][$i];
					$_FILES['section_document']['size'] = $_FILES['section_documents']['size'][$i];
	
					$section_doc = $this->common_model->upload('section_document', 'case_study_category_document', $allowd = "pdf|doc|docx", "");
				}
				
				$data1['section_documents'][] = $section_doc['file_name'];
			}
		}
		//print_r($data1);die;
		$result[0] = $data;
		$result[1] = $data1;
		return $result;
	}

	function update_case_study_content($id="")
	{
		$table="case_study_content";
		$result=$this->case_study_post_data();
		
		//print_r($result);die;
		$filter=array('id'=>$id);
		$data = $result[0];

		$update = $this->common_model->update_data($table,$data,$filter);
		
		/*$data1['section_images'] = $result[1]['section_images'];
		$data1['section_documents'] = $result[1]['section_documents'];
		$data1['image_title'] = $result[1]['image_title'];
		
		$i = 0;
		foreach($data1['image_title'] as $res){
			if($res !=  "" || $data1['section_images'][$i] != "" || $data1['section_documents'][$i] != ""){
				$table1="case_studies";
				$result_data['title'] = $res;
				$result_data['image'] = $data1['section_images'][$i];
				$result_data['document'] = $data1['section_documents'][$i];
				
				$now = date('Y-m-d H:i:s');
				$result_data['created_date'] = $now;
				
				$inserted = $this->common_model->insert_data($table1,$result_data);
			}
			$i++;
		}*/

		if($update != false){
			$this->set_success("Case Study Content Updated Successfully!!!");
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_case_study/");
	}

	function remove_case_study_img()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_studies";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("image"=>'');
			$flag = $this->common_model->update_data($table,$data,$filter);
			if ($flag != false)
			{
				echo true;
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function remove_case_study_document()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_studies";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("document"=>NULL);
			$flag = $this->common_model->update_data($table,$data,$filter);
			if ($flag != false)
			{
				echo true;
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}
	
	function delete_case_study_category_banner_image()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
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

	function delete_case_study_category_section_image1()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image1"=>'Image.jpg');
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

	function delete_case_study_category_section_image2()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image2"=>'Image.jpg');
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

	function delete_case_study_category_section_image3()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image3"=>'Image.jpg');
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

	function delete_case_study_category_section_image4()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_image4"=>'Image.jpg');
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

	function delete_case_study_category_section_logo1()
	{
		$id			=	$this->input->get_post('id');
		$table = "case_study_content";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$data = array("section_logo1"=>'Image.jpg');
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

	function manage_case_studies(){
		$this->data['page'] = "Case Study";
		$this->data['title'] = "Case Study";
		
		$view = "manage_case_studies";
		$this->load_view($view);
	}
	
	function get_case_studies()
	{
		$joinColumsName = array("id,`title`, `image`, `document`,`created_date`,`updated_date`");
		$aColumns       = array("id","image","title","created_date");
		$findColumns    = array("id","title");
		$sTable = 'case_studies';

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
			//$row[]='<input type="checkbox" name="mul_del[]" class="chk1" value="'.$aRow['id'].'">';
			foreach ($aColumns as $col) {
				if( $col == 'image')
				{
					$aRow['image'] = '<img src="'.base_url().'uploads/case_study_category_image/thumbs/'.$aRow['image'].'" width="85" height="85"/>';
				}

				$row[] = $aRow[$col];
			}

			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'manage_home/edit_case_study_details/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red delete_link" href="'.base_url().'manage_home/delete_case_studies/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';

			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}
	
	function add_new_case_study()
	{
		$this->data['page'] = "Add Case Study";
		$this->data['title'] = "Add Case Study";
		
		$view = "add_case_study";
		$this->load_view($view);
	}
	
	function insert_case_study()
	{
						
			if($_FILES['section_images']['name']!=''){
			$section_image=$this->common_model->upload('section_images','case_study_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
				if($section_image!=false){
					$image=$section_image['file_name'];
				}
			}
			
			if($_FILES['section_documents']['name']!=''){
			$section_image=$this->common_model->upload('section_documents','case_study_category_document',$allowd = "pdf|doc|docx","");
				if($section_image!=false){
					$document=$section_image['file_name'];
				}
			}
		
		
			$table1="case_studies";
			$result_data['title'] = $this->input->post('title');
			$result_data['content'] = $this->input->post('case_study_content');

			/*if($_FILES['section_images']['name'] != '') {
			$section_image1 = array();
			$cpt = count($_FILES['section_images']['name']);

			for ($i = 0; $i < $cpt; $i++) {
				$section_image1 = "";
				if($_FILES['section_images']['name'][$i] != "" || $_FILES['section_images']['name'][$i] != NULL){
					$_FILES['section_image']['name'] = $_FILES['section_images']['name'][$i];
					$_FILES['section_image']['type'] = $_FILES['section_images']['type'][$i];
					$_FILES['section_image']['tmp_name'] = $_FILES['section_images']['tmp_name'][$i];
					$_FILES['section_image']['error'] = $_FILES['section_images']['error'][$i];
					$_FILES['section_image']['size'] = $_FILES['section_images']['size'][$i];
	
					$section_image1 = $this->common_model->upload('section_image', 'case_study_category_image', $allowd = "jpg|jpeg|png|svg", array('width' => 200, 'height' => 300));
				}
				$data1['section_images'][] = $section_image1['file_name'];
			}
		}
		
		if($_FILES['section_documents']['name'] != '') {
			$section_doc = array();
			$cpt1 = count($_FILES['section_documents']['name']);

			for ($i = 0; $i < $cpt1; $i++) {
				$section_doc = "";
				if($_FILES['section_documents']['name'][$i] != "" || $_FILES['section_documents']['name'][$i] != NULL){
					$_FILES['section_document']['name'] = $_FILES['section_documents']['name'][$i];
					$_FILES['section_document']['type'] = $_FILES['section_documents']['type'][$i];
					$_FILES['section_document']['tmp_name'] = $_FILES['section_documents']['tmp_name'][$i];
					$_FILES['section_document']['error'] = $_FILES['section_documents']['error'][$i];
					$_FILES['section_document']['size'] = $_FILES['section_documents']['size'][$i];
	
					$section_doc = $this->common_model->upload('section_document', 'case_study_category_document', $allowd = "pdf|doc|docx", "");
				}
				
				$data1['section_documents'][] = $section_doc['file_name'];
			}
		}*/
		
			$result_data['image'] = $image;
			$result_data['document'] = $document;
			$result_data['created_date'] = date('Y-m-d H:i:s');
			
			$inserted = $this->common_model->insert_data($table1,$result_data);
			
			if($inserted != false){
				$this->set_success("Case Study inserted Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}
			redirect("manage_home/manage_case_studies");
		
	}
	
	function edit_case_study_details($id="")
	{
		$this->data['case_study_details'] = $this->common_model->get_single('case_studies',array("id"=>$id));
		$this->data['page'] = "Edit Case Study";
		$this->data['title'] = "Edit Case Study";
		$view = "edit_case_study_details";
		$this->load_view($view);
	}
	
	
	function update_case_study($id="")
	{
		if($_FILES['section_images']['name']!=''){
		$section_image=$this->common_model->upload('section_images','case_study_category_image',$allowd="jpg|jpeg|png|svg",array('width'=>200,'height'=>300));
			if($section_image!=false){
				$image=$section_image['file_name'];
			}
		}
		
		if($_FILES['section_documents']['name']!=''){
		$section_image=$this->common_model->upload('section_documents','case_study_category_document',$allowd = "pdf|doc|docx","");
			if($section_image!=false){
				$document=$section_image['file_name'];
			}
		}
			
		$table="case_studies";
		
		$update_array = array(
			'title'		=>	$this->input->post('title'),
			'content'	=>	$this->input->post('case_study_content'),
		);
		if($image != '')
		{
			$update_array['image'] = $image;
		}
		if($document != '')
		{
			$update_array['document'] = $document;
		}
		
		$filter=array('id'=>$id);


		$update = $this->common_model->update_data($table,$update_array,$filter);	
		
		if($update != false){
				$this->set_success("Case Study updated Successfully!!!");
			}
			else{
				$this->set_error("ERROR! Unknown Error!");
			}
			redirect("manage_home/manage_case_studies");
	}
	
	function delete_case_studies($id = "")
	{
		$table = "case_studies";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
		if ($data != false)
		{
			$flag = $this->common_model->delete_data($table, $filter);
			if ($flag != false)
			{
				$this->set_success("Case Studies Record deleted Successfully!!!");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
			}
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
		}
		redirect("manage_home/manage_case_studies/");
		
	}
	
	function manage_sustainability()
	{
		$this->data['page'] = "Sustainability";
		$this->data['title'] = "Sustainability";
		
		$view = "manage_sustainability";
		$this->load_view($view);
	}
}