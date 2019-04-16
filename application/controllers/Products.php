<?php
	class Products extends CI_Controller{
		
		public function index($slug = NULL){
			$data['title'] = 'Product Price Catalog';
			$data['products'] = $this->product_model->get_products(); 
			$data['average_appraised_amount'] = $this->product_model->get_average_per_group();
			$data['count_by_product_name'] = $this->product_model->get_count_by_product_name();
			// $data['min_of_all_products'] = $this->product_model->get_min_of_all_products();
			// print_r($data['min_of_all_products']);
			// exit();
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
			$data['avg_price_sold'] = $this->product_model->get_average_price_sold($data['product_name']);
			$data['min_price_sold'] = $this->product_model->get_minimum_price_sold($data['product_name']);
			$data['max_price_sold'] = $this->product_model->get_maximum_price_sold($data['product_name']);
			$data['products_by_product_name'] = $this->product_model->get_products_by_product_name($data['product_name']);
			$data['products_by_product_name_rows'] = $this->product_model->get_products_by_product_name_rows($data['product_name']); //pawnhero
			$data['num_of_selling_prices'] = $this->product_model->get_num_of_selling_prices($data['product_name']);
			$data['product_selling_records'] = $this->product_model->get_product_selling_records($data['product_name']);
			


			if(empty($data['products'])){
				show_404();
			}

			$data['slug'] = $data['products']['slug'];
			$data['appraised_amount'] = $data['products']['appraised_amount'];
			$data['average_per_group'] = $this->product_model->get_average_per_group($data['product_name']);
			$this->load->view('templates/header');

			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	}