<?php
	class Product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_products($slug = FALSE){
			if($slug === FALSE){
					$this->db->join('categories', 'categories.category_id = products.category_id');
					$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
					$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
					$this->db->group_by('product_name');
 					$query = $this->db->get('products');
				return $query->result_array();
			}
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->row_array();
		}

		public function get_average($slug = FALSE)
		{	
			$this->db
				->select_avg('appraised_amount');
				return $this->db->get_where('products', array('product_name'=>'Galaxy S10 Plus'));
		}

		public function get_minimum()
		{	
			$this->db
				->select_min('appraised_amount');
				return $this->db->get_where('products', array('slug'=>'galaxy-s10-plus'));
		}

		public function get_maximum()
		{	
			$this->db
				->select_max('appraised_amount');
				return $this->db->get_where('products', array('slug'=>'galaxy-s10-plus'));
		}

		// public function get_productsByProductName(){
		// 	$query = $this->db
		// 					->join('categories', 'categories.category_id = products.category_id')
		// 					->join('brands', 'brands.brand_id = products.brand_id','left')
		// 					->join('product_photo', 'product_photo.photo_id = products.photo_id')
		// 					->group_by('product_name')
 		//	 				->get_where('products', array('slug', 'galaxy-s10-plus'));
		// 	return $query->result_array();
		// }
	}