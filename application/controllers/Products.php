<?php
    class Products extends CI_Controller
    {

        public function index($slug = NULL)
        {
            $data['title'] = 'Product Price Catalog';
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

        public function fetch()
        {
            $output = '';
            $query = '';
            $this->load->model('Product_model');
        
            if($this->input->post('query'))
            {
                $query = $this->input->post('query');

            }

            $data = $this->Product_model->fetch_data($query);
            $output .= '
            <div class="container">
            <div class="table-responsive shadow sm p-3 mb-5 bg-white rounded">
                <table class="table table-bordered" id="dataTable"  cellspacing="0" style="margin-left: 0vh">
                <thead class="bg-dark text-light">
                <tr>
                    <th class="w-15" valign="top">Category Name</th>
                    <th class="w-15" valign="top">Brand Name</th>
                    <th class="w-20" valign="top">Product Name</th>
                    <th class="w-20" valign="top">Average Appraised Amount</th>
                    <th class="w-20" valign="top">Pawning Date</th>
                    <th class="w-20" valign="top">Action</th>
                </tr>
                </thead>
                <tfoot class="bg-dark text-light">
                <tr>
                    <th>Category Name</th>
                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Average Appraised Amount</th>
                    <th>Pawning Date</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            ';

            if($data->num_rows() > 0)
            {
                foreach ($data->result() as $row) 
                {
                    $output .='
                            <tr>
                                <td><b>'.$row->category_name.'</b></td>
                                <td>'.$row->brand_name.'</a></td>
                                <td>'.'<a href="'.base_url().'products/view/'.$row->slug.'">'.$row->product_name.'</a></td>
                                <td> &#x20b1; '.number_format($row->average_appraised_amount,2,".",",").'
                                </td>
                                <td>'.date("F d, Y", strtotime($row->date_created)). '</td>
                                <td>'.'<center> <a href="'.base_url().'products/view/'.$row->slug.'" target=_blank" class="btn btn-success shadow">View '.'<i class="far fa-arrow-alt-circle-right";"></i></a><center>
                            </tr>
                    ';
                }
            }
            else
            {
                $output .='<tr>
                            <td colspan="6" style="text-align:center;" class="bg-dark text-light">
                                   <i class="fab fa-dropbox data-icon" style="font-size: 30px; color:#2681C1"></i> &nbsp;&nbsp; No Record Found &nbsp;&nbsp; <i class="fas fa-cat data-icon" style="font-size: 24px; color:#69C058;"></i>
                            </td>
                        </tr>';
            }
            $output .= '</table>';
            echo $output;
        }

        public function view($slug = NULL)
        {
            $data['products'] = $this->product_model->get_products($slug);
            $data['product_name'] = $data['products']['product_name'];
            $data['brand_name'] = $data['products']['brand_name'];
            $data['category_name'] = $data['products']['category_name'];

            $data['avg_appraised_amount'] = $this->product_model->get_average_appraised_amount($data['product_name'], $data['brand_name'], $data['category_name']);
            $data['min_appraised_amount'] = $this->product_model->get_minimum_appraised_amount($data['product_name'], $data['brand_name'], $data['category_name']);
            $data['max_appraised_amount'] = $this->product_model->get_maximum_appraised_amount($data['product_name'], $data['brand_name'], $data['category_name']);
            $data['products_by_product_name'] = $this->product_model->get_products_by_product_name($data['product_name'], $data['brand_name'], $data['category_name']);
            $data['products_by_product_name_rows'] = $this->product_model->get_products_by_product_name_rows($data['product_name'], $data['brand_name'], $data['category_name']); 
            $this->load->view('templates/header');
            $this->load->view('products/view', $data);
            $this->load->view('templates/footer');
        }
    }