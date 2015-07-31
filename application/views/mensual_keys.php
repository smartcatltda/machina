<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 800px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="800">
                    <tr class="ui-widget-header" >
                        <th width="100">ID</th>
                        <th width="120">MAQUINA</th>
                        <th width="150">KEY BASE</th>
                        <th width="150">KEY OUT</th>
                        <th width="150">TOTAL</th>
                        <th width="100">FECHA</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:817px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="800">
                        <?php
                        foreach ($mensual_keys as $fila):
                            if ($fila->dia_key < 10):
                                $fila->dia_key = "0" . $fila->dia_key;
                            endif;
                            if ($fila->mes_key < 10):
                                $fila->mes_key = "0" . $fila->mes_key;
                            endif;
                            $fila->key_base = number_format($fila->key_base, 0, ",", ".");
                            $fila->key_out = number_format($fila->key_out, 0, ",", ".");
                            $fila->total_key = number_format($fila->total_key, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="100"><?= $fila->id_key ?></td>
                                <td width="120"><?= $fila->num_maquina ?></td>
                                <td width="150">$<?= $fila->key_base ?></td>
                                <td width="150">$<?= $fila->key_out ?></td>
                                <td width="150">$<?= $fila->total_key ?></td>
                                <td width="100"><?= $fila->dia_key ?>/<?= $fila->mes_key ?></td>
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