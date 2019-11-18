
function numero(numero) {
    dato = document.getElementById("cantidad").innerHTML;
    canti = document.getElementById("cant_num").value;

    if (canti == "0") {

        $('#cantidad').text(numero);
        //alert(numero);
        document.getElementById("cant_num").value = numero;
    } else {
        //alert('salop');
        $('#cantidad').text(dato + '' + numero);
        document.getElementById("cant_num").value = dato + '' + numero;
    }

}

function ce() {
    $('#cantidad').html("0");
    document.getElementById("cant_num").value = 0;
}
function calculoProducto(id_producto) {

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/buscarProducto',
        data: { 'id_producto': id_producto },
        success: function (res) {

            canti = document.getElementById("cant_num").value;
            valor = res.pro_precio
            subtotal = canti * valor;
            //agregar a la tabla;
            if (!verificarRepetidos(res.id_producto, res.pro_nombre, canti, subtotal)) {
                agregarFila(res.id_producto, res.pro_nombre, canti, subtotal, valor);
                sumarFilas();
            }
            ce();


        }
    });

}

function agregarFila(id, nombre, cantidad, subtotal, valor) {
    var table = document.getElementById("tabla_descripcion");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    subtotal = parseFloat(subtotal);
    cell1.innerHTML = id;
    cell2.innerHTML = nombre;
    cell3.innerHTML = cantidad; 
    cell4.innerHTML = valor;
    cell5.innerHTML = subtotal.toFixed(2);
    cell3.contentEditable=true;
    cell3.addEventListener('keypress', soloNumeros);
    cell3.addEventListener('keyup',function(event){
        
        nuevaCantidad=parseInt(this.innerText);
        subtotal=nuevaCantidad*valor;
        cell5.innerHTML = subtotal.toFixed(2);
        sumarFilas();
        
    });
    cell6.innerHTML = '<button class="btn btn-primary btn-sm fas fa-minus" id="ok"  onclick="eliminarProductoLista(this,' + subtotal + ')"/>';
    valoresTotales(subtotal);


}
//comprobar repetidos

function verificarRepetidos(id, nombre, cantidad, subtotal) {

    if (document.getElementById('tabla_descripcion').rows.length > 1) {
        var textos = '';
        for (var i = 1; i < document.getElementById('tabla_descripcion').rows.length; i++) {
            if (document.getElementById('tabla_descripcion').rows[i].cells[0].innerHTML == id) {
                val_subtotal = document.getElementById('tabla_descripcion').rows[i].cells[4].innerHTML;
                val_cant = document.getElementById('tabla_descripcion').rows[i].cells[2].innerHTML;
                val_subtotal = parseFloat(val_subtotal);
                subtotal = parseFloat(subtotal);

                valoresTotales(subtotal);

                subtotal = subtotal + val_subtotal;
                cantidad = parseFloat(cantidad) + parseFloat(val_cant);
                document.getElementById('tabla_descripcion').rows[i].cells[4].innerHTML = subtotal.toFixed(2);
                document.getElementById('tabla_descripcion').rows[i].cells[2].innerHTML = cantidad;
                document.getElementById('tabla_descripcion').rows[i].cells[5].innerHTML = '<button class="btn btn-primary btn-sm fas fa-minus" id="ok"  onclick="eliminarProductoLista(this,' + subtotal + ')"/>';
                sumarFilas();

                return true;
            }

        }
        return false;

    }


}
//eliminar lista productos
function eliminarProductoLista(t, sub) {

    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    sub = parseFloat(sub);
    sub = sub.toFixed(2);
    valoresTotales(-sub);

    table.removeChild(tr);
    sumarFilas();


}
//calcular los valores totales de la factura
function valoresTotales(valor) {
    var cant_subtotal = document.getElementById("cant_total").innerText;
    cant_subtotal = parseFloat(cant_subtotal);
    valor = parseFloat(valor);
    cant_subtotal = cant_subtotal + valor;
    cant_total = cant_subtotal - (cant_subtotal * 0.12);
    var cant_iva = document.getElementById("cant_iva");

    document.getElementById("cant_total").innerText = cant_subtotal.toFixed(2);
    document.getElementById("cant_subtotal").innerText = cant_total.toFixed(2);
    document.getElementById("cant_iva").innerText = (cant_subtotal * 0.12).toFixed(2);




}
//agregar producto por codigo de barras
function agregarCodBarra() {
    var cod_barra = document.getElementById("cod_barra").value;
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Producto_controller/buscarProductoCodBarra',
        data: { 'cod_barra': cod_barra },
        success: function (res) {

            canti = document.getElementById("cant_num").value;
            valor = res.pro_precio
            subtotal = canti * valor;
            //agregar a la tabla;
            if (!verificarRepetidos(res.id_producto, res.pro_nombre, canti, subtotal)) {
                agregarFila(res.id_producto, res.pro_nombre, canti, subtotal, valor);
                sumarFilas();
            }
            ce();
            document.getElementById("cod_barra").value = "";

        },error:function(e){
            
            Swal.fire({
                position: 'top-end',
                type: 'info',
                title: 'El producto no existe',
                showConfirmButton: false,
                timer: 1500
              })
        }
    });


}
//buscar productos por categoria
function verListaProductos(id_categoria) {
    if (id_categoria == 0) {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/cargarProductosVistaPorCategoria',
            data: {
                'id_categoria': id_categoria
            },
            success: function (res) {
                //alerta de correcto
                $('#lista_productos').html(res);



            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });

    } else {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/cargarProductosVistaPorCategoria',
            data: {
                'id_categoria': id_categoria
            },
            success: function (res) {
                //alerta de correcto
                $('#lista_productos').html(res);



            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });
    }


}
//metodo para abri modelo cobrara
function cobrarView() {
    total = document.getElementById("cant_total").innerText;
    document.getElementById("fac_total").value = total;
    if (parseFloat(total) > 0) {
        $('#modal_cobrar').modal('toggle');
        $('#modal_cobrar').modal('show');
    } else {
        swal.fire("Ingrese productos!", "", "error");
    }

}

