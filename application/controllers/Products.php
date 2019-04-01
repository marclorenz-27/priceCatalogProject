<?php
	class Products extends CI_Controller{
		
		public function index(){

			$data['title'] = 'Product Price Catalog';

			$data['products'] = $this->product_model->get_products();

			//$data['mkproducts'] = $this->mkproduct_model->get_products();
			//from MarketPlace

			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['product'] = $this->product_model->get_products($slug);

			if(empty($data['product'])){
				show_404();

			}

			$data['product_name'] = $data['product']['product_name'];

			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	}