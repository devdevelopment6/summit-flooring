<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Area_size extends CI_Controller {
	
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
		$this->data['activemenu'] = "Area Size";
		$this->data['title'] = "Area Size";
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
	
	function add_area_size()
	{
	    $this->data['page'] = "Area Size";
		$this->data['title'] = "Area Size";
		$this->data['panel']    = "Dashboard";
		$view = "add_area_size";
		$this->load_view($view);
	}
	
	function view_area_size()
	{
		$this->data['page'] = "Area Size";
		$this->data['title'] = "Area Size";
		$this->data['panel']    = "Dashboard";
		$view = "view_area_size";
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
		$name=$this->input->post('area_size_name');
		$data=array(
					'size_name'=>$name,					
					);
		return $data;
	}
	
	function insert_area_size()
	{
		$data=$this->get_post_data();
		$data['created_datetime']=date('Y-m-d H:i:s');
		$table='area_size';
		$flag=$this->common_model->insert_data($table,$data);
       
		if($flag!=false)
		{	
			$this->set_success("Area Size Added Successfully");
		}
		else
		{
			$this->set_success("Area Size not inserted");
		}
		redirect('area_size/view_area_size');
	}
	
	function get_area_size()
	 {
        $joinColumsName =array("id as aid,id,size_name");
        $aColumns       = array("aid","size_name");
        $findColumns    = array("id","size_name");
	
		$sTable = 'area_size';

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
				
				if( $col == 'aid')
				{
					$aRow['aid']=++$j;
				}
                $row[] = $aRow[$col];
				
            }

            //print_r($city);

            $row[] = '<div class="action-buttons">
						<a class="green" href="'.base_url().'area_size/edit_area_size/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
                       
						<a class="red delete_link" href="'.base_url().'area_size/delete_area_size/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';
			
            $output['aaData'][] = $row;

        }

        echo json_encode($output);
    }
	
	function delete_area_size($id='')
	{
		
		$data=$this->common_model->get_single('area_size',array('id'=>$id));
		if($data!=false)
		{
			$flag=$this->common_model->delete_data('area_size',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}	
		}
		redirect('area_size/view_area_size');
	}
	
	function edit_area_size($id='')
	{
		
		$this->data['page'] = "Edit Area Size";
		$this->data['title'] = "Edit Area Size";
		$this->data['panel']    = "Dashboard";
		
		$this->data['area_size']=$this->common_model->get_single('area_size',array('id'=>$id));
		$view = "edit_area_size";
		$this->load_view($view);
	}
	
	function update_area_size()
	{
		$data=$this->get_post_data();
		$data['modified_datetime']=date('Y-m-d H:i:s');
		$id=$this->input->post('size_id');
		$table='area_size';
		$filter=array('id'=>$id);
		$data2=$this->common_model->get_single($table,$filter);
        if($data2!=false)
		{	
			$flag=$this->common_model->update_data($table,$data,$filter);
			//print_r($flag);
			if($flag != false)
			{
				$this->set_success("Area Size updated Successfully");
			}
			else
			{
				$this->set_error("Area Size not updated!!");
			}
		}
		else
		{
			$this->set_success("Unknown Error...!!!");
		}
		redirect('area_size/view_area_size');
	}
}