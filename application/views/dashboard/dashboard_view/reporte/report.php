
<style>
  .parpadea {
    
    animation-name: parpadeo;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;

    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
  }

  @-moz-keyframes parpadeo{  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
  }

  @-webkit-keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
  }

  @keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
  }
</style>

<body id="page-top">

 

  
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

          <h1 class="h3 mb-0 text-gray-800"><?php echo $this->session->userdata('emp_nombre');?></h1><h2>Bienvenido <?php echo $this->session->userdata('usu_nombre');?> <?php echo $this->session->userdata('usu_apellido');?></h2>

          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Venta (Diaria)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php $sum =0;
                    foreach ($data4 as $result4){?>
                     <?php  $sum=$result4->FAC_TOTAL1+$sum;  ?>
                   <?php } ?>   
                   <?php echo round($sum, 2);  ?></div>
                 </div>
                 <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Venta (Total)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$
                    <?php $i =1;
                    foreach ($data1 as $result1){?>
                     <?php echo round($result1->FAC_TOTAL2, 2);  ?>
                   <?php } ?>
                 </div>
               </div>
               <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Categorias Existentes</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cat->categoria?></div>
                  </div>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Productos Existentes</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pro->producto?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Online <span class="parpadea"><i class="fa fa-circle text-success"></i></span> </h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                     
                      <th class="border-0">Usuario</th>
                      <th class="border-0">Fecha/Hora Facturación</th>
                      <th class="border-0">Sub Total</th>
                      <th class="border-0">Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =1;
                    foreach ($data2 as $result2){?>
                     
                      <tr>
                        
                        <th scope="row"><?php echo $result2->USU_NOMBRE ?></th>
                        <td><span class="badge-dot badge-success mr-1"></span><?php echo $result2->FAC_FECHA ?></td>
                        <td>$<?php echo $result2->FAC_SUBTOTAL?></td>
                        <td>$<?php echo $result2->FAC_TOTAL ?></td>
                        
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Top 5 Item mas vendidos</h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
           
            <div class="table-responsive">
              <table class="table">
                <thead class="bg-light">
                  <tr class="border-0">
                   
                    <th class="border-0">(#)</th>
                    <th class="border-0">Nombre</th>
                    <th class="border-0">Precio</th>
                    <th class="border-0">Stock Actual</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $i =1;
                  foreach ($mas as $item_mas){?>
                   
                    <tr>
                      
                      <th scope="row">#<?php echo $i?></th>
                      <td><?php echo $item_mas->PRO_NOMBRE ?></td>
                      <td>$<?php echo $item_mas->PRO_PRECIO?></td>
                      <td><?php echo $item_mas->PRO_STOCK?></td>
                      
                    </tr>
                    <?php $i++;} ?>
                  </tbody>
                </table>
              </div>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Ventas x semana</h6>
              
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-danger">Top 5 Items Menos Vendidos</h6>
              
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                     
                      <th class="border-0">(#)</th>
                      <th class="border-0">Nombre</th>
                      <th class="border-0">Precio</th>
                      <th class="border-0">Stock Actual</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =1;
                    foreach ($menos as $item_me){?>
                     
                      <tr>
                        
                        <th scope="row">#<?php echo $i?></th>
                        <td><?php echo $item_me->PRO_NOMBRE ?></td>
                        <td>$<?php echo $item_me->PRO_PRECIO?></td>
                        <td><?php echo $item_me->PRO_STOCK?></td>
                        
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Venta por mes</h6>
                
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Categorias mas vendidas</h6>
                
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Panes
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Pastas
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Pasteles
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>


        
      </div>
      <!-- /.container-fluid -->


    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    
    
