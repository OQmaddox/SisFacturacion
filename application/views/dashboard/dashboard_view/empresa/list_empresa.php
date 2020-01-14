
<style>
.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.label1 {border-radius: 25%;}
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
</style>

<div class="container-fluid">

	 <a href="<?php echo base_url('Empresa_controller/add_emp');?>" class="btn btn-primary" >Nuevo</a>
	 <div class="card shadow mb-4">
	 <div class="card-body">
              <div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead class="thead-dark">
 						<tr>
						 	<th>ID</th>
 							<th>EMPRESA</th>
 							<th>CREADO</th>
 							<th>LOGO</th>
 							<th>ESTADO</th>
 							<th>ACCION</th>

 						</tr>
 					</thead>
 					<tbody>
 						<?php $i =1;
 						foreach ($data1 as $result){?>

 							<tr>
							 <td><?php echo $result->ID_EMPRESA ?></td>
 								<td><?php echo $result->EMP_NOMBRE ?></td>
 								<td><?php echo $result->EMP_CREACION ?></td>
 								<td>
								 <?php
								 	if($result->EMP_LOGO!=null){
										?>
					<img src="data:image/png;base64,<?=base64_encode($result->EMP_LOGO)?>" class="img-fluid" alt="Responsive image" width="304" height="236"/>

										<?php
									 }
								 ?>
								 </td>
 							
 								

 								<td><?php 
 								if ($result->EMP_ESTADO == 1) {
 									echo "<span class='label1 info'>Habilitado</span>";
 									
 								} else {
 									echo "<span class='label1 warning'>Desabilitado</span>";
 								}
 								?>
 								
 								
 							</td>
 						
 							<td><?php echo anchor('Empresa_controller/edit_emp/'.$result->ID_EMPRESA,' ',['class'=>'btn btn-info btn-sm fas fa-edit']);?>
 							<?php echo anchor('Empresa_controller/delete_emp/'.$result->ID_EMPRESA,'  ',['class'=>'btn btn-info btn-sm fas fa-trash']);?>

 						</td>

 					</tr>
 				<?php } ?>
 			</tbody>
 		</table>
</div>
</div>
</div>
</div>
</div>


