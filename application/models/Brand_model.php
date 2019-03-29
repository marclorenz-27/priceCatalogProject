<?php
	class Brand_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function get_brands($brand_id = FALSE){
			if($brand_id === FALSE){
				$query = $this->db->get('brands');
				return $query->result_array();
			}

			$query = $this->db->get_where('brands', array('brand_id' => $brand_id));
			return $query->row_array();
			

		}
	}