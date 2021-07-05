<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Manage_applications extends CI_Controller {
	
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
		$this->data['activemenu'] = "Manage Applications";
		$this->data['title'] = "Manage Applications";
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
	
	function add_application_detail()
	{
	    $this->data['page'] = "Manage Applications";
		$this->data['title'] = "Manage Applications";
		$this->data['panel']    = "Dashboard";
		$this->data['categories']    = $this->common_model->get_by_condition('application_categories',array('status'=>1));
		$this->data['products']    = $this->common_model->get_by_condition('application_products',array('status'=>1));
		$view = "manage_applications/add_application_detail";
		$this->load_view($view);
	}
	
	function view_application_details()
	{
		$this->data['page'] = "Manage Applications";
		$this->data['title'] = "Manage Applications";
		$this->data['panel']    = "Dashboard";
		$view = "manage_applications/view_application_details";
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
		$data['product_id']=$this->input->post('select_product');
		$data['sub_category_id']=$this->input->post('select_sub_category');
		$data['category_id']=$this->input->post('select_category');
		if($this->input->post('available_size')!=''){
			$data['available_size']=implode(",",$this->input->post('available_size'));
		}
		if($this->input->post('application_status')){
			$data['status']=1;
		}
		else{
			$data['status']=0;
		}
		return $data;
	}
	
	function insert_application_details()
	{
		$data=$this->get_post_data();
		$data['created_datetime']=date('Y-m-d H:i:s');
		$table='application_details';
		$exist=$this->common_model->get_single($table,array('product_id'=>$data['product_id'],'category_id'=>$data['category_id'],'sub_category_id'=>$data['sub_category_id']));
		if($exist==false){
			$flag=$this->common_model->insert_data($table,$data);

			if($flag!=false)
			{	
				$this->set_success("Application details Added Successfully");
			}
			else
			{
				$this->set_error("Application details not inserted");
			}
		}
		else{
			$this->set_error("Record Already Exists!!!");
		}
		redirect('manage_applications/view_application_details');
	}
	
	function get_application_details()
	 {
        $joinColumsName =array("AD.id as aid,AD.id,P.product_name,C.category_name,SC.sub_category_name,AD.available_size,AD.status");
        $aColumns       = array("aid","product_name","category_name","sub_category_name","available_size","status");
        $findColumns    = array("AD.id","category_name","sub_category_name","product_name");
		$this->db->join('application_products AS P', 'P.id = AD.product_id','left');
		$this->db->join('application_categories AS C', 'C.id = AD.category_id','left');
		$this->db->join('application_sub_categories AS SC', 'SC.id = AD.sub_category_id','left');
		$sTable = 'application_details as AD';

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
				if( $col == 'status')
				{
					if($aRow['status']==1){
						$aRow['status']='Active';
					}
					else{
						$aRow['status']='Deactive';
					}
				}
				if( $col == 'available_size')
				{
					$final='';
					if($aRow['available_size']!=NULL){
						$size_array=explode(",",$aRow['available_size']);
						if(count($size_array)>0){
							foreach($size_array as $size){
								$get_size=$this->common_model->get_single('area_size',array('id'=>$size));
								if($get_size!=false){
									$final.=$get_size['size_name'].'<br>';
								}
							}
						}
					}
					$aRow['available_size']=$final;
				}
                $row[] = $aRow[$col];
				
            }

            //print_r($city);

            $row[] = '<div class="action-buttons">
						<a class="green" href="'.base_url().'manage_applications/edit_application_detail/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
                       
						<a class="red delete_link" href="'.base_url().'manage_applications/delete_application_detail/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';
			
            $output['aaData'][] = $row;

        }

        echo json_encode($output);
    }
	
	function delete_application_detail($id='')
	{
		
		$data=$this->common_model->get_single('application_details',array('id'=>$id));
		if($data!=false)
		{
			$flag=$this->common_model->delete_data('application_details',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}	
		}
		redirect('manage_applications/view_application_details');
	}
	
	function edit_application_detail($id='')
	{
		
		$this->data['page'] = "Edit Application Details";
		$this->data['title'] = "Edit Application Details";
		$this->data['panel']    = "Dashboard";
		$this->data['categories']    = $this->common_model->get_by_condition('application_categories',array('status'=>1));
		$this->data['products']    = $this->common_model->get_by_condition('application_products',array('status'=>1));
		$this->data['application_details']=$this->common_model->get_single('application_details',array('id'=>$id));
		$this->data['sub_categories']    = $this->common_model->get_by_condition('application_sub_categories',array('category_id'=>$this->data['application_details']['category_id']));
		$view = "manage_applications/edit_application_detail";
		$this->load_view($view);
	}
	
	function update_application_detail()
	{
		$data=$this->get_post_data();
		$data['modified_datetime']=date('Y-m-d H:i:s');
		$id=$this->input->post('app_id');
		$table='application_details';
		$filter=array('id'=>$id);
		$exist=$this->common_model->get_single($table,array('product_id'=>$data['product_id'],'category_id'=>$data['category_id'],'sub_category_id'=>$data['sub_category_id'],'id!='=>$id));
		if($exist==false){
			$data2=$this->common_model->get_single($table,$filter);
			if($data2!=false)
			{	
				$flag=$this->common_model->update_data($table,$data,$filter);
				//print_r($flag);
				if($flag != false)
				{
					$this->set_success("Record updated Successfully");
				}
				else
				{
					$this->set_error("Record not updated!!");
				}
			}
			else
			{
				$this->set_success("Unknown Error...!!!");
			}
		}
		else{
			$this->set_error("Record already exists!!");
		}
		redirect('manage_applications/view_application_details');
	}
	function get_sub_categories(){
		$option = '<option value="">-- Select --</option>';
		$cat_id= $this->input->post('cat_id');
		$flag=$this->common_model->get_by_condition("application_sub_categories",array('category_id'=>$cat_id));
		if($flag!=false){
			foreach($flag as $one){
				$option.='<option value="'.$one['id'].'">'.$one['sub_category_name'].'</option>';
			}
			echo $option;
		}
		else{
			echo false;
		}
	}
	function get_products_size(){
		$checkbox = '';
		$pro_id= $this->input->post('pro_id');
		$flag=$this->common_model->get_single("application_products",array('id'=>$pro_id));
		if($flag!=false){
			if($flag['available_size']!=NULL){
				$size_array=explode(",",$flag['available_size']);
				if(count($size_array)>0){
					foreach($size_array as $size){
						$get_size=$this->common_model->get_single('area_size',array('id'=>$size));
						if($get_size!=false){
						$checkbox.='<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="'.$get_size['id'].'" />  '.$get_size['size_name'].'</div>';
						}
					}
				}
			}
			echo $checkbox;
		}
		else{
			echo false;
		}
	}
}