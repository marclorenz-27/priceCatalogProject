<?php
	class Brands extends CI_Controller{
		
		public function index(){

			$data['title'] = 'Brands';

			$data['brands'] = $this->brand_model->get_brands();

			//$data['mkproducts'] = $this->mkproduct_model->get_products();
			//from MarketPlace

			$this->load->view('templates/header');
			$this->load->view('brands/index', $data);
			$this->load->view('templates/footer');
		}
	}