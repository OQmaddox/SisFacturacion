<div class="container mt-3">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>


                    <div class="col-xl-22 col-lg-12 col-md-12 ">
                        <div class="section-block">
                        <h3>Cierre de caja Diario</h3>
                    </div>
                    </div>
                    <div class="shadow p-3 mb-9 bg-white rounded"> 
                                
                                    <div class="table-responsive ">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th  width="100" scope="col">Inicio</th>
                                                    <th width="50" scope="col">Valor I</th>
                                                    <th width="100" scope="col">Cierre</th>
                                                    <th width="50" scope="col">Valor F</th>
                                                    <th width="100">Usuario</th>
                                                    <th width="30">vF - vI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sum=0;
                                                         foreach ($data1 as $result1){ ?>
                            
                                                <tr>
                                                    
                                                    <td class="text-primary"><?php echo $result1->CAJ_FECHA_A ?> --></td>                                              
                                                    <th class="text-primary">$<?php echo $result1->CAJ_APERTURA_V ?></th>
                                                    <td class="text-danger"><?php echo $result1->CAJ_FECHA_C ?> --></td>
                                                    <th class="text-danger">$<?php echo $result1->CAJ_CIERRE_V ?></th>
                                                    <th scope="row"><?php echo $result1->USU_NOMBRE ?></th>
                                                    <th scope="row">$<?php echo $rest=$result1->CAJ_CIERRE_V-$result1->CAJ_APERTURA_V ?></th>                                           
                                                </tr> 
                                                 <?php } ?>                                              
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table class="table">
                                             <thead>
                                                <tr>
                                                    <th width="50" scope="col">MOTIVO</th>
                                                    <th width="200" scope="col">FECHA</th>
                                                    <th width="150" scope="col">DESCRIPCIÓN</th>
                                                    <th width="150">USUARIO</th>
                                                    <th width="50"scope="col">MONTO</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sum=0;
                                                      $usuarioante="";
                                                     
                                                         foreach ($data3 as $result3){ 
                                                            $usuarioante =$result3->USU_NOMBRE;
                                                           
                                                                
                                                             ?>          
                                                <tr>                  
                                                    <?php if ($result3->ACC_MOTIVO=='EGRESO') {
                                                        echo '<th scope="row" class="text-danger">'.$result3->ACC_MOTIVO.'</th> ';
                                                    } else {
                                                        echo '<th scope="row" class="text-success">'.$result3->ACC_MOTIVO.'</th> ';            
                                                    }
                                                    ?> 
                                                    <td class="text-info"><?php echo $result3->ACC_FECHA ?></td>           
                                                    <td class="text-info"><?php echo $result3->ACC_DESCRIPCION ?></td>  
                                                    <th><?php echo $result3->USU_NOMBRE ?></th>                              
                                                    <th class="text-info">$<?php echo $result3->ACC_MONTO ?></th>
                                                     <?php 
                                                     if ($usuarioante !=$result3->USU_NOMBRE) {
                                                         $op=$result3->USU_NOMBRE;
                                                     } 
                                                        
                                                     
                                                     
                                                     
                                                     ?>                                         
                                                </tr> 
                                                
                                              
                                                
                                                       
                                                 <?php } ?>                                              
                                            
                                                 </tbody>
                                        </table>
                                        <hr>


                                        <table class="table">
                                             <thead>
                                                <tr>
                                                    <th width="450"scope="col"></th>
                                                    <th  width="80">Usuario</th>
                                                    <th width="80" scope="col">Ventas</th>
                                                   
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                        $sum_fac=0;
                                                         foreach ($data2 as $result2){
                                                          $sum_fac=$result2->FAC_TOTAL1+$sum_fac;?>
                                                         
                                                <tr>
                                                    <td width="450"></td>
                                                    <th class="text-info"><?php echo $result2->USU_NOMBRE ?></th>  
                                                    <th width="80" class="text-success" scope="row">$<?php echo round($result2->FAC_TOTAL1,2); ?></th>
                                                                                                 
                                                </tr> 
                                                <?php } ?>                                              
                                            </tbody>
                                        </table>

                                        <table class="table">
                                           
                                            <tbody>
                                                <tr>
                                                    <th width="620" >  </th>
                                                    <th width="450" scope="row">Total Ventas:  </th>
                                                    <th class="text-danger">$<?= round($sum_fac,2); ?></th>                                               
                                                </tr>                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            

                   
                   

                   








                    <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-center p-3 ">
                                <h4 class="mb-0 text-white">FACTURAS</h4>
                            </div>
                            <?php 
                            $sum_fac=0;
                             foreach ($data2 as $result2){
                              $sum_fac=$result2->FAC_TOTAL+$sum_fac;
                             }
                            ?>
                            <div class="card-body text-center">
                                <h1 class="mb-1">$ <?=$sum_fac ?></h1>
                                <p>Suma total de Facturas</p>
                            </div>
                            <div class="card-body border-top">
                                <ul class="list-unstyled bullet-check font-14">
                                    <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                    <li>Guaranteed follower growth for increas brand awareness.</li>
                                    <li>Daily updates on choose platforms</li>
                                    <li>Stronger customer service through daily interaction</li>
                                    <li>Monthly progress report</li>
                                    <li>1 Million Followers</li>
                                </ul>
                                <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-info text-center p-3">
                                <h4 class="mb-0 text-white"> Standard</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="mb-1">$350</h1>
                                <p>Per Month Plateform</p>
                            </div>
                            <div class="card-body border-top">
                                <ul class="list-unstyled bullet-check font-14">
                                    <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                    <li>Guaranteed follower growth for increas brand awareness.</li>
                                    <li>Daily updates on choose platforms</li>
                                    <li>Stronger customer service through daily interaction</li>
                                    <li>Monthly progress report</li>
                                    <li>2 Blog Post & 3 Social Post</li>
                                    <li>5 Millions Followers</li>
                                    <li>Growth Result</li>
                                </ul>
                                <a href="#" class="btn btn-secondary btn-block btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-center p-3">
                                <h4 class="mb-0 text-white">Premium</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="mb-1">$550</h1>
                                <p>Per Month Plateform</p>
                            </div>
                            <div class="card-body border-top">
                                <ul class="list-unstyled bullet-check font-14">
                                    <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                    <li>Guaranteed follower growth for increas brand awareness.</li>
                                    <li>Daily updates on choose platforms</li>
                                    <li>Stronger customer service through daily interaction</li>
                                    <li>Monthly progress report & Growth Result</li>
                                    <li>4 Blog Post & 6 Social Post</li>
                                </ul>
                                <a href="#" class="btn btn-secondary btn-block btn-lg">Contact us</a>
                            </div>
                        </div>
                    </div> -->
             





<!-- 
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>

      <th>#</th>
      <th>USUARIO</th>
      <th>CAJA_APERTURA</th>
      <th>CAJA_FECHA_a</th>
      <th>CAJA_CIERRE</th>
      <th>CAJA_FECHA_C</th>
      <th>ESTADO</th>


    </tr>
  </thead>
  <tbody >
    <?php $sum=0; $i =1;
    foreach ($data1 as $result){?>

      <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $result->ID_USUARIO ?></td>
        <td><?php echo $result->CAJ_APERTURA_V ?></td>
        <td><?= '$'?><?php echo $result->CAJ_FECHA_A ?></td>
        <td><?= '$'?><?php echo $result->CAJ_CIERRE_V ?></td>
       <td><?= '$'?><?php echo $result->CAJ_FECHA_C ?></td>
       <td><?= '$'?><?php echo $result->CAJ_ESTADO ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>  -->

    </div>