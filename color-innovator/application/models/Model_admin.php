<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function add_slider_img()
	{
		$heading = $this->input->post("heading");
		$slider_image = $_FILES['slider_image']['name'];
		
				$data = array(
						'slider_text' => $heading,
						'slider_img' => implode(",",$slider_image),
						);
			$this->db->insert('slider',$data);
		
	   $this->common_model->upload($slider_image, $folder = "uploads/slider/", $allowd='png|jpg|jpeg|gif', $thumb = array('width' => '800','height' => '900'));
	}
	
	function insert_map()
	{
		$shop = $this->input->post("shop");
		$iframe = $this->input->post("iframe");
			$data = array(
				'map_add' => $iframe,
				'map_shop' => $shop,
			);
		$this->db->insert('map',$data);
	}
}
?>