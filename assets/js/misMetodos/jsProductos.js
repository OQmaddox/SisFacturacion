function validation_categoria() {
    categoria_nombre = $("#categoria_nombre").val();
    categoria_descripcion = $("#categoria_descripcion").val();

    if (categoria_nombre.trim() == '') {
        $('#categoria_nombre').focus();
        return false;
    } else {
        $.ajax({ 
            type: 'POST',
            url: 'Producto_controller/guardarCategoria',
            data: {
                'categoria_nombre': categoria_nombre, 'categoria_descripcion': categoria_descripcion
            },
            success: function (res) {
                //alerta de correcto
                
                $('#modal_add_categoria').modal('hide');
                

                swal.fire({
                    title: "Ingreso correcto categoria!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1500

                });
                $('#tabla_categoria').html(res);
                document.getElementById('categoria_nombre').value='';
                document.getElementById('categoria_descripcion').value='';
                

                

            }, error: function () {
                swal.fire("ERROR!", "EROOR!", "error");
            }
        });
    }
}
//validar productos
function validation_producto() {
    id_categoria = $("#id_categoria").val();
    nombre_producto = $("#nombre_producto").val();
    codbarra_producto = $("#codbarra_producto").val();
    precio_producto_a = $("#precio_producto_a").val();
    precio_producto_b = $("#precio_producto_b").val();
    precio_producto_c = $("#precio_producto_c").val();
    impuesto_producto = $("#impuesto_producto").val();
    stockm_producto = $("#stockm_producto").val();
    stock_producto = $("#stock_producto").val();
    estado_producto = document.getElementById("estado_producto").checked;
    descripcion_producto = $("#descripcion_producto").val();
    if (estado_producto) {
        estado_producto = 1;
    } else {
        estado_producto = 0;
    }

    if (nombre_producto.trim() == '') {
        $('#nombre_producto').focus();
        return false;
    } else if (precio_producto_a.trim() == '') {
        $('#precio_producto_a').focus();
        return false;
    } else if (precio_producto_b.trim() == '') {
        $('#precio_producto_b').focus();
        return false;
    } else if (precio_producto_c.trim() == '') {
        $('#precio_producto_c').focus();
        return false;
    } else if (impuesto_producto.trim() == '') {
        $('#impuesto_producto').focus();
        return false;
    } else if (stockm_producto.trim() == '') {
        $('#stockm_producto').focus();
        return false;
    } else if (stock_producto.trim() == '') {
        $('#stock_producto').focus();
        return false;
    }  else {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'Producto_controller/guardarProducto',
            data: {
                'id_categoria': id_categoria,
                'nombre_producto': nombre_producto,
                'codbarra_producto': codbarra_producto,
                'precio_producto_a': precio_producto_a,
                'precio_producto_b': precio_producto_b,
                'precio_producto_c': precio_producto_c,
                'impuesto_producto': impuesto_producto,
                'stockm_producto': stockm_producto,
                'stock_producto': stock_producto,
                'estado_producto': estado_producto,
                'descripcion_producto': descripcion_producto
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_add_producto').modal('hide');

                swal.fire({
                    title: "Ingreso correcto!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1500
                   
                });
                $('#tabla_producto').html(res.code);
                $('#nom_categoria').html(res.nombre_categoria);


            }, error: function () {
                swal.fire("ERROR!", "insertar producto!", "error");
            }
        });
    }
}
//ver productos
function verProductos(id_categoria) {

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/llamarTablaProductos',
        data: {
            'id_categoria': id_categoria
        },
        success: function (res) {
            //alerta de correcto
            
            
            document.getElementById("tabla_producto").innerHTML=res.code;
            $('#nom_categoria').html(res.nombre_categoria);
            document.getElementById('id_categoria').value = id_categoria;


        }
    });

}
//eliminar producto
function deleteProducto(id_producto) {
    id_categoria = $("#id_categoria").val();
    swal.fire({
        title: "Esta seguro?",
        text: "De eliminar el producto!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!'
    })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'Producto_controller/deleteProducto',
                    data: { 'id_producto': id_producto, 'id_categoria': id_categoria },
                    success: function (res) {

                        $('#tabla_producto').html(res.code);
                        $('#nom_categoria').html(res.nombre_categoria);
                        document.getElementById('id_categoria').value = id_categoria;
                        
                        $("#tabla_sucursales").load(" #tabla_sucursales");






                    }
                });
                swal.fire({
                    title: "El producto fue eliminado!",
                    type: "success",

                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
}
//abrir model editar producto
function editProductoModel(id_producto) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/buscarProducto',
        data: { 'id_producto': id_producto },
        success: function (res) {


            document.getElementById('id_producto').value = res.id_producto;
            document.getElementById('nombre_producto_edit').value = res.pro_nombre;
            document.getElementById('codbarra_producto_edit').value = res.pro_codbarra;
            document.getElementById('impuesto_producto_edit').value = res.pro_impuesto;
            document.getElementById('stockm_producto_edit').value = res.pro_stockm;
            document.getElementById('stock_producto_edit').value = res.por_stock;
            document.getElementById('descripcion_producto_edit').value = res.pro_descripcion;
            document.getElementById('precio_producto_edit_a').value = res.pro_precio_a;
            document.getElementById('precio_producto_edit_b').value = res.pro_precio_b;
            document.getElementById('precio_producto_edit_c').value = res.pro_precio_c;
            
            $('#check_edit_product').prop('checked', res.pro_estado).change();



            $('#modal_edit_producto').modal('toggle');
            $('#modal_edit_producto').modal('show');

        },error: function(){
            console.log('error');
        }
    });
}
//validar edit productos
function validation_producto_edit() {
    id_categoria = $("#id_categoria").val();
    id_producto = $("#id_producto").val();

    nombre_producto = $("#nombre_producto_edit").val();
    codbarra_producto = $("#codbarra_producto_edit").val();
    precio_producto_a = $("#precio_producto_edit_a").val();
    precio_producto_b = $("#precio_producto_edit_b").val();
    precio_producto_c = $("#precio_producto_edit_c").val();
    impuesto_producto = $("#impuesto_producto_edit").val();
    stockm_producto = $("#stockm_producto_edit").val();
    stock_producto = $("#stock_producto_edit").val();
    estado_producto = document.getElementById("check_edit_product").checked;
    descripcion_producto = $("#descripcion_producto_edit").val();
    if (estado_producto) {
        estado_producto = 1;
    } else {
        estado_producto = 0;
    }
    /*alert(id_categoria + "-" + id_producto + "-" + nombre_producto + "-" + codbarra_producto + "-" + precio_producto + "-" +
        impuesto_producto + "-" + stock_producto + "-" + stockm_producto + "-" + estado_producto + "-" + descripcion_producto);*/

    if (nombre_producto.trim() == '') {
        $('#nombre_producto_edit').focus();
        return false;
    } else if (precio_producto_a.trim() == '') {
        $('#precio_producto_edit_a').focus();
        return false;
    } else if (precio_producto_b.trim() == '') {
        $('#precio_producto_edit_b').focus();
        return false;
    } else if (precio_producto_c.trim() == '') {
        $('#precio_producto_edit_c').focus();
        return false;
    } else if (impuesto_producto.trim() == '') {
        $('#impuesto_producto_edit').focus();
        return false;
    } else if (stockm_producto.trim() == '') {
        $('#stockm_producto_edit').focus();
        return false;
    } else if (stock_producto.trim() == '') {
        $('#stock_producto_edit').focus();
        return false;
    }  else {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'Producto_controller/editProducto',
            data: {
                'id_producto': id_producto,
                'id_categoria': id_categoria,
                'nombre_producto': nombre_producto,
                'codbarra_producto': codbarra_producto,
                'precio_producto_a': precio_producto_a,
                'precio_producto_b': precio_producto_b,
                'precio_producto_c': precio_producto_c,
                'impuesto_producto': impuesto_producto,
                'stockm_producto': stockm_producto,
                'stock_producto': stock_producto,
                'estado_producto': estado_producto,
                'descripcion_producto': descripcion_producto
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_edit_producto').modal('hide');

                swal.fire({
                    title: "Edicion correcto!",
                    type: "success",

                    showConfirmButton: false,
                    timer: 1500
                });
                $('#tabla_producto').html(res.code);
                $('#nom_categoria').html(res.nombre_categoria);


            }, error: function () {
                swal.fire("ERROR UPDATE!", "You clicked the button!", "error");
            }
        });
    }
}

