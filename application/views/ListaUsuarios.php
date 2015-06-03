<?php ?>
<table>
    <th>NOMBRE</th>
    <th>APELLIDO</th>
    <th>USUARIO</th>
    <th>TIPO</th>
    <?php
    foreach ($usuarios as $fila):
        if ($fila->tipo == 2):
            $fila->tipo = "cajero";
        else:
            if ($fila->tipo == 1):
                $fila->tipo = "administrador";
            else :
                $fila->tipo = "incativo";
            endif;
        endif;
        ?>
        <tr>
            <td width="120"><?= $fila->nombre ?></td>
            <td width="120"><?= $fila->apellido ?></td>
            <td width="100"><?= $fila->user ?></td>
            <td width="60"><?= $fila->tipo ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php ?>
