<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Systema de Facturacion</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="<?=base_url()?>assets/res/bootstrap3/css/bootstrap.css" rel="stylesheet">-->

    <!-- Add custom CSS here -->
    <link href="<?=base_url()?>assets_dash/css/sb-admin-2.min.css" rel="stylesheet">

   <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
   <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" type="text/css">
   <link rel="stylesheet" href="<?=base_url()?>assets/css/slider.css" type="text/css">
   <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/all.css" type="text/css">
    
    <link href="<?=base_url()?>assets/css/bootstrap-toggle.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/slider-action.js"></script>
   <!-- <script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>-->


    <script src="<?=base_url()?>assets/sweet2/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
   
    <script src="<?=base_url()?>assets/sweet2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/sweet2/sweetalert2.min.css">
    
    
    
     </head>

     <body id="page-top" >

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php 
if($this->session->userdata('id_perfil')==1){
     
    echo '<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">';
}else{
  echo '<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark toggled" id="accordionSidebar">';
 }?>
