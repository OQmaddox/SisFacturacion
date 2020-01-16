<div class="container-fluid">
	<div class="col col-lg-9">
		<div class="shadow p-4 mb-6 bg-white rounded">
			<form id='form_add_pregunta' enctype="multipart/form-data" method="POST">
				<h4>Agregar Empresa</h4>


				<hr>
				<h6>NOMBRE EMPRESA</h6>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Nombre empresa" name="nombre" required>
				</div>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Ruc de la empresa" name="ruc" required>
				</div>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Direccion de la empresa" name="direccion" required>
				</div>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Telefono de la empresa" name="telefono" required>
				</div>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Ciudad de la empresa" name="ciudad" required>
				</div>
				<div class="p-2">
					<input type="text" class="form-control" placeholder="Correo de la empresa" name="correo" required>
				</div>
				
				<hr>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon01">LOGO</span>
					</div>

					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" name="inputGroupFile01" lang="es" aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Seleccionar archivo</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>

		</div>
	</div>

</div>
<script>
	$(document).ready(function() {
		$('#form_add_pregunta').on('submit', function(e) {
			e.preventDefault();

			$.ajax({
				url: "<?php echo base_url('Empresa_controller/insert_emp'); ?>",
				type: "post",
				//dataType:'json',
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					if (data) {
						window.location = "<?php echo base_url('Empresa_controller/') ?>";
					}



				},
				error: function(e) {
					console.log('error');
					console.log(e);
				}
			});

		});
	});
</script>