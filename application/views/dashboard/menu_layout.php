

<!-- Sidebar - Brand -->
<a title ="Facturación Touch" class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-cash-register"></i><i class="fas fa-award"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Facturaciòn <sup>touch</sup>
    
  </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">



<?php 
if($this->session->userdata('id_perfil')==1){
      ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?=base_url()?>index.php/Dashboard_controller">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Administrador
</div>

<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('index.php/User_controller/');?>">
  <i class="fas fa-user-check"></i>
    <span>Empleados</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Caja_controller">
  <i class="fas fa-cash-register"></i>
    <span>Caja</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Producto_controller">
  <i class="fab fa-codepen"></i>
    <span>Productos</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Stock_controller">
  <i class="fas fa-barcode"></i>
    <span>Stock</span></a>
</li>



      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-balance-scale"></i>
          <span>Cierre de Caja</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cierre Diario:</h6>
            <a class="collapse-item" href="<?php echo base_url('index.php/Cierre_controller/list_cierre2');?>">Cierre ventas por Usuario</a>
            <a class="collapse-item" href="<?php echo base_url('index.php/Cierre_controller/list_cierre');?>">Cierre ventas General</a>
            <a class="collapse-item" href="<?php echo base_url('Cierre_controller/list_prod_cierre');?>">Cierre por Productos</a>
            <a class="collapse-item" href="<?php echo base_url('Cierre_controller/list_fact_cierre');?>">Cierre por Factura</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-clipboard-list"></i>
          <span>Reporte</span>
        </a>
        <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reporte General:</h6>
            <a class="collapse-item" href="<?php echo base_url('index.php/Report_controller/r_stock/');?>">Reporte Stock Productos</a>
            <a class="collapse-item" href="<?php echo base_url('index.php/Report_controller/r_cliente/');?>">Reporte Clientes</a>
 
          </div>
        </div>
      </li>

      <?php
       }else if($this->session->userdata('id_perfil')==2){
      ?>
<div class="sidebar-heading">
  Cajero
</div>

<li class="nav-item active">
  <a class="nav-link" href="<?=base_url()?>index.php/Caja_controller">
  <i class="fas fa-cash-register"></i>
    <span>Caja</span></a>
</li>
<div class="sidebar-heading">
  Ventas
</div>
<li class="nav-item">
<a class="nav-link" href="<?php echo base_url('Cierre_controller/list_fact_cierre');?>">
<i class="fas fa-balance-scale"></i>
    <span>Historial de Ventas</span></a>
</li>

<?php
  }else if($this->session->userdata('id_perfil')==3){
?>

<li class="nav-item active">
  <a class="nav-link" href="<?=base_url()?>index.php/Dashboard_controller">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<div class="sidebar-heading">
  Super_admin
</div>

<li class="nav-item active">
  <a class="nav-link" href="<?=base_url()?>index.php/Dashboard_controller/admin">
  <i class="fas fa-users-cog"></i>
    <span>Usuarios</span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?php echo base_url('Empresa_controller');?>">
<i class="fas fa-city"></i>
    <span>Empresas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Administrador
</div>

<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('index.php/User_controller/');?>">
  <i class="fas fa-user-check"></i>
    <span>Empleados</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Caja_controller">
  <i class="fas fa-cash-register"></i>
    <span>Caja</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Producto_controller">
  <i class="fab fa-codepen"></i>
    <span>Productos</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url()?>index.php/Stock_controller">
  <i class="fas fa-barcode"></i>
    <span>Stock</span></a>
</li>



      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-balance-scale"></i>
          <span>Cierre de Caja</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cierre Diario:</h6>
            <a class="collapse-item" href="<?php echo base_url('index.php/Cierre_controller/list_cierre2');?>">Cierre ventas por Usuario</a>
            <a class="collapse-item" href="<?php echo base_url('index.php/Cierre_controller/list_cierre');?>">Cierre ventas General</a>
            <a class="collapse-item" href="<?php echo base_url('Cierre_controller/list_prod_cierre');?>">Cierre por Productos</a>
            <a class="collapse-item" href="<?php echo base_url('Cierre_controller/list_fact_cierre');?>">Cierre por Factura</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-clipboard-list"></i>
          <span>Reporte</span>
        </a>
        <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reporte General:</h6>
            <a class="collapse-item" href="<?php echo base_url('index.php/Report_controller/r_stock/');?>">Reporte Stock Productos</a>
            <a class="collapse-item" href="<?php echo base_url('index.php/Report_controller/r_cliente/');?>">Reporte Clientes</a>
 
          </div>
        </div>
      </li>


<?php
  }
?>







<div class="text-center d-none d-md-inline">
<button id='link'>
                <i class="fa fa-power-off"></i>
                Salir
            </button>
</div>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<div class="text-white">
  <div class="text-center">
        <!--  reloj!-->
  </div> 
</div>



</ul>
<!-- End of Sidebar -->

<script>
      var base_url = "<?php echo base_url();?>";
    </script>
