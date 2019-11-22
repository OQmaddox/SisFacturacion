<div class="container">
    <!-- The Modal -->

    <div class="modal fade" id="modal_add_categoria">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title">Agregar Categoría o linea</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="sucursal">Nombre de Categoría o linea</label>
                            <input type="email" class="form-control" id="categoria_nombre" placeholder="nombre de categoria">

                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="sucursal">Descripcion</label>
                            <input type="email" class="form-control" id="categoria_descripcion" placeholder="descripcion">

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="validation_categoria()">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <!--Editar categoria-->
    <div class="modal fade" id="modal_edit_categoria"> 
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title">Editar Categoria o linea</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <input type="hidden" id="id_categoria_edit"></input>

                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="sucursal">Nombre de Categoria o linea</label>
                            <input type="email" class="form-control" id="categoria_nombre_edit" placeholder="nombre de categoria">

                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="sucursal">Descripcion</label>
                            <input type="email" class="form-control" id="categoria_descripcion_edit" placeholder="descripcion">

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="validation_categoria_edit()">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal producto-->

    <div class="modal fade" id="modal_add_producto">
        <div class="modal-dialog ">
            <div class="modal-content">
                <input type="hidden" class="form-control" id="id_categoria" >
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar nuevo producto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" id="nombre_producto">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cod Barra</span>
                            </div>
                            <input type="text" class="form-control" id="codbarra_producto" onKeyPress="return soloNumeros(event)" onfocusout="unicoBarCode()">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio A</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_a" onKeyPress="return filterFloat(event,this);">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio B</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_b" onKeyPress="return filterFloat(event,this);">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio C</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_c" onKeyPress="return filterFloat(event,this);">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Impuesto</span>
                            </div>
                            <input type="text" class="form-control" id="impuesto_producto" onKeyPress="return soloNumeros(event)">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock minimo</span>
                            </div>
                            <input type="text" class="form-control" id="stockm_producto" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock</span>
                            </div>
                            <input type="text" class="form-control" id="stock_producto" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="form-group">
                            <label for="sucursal">Estado</label>
                            <input type="checkbox" data-toggle="toggle" data-on="on" checked data-off="off" data-onstyle="success" data-offstyle="danger" id="estado_producto">
                            
                            
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="sucursal">Descripcion</label>
                            <textarea class="form-control" id="descripcion_producto" rows="3" placeholder="direccion de la sucursal"></textarea>
                            

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="validation_producto()">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>



    
    <!-- The Modal edit producto-->

    <div class="modal fade" id="modal_edit_producto">
        <div class="modal-dialog ">
            <div class="modal-content">
                <input type="hidden" class="form-control" id="id_categoria" >
                <input type="hidden" class="form-control" id="id_producto" >
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">editar producto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" id="nombre_producto_edit">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cod Barra</span>
                            </div>
                            <input type="text" class="form-control" id="codbarra_producto_edit" onKeyPress="return soloNumeros(event)" disabled>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio A</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_edit_a" onKeyPress="return filterFloat(event,this);">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio B</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_edit_b" onKeyPress="return filterFloat(event,this);">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio C</span>
                            </div>
                            <input type="text" class="form-control" id="precio_producto_edit_c" onKeyPress="return filterFloat(event,this);">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Impuesto</span>
                            </div>
                            <input type="text" class="form-control" id="impuesto_producto_edit" onKeyPress="return soloNumeros(event)">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock minimo</span>
                            </div>
                            <input type="text" class="form-control" id="stockm_producto_edit" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock</span>
                            </div>
                            <input type="text" class="form-control" id="stock_producto_edit" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="form-group">
                            <label for="sucursal">Estado</label>
                            <input id="check_edit_product" type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger">


                            
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="sucursal">Descripcion</label>
                            <textarea class="form-control" id="descripcion_producto_edit" rows="3" placeholder="direccion de la sucursal"></textarea>
                            

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="validation_producto_edit()">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-4 col-sm-push-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nueva Categoria</h5>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_categoria">Nueva Categoria</button>
                    <div id="tabla_categoria">
                        <?=$tabla_categoria?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categoria: <div id="nom_categoria"></div></h5>
                    
                    <div id="tabla_producto">        
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</div>
<script>
    function myFunction() {
  /*var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
}*/
$("#myInput").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#table_body tr").filter(function() {
  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
}
</script>
