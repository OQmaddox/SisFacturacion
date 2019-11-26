
<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
	<link href="<?php echo base_url('assets/fact/css/bootstrap.css');?>" rel="stylesheet" type="text/css"> 
	<!--<link href="css/bootstrap.css" rel="stylesheet" /> -->
	<style>@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: 'Bree Serif', serif;
 	 									}
  	</style>
		<div class="container">
			<div class="row">
            
		<div class="col-xs-6">
			<h1><a href="#"><img alt="" src="<?php echo base_url('assets/img/elite.png');?>" with="150px" height="180px"/></a></h1>
		</div>
		<div class="col-xs-6 text-right">
							<div class="panel panel-default">
							<div class="panel-heading">
									
									<h4>AUTORIZACI&Oacute;N : 
										<a href="#">000000000001.</a>
									</h4>
							</div>
							<div class="panel-body">
								<h4>FACTURA : 
										<a href="#"><?php echo $data1->ID_FACTURA?></a>
								</h4>
							</div>
						</div>
					</div>
 
			<hr />
 
			
				<h1 style="text-align: center;">FACTURA</h1> 
			
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Quito, <a href="#"><?php echo $data1->FAC_FECHA?></a>
									
									</h4>
								</div>
						<div class="panel-body">
						
							
								<h4>Cliente :  
									<a href="#"><?php echo $data1->CLI_NOMBRE ?> <?php echo $data1->CLI_APELLIDO ?></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									CI/RUC :
									<a href="#"><?php echo $data1->CLI_CEDULA?></a>
								</h4>
								<h4>Dirección :  
									<a href="#"><?php echo $data1->CLI_DIRECCION ?></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
								</h4>
								<h4>Celular :
									<a href="#">0<?php echo $data1->CLI_TELEFONO?></a>
								</h4>
					
						</div>
						</div>
					</div>
					
				</div>
<pre></pre>
<table class="table table-bordered">
	<thead >
		<tr >
			<th style="text-align: center;">
				<h4>Cantidad</h4>
			</th>
			<th style="text-align: center;">
				<h4>Concepto</h4>
			</th>
			<th style="text-align: center;">
				<h4>Precio unitario</h4>
			</th>
			<th style="text-align: center;">
				<h4>Total</h4>
			</th>
			
		</tr>
	</thead>
	<tbody>
	
 
   <?php $sum=0; $i =1;
				 foreach ($data2 as $result2){?>
						
		<tr>
			<td style="text-align: center;"><?php echo $result2->MOV_CANT ?></td>
			<td><a href="#"><?php echo $result2->PRO_NOMBRE?></a></td>
			<td class=" text-right "><?php echo $result2->MOV_VALOR ?></td>
			<td class=" text-right "><?php echo $result2->MOV_TOTAL ?></td> 
			<?php $sum=$result2->MOV_TOTAL+$sum?>
		</tr>
		<?php } ?>
		<tr>
			<td>&nbsp;</td>
			<td><a href="#"> &nbsp; </a></td>
			<td class="text-right">&nbsp;</td>
			<td class="text-right ">&nbsp;</td>
			
		</tr>
		<tr >			
			<td colspan="3" style="text-align: right;">IVA 12 %.</td>
			<td style="text-align: right;"><a href="#" >$ <?php echo round(($sum*0.012),2); ?> </a></td>		
		</tr>
		<tr >			
			<td colspan="3" style="text-align: right;">SUB TOTAL.</td>
			<td style="text-align: right;"><a href="#" >$<?php echo round(($sum-($sum*0.012)),2); ?> </a></td>		
		</tr>
		<tr >
			<td colspan="3" style="text-align: right;">Total USD.</td>
			<td style="text-align: right;"><a href="#" ><?php echo $sum; ?></a></td>
			
			
		</tr>
		<!--<tr >
			<td colspan="4" style="text-align: right;">Son: <a href="#"> Veintiocho mil quinientos </a> 00/100 bolivianos</td>

		</tr>-->
		
	</tbody>
</table>
<pre></pre>
		

	<div class="row">
			<div class="col-xs-4">
				<h1><a href=" "><img alt="" src="<?php echo base_url('assets/fact/image/qr.png');?>" /></a></h1>
			</div>
			<div class="col-xs-8">
			
				<div class="panel panel-info"  style="text-align: right;">
					<h6> "LA ALTERACI&Oacute;N, FALSIFICACI&Oacute;N O COMERCIALIZACI&Oacute;N ILEGAL DE ESTE DOCUMENTO ESTA PENADO POR LA LEY"</h6>
				</div>
			
		</div>
	</div>
		
</div>
</div>

</head>
<body>
	
</body>
</html>