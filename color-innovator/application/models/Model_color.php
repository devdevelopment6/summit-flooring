<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Model_color extends CI_Model {

	

    public function select($tabel) {

		

		 $this->db->select('*');

        $query = $this->db->get($table);

        return $query->result_object();

	

	}

	

	   public function selectquery($tablename = null,$query) {



        $this->db->select('*');

        if($query !='')
        {

          $this->db->where($query);  

        }

        $query = $this->db->get($tablename);

	//echo $this->db->last_query();

        return $query->result_object();

    }

function get_single($table, $filter)
	{
		$data = $this->db->get_where($table, $filter);
		if($data->num_rows() > 0)
		{
			$data = $data->first_row("array");
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

		

		public function selectquery_2($table = null) {



        $this->db->select('*');

		$this->db->order_by('id','ASC');

        $query = $this->db->get($table);

        return $query->result_object();

    }

}