function verProductosStock(id_categoria) {

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Stock_controller/llamarTablaProductos',
        data: {
            'id_categoria': id_categoria
        },
        success: function (res) {
            //alerta de correcto

            $('#tabla_producto').html(res.code);
            $('#nom_categoria').html(res.nombre_categoria);
           // document.getElementById('id_categoria').value = id_categoria;


        }
    });

}

function editStockModel(id_producto){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/buscarProducto',
        data: { 'id_producto': id_producto },
        success: function (res) {


            document.getElementById('id_producto').value = res.id_producto;
            document.getElementById('id_categoria').value = res.id_categoria;
            document.getElementById('producto_nombre').value = res.pro_nombre;
            document.getElementById('num_stock_actual').value =  res.por_stock;
            
            $('#modal_edit_stock').modal('toggle');
            $('#modal_edit_stock').modal('show');

        }
    });


}

function validationStock() {
    id_producto = $("#id_producto").val();
    id_categoria = $("#id_categoria").val();
    stock = $("#num_stock").val();

    if (stock.trim() == '') {
        $('#num_stock').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'Stock_controller/editStock',
            data: {
                'id_producto': id_producto,
                'stock': stock,
                'id_categoria':id_categoria
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_edit_stock').modal('hide');

                swal.fire({
                    title: "Ingreso correcto!",
                    type: "success"

                   
                });
                $('#tabla_producto').html(res.code);
                $('#nom_categoria').html(res.nombre_categoria);


            }, error: function () {
                swal.fire("ERROR UPDATE!", "You clicked the button!", "error");
            }
        });
    }
}