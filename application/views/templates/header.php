<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Pricing Catalog - PawnHero</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css'); ?>" rel="stylesheet">

  <!-- Font Awesome 5 Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



  <style type="text/css">

    body{
        background-color: #efefef;
    }

    * {
        box-sizing: border-box;
    }

    .zoom {
        transition: transform .2s;
        margin: 0 auto;
    }

    .zoom:hover {
        -ms-transform: scale(1.5);
        -webkit-transform: scale(1.5);
        transform: scale(1.45); 
    }

    .border-black{
      border: 1px solid black;
    }

    i{
      margin-right: 0.5vh;
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
      font-weight: bold;
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

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="<?php echo base_url('products') ?>" title="Dashboard"><img src="https://pawnhero.ph/img/PawnHero-logo.svg" width="145px"> Product Pricing Catalog</a>
    <a href="<?php echo base_url('/login') ?>" class="btn btn-success" Title="Login" style=" display:none; margin-left: 3vh;"><i class='fas fa-sign-in-alt'></i> Login</a>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('dashboard');?>" title="Go to Module Dashboard"  style="display: none;">
          <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('products');?>" title="Go to Catalog of all Products">
          <i class="fas fa-book-open"></i><span> Catalog</span>
        </a>
      </li>
      <!-- Displayed as hidden -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('categories');?>" title="Go to Product Categories" style="display: none;">
          <i class="fas fa-grip-horizontal">  </i><span">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('brands');?>" title="Go to Product Brands" style="display: none;">
          <i class='fas fa-tag'></i><span>Brands</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper" class="container">
    <div id="page-title">
      <center>