<?php
	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categories($slug = FALSE){
			if($slug === FALSE){
				$this->db->where('category_name !=', 'SADaf'); // is this a testing data?
				$this->db->order_by('category_name');
				$query = $this->db->get('ph_category');
				return $query->result_array();
			}

			$query = $this->db->get_where('ph_category', array('slug' => $slug));
			return $query->row_array();
			

		}
	}