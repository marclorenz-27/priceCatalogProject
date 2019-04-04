<?php
	class Product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		/*
			public function get_products($slug = FALSE){

			}
			This displays the products both in the products/index.php and products/view.php
			the result of this query depends whether there is an exisiting slug($slug) in the URL

			if there is a slug set, then view.php will be displayed containing the details of a particular product group.
			otherwise when there is no slug set, this function will execute the index(index.php) where all of the products are displayed in a table displaying the category, product name, brand  pawning price average, selling price average, last selling date, picture and action(view).
		*/

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
					return $query->result_array();
			}

			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
			$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
			$query = $this->db->get_where('products', array('slug' => $slug));
			// $rowcount = $query->num_rows();
			return $query->row_array();
		}

		public function get_products_by_product_name($slug = FALSE){
				$this->db->select('products.*'); //SELECT * FROM products
				$this->db->select('categories.*');
				$this->db->select('brands.*');
				$this->db->select('product_photo.*');
				$this->db->join('categories', 'categories.category_id = products.category_id');
				$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
				$this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
 				$query = $this->db->get_where('products', array('slug' =>$slug));
				return $query->result_array();
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
			$this->db->where('slug', $slug);
			$this->db->from('products');
			return $this->db->get();
		}
	}