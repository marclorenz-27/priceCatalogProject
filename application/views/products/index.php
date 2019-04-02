<h2><?= $title ?></h2>
</center>
            <form class="form-horizontal">
              <div class="form-group">
                <div class="input-group pmb-3" style="width: 45%; float: right; margin: 2vh 2vh 4vh 0vh">
                  <input type="search" class="form-control" placeholder="Search Brand, Category or Product Name" aria-label="Enter Product Name, Brand or Category" aria-describedby="basic-addon2">
                  <div class="input-group-append" required/>
                    <button class="btn btn-danger" type="button">Search</button>
                  </div>
                </div>
              </div>
            </form>
   
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-light">
                  <tr>
                    <th class="align-top">Category</th>
                    <th class="align-top">Brand</th>
                    <th class="align-top">Product name</th>
                    <th class="align-top">Pawning Price Average</th>
                    <th class="align-top">Selling Price Average</th>
                    <th class="align-top">Last Selling Date</th>
                    <th class="align-top">Picture</th>
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
                  </tr>
                </tfoot>
                <tbody>
                <!--Query for product-->
                 <?php foreach ($products as $product): ?>
                  <tr>
                    <td><b><?php echo $product['category_name']; ?></b></td>
                    <td><?php echo $product['brand_name']; ?></td>
                    <td> <?php echo $product['product_name']; ?> <br><br> <center><a href="<?php echo site_url('/products/'.$product['slug']);?>" class="btn btn-success">View more info</a></center></td>
                    <td>&#x20b1; <?php echo number_format($product['appraised_amount'], 2);?> <small class="text-info">*average out of 5 prices</small></td>
                    <td>&#x20b1; <?php echo number_format(55000, 2);?> <small class="text-info">*average out of 4 prices</small></td>
                    <td> December 13, 2018 </td>
                    <td><center><img src="<?php echo $product['destination']; ?>" alt="<?php echo $product['slug']; ?>" width="200px" height="200px"></center></td>
                  </tr>
                 <?php endforeach; ?>
                 </tbody>
             </table>