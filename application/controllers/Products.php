<?php
	class Products extends CI_Controller{
		
		public function index($slug = NULL){
			$data['title'] = 'Product Price Catalog';
			
			$data['products'] = $this->product_model->get_products(); 
			$data['products_count'] = $this->product_model->get_products_count();
			$data['info_from_mp'] = $this->product_model->get_info_from_mp();

			$config['base_url'] = base_url() . '/products/index/';
			$config['total_rows'] = $data['products_count'];
			$config['per_page'] = 5;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul> &nbsp;';

			$config['first_tag_open'] = '<li>';
			$config['last_tag_open'] = '<li>';

			$config['next_tag_open'] = '<li>';
			$config['prev_tag_open'] = '<li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>&nbsp;';

			$config['first_tag_close'] = '</li>&nbsp;';
			$config['last_tag_close'] = '</li>&nbsp;';

			$config['next_tag_close'] = '</li>&nbsp;';
			$config['prev_tag_close'] = '</li>&nbsp;';

			$config['cur_tag_open'] = "<li class=\"active\"><span><b>";
			$config['cur_tag_close'] = "</b></span></li>&nbsp;";

			

			$this->pagination->initialize($config);


			/*
			$data['title'] = 'Product Price Catalog';
			
			$data['products'] = $this->product_model->get_products(); 
			$data['products_count'] = $this->product_model->get_products_count();
			$data['info_from_mp'] = $this->product_model->get_info_from_mp();

			*/

			/*

			$this->db->select('product_id', 'category_brand_id', 'product_name', 'slug');
			$data['base_url'] = base_url() . 'products/index';
			$data['total_rows'] = $this->db->get('pawnhero.ph_product')->num_rows();
			$data['per_page'] = 30;
			$data['num_links'] = 10;
			$this->db->select('pawnhero.ph_category.category_name');
			$this->db->select('pawnhero.ph_brand.brand_name');
			$this->db->select('pawnhero.ph_product.product_name');
			// $this->db->select('pawnhero.ph_product.slug');
			$this->db->select_avg('pawnhero.ph_product.appraised_amount', 'average_appraised_amount');
			$this->db->having('average_appraised_amount > 0'); 
			$this->db->join('ph_category_brand', 'ph_category_brand.category_brand_id = ph_product.category_brand_id', 'LEFT');
			$this->db->join('ph_category', 'ph_category.category_id = ph_category_brand.category_id', 'LEFT');
			$this->db->join('ph_brand', 'ph_brand.brand_id = ph_category_brand.brand_id', 'LEFT');
			$this->db->order_by('category_name');
			$this->db->group_by('product_name');
			$data['records'] = $this->db->get('pawnhero.ph_product', $data['per_page'], $this->uri->segment(3));

			// $data['toc'] = $this->mo

			$this->pagination->initialize($data);
			*/
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['products'] = $this->product_model->get_products($slug);
			$data['product_name'] = $data['products']['product_name'];
			$data['avg_appraised_amount'] = $this->product_model->get_average_appraised_amount($data['product_name']);
			$data['min_appraised_amount'] = $this->product_model->get_minimum_appraised_amount($data['product_name']);
			$data['max_appraised_amount'] = $this->product_model->get_maximum_appraised_amount($data['product_name']);
			// $data['avg_price_sold'] = $this->product_model->get_average_price_sold($data['product_name']);
			// $data['min_price_sold'] = $this->product_model->get_minimum_price_sold($data['product_name']);
			// $data['max_price_sold'] = $this->product_model->get_maximum_price_sold($data['product_name']);
			$data['products_by_product_name'] = $this->product_model->get_products_by_product_name($data['product_name']);
			$data['products_by_product_name_rows'] = $this->product_model->get_products_by_product_name_rows($data['product_name']); 
			//pawnhero
			// $data['num_of_selling_prices'] = $this->product_model->get_num_of_selling_prices($data['product_name']);
			// $data['product_selling_records'] = $this->product_model->get_product_selling_records($data['product_name']);
			
			// if(empty($data['products'])){
			// 	show_404();
			// }

			// $data['slug'] = $data['products']['slug'];
			// $data['appraised_amount'] = $data['products']['appraised_amount'];
			// $data['average_per_group'] = $this->product_model->get_average_per_group($data['product_name']);
			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	}