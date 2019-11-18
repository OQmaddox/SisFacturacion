<div class="container-fluid">
	<div class="col col-lg-9">
		<div class="shadow p-4 mb-6 bg-white rounded">
			<form action="<?php echo base_url('User_controller/insert_user');?>" method="POST">
				<h4>Agregar Usuario</h4>

				<h6>Empresa</h6>
				<select required class="form-control" name="empresa" value="" >
					<option value="">--Seleccione una empresa--</option>
					<?php foreach ($result2['tb_empresa'] as $value1){
						$id_emp = $value1->ID_EMPRESA; 
						$name_emp = $value1->EMP_NOMBRE; ?>
						<option value="<?php echo $id_emp?>"><?php echo $name_emp?></option>
					<?php }?>			
				</select>
				<h6>Perfil</h6>
				<select required class="form-control" name="perfil" value="<?= set_value('perfil');?>">
					<option value="">--Seleccione un perfil--</option>
					<?php foreach ($result['tb_perfiles'] as $value){
						$id = $value->ID_PERFIL; 

						$name1 = $value->PER_NOMBRE; ?>
						<option value="<?php echo $id?>"><?php echo $name1?></option>
					<?php }?>			
				</select>
				 <?= form_error('perfil');?>
				<hr>
				<input type="number" class="form-control" placeholder="Cèdula" name="cedula" value="<?= set_value('cedula');?>" required>
				 <?= form_error('cedula');?>
				<input type="text" class="form-control" placeholder="Nombres" name="nombres" value="<?= set_value('nombres');?>" required>
				<?= form_error('nombres');?>

				<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="<?= set_value('apellidos');?>" required> 
				<?= form_error('apellidos');?>
				
				<h6>Genero</h6>
				<select required class="form-control" name="genero">	<option value="">--Seleccione un genero--</option>

					<option value="H">Hombre</option>
					<option value="M">Mujer</option>
				</select>
				 <?= form_error('genero');?>
				
				<input type="number" class="form-control" placeholder="Celular" name="celular" value="<?= set_value('celular');?>" required>
				<?= form_error('celular');?>
				<hr>
				<input type="email" class="form-control" placeholder="Correo" name="correo" value="<?= set_value('correo');?>" required>
				<?= form_error('correo');?>
				<input type="password" class="form-control" placeholder="Contraseña" name="contraseña" value="<?= set_value('contraseña');?>"required><hr>

				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>

</div>
</div>

</div>