function consumidorFinal() {
    document.getElementById("nombre_cliente").value = 'consumidor final';
    document.getElementById("cedula_cliente").value = '9999999999';
    document.getElementById("telefono_cliente").value = '9999999999';
    document.getElementById("direccion_cliente").value = 'xxxxxxxxxxxxxxxx';

    $("#nombre_cliente").prop("disabled", true);
    $("#cedula_cliente").prop("disabled", true);
    $("#telefono_cliente").prop("disabled", true);
    $("#direccion_cliente").prop("disabled", true);
}
function consumidorDatos() {
    document.getElementById("nombre_cliente").value = '';
    document.getElementById("cedula_cliente").value = '';
    document.getElementById("telefono_cliente").value = '';
    document.getElementById("direccion_cliente").value = '';

    $("#nombre_cliente").prop("disabled", false);
    $("#cedula_cliente").prop("disabled", false);
    $("#telefono_cliente").prop("disabled", false);
    $("#direccion_cliente").prop("disabled", false);
}

//calculo del vuelto
function calculoVuelto() {
    var cant_cliente = document.getElementById("fac_pago_cliente").value;

    total = document.getElementById("fac_total").value;
    cant_cliente = parseFloat(cant_cliente);
    total = parseFloat(total);
    vuelto = cant_cliente - total;
    document.getElementById("fac_vuelto").value = vuelto.toFixed(2);
}

