<?php
	class Product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_products($product_name = FALSE){
			if($product_name === FALSE){
				$this->db->select_avg('appraised_amount', 'average_per_group');
				$this->db->select('products.*'); //SELECT * FROM products
				$this->db->select('categories.*');
				$this->db->select('brands.*');
				$this->db->select('product_photo.*');
				$this->db->join('categories', 'categories.category_id = products.category_id');
				$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
				$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
				$this->db->group_by('product_name');
 				$query = $this->db->get('products');
				return $query->result_array(); // to return multiple records / for index
			}

			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
			$query = $this->db->get_where('products', array('product_name' => $product_name));
			return $query->row_array(); // to return 1.
		}

		// public function get_products($slug = FALSE){
		// 	if($slug === FALSE){
		// 		$this->db->select_avg('appraised_amount', 'average_per_group');
		// 		$this->db->select('products.*'); //SELECT * FROM products
		// 		$this->db->select('categories.*');
		// 		$this->db->select('brands.*');
		// 		$this->db->select('product_photo.*');
		// 		$this->db->join('categories', 'categories.category_id = products.category_id');
		// 		$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
		// 		$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
		// 		$this->db->group_by('product_name');
 	// 			$query = $this->db->get('products');
		// 		return $query->result_array(); // to return multiple records / for index
		// 	}

		// 	$this->db->join('categories', 'categories.category_id = products.category_id');
		// 	$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
		// 	$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
		// 	$query = $this->db->get_where('products', array('slug' => $slug));
		// 	return $query->row_array(); // to return 1.
		// }

		//count of prices per group
		public function get_count_by_product_name($product_name = FALSE){
			if($product_name === FALSE){
				$this->db->select_avg('appraised_amount', 'average_per_group');
				$this->db->select('products.*'); //SELECT * FROM products
				$this->db->select('categories.*');
				$this->db->select('brands.*');
				$this->db->select('product_photo.*');
				$this->db->join('categories', 'categories.category_id = products.category_id');
				$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
				$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
				$this->db->group_by('product_name');
 				$query = $this->db->get_where('products', array('product_name'=>$product_name));
				$query->result_array(); // to return multiple records / for index
			}
		}

		public function get_product_rows($slug = FALSE){
			if($slug === FALSE){
				$this->db->select('products.*');
				$this->db->select('categories.*');
				$this->db->select('brands.*');
				$this->db->select('product_photo.*');
				$this->db->join('categories', 'categories.category_id = products.category_id');
				$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
				$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
 				$query = $this->db->get_where('products', array('slug' => $slug));	
				return $query->num_rows();
			}

		}

		public function get_products_by_product_name($slug = FALSE){
			$this->db->select('products.*');
			$this->db->select('categories.*');
			$this->db->select('brands.*');
			$this->db->select('product_photo.*');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
 			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->result_array();
		}

		//works well in view. 
		public function get_products_by_product_name_rows($slug = FALSE){
			$this->db->select('products.*');
			$this->db->select('categories.*');
			$this->db->select('brands.*');
			$this->db->select('product_photo.*');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
 			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->num_rows();
		}

		public function get_average($slug = FALSE)
		{				
			$this->db->select_avg('appraised_amount');
			$this->db->from('products');
			$this->db->where('slug', $slug);
			return $this->db->get();
		}

		public function get_average_per_group($slug = FALSE)
		{	
			$this->db->select_avg('appraised_amount');
			$this->db->from('products');
			$this->db->where('slug', $slug);
			$this->db->group_by('product_name');
			return $this->db->get();
		}

		public function get_minimum($slug = FALSE)
		{	
			$this->db->select_min('appraised_amount');
			$this->db->from('products');
			$this->db->where('slug', $slug);
			return $this->db->get();
		}

		public function get_maximum($slug = FALSE)
		{		
			$this->db->select_max('appraised_amount');
			$this->db->from('products');
			$this->db->where('slug', $slug);
			
			return $this->db->get();
		}
	}