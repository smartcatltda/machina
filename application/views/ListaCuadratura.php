<?php ?>
<table style="width: 800px; height: 300px;" border="2">
    <caption style="font-weight: bold; font-family: calibri; font-size: 28px" align="top">CIERRE DE CAJA</caption>
    <tbody>
        <tr>
            <td style="font-weight: bold;">CAJA ANTERIOR</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$ <?= number_format($fila->caja_anterior, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">TOTAL AUMENTOS   ( + )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td  align="center" width="120">$   <?= number_format($fila->total_aumentos, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">TOTAL PAGOS   ( - )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$   <?= number_format($fila->total_pagos, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">TOTAL GASTOS   ( - )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$   <?= number_format($fila->total_gastos, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">TOTAL CAJA   ( = )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$   <?= number_format($fila->total_caja, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">CAJA INGRESADA   ( = )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$ <?= number_format($fila->total_cajero, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td style="font-weight: bold;">DIFERENCIA CAJAS   ( = )</td>
            <?php
            foreach ($totales as $fila):
                ?>
                <td align="center" width="120">$ <?= number_format($fila->diferencia_caja, 0, ",", ".") ?></td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>
<?php ?>
