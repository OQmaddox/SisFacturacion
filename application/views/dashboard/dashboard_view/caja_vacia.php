<div class="modal fade" id="modal_abrir_caja">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apertura caja</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="hidden" class="form-control" id="id_producto">
        <input type="hidden" class="form-control" id="id_categoria">
        <form role="form">
            <div class="form-group">
                <label for="sucursal">Valor</label>
                <input type="text" class="form-control" id="apertura_caja_valor" onKeyPress="return filterFloat(event,this);">
                
            </div>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success"  onclick="validarCaja()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
    $('#modal_abrir_caja').modal('toggle');
    $('#modal_abrir_caja').modal('show');
});
function validarCaja(){
    monto_caja = $("#apertura_caja_valor").val();
    if (monto_caja.trim() == '') {
        $('#apertura_caja_valor').focus();
        return false;
    }else{
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/reguistroInicioCaja',
            data: {
                'monto_caja': monto_caja
            },
            success: function (res) {
                //abrir caja
                window.location.href = "Caja_controller";



            }, error: function () {
                swal("ERROR!", "", "error");
            }
        });
    }
    
    
}
</script>