<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 683px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="683">
                    <tr class="ui-widget-header" >
                        <th width="150">MAQUINA</th>
                        <th width="300">MONTO</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:700px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="683">
                        <?php
                        foreach ($diario_resumen_pagos as $fila):
                            $fila->monto_pago = number_format($fila->monto_pago, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="150"><?= $fila->num_maquina ?></td>
                                <td width="300">$<?= $fila->monto_pago ?></td>
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