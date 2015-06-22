<?php ?>
<div style="overflow: auto; height: 360px; width: 700px;">
    <table id="tabla_gastos" class="ui-widget"style="border-radius: 10px; width: 680px; " border="2">
        <thead class="ui-widget-header">
            <tr>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>SELECCIONAR</th>
            </tr>
        </thead>
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
            <tbody class="table-content">
                <tr align="center">
                    <td width="120"><?= $fila->nombre_categoria ?></td>
                    <td width="120"><?= $fila->descripcion_categoria ?></td>
                    <td width="120"><?= $fila->estado_cat_gasto ?></td>
                    <td width="120"><input type="image" src="css/images/check-icon.png" onclick="foco('man_nombre_gasto'), seleccionar_cat_gasto('<?= $fila->nombre_categoria ?>')"/></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>
<?php ?>
