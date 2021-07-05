<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color_innovator extends CI_Controller {

	public $data;
	
		function __construct() {
			parent::__construct();

			$this->load->helper('url');
			$this->load->library('Color_image_lib');
			$this->load->model('Model_color');
			$this->load->model('Common_model');
		}
			
	function load_view($view = "")
	{
		$this->load->view($view, $this->data);
	}

	public function index()
	{
		$filter = array(
			'status' => '0',
		);
		$this->data['colors']=$this->Model_color->selectquery('color_room',$filter);
		$this->load_view("colors");
	}
	
	public function colorlist()
	{
		$list = $this->Model_color->select('color_room');
	}
	
	public function make_color()
	{
		$colors = $this->input->post('colors');
		$img_src = $this->input->post('img_src');
		$cnt=0;
		$red=0;
		$green=0;
		$blue=0;
		foreach($colors as $color) 
		{
			if(!array_key_exists('time_stamp', $color))
			{
				$cnt++;
				$red = $red + $color['r'];
				$green = $green + $color['g'];
				$blue = $blue + $color['b'];
			}
		}
		$x = 325;
		$y = 295;
		$im = imagecreatetruecolor($x,$y);
		for($i = 0; $i < $x; $i++) {
			for($j = 0; $j < $y; $j++) {
				$color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
				imagesetpixel($im, $i, $j, $color);
			}
		}    
		header('Content-Type: image/jpeg');
		ImageJPEG($im);
		 $save = "./images/". $img_src .".jpeg";
		//chmod($save,0755);
		ImageJPEG($im, $save, 0, NULL);
		
	}
	
	public function ImageColorAllocateFromHex ($img, $hexstr) 
	{ 
	  $int = hexdec($hexstr); 
	
	  return ImageColorAllocate ($img, 
			 0xFF & ($int >> 0x10), 
			 0xFF & ($int >> 0x8), 
			 0xFF & $int); 
	}
	
	public function make_color_2()
	{
		$colors = $this->input->post('colors');
		$img_src = $this->input->post('img_src');
		
		$x = 100;
		$y = 100;
		$im = imagecreatetruecolor($x,$y);
		if (is_resource($im)) {
			//$blue = array_map('hexdec', str_split('0000FF', 2));
			$white = $colors[0];
			foreach($colors as $color) 
			{
				if(!array_key_exists('time_stamp', $color))
				{
					$blue = ImageColorAllocate($im, $color['r'], $color['g'], $color['b']);
					for ($w = 1; $w <= $x; $w++) {
						for ($h = 1; $h <= $y; $h++) {
							if (mt_rand(1, 100) >= 50)
								ImageSetPixel($im, $w, $h, $blue);
							else
								ImageSetPixel($im, $w, $h, $white);
						}
				}
				
			}
		}
		header('Content-Type: image/jpeg');
		ImageJPEG($im);
		 $save = "./images/". $img_src .".jpeg";
		//chmod($save,0755);
		ImageJPEG($im, $save, 0, NULL);
		  
		}
	}
	
	public function drawImage()
	{
		$info = $this->input->post("colors");
		$this->color_image_lib->createImage($info);
	}
	
	public function get_colors()
	{
		$table= "color_room";
		$colors=$this->Model_color->selectquery_2($table);
		echo json_encode($colors);
	}
	
	public function create_session()
	{
		$request_sample = $this->input->post('img_request_sample');
		$sess_array = array(
			 'img_src'		 => $request_sample['img_request_url'],
			 'img_formula'	 => $request_sample['img_request_info'],
			 'img_name'		 => $request_sample['img_request_name']
		);
		$this->session->set_userdata($sess_array);
		//echo 'yes';
	}
	
	function save_image()
	{	
		$image_info = array();
		$image_info = $this->input->post('image_info');
		$img_path = $image_info['img_request_url'];
		$filename = basename($img_path); 
		$data= array(
			'image_info'		=> $image_info['img_request_info'],
			'created_date'		=>	date('Y-m-d H:i:s'),
			'swatch_name'		=> $image_info['img_request_name'],
			'org_image_path'	=>	$image_info['img_request_url'],
			'org_image_name'	=>	$filename,
		);
		$table="saved_album";
		$id = $this->Model_color->insert_data($table, $data); 
		/*$current_cat_array = $this->session->userdata('colors_category_list');
		$saved_album = array();
		if($this->session->userdata('saved_album_session')=='')
		{
			$saved_album[$current_cat_array['category']][] = $id;
			$this->session->set_userdata('saved_album_session',$saved_album);
			$this->session->unset_userdata('created_image_data');
		}
		else
		{
			$old_session = $this->session->userdata('saved_album_session'); 
			$old_session[$current_cat_array['category']][] = $id;
			$this->session->unset_userdata('saved_album_session');
			$this->session->set_userdata('saved_album_session',$old_session);
		}*/
		echo $id;
	}
	
	public function check_exist_swatchname()
	{
		$swatch_name = $this->input->post('swatch_name');
	    $table= "saved_album";
		$this->db->select('*');
        $this->db->where("swatch_name",$swatch_name);  
        $query = $this->db->get($table);
        $result=$query->result_object();
        if(count($result)>0){
            echo false;
        }
        else{
            echo true;
        }
		//echo 'yes';
	}
	
	function save_gallery()
	{	
		$outdoor_ids = [];
		$indoor_ids = [];
		$gallery_id = "";
		$gallery_id = time()."_".rand(00000000,99999999);
		$user_id = $this->input->post('user_id');
		//echo $this->input->post('gallery_id');
		$data1=array(
			'gallery_name'=>$this->input->post('name_swatch'),
			'gallery_id'=>$gallery_id,
			'user_id'=>$user_id,
		);
		if($this->input->post('gallery_id')!=''){
			$update_data=$this->Common_model->update_data('saved_gallery',array('updated_date'=>date('Y-m-d H:i:s')),array('id'=>$this->input->post('gallery_id')));
			$last_id=$this->input->post('gallery_id');
		}else{
			$last_id=$this->Common_model->insert_data('saved_gallery',$data1);
		}
		if($this->session->userdata('saved_album_session')!='')
		{
			$saved_albums = $this->session->userdata('saved_album_session');
			if(array_key_exists(2,$saved_albums) &&  count($saved_albums[2])>0){
				$outdoor_ids = $saved_albums[2];
			}
			if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){
				$indoor_ids = $saved_albums[1];
			}
			//$ids = $this->session->userdata('saved_album_session');
			//$ids = explode(",",$ids);
		}
		//print_r($outdoor_ids);
		//print_r($indoor_ids);
		$gal_and_swatch_indoor_count = $gal_and_swatch_outdoor_count = 0;
		$check_indoor_gallery = $this->Common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id,'category_id'=>1));
		$check_outdoor_gallery = $this->Common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id,'category_id'=>2));
		$check_gallery = $this->Common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id));
		if($check_indoor_gallery!=false){
			$gal_and_swatch_indoor_count = count($check_indoor_gallery) + count($indoor_ids);
		}
		if($check_outdoor_gallery!=false){
			$gal_and_swatch_outdoor_count = count($check_indoor_gallery) + count($indoor_ids);
		}
		if($check_gallery!=false && count($check_gallery)>=10){
			echo false;
		}
		else if($check_indoor_gallery!=false && $gal_and_swatch_indoor_count > 5){
			echo false;
		}
		else if($check_outdoor_gallery!=false && $gal_and_swatch_outdoor_count > 5){
			echo false;
		}
		else{
		
			if($last_id!=false){
				//$ids = $this->input->post('id');
				//$ids = explode(",",$ids);
				
				if(count($outdoor_ids) > 0){
					foreach($outdoor_ids as $id){
						$data= array(
							'gallery_id' 		=> $last_id,
							'user_id' 			=> $user_id,
						);
						$table="saved_album";
						$filter = array("id"=>$id);
						$res = $this->Common_model->update_data($table, $data, $filter);
						$record = $this->Model_color->get_single($table,$filter);
						if($res != false){
							$result[$id] = $record;
							$result['gal_id']=$last_id;
						}else{
							$result["fail"] = "false";
						}
					}
				}
				if(count($indoor_ids)>0){
					foreach($indoor_ids as $id){
						$data= array(
							'gallery_id' 		=> $last_id,
							'user_id' 			=> $user_id,
						);
						$table="saved_album";
						$filter = array("id"=>$id);
						$res = $this->Common_model->update_data($table, $data, $filter);
						$record = $this->Model_color->get_single($table,$filter);
						if($res != false){
							$result[$id] = $record;
							$result['gal_id']=$last_id;
						}else{
							$result["fail"] = "false";
						}
					}
				}
				$results = json_encode($result);
				print_r($results);
			}
		}
	}
	
	public function get_img_record()
	{
		//print_r($_POST);
		$img_id = $this->input->post('img_id');
		$filter = array(
			'id'	=>	$img_id,
		);
		$table='saved_album';
		$img_record = $this->Model_color->get_single($table,$filter);
		echo json_encode($img_record);
	}	
	public function place_image()
	{
		$this->load_view("place_img_2");
	}
	public function add_custom_photos(){
		$user_id=$this->input->post('userid');
		if(isset($_FILES['browse_custom_image'])){
			$upload_image=$this->Common_model->custom_upload('browse_custom_image','user_custom_images/'.$user_id.'/',$allowd="JPG|jpg|png|PNG|jpeg","");
			if($upload_image){
				$file_name=$upload_image['file_name'];
				$get_single=$this->Common_model->get_single('user_custom_image_table',array('user_id'=>$user_id));
				$flag=false;
				if($get_single!=false){
					if($get_single['image_name']!='' && file_exists(FCPATH.'uploads/user_custom_images/'.$user_id.'/'.$get_single['image_name'])){
						unlink(FCPATH.'uploads/user_custom_images/'.$user_id.'/'.$get_single['image_name']);
					}
					$flag=$this->Common_model->update_data('user_custom_image_table',array('image_name'=>$file_name),array('user_id'=>$user_id));
				}
				else{
					$flag=$this->Common_model->insert_data('user_custom_image_table',array('image_name'=>$file_name,'user_id'=>$user_id,'created_datetime'=>date('Y-m-d H:i:s')));
				}
				echo $flag;
			}
		}
	}
	public function get_last_uploaded_image(){
		if ($this->session->userdata('logedin_user') != "") {
			$user_id=$this->session->userdata['logedin_user']['id'];
			$user_custom_image_details=$this->Common_model->get_single('user_custom_image_table',array('user_id'=>$user_id));
			if($user_custom_image_details!=false){
				echo base_url().'uploads/user_custom_images/'.$user_id.'/'.$user_custom_image_details['image_name'];
			}
			else{
				echo false;
			}
		}
		else{
			echo false;
		}
	}
}
