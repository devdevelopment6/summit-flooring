<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {	

	public $data, $logedin;

	public function __construct()

	{

		parent::__construct();

		$this->data['active_menu'] = 'mix';

		$this->data['active_submenu'] = 'step_1';

		$this->load->model('common_model');

		$this->load->library('Color_image_lib');

		$this->data['title'] = "Home";

		$this->data['panel'] = "Home";

		$this->data['sitesettings'] = $this->common_model->get_single('site_settings_table',array('id'=>'1'));

	}

	public function reg(){

		$this->load->view('home/header_new',$this->data);

		$this->load->view('new_register',$this->data);

		$this->load->view('home/footer_new');

	}

	

	public function login(){

		$this->load->view('home/header_new',$this->data);

		$this->load->view('new_login',$this->data);

		$this->load->view('home/footer_new');

	}

	public function loginplace(){

		$this->data['active_menu'] = 'place';

		$this->data['active_submenu'] = 'step_5';

		$this->load->view('home/header_new',$this->data);

		$this->load->view('new_login_second',$this->data);

		$this->load->view('home/footer_new');

	}

	

	public function sample(){

		$this->load->view('home/header_new');

		$this->load->view('new_sample_page');

		$this->load->view('home/footer_new');

	}

	public function help(){

		$this->load->view('home/header_new');

		$this->load->view('new_help');

		$this->load->view('home/footer_new');

	}

	

	public function load_view($view='home')

	{

		$this->load->view('home/header_new',$this->data);

		//$this->load->view('admin/admin_sidebar',$this->data);

		$this->load->view($view,$this->data);

		$this->load->view('home/footer_new');

 	}

	function delete_created_image_session(){

		$this->session->unset_userdata('created_image_data');

		echo true;

	}

	function destroy_step2_3_details(){

		$this->session->unset_userdata('colors_category_list');

		$this->session->unset_userdata('colors_list');

		$this->session->unset_userdata('created_image_data');

	}

	function destroy_and_create_category_session(){

		

		$category=$this->input->post('category');

		$new_array=array();

		$new_array["category"]= $category;

		$this->session->unset_userdata('colors_category_list');

		$this->session->unset_userdata('colors_list');

		$this->session->unset_userdata('created_image_data');

		//$this->session->unset_userdata('saved_album_session');

		$this->session->set_userdata('colors_category_list',$new_array);

		echo json_encode($this->session->userdata('colors_category_list'));

		//exit();

	}

	function create_category_session(){

		$category=$this->input->post('category');

		$new_array=array();

		$new_array["category"]= $category;

		$this->session->unset_userdata('colors_category_list');

		$this->session->set_userdata('colors_category_list',$new_array);

		echo json_encode($this->session->userdata('colors_category_list'));

		exit();

	}

	public function check_current_category(){

		$category=$this->input->post('category');

		if($this->session->userdata('colors_category_list')!=''){

			$current_cat_array = $this->session->userdata('colors_category_list');

			if($current_cat_array['category']!=$category){

				echo false;

			}

			else{

				echo true;

			}

		}

		else{

			echo true;

		}

	}

	public function check_created_image_session()

	{

		if($this->session->userdata('created_image_data')!=''){

			echo true; 

		}

		else{

			echo false;

		}

	}

	public function check_session($session_name)

	{

		if($this->session->userdata($session_name)!=''){

			echo true; 

		}

		else{

			echo false;

		}

	}

	public function index()

	{

		$this->data['cat_array'] = $this->session->userdata('colors_category_list');

		$this->data['active_menu'] = 'choose';

		$this->data['active_submenu'] = 'step_1';

		$this->data['title'] = "Mix - Step 1";

		$this->data['page'] = "Mix - Step 1";

		

		

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

		if ($this->session->userdata('logedin_user') != "") {

				$user_id = $this->session->userdata['logedin_user']['id'];

				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

				if($gallery_details!=false){

					$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

					$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

				}

			}

		

		

		

		$this->load_view('home');

	}

	

	public function step_2(){

		

		if($this->session->userdata('colors_category_list')==''){

			redirect('home');

		}

		else{

			$cat_array = $this->session->userdata('colors_category_list');

		//	print_r($cat_array);

		//	echo $cat_array['category'];

			

			if($cat_array['category'] == '1'){

			  

			   $col_cat = array(0,1); 

			   	

			   	$this->db->select('*');

                $this->db->where(["status" => 1]);

                $this -> db -> where_in("color_category" , $col_cat  );

        

                $result = $this->db->get("color_room");

			}

			elseif($cat_array['category'] == '2'){

			   

			   $col_cat = array(0,2); 

			   

			   	$this->db->select('*');

                $this->db->where(["status" => 1]);

                $this -> db -> where_in("color_category" , $col_cat  );

                $result = $this->db->get("color_room");

			}

			else{

			    $this->db->select('*');

                $this->db->where(["status" => 1]);

                $result = $this->db->get("color_room");

			}

			

		

        

        if($result->num_rows() > 0)

        {

            $this->data['colors_list'] = $result->result_array();



        }else

        {

           $this->data['colors_list'] = '';

        }

			

			

		/*	$condition = array('status' => '1');

			$this->data['colors_list'] = $this->common_model->get_by_condition('color_room',$condition); */

			

		//	print_r($this->data['colors_list']);

		

		

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

    		if ($this->session->userdata('logedin_user') != "") {

    				$user_id = $this->session->userdata['logedin_user']['id'];

    				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

    				if($gallery_details!=false){

    					$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

    					$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

    				}

    			}

		

		

			

			$this->data['active_menu'] = 'choose';

			$this->data['active_submenu'] = 'step_2';

			$this->data['title'] = "Mix - Step 2";

			$this->data['page'] = "Mix - Step 2";

			$this->load_view('step_2');

		}

	}

	public function step_3(){

		if(($this->session->userdata('colors_list')=='' && $this->session->userdata('colors_list')==NULL))

		{

			redirect('home/step_2');

		}

		else

		{

			//echo '<pre>';

			//print_r($this->session->userdata('colors_list'));die;

			

			

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

    		if ($this->session->userdata('logedin_user') != "") {

    				$user_id = $this->session->userdata['logedin_user']['id'];

    				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

    				if($gallery_details!=false){

    					$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

    					$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

    				}

    			}

		

			

			

			$this->data['active_menu'] = 'mix';

			$this->data['active_submenu'] = 'step_3';

			$this->data['title'] = "Mix - Step 3";

			$this->data['page'] = "Mix - Step 3";

			$this->load_view('step_3');

		}

	}

	public function go_to_step4(){

		$image_array = array();

		$cat_array = $this->session->userdata('colors_category_list');

		$image_array['swatch_cat'] = $cat_array['category'];

		$image_array['img_src'] = $this->input->post('img_src');

		$image_array['html_formula'] = $this->input->post('html_formula');

		$this->session->set_userdata('created_image_data',$image_array);

		echo true;

	}

	public function step_4(){

		if($this->session->userdata('created_image_data')=='' && $this->session->userdata('saved_album_session')==''){

			redirect('home/step_3');

		}

		else if($this->session->userdata('created_image_data')=='' && !empty($this->session->userdata('saved_album_session')) && (empty($this->session->userdata['saved_album_session'][1]) && empty($this->session->userdata['saved_album_session'][2]))){

			redirect('home/step_3');

		}

		else

		{

			if($this->session->userdata('request_sample_formula')){

				$this->session->unset_userdata('request_sample_formula');

			}

			

			

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

    		if ($this->session->userdata('logedin_user') != "") {

    				$user_id = $this->session->userdata['logedin_user']['id'];

    				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

    				if($gallery_details!=false){

    					$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

    					$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

    				}

    			}

		

			

			

			$this->data['active_menu'] = 'mix';

			$this->data['active_submenu'] = 'step_4';

			$this->data['title'] = "Mix - Step 4";

			$this->data['page'] = "Mix - Step 4";

			$this->load_view('step_4');

		}

	}

	public function place(){

		/*if($this->session->userdata('saved_album_session')=='' || ($this->session->userdata('saved_album_session') && !empty($this->session->userdata('saved_album_session')) && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][1])) && (array_key_exists(2,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][2]))) )){

			

			

			    redirect('home/step_4');

		}

		else{*/

			if($this->session->userdata('place_category') == ''){

			$this->session->set_userdata('place_category',1);

			}

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

			if ($this->session->userdata('logedin_user') != "") {

				$user_id = $this->session->userdata['logedin_user']['id'];

				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

				if($gallery_details!=false){

					$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

					$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

				}

			}

			$this->data['active_menu'] = 'place';

			$this->data['active_submenu'] = 'step_5';

			$this->data['title'] = "Place";

			$this->data['page'] = "Place";

			$this->load_view('place');

		//}

	}

	public function make(){

		$user_id ="";

		/*if($this->session->userdata('saved_album_session')==''){

			redirect('home/step_4');

		}

		else{*/

			$this->data['gallery_albums'] = false;

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

			

			if ($this->session->userdata('logedin_user') != "") {

				$user_id = $this->session->userdata['logedin_user']['id'];

				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

				if($gallery_details!=false){

					$this->data['gallery_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id));

				}

			}

			$this->data['active_menu'] = 'make';

			$this->data['active_submenu'] = 'step_6';

			$this->data['title'] = "Make";

			$this->data['page'] = "Make";

			$this->data['settings'] = $this->common_model->get_single('color_innovator_settings',array('id'=>1));

			if($user_id){

				$this->data['last_img']=$this->common_model->get_by_condition('saved_album',array("user_id" => $user_id),array("id","desc"));

				$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			}

			$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			if($gallery_details!=false){

				$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

				$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

			}

			

			$custom_images = $this->common_model->get_by_condition('user_custom_image_table',array('user_id'=>$user_id));

			$this->data['custom_images'] = $custom_images;

			

			$this->load_view('make');

		//}

	}

	

	public function make_logo(){

		

		$user_id ="";

		

		/*if($this->session->userdata('saved_album_session')==''){

			redirect('home/step_4');

		}

		else{*/

			$this->data['gallery_albums'] = false;

			$this->data['gallery_indoor_albums'] = false;

			$this->data['gallery_outdoor_albums'] = false;

			

			if ($this->session->userdata('logedin_user') != "") {

				$user_id = $this->session->userdata['logedin_user']['id'];

				$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

				if($gallery_details!=false){

					$this->data['gallery_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id));

				}

			}

			$this->data['active_menu'] = 'make';

			$this->data['active_submenu'] = 'step_6';

			$this->data['title'] = "Make";

			$this->data['page'] = "Make";

			$this->data['settings'] = $this->common_model->get_single('color_innovator_settings',array('id'=>1));

			if($user_id){



				$this->data['last_img']=$this->common_model->get_by_condition('saved_album',array("user_id" => $user_id),array("id","desc"));

				$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			}

			$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			if($gallery_details!=false){

				$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

				$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

			}

			$logo_images = $this->common_model->get_by_condition('user_logos',array('user_id'=>$user_id));

			$this->data['last_img']=$this->common_model->get_by_condition('saved_album',array("user_id" => $user_id),array("id","desc"));

			$this->data['user_gallery'] = $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			$this->data['logo_images'] = $logo_images;

			

			$this->load_view('make_logo');

		//}

	}

	

	public function add_custom_photos(){

	    

	    	$logedin_user = $this->session->userdata('logedin_user');

		$flag = false;

		if(isset($_FILES['browse_custom_image'])){

			$upload_image=$this->common_model->custom_upload('browse_custom_image','user_custom_images/'.$logedin_user['id'].'/',$allowd="JPG|jpg|jpeg|JPEG|png|PNG","");

			//$upload_image=$this->common_model->custom_upload('browse_custom_image','user_custom_images/'.$logedin_user['id'].'/',$allowd="JPG|jpg|png|PNG|jpeg|svg|gif|SVG|GIF","");

			if($upload_image){

				$file_name=$upload_image['file_name'];

				$flag=$this->common_model->insert_data('user_custom_image_table',array('image_name'=>$file_name,'user_id'=>$logedin_user['id'],'created_datetime'=>date('Y-m-d H:i:s')));

				if($flag!=false){

					echo $flag;

				} 

			} 

		}

		

		

		

	}

	

	public function get_background_images(){

		$logedin_user = $this->session->userdata('logedin_user');

		$html = '';

		$logo_images = $this->common_model->get_by_condition('user_custom_image_table',array('user_id'=>$logedin_user['id']));

		if($logo_images!=false){

			foreach($logo_images as $image){

			

				if(file_exists(FCPATH.'uploads/user_custom_images/'.$logedin_user['id'].'/'.$image['image_name']) && !is_dir(FCPATH.'uploads/user_custom_images/'.$logedin_user['id'].'/'.$image['image_name'])){

					$html .= '<div class="item"><img src="'.base_url().'uploads/user_custom_images/'.$logedin_user['id'].'/'.$image['image_name'].'" /><span class="fa fa-times delete_custom_make custsingledeleteicon" data-user_id="'.$logedin_user['id'].'" data-image_name="'.$image['image_name'].'"></span>

					</div>';

				}

			}

		}

		echo json_encode($html);

	}

	

	function delete_custom_make(){

		

		$id=$this->input->post('user_id');

		$image_name=$this->input->post('image_name');

		if($id !=''){

		

			$array = $this->common_model->get_single('user_custom_image_table',array('user_id'=>$id,'image_name'=>$image_name));

			

			if(file_exists(FCPATH.'uploads/user_custom_images/'.$array['user_id'].'/'.$array['image_name']) && !is_dir(FCPATH.'uploads/user_custom_images/'.$array['user_id'].'/'.$array['image_name'])){

					unlink(FCPATH.'uploads/user_custom_images/'.$array['user_id'].'/'.$array['image_name']);

			}

			

			$this->common_model->delete_data('user_custom_image_table',array('user_id'=>$id,'image_name'=>$image_name));

			//$this->session->set_flashdata("success","image deleted successfully!!");

		}

		else

		{

			//$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");

		}

		echo true;

		//redirect('Category/edit_product','refresh');

	}

	

	public function get_single_details_colors(){

		$colors=$this->input->post('color_id');

		$colors_data=$this->common_model->get_single('color_room',array('id'=>$colors));

		echo json_encode($colors_data);

	}

	function create_color_session(){

		

		$colors=$this->input->post('colors');

		

		

		$session_colors=array();

		//echo json_encode($colors);

		//$this->session->unset_userdata('colors_list');

		$current_session_colors=$this->session->userdata('colors_list');

		

		if($current_session_colors!='' && $current_session_colors != NULL){

			$session_colors=$current_session_colors;

			//exit();

			//die;

		}

		$col=array();

		foreach($colors as $color){

			$col[]=$color[4];

			$session_colors[$color[4]]['id']=$color[0];

			$session_colors[$color[4]]['value']=$color[1];

			$session_colors[$color[4]]['fine']=$color[2];

			$session_colors[$color[4]]['coarse']=$color[3];

		}

		foreach($session_colors as $key=>$sess){

			if(!in_array($key,$col)){

				unset($session_colors[$key]);

			}

		}

		$this->session->unset_userdata('colors_list');

		$this->session->set_userdata('colors_list',$session_colors);

		echo json_encode($this->session->userdata('colors_list'));

		exit();

	}

	

	function create_new_color_session(){

		$colors=$this->input->post('colors');

		$mix_it_array=array();

		$new_array=array();

		if($this->session->userdata('colors_list')!='' && $this->session->userdata('colors_list')!=NULL){

			$mix_it_array=$this->session->userdata('colors_list');

		}

		$i=0;

		//print_r($colors);

		//print_r($mix_it_array);

		

		$exist_array=array();

		foreach($colors as $color){

			//print_r($color);

			$exist_array[]=$color[4];

			if(!array_key_exists($color[4],$mix_it_array)){

				//echo $color[1];die;

				$new_array[$color[4]]['id']=$color[0];

				$new_array[$color[4]]['value']=$color[1];

				$new_array[$color[4]]['fine']=$color[2];

				$new_array[$color[4]]['coarse']=$color[3];

			}

			else if(array_key_exists($color[4],$mix_it_array)){

				//echo $color[1];die;

				$new_array[$color[4]]['id']=$color[0];

				$new_array[$color[4]]['value']=$mix_it_array[$color[4]]['value'];

				$new_array[$color[4]]['fine']=$color[2];

				$new_array[$color[4]]['coarse']=$color[3];

				unset($mix_it_array[$color[4]]);

			}

			$i++;

		}

		foreach($mix_it_array as $key=>$value){

			if(!in_array($key,$exist_array)){

				unset($mix_it_array[$key]);

			}

		}

	

		$final_array=$mix_it_array+$new_array;

		//print_r($final_array);

		//print_r($this->session->unset_userdata('colors_list'));

		$this->session->set_userdata('colors_list',$final_array);

		echo true;

	}

	public function drawImage()

	{

		

		$info = $this->input->post("colors");

	

		$this->color_image_lib->createImage($info);

	}

	public function set_place_category()

	{

		$cat = $this->input->post('cat');

		if($this->session->userdata('place_category')){

			$this->session->unset_userdata('place_category');

		}

		$this->session->set_userdata('place_category',$cat);

		echo true;

	}

	public function get_image_by_formula($cat = '',$formula = '')

	{

		$info = array();

		$formula1 = explode("-",$formula);

		$cnt = count($formula1) - 1;

		for($i=0;$i<count($formula1);$i++){

			$array = array();

			if($i!=$cnt)

			{

				$fomula_ele = explode("_",$formula1[$i]);

				//print_r($fomula_ele[1]);

				$array['percent'] = $fomula_ele[1];

				$array['r'] = $fomula_ele[2];

				$array['g'] = $fomula_ele[3];

				$array['b'] = $fomula_ele[4];

				$array['flecks_size'] = $fomula_ele[5];

				$array['id'] = $fomula_ele[0];

				$info[] = $array;

			}

			else if($i==$cnt){

				$info[] = array('time_stamp' => $formula1[$i]);

			}

		}

		if($this->session->userdata('request_sample_formula')){

			$this->session->unset_userdata('request_sample_formula');

		}

		$this->session->set_userdata('request_sample_formula',$formula);

		

		$this->color_image_lib->createImage($info);

		$this->data['swatch_image'] = base_url().'images/'.$formula.'.jpg';

		$this->data['swatch_image_name'] = $formula.'.jpg';

		$this->data['info'] = $info;

		$this->data['title'] = "View Swatch";

		$this->data['page'] = "View Swatch";

		$this->data['category'] = $cat;

		$this->load_view('get_image_by_formula');

	}

	public function get_swatch_by_id(){

		$return_array = array();

		$formula_list = '';

		$info = array();

		$id = $this->input->post('id');

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($swatch!=false)

		{

			$formula = $swatch['org_image_name'];

			$formula1 = explode("-",$formula);

			$cnt = count($formula1) - 1;

			for($i=0;$i<count($formula1);$i++){

				$array = array();

				if($i!=$cnt)

				{

					$fomula_ele = explode("_",$formula1[$i]);

					//print_r($fomula_ele[1]);

					$array['percent'] = $fomula_ele[1];

					$array['r'] = $fomula_ele[2];

					$array['g'] = $fomula_ele[3];

					$array['b'] = $fomula_ele[4];

					$array['flecks_size'] = $fomula_ele[5];

					$array['id'] = $fomula_ele[0];

					$info[] = $array;

				}

				else if($i==$cnt){

					$info[] = array('time_stamp' => $formula1[$i]);

				}

			}			

		}

		for($i=0;$i<count($info)-1;$i++){

			$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));

			if($single_color != false){

				$formula_list .= '<li class="col-md-12 col-sm-12 col-xs-12">

								<div class="col-md-3 col-xs-6 col-sm-6">

									<img src="'.base_url().'uploads/colors/'.$single_color['color_img'].'" style="width:100%;">

								</div>

								<div class="col-md-9 col-xs-6 col-sm-6 gal">

									<h5 class="galtitle">'.$single_color['color_title'].'</h5>

									<h5>'.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>

								</div>

						    </li>';

			}

		}

		$return_array['formula_list'] = $formula_list;

		$return_array['swatch_image'] = $swatch['org_image_path'];

		$return_array['swatch_name'] = $swatch['swatch_name'];

		echo json_encode($return_array);

	}

	public function get_colors()

	{

		$table= "color_room";

		$colors=$this->common_model->get_by_condition2($table,array(),array('id','ASC'));

		echo json_encode($colors);

	}

	public function send_to_email()

	{

		$email_info = $this->input->post('email_data'); //$_REQUEST["email"];        

		$filename = basename($email_info['imageSwatch']); 

		$filename1 = explode(".",$filename);



		$saved_albums = $this->session->userdata('saved_album_session');

		$data1= array(

			'image_info'		=>  $email_info['color_formula'],

			'created_date'		=>	date('Y-m-d H:i:s'),

			'swatch_name'		=>  $email_info['name_swatch'],

			'org_image_path'	=>	$email_info['imageSwatch'],

			'org_image_name'	=>	$filename,

		);

		$table="saved_album";

		$id = $this->common_model->insert_data($table, $data1);

		$email_user = $email_info['email'];

		$email_image_src = $email_info['imageSwatch'];

		$formula = $email_info['color_formula'];

		$name_swatch = $email_info['name_swatch'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = $formula1;

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$email_info['current_cat'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");



		echo $request_sample_url_email;

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		/*$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text*/

		$config['protocol']    = 'smtp';

	    $config['smtp_host']    = 'ssl://smtp.gmail.com';

	    $config['smtp_port']    = '465';

	    $config['smtp_timeout'] = '60';



	    $config['smtp_user']    = 'summitintlflooringwebsite@gmail.com';    //Important

	    $config['smtp_pass']    = 'CIPRCOM#01';  //Important



	    $config['charset']    = 'utf-8';

	    $config['newline']    = "\r\n";

	    $config['mailtype'] = 'html'; // or html

	    $config['validation'] = TRUE; // bool whether to validate email or not 



		$this->email->initialize($config);

		$this->email->from('info@summit-flooring.com', 'Summit Flooring');

		$this->email->to($email_user);

		
		$this->email->subject('Summit Flooring - The Color Innovator - Your Favorite Swatch');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';

		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';

		$email_dino_logo = '<img  style="width:190px;height:77px;" src="'.base_url().'home_assets/images/logo.png" alt="">';

		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		

		$this->email->message('Thank you for using the Summit Flooring! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/><br/>Stay in the loop with Summit Flooring news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $subscribe_link . '&#160;' . $email_facebook . '&#160;' . $email_twitter . '<br/><br/>' . $email_dino_logo . ' V1' );

		$this->email->send();

	}

	public function send_to_email_with_gallery()

	{

		$email_info = $this->input->post('email_data'); //$_REQUEST["email"];

       // print_r($email_info);die;

		$swatch_id = $email_info['swatch_id'];

		$gallery_image = $email_info['gallery_image'];

		

		$table="saved_album";

		$swatch_details = $this->common_model->get_single($table, array('id'=>$swatch_id));

		

	

		

		//	print_r($swatch_details);die;

		

		$filename = basename($swatch_details['org_image_name']); 

		$filename1 = explode(".",$swatch_details['org_image_name']);

		

		$email_user = $email_info['email'];

		$email_image_src = $swatch_details['org_image_path'];

		$formula = $swatch_details['image_info'];

		$name_swatch = $swatch_details['swatch_name'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$gallery_image = '<img  style="width:325px; height:auto;background-image:url('.$email_image_src.');background-size:9% 9%;" src="' . $gallery_image . '"/>';

		

	

		

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = str_replace("Your Formula","<b>Your Formula</b><br />",$formula1);

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text



		$this->email->initialize($config);

		$this->email->from('info@summit-flooring.com', 'Summit Flooring');

		$this->email->to($email_user);
		$this->email->subject('Summit Flooring - Your Favorite Swatch');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';



		$email_dino_logo = '<img  style="width:190px;height:77px;" src="'.base_url().'home_assets/images/logo.png" alt="">';

		

		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		$this->email->message('Thank you for using the Summit Flooring! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/><b>Gallery Image</b><br />'.$gallery_image.'<br/><br/>Stay in the loop with Summit Flooring news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $email_dino_logo  );

		$this->email->send();

	}

	public function send_to_email_from_gallery()

	{

		$email_info = $this->input->post('email_data'); //$_REQUEST["email"];

        //print_r($email_info);die;

		$swatch_id = $email_info['swatch_id'];

		

		$table="saved_album";

		$swatch_details = $this->common_model->get_single($table, array('id'=>$swatch_id));

		

		$filename = basename($swatch_details['org_image_name']); 

		$filename1 = explode(".",$swatch_details['org_image_name']);

		

		$email_user = $email_info['email'];

		$email_image_src = $swatch_details['org_image_path'];

		$formula = $swatch_details['image_info'];

		$name_swatch = $swatch_details['swatch_name'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = str_replace("Your Formula","<b>Your Formula</b><br />",$formula1);

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text



		$this->email->initialize($config);

		$this->email->from('info@summit-flooring.com', 'Summit Flooring');

		$this->email->to($email_user);

		$this->email->subject('Summit Flooring - Your Favorite Swatch');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';



		$email_dino_logo = '<img  style="width:190px;height:77px;" src="'.base_url().'home_assets/images/logo.png" alt="">';

		

		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		$this->email->message('Thank you for using the Summit Flooring! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/>Stay in the loop with Summit Flooring news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $email_dino_logo );

		$this->email->send();

	}

	

	







    function get_new_image_name($user_upload_image, $with_path, $image_type)

    {

        $ext = pathinfo($user_upload_image, PATHINFO_EXTENSION);

		

		$get_file_name_explode = explode("/",$user_upload_image);

		$total_count = count($get_file_name_explode);

		$get_file_name = $get_file_name_explode[$total_count-1];

		

		$get_last_three_char = substr($get_file_name, 0, -4);

		$logedin_user = $this->session->userdata('logedin_user');

		

		//print_r($user_upload_image);die;

		

		if($image_type == 'user_custom_images')

		{

    		if($with_path == 1)

                return $new_image_name = $_SERVER["DOCUMENT_ROOT"].'/color-innovator/uploads/user_custom_images/' . $logedin_user['id'].'/'.$get_last_three_char.'-merge.'.$ext;

            else

                return $new_image_name = base_url().'uploads/user_custom_images/' . $logedin_user['id'].'/'.$get_last_three_char.'-merge.'.$ext;

		}

		else if($image_type == 'user_logo_images')

		{

		    if($with_path == 1)

                return $new_image_name = $_SERVER["DOCUMENT_ROOT"].'/color-innovator/uploads/user_logo_images/' . $logedin_user['id'].'/'.$get_last_three_char.'-merge.'.$ext;

            else

                return $new_image_name = base_url().'uploads/user_logo_images/' . $logedin_user['id'].'/'.$get_last_three_char.'-merge.'.$ext;

		}

    }

    

    public function image_merge($swatch_name='', $user_upload_image='')

    {

       

      //  header("Content-Type: image/png");

		// your created swatch source

		$img_name = $swatch_name;

	

	 

		$src_img = imagecreatefrompng($img_name);

		

		//print_r($src_img);die;

		$new_w = 180;

		$old_h = 240;

		// your skew angle

		$new_lh = abs($old_h * 0.8);

		$new_rh = $old_h;

		$step = abs((( $new_rh - $new_lh ) / 2 ) / $new_w);

		$from_top = ( $new_rh - $new_lh ) / 2;



		//create a transperent destination image to copy with the skew image (source --> swatch)

		$dst_img = imagecreatetruecolor($new_w, $new_rh);

		imagealphablending($dst_img, false);

		$white = imagecolorallocatealpha($dst_img, 0, 0, 0, 127);

		imagecolortransparent($dst_img, $white);

		imagefill($dst_img, 0, 0, $white);

		imagesavealpha($dst_img, true);



		// loop to resample our source on created transperent image

		for ($i = 0; $i < $new_w; $i ++)

		{

			imagecopyresampled($dst_img, $src_img, $i, $from_top - $step * $i, $i, 0, 1, $new_lh + $step * $i * 2, 1, $old_h);

		}

		//final destination image --> this images uploaded by user..

		

		$top_image = $user_upload_image;

		

		$new_image_name = $this->get_new_image_name($user_upload_image,1,'user_custom_images');

		

        $ext = pathinfo($user_upload_image, PATHINFO_EXTENSION);

        

        if($ext == 'JPG' || $ext == 'jpg' || $ext == 'JPEG' || $ext == 'jpeg')

		    $top_image = imagecreatefromjpeg($user_upload_image);

        else if($ext == 'PNG' || $ext == 'png')

		    $top_image = imagecreatefrompng($user_upload_image);

		

		// set the x and y cordinates to have the skew image in the right bottom corner of the destination image (user uploaded)

		$topimage_x = imagesx($top_image) - 200;

		$topimage_y = imagesy($top_image) - 300;

		

		//merge both images

		imagecopymerge($top_image, $dst_img, $topimage_x, $topimage_y, 0, 0, 180, 240, 100);

		

		//save final image in to user account temp folder

        //imagepng($top_image, 'user_swatch_test/temp_test.jpg');

        imagepng($top_image, $new_image_name);

        

		//destroy/free any memory allocate with image

		imagedestroy($top_image); 

    }

    

	public function send_to_email_with_gal()

	{

	    $email_info = $this->input->post('email_data'); //$_REQUEST["email"];

        //print_r($email_info);die;

		$swatch_id = $email_info['swatch_id'];

		$gallery_image = $email_info['gallery_image'];

		

	//	print_r($gallery_image);die;

		

		$table="saved_album";

		$swatch_details = $this->common_model->get_single($table, array('id'=>$swatch_id));

		

		$filename = basename($swatch_details['org_image_name']); 

		$filename1 = explode(".",$swatch_details['org_image_name']);

		

		$email_user = $email_info['email'];

		$email_image_src = $swatch_details['org_image_path'];

		

		// echo $email_image_src;die;

	

			$this->image_merge($email_image_src,$gallery_image);

		

	

	//	echo $email_image_src;die;

		

		$new_merge_image_name = $this->get_new_image_name($gallery_image,2,'user_custom_images');

		

		

	

	//	echo $new_merge_image_name;die;

		

/*		echo $gallery_image;

		echo $email_image_src;

		

echo $dest = imagecreatefromjpeg('/home/summit-flooring/public_html/Color_innovator_new/images/1_15_0_0_0_Fine-17_20_130_166_89_Coarse-8_25_40_67_96_Fine-14_10_173_47_52_Fine-26_10_208_159_111_Coarse-25_20_166_74_118_Fine-1569318352741.jpg');

echo $src = imagecreatefromjpeg('/home/summit-flooring/public_html/Color_innovator_new/uploads/user_custom_images/18/20200212104941826.JPG');

imagecopymerge($dest, $src, 0, 0, 0, 0, 540, 960, 30); //have to play with these numbers for it to work for you, etc.



header('Content-type: image/jpeg');

imagejpeg($dest,'',100);

die;



		

	*/	

		

		

		$formula = $swatch_details['image_info'];

		$name_swatch = $swatch_details['swatch_name'];

		$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

		$gallery_image = '<img  style="width:100% !important;height:80% !important;max-width: 100% !important;display: block;" src="' . $gallery_image . '">';

		//$gallery_image_section = '<div style="width:325px; height:270px;"><div style="width:100%;height:100%;background-image:url('.$email_image_src.');background-size:9% 9%;z-index: 100;"><div style="width:100%;height:100%;background-size:13% 13%;position:relative;background-image:url('.$email_image_src.');text-align: center;opacity: 0.6;z-index: -1;">'.$gallery_image.'</div></div></div>';

		

	/*	$gallery_image_section = '<div class="col-md-12 " style="height: 555px; width: 100%;">					

                    <div style="height: 200px !important;width: 180px !important;top: 170px;right: 50px;background-repeat: no-repeat;position: absolute;display: block; background-image: url('.$email_image_src.');"></div>'.$gallery_image.'</div>';*/

		

		$gallery_image_section = '<img  style="width:100% !important;height:80% !important;max-width: 100% !important;display: block;" src="' . $new_merge_image_name . '">';

		

		$replace = array("% ", " -", "- ");

		$insert = array("%<br/>", " - <strong>", "</strong> - ");

		$formula1 = str_replace($replace, $insert, $formula);

		$html_email = str_replace("Your Formula","<b>Your Formula</b><br />",$formula1);

		$request_sample_url = explode("/", $email_image_src);

		$request_url = explode(".", $request_sample_url[5]);

		$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

		//send email

		$this->load->library('email');

		$this->load->helper('file');

		$config = array();

		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html'; //text



		$this->email->initialize($config);

		$this->email->from('info@summit-flooring.com', 'Summit Flooring');

		$this->email->to($email_user);		

		$this->email->subject('Summit Flooring - The Color Innovator - Swatch With Gallery');



		$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

		$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



		$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

		$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';



		$email_dino_logo = '<img  style="width:190px;height:77px;" src="'.base_url().'home_assets/images/logo.png" alt="">';

		

		$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

		$this->email->message('Thank you for using the Summit Flooring! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image . '<br/><b>Gallery Image</b><br />'.$gallery_image.'<br/><br/>'. $gallery_image_section. '<br/><br/>Stay in the loop with Summit Flooring news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $email_dino_logo  );

		

		

		$this->email->send();

	}

	

	



public function image_merge_logo($user_logo_image='',$swatch_name='')

{

  //  header("Content-Type: image/png");



	// logo image uploaded by user

	$img_name = $user_logo_image;

	//$img_name = "http://oneco.ca/~summit-flooring/Color_innovator_new/uploads/user_logo_images/15/20200226072029668.png";



	//you may work on this to create one image with 4 tiles

	//$dest_img = imagecreatefrompng("user_swatch/5_0_0_0_Fine-45_93_176_132_Coarse-10_48_77_55_Fine-30_59_106_139_Fine-10_129_127_126_Coarse-1583121124680.jpg");

	$dest_img = $swatch_name;

	/*$ext = pathinfo($dest_img, PATHINFO_EXTENSION);

	

	if($ext == 'JPG' || $ext == 'jpg' || $ext == 'JPEG' || $ext == 'jpeg')

		$dest_img = imagecreatefromjpeg($dest_img);

	else if($ext == 'PNG' || $ext == 'png')*/

	

	$dest_img = imagecreatefrompng($dest_img);

	

	$ext = pathinfo($user_logo_image, PATHINFO_EXTENSION);

	

	if($ext == 'JPG' || $ext == 'jpg' || $ext == 'JPEG' || $ext == 'jpeg')

		$src_img = imagecreatefromjpeg($img_name);

	else if($ext == 'PNG' || $ext == 'png')

		$src_img = imagecreatefrompng($img_name);

	

	//src image ->the logo which user will upload

	$src_img = imagecreatefrompng($img_name);

	

	//width and height of the logo

	$src_w = imagesx($src_img);

	$src_h = imagesy($src_img);



	if ($src_w >= imagesx($dest_img) || $src_h >= imagesy($dest_img))

	{

		$width = 150;

		$height = 150;

		list($width_orig, $height_orig) = getimagesize($img_name);



		$ratio_orig = $width_orig / $height_orig;

		

		if ($width / $height > $ratio_orig)

		{

			$width = $height * $ratio_orig;

		}

		else

		{

			$height = $width / $ratio_orig;

		}

		

		$image_p = imagecreatetruecolor($width, $height);

		imagealphablending($image_p, false);

		$black = imagecolorallocatealpha($image_p, 0, 0, 0, 127);

		imagecolortransparent($image_p, $black);

		imagefill($image_p, 0, 0, $black);

		imagesavealpha($image_p, true);

		

		$image = imagecreatefrompng($img_name);

		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $src_w, $src_h);

		$src_resize_w = imagesx($image_p);

		$src_resize_h = imagesy($image_p);



		$destimg_x = (imagesx($dest_img) - $src_resize_w) / 2;

		$destimg_y = (imagesy($dest_img) - $src_resize_h) / 2;

		imagecopymerge($dest_img, $image_p, $destimg_x, $destimg_y, 0, 0, $src_resize_w, $src_resize_h, 75);

	}

	else

	{

		//dest image center cordinates

		$destimg_x = (imagesx($dest_img) - $src_w) / 2;

		$destimg_y = (imagesy($dest_img) - $src_h) / 2;

		imagecopymerge($dest_img, $src_img, $destimg_x, $destimg_y, 0, 0, $src_w, $src_h, 75);

	}

	

	//merge both images

	//save final image in to user account temp folder

	//imagepng($top_image, 'user_swatch_test/temp_test.jpg');

	//comment this out when saved to temp--> use above line

	//imagepng($dest_img);

	

	$new_image_name = $this->get_new_image_name($user_logo_image,1,'user_logo_images');

		

	imagepng($dest_img, $new_image_name);

}



	public function send_to_email_with_logo()

	{

		$email_info = $this->input->post('email_data');

		//print_r($email_info);

		$email_user = $email_info['email'];

		$logo_image = $email_info['logo_image'];

		$swatch_id = $email_info['swatch_id'];

		

		$swatch_details = $this->common_model->get_single('saved_album',array('id'=>$swatch_id));

		if($swatch_details!=false){

			$filename = basename($swatch_details['org_image_name']); 

			$filename1 = explode(".",$swatch_details['org_image_name']);

			

			$email_image_src = $swatch_details['org_image_path'];

			$formula = $swatch_details['image_info'];

			$name_swatch = $swatch_details['swatch_name'];

			

			$email_image = '<img  style="width:325px; height:270px;" src="' . $email_image_src . '"/>';

			$logo_image_section1 = '<img  style="width:300px; height:auto;" src="' . $logo_image . '"/>';

			

			$this->image_merge_logo($logo_image,$email_image_src);

			

			$new_merge_image_name = $this->get_new_image_name($logo_image,2,'user_logo_images');

			

			$logo_image_section = '<img  style="width:500px; height:auto;" src="' . $new_merge_image_name . '"/>';

			

		/*	$logo_image_section = '<div style="width:50%; height:50%;"><div style="width:100%;height:100%;background-image:url('.$email_image_src.');background-size:25% 25%;z-index: 100;"><div style="width:100%;height:100%;background-size:25% 25%;position:relative;background-image:url('.$email_image_src.');text-align: center;opacity: 0.6;z-index: -1;"><img src="'.$logo_image.'" style="width:30%;margin:35% auto;z-index:999;"></div></div></div>';*/

			

			$replace = array("% ", " -", "- ");

			$insert = array("%<br/>", " - <strong>", "</strong> - ");

			$formula1 = str_replace($replace, $insert, $formula);

			

			$html_email = $formula1;

			$request_sample_url = explode("/", $email_image_src);

			$request_url = explode(".", $request_sample_url[5]);

			$request_sample_url_email = " " . anchor(base_url().'home/get_image_by_formula/'.$swatch_details['category_id'].'/'.$filename1[0], "To request a color sample of this swatch please click here.");

			

			$this->load->library('email');		

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('info@summit-flooring.com', 'Summit Flooring');

			$this->email->to($email_user);			

			$this->email->subject('Summit Flooring - The Color Innovator - Swatch With Logo');

			$email_facebook_icon = '<img src="https://s3.amazonaws.com/summit-flooring/facebook-64.png">';

			$email_facebook = '<a href="https://www.facebook.com/pages/summitflooring/682542678475641" target="_blank">' . $email_facebook_icon . '</a>';



			$email_twitter_icon = '<img src="https://s3.amazonaws.com/summit-flooring/twitter-32.png">';

			$email_twitter = '<a href="https://twitter.com/summit_flooring" target="_blank">' . $email_twitter_icon . '</a>';



			$email_dino_logo = '<img  style="width:190px;height:77px;" src="'.base_url().'home_assets/images/logo.png" alt="">';



			$subscribe_link = '<a href="http://mad.ly/signups/108095/join" target="_blank"><img src="https://s3.amazonaws.com/summit-flooring/subscribe.png"></a>';

			$this->email->message('Thank you for using the Summit Flooring Color Innovator! Please remember that this swatch has been generated for conceptual, digital use only.' . $request_sample_url_email . '<br/><br/>' . 'Swatch Name: <b>' . $name_swatch . '</b><br/><br/>Your formula for ' . $name_swatch . '<br/><br/>' . $html_email . '<br/>' . $email_image .'<br/><br/>'.$logo_image_section1.'<br/><br/>'. $logo_image_section. '<br/><br/>Stay in the loop with Summit Flooring news, new product developments, technical information, and more!  Subscribe to our mailing list to receive our quarterly newsletter and special bulletins.<br/><br/>' . $subscribe_link . '&#160;' . $email_facebook . '&#160;' . $email_twitter . '<br/><br/>' . $email_dino_logo );

			$this->email->send();

		}

	}

	public function check_exist_swatchname()

	{

		$swatch_name = $this->input->post('swatch_name');

	    $table= "saved_album";

		$this->db->select('*');

        $this->db->where("swatch_name LIKE '%$swatch_name%'");  

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

	function save_image()

	 { 

		 $creted_image_session = $this->session->userdata('created_image_data');

	  $image_info = array();

	  $image_info = $this->input->post('image_info');

	  $img_path = $image_info['img_request_url'];

	  $filename = basename($img_path); 

	  $current_cat_array = $this->session->userdata('colors_category_list');

	  $data= array(

	   'category_id' => $creted_image_session['swatch_cat'],

	   'image_info'  => $image_info['img_request_info'],

	   'created_date' => date('Y-m-d H:i:s'),

	   'swatch_name' => $image_info['img_request_name'],

	   'org_image_path' => $image_info['img_request_url'],

	   'org_image_name' => $filename,

	  );

	  $org_image_name = explode(".",$filename);

	  $table="saved_album";

	  $id = $this->common_model->insert_data($table, $data); 

		$saved_album = array();

		if($this->session->userdata('saved_album_session')=='')

		{

			$saved_album[$creted_image_session['swatch_cat']][] = $id;

			$this->session->set_userdata('saved_album_session',$saved_album);

			//$this->session->unset_userdata('created_image_data');

		}

		else

		{

			$old_session = $this->session->userdata('saved_album_session'); 

			$old_session[$creted_image_session['swatch_cat']][] = $id;

			$this->session->unset_userdata('saved_album_session');

			$this->session->set_userdata('saved_album_session',$old_session);

			//$this->session->unset_userdata('created_image_data');

		}

		 $this->session->set_userdata('request_sample_formula',$org_image_name[0]);

	    echo $id;

	 }

	function login_user(){

		$filter=array(

			'email'=>$this->input->post('email'),

		);

		$flag=$this->common_model->get_single('users',$filter);

		if($flag!=false){

			$filters=array(

				'id'=>$flag['id'],

				'password'=>md5($this->input->post('pwd')),

			);

			$user=$this->common_model->get_single('users',$filters);

			

			if($user!=false){

				unset($user["password"]);

				$this->session->set_userdata('logedin_user',$user);

				$user = json_encode($user);

				print_r($user);

			}

			else{

				echo false;

			}

			

		}else{

			echo "not_exist";

		}

		

	}

	function add_reg_user(){

		$data1=array();

		$data1['name']=$this->input->post('name');

		$data1['email']=$this->input->post('newemail');

		//$data1['mobile']=$this->input->post('mobile');

		//$password = $this->input->post('newpwd');

		$password = random_string('alnum',8);

		

		$data1['password']=md5($password);

		$data1['created_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->insert_data('users', $data1);

		if($flag!=false){

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('info@summit-flooring.com', 'Summit Flooring');

			$this->email->to($data1['email']);

			//$this->email->cc('sales@summit-flooring.com');

			$this->email->subject('Summit Flooring - Registration Details');



			$message = "Dear <b>".$data1['name']."</b> ";

			$message .= "<h5>Welcome to Summit Flooring!!</h5>";

			$message .= "<p>Your registration is completed successfully. Your registration details are given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$data1['email']."</p> ";

			$message .= "<p><b>Password : </b>".$password."</p> ";

			

		//	print_r($message);die;

			$this->email->message($message);

			if($this->email->send()){

			    echo true;

			}

			else{

			     echo false;

			}

			

			

			//$data_user=$this->common_model->get_single('users',array('id'=>$flag));

			//$this->session->set_userdata('logedin_user',$data_user);

			//unset($data_user["password"]);

			//$user = json_encode($data_user);

		//	echo true;

		}

		else{

			echo false;

		}

	}

	/*function add_reg_user(){

		$data1=array();

		$data1['user_name']=$this->input->post('name');

		$data1['email']=$this->input->post('newemail');

		$data['mobile']=$this->input->post('mobile');

		$password = random_string('alnum',8);

		$data1['password']=md5($password);

		$data1['created_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->insert_data('users', $data1);

		if($flag!=false){

			//echo "sucess";

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('info@summit-flooring.com', 'Summit Flooring');

			$this->email->to($data1['email']);

			$this->email->subject('Summit Flooring - Registration Details');



			$message = "Dear <b>".$data1['user_name']."</b> ";

			$message .= "<h5>Welcome to Summit Flooring!!</h5>";

			$message .= "<p>Your registration is completed successfully. Your registration details are given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$data1['email']."</p> ";

			$message .= "<p><b>Password : </b>".$password."</p> ";

			

			$this->email->message($message);

			if($this->email->send()){};

			

			

			//$data_user=$this->common_model->get_single('users',array('id'=>$flag));

			//$this->session->set_userdata('logedin_user',$data_user);

			//unset($data_user["password"]);

			//$user = json_encode($data_user);

			//echo true;

			redirect("Home");

		}

		else{

			echo false;

		}

	}*/

	function check_mail_exist(){

		$email=$this->input->post('emails');

		$filter = array('email'=>$email);

		if($this->session->userdata('logedin_user') && $this->session->userdata('logedin_user')!='')

		{

			$filter = array('email'=>$email,'id!='=>$this->session->userdata['logedin_user']['id']);

		}

		$emails_data=$this->common_model->get_single('users',$filter);

		if($emails_data!=false)

			echo json_encode(FALSE);

		else

			echo json_encode(TRUE);

	}

	function check_mail_not_exist(){

		$email=$this->input->post('emails');

		$filter = array('email'=>$email);

		$emails_data=$this->common_model->get_single('users',$filter);

		if($emails_data!=false)

			echo json_encode(TRUE);

		else

			echo json_encode(FALSE);

	}

	function forgot_password(){

		$this->load->view('home/header_new',$this->data);

		$this->load->view('new_forgot_password',$this->data);

		$this->load->view('home/footer_new',$this->data);

	}

	function forgot_password_reset()

	{

		$filter=array(

			'email'=>$this->input->post('forgot_email'),

		);

		$new_password = random_string('alnum',8);

		$data1 = [];

		$data1['password']=md5($new_password);

		$data1['modified_datetime']=date('Y-m-d H:i:s');

		$flag = $this->common_model->update_data('users', $data1,$filter);

		if($flag!=false){

			$details = $this->common_model->get_single('users',$filter);

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text



			$this->email->initialize($config);

			$this->email->from('info@summit-flooring.com', 'Summit Flooring');

			$this->email->to($details['email']);

			//$this->email->cc('sales@summit-flooring.com');

			$this->email->subject('Summit Flooring - Password Recover');



			$message = "Dear <b>".$details['name']."</b> ";

			$message .= "<p>Your new login password for <b>Summit Flooring </b>account is given below. </p>  ";

			$message .= "<p><b>Email Id : </b>".$details['email']."</p> ";

			$message .= "<p><b>Password : </b>".$new_password."</p> ";

			

			$this->email->message($message);

			if($this->email->send()){};

			

			

			//$data_user=$this->common_model->get_single('users',array('id'=>$flag));

			//$this->session->set_userdata('logedin_user',$data_user);

			//unset($data_user["password"]);

			//$user = json_encode($data_user);

			echo true;

		}

		else{

			echo false;

		}

	}

	function get_exist_gal(){

		$user_id=$this->input->post('user_id');

		$result=array();

		$gallery_id=$this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

		if($gallery_id!=false){

			$result['gallery_data']=$gallery_id;

			$gallery_images=$this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_id['id']));

			if($gallery_images!=false){

				foreach($gallery_images as $gal_img){

					$result[]=$gal_img;

				}

			}

			echo json_encode($result);

		}

		else{

			echo false;

		}

	}

	function delete_album(){

		$id = $this->input->post('id');

		$cat = $this->input->post('cat');

		$gallery = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($gallery != false){

			/*if(file_exists(FCPATH.'images/'.$gallery['org_image_name']) && !is_dir(FCPATH.'images/'.$gallery['org_image_name'])){

				unlink(FCPATH.'images/'.$gallery['org_image_name']);

			}*/

			if($this->session->userdata('saved_album_session')!='')

			{

				$old_session = $this->session->userdata('saved_album_session'); 

				if (($key = array_search($id, $old_session[$cat])) !== false) {

					unset($old_session[$cat][$key]);

				}

				$this->session->unset_userdata('saved_album_session');

				if(count($old_session)>0){

					$this->session->set_userdata('saved_album_session',$old_session);

				}

			}

			$this->common_model->delete_data('saved_album',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	function delete_swatch(){

		$id = $this->input->post('id');

		$cat = $this->input->post('cat');

		$gallery = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($gallery != false){

			if($this->session->userdata('saved_album_session')!='')

			{

				$old_session = $this->session->userdata('saved_album_session'); 

				

				if (($key = array_search($id, $old_session[$cat])) !== false) {

					unset($old_session[$cat][$key]);

				}

				$this->session->unset_userdata('saved_album_session');

				if(count($old_session)>0){

					$this->session->set_userdata('saved_album_session',$old_session);

				}

			}

			$this->common_model->delete_data('saved_album',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	function save_gallery()

	{	

		$response_array = [];

		$outdoor_ids = [];

		$indoor_ids = [];

		$gallery_id = "";

		$gallery_id = time()."_".rand(00000000,99999999);

		$user_id = $this->input->post('user_id');

		$data1=array(

			'gallery_name'=>$this->input->post('name_swatch'),

			'gallery_id'=>$gallery_id,

			'user_id'=>$user_id,

		);

		

		if($this->input->post('gallery_id')!=''){

			$update_data=$this->common_model->update_data('saved_gallery',array('updated_date'=>date('Y-m-d H:i:s')),array('id'=>$this->input->post('gallery_id')));

			$last_id=$this->input->post('gallery_id');

		}

		else{

			$last_id=$this->common_model->insert_data('saved_gallery',$data1);

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

		$gal_and_swatch_indoor_count = $gal_and_swatch_outdoor_count = 0;

		$check_indoor_gallery = $this->common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id,'category_id'=>1));

		$check_outdoor_gallery = $this->common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id,'category_id'=>2));

		$check_gallery = $this->common_model->get_by_condition('saved_album',array('user_id'=>$user_id,'gallery_id'=>$last_id));

		if($check_indoor_gallery!=false){

			$gal_and_swatch_indoor_count = count($check_indoor_gallery) + count($indoor_ids);

		}

		if($check_outdoor_gallery!=false){

			$gal_and_swatch_outdoor_count = count($check_indoor_gallery) + count($indoor_ids);

		}

		if($check_gallery!=false && count($check_gallery)>=10){

			$response_array['response'] = false;

			$response_array['msg'] = "Indoor and Outdoor gallery has maximum 10 Swatches!!";

			echo json_encode($response_array);

		}

		else if($check_indoor_gallery!=false && $gal_and_swatch_indoor_count > 5){

			$response_array['response'] = false;

			$response_array['msg'] = "Indoor gallery has maximum 5 Swatches!!";

			echo json_encode($response_array);

		}

		else if($check_outdoor_gallery!=false && $gal_and_swatch_outdoor_count > 5){

			$response_array['response'] = false;

			$response_array['msg'] = "Outdoor gallery has maximum 5 Swatches!!";

			echo json_encode($response_array);

		}

		else{

			if($last_id!=false){

				$response_array['response'] = true;

				$response_array['msg'] = '';

				if($this->session->userdata('saved_album_session')!='')

				{

					$ids = $this->session->userdata('saved_album_session');

					//$ids = explode(",",$ids);

				}

				if(count($outdoor_ids) > 0){

					foreach($outdoor_ids as $id){

						$data= array(

							'gallery_id' 		=> $last_id,

							'user_id' 			=> $user_id,

						);

						$table="saved_album";

						$filter = array("id"=>$id);

						$res = $this->common_model->update_data($table, $data, $filter);

						$record = $this->common_model->get_single($table,$filter);

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

						$res = $this->common_model->update_data($table, $data, $filter);

						$record = $this->common_model->get_single($table,$filter);

						if($res != false){

							$result[$id] = $record;

							$result['gal_id']=$last_id;

						}else{

							$result["fail"] = "false";

						}

					}

				}

				$results = json_encode($result);

				echo $results;

			}

		}

	}

	function view_gallery(){

		 if ($this->session->userdata('logedin_user') != "") {

			$this->data['active_menu'] = '';

			$this->data['active_submenu'] = '';

			$this->data['gallery_outdoor_albums'] = false;

			$this->data['gallery_indoor_albums'] = false;

			$user_id = $this->session->userdata['logedin_user']['id'];

			$gallery_details= $this->common_model->get_single('saved_gallery',array('user_id'=>$user_id));

			if($gallery_details!=false){

				$this->data['gallery_outdoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>2));

				$this->data['gallery_indoor_albums'] = $this->common_model->get_by_condition('saved_album',array('gallery_id'=>$gallery_details['id'],'user_id'=>$user_id,'category_id'=>1));

			}

			$this->data['title'] = "Manage Gallery";

			$this->data['page'] = "Manage Gallery";

			$this->load_view('view_gallery');

		} 

		else{

			redirect('home');

		}

	}

	function edit_account(){

		if ($this->session->userdata('logedin_user') != "") {

			$this->data['active_menu'] = '';

			$this->data['active_submenu'] = '';

			$user_id = $this->session->userdata['logedin_user']['id'];

			$this->data['user_details'] = $this->common_model->get_single('users',array('id'=>$user_id));

			$this->data['title'] = "Edit Account";

			$this->data['page'] = "Edit Account";

			$this->load_view('new_edit_register');

		} 

		else{

			redirect('home');

		}

	}

	function delete_user_album(){

		$id = $this->input->post('id');

		$gallery = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($gallery != false){

			/*if(file_exists(FCPATH.'images/'.$gallery['org_image_name']) && !is_dir(FCPATH.'images/'.$gallery['org_image_name'])){

				unlink(FCPATH.'images/'.$gallery['org_image_name']);

			}*/

			

			$this->common_model->delete_data('saved_album',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	function update_account()

	{

		$data = array(

			'name'=>$this->input->post('name'),

			'email'=>$this->input->post('email'),

			'mobile'=>$this->input->post('mobile'),

			'modified_datetime'=>date('Y-m-d H:i:s'),

		);

		if($this->input->post('password')!='')

		{

			$data['password'] = md5($this->input->post('password'));

		}

		$user_id = $this->session->userdata['logedin_user']['id'];

		$flag = $this->common_model->update_data('users',$data,array('id'=>$user_id));

		if($flag!=false)

		{

			$this->session->set_userdata('success','Well Done!! Account details updated!!');

		}

		else

		{

			$this->session->set_userdata('error','ERROR!! Something went wrong!!');

		}

		redirect('home/edit_account');

	}

	function update_contact_information(){

		$data = array(

			'address'=>$this->input->post('address'),

			'city'=>$this->input->post('city'),

			'zipcode'=>$this->input->post('zipcode'),

			'mobile'=>$this->input->post('mobile_number'),

			'fax' => $this->input->post('fax'),

			'state' => $this->input->post('state'),

			'modified_datetime'=>date('Y-m-d H:i:s'),

		);

		

		$user_id = $this->session->userdata['logedin_user']['id'];

		$flag = $this->common_model->update_data('users',$data,array('id'=>$user_id));

		if($flag!=false)

		{

			$this->session->set_userdata('success','Well Done!! Your Contact Details updated!!');

		}

		else

		{

			$this->session->set_userdata('error','ERROR!! Something went wrong!!');

		}

		redirect('home/edit_account');

	}

	function delete_account()

	{

		$user_id = $this->session->userdata['logedin_user']['id'];

		$flag = $this->common_model->get_by_condition('users',array('id'=>$user_id));

		if($flag!=false)

		{

			$get_saved_swatch = $this->common_model->get_by_condition('saved_album',array('user_id'=>$user_id));

			if($get_saved_swatch!=false){

				foreach($get_saved_swatch as $swatch){

					if(file_exists(FCPATH.'images/'.$swatch['org_image_name']) && !is_dir(FCPATH.'images/'.$swatch['org_image_name']))

					{

						unlink(FCPATH.'images/'.$swatch['org_image_name']);

					}

				}

				$this->common_model->delete_data('saved_album',array('user_id'=>$user_id));

			}

			$this->common_model->delete_data('saved_gallery',array('user_id'=>$user_id));

			$this->common_model->delete_data('user_custom_image_table',array('user_id'=>$user_id));

			$this->common_model->delete_data('users',array('id'=>$user_id));

			$this->session->set_userdata('success',"Your Account Deleted Successfully!!");

			$this->session->unset_userdata('logedin_user');

		}

		else

		{

			$this->session->set_userdata('error',"ERROR!! Something went wrong!!");

		}

		echo true;

	}

	function check_success_msg(){

		$array = array('status' => '', 'msg' => '');

		if($this->session->userdata('success')!='')

		{

			$array = array('status'=>true ,'msg' => $this->session->userdata('success'));

			$this->session->unset_userdata('success');

		}

		else if($this->session->userdata('error')!='')

		{

			$array = array('status'=>false ,'msg' => $this->session->userdata('error'));

			$this->session->unset_userdata('error');

		}

		echo json_encode($array);

	}

	/*function request_sample()

	{

		$formula = $this->input->post('formula');

		$swatch_image_request = $this->input->post('swatch_image_request');

		$post_data = $this->input->post('formData');

		$data = array(

			'current_project'=>$post_data_array['current_project'],

			'future_project'=>$post_data_array['future_project'],

			'square_footage'=>$post_data_array['square_footage'],

			'other_products'=>$post_data_array['other_products'],

			'additional_notes'=>$post_data_array['additional_notes'],

			'name'=>$post_data_array['request_name'],

			'company'=>$post_data_array['request_company'],

			'address'=>$post_data_array['request_address'],

			'city'=>$post_data_array['request_city'],

			'state'=>$post_data_array['request_state'],

			'zipcode'=>$post_data_array['request_zipcode'],

			'email_id'=>$post_data_array['request_email'],

			'telephone'=>$post_data_array['request_telephone'],

			'yourself'=>$post_data_array['yourself'],

			'swatch_image_link'=>$swatch_image_request,

			'swatch_formula'=>$formula,

			'created_datetime'=>date('Y-m-d H:i:s'),

		);

		$flag = $this->common_model->insert_data('sample_request_table', $data); 

		if($flag!=false){

			if($this->session->userdata('logedin_user')!='' && array_key_exists('save_as_contact',$post_data) && $post_data['save_as_contact']){

				$data1 = array(

					'address'=>$post_data['request_address'],

					'city'=>$post_data['request_city'],

					'state'=>$post_data['request_state'],

					'zipcode'=>$post_data['request_zipcode'],

					'mobile'=>$post_data['request_telephone'],

					'fax'=>$post_data['request_fax'],

					'modified_datetime'=>date('Y-m-d H:i:s'),

				);

				$this->common_model->update_data('users', $data1,array('id'=>$this->session->userdata['logedin_user']['id'])); 

			}

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			

			$config['protocol'] = "smtp";

			$config['smtp_host'] = "ssl://smtp.googlemail.com";

			$config['smtp_port'] = "465";

			$config['smtp_user'] = 'summit.flooring2019@gmail.com';

			$config['smtp_pass'] = 'vhUb4sbRLP';

			$config['mailtype'] = "html";

			$config['charset'] = "utf-8";

			$config['newline'] = "\r\n";



			$this->email->initialize($config);

			$this->email->from('summit.flooring2019@gmail.com', 'Summit Flooring');

			$this->email->to('info@summit-flooring.com');

			$this->email->cc('ankit@theoneco.com');

			$this->email->subject('Summit Flooring - Sample Request Form');



			$data_view['sample_request_data'] = $data;

			$data_view['swatch_image'] = $post_data['swatch_image_path'];

			$data_view['swatch_formula'] = $post_data['swatch_image_formula'];

			$message = $this->load->view('sample_request_email_template', $data_view, TRUE);

			

			$this->email->message($message);

			

			

			if($this->email->send()){

				echo json_encode(TRUE);

			}

			else{

				echo json_encode(FALSE);

			}

			//$this->session->unset_userdata('request_sample_formula');

			

		}

		else

		{

			echo json_encode(FALSE);

		}

	}*/

	function request_sample()

	{

		$post_data = $this->input->post('frm');

		

		$formula = $this->input->post('formula');

		$swatch_image_request = $this->input->post('swatch_image_request');

	

		parse_str($post_data, $post_data_array);

		$data = array(

			'current_project'=>$post_data_array['current_project'],

			'future_project'=>$post_data_array['future_project'],

			'square_footage'=>$post_data_array['square_footage'],

			'other_products'=>$post_data_array['other_products'],

			'additional_notes'=>$post_data_array['additional_notes'],

			'name'=>$post_data_array['request_name'],

			'company'=>$post_data_array['request_company'],

			'address'=>$post_data_array['request_address'],

			'city'=>$post_data_array['request_city'],

			'state'=>$post_data_array['request_state'],

			'zipcode'=>$post_data_array['request_zipcode'],

			'email_id'=>$post_data_array['request_email'],

			'telephone'=>$post_data_array['request_telephone'],

			'yourself'=>$post_data_array['yourself'],

			'swatch_image_link'=>$swatch_image_request,

			'swatch_formula'=>$formula,

			'created_datetime'=>date('Y-m-d H:i:s'),

		);

		if(key_exists('interior_floor',$post_data_array) && $post_data_array['interior_floor'] && !empty($post_data_array['interior_floor'])){

			$data['interior_floor'] = implode(",",$post_data_array['interior_floor']);

		}

		if(key_exists('exterior_floor',$post_data_array) && $post_data_array['exterior_floor'] && !empty($post_data_array['exterior_floor'])){

			$data['exterior_floor'] = implode(",",$post_data_array['exterior_floor']);

		}

		if(array_key_exists('project_description',$post_data_array)){

			$data['self_description'] = $post_data_array['project_description'];

		}

		if(array_key_exists('request_fax',$post_data_array)){

			$data['fax'] = $post_data_array['request_fax'];

		}

		$flag = $this->common_model->insert_data('sample_request_table', $data);

		if($flag!=false){

			

			if($this->session->userdata('logedin_user')!='' && array_key_exists('save_as_contact',$post_data_array) && $post_data_array['save_as_contact']){

				$data1 = array(

					'address'=>$post_data_array['request_address'],

					'city'=>$post_data_array['request_city'],

					'state'=>$post_data_array['request_state'],

					'zipcode'=>$post_data_array['request_zipcode'],

					'mobile'=>$post_data_array['request_telephone'],

					'fax'=>$post_data_array['request_fax'],

					'modified_datetime'=>date('Y-m-d H:i:s'),

				);

				$this->common_model->update_data('users', $data1,array('id'=>$this->session->userdata['logedin_user']['id'])); 

			}

			

			$this->load->library('email');

			$this->load->helper('file');

			$config = array();

			$config['protocol'] = 'mail';

			$config['mailtype'] = 'html'; //text

			$config['charset'] = "utf-8";

			$config['newline'] = "\r\n";



			$config['protocol']    = 'smtp';

		    $config['smtp_host']    = 'smtp.gmail.com';

		    $config['smtp_port']    = '465';

		    $config['smtp_timeout'] = '60';

		    $config['smtp_crypto'] = 'ssl';

		    $config['smtp_user']    = 'summitintlflooringwebsite@gmail.com';    //Important

		    $config['smtp_pass']    = 'CIPRCOM#01';  //Important



		    $config['charset']    = 'utf-8';

		    $config['newline']    = "\r\n";

		    $config['mailtype'] = 'html'; // or html

		    $config['validation'] = TRUE; // bool whether to validate email or not 



			$this->email->initialize($config);

			$this->email->from('sales@summitflooring.com', 'Color Innovator');

		    //$this->email->to('sales@summit-flooring.com');

			//$this->email->to($post_data_array['request_email']);

			$this->email->to(array($post_data_array['request_email'],'devdevelopment6@gmail.com'));

			//$this->email->cc('sales@summitflooring.com');

			$this->email->subject('Color Innovator - Product Request Sample Form');



			$message = '<h3>Product Request</h3>';

			if($post_data_array['swatch_image_path']!=''){

				$message.= '<img src="'.$post_data_array['swatch_image_path'].'" style="width:325px;height:270px" />';

			}

			if($post_data_array['swatch_image_formula']!=''){

				$message.= '<ul style="display:inline-block;">'.$post_data_array['swatch_image_formula'].'</ul><br>';

			}

			$message.= '<b>Name</b> : '.$post_data_array['request_name'].'<br>';

			$message.= '<b>Company</b> : '.$post_data_array['request_company'].'<br>';

			$message.= '<b>Address</b> : '.$post_data_array['request_address'].'<br>';

			$message.= '<b>City</b> : '.$post_data_array['request_city'].'<br>';

			$message.= '<b>State/Province</b> : '.$post_data_array['request_state'].'<br>';

			$message.= '<b>Zip/Postal</b> : '.$post_data_array['request_zipcode'].'<br>';

			$message.= '<b>Email Id</b> : '.$post_data_array['request_email'].'<br>';

			$message.= '<b>Telephone</b> : '.$post_data_array['request_telephone'].'<br>';

			$message.= '<b>Fax</b> : '.$post_data_array['request_fax'].'<br>';

			$message.= '<b>Tell us about yourself</b> : '.$post_data_array['yourself'].'<br>';

			$message.= '<b>Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage)</b> <br>';

			$message.= $post_data_array['project_description'].'<br>';

			$this->email->message($message);

			if($this->email->send()){
				//echo "TEst 1235";die;
			}

			//$this->session->unset_userdata('request_sample_formula');

			echo true;

		}

		else

		{

			echo false;

		}

	}

	function get_swatch_details()

	{

		$info = array();

		$formula_list = '';

		$swatch_id = $this->input->get_post('swatch_id');

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$swatch_id));

		if($swatch!=false)

		{

			$formula = $swatch['org_image_name'];

			$formula1 = explode("-",$formula);

			$cnt = count($formula1) - 1;

			for($i=0;$i<count($formula1);$i++){

				$array = array();

				if($i!=$cnt)

				{

					$fomula_ele = explode("_",$formula1[$i]);

					//print_r($fomula_ele[1]);

					$array['percent'] = $fomula_ele[1];

					$array['r'] = $fomula_ele[2];

					$array['g'] = $fomula_ele[3];

					$array['b'] = $fomula_ele[4];

					$array['flecks_size'] = $fomula_ele[5];

					$array['id'] = $fomula_ele[0];

					$info[] = $array;

				}

				else if($i==$cnt){

					$info[] = array('time_stamp' => $formula1[$i]);

				}

			}	

			$formula_list = "<h3>Your Formula</h3>";

			for($i=0;$i<count($info)-1;$i++){

				$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));

				if($single_color != false){

					$formula_list .= '<span> '.$single_color['color_title'].'  - '.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'% </span>';

					

				}

			}

			$swatch['formula'] = $formula_list;

			$image_array = array();

			$image_array['swatch_cat'] = $swatch['category_id'];

			$image_array['img_src'] = $swatch['org_image_path'];

			$image_array['html_formula'] = str_replace("<h3>Your Formula</h3>","",$formula_list);

			$this->session->set_userdata('created_image_data',$image_array);

			

			echo json_encode($swatch);

		}

		else

		{

			echo json_encode(FALSE);

		}

	}

	function set_request_sample_session(){

		$id = $this->input->post('id');

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		if($swatch!= false){

			$org_image_name = explode(".",$swatch['org_image_name']);

			if($this->session->userdata('request_sample_formula')){

				$this->session->unset_userdata('request_sample_formula');

			}

			$this->session->set_userdata('request_sample_formula',$org_image_name[0]);

		}

	}

	function get_request_sample_session_details()

	{

		if($this->session->userdata('request_sample_formula'))

		{

			//echo $this->session->userdata('request_sample_formula');die;

			

			$details = $this->get_image_by_formula_ajax($this->session->userdata('request_sample_formula'));

			$details['user'] = false;

			if($this->session->userdata('logedin_user')!=''){

				$user = $this->common_model->get_single('users',array('id'=>$this->session->userdata['logedin_user']['id']));

				$details['user'] = $user;

			}

			echo json_encode($details);

		}

		else

		{

			echo json_encode(FALSE);

		}

	}

	public function get_image_by_formula_ajax($formula = '')

	{

		$data = array();

		$info = array();

		$formula1 = explode("-",$formula);

		$formula_list = '';

		$cnt = count($formula1) - 1;

		for($i=0;$i<count($formula1);$i++){

			$array = array();

			if($i!=$cnt)

			{

				$fomula_ele = explode("_",$formula1[$i]);

				//print_r($fomula_ele[1]);

				$array['percent'] = $fomula_ele[1];

				$array['r'] = $fomula_ele[2];

				$array['g'] = $fomula_ele[3];

				$array['b'] = $fomula_ele[4];

				$array['flecks_size'] = $fomula_ele[5];

				$array['id'] = $fomula_ele[0];

				$info[] = $array;

			}

			else if($i==$cnt){

				$info[] = array('time_stamp' => $formula1[$i]);

			}

		}

		for($i=0;$i<count($info)-1;$i++){

			$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));

			if($single_color != false){

				$formula_list .= '<li class="col-md-12 col-sm-12 col-xs-12">

								

								<div class="col-md-12 col-xs-12 col-sm-12">

									<h5><b>'.$single_color['color_title'].'</b> - '.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>

								</div>

						    </li>';

			}

		}

		$this->color_image_lib->createImage($info);

		$data['swatch_image'] = base_url().'images/'.$formula.'.jpg';

		$data['info'] = $info;

		$data['formula_list'] = $formula_list;

		return $data;

	}

	public function google_recaptcha_verify()

	{

		$recaptcha = $this->input->post('g-recaptcha-response');

		if($recaptcha && !empty($recaptcha))

		{

			$secret = '6Lf3WH8UAAAAACPgDB7aJROTO0-lHIGkylGoJlI6';

			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha);

			$responseData = json_decode($verifyResponse);

			if($responseData->success)

			{

				echo json_encode(TRUE);

			}

			else

			{

				echo json_encode(FALSE);

			}

		}

	}

	public function go_to_place_from_generated(){

	  $data= array(

	   'category_id' => $this->input->post('image_category'),

	   'image_info'  =>  $this->input->post('image_info'),

	   'created_date' => date('Y-m-d H:i:s'),

	   'swatch_name' => $this->input->post('your_swatch_name'),

	   'org_image_path' => $this->input->post('generated_swatch_image'),

	   'org_image_name' => $this->input->post('org_image_name'),

	  );

	  $table="saved_album";

	  $id = $this->common_model->insert_data($table, $data); 

		$saved_album = array();

		if($this->session->userdata('saved_album_session')=='')

		{

			$saved_album[$this->input->post('image_category')][] = $id;

			$this->session->set_userdata('saved_album_session',$saved_album);

			//$this->session->unset_userdata('created_image_data');

		}

		else

		{

			$old_session = $this->session->userdata('saved_album_session'); 

			$old_session[$this->input->post('image_category')][] = $id;

			$this->session->unset_userdata('saved_album_session');

			$this->session->set_userdata('saved_album_session',$old_session);

			//$this->session->unset_userdata('created_image_data');

		}

		// $this->session->set_userdata('request_sample_formula',$org_image_name[0]);

	   echo true;

	}

	

	function delete_user_account(){

		$id = $this->input->post('id');

		$users = $this->common_model->get_single('users',array('id'=>$id));

		if($users != false){

			/*if(file_exists(FCPATH.'images/'.$gallery['org_image_name']) && !is_dir(FCPATH.'images/'.$gallery['org_image_name'])){

				unlink(FCPATH.'images/'.$gallery['org_image_name']);

			}*/

			

			$this->common_model->delete_data('users',array('id'=>$id));

			echo true;

			

		}

		else{

			echo false;

		}

	}

	

	public function samplereq($id){

		$this->data['active_submenu'] = 'step_4';

		$swatch = $this->common_model->get_single('saved_album',array('id'=>$id));

		$org_image_name = explode(".",$swatch['org_image_name']);

		$details = $this->get_image_by_formula_ajax($org_image_name[0]);

		//print_r($details);die;

		$details['user'] = false;

		if($this->session->userdata('logedin_user')!=''){

			$user = $this->common_model->get_single('users',array('id'=>$this->session->userdata['logedin_user']['id']));

			$details['user'] = $user;

		}

		$this->data['details'] = $details;

		$this->load_view('request_sample_form');

	}

	

	public function upload_logo_images(){

		$logedin_user = $this->session->userdata('logedin_user');

		$flag = false;

		if(isset($_FILES['browse_custom_image2'])){

			$upload_image=$this->common_model->custom_upload('browse_custom_image2','user_logo_images/'.$logedin_user['id'].'/',$allowd="png|PNG","");

			//$upload_image=$this->common_model->custom_upload('browse_custom_image2','user_logo_images/'.$logedin_user['id'].'/',$allowd="JPG|jpg|png|PNG|jpeg|svg|gif|SVG|GIF","");

			if($upload_image){

				$file_name=$upload_image['file_name'];

				$flag=$this->common_model->insert_data('user_logos',array('image_name'=>$file_name,'user_id'=>$logedin_user['id'],'created_datetime'=>date('Y-m-d H:i:s')));

				if($flag!=false){

					echo $flag;

				} 

			} 

		}

	}

	

	public function get_user_logos_slider(){

		$logedin_user = $this->session->userdata('logedin_user');

		$html = '';

		$logo_images = $this->common_model->get_by_condition('user_logos',array('user_id'=>$logedin_user['id']));

		if($logo_images!=false){

			foreach($logo_images as $image){

			

				if(file_exists(FCPATH.'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name']) && !is_dir(FCPATH.'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name'])){

					$html .= '<div class="item"><img src="'.base_url().'uploads/user_logo_images/'.$logedin_user['id'].'/'.$image['image_name'].'" /><span class="fa fa-times delete_single_logo custsingledeleteicon" data-user_id="'.$logedin_user['id'].'" data-image_name="'.$image['image_name'].'"></span>

					</div>';

				}

			}

		}

		echo json_encode($html);

	}

	

	function delete_single_logo(){

		

		$id=$this->input->post('user_id');

		$image_name=$this->input->post('image_name');

		if($id !=''){

		

			$array = $this->common_model->get_single('user_logos',array('user_id'=>$id,'image_name'=>$image_name));

			

			if(file_exists(FCPATH.'uploads/user_logo_images/'.$array['user_id'].'/'.$array['image_name']) && !is_dir(FCPATH.'uploads/user_logo_images/'.$array['user_id'].'/'.$array['image_name'])){

					unlink(FCPATH.'uploads/user_logo_images/'.$array['user_id'].'/'.$array['image_name']);

			}

			

			$this->common_model->delete_data('user_logos',array('user_id'=>$id,'image_name'=>$image_name));

			//$this->session->set_flashdata("success","image deleted successfully!!");

		}

		else

		{

			//$this->session->set_flashdata('error',"ERROR!! Unknown Error!!");

		}

		echo true;

		//redirect('Category/edit_product','refresh');

	}

	

	function logout(){

		$this->session->unset_userdata('saved_album_session');

		$this->session->unset_userdata('logedin_user');

		$this->session->sess_destroy();

		redirect('home');

	}

}