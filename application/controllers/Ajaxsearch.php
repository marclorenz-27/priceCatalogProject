<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = 'Brands';

		$this->load->view('templates/header');
		$this->load->view('search/index', $data);
		$this->load->view('templates/footer');
	}

	function fetch(){
		$output = '';
		$query = '';
		$this->load->model('Ajaxsearch_model');
		if($this->input->post('query')){
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		$output .= '
		<div class="table-responsive">
		<table class="table table-bordered  table-responsive" style="font-size:14px;" id="dataTable"  cellspacing="0">
                <thead class="bg-dark text-light">
                  <tr>
                    <th class="align-top">Category</th>
                    <th class="align-top">Brand</th>
                    <th class="align-top">Product name</th>
                    <th class="align-top">Pawning Price Average</th>
                    <th class="align-top">Last Selling Date</th>
                    <th class="align-top">Picture</th>
                  </tr>
                </thead>
		';

		if($data->num_rows() > 0){
			foreach ($data->result() as $row) {
				$output .= '
						<tr>
							<td>'.$row->product_id.'</td>
							<td>'.$row->brand_id.'</td>
							<td>'.$row->product_name.'</td>
							<td>'.$row->appraised_amount.'</td>
							<td>'.$row->pawning_date.'</td>
							<td>'.$row->photo_id.'</td>
						</tr>
				';
			}
		}

		else{
			$output .= '<tr>
							<td colspan="8">No Data Found</td>
						</tr>';
			$output .= '</table>';
			echo $output;
		}
	}	
}