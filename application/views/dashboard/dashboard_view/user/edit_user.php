 <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<?php $arr=[];
	foreach ($data as $value){
		$arr = $value;
	}
?>
<div class="container">
	<div class="col col-lg-6">
	<div class="shadow p-3 mb-5 bg-white rounded">	
			<form action="<?php echo base_url('User_controller/update_user/'.$arr->tb_usuario_id);?>" method="POST" >
			<fieldset>	
				<h3>Editar Usuario</h3>
			<hr>
				<h6>Perfil</h6>

				<select required class="form-control" name="perfiln" value="<?= set_value('perfil');?>" disabled>

					<option value="<?= $arr->tb_perfiles_id?>"><?= $arr->PER_NOMBRE?></option>
					<?php foreach ($result['tb_perfiles'] as $value){
						$id = $value->ID_PERFIL;
						$name1 = $value->PER_NOMBRE; ?>
						<option value="<?php echo $id?>"><?php echo $name1?></option>
					<?php }?>			
				</select>

				<input type="hidden" class="form-control" placeholder="perfil" name="perfil" value="<?= $arr->tb_perfiles_id?>" >
			
				 <?= form_error('perfil');?>
			
				<hr>
				<h6>Cédula</h6>
				<input type="text" class="form-control" placeholder="Cedula" name="cedula" value="<?= $arr->USU_CEDULA?>" required readonly>
				 <?= form_error('cedula');?>
				 <h6>Nombres</h6>
				<input type="text" class="form-control" placeholder="Nombres" name="nombres" value="<?= $arr->USU_NOMBRE?>" required readonly>
				<?= form_error('nombres');?>
				<h6>Apellidos</h6>
				<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="<?= $arr->USU_APELLIDO?>" required readonly>
				<?= form_error('apellidos');?>
				
				<h6>Genero</h6>

				<select required class="form-control" name="genero" disabled>	

					<option value="<?= $arr->USU_GENERO?>"><?php 
					if ($arr->USU_GENERO == "H") {
						echo "Hombre";
					} else {
						echo "Mujer";
					}
					
					?></option>
					<option value="H">Hombre</option>
					<option value="M">Mujer</option>
				</select>

				<input type="hidden" class="form-control" placeholder="genero" name="genero" value="<?= $arr->USU_GENERO?>" >
			
				 <?= form_error('genero');?>
				

				
				<input type="text" class="form-control" placeholder="Celular" name="celular" value="<?= $arr->USU_CELULAR?>" required readonly>
				<?= form_error('celular');?>
				<hr>
				<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h6>Correo</h6>
				<input type="email" class="form-control" placeholder="Correro" name="correo" value="<?= $arr->USU_CORREO?>" required>
				<?= form_error('correo');?>
				<h6>Contraseña</h6>
				<input type="password" class="form-control" placeholder="Contraseña" name="contraseña" value="<?= md5($arr->USU_PASSWORD)?>"><?= form_error('contraseña');?><hr>
				</div>

				<h6>Estado del Usuario </h6>
				<label class="switch" >
					<input id="check" type="checkbox" name="estado" onclick="combo()" 
					<?php 
					if ($arr->USU_ESTADO == 1) {
						echo " checked";
						//echo " value='0' ";
					} else  {
						echo " ";
						//echo " value='1' ";
					}
					?>
					>
					<span class="slider round"></span>
				</label><hr>
				<input id="demo" type="hidden" name="est" value="<?= $arr->USU_ESTADO?>"></fieldset>
				
				

				<button type="submit" class="btn btn-primary">Editar</button>

				</fieldset>
			</form>
</div>
</div>
</div>
<script>
function combo() {
 
  var x = document.getElementById("check").checked;
  var esta;
  if (x==true) {
  	esta=1;
  	document.getElementById("demo").value = esta;
  }else{
  	esta=0;
  	document.getElementById("demo").value = esta;
  }
  
}
</script>