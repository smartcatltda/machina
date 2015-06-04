<?php

class modelo extends CI_Model {

    function conectar($user, $pass) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $this->db->where('pass', ($pass));
        return $this->db->get('usuario')->num_rows();
    }

    function permiso($user) {
        $this->db->select('tipo');
        $this->db->where('user', $user);
        return $this->db->get('usuario');
    }

//MANTENEDOR DE USUARIOS
    function mostrar_user() {
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get();
    }

    function guardar_user($nombre, $apellido, $user, $pass, $tipo) {
        $this->db->select('user');
        $this->db->where('user', $user);
        $cantidad = $this->db->get('usuario')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "user" => $user,
                "pass" => $pass,
                "tipo" => $tipo,
                "nombre" => $nombre,
                "apellido" => $apellido,
            );
            $this->db->insert("usuario", $data);
            return 0;
        else:
            return 1;
        endif;
    }

    function ver($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        return $this->db->get('usuario');
    }

    function modificar_user($id, $nombre, $apellido, $user, $pass, $tipo) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $datos = $this->db->get('usuario');
        if ($datos->num_rows() == 0):
            $this->db->select('*');
            $this->db->where('id_usuario', $id);
            $cantidad = $this->db->get('usuario')->num_rows();
            if ($cantidad > 0):
                $data = array(
                    "nombre" => $nombre,
                    "apellido" => $apellido,
                    "user" => $user,
                    "pass" => $pass,
                    "tipo" => $tipo,
                );
                $this->db->where('id_usuario', $id);
                $this->db->update('usuario', $data);
                return 0;
            else:
                return 1;
            endif;
        else:
            foreach ($datos->result() as $fila) {
                if ($fila->id_usuario == $id):
                    $data = array(
                        "nombre" => $nombre,
                        "apellido" => $apellido,
                        "user" => $user,
                        "pass" => $pass,
                        "tipo" => $tipo,
                    );
                    $this->db->where('id_usuario', $id);
                    $this->db->update('usuario', $data);
                    return 0;
                else:
                    return 2;
                endif;
            }
        endif;
    }

    function eliminar_user($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $cantidad = $this->db->get('usuario')->num_rows();
        $tipo = '0';
        if ($cantidad > 0):
            $data = array(
                "tipo" => $tipo
            );
            $this->db->where('user', $user);
            $this->db->update('usuario', $data);
            return 0;
        else:
            return 1;
        endif;
    }

}
?>

