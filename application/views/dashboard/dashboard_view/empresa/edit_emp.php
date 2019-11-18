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
			<form action="<?php echo base_url('Empresa_controller/update_emp/'.$arr->ID_EMPRESA);?>" method="POST" >
			<fieldset>	
				<h3>Editar Empresa</h3>
			<hr>
				
				 <h6>EMPRESA</h6>
				<input type="text" class="form-control" placeholder="Nombres" name="nombre" value="<?= $arr->EMP_NOMBRE?>" required >
				
				<h6>ESTADO DE LA EMPRESA </h6>
				<label class="switch" >
					<input id="check" type="checkbox" name="estado" onclick="combo()" 
					<?php 
					if ($arr->EMP_ESTADO == 1) {
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
				<input id="demo" type="hidden" name="est" value="<?= $arr->EMP_ESTADO?>"></fieldset>
				
				

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