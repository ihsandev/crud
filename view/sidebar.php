<?php 

  require_once "core/init.php";

$super_admin = false;

  if(isset($_SESSION['admin'])){
    if (cek_status_admin($_SESSION['admin']) == 1 ){
      $super_admin = true;
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Ihsan English Course</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

      <div id="wrapper">

        <div class="container">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">IHSAN ENGLISH COURSE</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href="register.php"><i class="fa fa-table"></i>Tambah Data</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
              
              <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Halo <?= $_SESSION['admin']; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
              <?php if ($super_admin == true) : ?>
                    <li><a href="register_admin.php"><i class="glyphicon glyphicon-plus"></i> Tambah Admin</a></li>
                    <li><a href="data_admin.php"><i class="glyphicon glyphicon-edit"></i> Edit Admin</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              <?php else : ?>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              <?php endif; ?>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </nav>


