<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 710px; text-align: center;">
        <tr>
            <td>
                <table cellspacing="0" cellpadding="1" border="1" width="710">
                    <tr class="ui-widget-header" >
                        <th width="100">ID</th>
                        <th width="300">CAJERO</th>
                        <th width="150">MONTO</th>
                        <th width="150">HORA</th>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <div style="width:727px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="710">
                        <?php
                        foreach ($diario_aumentos as $fila):
                            if ($fila->hora_aumento < 10):
                                $fila->hora_aumento = "0" . $fila->hora_aumento;
                            endif;
                            if ($fila->min_aumento < 10):
                                $fila->min_aumento = "0" . $fila->min_aumento;
                            endif;
                            $fila->monto_aumento = number_format($fila->monto_aumento, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="100"><?= $fila->id_aumento ?></td>
                                <td width="300"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="150">$<?= $fila->monto_aumento ?></td>
                                <td width="150"><?= $fila->hora_aumento ?>:<?= $fila->min_aumento ?></td>
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
<?php ?>