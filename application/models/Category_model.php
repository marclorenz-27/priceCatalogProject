<?php
	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categories($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('categories');
				return $query->result_array();
			}

			$query = $this->db->get_where('categories', array('slug' => $slug));
			return $query->row_array();
			

		}
	}