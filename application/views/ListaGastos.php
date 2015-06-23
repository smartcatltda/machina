<?php ?>
<table id="tabla_maquinas" cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 683px; ">
    <tr>
        <td>
            <table cellspacing="0" cellpadding="1" border="1" width="683">
                <tr class="ui-widget-header" >
                    <th width="145">NOMBRE</th>
                    <th width="228">DESCRIPCION</th>
                    <th width="146">ESTADO</th>
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
                    foreach ($gastos as $fila):
                        if ($fila->estado_cat_gasto == 2):
                            $fila->estado_cat_gasto = "Inactivo";
                        else:
                            if ($fila->estado_cat_gasto == 1):
                                $fila->estado_cat_gasto = "Activo";
                            endif;
                        endif;
                        ?>
                        <tr align="center">
                            <td width="120"><?= $fila->nombre_categoria ?></td>
                            <td width="120"><?= $fila->descripcion_categoria ?></td>
                            <td width="120"><?= $fila->estado_cat_gasto ?></td>
                            <td width="120"><input type="image" src="css/images/check-icon.png" onclick="foco('man_nombre_gasto'), seleccionar_cat_gasto('<?= $fila->nombre_categoria ?>')"/></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php ?>
