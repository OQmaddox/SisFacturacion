<div class="container">
    <!-- The Modal -->
  
  <div class="modal fade" id="modal_edit_stock">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Producto Stock</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="hidden" class="form-control" id="id_producto">
        <input type="hidden" class="form-control" id="id_categoria">
        <form role="form">
            <div class="form-group">
                <label for="sucursal">Nombre de producto</label>
                <input type="text" class="form-control" id="producto_nombre" placeholder="nombre de la sucursal" disabled>
                
            </div>
            <div class="form-group">
                <label for="sucursal">Stock</label>
                <div class="row">
                <div class="col">
                <input type="text" class="form-control" id="num_stock_actual" disabled>
                </div>
                <div class="col">
                    <center>
                    <i class="fas fa-plus-square fa-3x"></i>
                    </center>
                </div>
                <div class="col">
                <input type="text" class="form-control" id="num_stock" onKeyPress="return soloNumeros(event)">
                
                </div>
    
                </div>
                
            </div>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-success"  onclick="validationStock()">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>
 
    <div class="row">
        <div class="col-sm-4 col-sm-push-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><p class="text-danger">Categorias</p></h5>
                    
                    <div id="tabla_categoria">
                        <?=$tabla_categoria?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><p class="text-danger">Productos</p> <div id="nom_categoria"></div></h5>
                    
                    <div id="tabla_producto">

                    </div>
                </div>
            </div>

      
        </div>    
    </div>
</div>

<script src="<?=base_url()?>assets/js/misMetodos/jsStock.js"></script>