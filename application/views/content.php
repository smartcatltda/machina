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
        <div id="maquinas">
            <label>MAQUINAS Y LA CSM</label>
            <br><br>
            <div id="msj_man_maquinas"></div>
            <div id="Man_maquinas">
                <table>
                    <tr>
                        <td>Numero Maquina </td>
                        <td><input class="rounded" id="man_nummaquina" placeholder="Numero de Maquina" type="text" style="width: 300px;" maxlength="50" /></td>
                    <tr>
                        <td>Estado </td>
                        <td>
                            <select class="rounded" id="man_estado" style="width: 200px;" >
                                <option value="" selected="">Seleccione</option>
                                <option value='1'>Activa</option>
                                <option value='2'>Inactiva</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Observaciones </td>
                        <td><textarea rows="10" cols="30" class="rounded" id="man_obs" style="width: 300px;"></textarea></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="btguardarmaquina" >Guardar</button></td>
                    </tr>
                </table>
                <br>
                <br>    
                <button id="btseleccionarmaquina" >Seleccionar</button>
                <button id="bteditarmaquina" >Editar</button>
                <button id="bteliminarmaquina" >Eliminar</button>
            </div>
            <div class="rounded" id="lista_maquinas"></div>
        </div>
        <div id="usuarios">
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
                                <option value="" selected="">Seleccione</option>
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
                <br>
                <br>  
            </div>
            <div class="rounded" id="lista_usuarios"></div>
        </div>

        <div id="caja">
            admin de caha
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
