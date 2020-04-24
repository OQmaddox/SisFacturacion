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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3>Cierre de Caja Diario Por Usuario</h3>
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
                                                    <th class="text-info" width="30">vF - vI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sum=0;
                                                        $rest=0;
                                                        $vfinal=0;
                                                        $vini=0;
                                                         foreach ($data1 as $result1){ ?>
                            
                                                <tr>
                                                    
                                                    <td class="text-success"><?php echo $result1->CAJ_FECHA_A ?> --></td>                                              
                                                    <th class="text-success">$<?php echo $vini=$result1->CAJ_APERTURA_V ?></th>
                                                    <td class="text-danger"><?php echo $result1->CAJ_FECHA_C ?> --></td>
                                                    <th class="text-danger">$<?php echo $vfinal=$result1->CAJ_CIERRE_V ?></th>
                                                    <th scope="row"><?php echo $result1->USU_NOMBRE ?></th>
                                                    <th class="text-info" scope="row">$<?php echo $rest=$result1->CAJ_CIERRE_V-$result1->CAJ_APERTURA_V ?></th>                                           
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
                                                      $egresos=0;
                                                      $ingresos=0;
                                                         foreach ($data3 as $result3){ 
                                                            $usuarioante =$result3->USU_NOMBRE;
                                                           
                                                                
                                                             ?>          
                                                <tr>                  
                                                    <?php if ($result3->ACC_MOTIVO!='EGRESO') {
                                                        echo '<th scope="row" class="text-success">'.$result3->ACC_MOTIVO.'</th> ';
                                                        $ingresos=$ingresos+$result3->ACC_MONTO;
                                                    } else {
                                                        echo '<th scope="row" class="text-danger">'.$result3->ACC_MOTIVO.'</th> ';
                                                        $egresos=$egresos+$result3->ACC_MONTO;            
                                                    }
                                                    ?> 
                                                    <td class="text-info"><?php echo $result3->ACC_FECHA ?></td>           
                                                    <td class="text-info"><?php echo $result3->ACC_DESCRIPCION ?></td>  
                                                    <th><?php echo $result3->USU_NOMBRE ?></th>   

                                                     <?php if ($result3->ACC_MOTIVO!='EGRESO') {
                                                        echo '<th class="text-success">$'.$result3->ACC_MONTO.'</th>';
                                                        
                                                    } else {
                                                        echo '<th class="text-danger">$'.$result3->ACC_MONTO.'</th>';
                                                                
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
                                                    <th width="80" scope="col">Ventas sistema</th>
                                                   
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                        $sum_fac=0;
                                                         foreach ($data2 as $result2){
                                                          $sum_fac=$result2->FAC_TOTAL1+$sum_fac;?>
                                                         
                                                <tr>
                                                    <td width="450"></td>
                                                    <th ><?php echo $result2->USU_NOMBRE ?></th>  
                                                    <th width="80" class="text-primary" scope="row">$<?php echo round($result2->FAC_TOTAL1,2); ?></th>
                                                                                                 
                                                </tr> 
                                                <?php } ?>                                              
                                            </tbody>
                                        </table>

                                        <table class="table">
                                           
                                            <tbody>
                                                <tr>
                                                    <th class="text-success" width="80">Ingresos: <?php echo $ingresos?>  </th>
                                                    <th class="text-danger" width="80">Egresos: <?php echo $egresos?></th>
                                                    <th class="text-info" width="160">Efectivo: <?php echo $rest?></th>  
                                                    <th  width="100"></th>
                                                    <th class="text-primary" width="80">Ventas Sistema: <?php echo round($sum_fac,2)?></th>                                              
                                                </tr>  
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>+ Ingresos - Egresos: <?php echo $sumie=$ingresos-$egresos?></th>  
                                                    <th> </th> 
                                                    <th></th>                                              
                                                </tr>  
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Efectivo + (+ Ingresos - Egresos): <?php echo $sumars=$rest+abs($sumie)?></th>  
                                                    <th> <=> </th>
                                                    <th class="text-primary"> Ventas Sistema: <?php echo round($sum_fac,2)?></th>                                                   
                                                </tr>  
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>  
                                                    <th><?php echo $sumars?> - <?php echo round($sum_fac,2)?> = $<?php echo $sumto=round(abs($sumars)-round($sum_fac,2),2)?>  </th>
                                                    <th> 
                                                   
                                                    </th>                                                   
                                                </tr>  
                                                <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th >
                                                <?php 
                                                if ($vini) {
                                                    if ($vfinal) {
                                                        if ($sumto==0) {
                                                            echo '<h2 class="text-success"> Esta correcto </h2>';
                                                        } else if($sumto>0){
                                                            echo '<h2 class="text-danger"> Sobra dinero </h2>';
                                                        }else if($sumto<0){
                                                            echo '<h2 class="text-danger"> Falto dinero </h2>';
                                                        }
                                                    } else {
                                                        echo '<h2 class="text-danger"> FALTA EL VALOR DE CIERRE </h2>';
                                                    }
                                                } else {
                                                    echo '<h2 class="text-info"> Este usuario no inicio caja</h2>';
                                                }
                                                
                                               
                                                
                                                    
                                                    
                                                ?></th>
                                                <th></th>
                                                </tr>                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            


    </div>