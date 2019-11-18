<div class="container-fluid">
	<div class="col col-lg-9">
		<div class="shadow p-4 mb-6 bg-white rounded">
			<form action="<?php echo base_url('Empresa_controller/insert_emp');?>" method="POST">
				<h4>Agregar Empresa</h4> 
				
				
				<hr>
				<h6>NOMBRE EMPRESA</h6>
				<input type="text" class="form-control" placeholder="Ingrese empresa" name="nombre"  required>
				<hr>
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddon01">LOGO</span>
				</div>
				
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">Seleccionar archivo</label>
				</div>
				</div>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>

</div>
</div>

</div>