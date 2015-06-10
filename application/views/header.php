<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MACHINA |</title>
        <meta charset="utf-8">

        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>

        <link type="text/css" rel="stylesheet"href="css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.structure.css">
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.theme.css">

        <script type="text/javascript">var base_url = "<?= base_url(); ?>";</script>

    </head>
    <header>
        <div id="menuadmin" class="ui-widget-header ui-corner-all" hidden>
            <button id="bthome">Home</button>
            <button onclick="foco('man_user')"id="btusuarios">Usuarios</button>
            <button id="btmaquinas">Maquinas</button>
            <button onclick="foco('man_nombre_gasto')"id="btgastos">Gastos</button>
            <button onclick="foco('ac_keyin')" id="btcaja">Caja</button>
            <button id="btestadisticas">Estadisticas</button>
            <button style="float: right" id="salir"> Cerrar Sesión</button>
        </div>
        <div id="menucajero" class="ui-widget-header ui-corner-all" hidden>
            <button id="bthomec">Home</button>
            <button onclick="foco('c_pago')" id="btcajac">Caja</button>
            <button id="btcierrecaja">Cierre</button>
            <button style="float: right" id="salirc">Cerrar Sesión</button>
        </div>
    </header>
    <body>
