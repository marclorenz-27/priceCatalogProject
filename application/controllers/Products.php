<?php
	class Products extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Product Price Catalog';
			$data['products'] = $this->product_model->get_products();
			$data['average_per_group'] = $this->product_model->get_average_per_group(); // average of all products(grouped) displayed from the index.php
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['products'] = $this->product_model->get_products($slug);
			$data['brands'] = $this->product_model->get_products($slug);
			$data['avg'] = $this->product_model->get_average($slug); //average of a particular product group, displayed on the view.php
			$data['max'] = $this->product_model->get_maximum($slug);
			$data['min'] = $this->product_model->get_minimum($slug);
			$data['products_by_product_name'] = $this->product_model->get_products_by_product_name($slug);
			if(empty($data['products'])){
				show_404();
			}

			$data['product_name'] = $data['products']['product_name'];
			$data['slug'] = $data['products']['slug'];
			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
	} // end of class