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
                    <th class="align-top">Selling Price Average<br></th>
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
                    <th>Picture</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td><b>Smartphones</b></td>
                    <td>Samsung</td>
                    <td>Galaxy s10+ <br><br><br><br><br><br> <center><button style="width: 95%;" class="btn btn-success">View more info</button></center></td>
                    <td>&#x20b1; 50,999.00 <br><br><br><br><br><br> <small class="text-info">*average out of 5 prices</small></td>
                    <td>&#x20b1; 55,000.00 <br><br><br><br><br><br> <small class="text-info">*average out of 4 prices</small></td>
                    <td> <center><img src="https://gsmabout.com/wp-content/uploads/2019/01/Samsung-Galaxy-S10-Plus.jpg" width="200px" height="200px"></center></td>
                  </tr>
                  <tr>
                    <td><b> Electronics </b></td>
                    <td>Apple</td>
                    <td>Apple iMac (Mid 2015)</td>
                    <td>&#x20b1; 68,999.00</td>
                    <td>&#x20b1; 75,999.00</td>
                    <td><center><img src="https://static.bhphoto.com/images/images500x500/apple_z0qw_mf88520_b_h_27_imac_with_retina_1432051072000_1151712.jpg" width="200" height="200"></center></td>
                  </tr>
                  <tr>
                    <td><b>Luxury Watches</b></td>
                    <td>Technomarine</td>
                    <td>Men's Swiss Wristwatch <br> TechnoMarine Chrono 114025</td>
                    <td>&#x20b1; 8,500.00</td>
                    <td>&#x20b1; 12,500.00</td>
                    <td><center><img src="https://images-na.ssl-images-amazon.com/images/I/51932LahXuL.jpg" width="200px" height="200px"></center> </td>
                  </tr>
                  <tr>
                    <td><b>Category One</b></td>
                    <td>Brand One</td>
                    <td>Product One</td>
                    <td>&#x20b1; .00</td>
                    <td>&#x20b1; .00 </td>
                    <td><center><img src="https://i1.wp.com/www.hamillroad.com/wp-content/uploads/2017/07/product-icon-500-w.jpg" width="200px" height="200px"></center></td>
                  </tr>
                  <tr>
                    <td><b>Category Two</b></td>
                    <td>Brand Two</td>
                    <td>Product Two</td>
                    <td>&#x20b1; .00</td>
                    <td>&#x20b1; .00 </td>
                    <td><center><img src="https://i1.wp.com/www.hamillroad.com/wp-content/uploads/2017/07/product-icon-500-w.jpg" width="200px" height="200px"></center></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>