<?php

class modelo extends CI_Model {

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

    function modificar_user($nombre, $apellido, $user, $pass, $tipo) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $cantidad = $this->db->get('usuario')->num_rows();
        if ($cantidad > 0):
            $data = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "user" => $user,
                "pass" => $pass,
                "tipo" => $tipo,
            );
            $this->db->where('user', $user);
            $this->db->update('usuario', $data);
            return 0;
        else:
            return 1;
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
            $this->db->update('usuario',$data);
            return 0;
        else:
            return 1;
        endif;
    }

}
?>

