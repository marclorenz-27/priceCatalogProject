</head>
<body>
    <div class="row">
        <a href="<?php echo base_url('products'); ?>" class="btn btn-success shadow" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
    </div>

    <h2>Product Overview</h2> <br>
</center> 
<div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="row" style="margin: .5vh; padding: .5vh">
        <h2><?php echo $products['brand_name'] . " " . $products['product_name']; ?></h2>
    </div> <br>
    <div class="row">
        <h5 class="text-secondary" style="font-weight: bold; display: none;"> <span class="badge badge-secondary"> <?php echo $products['brand_name']; ?> </span>
        </h5>
    </div>

        <div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/300px-No_image_available.svg.png" width="300px" height="300px" title="<?php echo $product_name; ?>" style="padding: 2vh;">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                                <h4 title="Prices from the Pawnshop"><span class="badge badge-success shadow">PawnHero</span></h4>
                        </div>
                    <div class="col-sm-6">
                            <h4 title="Prices based on selling prices from MarketPlace"><span class="badge badge-dark shadow">MarketPlace</span></h4>
                    </div>
               	</div> <p> </p>

                <div class="row">
                    <div class="col-sm-6">
                        <h5>Pawning Prices Summary</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5>Selling Prices Summary</h5>
                    </div>
                </div> <p> </p>

            <div class="row">
                <div class="col-sm-6">
                    <div class="row" title="Average Pawning Price">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold">Average Price:</h6> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-primary" style="text-align: left;">
                                <?php 
                                    foreach ($avg_appraised_amount->result() as $row) {
                                        echo "&#8369; " . number_format($row->appraised_amount,2,".",",") . "<br>";
                                    }
                                ?>
                            </span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row" title="Average Selling Price">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold">Average Price:</h6> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-primary" style="text-align: left;">&#8369;
                                <?php		
                                    echo "nn,nnn.nn";
                                ?>
                            </span></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="row" title="Maximum Pawning Price">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold">Maximum Price:</h6> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-warning" style="text-align: left;">
                                <?php
                                    foreach ($max_appraised_amount->result() as $row)
                                    {
                                        echo "&#8369; " . number_format($row->appraised_amount,2,".",",") . "<br>";
                                    }
                                ?>
                            </span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row" title="Maximum Selling Price">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold">Maximum Price:</h6> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-warning" style="text-align: left;">&#8369; nn,nnn.nn
                            </span></h5>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-sm-6">
                    <div class="row" title="Minimum Pawning Price">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold">Minimum Price:</h6>
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-danger" style="text-align: left;">
                                <?php 
                                    foreach ($min_appraised_amount->result() as $row)
                                    {
                                        echo "&#8369; " . number_format($row->appraised_amount,2,".",",") . "<br>";
                                    }
                                ?>
                            </span></h5>
                        </div>
                    </div>
                </div>	
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold" title="Minimum Price">Minimum Price:</h6> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-danger" style="text-align: left;">&#8369; 
                                <?php
                                    echo "nn,nnn.nn";
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
                            <p class="font-weight-bold">Total number of Price Records:</p>
                        </div><br><br>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-dark" style="text-align: left;">
                                <?php  echo $products_by_product_name_rows;  ?>
                            </span></h5>
                        </div>
                    </div>
                </div>	
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="font-weight-bold">Total number of  Prices: </p> 
                        </div>
                        <div class="col-sm-5">
                            <h5><span class="badge badge-dark" style="text-align: left;">
                            n
                            </span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
</div><br>

        <div class="container">
            <div class="row">
                <h3 class="font-weight-bold">All Pawning Prices</h3>
            </div> <br>
            <div class="row">
                <?php foreach ($products_by_product_name as $product): ?>
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 14rem; ">
                        <img class="card-img-top" src="" alt="<?php  echo $product['product_name']." - image"; ?>"	 style="padding: 2vh">	
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <h6 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"><?php echo $product['brand_name'];  ?></span></h6>
                            <p class="card-text"><b>Appraisal Amount:</b> <br> 
                                <?php
                                    echo "&#8369; " . number_format($product['appraised_amount'],2,".",","); 
                                ?>
                            </p>
                            <p class="card-text"><b>Pawning Date:</b><br> <?php  echo date("F d, Y",strtotime($product['max_date'])); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <br>
            <div class="row">
                <h3 class="font-weight-bold">All Selling Prices</h3><br><br>
            </div>
            <div class="row">
                    <div class="card" style="width: 14rem; ">
                        <img class="card-img-top" src="" alt="product-image" style="padding: 2vh">	
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "Product Name"; ?></h5>
                            <h6 class="text-secondary" style="font-weight: bold;"> <span class="badge badge-secondary"><?php echo "Brand Name";?></span></h6>
                            <p class="card-text"><b>Selling Price:</b> <br> <?php echo "Price"; ?></p>
                            <p class="card-text"><b>Selling Date:</b><br> <?php echo "Date"; ?></p>
                        </div>
                    </div>
                <?php /* endforeach; */ ?>
            </div><br>
        </div><br><br>

    <div class="row">
        <a href="<?php  echo base_url('products');?>" class="btn btn-success shadow" style="color: white; float:left"><i class='far fa-arrow-alt-circle-left'></i> Back to Catalog</a>
    </div> 
</div>