<div class="container-fluid">
  <div class="shadow p-3 mb-5 bg-white rounded">
    <h3>Facturas</h3>
  <p>Escriba algo en el campo de entrada para buscar :</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div class="table-responsive ">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
      
        <th>#</th>
        <th>USUARIO</th>
        <th>NOMBRE CLIENTE</th>
        <th>FECHA</th>
        <th>TOTAL FACTURA</th>
        <th width="10">VER DETALLES</th>
        <th width="10">IMPRIMIR</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php $i =1;
            foreach ($data1 as $result1){?>

              <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $result1->USU_NOMBRE ?></td>
                <td><?php echo $result1->CLI_NOMBRE ?></td>
                <td><?php echo $result1->FAC_FECHA ?></td>
                <td><?= '$'?><?php echo $result1->FAC_TOTAL ?></td> 
               
                <td><button class="btn btn-info" onClick="window.open('<?=base_url()?>Cierre_controller/r_detalle_fac/<?php echo $result1->factura_id?>', '_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=30,left=500,width=600,height=650');" ><i class="fas fa-edit"></i></button>
                 </td>
                <td><a class="btn btn-success" onClick="window.open('<?=base_url()?>Cierre_controller/r_detalle_impr/<?php echo $result1->factura_id?>', '_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=500,width=200,height=400');" ><i class="fas fa-print"></i></a>
                 </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
  </div>
</div>
</div>




<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</body>
</html>