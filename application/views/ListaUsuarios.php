<?php ?>
<table id="tabla_maquinas" cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 683px; ">
    <tr>
        <td>
            <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="683">
                <tr class="ui-widget-header" >
                    <th width="131">USUARIO</th>
                    <th width="134">TIPO</th>
                    <th width="132">NOMBRE</th>
                    <th width="132">APELLIDO</th>
                    <th>CARGAR</th>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <div style="width:700px; height:310px; overflow:auto;">
                <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="683">
                    <?php
                    foreach ($usuarios as $fila):
                        if ($fila->tipo == 2):
                            $fila->tipo = "cajero";
                        else:
                            if ($fila->tipo == 1):
                                $fila->tipo = "administrador";
                            else :
                                $fila->tipo = "inactivo";
                            endif;
                        endif;
                        ?>
                        <tr align="center">
                            <td id="td_user"width="120"><?= $fila->user ?></td>
                            <td width="120"><?= $fila->tipo ?></td>
                            <td width="120"><?= $fila->nombre ?></td>
                            <td width="120"><?= $fila->apellido ?></td>
                            <td width="120"><input onclick="foco('man_user'), seleccionar_user('<?= $fila->user ?>')" type="image" src="css/images/check-icon.png" /></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php ?>


