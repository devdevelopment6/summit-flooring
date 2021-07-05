<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Manage_requests extends MX_Controller {
	
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
		$this->data['activemenu'] = "Manage Sample Requests";
		$this->data['title'] = "Manage Sample Requests";
		$this->data['page'] = "";
		$this->data['panel'] = "Manage Sample Requests";
	}
	function load_view($view = "request_list")
	{
		$this->load->view('admin/admin_header', $this->data);
		$this->load->view('admin/admin_sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/admin_footer');
	}
	
	function index()
	{
		$this->data['activemenu'] = "Manage Sample Requests";
		$this->data['title']    = "Manage Sample Requests";
		$this->data['page']     = "Manage Sample Requests";
		$view='request_list';
		$this->load_view($view);
	}
	function get_requests()
	{
		$joinColumsName =array("id,id as rid,name,email_id,telephone,created_datetime");
        $aColumns       = array("rid","name","email_id","telephone","created_datetime");
        $findColumns    = array("name","email_id","telephone");
		//$this->db->order_by("id","ASC");
        $sTable = 'sample_request_table';

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
			
            foreach ($aColumns as $col) {
				if($col == 'rid'){
					$aRow['rid'] = ++$i;
				}
				 $row[] = $aRow[$col];
            }
			$row[] = '<div class="action-buttons">
					<a class="green" href="'.base_url().'manage_requests/view_details/'.$aRow['id'].'" title="Edit Color">
						<i class="ace-icon fa fa-eye bigger-130"></i>
					</a>
					<a class="red delete_request" data-id="'.$aRow['id'].'" title="Delete Request">
						<i class="ace-icon fa fa-trash bigger-130"></i>
					</a>
				</div>
				';
			

            $output['aaData'][] = $row;

        }

        echo json_encode($output);
	}
	public function view_details($id = '')
	{
		if($id!='')
		{
			$this->data['activemenu'] = "Manage Sample Requests";
			$this->data['title']    = "View Sample Requests";
			$this->data['page']     = "View Sample Requests";
			$this->data['details']  = $this->common_model->get_single('sample_request_table',array('id'=>$id));
			$view='request_details';
			$this->load_view($view);
		}
		else
		{
			redirect('manage_requests');
		}
	}
	public function delete_request()
	{
		$id=$this->input->post('id');
		$flag=$this->common_model->delete_data('sample_request_table',array('id'=>$id));
		if($flag!=''){
			$this->session->set_flashdata("success","Record deleted successfully!!");
		}
		else{
			$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
		}
		echo true;
	}
}