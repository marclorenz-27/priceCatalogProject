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
            <div class="table-responsive" align="center">
                <table class="table table-bordered  table-responsive" style="font-size:14px;" id="dataTable"  cellspacing="0" width="100%" style="padding: 5vh; margin: 5vh;">
                <thead class="bg-dark text-light">
                <tr>
                    <th class="w-25">Category Name</th>
                    <th class="w-20">Brand Name</th>
                    <th class="w-25">Product Name</th>
                    <th class="w-15">Appraised Amount</th>
                    <th class="w-15">Pawning Date</th>
                    <th class="w-15">Action</th>
                </tr>
                </thead>
                <tfoot class="bg-dark text-light">
                <tr>
                    <th class="w-25">Category Name</th>
                    <th class="w-20">Brand Name</th>
                    <th class="w-25">Product Name</th>
                    <th class="w-15">Appraised Amount</th>
                    <th class="w-15">Pawning Date</th>
                    <th class="w-15">Action</th>
                </tr>
                </tfoot>
            ';

            if($data->num_rows() > 0)
            {
                foreach ($data->result() as $row) 
                {
                    $output .='
                            <tr>
                                <td class="w-25"><b>'.$row->category_name.'</b></td>
                                <td class="w-20">'.$row->brand_name.'</a></td>
                                <td class="w-25">'.'<a href="'.base_url().'products/view/'.$row->slug.'">'.$row->product_name.'</a></td>
                                <td class="w-15"> &#x20b1; '.number_format($row->average_appraised_amount,2,".",",").'
                                </td>
                                <td class="w-15">'.date("F d, Y", strtotime($row->date_created)). '</td>
                                <td class="w-15">'.'<a href="'.base_url().'products/view/'.$row->slug.'" class="btn btn-success"><i class="far fa-eye"></i>View'.'</a>
                            </tr>
                    ';
                }
            }
            else
            {
                $output .='<tr>
                            <td colspan="6" style="text-align:center;">
                                   <i class="fab fa-dropbox data-icon" style="font-size: 24px"></i> &nbsp;&nbsp; No Record Found &nbsp;&nbsp; <i class="fas fa-cat data-icon" style="font-size: 24px"></i>
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