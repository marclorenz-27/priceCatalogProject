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
	}