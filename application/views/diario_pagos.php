<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>MAQUINA</th>
                <th>MONTO</th>
                <th>HORA</th>
                <th>USUARIO</th>
                <th>ESTADO</th>
                <th>COMENTARIO</th>
                <th>REFERENCIA</th>
            </tr>
        </thead>
        <?php
        foreach ($diario_pagos as $fila):
            if ($fila->hora_pago < 10):
                $fila->hora_pago = "0" . $fila->hora_pago;
            endif;
            if ($fila->min_pago < 10):
                $fila->min_pago = "0" . $fila->min_pago;
            endif;
            if ($fila->estado_pago == 1):
                $fila->estado_pago = "EDITADO";
            else:
                $fila->estado_pago = "-";
            endif;
            if ($fila->edit_pago == 0):
                $fila->edit_pago = "-";
            endif;
            if ($fila->coment_edit == ""):
                $fila->coment_edit = "-";
            endif;
            
            $fila->monto_pago = number_format($fila->monto_pago, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->id_pago ?></td>
                    <td width="120"><?= $fila->num_maquina ?></td>
                    <td width="120">$<?= $fila->monto_pago ?></td>
                    <td width="120"><?= $fila->hora_pago ?>:<?= $fila->min_pago ?></td>
                    <td width="120"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                    <td width="120"><?= $fila->estado_pago ?></td>
                    <td width="120"><?= $fila->coment_edit ?></td>
                    <td width="120"><?= $fila->edit_pago ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>