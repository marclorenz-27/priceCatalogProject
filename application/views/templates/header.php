<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Price Catalog - PawnHero</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css'); ?>" rel="stylesheet">
  <style type="text/css">
    a{
      color: black;
    }
  </style>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard') ?>" title="Home"><img src="https://pawnhero.ph/img/PawnHero-logo.svg" width="145px"> Product Price Catalog</a>
    <a href="<?php echo base_url('/login') ?>" class="btn btn-success" Title="Login">Login</a>
    
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('products');?>" title="Go to Catalog of all Products">
          <span>Catalog</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('categories');?>" title="Go to Product Categories">
          <span>Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('brands');?>" title="Go to Product Brands">
          <span>Brands</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper" class="container">
    <div id="page-title">
      <center>