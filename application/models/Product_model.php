<?php
	class Product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_products($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('products.product_id', 'ASC');
				$this->db->join('categories', 'categories.category_id = products.category_id');
				$this->db->join('brands', 'brands.brand_id = products.brand_id');
				$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
				$query = $this->db->get('products');
				return $query->result_array();
			}

			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->row_array();
			

		}
	}