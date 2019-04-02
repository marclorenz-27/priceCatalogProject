<?php 

			$avg = $this->product_model->get_average();
			foreach ($avg->result() as $row) {
				echo "<h2>Samsung Galaxy S10 Plus</h2>Average Price: " . number_format($row->appraised_amount, 2) . "<br>";
			}

			$min = $this->product_model->get_minimum();
			foreach ($min->result() as $row) {
				echo "Minimum Price: " . number_format($row->appraised_amount, 2) . "<br>";
			}

			$max = $this->product_model->get_maximum();
			foreach ($max->result() as $row) {
				echo "Maximum Price: " . number_format($row->appraised_amount, 2) . "<br>";
			}

			$all = $this->product_model->get_productsByProductName();
			foreach ($all as $product) {
				echo $product['product_name'];
			}
?>