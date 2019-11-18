function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key == 8))
    
}
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}
function validation() {
    sucursal_nombre = $("#sucursal_nombre").val();
    sucursal_direccion = $("#sucursal_direccion").val();
    sucursal_telefono = $("#sucursal_telefono").val();
    if (sucursal_nombre.trim() == '') {
        $('#sucursal_nombre').focus();
        return false;
    } else if (sucursal_direccion.trim() == '') {
        $('#sucursal_direccion').focus();
        return false;
    }
    else if (sucursal_telefono.trim() == '') {
        $('#sucursal_telefono').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: 'Sucursales_controller/guardarSucursal',
            data: {
                'sucursal_nombre': sucursal_nombre, 'sucursal_direccion': sucursal_direccion,
                'sucursal_telefono': sucursal_telefono
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_add_sucursal').modal('hide');

                swal.fire({
                    title: "Ingreso correcto!",
                    icon: "success",

                    confirmButtonText: "<span><i class='la la-headphones'></i><span>I am game!</span></span>",
                    confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",

                    showCancelButton: true,
                    cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                    cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
                });
                $('#tabla_sucursales').html(res);


            }
        });
    }
}

function deleteSucursal(id_sucursal) {
    swal.fire({
        title: "Esta seguro?",
        text: "De eliminar la sucursal!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: 'Sucursales_controller/deleteSucursal',
                    data: { 'id_sucursal': id_sucursal },
                    success: function (res) {

                        $('#tabla_sucursales').html(res);
                        swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        $("#tabla_sucursales").load(" #tabla_sucursales");






                    }
                });
                swal.fire("La sucursal fue eliminada!", {
                    icon: "success",
                });
            }
        });
}

function editSucursalModel(id_sucursal) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'Sucursales_controller/buscarSucursal',
        data: { 'id_sucursal': id_sucursal },
        success: function (res) {
            //alert(res);
            document.getElementById('id_sucursal_edit').value = res.ID_SUCURSAL;
            document.getElementById('sucursal_nombre_edit').value = res.SUC_NOMBRE;
            document.getElementById('sucursal_direccion_edit').value = res.SUC_DIRECCION;
            document.getElementById('sucursal_telefono_edit').value = res.SUC_TELEFONO;
            $('#modal_edit_sucursal').modal('toggle');
            $('#modal_edit_sucursal').modal('show');

        }
    });
}
//editar sucursal
function editSucursal() {
    id_sucursal = $("#id_sucursal_edit").val();
    sucursal_nombre = $("#sucursal_nombre_edit").val();
    sucursal_direccion = $("#sucursal_direccion_edit").val();
    sucursal_telefono = $("#sucursal_telefono_edit").val();
    if (sucursal_nombre.trim() == '') {
        $('#sucursal_nombre_edit').focus();
        return false;
    } else if (sucursal_direccion.trim() == '') {
        $('#sucursal_direccion_edit').focus();
        return false;
    }
    else if (sucursal_telefono.trim() == '') {
        $('#sucursal_telefono_edit').focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'Sucursales_controller/editSucursal',
            data: {
                'sucursal_nombre': sucursal_nombre, 'sucursal_direccion': sucursal_direccion,
                'sucursal_telefono': sucursal_telefono, 'id_sucursal': id_sucursal
            },
            success: function (res) {
                //alerta de correcto
                $('#modal_edit_sucursal').modal('hide');
                if (res.estado) {
                    swal.fire({
                        title: "Edicion correcta!",
                        icon: "success",

                        confirmButtonText: "<span><i class='la la-headphones'></i><span>I am game!</span></span>",
                        confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",

                        showCancelButton: true,
                        cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                        cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
                    });
                } else {
                    swal.fire("ERROR!", "You clicked the button!", "error");
                }

                $('#tabla_sucursales').html(res.code);


            }, error: function () {
                swal.fire("ERROR!", "You clicked the button!", "error");
            }
        });
    }


}