$.fn.delayPasteKeyUp = function (fn, ms) {
    var timer = 0;
    $(this).on("propertychange input", function () {
        clearTimeout(timer);
        timer = setTimeout(fn, ms);
    });
};
//metodo para cobrar
function cobrar() {
    var oTable = document.getElementById('tabla_descripcion');
    var total = document.getElementById('cant_total').innerText;
    var subtotal = document.getElementById('cant_subtotal').innerText;
    var arreglo = new Array();

    //gets rows of table
    var rowLength = oTable.rows.length;


    //loops through rows    
    for (i = 1; i < rowLength; i++) {
        var fila = [];
        //gets cells of current row  
        var oCells = oTable.rows.item(i).cells;

        //gets amount of cells of current row
        var cellLength = oCells.length;

        //loops through each cell in current row
        for (var j = 0; j < cellLength; j++) {

            // get your cell info here

            var cellVal = oCells.item(j).innerHTML;
            fila.push(cellVal);

        }
        arreglo.push(fila);
    }
    if (document.getElementById('exampleRadios2').checked) {
        cedula = document.getElementById('cedula_cliente').value;
        nombre = document.getElementById('nombre_cliente').value;
        direccion = document.getElementById('direccion_cliente').value;
        telefono = document.getElementById('telefono_cliente').value;
    } else {
        cedula = "9999999999";
        nombre = "consumidor final";
        direccion = "xxxxxxxxxxxxxxxxxxxx";
        telefono = "9999999999";
    }

    if (nombre.trim() == '') {
        $('#nombre_cliente').focus();
        return false;
    } else if (cedula.trim() == '') {
        $('#cedula_cliente').focus();
        return false;
    }
    else if (direccion.trim() == '') {
        $('#direccion_cliente').focus();
        return false;
    } else {
        //enviar datos por ajax
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/cobrarProductos',
            data: {
                'arreglo': arreglo,
                'total': total,
                'subtotal': subtotal,
                'cedula': cedula,
                'nombre': nombre,
                'direccion': direccion,
                'telefono': telefono
            },
            success: function (res) {
                //alerta de correcto

                $('#modal_cobrar').modal('hide');
                
                swal.fire({
                    title: "Venta exitosa! ",
                    type: "success",
                    html:
                    ', ' + 
                     '<iframe src="Cierre_controller/r_detalle_impr/'+res+'" width="200" height="320">  <p>Your browser does not support iframes.</p></iframe> ' +
                    '.',
                    
                    confirmButtonClass: "btn-success",
                    dangerMode: true,
                    closeOnClickOutside: false
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "Caja_controller";

                        }
                    });



            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });




    }



}

$(document).ready(function () {
    $("#cod2_barra").delayPasteKeyUp(function () {
        //$("#respuesta").append("Producto registrado: " + $("#ingreso").val() + "");
        agregarCodBarra();
        $("#cod2_barra").val("");

    }, 200);

});
//nueva factura
function nuevaFactura() {
    window.location.href = "Caja_controller";
}
//validar datos de factura
function validarFactura() {

    nombre_cliente = $("#nombre_cliente").val();
    cedula_cliente = $("#cedula_cliente").val();
    direccion_cliente = $("#direccion_cliente").val();

}
//abrir gaveta
function abrirGavetaView() {
    $('#modal_abrir_gaveta').modal('toggle');
    $('#modal_abrir_gaveta').modal('show');
}

function abrirGaveta() {
    motivo_caja = $("#motivo_caja").val();
    descripcion_caja = $("#descripcion_caja").val();
    monto_caja = $("#monto_caja").val();
    if (motivo_caja.trim() == '') {
        $('#motivo_caja').focus();
        return false;
    } else if (descripcion_caja.trim() == '') {
        $('#descripcion_caja').focus();
        return false;
    }
    else if (monto_caja.trim() == '') {
        $('#monto_caja').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/guardarAccionCaja',
            data: {
                'motivo_caja': motivo_caja,
                'descripcion_caja': descripcion_caja,
                'monto_caja': monto_caja,
            },
            success: function (res) {
                //abrir caja

                
                $('#modal_abrir_gaveta').modal('hide');
                document.getElementById("motivo_caja").value="";
                document.getElementById("descripcion_caja").value="";
                document.getElementById("monto_caja").value="";
                swal.fire("OK!", "", "sucess");


            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });
    }

}
function abrirCajaView() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Caja_controller/getDataCierre',
        data: {
        },
        success: function (res) {
            //abrir caja
            if (res.caja_estado) {
                document.getElementById("cierre_caja_fecha").value = res.fecha;
                document.getElementById("cierre_caja_saldo").value = res.apertura_v;
                $('#modal_cierre_caja').modal('toggle');
                $('#modal_cierre_caja').modal('show');
            }



        }, error: function () {
            swal.fire("ERROR Caja!", "", "error");
        }
    });


}
function validarCierreCaja() {
    valor_cierre = document.getElementById("cierre_caja_valor").value;
    if (valor_cierre.trim() == '') {
        $('#cierre_caja_valor').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/guardarDataCierre',
            data: {
                'valor': valor_cierre
            },
            success: function (res) {

                window.location.href = "Dashboard_controller";

            }, error: function () {
                swal.fire("ERROR Caja!", "", "error");
            }
        });
    }

}
$("#link").on('click', function () {
    
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url+'Caja_controller/getDataCierre',
        data: {
        },
        success: function (res) {
            //abrir caja
            
            if (res.caja_estado) {
                document.getElementById("cierre_caja_fecha_2").value = res.fecha;
                document.getElementById("cierre_caja_saldo_2").value = res.apertura_v;
                $('#modal_cierre_caja_2').modal('toggle');
                $('#modal_cierre_caja_2').modal('show');

            } else {
                window.location.href = base_url+"Login_controller/logout";
            }
            



        }, error: function () {
            swal.fire("ERROR: Cierre caja! 2", "", "error");
        }
    });

});

