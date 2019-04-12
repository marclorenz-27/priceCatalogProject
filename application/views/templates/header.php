<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Pricing Catalog - PawnHero</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css'); ?>" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    * {
  box-sizing: border-box;
}

.zoom {
  /*padding: 50px;*/
  transition: transform .2s;
  /*width: 200px;*/
  /*height: 200px;*/
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.45); 
}
    .icon-color{
      color: #000000;
    }

    a{
      color: black;
    }
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

    body{
      background-color: white;
    }

  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard') ?>" title="Dashboard"><img src="https://pawnhero.ph/img/PawnHero-logo.svg" width="145px"> Product Pricing Catalog</a>
    <a href="<?php echo base_url('/login') ?>" class="btn btn-success" Title="Login" style="margin-left: 3vh;"><i class='fas fa-sign-in-alt'></i> Login</a>
    
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('dashboard');?>" title="Go to Module Dashboard">
          <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('products');?>" title="Go to Catalog of all Products">
          <i class="fas fa-book-open" style="margin-right: 10px;"></i><span>Catalog</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('categories');?>" title="Go to Product Categories">
          <i class="fas fa-grip-horizontal" style="margin-right: 12px;">  </i><span">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('brands');?>" title="Go to Product Brands">
          <i class='fas fa-tag' style="margin-right: 11px;"></i><span>Brands</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper" class="container">
    <div id="page-title">
      <center>