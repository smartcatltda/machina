$(document).ready(function () {
    $("#conectar").button().click(function () {
        conectar();
    });
    $("#bthome").button().click(function () {
        home();
    });
    $("#btusuarios").button().click(function () {
        usuarios();
    });
    $("#btcaja").button().click(function () {
        caja();
    });
    $("#btestadisticas").button().click(function () {
        estadisticas();
    });
    $("#salir").button().click(function () {
        salir();
    });
    $("#bthomec").button().click(function () {
        homec();
    });
    $("#btcajac").button().click(function () {
        cajac();
    });
    $("#btestadisticasc").button().click(function () {
        estadisticasc();
    });
    $("#salirc").button().click(function () {
        salir();
    });
    $("#admin").tabs();
    $("#cajero").tabs();
    verificalogin();

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

function conectar()
{
    var user = $("#user").val();
    var pass = $("#pass").val();

    if (user != '' && pass != '')
    {
        $.post(base_url + "controlador/conectar",
                {user: user, pass: pass},
        function (datos)
        {
            if (datos.valor == 0)
            {
                $("#msg01").hide();
                $("#msg01").html("<label>" + datos.mensaje + "</label>");
                $("#msg01").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            }
            else
            {
                $("#login").hide('fast');
                $("#contenido").show('fast');
                $("#nombrelogin").html('<label>Usted está conectado al sistema como "' + datos.user + '".</label>');

                if (datos.permiso == 1)
                {
                    $("#menucajero").hide('fast');
                    $("#menuadmin").show('fast');
                    $("#cajero").hide('fast');
                    $("#admin").show('fast');
                    home();
                }
                else
                {
                    $("#menucajero").show('fast');
                    $("#menuadmin").hide('fast');
                    $("#admin").hide('fast');
                    $("#cajero").show('fast');
                    homec();
                }
            }
        },
                'json'
                );
    }
    else
    {
        $("#msg01").hide();
        $("#msg01").html("<label>Debe ingresar usuario y contraseña.</label>");
        $("#msg01").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

function verificalogin()
{
    $.post(
            base_url + "controlador/verificalogin",
            {},
            function (datos)
            {
                if (datos.valor == 0)
                {
                    $("#contenido").hide();
                    $("#menucajero").hide();
                    $("#menuadmin").hide();
                    $("#login").show('fast');
                }
                else
                {
                    $("#login").hide('fast');
                    $("#contenido").show('fast');
                    $("#nombrelogin").html('<label>Usted está conectado al sistema como "' + datos.user + '".</label>');

                    if (datos.permiso == 1)
                    {
                        $("#menucajero").hide('fast');
                        $("#menuadmin").show('fast');
                        $("#cajero").hide('fast');
                        $("#admin").show('fast');
                        home();
                    }
                    else
                    {
                        $("#menuadmin").hide('fast');
                        $("#menucajero").show('fast');
                        $("#admin").hide('fast');
                        $("#cajero").show('fast');
                        homec();
                    }
                }
            },
            'json'
            );
}

function salir()
{
    $.post(base_url + "controlador/salir",
            {},
            function (datos)
            {
                if (datos.valor == 0)
                {
                    $("#contenido").hide('fast');
                    $("#menuadmin").hide();
                    $("#menucajero").hide();
                    $("#login").show('fast');
                    $("#user").val("");
                    $("#pass").val("");
                    $("#nombrelogin").html('<label>' + "" + '</label>');
                }
            },
            'json'
            );
}

function home()
{
    $("#usuarios").hide('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#home").show('fast');
}
function usuarios()
{
    $("#home").hide('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#usuarios").show('fast');
}
function caja()
{
    $("#home").hide('fast');
    $("#usuarios").hide('fast');
    $("#estadisticas").hide('fast');
    $("#caja").show('fast');
}
function estadisticas()
{
    $("#home").hide('fast');
    $("#caja").hide('fast');
    $("#usuarios").hide('fast');
    $("#estadisticas").show('fast');
}
function homec()
{
    $("#cajac").hide('fast');
    $("#estadisticasc").hide('fast');
    $("#homec").show('fast');
}
function cajac()
{
    $("#homec").hide('fast');
    $("#estadisticasc").hide('fast');
    $("#cajac").show('fast');
}
function estadisticasc()
{
    $("#homec").hide('fast');
    $("#cajac").hide('fast');
    $("#estadisticasc").show('fast');
}

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