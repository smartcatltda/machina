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