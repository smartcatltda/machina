<?php if ($cantidad == 0): ?>
    <label>No se ha activado ninguna maquina!</label>
<?php else: ?>
    <div style="overflow: auto; height: 300px; width: 700px;">
        <table id="tabla_maquinas" class="ui-widget" border="2" style="border-radius: 10px; width: 680px; ">
            <thead class="ui-widget-header">
            <th>NUMERO DE MAQUINA</th>
            <th>OBSERVACIONES</th>
            </thead>
            <?php
            foreach ($maquinas as $fila):
                if ($fila->estado == 1):
                    ?>
                    <tbody  class="table-content">
                        <tr align="center">
                            <td width="120"><?= $fila->num_maquina ?></td>
                            <?php
                            if ($fila->obs == ""):
                                $fila->obs = '-';
                                ?>
                                <td width="300"><?= $fila->obs ?></td>
                                <?php
                            else:
                                ?>
                                <td width="300"><?= $fila->obs ?></td>                              
                            </tr>
                        </tbody>
                    <?php
                    endif;
                endif;
            endforeach;
        endif;
        ?>
    </table>
</div>
<?php ?>
