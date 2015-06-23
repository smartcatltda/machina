<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th colspan="2">RESUMEN DEL MES</th>
            </tr>
            <tr>
                <th>MAQUINA</th>
                <th>MONTO</th>
            </tr>
        </thead>
        <?php
        foreach ($mensual_resumen_pagos as $fila):
            $fila->monto_pago = number_format($fila->monto_pago, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->num_maquina ?></td>
                    <td width="120">$<?= $fila->monto_pago ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>