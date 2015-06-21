<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th colspan="5">RESUMEN ANUAL - PROMEDIOS MENSUALES</th>
            </tr>
            <tr>
                <th>MES</th>
                <th>AUMENTOS</th>
                <th>PAGOS</th>
                <th>CAJA ANTERIOR</th>
                <th>TOTAL CAJA</th>
            </tr>
        </thead>
        <?php
        foreach ($anual_cierres as $fila):
            if ($fila->mes_cuadratura < 10):
                $fila->mes_cuadratura = "0" . $fila->mes_cuadratura;
            endif;
            $fila->total_aumentos = number_format($fila->total_aumentos, 0, ",", ".");
            $fila->total_pagos = number_format($fila->total_pagos, 0, ",", ".");
            $fila->caja_anterior = number_format($fila->caja_anterior, 0, ",", ".");
            $fila->total_caja = number_format($fila->total_caja, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->mes_cuadratura ?></td>
                    <td width="120">$<?= $fila->total_aumentos ?></td>
                    <td width="120">$<?= $fila->total_pagos ?></td>
                    <td width="120">$<?= $fila->caja_anterior ?></td>
                    <td width="120">$<?= $fila->total_caja ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>