<?php if ($cantidad == 0): ?>
    <label>No se ha activado ninguna maquina!</label>
<?php else: ?>
    <br>
    <table id="tabla_maquinas" class="dataTableScrollDiv" border="2">
        <th>NUMERO DE MAQUINA</th>
        <th>OBSERVACIONES</th>
        <?php
        foreach ($maquinas as $fila):
            if ($fila->estado == 1):
                ?>
                <tr align="center">
                    <td width="120"><?= $fila->num_maquina ?></td>
            <!--            <td width="120"><?= $fila->estado ?></td>-->
                    <td width="300"><?= $fila->obs ?></td>
                </tr>
                <?php
            endif;
        endforeach;
    endif;
    ?>
</table>
<?php ?>
