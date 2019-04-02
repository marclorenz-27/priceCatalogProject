<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		.card{
			margin: 1vh;
		}

		.tableBorder{
			border: 1px solid black;
		}

		p{
			font-size: 14px;
		}

		.bold{
			font-weight: : bold;
		}

		.card-body{
			margin-top: 2vh;
		}

		.h3-margin{
			text-align: center;
		}

		.h-bold{
			font-weight: bold;
		}


	</style>
</head>
<body>
</center>
<div class="container-fluid">
	<div class="row">
		<h2><?php echo $product['product_name'];?></h2>
	</div> <br>

	<div class="row">
			<img src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false) :quality(100)/product/77/740611/1.jpg?9318" width="30%" height="30%">
	</div>
	<br>

	<div class="row">
	</div> <br>

	<div class="row">
		<div class="col-sm-6">
			<h3><span class="badge badge-success">PawnHero</span> </h3>
		</div>
		<div class="col-sm-6">
			<h3><span class="badge badge-dark">MarketPlace</span> </h3>
		</div>
	</div> <br>
	
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Average Price:</h5> 
				</div>
				<div class="col-sm-5">
					<h5><span class="badge badge-primary" style="text-align: left;">&#8369; <?php echo number_format($product['appraised_amount'], 2);?> </span></h5>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Average Price:</h5> 
				</div>
				<div class="col-sm-5">
					<h5><span class="badge badge-primary" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Maximum Price:</h5> 
				</div>
				<div class="col-sm-5">
					<h5><span class="badge badge-warning" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Maximum Price:</h5> 
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
					<h5>Minimum Price:</h5>
				</div>
				<div class="col-sm-5">
					<h5><span class="badge badge-danger" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
				</div>
			</div>
		</div>	
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Minimum Price:</h5> 
				</div>
				<div class="col-sm-5">
					<h5><span class="badge badge-danger" style="text-align: left;">&#8369; nn,nnn.nn</span></h5>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="row">
		<table class="table table-bordered table-hover tableBorder">
			<tbody>
				<tr>
				    <th><h5>Total Number of Pawning Prices (from PawnHero): </h5></th>
				     <td>6</td>
				</tr>
				<tr>
				   	<th><h5>Total Number of Selling Prices (from MarketPlace): </h5></th>
				    <td>2</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div> <br>

	<div class="container">
		<div class="row">
			<h3 class="font-weight-bold">All Pawning Prices</h3> <hr>
		</div>

		<div class="row">
			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Appraisal Amount:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Pawning Date:</b><br>March 31, 2019</p>
			  </div>
			</div>
			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Appraisal Amount:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Pawning Date:</b><br>March 31, 2019</p>
			  </div>
			</div>
			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Appraisal Amount:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Pawning Date:</b><br>March 31, 2019</p>
			  </div>
			</div>
			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Appraisal Amount:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Pawning Date:</b><br>March 31, 2019</p>
			  </div>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<h3 class="font-weight-bold">All Selling Prices</h3> <hr>
		</div>
		<div class="row">
			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Selling Price:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Selling Date:</b><br>April 1, 2019</p>
			  </div>
			</div>	

			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Selling Price:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Selling Date:</b><br>April 1, 2019</p>
			  </div>
			</div>	

			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Selling Price:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Selling Date:</b><br>April 1, 2019</p>
			  </div>
			</div>	

			<div class="card" style="width: 16rem;">
			  <img class="card-img-top" src="https://ke.jumia.is/CIrv8QmspY7ZBTIIAjyj8xdsvKA=/fit-in/500x500/filters:fill(white):sharpen(1,0,false):quality(100)/product/77/740611/1.jpg?9318" alt="Image on Card Sample" width="10rem" height="220vh" style=" background-color: #444444; margin-top: 2vh;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
			    <p class="text-secondary" style="font-weight: bold;">Brand</p>
			    <p class="card-text"><b>Selling Price:</b><br>&#8369; 47,000.00 &nbsp;<small>(out of 6 of total records)</small></p>
			    <p class="card-text"><b>Selling Date:</b><br>April 1, 2019</p>
			  </div>
			</div>
		</div>
	</div>
	<br><br>