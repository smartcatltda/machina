<?php ?>
<table border="2">
    <th>NOMBRE</th>
    <th>DESCRIPCION</th>
    <th>ESTADO</th>
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
        </tr>
    <?php endforeach; ?>
</table>
<?php ?>
