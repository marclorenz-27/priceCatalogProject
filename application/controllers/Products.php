<?php
	class Products extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Product Price Catalog';
			$data['products'] = $this->product_model->get_products();
			$data['average_per_group'] = $this->product_model->get_average_per_group();
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['products'] = $this->product_model->get_products($slug);
			$data['brands'] = $this->product_model->get_products($slug);
			$data['avg'] = $this->product_model->get_average($slug);
			$data['max'] = $this->product_model->get_maximum($slug);
			$data['min'] = $this->product_model->get_minimum($slug);
			if(empty($data['products'])){
				show_404();
			}

			$data['product_name'] = $data['products']['product_name'];
			$data['slug'] = $data['products']['slug'];
			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	}