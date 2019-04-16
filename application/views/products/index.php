</center>
<div class="alert alert-info" role="alert">
              <i class="fa fa-info-circle"></i> The following data are just test data used for system demonstration.
</div>
<center>
  <h2><?= $title ?></h2>
</center>
            <form class="form-horizontal">
              <div class="form-group">
                <div class="input-group pmb-3" style="width: 45%; float: right; margin: 2vh 3vh 4vh 0vh">
                  <input type="search" class="form-control" placeholder="Search Brand, Category or Product Name" aria-label="Enter Product Name, Brand or Category" aria-describedby="basic-addon2">
                  <div class="input-group-append" required/>
                    <button class="btn btn-primary" type="button" title="Search"><i class='fas fa-search'></i> Search</button>
                  </div>
                </div>
              </div>
            </form> <br><br><br>
            
          
        <div class="container">
          <a href="#demo" class="btn btn-danger" data-toggle="collapse" title="Click to filter results"><i class="fas fa-filter"></i> Filter Results</a>
          <br><br>
          
          <div id="demo" class="collapse">
            <div class="row">
              <div class="col-sm">
                <label><b>Brands</b></label>
              </div>
              <div class="col-sm">
                 <label><b>Set Price Range</b></label> <br>
                  &#8369; 5,000.00 <input type="range" class="custom-range" min="0.00" max="5,000,000.00" style="width: 60%; margin: 0 1.5vh 0vh 1.5vh">&#8369;5,000,000.00
              </div>
            </div>
          </div>
        </div>


          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered  table-responsive" style="font-size:14px;" id="dataTable"  cellspacing="0">
                <thead class="bg-dark text-light">
                  <tr>
                    <th class="align-top">Category</th>
                    <th class="align-top">Brand</th>
                    <th class="align-top">Product name</th>
                    <th class="align-top">Pawning Price Average</th>
                    <th class="align-top">Selling Price Average</th>
                    <th class="align-top">Last Selling Date</th>
                    <th class="align-top">Picture</th>
                    <th class="align-top">Action</th>
                  </tr>
                </thead>
                <tfoot class="bg-dark text-light">
                  <tr>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Product name</th>
                    <th>Average Pawning Price</th>
                    <th>Average Price Sold</th>
                    <th>Last Selling Date</th>
                    <th>Picture</th>
                    <th>View</th>
                  </tr>
                </tfoot>
                <tbody>
                <!--Query for product-->
                 <?php 
                  foreach ($products as $product): 
                  ?>
                   <tr>
                    <td><b><?php echo $product['category_name']; ?></b></td>
                    <td><?php echo $product['brand_name']; ?></td>
                    <td><a href="<?php echo site_url('/products/'.$product['slug']);?>"><?php echo $product['product_name']; ?></a></td>
                    <td>
                    <?php echo "<p>&#8369; " . number_format($product['average_appraised_amount'], 2) . "</p>"; ?>
                    <br><small class="text-info">*average out of n prices</small></td>
                    <td>
                    <?php echo "<p>&#8369; " . number_format($product['average_selling_price'], 2) . "</p>"; ?> 
                    <br><small class="text-info">*average out of n prices</small></td>
                    <td> 
                      <!-- <?php echo date("F d, Y", strtotime($product['pawning_date'])); ?> -->
                      April 1, 2019

                    </td>           
                    <td>
                      <center>
                        <a href="<?php echo site_url('/products/'.$product['slug']);?>">
                          <img src="<?php echo $product['destination']; ?>" alt="<?php echo $product['slug'] . "-photo"; ?>" class="imageZoom" width="85px" height="85px" title="<?php echo "Click to view " . $product['brand_name'] . " " . $product['product_name']; ?>">
                          <!--jquery code for image zoom on the left side-->
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                          <script src="<?php echo base_url('js/jquery.bighover.js') ?>"></script>
                          <script>
                            $('.imageZoom').bighover({
                              height : "250",
                              position : "left",
                            });
                          </script>
                        </a>
                      </center>
                    </td>

                    <td> <br><center><a href="<?php echo site_url('/products/'.$product['slug']);?>" class="btn btn-success" 
                      Title="<?php echo "View " . $product['product_name'] . " Records"?>"> <i class='far fa-eye'></i> View</center></td>
                  </tr>
                 <?php endforeach; ?>
                 </tbody>
             </table>