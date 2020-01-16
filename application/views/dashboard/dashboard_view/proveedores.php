<div class="modal fade" id="modal_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-edit-proveedor">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="prove_id" id="prove_id">
                    <div class="p-2">
                        Empresa: <input class="form-control p-2" placeholder="nombre de la empresa" type="text" name="prove_empresa_edit" id="prove_empresa_edit"></input>

                    </div>
                    <div class="p-2">
                        Representante:<input class="form-control p-2" placeholder="Nombre Representante" type="text" name="prove_representante_edit" id="prove_representante_edit"></input>

                    </div>
                    <div class="p-2">
                        Cedula:<input class="form-control p-2" placeholder="Cedula" type="text" name="prove_cedula_edit" id="prove_cedula_edit"></input>

                    </div>
                    <div class="p-2">
                        Email<input class="form-control p-2" placeholder="Email" type="text" name='prove_email_edit' id='prove_email_edit'></input>

                    </div>
                    <div class="p-2">
                        Direccion:<input class="form-control p-2" placeholder="Direccion" type="text" name="prove_direccion_edit" id="prove_direccion_edit"></input>

                    </div>
                    <div class="p-2">
                        Celular:<input class="form-control p-2" placeholder="Celular" type="text" name="prove_celular_edit" id="prove_celular_edit"></input>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-2">
            <div class="card">
                <div class="card-header">
                    Ingreso de proveedores
                </div>
                <div class="card-body">
                    <form id='form_proveedor'>
                        <div class="row">

                            <div class="col p-2">
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="nombre de la empresa" type="text" name="prove_empresa"></input>

                                </div>
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="Nombre Representante" type="text" name="prove_representante"></input>

                                </div>
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="Cedula" type="text" name="prove_cedula"></input>

                                </div>
                            </div>
                            <div class="col p-2">
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="Email" type="text" name='prove_email'></input>

                                </div>
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="Direccion" type="text" name="prove_direccion"></input>

                                </div>
                                <div class="p-2">
                                    <input class="form-control p-2" placeholder="Celular" type="text" name="prove_celular"></input>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Agregar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 p-2">
            <div class="card">
                <div class="card-header">
                    Tabla de proveedores
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Empresa</th>
                                    <th>Representante</th>
                                    <th>Cedula</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($proveedores->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?= $row->PRV_PEMPRESA ?></td>
                                        <td><?= $row->PRV_NOMBRES ?></td>
                                        <td><?= $row->PRV_CEDULA ?></td>
                                        <td><?= $row->PRV_TELEFONO ?></td>
                                        <td><?= $row->PRV_EMAIL ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editProveedor(<?= $row->PRV_ID ?>)"></button>
                                            <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="deleteProveedor(<?= $row->PRV_ID ?>)"></button>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form_proveedor').on('submit', function(e) {
            $.ajax({
                url: "<?php echo base_url('Proveedores_controller/addproveedor'); ?>",
                type: "post",
                //dataType:'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {


                    swal.fire("Correcto!", "", "Proveedor agregado");

                },
                error: function(e) {
                    swal.fire("ERROR!", "", "Ingreso de proveedor");
                }
            });


        });
        $('#form-edit-proveedor').on('submit', function(e) {
            $.ajax({
                url: "<?php echo base_url('Proveedores_controller/editproveedor'); ?>",
                type: "post",
                //dataType:'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {


                    swal.fire("Correcto!", "", "Proveedor editado");

                },
                error: function(e) {
                    swal.fire("ERROR!", "", "Editar proveedor");
                }
            });


        });
    });

    function deleteProveedor(id) {
        Swal.fire({
            title: 'Estas seguro?',
            text: "Se eliminara todo del proveedor!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "<?php echo base_url('Proveedores_controller/deleteProveedor'); ?>",
                    data: {
                        'id': id
                    },
                    success: function(res) {
                        console.log(res);
                        Swal.fire(
                            'Eliminado!',
                            'Registro eliminado.',
                            'success'
                        );
                        location.reload();
                    },
                    error: function(err) {
                        alert('error, obtener proveedor');
                    }
                });

            }
        })
    }

    function editProveedor(id) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo base_url('Proveedores_controller/getProveedor'); ?>",
            data: {
                'id': id
            },
            success: function(res) {
                document.getElementById("prove_empresa_edit").value = res[0]['PRV_PEMPRESA'];
                document.getElementById("prove_representante_edit").value = res[0]['PRV_NOMBRES'];
                document.getElementById("prove_direccion_edit").value = res[0]['PRV_DIRECCION'];
                document.getElementById("prove_cedula_edit").value = res[0]['PRV_CEDULA'];
                document.getElementById("prove_celular_edit").value = res[0]['PRV_TELEFONO'];
                document.getElementById("prove_email_edit").value = res[0]['PRV_EMAIL'];
                document.getElementById("prove_id").value = res[0]['PRV_ID'];
                $('#modal_proveedor').modal('toggle');
                $('#modal_proveedor').modal('show');
                console.log(res)
            },
            error: function(err) {
                alert('error, obtener proveedor');
            }
        });
    }
</script>