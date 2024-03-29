<style>
	.label {
		color: white;
		padding: 8px;
		font-family: Arial;
	}

	.label1 {
		border-radius: 25%;
	}

	.info {
		background-color: #2196F3;
	}

	/* Blue */
	.warning {
		background-color: #ff9800;
	}

	/* Orange */
</style>

<div class="container-fluid">



	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>

							<th>Perfil</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Cedula</th>
							<th>Celular</th>
							<th>Correo</th>


							<th>Estado</th>
							<th>Creado:</th>
							<th>Estadia:</th>
							<th>Accion</th>

						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($data1 as $result) { ?>

							<tr>

								<td><?php echo $result->PER_NOMBRE ?></td>
								<td><?php echo $result->USU_NOMBRE ?></td>
								<td><?php echo $result->USU_APELLIDO ?></td>
								<td><?php echo $result->USU_CEDULA ?></td>
								<td><?php echo $result->USU_CELULAR ?></td>
								<td><?php echo $result->USU_CORREO ?></td>


								<td><?php
									if ($result->USU_ESTADO == 1) {

										echo '<p class="text-white bg-success">Habilitado</p>';
									} else {
										echo '<p class="text-white bg-danger">Desabilitado</p>';
									}
									?>


								</td>
								<td><?php echo $result->USE_FEC_CRE ?></td>
								<td>
								
									<?php 
									$datetime1 = date_create(date('Y-m-d' , strtotime($result->USE_FEC_CRE)));
									$datetime2 = date_create(date( 'Y-m-d' ));
									$interval = date_diff($datetime1, $datetime2);
									$tiempo=array();
									foreach ($interval as $valor){
										$tiempo[]=$valor;
									}
									echo $tiempo[2] . " Dias "  ;
									echo $tiempo[1] . " Meses "  ;
									echo $tiempo[0] . " Años "  ;
									
									?>


								</td>

								<td><?php echo anchor('User_controller/edit_user/' . $result->ID_USUARIO, ' ', ['class' => 'btn btn-info btn-sm fas fa-edit']); ?>
									<?php echo anchor('User_controller/delete_user/' . $result->ID_USUARIO, '  ', ['class' => 'btn btn-info btn-sm fas fa-trash']); ?>

								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">

			<time class="timeago" datetime="2019-11-29 9:00:00"></time>
		</div>
	</div>
</div>
</div>

</div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		$(".timeago").timeago();
	});
</script>