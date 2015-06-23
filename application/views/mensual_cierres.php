<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>AUMENTOS</th>
                <th>PAGOS</th>
                <th>GASTOS</th>
                <th>CAJA ANTERIOR</th>
                <th>TOTAL SISTEMA</th>
                <th>TOTAL CAJERO</th>
                <th>DIFERENCIA CAJA</th>
                <th>HORA</th>
                <th>USUARIO</th>
            </tr>
        </thead>
        <?php
        foreach ($mensual_cierres as $fila):
            if ($fila->hora_cuadratura < 10):
                $fila->hora_cuadratura = "0" . $fila->hora_cuadratura;
            endif;
            if ($fila->min_cuadratura < 10):
                $fila->min_cuadratura = "0" . $fila->min_cuadratura;
            endif;
            $fila->total_aumentos = number_format($fila->total_aumentos, 0, ",", ".");
            $fila->total_pagos = number_format($fila->total_pagos, 0, ",", ".");
            $fila->total_gastos = number_format($fila->total_gastos, 0, ",", ".");
            $fila->caja_anterior = number_format($fila->caja_anterior, 0, ",", ".");
            $fila->total_caja = number_format($fila->total_caja, 0, ",", ".");
            $fila->diferencia_caja = number_format($fila->diferencia_caja, 0, ",", ".");
            $fila->total_cajero = number_format($fila->total_cajero, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->id_caja ?></td>
                    <td width="120">$<?= $fila->total_aumentos ?></td>
                    <td width="120">$<?= $fila->total_pagos ?></td>
                    <td width="120">$<?= $fila->total_gastos ?></td>
                    <td width="120">$<?= $fila->caja_anterior ?></td>
                    <td width="120">$<?= $fila->total_caja ?></td>
                    <td width="120">$<?= $fila->total_cajero ?></td>
                    <td width="120">$<?= $fila->diferencia_caja ?></td>
                    <td width="120"><?= $fila->hora_cuadratura ?>:<?= $fila->min_cuadratura ?></td>
                    <td width="120"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>