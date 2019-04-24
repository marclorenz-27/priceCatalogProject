<?php
    class Products extends CI_Controller
    {
        public function index($slug = NULL)
        {
            $data['title'] = 'Product Price Catalog';
            $data['products'] = $this->product_model->get_products(); 
            $data['products_count'] = $this->product_model->get_products_count();

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

            $this->load->view('templates/header');
            $this->load->view('products/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
            $data['products'] = $this->product_model->get_products($slug);
            $data['product_name'] = $data['products']['product_name'];
            $data['avg_appraised_amount'] = $this->product_model->get_average_appraised_amount($data['product_name']);
            $data['min_appraised_amount'] = $this->product_model->get_minimum_appraised_amount($data['product_name']);
            $data['max_appraised_amount'] = $this->product_model->get_maximum_appraised_amount($data['product_name']);
            $data['products_by_product_name'] = $this->product_model->get_products_by_product_name($data['product_name']);
            $data['products_by_product_name_rows'] = $this->product_model->get_products_by_product_name_rows($data['product_name']); 
            $this->load->view('templates/header');
            $this->load->view('products/view', $data);
            $this->load->view('templates/footer');
        }
    }