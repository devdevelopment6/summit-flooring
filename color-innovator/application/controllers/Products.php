<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Products extends CI_Controller {
	
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
		$this->data['activemenu'] = "Products";
		$this->data['title'] = "Products";
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
	    $this->data['page'] = "Product List";
		$this->data['title'] = "Product";
		$this->data['panel']    = "Dashboard";
		$view = "manage_home_products";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$this->load->view('admin/header', $this->data);
		$this->load->view('admin/sidebar', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('admin/footer');
	}
	
	function add_products()
	{
		$this->data['page'] = "Add Product";
		$this->data['title'] = "Product";
		$category	=	$this->common_model->get_all('product_category');
		$this->data['category'] = $category;
		$view = "add_products";
		$this->load_view($view);
	}
	
	function product_post_data()
	{	
		$data['product_name'] 		= 	$this->input->get_post('product_name');
		$data['head_line'] 		= 	$this->input->get_post('head_line');
		$product_url = $this->input->get_post('product_url');
		$data['product_url'] 		= str_replace(array(' ',"/","_"),"-",$product_url);
		$data['product_header_content'] 		= 	$this->input->get_post('product_header_content');
		$data['section_2_title'] 		= 	$this->input->get_post('section_2_title');
		$data['section_2_content'] 		= 	$this->input->get_post('section_2_content');
		$data['mid_content_title'] 		= 	$this->input->get_post('mid_content_title');
		$data['middle_content'] 		= 	$this->input->get_post('middle_content');
		
		$data['short_description'] 	= 	$this->input->get_post('short_description');
        $data['description'] 		= 	$this->input->get_post('description');
		$data['product_category'] 	= 	$this->input->get_post('product_category');
		$data['features']			=	$this->input->get_post('features');
		$data['best_applications']	=	$this->input->get_post('best_applications');
		$data['measurement']		=	$this->input->get_post('measurement');
		$data['download_link']		=	$this->input->get_post('download_link');
		$data['gallery_link']		=	$this->input->get_post('gallery_link');
		
		$data['video_link_1']		=	$this->input->get_post('video_link_1');
		$data['video_link_2']		=	$this->input->get_post('video_link_2');
		$data['video_link_3']		=	$this->input->get_post('video_link_3');
		
		$data['status']				=	$this->input->get_post('status');
		
		if($_FILES['homepage_product_image']['name']!=''){
            $homepage_image=$this->common_model->upload('homepage_product_image','homepage_products_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($homepage_image!=false){
                $data['homepage_product_image']=$homepage_image['file_name'];
            }
        }
		
		if($_FILES['homepage_title_product_image']['name']!=''){
            $homepage_title_image=$this->common_model->upload('homepage_title_product_image','homepage_title_products_image',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($homepage_title_image!=false){
                $data['homepage_title_product_image']=$homepage_title_image['file_name'];
            }
        }
		
		if($_FILES['banner_product_image']['name']!=''){
            $banner_image=$this->common_model->upload('banner_product_image','products_banner',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($banner_image!=false){
                $data['banner_product_image']=$banner_image['file_name'];
            }
        }
		
		if($_FILES['main_product_image']['name']!=''){
            $banner_image=$this->common_model->upload('main_product_image','products',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($banner_image!=false){
                $data['product_image']=$banner_image['file_name'];
            }
        }
		else
		{
			$data['product_image'] = "Image.jpg";
		}
		
		if($_FILES['main_product_image_mobile']['name']!=''){
            $banner_image=$this->common_model->upload('main_product_image_mobile','products_mobile',$allowd="jpg|jpeg|png",array('width'=>200,'height'=>300));
            if($banner_image!=false){
                $data['product_image_mobile']=$banner_image['file_name'];
            }
        }
		else
		{
			$data['product_image_mobile'] = "Image.jpg";	
		}
		
	/*	

$banner_image_upload = $this->common_model->upload("pdf_to_image","products_pdf",$allowd="pdf");
print_r($banner_image_upload);
//$banner_image_upload['file_name'];

echo $pdf_file   = './uploads/products_pdf/'.$banner_image_upload['file_name'];//$_FILES['pdf_to_image']['name'];
$save_to    = './uploads/products_pdf/demo.jpg';

$img = new imagick($pdf_file);
$img->setResolution(200,200);
$img->readImage("{$pdf_file}[1]");
$img->scaleImage(800,0);

//set new format
$img->setImageFormat('jpg');
 
//save image file
$img->writeImage($save_to);
*/
		
		return $data;
	}
	
	function insert_products()
	{
		$table="products";
		$data=$this->product_post_data();
	
		$now = date('Y-m-d H:i:s');
		$data['created_date']	= $now;
		
		$flag=$this->common_model->insert_data($table,$data);
		$id = $this->db->insert_id();
		if($flag!= '')
		{
			$doc_data['document_title_1']		=	$this->input->get_post('document_title_1');
			$doc_data['document_title_2']		=	$this->input->get_post('document_title_2');
			$doc_data['document_title_3']		=	$this->input->get_post('document_title_3');
			$doc_data['document_title_4']		=	$this->input->get_post('document_title_4');
			$doc_data['document_title_5']		=	$this->input->get_post('document_title_5');

			if($_FILES['download_link_1']['name']!=''){
				$download_link_1=$this->common_model->upload('download_link_1','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_1!=false){
					$doc_data['download_link_1']=$download_link_1['file_name'];
				}
			}
			
			if($_FILES['download_link_2']['name']!=''){
				$download_link_2=$this->common_model->upload('download_link_2','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_2!=false){
					$doc_data['download_link_3']=$download_link_2['file_name'];
				}
			}
			if($_FILES['download_link_3']['name']!=''){
				$download_link_3=$this->common_model->upload('download_link_3','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_3!=false){
					$doc_data['download_link_3']=$download_link_3['file_name'];
				}
			}
			if($_FILES['download_link_4']['name']!=''){
				$download_link_4=$this->common_model->upload('download_link_4','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_4!=false){
					$doc_data['download_link_4']=$download_link_4['file_name'];
				}
			}
			if($_FILES['download_link_5']['name']!=''){
				$download_link_5=$this->common_model->upload('download_link_5','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_5!=false){
					$doc_data['download_link_5']=$download_link_5['file_name'];
				}
			}
			$doc_data['product_id']=$id;
			$flag2 = $this->common_model->insert_data('product_documents', $doc_data);
			if($flag2!=false)
			{
				$this->set_success("Image(s) Uploaded Successfully!!");
				if($_FILES['gallery_image']['name']!='')
				{
					$filesCount = count($_FILES['gallery_image']['name']);

					$files = $_FILES['gallery_image'];
					$i=0;
					foreach($files['name'] as $file)
					{  
						$_FILES['gallery_image']['name'] = $files['name'][$i];
						$_FILES['gallery_image']['type']= $files['type'][$i];
						$_FILES['gallery_image']['tmp_name']= $files['tmp_name'][$i];
						$_FILES['gallery_image']['error']= $files['error'][$i];
						$_FILES['gallery_image']['size']= $files['size'][$i];
						$image=$files['name'][$i];

						if($image!=''){

							$table = "product_gallery";
							$data=array(
								'product_id'=>$id,
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s')
							);
							$banner_image_upload=$this->common_model->upload("gallery_image","products_gallery",$allowd="jpg|jpeg|png", array('width' => 200, "height" => 300));

							if($banner_image_upload!=false)
							{
								$data['gallery']=$banner_image_upload['file_name'];
								$flag = $this->common_model->insert_data($table, $data);
								if($flag!=false){
									$this->set_success("Image(s) Uploaded Successfully!!");
								}
								else{
									$this->set_error("Unknown Error!");
								}
							}
							else
							{
								$error = array('error' => $this->upload->display_errors());
								$this->set_error($error['error']);
							}
						}
						$i++;
					}

				}

				$this->set_success("Product Added Successfully");
				redirect("products/");
			}
			else
			{
				$this->set_error("Unknown Error!");
			}
		}
		else
		{
			$this->set_error("ERROR! Unknown Error!");
			redirect("products/");
		}																																																				
		redirect("products/");
	}
	
	function get_products()
    	{
        $joinColumsName =array("P.id,P.product_name,P.product_image, CP.name as name,P.product_category,P.description,P.features,P.best_applications,P.measurement,P.download_link,P.status,P.created_date,P.updated_date");
        $aColumns       = array("id","product_name","product_image","name","status");
        $findColumns    = array("P.id","P.product_name","P.product_category","P.status");
		
		$this->db->join('product_category AS CP', 'CP.id = P.product_category', 'left');
		
        $sTable = 'products as P';

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
				if( $col == 'product_image')
				{
					$aRow['product_image'] = '<img src="'.base_url().'uploads/products/'.$aRow['product_image'].'" style="heigh:50px;width:50px;">';
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
						<a class="green" href="'.base_url().'products/edit_product/'.$aRow['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red delete_link" href="'.base_url().'products/delete_product/'.$aRow['id'].'" onClick="javascript:return confirm(\'Are You Sure to delete This?\');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
	
	function edit_product($id='')
	{
		$category	=	$this->common_model->get_all('product_category');
		$this->data['category'] = $category;
        if($id!=''){	
			$this->data['products']		=	$this->common_model->get_single('products',array('id'=>$id));
			$this->data['products_doc']		=	$this->common_model->get_single('product_documents',array('product_id'=>$id));
			$this->data['gallery']		=	$this->common_model->get_all_2('product_gallery',array('product_id'=>$id));
			$view="edit_product";
        	$this->load_view($view);
        }
	}
	
	function generatePDFtoImage($uploadPDF)
	{
		//$banner_image_upload = $this->common_model->upload("pdf_to_image","products_pdf",$allowd="pdf");
		//print_r($banner_image_upload);
		//$banner_image_upload['file_name'];

		$pdf_file   = './uploads/products_pdf/'.$uploadPDF;			//$_FILES['pdf_to_image']['name'];
		
		$image_file = explode(".",$uploadPDF);
		$totalCount = count($image_file);
		$image_file[$totalCount - 1] = 'jpg';
		
		$imageFileName = implode('.',$image_file);
		
		$save_to    = './uploads/products_pdf/'.$imageFileName;

		$img = new imagick($pdf_file);
		$img->setResolution(200,200);
		$img->readImage("{$pdf_file}[0]");
		$img->scaleImage(800,0);

		//set new format
		$img->setImageFormat('jpg');

		//save image file
		$img->writeImage($save_to);
	}
	
	function update_products($id="")
    {
        $table="products";
		$filter=array('id'=>$id);
        $result=$this->product_post_data();
		
		$res = $this->common_model->get_single($table,$filter);
		
		if($res['product_image_mobile']!= "Image.jpg"){
			$result['product_image_mobile'] = $res['product_image_mobile'];
		}
		if($res['product_image']!= "Image.jpg"){
			$result['product_image'] = $res['product_image'];
		}

		$now = date('Y-m-d H:i:s');
		$result['updated_date']	= $now;
		$data = $result;
		
		$update=$this->common_model->update_data($table,$data,$filter);
		if($update!=false)
		{
			$doc_data['document_title_1']		=	$this->input->get_post('document_title_1');
			$doc_data['document_title_2']		=	$this->input->get_post('document_title_2');
			$doc_data['document_title_3']		=	$this->input->get_post('document_title_3');
			$doc_data['document_title_4']		=	$this->input->get_post('document_title_4');
			$doc_data['document_title_5']		=	$this->input->get_post('document_title_5');

			if($_FILES['download_link_1']['name']!=''){
				$download_link_1=$this->common_model->upload('download_link_1','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_1!=false){
					$doc_data['download_link_1']=$download_link_1['file_name'];
					$this->generatePDFtoImage($download_link_1['file_name']);
				}
			}
			
			if($_FILES['download_link_2']['name']!=''){
				$download_link_2=$this->common_model->upload('download_link_2','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_2!=false){
					$doc_data['download_link_2']=$download_link_2['file_name'];
					$this->generatePDFtoImage($download_link_2['file_name']);
				}
			}
			if($_FILES['download_link_3']['name']!=''){
				$download_link_3=$this->common_model->upload('download_link_3','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_3!=false){
					$doc_data['download_link_3']=$download_link_3['file_name'];
					$this->generatePDFtoImage($download_link_3['file_name']);
				}
			}
			if($_FILES['download_link_4']['name']!=''){
				$download_link_4=$this->common_model->upload('download_link_4','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_4!=false){
					$doc_data['download_link_4']=$download_link_4['file_name'];
					$this->generatePDFtoImage($download_link_4['file_name']);
				}
			}
			if($_FILES['download_link_5']['name']!=''){
				$download_link_5=$this->common_model->upload('download_link_5','products_pdf',$allowd="pdf|doc|docx");
				if($download_link_5!=false){
					$doc_data['download_link_5']=$download_link_5['file_name'];
					$this->generatePDFtoImage($download_link_5['file_name']);
				}
			}
			$doc_data['product_id']=$id;
			
			
			//	Sanket Changes 24th March 2018 start
			
			$getDocDetails = $this->common_model->get_single('product_documents', array('product_id'=>$id));
			
			if(!empty($getDocDetails))
				$flag2 = $this->common_model->update_data('product_documents', $doc_data,array('product_id'=>$id));
			else
				$flag2 = $this->common_model->insert_data('product_documents', $doc_data);
			
			//	Sanket Changes 24th March 2018 end
			
			
			if($flag2!=false)
			{
				if($_FILES['gallery_image']['name']!='')
				{
			
					$filesCount = count($_FILES['gallery_image']['name']);
					
					$files = $_FILES['gallery_image'];
					$i=0;
					foreach($files['name'] as $file)
					{  
						$_FILES['gallery_image']['name'] = $files['name'][$i];
						$_FILES['gallery_image']['type']= $files['type'][$i];
						$_FILES['gallery_image']['tmp_name']= $files['tmp_name'][$i];
						$_FILES['gallery_image']['error']= $files['error'][$i];
						$_FILES['gallery_image']['size']= $files['size'][$i];
						$image=$files['name'][$i];
						
						if($image!=''){
						
							$table = "product_gallery";
							$data=array(
								'product_id'=>$id,
								'created_date'=>date('Y-m-d H:i:s'),
								'updated_date'=>date('Y-m-d H:i:s')
							);
							$banner_image_upload=$this->common_model->upload("gallery_image","products_gallery/",$allowd="jpg|jpeg|png", array('width' => 200, "height" => 300));
							if($banner_image_upload!=false)
							{
								$data['gallery']=$banner_image_upload['file_name'];
								$flag = $this->common_model->insert_data($table, $data);
								if($flag!=false){
									$this->set_success("Image(s) Uploaded Successfully!!");
								}
								else{
									$this->set_error("Unknown Error!");
								}
							}
							else
							{
								$error = array('error' => $this->upload->display_errors());
								$this->set_error($error['error']);
							}
						}
						$i++;
					}
				}
				
				$this->set_success("Product Updated Successfully!!!");
			}
			else
			{
				$this->set_error("ERROR! Unknown Error!");
			}
		}
		else{
			$this->set_error("ERROR! Unknown Error!");
		}																																																 		
        redirect("products/");
    }
	
	function delete_product($id="")
    {
        if ($id != "")
        {
            $filter = array("id" => $id);
            $table = "products";

            $data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
                $flag = $this->common_model->delete_data($table, $filter);
                $this->set_success("Product Deleted successfuly!");
                if ($flag != false)
                {
                    $this->set_success("Product Deleted successfuly!");
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
        redirect("products/");
    }
	
	function delete_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array("product_image"=>'Image.jpg');
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
	
	function delete_homepage_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array("homepage_product_image"=>'Image.jpg');
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
	
	function delete_homepage_title_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array("homepage_title_product_image"=>'Image.jpg');
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
	
	function delete_image_mobile()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array("product_image_mobile"=>'Image.jpg');
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
	
	function delete_banner_image()
    {
		$image_id 	= 	$this->input->get_post('image_id');
		$id			=	$this->input->get_post('id');
        $table = "products";
		$filter = array("id"=>$id);
		$data = $this->common_model->get_single($table, $filter);
            if ($data != false)
            {
				$data = array("banner_product_image"=>'Image.jpg');
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
		
	function delete_gallery_image()
    {
		$id			=	$this->input->get_post('id');
        $table = "product_gallery";
		$filter = array("id"=>$id);
		$data = $this->common_model->delete_data($table, $filter);
            if ($data != false)
            {
				return "1";
            }
            else
            {
				return "0";
            }
		return "0";
    }
	function delete_product_document($id='',$field='')
    {
		$id=$this->input->get_post('id');
		$field=$this->input->get_post('field');
        $table = "product_documents";
		$filter = array("product_id"=>$id);
		$data=array($field=>'');
		$data = $this->common_model->update_data($table, $data,$filter);
		if ($data != false)
		{
			return "1";
		}
		else
		{
			return "0";
		}
		return "0";
		 
    }
}