<div class="container-fluid">
<div class="card-body">
              <div class="table-responsive">
   
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
      <th>Categoria</th>
        <th>Producto</th>
        <th>Codigo de Barra</th>
        <th>Stock</th>
        <th>Precio A</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php $i =1;
            foreach ($data1 as $result){?>

              <tr>
              <td><?php echo $result->CAT_NOMBRE ?></td>
                <td><?php echo $result->PRO_NOMBRE ?></td>
                <td><?php echo $result->PRO_CODBARRA ?></td>
                <td><?php echo $result->PRO_STOCK ?></td>
                <td><?php echo $result->PRO_PRECIOA ?></td>
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