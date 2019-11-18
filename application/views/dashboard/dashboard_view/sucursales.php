
<!-- modal agregar sucursal-->
<div class="container">
    <!-- The Modal -->
  
  <div class="modal fade" id="modal_add_sucursal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Sucursal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form role="form">
            <div class="form-group">
                <label for="sucursal">Nombre de la sucursal</label>
                <input type="email" class="form-control" id="sucursal_nombre" placeholder="nombre de la sucursal">
                
            </div>
            <div class="form-group">
                <label for="sucursal">Direccion</label>
                <textarea class="form-control" id="sucursal_direccion" rows="3" placeholder="direccion de la sucursal"></textarea>

            </div>
            <div class="form-group">
                <label for="sucursal">Telefono</label>
                <input type="text" class="form-control" id="sucursal_telefono" placeholder="Telefono de sucursal" onKeyPress="return soloNumeros(event)">
                
            </div>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success"  onclick="validation()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>
  
<!-- Modal editar -->
  <div class="modal fade" id="modal_edit_sucursal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Sucursal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="form-group">
                <label for="sucursal">Nombre de la sucursal</label>
                <input type="email" class="form-control" id="sucursal_nombre_edit" placeholder="nombre de la sucursal">
                
            </div>
            <div class="form-group">
                <label for="sucursal">Direccion</label>
                <textarea class="form-control" id="sucursal_direccion_edit" rows="3" placeholder="direccion de la sucursal"></textarea>

            </div>
            <div class="form-group">
                <label for="sucursal">Telefono</label>
                <input type="email" class="form-control" id="sucursal_telefono_edit" placeholder="Telefono de sucursal" onKeyPress="return soloNumeros(event)">
                <input type="hidden" class="form-control" id="id_sucursal_edit" placeholder="Telefono de sucursal">
            </div>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success" id='btnsave_sucursal' onclick="editSucursal()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  
</div>
<!--Fin del modal agregar sucursal-->
  <!-- The Modal confirmar-->
  <div class="modal fade" id="modal_confirmar">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Desea elimiar la sucursal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <input type="hidden" style="width:350px;" class="form-control" id="id_sucursal">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="deleteSucursal()">Si </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>


<div class="container-fluid">
    <span class="float-left"><h1>Tabla de Sucursales</h1></span>
    <span class="float-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_sucursal">Agregar Sucursal</button>
    </span>
</div>
<div class="container-fluid">
    <div id="tabla_sucursales">
        <?=$tabla_sucursales?>
    </div>
</div>
