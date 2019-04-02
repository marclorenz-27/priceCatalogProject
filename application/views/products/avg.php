<?php 

			$min = $this->product_model->get_average();
			foreach ($min->result() as $row) {
				echo  number_format($row->appraised_amount, 2);
			}

?>