</head>

<body>
	<div class="row">
		<a href="<?php echo base_url('products'); ?>" class="btn btn-success" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
	</div>
	
	<h2>Product Overview</h2>
</center> 
<div class="container">
	<div class="row">
		<h2><?php echo $products['product_name'];?></h2>
	</div>
	<div class="row">
			<h5 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"> <?php echo $products['brand_name']; ?> </span>
			</h5>
	</div>

		<div>
			<div class="row">
				<div class="col-sm-4">
					<div class="row">
						<img src="<?php echo $products['destination']; ?>" width="80%" height="80%">
					</div>
				</div>
				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-6">
							<h4><span class="badge badge-success">PawnHero</span></h4>
						</div>
					<div class="col-sm-6">
						<h4><span class="badge badge-dark">MarketPlace</span></h4>
					</div>
					</div> <br>

					<div class="row">
						<div class="col-sm-6">
							<h5>Pawning Prices Summary</h5>
						</div>
						<div class="col-sm-6">
							<h5>Selling Prices Summary</h5>
						</div>
					</div> <br>

			<div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-5">
								<h6 class="font-weight-bold">Average Price:</h6> 
							</div>
							<div class="col-sm-5">
								<h5><span class="badge badge-primary" style="text-align: left;">&#8369;
									<?php		
										foreach ($avg->result() as $row) {
											echo number_format($row->appraised_amount, 2) . "<br>";
										}
										?>
									</span>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-5">
								<h6 class="font-weight-bold">Average Price:</h6> 
							</div>
						<div class="col-sm-5">
								<h5><span class="badge badge-primary" style="text-align: left;">&#8369; <?php echo number_format($products['appraised_amount'], 2);?></span></h5>
						</div>
						</div>
					</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-5">
								<h6 class="font-weight-bold">Maximum Price:</h6> 
							</div>
							<div class="col-sm-5">
								<h5><span class="badge badge-warning" style="text-align: left;">&#8369;
									<?php 
										foreach ($max->result() as $row) {
												echo number_format($row->appraised_amount, 2) . "<br>";
										}
									?>
									</span></h5>
							</div>
						</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<h6 class="font-weight-bold">Maximum Price:</h6> 
						</div>
						<div class="col-sm-5">
							<h5><span class="badge badge-warning" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
						</div>
					</div>
				</div>
			</div> 

			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<h6 class="font-weight-bold">Minimum Price:</h6>
						</div>
						<div class="col-sm-5">
							<h5><span class="badge badge-danger" style="text-align: left;">&#8369; 
								<?php 
									$min = $this->product_model->get_minimum($slug);
										foreach ($min->result() as $row) {
											echo number_format($row->appraised_amount, 2) . "<br>";
										}
									?>
								</span></h5>
							</div>
						</div>
					</div>	
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<h6 class="font-weight-bold">Minimum Price:</h6> 
						</div>
						<div class="col-sm-5">
								<h5><span class="badge badge-danger" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-5">
								<p class="font-weight-bold">Total number of Prices:</p>
							</div>
							<br><br>
							<div class="col-sm-5">
								<h5><span class="badge badge-dark" style="text-align: left;"><?php echo $products_by_product_name_rows; ?></span></h5>
							</div>
						</div>
				</div>	
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<p class="font-weight-bold">Total number of  Prices:</p> 
						</div>
						<div class="col-sm-5">
							<p> </p>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div> <br>
</div> <br>

		<div class="container">
			<div class="row">
				<h3 class="font-weight-bold">All Pawning Prices</h3><br><br>
			</div>
			<div class="row" style="">
				<?php foreach ($products_by_product_name as $product): ?>
					<div class="card" style="width: 14rem; ">
						<img class="card-img-top" src="<?php echo $product['destination']; ?>" alt="Image on Card Sample" style="padding: 2vh">
						<div class="card-body">
							<h4 class="card-title"><?php echo $product['product_name']; ?></h4>
							<h6 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"><?php echo $product['brand_name']; ?></span></h6>
							<p class="card-text"><b>Appraisal Amount:</b> <br> <?php echo "&#8369; " . number_format($product['appraised_amount'], 2); ?></p>
							<p class="card-text"><b>Pawning Date:</b><br> <?php echo $product['pawning_date']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div> <br>
			<div class="row" style="display: none;">
				<h3 class="font-weight-bold">All Selling Prices</h3><br><br>
			</div>
		</div>
	</div> <br><br>
	<div class="row">
		<a href="<?php echo base_url('products'); ?>" class="btn btn-success" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
	</div> 
</div>