<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 710px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="710">
                    <tr class="ui-widget-header" >
                        <th width="100">ID</th>
                        <th width="250">CAJERO</th>
                        <th width="150">MONTO</th>
                        <th width="100">FECHA</th>
                        <th width="100">HORA</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:727px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="710">
                        <?php
                        foreach ($mensual_aumentos as $fila):
                            if ($fila->hora_aumento < 10):
                                $fila->hora_aumento = "0" . $fila->hora_aumento;
                            endif;
                            if ($fila->min_aumento < 10):
                                $fila->min_aumento = "0" . $fila->min_aumento;
                            endif;
                            if ($fila->dia_aumento < 10):
                                $fila->dia_aumento = "0" . $fila->dia_aumento;
                            endif;
                            if ($fila->mes_aumento < 10):
                                $fila->mes_aumento = "0" . $fila->mes_aumento;
                            endif;
                            $fila->monto_aumento = number_format($fila->monto_aumento, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="100"><?= $fila->id_aumento ?></td>
                                <td width="250"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="150">$<?= $fila->monto_aumento ?></td>
                                <td width="100"><?= $fila->dia_aumento ?>/<?= $fila->mes_aumento ?></td>
                                <td width="100"><?= $fila->hora_aumento ?>:<?= $fila->min_aumento ?></td>
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