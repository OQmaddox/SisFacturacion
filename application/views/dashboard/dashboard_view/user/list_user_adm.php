
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

	 <a href="<?php echo base_url('User_controller/add_user');?>" class="btn btn-primary" >Nuevo</a>
	 <div class="card shadow mb-4">
	 <div class="card-body">
              <div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead class="thead-dark">
 						<tr>
						 	<th>Empresa</th>
 							<th>Perfil</th>
 							<th>Nombres</th>
 							<th>Apellidos</th>
 							<th>Cedula</th>
 							<th>Celular</th>
 							<th>Correo</th>
 							

 							<th>Estado</th>
 							<th>Creado:</th>
 							<th>Accion</th>

 						</tr>
 					</thead>
 					<tbody>
 						<?php $i =1;
 						foreach ($data1 as $result){?>

 							<tr>
							 <td><?php echo $result->EMP_NOMBRE ?></td>
 								<td><?php echo $result->PER_NOMBRE ?></td>
 								<td><?php echo $result->USU_NOMBRE ?></td>
 								<td><?php echo $result->USU_APELLIDO ?></td>
 								<td><?php echo $result->USU_CEDULA ?></td>
 								<td><?php echo $result->USU_CELULAR ?></td>
 								<td><?php echo $result->USU_CORREO ?></td>
 								

 								<td><?php 
 								if ($result->USU_ESTADO == 1) {
 									echo "<span class='label1 info'>Habilitado</span>";
 									
 								} else {
 									echo "<span class='label1 warning'>Desabilitado</span>";
 								}
 								?>
 								
 								
 							</td>
 							<td><?php echo $result->USE_FEC_CRE ?></td>
 							<td><?php echo anchor('User_controller/edit_user/'.$result->ID_USUARIO,' ',['class'=>'btn btn-info btn-sm fas fa-edit']);?>
 							<?php echo anchor('User_controller/delete_user/'.$result->ID_USUARIO,'  ',['class'=>'btn btn-info btn-sm fas fa-trash']);?>

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


