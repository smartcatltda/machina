<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 750px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="750">
                    <tr class="ui-widget-header" >
                        <th  width="100">ID</th>
                        <th  width="110">MAQUINA</th>
                        <th  width="150">KEY BASE</th>
                        <th  width="150">KEY OUT</th>
                        <th  width="150">TOTAL</th>
                        <th  width="80">HORA</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:767px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="750">
                        <?php
                        foreach ($diario_keys as $fila):
                            if ($fila->hora_key < 10):
                                $fila->hora_key = "0" . $fila->hora_key;
                            endif;
                            if ($fila->min_key < 10):
                                $fila->min_key = "0" . $fila->min_key;
                            endif;
                            $fila->key_base = number_format($fila->key_base, 0, ",", ".");
                            $fila->key_out = number_format($fila->key_out, 0, ",", ".");
                            $fila->total_key = number_format($fila->total_key, 0, ",", ".");
                            ?>
                            <tr>
                                <td  width="101"><?= $fila->id_key ?></td>
                                <td  width="118"><?= $fila->num_maquina ?></td>
                                <td  width="148">$<?= $fila->key_base ?></td>
                                <td  width="148">$<?= $fila->key_out ?></td>
                                <td  width="150">$<?= $fila->total_key ?></td>
                                <td  width="80"><?= $fila->hora_key ?>:<?= $fila->min_key ?></td>
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