
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/fact/css/impr.css');?>">
    <script src="<?php echo base_url('assets/fact/js/impr.js');?>"></script>
    <style>
p.dotted {border-style: dotted;} 
tr.dotted {border-style: dotted;}
tr.dashed {border-style: dashed;}
tr.solid {border-style: solid;}
tr.double {border-style: double;}
tr.groove {border-style: groove;}
tr.ridge {border-style: ridge;}
tr.inset {border-style: inset;}
tr.outset {border-style: outset;}
tr.none {border-style: none;}
td.none {border-style: none;}
tr.hidden {border-style: hidden;}
tr.mix {border-style: dotted dashed solid double;}
</style>
</head>

<body><p class="centrado">
<button class="oculto-impresion" onclick="imprimir()">Imprimir</button></p>
    <div class="ticket">
         <p class="centrado"><?php echo $data1->CLI_NOMBRE ?> <?php echo $data1->CLI_APELLIDO ?>
            <br><?php echo $data1->CLI_CEDULA?>
			<br><?php echo $data1->CLI_DIRECCION ?>
			<br>0<?php echo $data1->CLI_TELEFONO?>
            <br>Quito, <?php echo $data1->FAC_FECHA?></p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">PROD.</th>
                
					<th class="total">Tot</th>
                </tr>
            </thead>
            <tbody>
			<?php $sum=0; $i =1;
				 foreach ($data2 as $result2){?>
                <tr>
                    <td class="cantidad"><?php echo $result2->MOV_CANT ?></td>
                    <td class="producto"><?php echo $result2->PRO_NOMBRE?></td>
                    
					<td class="total"><?php echo $result2->MOV_TOTAL ?></td>
                </tr>
                <?php $sum=$result2->MOV_TOTAL+$sum?> 
			<?php } ?>  
            <tr class="none">
                    <td class="cantidad"></td>
                    <td class="producto">SUB TOTAL.</td>
                   
                    <td class="total">$<?php echo round(($sum-($sum*0.012)),2); ?></td>
            </tr>
            <tr class="none">
                    <td class="none"></td>
                    <td class="none">IVA 12 %.</td>
                   
                    <td class="none">$<?php echo round(($sum*0.012),2); ?></td>
            </tr> 
            <tr class="none">
                    <td class="none"></td>
                    <td class="none">TOTAL.</td>
                    
                    <td class="none">$<?php echo $sum; ?></td>
            </tr class="none">  
            </tbody>
        </table>
        <p class="dotted"><p class="centrado">¡GRACIAS POR SU COMPRA!
            <br></p></p>
    </div>
   
</body>

</html>