function validarCierreCaja_2() {
    valor_cierre = document.getElementById("cierre_caja_valor_2").value;
    
    if (valor_cierre.trim() == '') {
        $('#cierre_caja_valor_2').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: base_url+'Caja_controller/guardarDataCierre',
            data: {
                'valor': valor_cierre
            },
            success: function (res) {

                window.location.href = base_url+"Login_controller/logout";

            }, error: function () {
                
                swal.fire("ERROR Cierre caja!", "", "error");
            }
        });
    }

}
function sumarFilas(){
    total=0.0;
    total=parseFloat(total);  
    
    
    
    $('#tabla_descripcion').find('tr').each(function (i, el) {
        //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
        if(i>0){
            fil= parseFloat($(this).find('td').eq(4).text());
            total=total+fil;
        }
    });
    cant_subtotal = total;
    cant_total = cant_subtotal - (cant_subtotal * 0.12);
    var cant_iva = document.getElementById("cant_iva");

    document.getElementById("cant_total").innerText = cant_subtotal.toFixed(2);
    document.getElementById("cant_subtotal").innerText = cant_total.toFixed(2);
    document.getElementById("cant_iva").innerText = (cant_subtotal * 0.12).toFixed(2);
}
function buscarProductoNombre(){
    nombre=document.getElementById("buscar_producto").value;
    if (nombre.length >0) {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/buscarProductosNombre',
            data: {
                'nombre': nombre
            },
            success: function (res) {
                //alerta de correcto
                $('#lista_productos').html(res);



            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });

    } else {
        $.ajax({
            type: 'POST',
            url: 'Caja_controller/buscarProductosNombre',
            data: {
                'nombre': '-1'
            },
            success: function (res) {
                //alerta de correcto
                $('#lista_productos').html(res);



            }, error: function () {
                swal.fire("ERROR!", "", "error");
            }
        });
    }

}


function soloNumeros(e){
    var key = e.which;
  // Dígito código entre 48 y 57
  var isDigit = (d) => d >=48 && d<=57;
  // Punto código 46, sólo si no hay uno anterior
  var isValidSeparator = (d, current) => d===46 && current.indexOf('.') <0;
  if (!isDigit(key) && !isValidSeparator(key, $(this).val()))
    e.preventDefault();

  }

    //buscar cliente
function buscarCliente(){
    cedula=document.getElementById('cedula_cliente').value;
    
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'User_controller/getCliente',
        data: { 'cedula': cedula },
        success: function (res) {

            console.log(res);
            document.getElementById('nombre_cliente').value=res['nombre'];
            document.getElementById('direccion_cliente').value=res['direccion'];
            document.getElementById('telefono_cliente').value=res['telefono'];
            document.getElementById('fac_puntos_cliente').value=res['puntos'];
            document.getElementById('total_puntos').value=parseFloat(res['puntos'])+parseFloat(document.getElementById('fac_puntos').value);
        },error: function (err){
            //alert(err);
        }
    });

}
