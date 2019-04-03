<?php
	class Products extends CI_Controller{
		
		public function index(){

			$data['title'] = 'Product Price Catalog';
			$data['products'] = $this->product_model->get_products();
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['products'] = $this->product_model->get_products($slug);
			$data['brands'] = $this->product_model->get_products($slug);

			if(empty($data['products'])){
				show_404();
			}

			$data['product_name'] = $data['products']['product_name'];
			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}

		public function avg($slug = NULL){

			$data['title'] = 'Average';
			$data['products'] = $this->product_model->get_productsByProductName();
			//$data['average'] = $this->product_model->get_average($slug);
			//$this->load->view('templates/header');
			$this->load->view('products/avg', $data);
			
		}
	}