$(document).ready(function () {

//MANTENEDOR DE USUARIOS
    mostrar_user();

    $("#btguardaruser").button().click(function () {
        guardar_user();
    });
    $("#btseleccionaruser").button().click(function () {
        seleccionar_user();

    });
    $("#bteditaruser").button().click(function () {
        editar_user();
    });
    $("#bteliminaruser").button().click(function () {
        eliminar_user();
    });
});

function mostrar_user()
{
    $.post(
            base_url + "controlador/mostrar_user",
            {},
            function (ruta, datos) {
                $("#lista_usuarios").hide();
                $("#lista_usuarios").html(ruta, datos);
                $("#lista_usuarios").show('slow');
            }
    );
}
function guardar_user()
{
    var user = $("#man_user").val();
    var pass = $("#man_pass").val();
    var nombre = $("#man_nombre").val();
    var apellido = $("#man_apellido").val();
    var tipo = $("#man_tipo").val();

    if (user != "" && pass != "" && nombre != "" && apellido != "" && tipo != "") {
        $.post(base_url + "controlador/guardar_user", {nombre: nombre, apellido: apellido,
            user: user, pass: pass, tipo: tipo},
        function (data) {
            $("#msj_man_user").hide();
            $("#msj_man_user").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                mostrar_user();
                $("#msj_man_user").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#man_nombre").val("");
                $("#man_apellido").val("");
                $("#man_user").val("");
                $("#man_pass").val("");
                $("#man_tipo").val("");
            } else {
                $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            }
        }, "json"
                );
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Faltan datos por ingresar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function  seleccionar_user()
{
    var user = $("#man_user").val();
    if (user != "") {
        $.post(base_url + "controlador/seleccionar_user", {user: user},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario No Registrado</label>");
                $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#man_user").val(datos.user);
                $("#man_pass").val(datos.pass);
                $("#man_tipo").val(datos.tipo);
                $("#man_nombre").val(datos.nombre);
                $("#man_apellido").val(datos.apellido);
            }
        }, "json"
                );
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Ingresar Usuario a Seleccionar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function editar_user()
{
    var nombre = $("#man_nombre").val();
    var apellido = $("#man_apellido").val();
    var user = $("#man_user").val();
    var pass = $("#man_pass").val();
    var tipo = $("#man_tipo").val();
    if (nombre != "" && apellido != "" && user != "" && pass != "," && tipo != "") {
        $.post(base_url + "controlador/modificar_user", {nombre: nombre, apellido: apellido, user: user, pass: pass, tipo: tipo},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario No Registrado</label>");
                $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario Modificado Correctamente</label>");
                $("#msj_man_user").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#man_nombre").val("");
                $("#man_apellido").val("");
                $("#man_user").val("");
                $("#man_pass").val("");
                $("#man_tipo").val("");
                mostrar_user();
            }
        }, "json"
                );
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Debe Selecciona un Usuario para Editar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function eliminar_user()
{
    var user = $("#man_user").val();
    if (user != "") {
        $.post(base_url + "controlador/eliminar_user", {user: user},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario No Registrado</label>");
                $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario Eliminado</label>");
                $("#msj_man_user").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#man_nombre").val("");
                $("#man_apellido").val("");
                $("#man_user").val("");
                $("#man_pass").val("");
                $("#man_tipo").val("");
                mostrar_user();
            }
        }, "json"
                );
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Seleccionar Usuario a Eliminar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}