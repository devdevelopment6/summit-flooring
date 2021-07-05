<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Front_end extends CI_Controller {
	
	public $data, $logedin, $error, $success;
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		$this->load->library('email');
		$this->load->helper('url');
		
		$this->data['error'] = $this->session->flashdata("error");
		$this->data['success'] = $this->session->flashdata("success");

		$this->load->model('common_model');
		//$this->load->model('ModelUserpermitions');
	}
	
	function index()
	{
		$home = $this->common_model->get_all('home_content');
		$this->data['get_latest_product'] = $this->common_model->get_all_product1('products',"id","DESC",4);
		$this->data['home'] = $home[0];
		$view = "home_index";
		$this->load_view($view);
	}
	
	function main_content()
	{
		$home = $this->common_model->get_all('home_content');
		$this->data['home'] = $home[0];
		$view = "home_index_content";
		$this->load_view($view);
	}
	
	function load_view($view = "")
	{
		$contacts = $this->common_model->get_all('contacts');
		$this->data['contacts'] = $contacts[0];
		$this->load->view('front_end/header', $this->data);
		$this->load->view($view, $this->data);
		//$this->load->view('front_end/footer_logo');
		$this->load->view('front_end/footer', $this->data);
	}
	
	function load_view_page($view = "")
	{
		$this->load->view($view, $this->data);
	}

	public function recaptcha()
    {
        // load from spark tool
        $this->load->spark('recaptcha-library/1.0.1');
        // load from CI library
        // $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                echo "You got it!";
            }
        }

        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
        $this->load->view('recaptcha', $data);
    }
	
	function about_us()
	{
		$about = $this->common_model->get_all('about_content');
		$this->data['about'] = $about[0];
		$view = "about";
		$this->load_view($view);
	}
	
	function about_summary()
	{
		$about = $this->common_model->get_all('about_content');
		$this->data['about'] = $about[0];
		$view = "about_summary";
		$this->load_view($view);
	}
	
	function see_community()
	{
		$about = $this->common_model->get_all('about_content');
		$this->data['about'] = $about[0];
		$view = "see_community";
		$this->load_view($view);
	}
	
	function product_category()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product'] = $product[0];
			
		$data = $this->common_model->get_all('product_category');
		$this->data['categories'] = $data;
		$view = "product_category_view";
		$this->load_view($view);
	}
	
	function products()
	{
		$product_url = $this->uri->segment(3);
	//	echo $product_url; die;
		$filter = array('product_url'=>$product_url);

		$product_1 = $this->common_model->get_single('products',$filter);
		//echo "<pre>";print_r($product_1);die;
		$product_id=$product_1['id'];
		$this->data['product_1'] = $product_1;
		$this->data['product_docs'] = $this->common_model->get_single('product_documents',array('product_id'=>$product_id));
		$this->data['gallery']	=	$this->common_model->get_all_2('product_gallery',array('product_id'=>$product_id));
		
		$view = "product";
		$this->load_view($view);
	}
	
	function products_content()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product'] = $product[0];
		$view = "products_content";
		$this->load_view($view);
	}
	
	function about_content()
	{
		$about = $this->common_model->get_all('about_content');
		$this->data['about'] = $about[0];
		$view = "product_details";
		$this->load_view($view);
	}
	
	function core_values()
	{
		$about = $this->common_model->get_all('about_content');
		$this->data['about'] = $about[0];
		$view = "core_values";
		$this->load_view($view);
	}
	
	function indoor_products()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product_content'] = $product[0];
		
		$filter = array(
			'product_category'	=>	'1',
			'status'			=>	'1',
		);
		$product = $this->common_model->get_by_condition('products',$filter);
		
		$product_1 = $this->common_model->get_single('product_category',array("id"=>1,'status'=>'1'));
		
		$this->data['product_1'] = $product_1;
		$this->data['product'] = $product;
		$view = "indoor_products";
		$this->load_view($view);
	}
	
	function outdoor_products()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product_content'] = $product[0];
				
		$filter = array(
			'product_category'	=>	'2',
			'status'			=>	'1',
		);
		
		$product = $this->common_model->get_by_condition('products',$filter);
		
		//$product = $this->common_model->get_all('product_content');
		$this->data['product'] = $product;
		$product_1 = $this->common_model->get_single('product_category',array("id"=>2,'status'=>'1'));
		
		$this->data['product_1'] = $product_1;
		//$view = "outsdoor_product";
		//$this->load_view($view);
		$filter = array(
			'id'	=>	'2',
			'status'			=>	'1',
		);

		//$product = $this->common_model->get_by_condition('product_page',$filter);
		//$this->data['outdoor_product'] = $product;
		//print_r($this->data['outdoor_product']);die;
		$view = "outsdoor_product";
		$this->load_view($view);
	}
	
	function speciality_products()
	{
		$filter = array(
			'product_category'	=>	'3',
			'status'			=>	'1',
		);
		
		$product = $this->common_model->get_by_condition('products',$filter);
		
		//$product = $this->common_model->get_all('product_content');
		$this->data['product'] = $product;
		$product_1 = $this->common_model->get_single('product_category',array("id"=>3,'status'=>'1'));
		
		$this->data['product_1'] = $product_1;

		$filter = array(
			'id'	=>	'3',
			'status'			=>	'1',
		);

		$product = $this->common_model->get_by_condition('product_page',$filter);
		$this->data['speciality_products'] = $product;
		//print_r($this->data['outdoor_product']);die;
		$view = "speciality_products";
		$this->load_view($view);
	}
	
	function applications()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product_1'] = $product[0];
		$view = "applications";
		$this->load_view($view);
	}
	function application_category($cat_name='')
	{
		$cat_name= str_replace(array("_","-"),array(" ","/"),$cat_name);
		$get_category = $this->common_model->get_single('application_categories',array('category_name'=>$cat_name));
		$this->data['category_details'] = $get_category;
		$this->data['sub_categories']= $this->common_model->get_by_condition('application_sub_categories',array('category_id'=>$get_category['id']),array("sub_category_name","ASC"));
		//print_r($get_category);
		//$this->data['product_1'] = $product[0];
		$view = "applications_category";
		$this->load_view($view);
	}
	function get_products(){
		$cat_id = $this->input->post('cat_id');
		$subcat_id = $this->input->post('subcat_id');
		$offset = $this->input->post("offset");
		$fetch  = $this->input->post("fetch");
		$table='application_details';
		$limit = array($fetch, $offset);
		$filter = array();
		$filter[]= array('category_id'=>$cat_id);
		$filter[]= array('sub_category_id'=>$subcat_id);
		$sub_cat_details = $this->common_model->get_single('application_sub_categories',array('id'=>$subcat_id));
		$data = $this->common_model->get_by_condition_limit($table,$limit, $filter);
		//echo $this->db->last_query();
		$offset = $offset+$fetch;
		$result = array(
			"status"    => 500,
			"limit"     => array("offset" => $offset, "fetch" => $fetch),
			"response"  => false,
			"last"      => false,
			"total"     => $data['total']
		);

		if($data['result'] != false)
		{
			$content = $this->load->view("view_products_list", array('applications' => $data['result']),true);
			$result['status'] = 200;
			$result['response'] = $content;
			$result['last'] = ($offset >= $data['total'])?true:false;
		}
		$result['sub_cat_details'] = $sub_cat_details;
		echo json_encode($result);
	}
	function case_studies()
	{
		$case_study = $this->common_model->get_all('case_study_content');
		$this->data['case_study'] = $case_study[0];
		$this->data['case_studies'] = $this->common_model->get_all('case_studies');
		//print_r($case_study); die;
		$view = "case_studies";
		$this->load_view($view);
	}
	
	function contact()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product'] = $product[0];
		$view = "contact";
		$this->load_view($view);
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
	
	function submit_contect()
	{
		$now = date('Y-m-d H:i:s');
		$table = 'contact_us_tbl';
		$data = array(
			'name' 	=> 	$this->input->get_post('name'),
			'subject'	=>	$this->input->get_post('subject'),
			'email'		=>	$this->input->get_post('email'),
			'mobile_no'	=>	$this->input->get_post('mobileno'),
			'message'	=>	$this->input->get_post('message'),
			'created_date'	=> $now,
		);
		$flag=$this->common_model->insert_data($table,$data);
		if($flag!= '')
				{
					$this->set_success("Message Sent Successfully");
					redirect("front_end/contacts/");
				}
				else
				{
					$this->set_error("ERROR! Unknown Error!");
					redirect("front_end/contacts/");
				}																																																				
			redirect("front_end/contacts/");
	}
	
	function news()
	{

		$filter = array(
			'status !='	=>	'0',
		);
		$news_list = $this->common_model->get_all_2('news',$filter,"publish_date","DESC");
		$this->data['news_list'] = $news_list;
		
		$config = array();
		$config['base_url'] = base_url() . 'front_end/news/';
		$config['total_rows'] = count($news_list);
		$config['per_page'] = 4;
		$config["uri_segment"] = 3;
		
		$choice = $config["total_rows"] / $config["per_page"];
		
   		$config["num_links"] = round($choice);
	
		$config['use_page_numbers'] = TRUE;
		
		$config['full_tag_open'] = '<ul class="pagination news_pagination">';
		$config['full_tag_close'] = '</ul><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>' . "\n";
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>' . "\n";
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>' . "\n";
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>' . "\n";
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>' . "\n";

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["results"] = $this->common_model->fetch_data('news',$filter,$config["per_page"], $page,"publish_date","DESC");

		$str_links = $this->pagination->create_links();
		
		$this->data["links"] = explode('&nbsp;',$str_links );
		
		$get_last_record = $this->common_model->get_all_2('news',$filter,"id","DESC");
		$this->data['recent_news'] = $this->data["results"][0];
		$view = "news";
		$this->load_view($view);
	}
	
	function news_page($id="")
	{
		 if($id!=''){	
			$this->data['news_content']		=	$this->common_model->get_single('news',array('id'=>$id));
		 }
		 $filter = array(
			'status !='	=>	'0',
		);
		 $get_last_record = $this->common_model->get_all_2('news',$filter,"id","DESC");
		 $this->data['recent_news'] = $get_last_record[0];
		 $view = "news_link";
		 $this->load_view($view);
	}
	
	function blog()
	{
		$product = $this->common_model->get_all('product_content');
		$this->data['product_1'] = $product[0];
		$filter = array(
			'status !='	=>	'0',
		);
		$blogs_list = $this->common_model->get_all_2('blogs',$filter,"publish_date","DESC");
		$this->data['blogs_list'] = $blogs_list;
		
		$config = array();
		$config['base_url'] = base_url() . 'front_end/blogs/';
		$config['total_rows'] = count($blogs_list);
		$config['per_page'] = 4;
		$config["uri_segment"] = 3;
		
		$choice = $config["total_rows"] / $config["per_page"];
		
   		$config["num_links"] = round($choice);
	
		$config['use_page_numbers'] = TRUE;
		
		$config['full_tag_open'] = '<ul class="pagination news_pagination">';
		$config['full_tag_close'] = '</ul><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>' . "\n";
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>' . "\n";
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>' . "\n";
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>' . "\n";
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>' . "\n";

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["blog_results"] = $this->common_model->fetch_data('blogs',$filter,$config["per_page"], $page,"publish_date","DESC");

		$str_links = $this->pagination->create_links();
		$this->data["blog_links"] = explode('&nbsp;',$str_links );
		
		$get_last_record = $this->common_model->get_all_2('blogs',$filter,"id","DESC");
		$this->data['recent_blog'] = $this->data["blog_results"][0];
		$view = "blog";
		$this->load_view($view);
	}

	/*function blogs_page($id="")
	{
		 if($id!=''){	
			$this->data['blogs_content']	=	$this->common_model->get_single('blogs',array('id'=>$id));
		 }
		 $get_last_record = $this->common_model->get_all_2('blogs',$filter,"id","DESC");
		$this->data['recent_blog'] = $get_last_record[0];
		 $view = "blogs_page";
		 $this->load_view($view);
	}*/

	function blogs_page()
	{
		$blog_url = $this->uri->segment(3);
		//	echo $product_url; die;
		$filter = array('blog_url'=>$blog_url);

		$blog_1=$this->data['blogs_content']	=	$this->common_model->get_single('blogs',$filter);
		$blog_id=$blog_1['id'];
		$get_last_record = $this->common_model->get_all_2('blogs',$blog_id,"id","DESC");
		$this->data['recent_blog'] = $get_last_record[0];
		$view = "blogs_page";
		$this->load_view($view);
	}
	
	function request_sample()
	{
		$sample_info = array();
		parse_str($_POST['frm'], $sample_info);	

		$captcha_answer = $sample_info['g-recaptcha-response'];
				
		$check_ans = $this->captcha_validation($captcha_answer);
		
		if(!$check_ans || $check_ans==''){
			echo false;
		}
		else
		{
			$array = array();
			$interior_floor = array();
			$interior_floor = $sample_info['interior_floor'];
			$final_interior_floor = implode(',', $interior_floor);
			
			$exterior_floor = array();
			$exterior_floor = $sample_info['exterior_floor'];
			$final_exterior_floor = implode(',', $exterior_floor);
			
			$array = array(
				'current_project'	=>	$sample_info['current_project'],
				'future_project'	=>	$sample_info['future_project'],
				'square_footage'	=>	$sample_info['square_footage'],
				'yourself'			=>	$sample_info['yourself'],
				'interior_floor'	=>	$final_interior_floor,
				'exterior_floor'	=>	$final_exterior_floor,
				'other_products'	=>	$sample_info['other_products'],
				'additional_notes'	=>	$sample_info['additional_notes'],
				'name'				=>	$sample_info['name'],
				'company'			=> 	$sample_info['company'],
				'address'			=>	$sample_info['address'],
				'city'				=>	$sample_info['city'],
				'state'				=>	$sample_info['state'],
				'postal'			=>	$sample_info['postal'],
				'email'				=>	$sample_info['email'],
				'phone'				=>	$sample_info['phone'],
				'fax'				=>	$sample_info['fax'],
				'created_date'		=>	date('Y-m-d H:i:s'),
				'status'			=>	'0',
			);

			$table="request_for_sample";
			$data=$this->common_model->insert_data($table,$array);

			if($data!= ''){
				
				$email_id = $array['email'];
				$name = $array['name'];
				
				$this->email->set_mailtype("html");
				$this->email->from('sales@summit-flooring.com', "sumMit-flooring");
				$this->email->to($email_id);
                $this->email->subject("Request For Sample");
                $message = "<html><body>";
				$message .= "<p style='text-align:center;'></p>";
				$message .= "<p style='text-align:center;text-transform: uppercase;'>Do not reply to this email. it is auto generated.</p>";
                $message .= "<p>Dear ".$name.",</p>";
                $message .= "<p>Your Request For Sample is successfully Registered...</p>";
				$message .= "<p>Thank You</p>";
                $message .= "<p>Regards,</p>";
                $message .= "<p>Team sumit flooring</p></body></html>";
                $this->email->message($message);
				if($this->email->send()){
					echo true;
				}
                 else {
					 echo false;
                }
			}
			else
			{
				echo false;
			}
		}
	}
	
	function captcha_validation($answer='')
    {
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		  $secret='6LcYZ0AUAAAAACkDvVROfwkqPAeunnedx74A4w2T';
		  $ip=$_SERVER['REMOTE_ADDR'];
		  $url=$google_url."?secret=".$secret."&response=".$answer."&remoteip=".$ip;
		  $curl = curl_init();
		  curl_setopt($curl, CURLOPT_URL, $url);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		  $res = curl_exec($curl);
		  curl_close($curl);
		  $res= json_decode($res, true);

		  //reCaptcha success check
		  if($res['success'])
		  {
			return TRUE;
		  }
		  else
		  {
			//$this->set_error('The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
			return FALSE;
		  }
    }
	
	function get_feature()
	{
		$product_id = $this->input->post('product_id');	
		$feature = $this->input->post('feature');
		
		$filter = array(		
			'id'	=>	$product_id,
		);	
		
		$product = $this->common_model->get_single('products',$filter);
		$display_feature = '';
		
		if($feature == 'features')
		{
			$display_feature = $product['features'];
			echo json_encode($display_feature);
		}
		else if($feature == 'best_app')
		{
			$display_feature = $product['best_applications'];
			echo json_encode($display_feature);
		}
		else if($feature == 'size')
		{
			$display_feature = $product['measurement'];
			echo json_encode($display_feature);
		}
		else if($feature == 'download_link')
		{
			$product_docs = $this->common_model->get_single('product_documents',array('product_id'=>$product_id));
			
			$prImage_1 = explode(".",$product_docs["download_link_1"]);
			$totalCount = count($prImage_1);
			$prImage_1[$totalCount - 1] = 'jpg';
			$imageFileName_1 = implode('.',$prImage_1);
			
			$prImage_2 = explode(".",$product_docs["download_link_2"]);
			$totalCount = count($prImage_2);
			$prImage_2[$totalCount - 1] = 'jpg';
			$imageFileName_2 = implode('.',$prImage_2);
			
			$prImage_3 = explode(".",$product_docs["download_link_3"]);
			$totalCount = count($prImage_3);
			$prImage_3[$totalCount - 1] = 'jpg';
			$imageFileName_3 = implode('.',$prImage_3);
			
			$prImage_4 = explode(".",$product_docs["download_link_4"]);
			$totalCount = count($prImage_4);
			$prImage_4[$totalCount - 1] = 'jpg';
			$imageFileName_4 = implode('.',$prImage_4);
			
			$prImage_5 = explode(".",$product_docs["download_link_5"]);
			$totalCount = count($prImage_5);
			$prImage_5[$totalCount - 1] = 'jpg';
			$imageFileName_5 = implode('.',$prImage_5);
			
			
			$display_feature='<h3>Downloads</h3>';
			$display_feature.='<div class="download_link"><ul>';
			
			if($product_docs["download_link_1"] != '')
			{
				$display_feature.='<li>- <a href="javascript: void(0);" target="_blank" onclick="setImage(\''.$imageFileName_1.'\',\''.$product_docs["download_link_1"].'\')">'.$product_docs["document_title_1"].'</a></li>';
			}
			
			if($product_docs["download_link_2"] != '')
			{
				$display_feature.='<li>- <a href="javascript: void(0);" target="_blank" onclick="setImage(\''.$imageFileName_2.'\',\''.$product_docs["download_link_2"].'\')">'.$product_docs["document_title_2"].'</a></li>';
			}
			
			if($product_docs["download_link_3"] != '')
			{
				$display_feature.='<li>- <a href="javascript: void(0);" target="_blank" onclick="setImage(\''.$imageFileName_3.'\',\''.$product_docs["download_link_3"].'\')">'.$product_docs["document_title_3"].'</a></li>';
			}
			
			if($product_docs["download_link_4"] != '')
			{
				$display_feature.='<li>- <a href="javascript: void(0);" target="_blank" onclick="setImage(\''.$imageFileName_4.'\',\''.$product_docs["download_link_4"].'\')">'.$product_docs["document_title_4"].'</a></li>';
			}
			
			if($product_docs["download_link_5"] != '')
			{
				$display_feature.='<li>- <a href="javascript: void(0);" target="_blank" onclick="setImage(\''.$imageFileName_5.'\',\''.$product_docs["download_link_5"].'\')">'.$product_docs["document_title_5"].'</a></li>';
			}
			$display_feature.='</div></ul>';
			
			$display_feature.='<div id="pdf_image"></div>';
			
			
			/*
			$download = $product['download_link'];
			if($download != '')
			{
				$display_feature = $download;
			}
			else
			{
				$display_feature = '<div class="download_link"><ul><li><a href="#" target="_blank">Download Brochure</a></li></ul></div>';
			}
			*/
			//print_r($product_docs);
			echo json_encode($display_feature);
		}
		else if($feature == 'gallery')
		{
			$display_feature = $product['gallery_link'];
			echo json_encode($display_feature);
		}
		else
		{
			echo false;
		}
		exit();
	}

	function Fitness_Sport()
	{
		$fitness = $this->common_model->get_all('fitness_content');
		$this->data['fitness'] = $fitness[0];
		$view = "fitness_category_view";
		$this->load_view($view);
	}

	function Commercial_Retail()
	{
		$commercial = $this->common_model->get_all('commercial_content');
		$this->data['commercial'] = $commercial[0];
		$view = "commercial_category_view";
		$this->load_view($view);
	}

	function Hospitality()
	{
		$hospitality = $this->common_model->get_all('hospitality_content');
		$this->data['hospitality'] = $hospitality[0];
		$view = "hospitality_category_view";
		$this->load_view($view);
	}

	function Educational()
	{
		$educational = $this->common_model->get_all('educational_content');
		$this->data['educational'] = $educational[0];
		$view = "educational_category_view";
		$this->load_view($view);
	}

	function Health_Care()
	{
		$healthcare = $this->common_model->get_all('healthcare_content');
		$this->data['healthcare'] = $healthcare[0];
		$view = "healthcare_category_view";
		$this->load_view($view);
	}

	function Other()
	{
		$other = $this->common_model->get_all('other_content');
		$this->data['other'] = $other[0];
		$view = "other_category_view";
		$this->load_view($view);
	}

	function Location()
	{
		$location = $this->common_model->get_all('location_content');
		$this->data['location'] = $location[0];
		$view = "location_category_view";
		$this->load_view($view);
	}
	
	function Sustainability()
	{
		//$location = $this->common_model->get_all('location_content');
		//$this->data['location'] = $location[0];
		$view = "sustainability";
		$this->load_view($view);
	}
	
}