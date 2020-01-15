<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<style type="text/css">
.allcaps {
font-variant: small-caps;
text-transform: uppercase;
}
</style>



  <div class="container">
    <div class="col col-lg-6">
      <div class="shadow p-3 mb-5 bg-white rounded">
        <h3>Reporte ventas por usuario</h3>
        <hr>
        <form action="<?php echo base_url('Cierre_controller/list_cierre_ventas2');?>" method="POST">
          <input class="datepicker" data-date-format="mm/dd/yyyy" value="<?php echo date('Y/m/d')?>" name="fecha">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
            </div>
            <select class="custom-select" id="user" name="user" required>
                <option selected>Seleccione ..</option>
                <?php $i =1;
 						foreach ($data1 as $result){?>
                <option value="<?php echo $result->ID_USUARIO ?>"><?php echo strtoupper($result->USU_NOMBRE) ?> <?php echo strtoupper($result->USU_APELLIDO) ?></option>
          
                <?php } ?>
            </select>
            </div>
          <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
      </div>
    </div>
  </div>





    <script>
        
    // $.fn.datepicker.defaults.format = "yyyy/mm/dd";
$('.datepicker').datepicker({
    format: 'yyyy/mm/dd',
    startDate: '-3d'
});
    </script>
</body>
</html>








