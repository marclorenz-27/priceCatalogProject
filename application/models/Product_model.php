<?php
	class Product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_products(){
			$query = $this->db
							->join('categories', 'categories.category_id = products.category_id')
							->join('brands', 'brands.brand_id = products.brand_id','left')
							->join('product_photo', 'product_photo.photo_id = products.photo_id')
							->group_by('product_name')
 							->get('products');
			return $query->result_array();
		}

		public function get_single_product($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db
								->GROUP_BY('products.product_name', 'ASC')
								->get('products');							
				return $query->result_array();
			}

			$query = $this->db
							->join('categories', 'categories.category_id = products.category_id')
							->join('brands', 'brands.brand_id = products.brand_id','left')
							->join('product_photo', 'product_photo.photo_id = products.photo_id')
							->from('products')
							->where('slug', $slug)
							->get();
			return $query->row_array();
		}

		public function get_average()
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

		public function get_productsByProductName(){
			$query = $this->db
							->join('categories', 'categories.category_id = products.category_id')
							->join('brands', 'brands.brand_id = products.brand_id','left')
							->join('product_photo', 'product_photo.photo_id = products.photo_id')
							->group_by('product_name')
 							->get_where('products', array('slug', 'galaxy-s10-plus'));
			return $query->result_array();
		}
	}