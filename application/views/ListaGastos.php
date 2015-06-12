<?php ?>
<table id="tabla_gastos"  border="2">
    <thead>
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
        <tbody>
            <tr align="center">
                <td width="120"><?= $fila->nombre_categoria ?></td>
                <td width="120"><?= $fila->descripcion_categoria ?></td>
                <td width="120"><?= $fila->estado_cat_gasto ?></td>
                <td width="120"><input type="image" src="css/images/check-icon.png" onclick="foco('man_nombre_gasto'), seleccionar_cat_gasto('<?= $fila->nombre_categoria ?>')"/></td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<?php ?>
