<?php
	class Products extends CI_Controller{
		
		public function index($slug = NULL){
			$data['title'] = 'Product Price Catalog';
			$data['products'] = $this->product_model->get_products(); 
			$data['average_per_group'] = $this->product_model->get_average_per_group();
			$data['count_by_product_name'] = $this->product_model->get_count_by_product_name();

			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['products'] = $this->product_model->get_products($slug);
			$data['avg'] = $this->product_model->get_average($slug);
			$data['average_per_group'] = $this->product_model->get_average_per_group(); //index page
			$data['max'] = $this->product_model->get_maximum($slug);
			$data['min'] = $this->product_model->get_minimum($slug);
			$data['products_by_product_name'] = $this->product_model->get_products_by_product_name($slug);
			$data['products_by_product_name_rows'] = $this->product_model->get_products_by_product_name_rows($slug);

			if(empty($data['products'])){
				show_404();
			}

			$data['product_name'] = $data['products']['product_name'];
			$data['slug'] = $data['products']['slug'];
			$data['appraised_amount'] = $data['products']['appraised_amount'];
			// print_r($data['appraised_amount']);
			// exit();

			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	} 