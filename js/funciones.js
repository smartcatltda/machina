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
    $("#btmaquinas").button().click(function () {
        maquinas();
    });
    $("#btgastos").button().click(function () {
        gastos_adm();
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
    $("#btcierrecaja").button().click(function () {
        cierrecaja();
    });
    $("#salirc").button().click(function () {
        salir();
    });
    $("#admin").tabs();
    $("#cajero").tabs();
    verificalogin();
//MANTENEDOR DE USUARIOS
    validar_texto(event);
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
    //MANTENEDOR MAQUINAS
    mostrar_maquinas();
    cargar_maquinas();
    cargar_maquinas_activas();
    $("#btguardarmaquina").button().click(function () {
        guardar_maquina();
    });
    $("#btseleccionarmaquina").button().click(function () {
        seleccionar_maquina();
    });
    $("#bteditarmaquina").button().click(function () {
        editar_maquina();
    });
    $("#bteliminarmaquina").button().click(function () {
        eliminar_maquina();
    });
    //CAJA ADMIN
    $("#btregistrarkey").button().click(function () {

    });
    $("#btaumento").button().click(function () {

    });
    //MANTENEDOR GASTOS
    cargar_cat_gastos();
    cargar_gastos_activos();
    $("#btguardargasto").button().click(function () {
        guardar_cat_gasto();
    });
    $("#btseleccionargastos").button().click(function () {
        seleccionar_cat_gasto();
    });
    $("#bteditargastos").button().click(function () {
        editar_cat_gasto();
    });
    $("#bteliminargastos").button().click(function () {
        eliminar_cat_gasto();
    });
    //CAJA CAJERO
    $("#btingresarpago").button().click(function () {

    });
    $("#btregistrargasto").button().click(function () {

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
    $("#cat_gastos").hide('fast');
    $("#maquinas").hide('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#home").show('fast');
}
function usuarios()
{
    $("#home").hide('fast');
    $("#maquinas").hide('fast');
    $("#cat_gastos").hide('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#usuarios").show('fast');
}
function maquinas()
{
    $("#home").hide('fast');
    $("#maquinas").show('fast');
    $("#cat_gastos").hide('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#usuarios").hide('fast');
}
function gastos_adm()
{
    $("#home").hide('fast');
    $("#maquinas").hide('fast');
    $("#cat_gastos").show('fast');
    $("#caja").hide('fast');
    $("#estadisticas").hide('fast');
    $("#usuarios").hide('fast');
}
function caja()
{
    $("#home").hide('fast');
    $("#usuarios").hide('fast');
    $("#cat_gastos").hide('fast');
    $("#maquinas").hide('fast');
    $("#estadisticas").hide('fast');
    $("#caja").show('fast');
}
function estadisticas()
{
    $("#home").hide('fast');
    $("#caja").hide('fast');
    $("#cat_gastos").hide('fast');
    $("#usuarios").hide('fast');
    $("#maquinas").hide('fast');
    $("#estadisticas").show('fast');
}
function homec()
{
    $("#cajac").hide('fast');
    $("#cierrecaja").hide('fast');
    $("#homec").show('fast');
}
function cajac()
{
    $("#homec").hide('fast');
    $("#cierrecaja").hide('fast');
    $("#cajac").show('fast');
}
function cierrecaja()
{
    $("#homec").hide('fast');
    $("#cajac").hide('fast');
    $("#cierrecaja").show('fast');
}
//MANTENEDOR USUARIO
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
                $("#man_id").val(datos.id);
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
        $("#msj_man_user").html("<label>Debe Ingresar el Nombre del Usuario a Seleccionar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function editar_user()
{
    var id = $("#man_id").val();
    var nombre = $("#man_nombre").val();
    var apellido = $("#man_apellido").val();
    var user = $("#man_user").val();
    var pass = $("#man_pass").val();
    var tipo = $("#man_tipo").val();
    if (nombre != "" && apellido != "" && user != "" && pass != "" && tipo != "") {
        $.post(base_url + "controlador/modificar_user", {id: id, nombre: nombre, apellido: apellido, user: user, pass: pass, tipo: tipo},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_user").hide();
                $("#msj_man_user").html("<label>Usuario No Registrado</label>");
                $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                if (datos.valor == 2) {
                    $("#msj_man_user").hide();
                    $("#msj_man_user").html("<label>Nombre de Usuario No Disponible</label>");
                    $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                } else {
                    $("#msj_man_user").hide();
                    $("#msj_man_user").html("<label>Usuario Modificado Correctamente</label>");
                    $("#msj_man_user").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                    $("#man_id").val("");
                    $("#man_nombre").val("");
                    $("#man_apellido").val("");
                    $("#man_user").val("");
                    $("#man_pass").val("");
                    $("#man_tipo").val("");
                    mostrar_user();
                }
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
        $("#msj_man_user").html("<label>Debe Seleccionar el Usuario a Eliminar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

//MANTENERDOR MAQUINAS
function mostrar_maquinas()
{
    $.post(
            base_url + "controlador/mostrar_maquinas",
            {},
            function (ruta, datos) {
                $("#lista_maquinas").html(ruta, datos);

            }
    );
}
function cargar_maquinas() {
    $.post(
            base_url + "controlador/cargar_maquinas",
            {},
            function (ruta, datos) {
                $("#man_nummaquina").html(ruta, datos);
            });
}
function cargar_maquinas_activas() {
    $.post(
            base_url + "controlador/cargar_maquinas_activas",
            {},
            function (ruta, datos) {
                $("#ac_maq").html(ruta, datos);
                $("#c_maq").html(ruta, datos);
            });
}
function guardar_maquina()
{
    var num_maquina = $("#man_nummaquina").val();
    var estado = $("#man_estado").val();
    var obs = $("#man_obs").val();
    if (num_maquina != "" && estado != "") {
        if (isNumeric(num_maquina) != false) {
            $.post(base_url + "controlador/guardar_maquina", {num_maquina: num_maquina, estado: estado,
                obs: obs},
            function (data) {
                $("#msj_man_maquinas").hide();
                $("#msj_man_maquinas").html("<label>" + data.msg + "</label>");
                if (data.valor == 1) {
                    mostrar_maquinas();
                    $("#msj_man_maquinas").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                    $("#man_nummaquina").val("");
                    $("#man_estado").val("");
                    $("#man_obs").val("");
                } else {
                    $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                }
            }, "json"
                    );
        } else {
            $("#msj_man_maquinas").hide();
            $("#msj_man_maquinas").html("<label>Ingrese solo Numeros en el Campo NUMERO DE MAQUINA</label>");
            $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }
    } else {
        $("#msj_man_maquinas").hide();
        $("#msj_man_maquinas").html("<label>Faltan Datos por ingresar</label>");
        $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function isNumeric(numero) {
    return !isNaN(parseFloat(numero)) && isFinite(numero);
}

function  seleccionar_maquina()
{
    var num_maquina = $("#man_nummaquina").val();
    if (num_maquina != "") {
        if (isNumeric(num_maquina) != false) {
            $.post(base_url + "controlador/seleccionar_maquina", {num_maquina: num_maquina},
            function (datos) {
                if (datos.valor == 1) {
                    $("#msj_man_maquinas").hide();
                    $("#msj_man_maquinas").html("<label>Maquina No Registrada</label>");
                    $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                } else {
                    $("#man_nummaquina").val(datos.num_maquina);
                    $("#man_estado").val(datos.estado);
                    $("#man_obs").val(datos.obs);
                }
            }, "json"
                    );
        } else {
            $("#msj_man_maquinas").hide();
            $("#msj_man_maquinas").html("<label>Ingrese solo Numeros en el Campo Numero de Maquina</label>");
            $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }
    } else {
        $("#msj_man_maquinas").hide();
        $("#msj_man_maquinas").html("<label>Debe Ingresar el Número de la Maquina a Seleccionar</label>");
        $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function editar_maquina()
{
    var num_maquina = $("#man_nummaquina").val();
    var estado = $("#man_estado").val();
    var obs = $("#man_obs").val();
    if (num_maquina != "" && estado != "") {
        if (isNumeric(num_maquina) != false) {
            $.post(base_url + "controlador/modificar_maquina", {num_maquina: num_maquina, estado: estado, obs: obs},
            function (datos) {
                if (datos.valor == 1) {
                    $("#msj_man_maquinas").hide();
                    $("#msj_man_maquinas").html("<label>Maquina No Registrada</label>");
                    $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                } else {
                    if (datos.valor == 2) {
                        $("#msj_man_maquinas").hide();
                        $("#msj_man_maquinas").html("<label>Numero de Maquina No Disponible</label>");
                        $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                    } else {
                        $("#msj_man_maquinas").hide();
                        $("#msj_man_maquinas").html("<label>Maquina Modificada Correctamente</label>");
                        $("#msj_man_maquinas").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                        $("#man_id_maquina").val("");
                        $("#man_nummaquina").val("");
                        $("#man_estado").val("");
                        $("#man_obs").val("");
                        mostrar_maquinas();
                    }
                }
            }, "json"
                    );
        } else {
            $("#msj_man_maquinas").hide();
            $("#msj_man_maquinas").html("<label>Ingrese solo Numeros en el Campo NUMERO DE MAQUINA</label>");
            $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }
    } else {
        $("#msj_man_maquinas").hide();
        $("#msj_man_maquinas").html("<label>Debe Seleccionar una Maquina para Editar</label>");
        $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function eliminar_maquina()
{
    var num_maquina = $("#man_nummaquina").val();
    if (num_maquina != "") {
        if (isNumeric(num_maquina) != false) {
            $.post(base_url + "controlador/eliminar_maquina", {num_maquina: num_maquina},
            function (datos) {
                if (datos.valor == 1) {
                    $("#msj_man_maquinas").hide();
                    $("#msj_man_maquinas").html("<label>Maquina No Registrado</label>");
                    $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                } else {
                    $("#msj_man_maquinas").hide();
                    $("#msj_man_maquinas").html("<label>Maquina Eliminada</label>");
                    $("#msj_man_maquinas").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                    $("#man_id_maquina").val("");
                    $("#man_nummaquina").val("");
                    $("#man_estado").val("");
                    $("#man_obs").val("");
                    mostrar_maquinas();
                }
            }, "json"
                    );
        } else {
            $("#msj_man_maquinas").hide();
            $("#msj_man_maquinas").html("<label>Ingrese solo Numeros en el Campo NUMERO DE MAQUINA</label>");
            $("#msj_man_maquinas").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Debe Seleccionar la Maquina a Eliminar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function validar_texto(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//MANTENEDOR GASTOS
function cargar_cat_gastos()
{
    $.post(
            base_url + "controlador/cargar_cat_gastos",
            {},
            function (ruta, datos) {
                $("#lista_gastos").html(ruta, datos);

            }
    );
}
function guardar_cat_gasto()
{
    var estado_gasto = $("#man_estado_gasto").val();
    var nombre_gasto = $("#man_nombre_gasto").val();
    var desc = $("#man_desc_gasto").val();
    if (nombre_gasto != "" && desc != "" && estado_gasto != "") {
        $.post(base_url + "controlador/guardar_cat_gasto", {estado_gasto: estado_gasto, nombre_gasto: nombre_gasto, desc: desc},
        function (data) {
            $("#msj_man_gastos").hide();
            $("#msj_man_gastos").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                cargar_cat_gastos();
                $("#msj_man_gastos").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#id_cat_gastos").val("");
                $("#man_nombre_gasto").val("");
                $("#man_desc_gasto").val("");

            } else {
                $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            }
        }, "json"
                );
    } else {
        $("#msj_man_gastos").hide();
        $("#msj_man_gastos").html("<label>Faltan Datos por Ingresar</label>");
        $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function  seleccionar_cat_gasto()
{
    var nombre_gasto = $("#man_nombre_gasto").val();
    if (nombre_gasto != "") {
        $.post(base_url + "controlador/seleccionar_cat_gasto", {nombre_gasto: nombre_gasto},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_gastos").hide();
                $("#msj_man_gastos").html("<label>Gasto No Registrado</label>");
                $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#id_cat_gastos").val(datos.id_cat_gasto);
                $("#man_nombre").val(datos.nombre_gasto);
                $("#man_estado_gasto").val(datos.estado_cat_gasto);
                $("#man_desc_gasto").val(datos.desc);

            }
        }, "json"
                );
    } else {
        $("#msj_man_gastos").hide();
        $("#msj_man_gastos").html("<label>Ingresar Nombre de Gasto a Seleccionar</label>");
        $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function editar_cat_gasto()
{
    var id_gasto = $("#id_cat_gastos").val();
    var nombre_gasto = $("#man_nombre_gasto").val();
    var estado_gasto = $("#man_estado_gasto").val();
    var desc = $("#man_desc_gasto").val();
    if (id_gasto != "" && nombre_gasto != "" && estado_gasto != "" && desc != "") {
        $.post(base_url + "controlador/editar_gasto", {id_gasto: id_gasto, nombre_gasto: nombre_gasto, estado_gasto: estado_gasto, desc: desc},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_gastos").hide();
                $("#msj_man_gastos").html("<label>Gasto No Registrado</label>");
                $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                if (datos.valor == 2) {
                    $("#msj_man_gastos").hide();
                    $("#msj_man_gastos").html("<label>Nombre No Disponible</label>");
                    $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                } else {
                    $("#msj_man_gastos").hide();
                    $("#msj_man_gastos").html("<label>Gasto Modificado Correctamente</label>");
                    $("#msj_man_gastos").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                    $("#id_cat_gastos").val("");
                    $("#man_nombre_gasto").val("");
                    $("#man_estado_gasto").val("1");
                    $("#man_desc_gasto").val("");
                    cargar_cat_gastos();
                }
            }
        }, "json"
                );
    } else {
        $("#msj_man_gastos").hide();
        $("#msj_man_gastos").html("<label>Seleccione Gasto a Editar</label>");
        $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function eliminar_cat_gasto()
{
    var nombre_gasto = $("#man_nombre_gasto").val();
    if (nombre_gasto != "") {
        $.post(base_url + "controlador/eliminar_gasto", {nombre_gasto: nombre_gasto},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_gastos").hide();
                $("#msj_man_gastos").html("<label>Gasto No Registrado</label>");
                $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#msj_man_gastos").hide();
                $("#msj_man_gastos").html("<label>Gasto Eliminado</label>");
                $("#msj_man_gastos").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#id_cat_gastos").val("");
                $("#man_nombre_gasto").val("");
                $("#man_estado_gasto").val("1");
                $("#man_desc_gasto").val("");
                cargar_cat_gastos();
            }
        }, "json"
                );
    } else {
        $("#msj_man_user").hide();
        $("#msj_man_user").html("<label>Seleccione Gasto a Eliminar</label>");
        $("#msj_man_user").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function cargar_gastos_activos() {
    $.post(
            base_url + "controlador/cargar_gastos_activos",
            {},
            function (ruta, datos) {
                $("#c_categorias").html(ruta, datos);
            });
}
