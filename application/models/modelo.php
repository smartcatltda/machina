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
}
?>

