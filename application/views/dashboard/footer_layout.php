
    </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>
    <!-- page-content" -->
        </div>
        <div>
        <div class="modal fade" id="modal_cierre_caja">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cierre caja</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="hidden" class="form-control" id="id_producto">
        <input type="hidden" class="form-control" id="id_categoria">
        <form role="form">
            <div class="form-group">
                <label for="sucursal">Fecha</label>
                <input type="text" class="form-control" id="cierre_caja_fecha" disabled>
                
            </div>
            <div class="form-group">
                <label for="sucursal">Saldo</label>
                <input type="text" class="form-control" id="cierre_caja_saldo" disabled>
                
            </div>
            <div class="form-group">
                <label for="sucursal">Valor</label>
                <input type="text" class="form-control" id="cierre_caja_valor" onKeyPress="return filterFloat(event,this);">
                
            </div>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success"  onclick="validarCierreCaja()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>

<div>
        <div class="modal fade" id="modal_cierre_caja_2">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cierre caja</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="hidden" class="form-control" id="id_producto">
        <input type="hidden" class="form-control" id="id_categoria">
        <form role="form">
            <div class="form-group">
                <label for="sucursal">Fecha</label>
                <input type="text" class="form-control" id="cierre_caja_fecha_2" disabled>
                
            </div>
            <div class="form-group">
                <label for="sucursal">Saldo</label>
                <input type="text" class="form-control" id="cierre_caja_saldo_2" disabled>
                
            </div>
            <div class="form-group">
                <label for="sucursal">Valor</label>
                <input type="text" class="form-control" id="cierre_caja_valor_2" onKeyPress="return filterFloat(event,this);">
                
            </div>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success"  onclick="validarCierreCaja_2()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>

        </div>

</main>   
    </div> 
  
</body>

    
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>assets_dash/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_dash/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_dash/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_dash/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets_dash/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets_dash/js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url()?>assets_dash/js/demo/chart-pie-demo.js"></script>

   <!-- Page level plugins -->
   <script src="<?=base_url()?>assets_dash/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets_dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets_dash/js/demo/datatables-demo.js"></script>


    <script src="<?=base_url()?>assets/js/bootstrap-toggle.js"></script>

    
    
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/misMetodos/jsSucursales.js"></script>
    <script src="<?=base_url()?>assets/js/misMetodos/jsProductos.js"></script>
    <script src="<?=base_url()?>assets/js/misMetodos/jsCaja.js"></script>



   
    
</html>