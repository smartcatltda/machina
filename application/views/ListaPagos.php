<?php if ($cantidad == 0): ?>
    <label>No Se Han Registrado Pagos Hoy</label>
<?php else:
    ?>
    <table style="border-radius: 10px; width: 700px;" id="tabla_pagos"  border="2">
        <thead class="ui-widget-header">
            <tr>
                <th>FECHA</th>
                <th>HORA</th>
                <th>MAQUINA</th>
                <th>MONTO</th>
                <th>SELECCIONAR</th>
            </tr>
        </thead>
        <?php
        foreach ($pagos as $fila):
            if ($fila->estado_pago == 0):
                if ($fila->dia_pago < 10):
                    $fila->dia_pago = "0" . $fila->dia_pago;
                endif;
                if ($fila->mes_pago < 10):
                    $fila->mes_pago = "0" . $fila->mes_pago;
                endif;
                if ($fila->hora_pago < 10):
                    $fila->hora_pago = "0" . $fila->hora_pago;
                endif;
                if ($fila->min_pago < 10):
                    $fila->min_pago = "0" . $fila->min_pago;
                endif;
                $fila->monto_pago = number_format($fila->monto_pago, 0, ",", ".");
                ?>
                <tbody class="table-content">
                    <tr align="center">
                        <td width="150"><?= $fila->dia_pago ?>/<?= $fila->mes_pago ?>/<?= $fila->ano_pago ?></td>
                        <td width="150"><?= $fila->hora_pago ?>:<?= $fila->min_pago ?></td>
                        <td width="100"><?= $fila->num_maquina ?></td>
                        <td width="150">$ <?= $fila->monto_pago ?></td>
                        <td width="100"><input type="image" src="css/images/check-icon.png" onclick="foco('c_pago_cierre'), seleccionar_pago('<?= $fila->id_pago ?>')"/></td>
                    </tr>
                </tbody>
                <?php
            endif;
        endforeach;
    endif;
    ?>
</table>
<?php ?>
