<h2><?= $title ?></h2>
</center>
<div class="container">
  <form class="form-horizontal">
    <div class="form-group">
      <div class="input-group pmb-3" style="width: 45%; float: right; margin: 1vh 2vh 2vh 2vh">
        <input type="search" class="form-control" placeholder="Search Brand or Category" aria-label="Enter Product Name, Brand or Category" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class='fas fa-search'></i></button>
        </div>
      </div>
    </div>
</form> <br>

<div class="row" style="margin: 6vh 0vh 4vh 0vh">
  <div class="col-sm">
  <ul class="list-group"> 
    <?php foreach ($brands as $brand): ?>
        <li class="list-group-item list-group-item-action">
          <a href="brands/show/<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></a>
        </li>
    <?php endforeach; ?>
  </ul> 
  </div>
  </div>
</div>