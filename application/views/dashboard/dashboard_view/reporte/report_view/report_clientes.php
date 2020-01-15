<div class="container mt-3">
  <div class="shadow p-3 mb-5 bg-white rounded">
  <h3>Reporte Clientes</h3>
  <p>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br> 
  <div class="table-responsive ">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Nombre</th>
   
        <th>Cedula</th>
        <th>Telefono</th>
        <th>Direccion</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php $i =1;
            foreach ($data1 as $result){?>

              <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $result->CLI_NOMBRE ?></td>
     
                <td><?php echo $result->CLI_CEDULA ?></td>
                <td><?php echo $result->CLI_TELEFONO ?></td>
                <td><?php echo $result->CLI_DIRECCION ?></td>
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