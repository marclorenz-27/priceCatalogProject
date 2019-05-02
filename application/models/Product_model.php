<?php
    class Product_model extends CI_Model
    {
        public function __construct()
        {
            /*
                This function is used to load the databases initially as the application starts.
            */
            $this->load->database();
            $this->db2 = $this->load->database('otherdb', true);
        }
        
            /*
                Function Name: fetch_data()
                Description:
                    This method returns the products based on the query given. This works with the search functionality of the application. 

                    By default, this method will return all the products together with the category_name, brand_name, product_name, slug, date_created and average appraised_amount.

                    When a set of search keywords were given, this function will return results based on the keywords.
                    This function is connected and being accessed by the fetch_data() method from Products Controller.

                    The results here are grouped by product_name, brand_name, category_name and ordered by category_name, brand_name, product_name'

                    The results are only limited for just 35 records. just for performance.
                    LIKE method is being used to provide results, please use fulltext search to make it faster.
            */


        function fetch_data($query)
        {
            //Queries for the data being displayed on the index page.
            $this->db->select('pawnhero.ph_category.category_name');
            $this->db->select('pawnhero.ph_brand.brand_name');
            $this->db->select('pawnhero.ph_product.product_name');
            $this->db->select('pawnhero.ph_product.slug');
            $this->db->select('pawnhero.ph_product.date_created');
            $this->db->select_avg('pawnhero.ph_product.appraised_amount', 'average_appraised_amount');
                
            if($query != '') 
            {
                $this->db->like('brand_name', $query);
                $this->db->or_like('category_name', $query);
                $this->db->or_like('product_name', $query);
                $this->db->or_like('appraised_amount', $query);
            }

            $this->db->having('average_appraised_amount > 0'); 
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name, brand_name', 'category_name');

            return $query = $this->db->get('pawnhero.ph_product', 35, $this->uri->segment(0));               
        }

        public function get_products($slug = false)
        {
            //the following query is executed when there is a slug set in the link or there is a selected product from the product catalog.
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->group_by('product_name, brand_name');
            $query = $this->db->get_where('ph_product', array('ph_product.slug' => $slug));
            return $query->row_array();
            /*
            //this if statement was removed and set as comment
            if($slug === false) {
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
                $this->db->group_by('product_name, brand_name');
                $query = $this->db->get('pawnhero.ph_product', 5, $this->uri->segment(5));
                $products = $query->result_array();
                return $products;
            }
            */
        }

        public function get_product_selling_records($product_name = false)
        {
            // This method returns the selling records of a product and this is being fetched from MarketPlace PH 
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

        public function get_products_by_product_name($product_name, $brand_name = false, $category_name = false)
        {
            //This returns the records of pawning price per product from ph_product on PawnHero_DB
            $this->db->select('ph_product.*');
            $this->db->select('ph_brand.brand_name');
            $this->db->select_max('ph_product.date_created', 'max_date');
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name', 'brand_name', 'category_name');
            $query = $this->db->get_where('ph_product', array('product_name' => $product_name, 'brand_name' => $brand_name, 'category_name' => $category_name));
            return $query->result_array();
        }

        public function get_average_appraised_amount($product_name = false, $brand_name = false, $category_name = false)
        {
            //This method returns the average appraisal amount per product.
            $this->db->select_avg('appraised_amount');
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name, brand_name', 'category_name');
            return $this->db->get_where('ph_product', array('product_name' => $product_name, 'brand_name' => $brand_name));		
        }

        public function get_minimum_appraised_amount($product_name = false, $brand_name = false, $category_name = false)
        {
            //This method returns the minimum appraised amount per product. This is displayed in the view.php of a product 
            $this->db->select_min('appraised_amount');
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name, brand_name', 'category_name');
            return $this->db->get_where('ph_product', array('product_name' => $product_name, 'brand_name' => $brand_name));
        }

        public function get_maximum_appraised_amount($product_name = false, $brand_name = false, $category_name = false)
        {
            //This method returns the maximum appraised amount per product.
            $this->db->select_max('appraised_amount');
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name, brand_name', 'category_name');
            return $this->db->get_where('ph_product', array('product_name' => $product_name, 'brand_name' => $brand_name));
        }

        public function get_products_by_product_name_rows($product_name = false, $brand_name = false, $category_name = false )
        {
            //returns the number of records per product name (pawning) from PawnHero DB
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $query = $this->db->get_where('ph_product', array('product_name' => $product_name));
            $this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
            $this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
            $this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
            $this->db->order_by('category_name, brand_name, product_name');
            $this->db->group_by('product_name', 'brand_name', 'category_name');
            $this->db->get_where('ph_product', array('product_name' => $product_name, 'brand_name' => $brand_name));
            return $query->num_rows();
        }

        public function get_num_of_selling_prices($product_name = false)
        {
            //returns the number of records per product name (selling/price sold) from MarketPlace DB
            $this->db2->select('marketplace_db.sales.*');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name)); 
            return $query->num_rows();
        }
    }

        //Old functions removed from the class
        /*
        public function get_average_price_sold($product_name = false)
        {                
            $this->db2->select_avg('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_minimum_price_sold($product_name = false)
        {
            $this->db2->select_min('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_maximum_price_sold($product_name = false)
        {
            $this->db2->select_max('marketplace_db.sales.price_sold');
            $this->db2->join('pawnhero_db.products', 'pawnhero_db.products.product_id = marketplace_db.sales.product_id', 'LEFT');
            return $query = $this->db2->get_where('marketplace_db.sales', array('product_name' => $product_name));
        }

        public function get_average_per_group($product_name = false)
        {
            $this->db->select_avg('appraised_amount');
            $this->db->group_by('product_name');
            return $this->db->get_where('products', array('product_name' => $product_name));
        }

        public function get_lowest_price($category_name = false)
        {
            $this->db->select_min('pawnhero_db.products.appraised_amount');
            $this->db->join('categories', 'categories.category_id = products.category_id');
            $this->db->join('brands', 'brands.brand_id = products.brand_id','left');
            return $query = $this->db->get_where('products', array('category_name' => $category_name));
        }

        public function get_highest_price($category_name = false)
        {
            $this->db->select_max('pawnhero_db.products.appraised_amount');
            $this->db->join('categories', 'categories.category_id = products.category_id');
            $this->db->join('brands', 'brands.brand_id = products.brand_id','left');
            return $query = $this->db->get_where('products', array('category_name' => $category_name));
        }
        */

                /*
        //This method returns the count of products per product name. This function was removed.
            public function get_products_count($slug = false)
            {
                if($slug === false){
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
        */

        /*
        public function get_count_by_product_name($product_name = false)
        {
            if($product_name === false){
                $this->db->select_avg('appraised_amount', 'average_per_group');
                $this->db->select('products.*');
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
        */

        /*
        public function get_product_rows($slug = false)
        {
            if($slug === false){
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
        */