<div class="container">
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
                                    <input type="text" class="form-control" id="num_stock" onKeyPress="return soloNumeros(event)" placeholder="0">

                                </div>

                            </div>

                        </div>

                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="validationStock('<?=base_url()?>')">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <h3>Tabla general Inventario</h3>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Nombre

                </th>
                <th class="th-sm">Codigo

                </th>
                <th class="th-sm">Cantidad

                </th>
                <th class="th-sm">Valor

                </th>
                <th class="th-sm">
                    Accion
                </th>

            </tr>
        </thead>
        <tbody id="tabal_general_stock">
            <?php
            foreach ($tabla_productos->result() as $pro) {
            ?>
                <tr>
                    <td><?= $pro->PRO_NOMBRE ?></td>
                    <td><?= $pro->PRO_CODBARRA ?></td>
                    <td><?= $pro->PRO_STOCK ?></td>
                    <td>$<?= $pro->PRO_PRECIOA ?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editStockModel(<?= $pro->ID_PRODUCTO ?>,'<?=base_url()?>')"></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>
<script src="<?=base_url()?>assets/js/misMetodos/jsStock.js"></script>
<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>