<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_data($table)
	{
		$data = $this->db->get($table);
		if($data->num_rows() > 0)
		{
			$data = $data->result_array();
			return $data;
		}
		else
		{
			return false;
		}	
	}
	function insert_data($table, $data)
	{
		$flag = $this->db->insert($table, $data);
		if($flag)
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	function get_single($table, $filter)
	{
		
		$data = $this->db->get_where($table, $filter);
		
		if($data->num_rows() > 0)
		{
			//echo "tes121213";
			$data = $data->first_row("array");
			return $data;
		}
		else
		{
			return false;
		}
	}
	
	function get_by_condition($table, $filter)
	{
		$data = $this->db->get_where($table, $filter);
		if($data->num_rows() > 0)
		{
			$data = $data->result_array();
			return $data;
		}
		else
		{
			return false;
		}
	}
	function get_by_condition2($table, $filter, $order="")
	{
		if($order!=''){
			if(count($order)>0)
			{
				$this->db->order_by($order[0], $order[1]);
			}
		}
		$data = $this->db->get_where($table, $filter);
		if($data->num_rows() > 0)
		{
			$data = $data->result_array();	
			return $data;
		}
		else
		{
			return false;
		}
	}
	function update_data($table, $data, $filter)
	{
		$this->db->where($filter);
	
		$flag = $this->db->update($table, $data);
		if($flag)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function delete_data($table, $filter)
	{
		$this->db->where($filter);
		$flag = $this->db->delete($table);
		return $flag;
	}
	function smtp_mail($from,$to,$subject,$message)
	{
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'programmershubham9@gmail.com',
			'smtp_pass' => '</mrshubham@123>',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$this->email->to($to);
		$this->email->from($from['email'], $from['name']);
		$this->email->cc('sales@summit-flooring.com');
		$this->email->subject($subject);
		$this->email->message($message);

		$this->load->library('encrypt');

		if($this->email->send())
		{
			return true;
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
	
	function randomstring($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function export_job_data($table='',$job_ids=array(),$from_date='',$to_date='')
	{
	
		$fileName = 'jobs_data_' . date('YmdHis') . '.xls';

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream; charset=UTF-8');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

		header('Content-Disposition: attachment; filename=' . $fileName);
		echo "\xEF\xBB\xBF";

		$sheet = '<table width="90%" border="0">';
		$sheet .= '<tr>';
		$sheet .= '<td>Company Name</td>';
		$sheet .= '<td>Job Title</td>';
		$sheet .= '<td>Description</td>';
		$sheet .= '<td>Vacancy</td>';
		$sheet .= '<td>Degree</td>';
		$sheet .= '<td>City</td>';
		$sheet .= '<td>State</td>';
		$sheet .= '<td>status</td>';
		$sheet .= (trim($from_date) != "" || trim($to_date) != "")? '<td>Schedule Date</td>':'';
		$sheet .= '</tr>';

 
 		foreach($job_ids as $id)
		{
			if(trim($from_date) != "" || trim($to_date) != "")
			{
				$this->db->select("cmp.company_name,JB.jobtitle,JB.description,JB.vacancy,CS.course,state.state_name,city.city_name,JB.status,C_SC.schedule_date");
			}
			else
			{
				$this->db->select("cmp.company_name,JB.jobtitle,JB.description,JB.vacancy,CS.course,state.state_name,city.city_name,JB.status");
			}
			$this->db->join('company as cmp', 'cmp.id = JB.company_id');
			$this->db->join('courses as CS', 'CS.id = JB.course_id');
			$this->db->join('state', 'state.id = JB.state_id');
			$this->db->join('city', 'city.id = JB.city_id');
			$this->db->where('JB.id',$id);
			
			if(trim($from_date) != "" || trim($to_date) != "")
			{
				$this->db->join('campus_schedule as C_SC', 'C_SC.job = JB.id');
			}
		 	if(trim($from_date) != "")
			{
				$this->db->where("C_SC.schedule_date >= ", date('Y-m-d 00:00:00', strtotime($from_date)));
			}
			if(trim($to_date) != "")
			{
				$this->db->where("C_SC.schedule_date <= ", date('Y-m-d 00:00:00', strtotime($to_date)));
			}
			 
			$data = $this->db->get('jobs as JB');

			if($data->num_rows() > 0)
			{
				$result=$data->result_array();
				
				$result=$result[0];
				$sheet .= '<tr>';
				$sheet .= '<td>'.$result["company_name"].'</td>';
				$sheet .= '<td>'.$result["jobtitle"].'</td>';
				$sheet .= '<td>'.$result["description"].'</td>';
				$sheet .= '<td>'.$result["vacancy"].'</td>';
				$sheet .= '<td>'.$result["course"].'</td>';
				$sheet .= '<td>'.$result["city_name"].'</td>';
				$sheet .= '<td>'.$result["state_name"].'</td>';
				
				$status=($result["status"] == 1)?"Active":"Inactive";
				$sheet .= '<td>'.$status.'</td>';
				$sheet .=(trim($from_date) != "" || trim($to_date) != "")? '<td>'.$result["schedule_date"].'</td>':'';
				$sheet .= '</tr>';
			}
		}
		$sheet .= '</table>';
		echo $sheet;
		exit();
	}
	
	function export_students_data($table='',$export_student_ids=array())
	{
		$fileName = 'student_data_' . date('YmdHis') . '.xls';

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream; charset=UTF-8');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

		header('Content-Disposition: attachment; filename=' . $fileName);
		echo "\xEF\xBB\xBF";

		$sheet = '<table width="90%" border="0">';
		$sheet .= '<tr>';
		$sheet .= '<td>First Name</td>';
		$sheet .= '<td>Middle Name</td>';
		$sheet .= '<td>Last Name</td>';
		$sheet .= '<td>Email</td>';
		$sheet .= '<td>Contact</td>';
		$sheet .= '<td>Birthdate</td>';
		$sheet .= '<td>Course</td>';
		$sheet .= '<td>Address</td>';
		$sheet .= '<td>Pincode</td>';
		$sheet .= '<td>State name</td>';
		$sheet .= '<td>City Name</td>';
		$sheet .= '</tr>';
	 
		
		foreach($export_student_ids as $id)
		{
			$this->db->select("*");
			$this->db->join('courses as CS', 'CS.id = ST.course_id');
			$this->db->join('state', 'state.id = ST.state_id');
			$this->db->join('city', 'city.id = ST.city_id');
			$this->db->where('ST.id',$id);
			
			$data = $this->db->get('students as ST');

			if($data->num_rows() > 0)
			{
				$result=$data->result_array();
				$result=$result[0];
			 
				$sheet .= '<tr>';
				$sheet .= '<td>'.$result["first_name"].'</td>';
				$sheet .= '<td>'.$result["middle_name"].'</td>';
				$sheet .= '<td>'.$result["last_name"].'</td>';
				$sheet .= '<td>'.$result["email"].'</td>';
				$sheet .= '<td>'.$result["contact"].'</td>';
				$sheet .= '<td>'.$result["date_of_birth"].'</td>';
				$sheet .= '<td>'.$result["course"].'</td>';
				$sheet .= '<td>'.$result["address"].'</td>';
				$sheet .= '<td>'.$result["pincode"].'</td>';
				$sheet .= '<td>'.$result["state_name"].'</td>';
				$sheet .= '<td>'.$result["city_name"].'</td>';
				$sheet .= '</tr>';
				 
			}
		}
		$sheet .= '</table>';
		echo $sheet;
		exit();
	}
	
	function search_data_by_location($location='',$job_name='')
	{
		$this->db->select("job.id,job.company_id,job.jobtitle,job.description,job.created,uploads.filename");
	 	$this->db->join('uploads', 'job.company_id = uploads.post_id');
		$this->db->join('city', 'city.id = job.city_id');
		$this->db->join('state', 'state.id = job.state_id');
		
		$this->db->where('job.vacancy >',0);
	 	$this->db->where('job.status',1);	
			
		if($job_name !='')
		{
			$this->db->where("(job.jobtitle LIKE '%".$job_name."%')", NULL, FALSE);
		}
		
		if($location != "")
		{
			$this->db->group_start();
			$this->db->where("(city.city_name LIKE '%".$location."%')", NULL, FALSE); 
			$this->db->or_where("(state.state_name LIKE '%".$location."%')", NULL, FALSE); 
			$this->db->group_end();
		}
		
		$data = $this->db->get('jobs as job');
		if($data->num_rows() > 0)
		{
			return $data->result_array();
		}
		else
		{
			return false;	
		}
	}
	function upload($input = "", $folder="default", $allowd="", $thumb="",$thumb1="")
	{
		$this->load->library('upload');
		$this->load->library('image_lib');
		$structure = './uploads/';

		$folders = explode("/", $folder);

		foreach($folders as $dir)
		{
			if($dir != "")
			{
				if (!file_exists($structure.$dir)) {
					mkdir($structure.$dir, 0777, true);
					chmod($structure.$dir, 0777);
				}
				else{
					chmod($structure.$dir, 0777);
				}
				$structure .= $dir."/";
				$folder = $dir;
			}
		}
		
		if($thumb!=''){
			if (!file_exists($structure.'thumbs')) {
				mkdir($structure.'thumbs', 0777, true);
				chmod($structure.'thumbs', 0777);
			}
			else{
				chmod($structure.'thumbs', 0777);
			}
		}
		if($thumb!=''){
			if (!file_exists($structure.'thumbs1')) {
				mkdir($structure.'thumbs1', 0777, true);
				chmod($structure.'thumbs1', 0777);
			}
			else{
				chmod($structure.'thumbs1', 0777);
			}
		}
		$config['upload_path']   	= $structure;
		$config['allowed_types'] 	= $allowd;
		$config['max_size']      	= 50000;
		$config['file_name']		= date('YmdHis').rand(0,999);

		$this->upload->initialize($config);

		if($this->upload->do_upload($input))
		{
			$data = $this->upload->data();
			if($thumb != "" && isset($thumb['width']) && isset($thumb['height']))
			{
				if($data['image_width']>$thumb['width'] && $data['image_height']>$thumb['height']){
					$thumbconfig = array(
						'image_library' 	=> 'gd2',
						'source_image' 		=> $data ['full_path'],
						'new_image' 		=> $data ['file_path']."thumbs",
						'maintain_ratio'	=> TRUE,
						'create_thumb' 		=> TRUE,
						'thumb_marker' 		=> "",
						'width'				=> $thumb['width'],
						'height' 			=> $thumb['height']
					);
				}
				else{
					//echo "xyz";
					$thumbconfig = array(
						'image_library' 	=> 'gd2',
						'source_image' 		=> $data ['full_path'],
						'new_image' 		=> $data ['file_path']."thumbs",
						'maintain_ratio'	=> TRUE,
						'create_thumb' 		=> TRUE,
						'thumb_marker' 		=> "",
						'width'				=> $data['image_width'],
						'height' 			=> $data['image_height']
					);	
				}
				$this->image_lib->initialize($thumbconfig);

				if(!$this->image_lib->resize())
				{
					$error = $this->image_lib->display_errors();
					print_r($error);
				}
			}
			if($thumb1 != "" && isset($thumb1['width']) && isset($thumb1['height']))
			{
				if($data['image_width']>$thumb1['width'] && $data['image_height']>$thumb1['height']){
					$thumbconfig1 = array(
						'image_library' 	=> 'gd2',
						'source_image' 		=> $data ['full_path'],
						'new_image' 		=> $data ['file_path']."thumbs1",
						'maintain_ratio'	=> TRUE,
						'create_thumb' 		=> TRUE,
						'thumb_marker' 		=> "",
						'width'				=> $thumb1['width'],
						'height' 			=> $thumb1['height']
					);
				}
				else{
					//echo "xyz";
					$thumbconfig1 = array(
						'image_library' 	=> 'gd2',
						'source_image' 		=> $data ['full_path'],
						'new_image' 		=> $data ['file_path']."thumbs1",
						'maintain_ratio'	=> TRUE,
						'create_thumb' 		=> TRUE,
						'thumb_marker' 		=> "",
						'width'				=> $data['image_width'],
						'height' 			=> $data['image_height']
					);	
				}
				$this->image_lib->initialize($thumbconfig1);

				if(!$this->image_lib->resize())
				{
					$error = $this->image_lib->display_errors();
					print_r($error);
				}
			}
			return $data;
		}
		else
		{
			$error = $this->upload->display_errors();
			print_r($error);
			return false;
		}
		return false;
	}
	function custom_upload($input = "", $folder="default", $allowd="", $thumb="")
	{

		  $this->load->library('upload');
		  $this->load->library('image_lib');
		  $structure = './uploads/';
		  $folders = explode("/", $folder);
		  foreach($folders as $dir)
		  {
			   if($dir != "")
			   {
					if (!file_exists($structure.$dir)) {
					 mkdir($structure.$dir, 0777, true);
					 chmod($structure.$dir, 0777);
					}
					else{
					 chmod($structure.$dir, 0777);
					}
					$structure .= $dir."/";
					$folder = $dir;
			   }
		  }
		if($thumb!=''){
		  if (!file_exists($structure.'thumbs')) {
		   mkdir($structure.'thumbs', 0777, true);
		   chmod($structure.'thumbs', 0777);
		  }
		  else{
		   chmod($structure.'thumbs', 0777);
		  }
		}
	  $config['upload_path']    = $structure;
	  $config['allowed_types']  = $allowd;
	  //$config['max_size']       = 2048;
	  $config['file_name']  = date('YmdHis').rand(0,999);

	  $this->upload->initialize($config);

	  if($this->upload->do_upload($input))
	  {
	   $data = $this->upload->data();
	   if($thumb != "" && isset($thumb['width']) && isset($thumb['height']))
	   {
		$thumbconfig = array(
		 'image_library'  => 'gd2',
		 'source_image'   => $data ['full_path'],
		 'new_image'   => $data ['file_path']."thumbs",
		 'maintain_ratio' => TRUE,
		 'create_thumb'   => TRUE,
		 'thumb_marker'   => "",
		 'width'    => $thumb['width'],
		 'height'    => $thumb['height']
		);

		$this->image_lib->initialize($thumbconfig);

		if(!$this->image_lib->resize())
		{
		 $error = $this->image_lib->display_errors();
		 print_r($error);
		}
	   }
	   return $data;
	  }
	  else
		{
			$error = $this->upload->display_errors();

			print_r($error);

			return false;

		}

		return false;

	 }
}