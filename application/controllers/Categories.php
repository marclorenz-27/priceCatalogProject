<?php
	class Categories extends CI_Controller{
		
		public function index(){

			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();

			//$data['mkproducts'] = $this->mkproduct_model->get_products();
			//from MarketPlace

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}
	}