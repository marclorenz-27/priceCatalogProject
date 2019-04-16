</head>

<body>
	<div class="row">
		<a href="<?php echo base_url('products'); ?>" class="btn btn-success" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
	</div>
	
	<h2>Product Overview</h2>
</center> 
<div class="container">
	<div class="row">
		<h2><?php echo $products['product_name'];  ?></h2>
	</div>
	<div class="row">
			<h5 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"> <?php echo $products['brand_name']; ?> </span>
			</h5>
	</div>

		<div>
			<div class="row">
				<div class="col-sm-4">
					<div class="row">
						<img src="<?php /* echo $products['destination']; ?>" width="80%" height="80%" title="<?php echo $product_name; ?>" alt="<?php echo $slug;  */ ?>">
					</div>
				</div>
				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-6">
							
							<a href="https://pawnhero.ph/" target="_blank">
								<h4 title="Prices from the Pawnshop"><span class="badge badge-success" target_blank>PawnHero</span></h4>
							</a>
						</div>
					<div class="col-sm-6">
						<a href="https://luxein.com/" target="_blank">
							<h4 title="Prices based on selling prices from MarketPlace / Luxe/In"><span class="badge badge-dark">Luxe/In</span></h4>
						</a>
					</div>
					</div> <p></p>

					<div class="row">
						<div class="col-sm-6">
							<h5>Pawning Prices Summary</h5>
						</div>
						<div class="col-sm-6">
							<h5>Selling Prices Summary</h5>
						</div>
					</div>
					<p> </p>

			<div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-5">
								<h6 class="font-weight-bold">Average Price:</h6> 
							</div>
							<div class="col-sm-5">
								<h5><span class="badge badge-primary" style="text-align: left;">&#8369;
									<?php 
										
										foreach ($avg_appraised_amount->result() as $row) {
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
								<h5><span class="badge badge-primary" style="text-align: left;">&#8369;
									<?php		
										/*
										foreach ($avg_price_sold->result() as $row) {
											echo number_format($row->price_sold, 2) . "<br>";
										}
										*/
									?>
								</span></h5>
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
										
										foreach ($max_appraised_amount->result() as $row) {
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
							<h5><span class="badge badge-warning" style="text-align: left;">&#8369; 
							<?php		
								/*
								foreach ($min_price_sold->result() as $row) {
										echo number_format($row->price_sold, 2) . "<br>";
								}
								*/
							?>
							</span></h5>
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
										foreach ($min_appraised_amount->result() as $row) {
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
								<h5><span class="badge badge-danger" style="text-align: left;">&#8369; 
									<?php	
									/*	
										foreach ($max_price_sold->result() as $row) {
											echo number_format($row->price_sold, 2) . "<br>";
										}
									*/
									?>
								</span></h5>
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
								<h5>
									<span class="badge badge-dark" style="text-align: left;">
										<?php  echo $products_by_product_name_rows;  ?>
									</span>
								</h5>
							</div>
						</div>
				</div>	
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-5">
							<p class="font-weight-bold">Total number of  Prices: </p> 
						</div>
						<div class="col-sm-5">
							<h5><span class="badge badge-dark" style="text-align: left;"><?php /* echo $num_of_selling_prices; */ ?></span></h5>
							
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
				<h3 class="font-weight-bold">All Pawning Prices</h3>
			</div>

			<div class="row" style="">
				<?php foreach ($products_by_product_name as $product): ?>
					<div class="card" style="width: 14rem; ">
						<img class="card-img-top" src="<?php /* echo $product['destination']; */  ?>" alt="<?php  echo $product['product_name'] . " Image (alt name)"; ?>"	 style="padding: 2vh">	
						<div class="card-body">
							<h5 class="card-title"><?php echo $product['product_name']; ?></h5>
							<h6 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"><?php echo $product['brand_name'];  ?></span></h6>
							<p class="card-text"><b>Appraisal Amount:</b> <br> <?php echo "&#8369; " . number_format($product['appraised_amount'], 2); ?></p>
							<p class="card-text"><b>Pawning Date:</b><br> <?php /* echo date("F d, Y", strtotime($product['pawning_date'])); */ ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div> <br>
			<!-- Display of Selling Price Heading -->
			<div class="row" style="display: none">
				<h3 class="font-weight-bold">All Selling Prices</h3><br><br>
			</div>
			<!-- Display of Selling Price Data -->
			<div class="row" style="display: none">
				<?php /* foreach ($product_selling_records as $record): */?>
					<div class="card" style="width: 14rem; ">
						<img class="card-img-top" src="<?php /* echo $record['destination']; */ ?>" alt="" style="padding: 2vh">	
						<div class="card-body">
							<h5 class="card-title"><?php /* echo $record['product_name']; */ ?></h5>
							<h6 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"><?php /* echo $record['brand_name']; */?></span></h6>
							<p class="card-text"><b>Selling Price:</b> <br> <?php /* echo "&#8369; " . number_format($record['appraised_amount'], 2); */?></p>
							<p class="card-text"><b>Selling Date:</b><br> <?php /* echo date("F d, Y", strtotime($record['selling_date'])); */ ?></p>
						</div>
					</div>



				<?php /* endforeach; */ ?>
			</div> <br>
		</div> <br><br>

	<div class="row">
		<a href="<?php /* echo base_url('products');*/ ?>" class="btn btn-success" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
	</div> 
</div>