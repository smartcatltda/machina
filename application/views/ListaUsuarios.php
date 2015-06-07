<?php ?>
<table border="2">
    <th>USUARIO</th>
    <th>TIPO</th>
    <th>NOMBRE</th>
    <th>APELLIDO</th>
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
            <td width="120"><?= $fila->user ?></td>
            <td width="120"><?= $fila->tipo ?></td>
            <td width="120"><?= $fila->nombre ?></td>
            <td width="120"><?= $fila->apellido ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php ?>
