<div id="msg01"></div>

<div id="login" hidden>
    <input class="ui-corner-all" placeholder="Usuario" size="30" id="user" maxlength="30" required/><br>
    <input class="ui-corner-all" placeholder="Contraseña" type="password" size="30" id="pass" required/><br>
    <button id="conectar">Conectar</button>
</div>

<div id="contenido" align="center" hidden>

    <div id="admin" hidden>

        <div id="home">
            home admin
        </div>

        <div id="usuarios">
            <div style="titulo"><h1>Administración de Usuarios</h1></div>
            <div id="msj_man_user"></div>
            <div id="Man_usuarios">
                <table>
                    <tr>
                        <td>ID :</td>
                        <td><input class="rounded" id="man_id" placeholder="ID" type="text" style="width: 20px;" maxlength="50" /></td>
                    <tr>
                    <tr>
                        <td>Usuario :</td>
                        <td><input class="rounded" id="man_user" placeholder="Usuario" type="text" style="width: 160px;" maxlength="50" /></td>
                    <tr>
                        <td>Contraseña :</td>
                        <td><input class="rounded" id="man_pass" placeholder="Contraseña" type="password" style="width: 160px;" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td>Nombre :</td>
                        <td><input class="rounded" id="man_nombre" placeholder="Nombre" type="text" style="width: 160px;" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td>Apellido :</td>
                        <td><input class="rounded" id="man_apellido" placeholder="Apellido" type="text" style="width: 160px;" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td>Tipo :</td>
                        <td>
                            <select class="rounded" id="man_tipo" style="width: 160px;" >
                                <option value='2'>Cajero</option>
                                <option value='1'>Administrador</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="btguardaruser" >Guardar</button></td>
                    </tr>
                </table>
                <br>
                <br>    
                <button id="btseleccionaruser" >Seleccionar</button>
                <button id="bteditaruser" >Editar</button>
                <button id="bteliminaruser" >Eliminar</button>
            </div>
            <div class="rounded" id="lista_usuarios" style=" text-align: left;"></div>
        </div>

        <div id="caja">
            <div style="titulo"><h1>Administración de Caja</h1></div>

            <table style="width: 800px;">
                <tr>
                    <td>Maquina :</td><td style="width: 10px;"></td><td>Key In :</td><td style="width: 10px;"></td><td>Key Out :</td><td style="width: 10px;"></td><td>Total :</td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" id="ac_maq" style="width: 160px;" >
                            <!--estas opciones deberan ser cargadas de la lista de maquinas activas en el local-->
                            <option value='1'>01</option>
                            <option value='2'>02</option>
                            <option value='1'>03</option>
                            <option value='2'>04</option>
                            <option value='1'>05</option>
                            <option value='2'>06</option>
                            <option value='1'>07</option>
                            <option value='2'>08</option>
                        </select>
                    </td>
                    <td>$</td><td><input class="rounded" id="ac_keyin" placeholder="Key In" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_keyout" placeholder="Key Out" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_total" type="text" style="width: 260px;" maxlength="50" disabled="true"/></td>
                </tr>


<!--                <tr>
                    <td style="width: 10px;"></td><td> Ingrese Monto del Aumento :</td>
                </tr>
                <tr>
                    <td>$</td><td><input class="rounded" id="ac_aumento" placeholder="Aumento" type="text" style="width: 260px;" maxlength="50" /></td>
                </tr>-->
            </table>

            <td></td>
            <tr></tr>

        </div>

        <div id="estadisticas">
            estadisticas para el admin
        </div>

    </div>
    <div id="cajero" hidden>
        <div id="homec">
            home cajero
        </div>
        <div id="cajac">
            caja cajero
        </div>
        <div id="estadisticasc">
            estadisticas cahero
        </div>
    </div>
</div>

<div id="nombrelogin"></div>
