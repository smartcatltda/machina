<?php ?>
<br>
<table border="2">
    <th>NUMERO DE MAQUINA</th>
    <th>ESTADO</th>
    <th>OBSERVACIONES</th>
    <?php
    foreach ($maquinas as $fila):
        if ($fila->estado == 1):
            $fila->estado = "Activa";
        else:
            $fila->estado = "Inactiva";
        endif;
        ?>
        <tr align="center">
            <td width="120"><?= $fila->num_maquina ?></td>
            <td width="120"><?= $fila->estado ?></td>
            <td width="300"><?= $fila->obs ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php ?>
