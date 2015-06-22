<?php ?>
<div style="overflow: auto; height: 360px; width: 750px;">
    <table id="tabla_users" class="ui-widget"style="border-radius: 10px; width: 730px;" border="2">
        <thead class="ui-widget-header" >
            <tr>
                <th>USUARIO</th>
                <th>TIPO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>SELECCIONAR</th>
            </tr>
        </thead>
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
            <tbody class="table-content">
                <tr align="center">
                    <td id="td_user"width="120"><?= $fila->user ?></td>
                    <td width="120"><?= $fila->tipo ?></td>
                    <td width="120"><?= $fila->nombre ?></td>
                    <td width="120"><?= $fila->apellido ?></td>
                    <td width="120"><input onclick="foco('man_user'), seleccionar_user('<?= $fila->user ?>')" type="image" src="css/images/check-icon.png" /></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>
<?php ?>
