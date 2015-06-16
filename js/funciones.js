$(document).ready(function () {
    foco('user');
    $("#conectar").button().click(function () {
        conectar();
    });
    $("#bthome").button().click(function () {
        home();
    });
    $("#btusuarios").button().click(function () {
        usuarios();
        foco('man_user');
    });
    $("#btmaquinas").button().click(function () {
        maquinas();
    });
    $("#btgastos").button().click(function () {
        gastos_adm();
        foco('man_nombre_gasto');
    });
    $("#btcaja").button().click(function () {
        caja();
        foco('ac_keyin');
    });
    $("#btestadisticas").button().click(function () {
        estadisticas();
    });
    $("#salir").button().click(function () {
        salir();
        location.reload();
    });
    $("#bthomec").button().click(function () {
        homec();
    });
    $("#btcajac").button().click(function () {
        cajac();
        foco('c_pago');
    });
    $("#btcierrecaja").button().click(function () {
        cierrecaja();
    });
    $("#btcuadratura").button().click(function () {
        cuadratura();
    });
    $("#salirc").button().click(function () {
        salir();
        location.reload();
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
    //MANTENEDOR MAQUINAS
    mostrar_maquinas();
    cargar_maquinas();
    cargar_maquinas_activas();
    $("#bteditarmaquina").button().click(function () {
        editar_maquina();
    });
    //CAJA ADMIN
    $("#btregistrarkey").button().click(function () {
        registrar_key();
    });
    $("#btreiniciarkeys").button().click(function () {
        reiniciar_keys();
    });
    $("#btaumento").button().click(function () {
        ingresar_aumento();
    });
    //ESTADISTICAS ADMIN
    $("#estad_datepicker").datepicker();
    $("#btestad").button().click(function () {
        generar_informe();
    });
    //MANTENEDOR GASTOS
    cargar_cat_gastos();
    cargar_gastos_activos();
    $("#btguardargasto").button().click(function () {
        guardar_cat_gasto();
    });
    $("#bteditargastos").button().click(function () {
        editar_cat_gasto();
    });
    //CAJA CAJERO
    $("#btingresarpago").button().click(function () {
        guardar_cpago();
    });
    $("#btregistrargasto").button().click(function () {
        guardar_cgasto();
    });
    //CIERRE DE CAJA
    cargar_pagos();
    $("#bteditarpago").button().click(function () {
        editar_pago();
    });
    $("#btcuadrar").button().click(function () {
        informe_cuadratura();
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
                $("#nombrelogin").html('<label>BIENVENIDO :' + " " + datos.nombre + " " + datos.apellido + '.</label>');
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
        $("#msg01").html("<label>Ingresar Usuario y Contraseña</label>");
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
                    foco('user');
                    $("#login").show('fast');
                }
                else
                {
                    $("#login").hide('fast');
                    $("#contenido").show('fast');
                    $("#nombrelogin").html('<label>BIENVENIDO :' + " " + datos.nombre + " " + datos.apellido + '</label>');
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
    $("#dialog-confirm").hide();
    $("#dialog-cuadratura").hide();
    $("#cajac").hide('fast');
    $("#cuadratura").hide('fast');
    $("#cierrecaja").hide('fast');
    $("#homec").show('fast');
}
function cajac()
{
    $("#dialog-confirm").hide();
    $("#dialog-cuadratura").hide();
    $("#homec").hide('fast');
    $("#cuadratura").hide('fast');
    $("#cierrecaja").hide('fast');
    $("#cajac").show('fast');
}
function cierrecaja()
{
    $("#dialog-confirm").hide();
    $("#dialog-cuadratura").hide();
    $("#homec").hide('fast');
    $("#cajac").hide('fast');
    $("#cuadratura").hide('fast');
    $("#cierrecaja").show('fast');
}
function cuadratura()
{
    $("#dialog-confirm").hide();
    $("#dialog-cuadratura").hide();
    $("#homec").hide('fast');
    $("#cajac").hide('fast');
    $("#cierrecaja").hide('fast');
    $("#cuadratura").show('fast');
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
function  seleccionar_user(user)
{
    var user = user;
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
function cargar_maquinas()
{
    $.post(
            base_url + "controlador/cargar_maquinas",
            {},
            function (ruta, datos) {
                $("#man_nummaquina").html(ruta, datos);
            });
}
function cargar_maquinas_activas()
{
    $.post(
            base_url + "controlador/cargar_maquinas_activas",
            {},
            function (ruta, datos) {
                $("#ac_maq").html(ruta, datos);
                $("#c_maq").html(ruta, datos);
            });
}
function  seleccionar_maquina()
{
    var num_maquina = $("#man_nummaquina").val();
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
function cargar_gastos_activos()
{
    $.post(
            base_url + "controlador/cargar_gastos_activos",
            {},
            function (ruta, datos) {
                $("#c_categorias").html(ruta, datos);
            });
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
                $("#man_estado_gasto").val("");
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
function  seleccionar_cat_gasto(nombre)
{
    var nombre_gasto = nombre;
    if (nombre_gasto != "") {
        $.post(base_url + "controlador/seleccionar_cat_gasto", {nombre_gasto: nombre_gasto},
        function (datos) {
            if (datos.valor == 1) {
                $("#msj_man_gastos").hide();
                $("#msj_man_gastos").html("<label>Gasto No Registrado</label>");
                $("#msj_man_gastos").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
            } else {
                $("#id_cat_gastos").val(datos.id_cat_gasto);
                $("#man_nombre_gasto").val(datos.nombre_gasto);
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
                    $("#man_estado_gasto").val("");
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

//ADMINISTRACION DE CAJA

function diferencia_keys()
{
    var key_in = $("#ac_keyin").val().replace(/\./g, '');
    var key_out = $("#ac_keyout").val().replace(/\./g, '');
    if (key_in != "" && key_out != "") {
        $.post(base_url + "controlador/diferencia_keys", {key_in: key_in, key_out: key_out},
        function (data) {
            var num = data.total;
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/, '');
            $("#ac_total").val(num);
        }, "json"
                );
    }
}
function sumatoria_keys()
{
    var key_in = $("#ac_keyin").val().replace(/\./g, '');
    var key_out = $("#ac_keyout").val().replace(/\./g, '');
    var total_key = $("#ac_total").val().replace(/\./g, '');
    var total_in = $("#ac_totalin").val().replace(/\./g, '');
    var total_out = $("#ac_totalout").val().replace(/\./g, '');
    var acumulado = $("#ac_acumulado").val().replace(/\./g, '');
    $.post(base_url + "controlador/sumatoria_keys", {key_in: key_in, key_out: key_out, total_key: total_key, total_in: total_in, total_out: total_out, acumulado: acumulado},
    function (data) {
        var total_in = data.total_in;
        var total_out = data.total_out;
        var acumulado = data.acumulado;
        total_in = total_in.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        total_out = total_out.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        acumulado = acumulado.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        total_in = total_in.split('').reverse().join('').replace(/^[\.]/, '');
        total_out = total_out.split('').reverse().join('').replace(/^[\.]/, '');
        acumulado = acumulado.split('').reverse().join('').replace(/^[\.]/, '');
        $("#ac_totalin").val(total_in);
        $("#ac_totalout").val(total_out);
        $("#ac_acumulado").val(acumulado);
    }, "json"
            );
}
function reiniciar_keys() {
    $("#ac_totalin").val("");
    $("#ac_totalout").val("");
    $("#ac_acumulado").val("");
    $("#ac_total").val("");
}
function registrar_key()
{
    var num_maquina = $("#ac_maq").val();
    var key_in = $("#ac_keyin").val().replace(/\./g, '');
    var key_out = $("#ac_keyout").val().replace(/\./g, '');
    var total_key = $("#ac_total").val().replace(/\./g, '');
    var tiempo = new Date();
    var hora = tiempo.getHours();
    var min = tiempo.getMinutes();
    var dia = tiempo.getDate();
    var mes = tiempo.getMonth();
    var ano = tiempo.getFullYear();
    if (key_in != "" && key_out != "") {
        $.post(base_url + "controlador/registrar_key", {num_maquina: num_maquina, key_in: key_in, key_out: key_out, total_key: total_key, hora: hora, min: min, dia: dia, mes: mes, ano: ano},
        function (data) {
            $("#msj_keys").hide();
            $("#msj_keys").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                sumatoria_keys();
                $("#ac_keyin").val("");
                $("#ac_keyout").val("");
            }
            $("#msj_keys").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }, "json"
                );
    } else {
        $("#msj_keys").hide();
        $("#msj_keys").html("<label>Ingrese Ambas Keys</label>");
        $("#msj_keys").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

function ingresar_aumento()
{
    var monto_aumento = $("#ac_aumento").val().replace(/\./g, '');
    var tiempo = new Date();
    var hora = tiempo.getHours();
    var min = tiempo.getMinutes();
    var dia = tiempo.getDate();
    var mes = tiempo.getMonth();
    var ano = tiempo.getFullYear();
    if (monto_aumento != "") {
        $.post(base_url + "controlador/ingresar_aumento", {monto_aumento: monto_aumento, hora: hora, min: min, dia: dia, mes: mes, ano: ano},
        function (data) {
            $("#msj_keys").hide();
            $("#msj_keys").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                $("#ac_aumento").val("");
            }
            $("#msj_keys").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
        }, "json"
                );
    } else {
        $("#msj_keys").hide();
        $("#msj_keys").html("<label>Debe Ingresar la Cantidad del Aumento</label>");
        $("#msj_keys").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

//ESTADISTICAS ADMIN
function generar_informe() {
    var tipo = $("#tipo_select").val();
    var rango = $("#rango_select").val();
    var fecha = $("#estad_datepicker").val();
    if (fecha != "") {
        if (rango == "d") {
            $.post(base_url + "controlador/informe_diario", {tipo: tipo, fecha: fecha},
            function (ruta, datos) {
                $("#informe").html(ruta, datos);
            });
        } else {
            if (rango == "m") {
                $.post(base_url + "controlador/informe_mensual", {tipo: tipo, fecha: fecha},
                function (ruta, datos) {
                    $("#informe").html(ruta, datos);
                });
            } else {
                $.post(base_url + "controlador/informe_anual", {tipo: tipo, fecha: fecha},
                function (ruta, datos) {
                    $("#informe").html(ruta, datos);
                });
            }
        }
    } else {
        $("#msj_est").hide();
        $("#msj_est").html("<label>Debe Seleccionar una Fecha</label>");
        $("#msj_est").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }

}
//MANTENEDOR PAGOS
function guardar_cpago()
{
    var num_maquina = $("#c_maq").val();
    var monto_pago = $("#c_pago").val().replace(/\./g, '');
    var tiempo = new Date();
    var min = tiempo.getMinutes();
    var horas = tiempo.getHours();
    var dia = tiempo.getDate();
    var mes = tiempo.getMonth();
    var ano = tiempo.getFullYear();
    if (num_maquina != "" && monto_pago != "") {
        $.post(base_url + "controlador/guardar_pago", {num_maquina: num_maquina, monto_pago: monto_pago, min: min, horas: horas, dia: dia, mes: mes, ano: ano},
        function (data) {
            $("#msj_cajac").hide();
            $("#msj_cajac").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                $("#msj_cajac").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#c_maq").val("");
                $("#c_pago").val("");
                cargar_pagos();
            }
        }, "json"
                );
    } else {
        $("#msj_cajac").hide();
        $("#msj_cajac").html("<label>Ingrese Monto del Pago</label>");
        $("#msj_cajac").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}
function guardar_cgasto()
{
    var id_categoria = $("#c_categorias").val();
    var monto_gasto = $("#c_gasto").val().replace(/\./g, '');
    var detalle = $("#c_detalle").val();
    var tiempo = new Date();
    var min = tiempo.getMinutes();
    var horas = tiempo.getHours();
    var dia = tiempo.getDate();
    var mes = tiempo.getMonth();
    var ano = tiempo.getFullYear();
    if (id_categoria != "" && monto_gasto != "" && detalle != "") {
        $.post(base_url + "controlador/guardar_cgasto", {id_categoria: id_categoria, monto_gasto: monto_gasto, detalle: detalle, min: min, horas: horas, dia: dia, mes: mes, ano: ano},
        function (data) {
            $("#msj_cajac").hide();
            $("#msj_cajac").html("<label>" + data.msg + "</label>");
            if (data.valor == 1) {
                $("#msj_cajac").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                $("#c_categorias").val("");
                $("#c_gasto").val("");
                $("#c_detalle").val("");
            }
        }, "json"
                );
    } else {
        $("#msj_cajac").hide();
        $("#msj_cajac").html("<label>Complete Todos los Campos</label>");
        $("#msj_cajac").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

function cargar_pagos()
{
    var tiempo = new Date();
    var dia = tiempo.getDate();
    var mes = tiempo.getMonth();
    var ano = tiempo.getFullYear();
    $.post(
            base_url + "controlador/cargar_pagos",
            {dia: dia, mes: mes, ano: ano},
    function (ruta, datos) {
        $("#lista_pagos").html(ruta, datos);
    });
}

function  seleccionar_pago(id)
{
    var id_pago = id;
    if (id != "") {
        $.post(base_url + "controlador/seleccionar_pago", {id_pago: id_pago},
        function (datos) {
            var monto_pago = datos.monto_pago;
            monto_pago = monto_pago.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            monto_pago = monto_pago.split('').reverse().join('').replace(/^[\.]/, '');
            $("#id_pago").val(datos.id_pago);
            $("#c_maq_cierre").val(datos.num_maquina);
            $("#c_pago_cierre").val(monto_pago);
        }, "json"
                );
    }
}

function editar_pago()
{
    var id_pago = $("#id_pago").val();
    var num_maquina = $("#c_maq_cierre").val();
    var monto_pago = $("#c_pago_cierre").val().replace(/\./g, '');
    var coment = $("#c_coment").val()
    var time = new Date();
    var horas = time.getHours();
    var min = time.getMinutes();
    var dia = time.getDate();
    var mes = time.getMonth();
    var ano = time.getFullYear();
    if (id_pago != "" && num_maquina != "" && monto_pago != "" && coment != "") {
        $(function () {
            $("#dialog-confirm").dialog({
                resizable: true,
                height: 240,
                modal: true,
                buttons: {
                    "Continuar": function () {
                        $("#dialog-confirm").show();
                        $(this).dialog("close");
                        $.post(base_url + "controlador/editar_pago", {id_pago: id_pago, num_maquina: num_maquina, monto_pago: monto_pago, coment: coment, horas: horas, min: min, dia: dia, mes: mes, ano: ano},
                        function (datos) {
                            if (datos.valor == 0) {
                                $("#msj_cierrecaja").hide();
                                $("#msj_cierrecaja").html("<label>Pago Modificado Correctamente</label>");
                                $("#msj_cierrecaja").css("color", "#55FF00").show('drop', 'slow').delay(3000).hide('drop', 'slow');
                                $("#id_pago").val("");
                                $("#c_maq_cierre").val("");
                                $("#c_pago_cierre").val("");
                                $("#c_coment").val("");
                                cargar_pagos();
                            }
                        }, "json"
                                );
                    },
                    Cancel: function () {
                        $(this).dialog("close");
                        $("#dialog-confirm").show();
                        $("#msj_cierrecaja").hide();
                        $("#id_pago").val("");
                        $("#c_maq_cierre").val("");
                        $("#c_pago_cierre").val("");
                        $("#c_coment").val("");
                    }
                }
            });
        });
    } else {
        $("#msj_cierrecaja").hide();
        $("#msj_cierrecaja").html("<label>Complete Todos los Campos</label>");
        $("#msj_cierrecaja").css("color", "#FF0000").show('drop', 'slow').delay(3000).hide('drop', 'slow');
    }
}

function informe_cuadratura()
{
    var time = new Date();
    var hora = time.getHours();
    var min = time.getMinutes();
    var dia = time.getDate();
    var mes = time.getMonth();
    var ano = time.getFullYear();
    $(function () {
        $("#dialog-cuadratura").dialog({
            resizable: true,
            height: 335,
            width: 335,
            modal: true,
            buttons: {
                "Continuar": function () {
                    $("#dialog-cuadratura").show();
                    $(this).dialog("close");
                    $.post(
                            base_url + "controlador/informe_cuadratura",
                            {dia: dia, mes: mes, ano: ano, hora: hora, min: min},
                    function (ruta, datos) {
                        $("#lista_cuadratura").html(ruta, datos);
                        $("#bt_cuadratura").hide();
                        $("#bt_cuadratura").hide();
                    }
                    );
                },
                Cancel: function () {
                    $(this).dialog("close");
                    $("#dialog-cuadratura").show();
                }
            }
        });
    });



}

//VALIDACIONES
//
//LOGIN
function enter_user(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('pass');
}
function enter_conectar(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        conectar();
}

//FOCUS MANTENEDOR USUARIO
function enter_manusuario(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('man_pass');
}
function enter_manpass(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('man_nombre');
}
function enter_mannombre(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('man_apellido');
}
function enter_manapellido(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('man_tipo');
}
function enter_mantipo(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        guardar_user();
}
//FOCUS MANTENEDOR KEYS
function enter_keyin(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        foco('ac_keyout');
}

function enter_pago(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13)
        guardar_cpago();
}
function formatNumeros(input)
{
    var num = input.value.replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        input.value = num;
    }
}
function foco(e) {
    document.getElementById(e).focus();
}
function isNumeric(numero)
{
    return !isNaN(parseFloat(numero)) && isFinite(numero);
}
function validar_texto(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
