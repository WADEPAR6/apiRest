$(document).ready(function(){
    cargarDatos();
    agregarDatos();
    editarDatos();
    eliminarDatos();
});

function cargarDatos() {
    $.ajax({
        url: 'http://localhost/quinto/controllers/apiRest.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            var tbody = $('#tablaEstudiantes tbody');
            tbody.empty();
            data.forEach(function(estudiante) {
                var row = $('<tr>');
                row.append($('<td>').text(estudiante.cedula));
                row.append($('<td>').text(estudiante.nombre));
                row.append($('<td>').text(estudiante.apellido));
                row.append($('<td>').text(estudiante.direccion));
                row.append($('<td>').text(estudiante.telefono));
                tbody.append(row);
            });
        },
        error: function(textStatus, errorThrown){
            console.log("Error: " + textStatus + ", " + errorThrown);
        }
    });
}


function agregarDatos() {
    $("#Agregar").click(function(){
        var cedula = $('#a_cedula').val();
        var nombre = $('#a_nombre').val();
        var apellido = $('#a_apellido').val();
        var direccion = $('#a_direccion').val();
        var telefono = $('#a_telefono').val();
    
        $.ajax({
            url: 'http://localhost/quinto/controllers/apiRest.php',
            type: 'POST',
            data: {
                cedula: cedula,
                nombre: nombre,
                apellido: apellido,
                direccion: direccion,
                telefono: telefono
                
            },
            success: function(){
                cargarDatos();
            },
            error: function(textStatus, errorThrown){
                console.log("Error: " + textStatus + ", " + errorThrown);
            }
        });
    });
}



function editarDatos() {
    $("#Editar").click(function(){
        var cedula = $('#e_cedula').val();
        var nombre = $('#e_nombre').val();
        var apellido = $('#e_apellido').val();
        var direccion = $('#e_direccion').val();
        var telefono = $('#e_telefono').val();
    
        $.ajax({
            url: 'http://localhost/quinto/controllers/apiRest.php',
            type: 'POST',
            data: {
                _method: 'PUT',
                cedula: cedula,
                nombre: nombre,
                apellido: apellido,
                direccion: direccion,
                telefono: telefono
            },
            success: function(){
                cargarDatos();
            },
            error: function(textStatus, errorThrown){
                console.log("Error: " + textStatus + ", " + errorThrown);
            }
        });
    });
}



function eliminarDatos() {
    $("#Eliminar").click(function(){
        var cedula = $('#el_cedula').val();
    
        $.ajax({
            url: 'http://localhost/quinto/controllers/apiRest.php?cedula=' + cedula,
            type: 'DELETE',
            success: function(){
                cargarDatos();
            },
            error: function(textStatus, errorThrown){
                console.log("Error: " + textStatus + ", " + errorThrown);
            }
        });
    });
}

