<?php
	class Product_model extends CI_Model{
		var $db2;
		public function __construct(){
			$this->db2 = $this->load->database('otherdb', TRUE);
		}

		public function get_average_sales($product_name = FALSE){
			$this->db2->select_avg('marketplace_db.sales.price_sold', 'average_sales');
			$this->db2->select('pawnhero_db.products.product_name AS `Product Name`');
			$this->db2->select('pawnhero_db.brands.brand_name AS `Brand Name`');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
			$this->db2->join('pawnhero_db.brands', 'pawnhero_db.brands.brand_id = marketplace_db.sales.brand_id', 'LEFT');
			$this->db2->group_by('pawnhero_db.products.product_id');
			$query = $this->db2->get_where('marketplace_db.sales', array('product_name'=>$product_name));
			// print_r($query->result_array());
			// exit();
			$arrayOne = $query->result_array();
			// print_r($query->result_array());
			// print_r($arrayOne);
			// exit();
			return $arrayOne;
		}

		public function get_products($slug = FALSE){
			if($slug === FALSE){
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
				$arrayTwo = $query->result_array();
				// print_r($arrayTwo);
				// exit();
				return $arrayTwo;
			}

			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->row_array(); // to return 1.
		}

		// count of prices per group
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

		public function get_products_by_product_name($product_name = FALSE){
			$this->db->select('products.*');
			$this->db->select('categories.*');
			$this->db->select('brands.*');
			$this->db->select('product_photo.*');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
			$this->db->order_by("pawning_date", "DESC");
 			$query = $this->db->get_where('products', array('product_name' => $product_name));
			return $query->result_array();
		}

		public function get_products_by_product_name_rows($product_name = FALSE){
			$this->db->select('products.*');
			$this->db->select('categories.*');
			$this->db->select('brands.*');
			$this->db->select('product_photo.*');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
 			$query = $this->db->get_where('products', array('product_name' => $product_name));
			return $query->num_rows();
		}

		public function get_average($product_name = FALSE)
		{				
			$this->db->select_avg('appraised_amount');
			// echo $product_name;
			// exit();
			return $this->db->get_where('products', array('product_name' => $product_name));		}

		public function get_average_per_group($product_name = FALSE)
		{	
			$this->db->select_avg('appraised_amount');
			$this->db->group_by('product_name');
			return $this->db->get_where('products', array('product_name' => $product_name));
		}

		public function get_minimum($product_name = FALSE)
		{	
			$this->db->select_min('appraised_amount');
			return $this->db->get_where('products', array('product_name' => $product_name));
		}

		public function get_maximum($product_name = FALSE)
		{	
			$this->db->select_max('appraised_amount');
			return $this->db->get_where('products', array('product_name' => $product_name));
		}


		// public function get_maximum($slug = FALSE)
		// {		
		// 	$this->db->select_max('appraised_amount');
		// 	$this->db->from('products');
		// 	$this->db->where('product_name', $product_name);	
		// 	return $this->db->get();
		// }

		// public function get_minimum($slug = FALSE)
		// {	
		// 	$this->db->select_min('appraised_amount');
		// 	$this->db->from('products');
		// 	$this->db->where('slug', $slug);
		// 	return $this->db->get();
		// }

		// public function get_maximum($slug = FALSE)
		// {		
		// 	$this->db->select_max('appraised_amount');
		// 	$this->db->from('products');
		// 	$this->db->where('slug', $slug);	
		// 	return $this->db->get();
		// }
	}