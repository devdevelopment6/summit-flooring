<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Application_products extends CI_Controller {
	
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
		$this->data['activemenu'] = "Application Products";
		$this->data['title'] = "Application Products";
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
	
	function add_application_product()
	{
	    $this->data['page'] = "Application Products";
		$this->data['title'] = "Application Products";
		$this->data['panel']    = "Dashboard";
		$this->data['all_area_size']=$this->common_model->get_all('area_size');
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$view = "application_products/add_application_product";
		$this->load_view($view);
	}
	
	function view_application_products()
	{
		$this->data['page'] = "Application Products";
		$this->data['title'] = "Application Products";
		$this->data['panel']    = "Dashboard";
		$view = "application_products/view_application_products";
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
		$data['product_name']=$this->input->post('product_name');
		if($this->input->post('available_size')!=''){
			$data['available_size']=implode(",",$this->input->post('available_size'));
		}
		if($this->input->post('product_status')){
			$data['status']=1;
		}
		else{
			$data['status']=0;
		}
		$data['main_product_id'] = $this->input->post('select_product');
		return $data;
	}
	
	function insert_application_product()
	{
		$data=$this->get_post_data();
		$data['created_datetime']=date('Y-m-d H:i:s');
		$table='application_products';
		$flag=$this->common_model->insert_data($table,$data);
       
		if($flag!=false)
		{	
			if($_FILES['product_image_name']['name']!=''){
				$upload_pic = $this->common_model->upload('product_image_name','application_products/'.$flag,'jpg|jpeg|PNG|png|JPG','');
				if($upload_pic!=false){
					$file_name = $upload_pic['file_name'];
					$this->common_model->update_data('application_products',array('product_image'=>$file_name),array('id'=>$flag));
				}
			}
			$this->set_success("Application Product Added Successfully");
		}
		else
		{
			$this->set_success("Application Product not inserted");
		}
		redirect('application_products/view_application_products');
	}
	
	function get_application_products()
	 {
        $joinColumsName =array("id as pid,id,product_name,product_image,available_size,status");
        $aColumns       = array("pid","product_name","available_size","product_image","status");
        $findColumns    = array("id","product_name");
	
		$sTable = 'application_products';

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
				
				if( $col == 'pid')
				{
					$aRow['pid']=++$j;
				}
				if($col == 'product_image'){
					if($aRow['product_image']!=''){
					$aRow['product_image']='<img src="'.base_url().'uploads/application_products/'.$aRow['id'].'/'.$aRow['product_image'].'" style="height:30px;width:140px;" />';
					}
					else{
						$aRow['product_image']='';
					}
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
						<a class="green" href="'.base_url().'application_products/edit_application_product/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
                       
						<a class="red delete_link" href="'.base_url().'application_products/delete_application_product/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';
			
            $output['aaData'][] = $row;

        }

        echo json_encode($output);
    }
	
	function delete_application_product($id='')
	{
		
		$data=$this->common_model->get_single('application_products',array('id'=>$id));
		if($data!=false)
		{
			if($data['product_image']!= '' && file_exists(FCPATH.'uploads/application_products/'.$id.'/'.$data['product_image']) && !is_dir(FCPATH.'uploads/application_products/'.$id.'/'.$data['product_image'])){
				unlink(FCPATH.'uploads/application_products/'.$id.'/'.$data['product_image']);
			}
			$flag=$this->common_model->delete_data('application_products',array('id'=>$id));
			if($flag!='')
			{
				$this->session->set_flashdata("success","Record deleted successfully!!");
			}
			else
			{
				$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");
			}	
		}
		redirect('application_products/view_application_products');
	}
	
	function edit_application_product($id='')
	{
		
		$this->data['page'] = "Edit Application Product";
		$this->data['title'] = "Edit Application Product";
		$this->data['panel']    = "Dashboard";
		$this->data['all_area_size']=$this->common_model->get_all('area_size');
		$this->data['application_product']=$this->common_model->get_single('application_products',array('id'=>$id));
		$this->data['products']=$this->common_model->get_by_condition('products',array('status'=>1));
		$view = "application_products/edit_application_product";
		$this->load_view($view);
	}
	
	function update_application_product()
	{
		$data=$this->get_post_data();
		$data['modified_datetime']=date('Y-m-d H:i:s');
		$id=$this->input->post('product_id');
		
		
		$table='application_products';
		$filter=array('id'=>$id);
		$data2=$this->common_model->get_single($table,$filter);
        if($data2!=false)
		{	
			if($_FILES['product_image_name']['name']!=''){
				if($data2['product_image']!= '' && file_exists(FCPATH.'uploads/application_products/'.$id.'/'.$data2['product_image']) && !is_dir(FCPATH.'uploads/application_products/'.$id.'/'.$data2['product_image'])){
					unlink(FCPATH.'uploads/application_products/'.$id.'/'.$data2['product_image']);
				}
				$upload_pic = $this->common_model->upload('product_image_name','application_products/'.$id,'jpg|jpeg|PNG|png|JPG','');
				if($upload_pic!=false){
					$data['product_image'] = $upload_pic['file_name'];
				}
			}
			
			$flag=$this->common_model->update_data($table,$data,$filter);
			//print_r($flag);
			if($flag != false)
			{
				$this->set_success("Application Product updated Successfully");
			}
			else
			{
				$this->set_error("Application Product not updated!!");
			}
		}
		else
		{
			$this->set_success("Unknown Error...!!!");
		}
		redirect('application_products/view_application_products');
	}
}