<?php
    class Product_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
            $this->db2 = $this->load->database('otherdb', TRUE);
        }

        function fetch_data($query)
        {
            $this->db->select("*");
            $this->db->from("ph_product");
            $this->db->where("appraised_amount > 0");

            if($query != ''){
                $this->db->like('product_id', $query);
                $this->db->or_like('category_brand_id', $query);
                 $this->db->or_like('product_name', $query);
                 $this->db->or_like('slug', $query);
                 $this->db->or_like('product_mp_category', $query);
                 $this->db->or_like('appraised_amount', $query);
                 $this->db->or_like('is_bulky', $query);
                 $this->db->or_like('created_by_user_id', $query);
                 $this->db->or_like('modified_by_user_id', $query);
                 $this->db->or_like('date_created', $query);
                 $this->db->or_like('date_updated', $query);
            }
            $this->db->order_by('product_id', 'ASC');
            $this->db->group_by('product_name');
            $this->db->limit(10);
            return $this->db->get();
        }

        public function get_products($slug = FALSE)
        {
            if($slug === FALSE) {
                $this->db->select('pawnhero.ph_category.category_name');
                $this->db->select('pawnhero.ph_brand.brand_name');
                $this->db->select('pawnhero.ph_product.product_name');
                $this->db->select('pawnhero.ph_product.slug');
                $this->db->select_max('pawnhero.ph_product.date_created');
                $this->db->select_avg('pawnhero.ph_product.appraised_amount', 'average_appraised_amount');
                $this->db->having('average_appraised_amount > 0'); 
                $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
                $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
                $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
                $this->db->order_by('category_name, brand_name, product_name');
                $this->db->group_by('product_name');
                $query = $this->db->get('pawnhero.ph_product', 5, $this->uri->segment(5));
                $products = $query->result_array();
                return $products;
            }

            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $query = $this->db->get_where('ph_product', array('ph_product.slug' => $slug));
            return $query->row_array();
        }

        public function get_products_count($slug = FALSE)
        {
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
                 $query = $this->db->get('pawnhero.ph_product');
                $products = $query->num_rows();
                return $products;
            }
        }

        public function get_count_by_product_name($product_name = FALSE)
        {
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

        public function get_product_rows($slug = FALSE)
        {
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

        public function get_products_by_product_name($product_name = FALSE)
        {
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $query = $this->db->get_where('ph_product', array('product_name' => $product_name));
            return $query->result_array();
        }

        public function get_product_selling_records($product_name = FALSE)
        {
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

        public function get_average_appraised_amount($product_name = FALSE)
        {
            $this->db->select_avg('appraised_amount');
            return $this->db->get_where('ph_product', array('product_name' => $product_name));		
        }

        public function get_average_per_group($product_name = FALSE)
        {
            $this->db->select_avg('appraised_amount');
            $this->db->group_by('product_name');
            return $this->db->get_where('products', array('product_name' => $product_name));
        }

        public function get_minimum_appraised_amount($product_name = FALSE)
        {    
            $this->db->select_min('appraised_amount');
            
            return $this->db->get_where('ph_product', array('product_name' => $product_name));
        }

        public function get_maximum_appraised_amount($product_name = FALSE)
        {
            $this->db->select_max('appraised_amount');
            return $this->db->get_where('ph_product', array('product_name' => $product_name));
        }

        public function get_average_price_sold($product_name = FALSE)
        {				
            $this->db2->select_avg('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_minimum_price_sold($product_name = FALSE)
        {
            $this->db2->select_min('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_maximum_price_sold($product_name = FALSE)
        {
            $this->db2->select_max('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_num_of_selling_prices($product_name = FALSE)
        {
            $this->db2->select('marketplace_db.sales.*');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));	
            return $query->num_rows();
        }

        public function get_products_by_product_name_rows($product_name = FALSE)
        {
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $query = $this->db->get_where('ph_product', array('product_name' => $product_name));
            return $query->num_rows();
        }

        public function get_lowest_price($category_name = FALSE)
        {
            $this->db->select_min('pawnhero_db.products.appraised_amount');
            $this->db->join('categories', 'categories.category_id = products.category_id');
            $this->db->join('brands', 'brands.brand_id = products.brand_id','left');
            return $query = $this->db->get_where('products', array('category_name' => $category_name));
            // $result = $query->result_array();
        }

        public function get_highest_price($category_name = FALSE)
        {
            $this->db->select_max('pawnhero_db.products.appraised_amount');
            $this->db->join('categories', 'categories.category_id = products.category_id');
            $this->db->join('brands', 'brands.brand_id = products.brand_id','left');
            return $query = $this->db->get_where('products', array('category_name' => $category_name));
        }

 				/* public function fetch_filter_type($type){
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
 				$query = $this->db->get('pawnhero.ph_product');
				$products = $query->result_array();
				return $products;
				// echo "<pre>";
				// print_r($result);
				// echo "</pre>";
				// exit();
				
		}*/
		/*
		public function get_info_from_mp(){
			$query = $this->db2->query("SELECT 
			-- sfo.`increment_id` order_id,
			sfoi.`name` item_name,
			sfoi.`sku` sku,
			LEFT(sfoi.sku, 6) ticket_no,
			DATE(sfosh.created_at) payment_received,
			MIN(sfoi.`price_incl_tax`) average_price_sold
			-- cped.`value` inventory_value
			 -- sfo.`customer_id`,
			 -- sfo.`customer_is_guest`,
			 -- sfo.`customer_email`,
			 -- sfoa.`telephone`,
			 -- sfo.`status`
			FROM marketplace.sales_flat_order  sfo
			JOIN marketplace.sales_flat_order_item  sfoi ON sfoi.order_id = sfo.entity_id 
				AND sfoi.`qty_refunded` = 0
				AND sfoi.`sku` NOT LIKE 'CS-%'
				AND sfoi.`sku` NOT LIKE 'PH201%'
				AND sfoi.`sku` NOT LIKE 'AUTH-%'
			JOIN marketplace.sales_flat_order_address  sfoa ON sfo.entity_id = sfoa.parent_id
				AND sfoa.`address_type` = 'shipping'
			JOIN marketplace.catalog_product_entity cpe ON sfoi.`product_id` = cpe.`entity_id`
			JOIN marketplace.sales_flat_order_payment sfop ON sfo.`entity_id` = sfop.`parent_id`
			JOIN marketplace.`sales_flat_order_status_history` sfosh ON sfo.`entity_id` = sfosh.`parent_id`
				AND ((sfosh.`status` = 'processing' AND sfop.`method` != 'cashondelivery') OR  (sfosh.`status` = 'complete' AND sfop.`method` = 'cashondelivery'))
			LEFT JOIN marketplace.catalog_product_entity_decimal cped ON cpe.`entity_id` = cped.`entity_id`
				AND cped.`attribute_id` = 229 -- loan value
			WHERE sfoi.name LIKE CONCAT('%', sfoi.name, '%')
			GROUP BY sfoi.`name`");

			// $query = $this->db2->get('catalog_category_product', 10);
			$info_from_mp = $query->result_array();
			// echo "<pre>"; 
			// print_r($info_from_mp);
			// echo "</pre>";
			// exit();
			return $info_from_mp;
		}
		*/
	
}