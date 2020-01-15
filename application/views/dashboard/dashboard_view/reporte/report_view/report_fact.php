<div class="container mt-3">
  <div class="shadow p-3 mb-5 bg-white rounded">
    <h3>Facturas</h3>
  <p>Escriba algo en el campo de entrada para buscar :</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
      
        <th>#</th>
        <th>USUARIO</th>
        <th>NOMBRE CLIENTE</th>
        <th>FECHA</th>
        <th>TOTAL FACTURA</th>
        <th>VER DETALLES</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php $i =1;
            foreach ($data1 as $result){?>

              <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $result->USU_NOMBRE ?></td>
                <td><?php echo $result->CLI_NOMBRE ?></td>
                <td><?php echo $result->FAC_FECHA ?></td>
                <td><?= '$'?><?php echo $result->FAC_TOTAL ?></td>
                <td><?php echo anchor('Report_controller/r_detalle/'.$result->factura_id,' ',['class'=>'btn btn-info btn-sm fas fa-edit']);?>

                  

            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
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

