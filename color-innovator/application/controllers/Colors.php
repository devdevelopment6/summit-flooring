<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Colors extends CI_Controller {
	
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
		$this->data['activemenu'] = "Colors";
		$this->data['title'] = "Colors";
		$this->data['page'] = "";
		$this->data['panel'] = "Dashboard";
	}
	
	function load_view($view = "view_colors")
	{
		$this->load->view('admin/header', $this->data);
		$this->load->view('admin/sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/footer');
	}
	
	function index()
	{
		$this->data['title']    = "Colors";
		$this->data['page']     = "Colors";
		$view='view_colors';
		$this->load_view($view);
	}
	function saved_albums()
	{
		$this->data['title']    = "Saved Albums";
		$this->data['page']     = "Saved Albums";
		$view='view_saved_albums';
		$this->load_view($view);
	}
	function add_colors(){
	    $this->data['page'] = "Add Color";
		$this->data['title'] = "Add Color";
		$view = "add_color";
		$this->load_view($view);
	}
	function edit_color_details($color_id=''){
		if($color_id!=''){
			$this->data['page'] = "Edit Color";
			$this->data['title'] = "Edit Color";
			$this->data['color_data']='';
			$color_data=$this->common_model->get_single('color_room',array('id'=>$color_id));
			if($color_data!=false){
				$this->data['color_data']=$color_data;
			}
			$view = "edit_color";
			$this->load_view($view);
		}
		else{
			redirect('colors');
		}
	}
	function get_color_post(){
	    $data =array();
		 $data['color_category']=$this->input->post('color_category');
	    $data['color_title']=$this->input->post('color_name');
	    $data['hex_code']=$this->input->post('color_haxcode');
	    if($this->input->post('color_coarse')){
	     $data['coarse']=$this->input->post('color_coarse');
	    }
		else{
			$data['coarse']=0;
		}
	    if($this->input->post('color_fine')){
	     $data['fine']=$this->input->post('color_fine');
	    }
		else{
			$data['fine']=0;
		}
	    if($this->input->post('color_active')){
	     $data['status']=$this->input->post('color_active');
	    }
		else{
			$data['status']=0;
		}
	    return $data;
	}
	function save_color(){
		$data=$this->get_color_post();
		if($_FILES['color_image']['name']!=''){
			$image_data=$this->common_model->upload('color_image','colors/',$allowd="jpg|jpeg|png",'');
			$data['color_img']=$image_data['file_name'];
		}
		$data['created_date']=date('Y-m-d');
		$flag=$this->common_model->insert_data('color_room',$data);
		if($flag!=false){
			$this->session->set_flashdata('success','Color added successfully!!');
		}
		else{
			$this->session->set_flashdata('error','Error!! Unknown Error!!');
		}
		redirect('colors');
	}
	function update_color($color_id){
		if($color_id!=''){
			$data=$this->get_color_post();
			if($_FILES['color_image']['name']!=''){
				$image_data=$this->common_model->upload('color_image','colors/',$allowd="jpg|jpeg|png",'');
				$data['color_img']=$image_data['file_name'];
			}
			$data['updated_date']=date('Y-m-d');
			//print_r($data);die;
			$flag=$this->common_model->update_data('color_room',$data,array('id'=>$color_id));
			if($flag!=false){
				$this->session->set_flashdata('success',"Color Details Updated!!");
			}
			else{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}
		}
		redirect('colors');
	}
	function get_colors(){
		$joinColumsName =array("id,color_img,color_title,coarse,fine,hex_code,created_date,updated_date,status");
        $aColumns       = array("id","color_title","hex_code","color_img","coarse","fine","status");
        $findColumns    = array('id','color_title','hex_code','coarse','fine','status');
		//$this->db->group_by("user_id");
        $sTable = 'color_room';

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
		$i=0;
        foreach($rResult->result_array() as $aRow) {

            $row = array();
            foreach ($aColumns as $col) {
				/*if( $col == 'id')
				{
					$aRow['id'] = ++$i;
				}*/
				if( $col == 'color_img')
				{
					$aRow['color_img'] = '<img src="'.base_url().'uploads/colors/'.$aRow['color_img'].'" style="heigh:50px;width:50px;">';
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
				if( $col == 'coarse')
				{
					if($aRow['coarse']==1){
						$aRow['coarse']='Yes';
					}
					else{
						$aRow['coarse']='No';
					}
				}
				if( $col == 'fine')
				{
					if($aRow['fine']==1){
						$aRow['fine']='Yes';
					}
					else{
						$aRow['fine']='No';
					}
				}
				 $row[] = $aRow[$col];
            }
			if($aRow['id']!=1){
            	$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'colors/edit_color_details/'.$aRow['id'].'" title="Edit Color">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red delete_color" data-id="'.$aRow['id'].'" title="Delete Color">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
					';
			}
			else{
				 $row[] = '<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="'.base_url().'colors/edit_color_details/'.$aRow['id'].'" title="Edit Color">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
					</div>
					';
			}

            $output['aaData'][] = $row;

        }

        echo json_encode($output);
	}
	function delete_color(){
		$id=$this->input->post('id');
		$color_data=$this->common_model->get_single('color_room',array('id'=>$id));
		if($color_data!=false){
			if($color_data['color_img']!='' && file_exists(FCPATH.'uploads/colors/'.$color_data['color_img'])){
				unlink(FCPATH.'uploads/colors/'.$color_data['color_img']);
			}
		}
		$flag=$this->common_model->delete_data('color_room',array('id'=>$id));
		if($flag!=''){
			$this->session->set_flashdata("success","Record deleted successfully!!");
		}
		else{
			$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
		}
		echo true;
	}
	function get_saved_album(){
		 $joinColumsName =array("id,org_image_path,org_image_name,swatch_name,image_info,status,created_date,updated_date");
        $aColumns       = array("id","swatch_name","org_image_name","image_info","created_date");
        $findColumns    = array('id','swatch_name','image_info','created_date');
		//$this->db->group_by("user_id");
        $sTable = 'saved_album';

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
		$i=0;
        foreach($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
				if($col=='org_image_name'){
					$aRow['org_image_name']='<img src="'.base_url().'images/'.$aRow['org_image_name'].'" style="height:100px;width:100px;"/>';
				}
				if($col=='image_info'){
					$aRow['image_info']=str_replace("%","%<br>",$aRow['image_info']);
				}
				 $row[] = $aRow[$col];
            }
			$row[] = '<div class="hidden-sm hidden-xs action-buttons">
						
						<a class="red delete_saved_color" data-id="'.$aRow['id'].'" title="Delete Color">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>';

            $output['aaData'][] = $row;

        }

        echo json_encode($output);

	}
	function delete_saved_color(){
		$id=$this->input->post('id');
		$color_data=$this->common_model->get_single('saved_album',array('id'=>$id));
		if($color_data!=false){
			if($color_data['org_image_name']!='' && file_exists(FCPATH.'images/'.$color_data['org_image_name'])){
				unlink(FCPATH.'images/'.$color_data['org_image_name']);
			}
			if($color_data['org_image_path']!=''){
				unlink($color_data['org_image_path']);
			}
		}
		$flag=$this->common_model->delete_data('saved_album',array('id'=>$id));
		if($flag!=''){
			$this->session->set_flashdata("success","Record deleted successfully!!");
		}
		else{
			$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
		}
		echo true;
	}
	
}