<style>
    .my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
    }
    
    .table-wrapper-scroll-y {
        display: block;
    }
    
    .my-custom-scrollbar-product {
        position: relative;
        height: 550px;
        overflow: auto;
    }
    
    .o {
        height: 80px;
    }
    
    .caja {
        height: 65px;
        text-align: center;
    }
    
    .scrollable {
        height: 400px;
        overflow-y: scroll;
    }
    
    .size {
        width: 330px;
    }
    
    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
    }
    
    div.scrollmenu a {
        display: inline-block;
        color: black;
        text-align: left;
        padding: 14px;
    }
</style>
<div class="container">
    <div class="modal fade" id="modal_cobrar">

        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Facturacion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" onclick="consumidorFinal()" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            consumidor final
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" onclick="consumidorDatos()" >
                                        <label class="form-check-label" for="exampleRadios2">
                                            Con datos
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" id="nombre_cliente" placeholder="nombre">
                                </div>

                                <div class="col">
                                <input type="text" class="form-control form-control-sm" id="cedula_cliente" placeholder="cedula" onBlur="buscarCliente(this)" onKeyPress="return soloNumeros(event)">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="sucursal">Direccion</label>
                            <input type="text" class="form-control form-control-sm" id="direccion_cliente" placeholder="direccion">
                            <label for="sucursal">Telefono</label>
                            <input type="text" class="form-control form-control-sm" id="telefono_cliente" placeholder="telefono" onKeyPress="return soloNumeros(event)">

                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">TOTAL</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="fac_total" disabled>
                            </div>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Pago Cliente</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="fac_pago_cliente" onfocusout="calculoVuelto()">
                            </div>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Vuelto</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="fac_vuelto" disabled>
                            </div>

                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="cobrar()">Cobrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_abrir_gaveta">

<div class="modal-dialog">
    <div class="modal-content">
        <form>
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaveta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                    
                    <div class="row">
                        <div class="col">
                        Motivo
                        <div class="form-group">
                        
                        <select class="form-control" id="motivo_caja">
                            <option value="INGRESO" selected >INGRESO</option>
                            <option value="EGRESO">EGRESO</option>
                            
                        </select>
                        </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        Descripcion
                            <textarea class="form-control" id="descripcion_caja" rows="3" placeholder="Descripcion"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        Monto
                            <input type="text" class="form-control form-control-sm" id="monto_caja" placeholder="Monto" onKeyPress="return filterFloat(event,this);">
                        </div>
                    </div>

                
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="abrirGaveta()">Abrir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>
</div>

    <div class="row">
        <div class="col-6">
        <div class="row">
            Buscar:<input type="text" class="form-control-sm" name="buscar_producto" id="buscar_producto" onkeyup="buscarProductoNombre()">
        </div>
            Categoria
            <?=$lista_categoria?>
                <br>
                <div id="lista_productos">
                    <?=$lista_productos?>
                </div>

        </div>
        <div class="col-6">
            <!--h4 align="center">Detalle de Venta</h4-->

            <div id="verTotalDetalle">
                <div><i class="fas fa-barcode"></i>
                    <input class="form-control-sm" type="text" id="cod_barra"></input>
                    <button type="button" class="btn btn-primary btn-sm fas fa-plus" onclick="agregarCodBarra()"></button>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table class="table table-bordered table-striped mb-0" id="tabla_descripcion">
                        <thead>
                            <tr>
                                <th scope="col" id="id_producto" style="display:none">id</th>
                                <th scope="col">P</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Cant</th>
                                <th scope="col">Pu</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>

            </div>
            <div>
                <table class="table" id="tabla_total">
                    <tbody>
                        <tr class='size'>
                            <td>Subtotal</td>
                            <td id="cant_subtotal">0</td>
                        </tr>
                        <tr>
                            <td>12%</td>
                            <td id="cant_iva">0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td id="cant_total">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div id="log"></div>
                <div class="col-7">
                    <div id="verTeclado" class="teclado">
                        <div class="container-fluid">
                            <div class="row">
                                <!--div class="col-1 p-1"></div-->
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(7)"><strong>7</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(8)"><strong>8</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(9)"><strong>9</strong></button>
                                </div>
                                <!--div class="col-2 p-1"></div-->

                                <!--div class="col-1 p-1"></div-->
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(4)"><strong>4</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(5)"><strong>5</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(6)"><strong>6</strong></button>
                                </div>
                                <!--div class="col-2 p-1"></div-->

                                <!--div class="col-1 p-1"></div-->
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(1)"><strong>1</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(2)"><strong>2</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(3)"><strong>3</strong></button>
                                </div>
                                <!--div class="col-2 p-1"></div-->

                                <!--div class="col-1 p-1"></div-->
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block numerico btn-outline-dark" onclick="numero(0)"><strong>0</strong></button>
                                </div>
                                <div class="col-4 p-1">
                                </div>
                                <div class="col-4 p-1">
                                    <button type="button" class="btn btn-block  ce btn-outline-dark" onclick="ce()"><strong>CE</strong></button>
                                </div>
                                <!--div class="col-2 p-1"></div-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <!--div class="form-group custom-control-inline" id="divCodigoBarras">
								<label for="txtBuscaProducto"><i class="fas fa-barcode"></i></label>
								<input type="text" class="form-control form-control-sm mx-2" id="txtBuscaProducto" onKeyUp="buscaProducto()">

							</div-->

                    <font size="+2" color="#F80307">
								<input type="hidden" size="1" id="cant_num" value="0">
								<div id="cantidad">0</div>
							</font>
                    <div>
                        <div class="row">
                            <div class='col-6'>
                                <button type="button" class="btn btn-success caja" onclick="cobrarView()">Cobrar</button>
                            </div>
                            <div class='col-6'>
                                <button type="button" class="btn btn-warning caja" onclick="abrirGavetaView()">Abrir Gaveta</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class='col-6'>
                                <button type="button" class="btn btn-success caja" onclick="nuevaFactura()">Nueva Factura</button>
                            </div>
                            <div class='col-6'>
                                <button type="button" class="btn btn-dark caja" onclick="abrirCajaView()">Cierre Caja</button>
                            </div>

                        </div>

                    </div>

                    <!--button id="b1" type="button" class="btn btn-sm btn-block btn-warning" onClick="myFunc(valores)">Cobro parcial</button-->

                </div>
            </div>

        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    consumidorFinal();
});
</script>