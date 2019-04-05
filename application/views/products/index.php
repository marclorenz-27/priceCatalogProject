<h2><?= $title ?></h2>
</center>
            <form class="form-horizontal">
              <div class="form-group">
                <div class="input-group pmb-3" style="width: 45%; float: right; margin: 2vh 3vh 4vh 0vh">
                  <input type="search" class="form-control" placeholder="Search Brand, Category or Product Name" aria-label="Enter Product Name, Brand or Category" aria-describedby="basic-addon2">
                  <div class="input-group-append" required/>
                    <button class="btn btn-primary" type="button" title="Search"><i class='fas fa-search'></i></button>
                  </div>
                </div>
              </div>
            </form>   
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
                 <?php foreach ($products as $product): ?>
                  <tr>
                    <td><b><?php echo $product['category_name']; ?></b></td>
                    <td><?php echo $product['brand_name']; ?></td>
                    <td><a href="<?php echo site_url('/products/'.$product['slug']);?>"><?php echo $product['product_name']; ?></a></td>
                    <td>
                    <?php echo "<p>&#8369; " . number_format($product['average_per_group'],2) . "</p>"; ?>
                    <br><small class="text-info">*average out of <?php echo $product_rows; ?> prices</small></td>
                    <td> <?php
                                   //echo number_format(55000, 2);
                                  echo "<del><p class='text-muted'> &#x20b1; nn,nnn</p></del>";
                                ?> 
                    <br><small class="text-info">*average out of n prices</small></td>
                    <td> December 13, 2018 </td>
                    
                    <td> 
                      <center>
                        <a href="<?php echo site_url('/products/'.$product['slug']);?>">
                          <img src="<?php echo $product['destination']; ?>" alt="<?php echo $product['slug']; ?>" class="imageZoom" width="85px" height="85px" title="<?php echo "Click to view " . $product['brand_name'] . " " . $product['product_name']; ?>">
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