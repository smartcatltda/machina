<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 800px; ">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="800">
                    <tr class="ui-widget-header">
                        <th width="50">ID</th>
                        <th width="50">MAQ</th>
                        <th width="85">MONTO</th>
                        <th width="90">FECHA</th>
                        <th width="55">HORA</th>
                        <th width="100">USUARIO</th>
                        <th width="75">ESTADO</th>
                        <th width="100">COMENTARIO</th>
                        <th width="75">REFE RENCIA</th>
                        <th width="80">BILLETE TRAGADO</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:817px; height:260px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="800">
                        <?php
                        foreach ($mensual_pagos as $fila):
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
                            if ($fila->b_tragado == 1):
                                $fila->b_tragado = "Si";
                            else:
                                $fila->b_tragado = "-";
                            endif;
                            $fila->monto_pago = number_format($fila->monto_pago, 0, ",", ".");
                            ?>
                            <tr align="center">
                                <td width="50"><?= $fila->id_pago ?></td>
                                <td width="50"><?= $fila->num_maquina ?></td>
                                <td width="85">$<?= $fila->monto_pago ?></td>
                                <td width="90"><?= $fila->dia_pago ?>-<?= $fila->mes_pago ?>-<?= $fila->ano_pago ?></td>
                                <td width="55"><?= $fila->hora_pago ?>:<?= $fila->min_pago ?></td>
                                <td width="100"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="75"><?= $fila->estado_pago ?></td>
                                <td width="100"><?= $fila->coment_edit ?></td>
                                <td width="75"><?= $fila->edit_pago ?></td>
                                <td width="80"><?= $fila->b_tragado ?></td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php ?>

