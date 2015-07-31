<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 1300px; text-align: center">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="1300">
                    <tr class="ui-widget-header" >
                        <th width="80">ID</th>
                        <th width="130">AUMENTOS</th>
                        <th width="130">PAGOS</th>
                        <th width="120">GASTOS</th>
                        <th width="130">CAJA ANTERIOR</th>
                        <th width="130">TOTAL SISTEMA</th>
                        <th width="130">TOTAL CAJERO</th>
                        <th width="120">DIF. CAJA</th>
                        <th width="80">HORA</th>
                        <th width="180">USUARIO</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:1317px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="1300">
                        <?php
                        foreach ($diario_cierres as $fila):
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
                            <tr>
                                <td width="80"><?= $fila->id_caja ?></td>
                                <td width="130">$<?= $fila->total_aumentos ?></td>
                                <td width="130">$<?= $fila->total_pagos ?></td>
                                <td width="120">$<?= $fila->total_gastos ?></td>
                                <td width="130">$<?= $fila->caja_anterior ?></td>
                                <td width="130">$<?= $fila->total_caja ?></td>
                                <td width="130">$<?= $fila->total_cajero ?></td>
                                <td width="120">$<?= $fila->diferencia_caja ?></td>
                                <td width="80"><?= $fila->hora_cuadratura ?>:<?= $fila->min_cuadratura ?></td>
                                <td width="180"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
<?php
endif;
?>