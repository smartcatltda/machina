<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("modelo");
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('content');
        $this->load->view('footer');
    }

    function conectar() {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $valor = 0;
        $permiso = "";
        $mensaje = "El usuario no existe en la Base de Datos";
        $cookie = array('user' => '', 'permiso' => '', 'esta logeado' => false);
        if ($this->modelo->conectar($user, $pass) == 1) {
            $valor = 1;
            $permiso = $this->modelo->permiso($user)->result();
            foreach ($permiso as $fila) {
                $permiso = $fila->tipo;
            }
            if ($permiso == 0) {
                $mensaje = "El usuario no tiene los permisos necesarios para acceder al sistema";
                $valor = 0;
            } else {
                $cookie = array('user' => $user, 'permiso' => $permiso, 'esta logeado' => true);
            }
            $this->session->set_userdata($cookie);
        }
        echo json_encode(array('valor' => $valor, 'user' => $user, 'permiso' => $permiso, 'mensaje' => $mensaje));
    }

    function verificalogin() {
        $valor = 0;
        $user = '';
        $permiso = '';
        if ($this->session->userdata('esta logeado') == true) {
            $valor = 1;
            $user = $this->session->userdata('user');
            $permiso = $this->session->userdata('permiso');
        }
        echo json_encode(array('valor' => $valor, 'user' => $user, 'permiso' => $permiso));
    }

    function salir() {
        $valor = 0;
        $cookie = array('user' => '', 'permiso' => '', 'esta logeado' => false);
        $this->session->set_userdata($cookie);
        echo json_encode(array('valor' => $valor));
    }

}

/* End of file controlador.php */
/* Location: ./application/controllers/controlador.php */