//abrir model editar categoria
function editCategoriaModel(id_categoria) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/buscarCategoria',
        data: { 'id_categoria': id_categoria },
        success: function (res) {

            document.getElementById('id_categoria_edit').value = res.id_categoria;
            document.getElementById('categoria_nombre_edit').value = res.cat_nombre;
            document.getElementById('categoria_descripcion_edit').value = res.cat_descripcion;

            $('#modal_edit_categoria').modal('toggle');
            $('#modal_edit_categoria').modal('show');

        }
    });
}
//validacuion categoria edit
function validation_categoria_edit() {
    id_categoria = $("#id_categoria_edit").val();
    categoria_nombre = $("#categoria_nombre_edit").val();
    categoria_descripcion = $("#categoria_descripcion_edit").val();

    
    if (categoria_nombre.trim() == '') {
        $('#categoria_nombre').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: 'Producto_controller/editCategoria',
            data: {
                'categoria_nombre': categoria_nombre, 'categoria_descripcion': categoria_descripcion,'id_categoria':id_categoria
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_edit_categoria').modal('hide');

                swal.fire({
                    title: "Edicion correcta!",
                    type: "success",

                    showConfirmButton: false,
                    timer: 1500
                });
                $('#tabla_categoria').html(res);


            }, error: function () {
                swal.fire("ERROR!", "You clicked the button!", "error");
            }
        });
    }
}
//eliminar categoria
function deleteCategoria(id_categoria) {
    //id_categoria = $("#id_categoria").val();
    
    swal.fire({
        title: "Esta seguro?",
        text: "De eliminar la categoria!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!'
    })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'Producto_controller/deleteCategoria',
                    data: { 'id_categoria': id_categoria },
                    success: function (res) {
                        
                        //$('#nom_categoria').html(res.nombre_categoria);
                        //document.getElementById('id_categoria').value = id_categoria;
                
                        $('#tabla_categoria').html(res.code);
                        $("#tabla_categoria").load(" #tabla_categoria");

                    },error:function(res){
                        alert(res);
                    }
                });
                swal.fire({
                    title: "La categoria fue eliminada!",
                    type: "success",

                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
}
//validacion para no repetir el codigo de barra
function unicoBarCode(){
    codbarra = $("#codbarra_producto").val();
    
    $.ajax({
        type: 'POST',
        url: 'Producto_controller/verificarCodBarra',
        data: {
             'codbarra': codbarra
             },
        success: function (res) {
            if(res){
                swal.fire({
                    title: "El codigo ya existe!",
                    type: "warning",

                    showConfirmButton: false,
                    timer: 1500
                });
                
                document.getElementById('codbarra_producto').value='';
            }else{
                
            }
            //$('#nom_categoria').html(res.nombre_categoria);
            //document.getElementById('id_categoria').value = id_categoria;
    
           

        },error:function(res){
            alert('error');
        }
    });

}