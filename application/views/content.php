<div> <label style="color: black">contenido</label></div>
<br>
<div id="msj_man_user"></div>
<div id="Man_usuarios">
    <table>
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

    <div class="rounded" id="lista_usuarios" style=" text-align: left;"></div>
</div>