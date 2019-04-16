<?php
	class Product_model extends CI_Model{
		// var $db2;
		public function __construct(){
			$this->load->database();
			$this->db2 = $this->load->database('otherdb', TRUE);
		}

		public function get_products($slug = FALSE){
			if($slug === FALSE){
				$this->db->select('pawnhero.ph_category.category_name');
				$this->db->select('pawnhero.ph_brand.brand_name');
				$this->db->select('pawnhero.ph_product.product_name');
				$this->db->select('pawnhero.ph_product.slug');
				$this->db->select_avg('pawnhero.ph_product.appraised_amount', 'average_appraised_amount');
				$this->db->having('average_appraised_amount > 0'); 
				$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
				$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
				$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
				$this->db->order_by('category_name');
				$this->db->group_by('product_name');
 				$query = $this->db->get('pawnhero.ph_product', 4);
 				// $query = $this->db->get_where('pawnhero.ph_product', array('product_name' => 'iPhone 7'));
				$products = $query->result_array();

				return $products;
			}

			$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
			$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
			$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
			$query = $this->db->get_where('ph_product', array('ph_product.slug' => $slug));
			return $query->row_array();
		}

		public function get_products_count($slug = FALSE){
			if($slug === FALSE){
				$this->db->select('pawnhero.ph_category.category_name');
				$this->db->select('pawnhero.ph_brand.brand_name');
				$this->db->select('pawnhero.ph_product.product_name');
				$this->db->select('pawnhero.ph_product.slug');
				$this->db->select_avg('pawnhero.ph_product.appraised_amount', 'average_appraised_amount');
				$this->db->having('average_appraised_amount > 0'); 
				$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
				$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
				$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
				$this->db->order_by('category_name');
				$this->db->group_by('product_name');
 				$query = $this->db->get('pawnhero.ph_product', 4);
 				// $query = $this->db->get_where('pawnhero.ph_product', array('product_name' => 'iPhone 7'));
				$products = $query->num_rows();
				// print_r($products);
				// exit();
				return $products;
			}
		}

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
				
				return $query->result_array();
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
			$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
			$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
			$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
			$query = $this->db->get_where('ph_product', array('product_name' => $product_name));

			return $query->result_array();
		}

		public function get_product_selling_records($product_name = FALSE){
			$this->db2->select('marketplace_db.sales.*');
			$this->db2->select('pawnhero_db.products.*');
			$this->db2->select('pawnhero_db.brands.*');
			$this->db2->select('pawnhero_db.product_photo.*');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id');
			$this->db2->join('pawnhero_db.brands', 'pawnhero_db.brands.brand_id = marketplace_db.sales.brand_id');
			$this->db2->join('pawnhero_db.product_photo', 'pawnhero_db.product_photo.photo_id = pawnhero_db.products.photo_id');
			$this->db2->order_by("selling_date", "DESC");
			$query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));

 			return $query->result_array();
		}

		public function get_average_appraised_amount($product_name = FALSE){				
			$this->db->select_avg('appraised_amount');
			return $this->db->get_where('ph_product', array('product_name' => $product_name));		
		}

		public function get_average_per_group($product_name = FALSE){	
			$this->db->select_avg('appraised_amount');
			$this->db->group_by('product_name');
			
			return $this->db->get_where('products', array('product_name' => $product_name));
		}

		public function get_minimum_appraised_amount($product_name = FALSE){	
			$this->db->select_min('appraised_amount');
			
			return $this->db->get_where('ph_product', array('product_name' => $product_name));
		}

		public function get_maximum_appraised_amount($product_name = FALSE){	
			$this->db->select_max('appraised_amount');
			
			return $this->db->get_where('ph_product', array('product_name' => $product_name));
		}

		public function get_average_price_sold($product_name = FALSE){				
			$this->db2->select_avg('marketplace_db.sales.price_sold');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
			
			return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
		}

		public function get_minimum_price_sold($product_name = FALSE){				
			$this->db2->select_min('marketplace_db.sales.price_sold');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
			
			return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
		}

		public function get_maximum_price_sold($product_name = FALSE){				
			$this->db2->select_max('marketplace_db.sales.price_sold');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
			
			return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
		}

		public function get_num_of_selling_prices($product_name = FALSE){
			$this->db2->select('marketplace_db.sales.*');
			$this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
			$query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
			
			return $query->num_rows();
		}

		public function get_products_by_product_name_rows($product_name = FALSE){
			$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
			$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
			$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
			$query = $this->db->get_where('ph_product', array('product_name' => $product_name));
			return $query->num_rows();
		}

		// public function get_brands($product_name = FALSE){
		// 	$this->db->select('pawnhero.product.*');
		// 	$this->db->select('pawnhero.brand.*');
		// 	$this->db->select('pawnhero.category.*');
		// 	$this->db->join('category', 'category.category_id = product.category_id');
		// 	$this->db->join('brand', 'brand.brand_id = product.brand_id','left');
		// 	// $this->db->join('product_photo', 'product_photo.photo_id = products.photo_id');
		// 	$this->db->group_by('brand_name');
 	// 		$query = $this->db->get_where('product', array('product_name' => $product_name));
 	// 		$result = $query->result_array();
		// 	return $result;
		// }

		public function get_lowest_price($category_name = FALSE){
			$this->db->select_min('pawnhero_db.products.appraised_amount');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
 			return $query = $this->db->get_where('products', array('category_name' => $category_name));
 			// $result = $query->result_array();
 		}

 		public function get_highest_price($category_name = FALSE){
			$this->db->select_max('pawnhero_db.products.appraised_amount');
			$this->db->join('categories', 'categories.category_id = products.category_id');
			$this->db->join('brands', 'brands.brand_id = products.brand_id','left');
 			return $query = $this->db->get_where('products', array('category_name' => $category_name));
 		}
	}