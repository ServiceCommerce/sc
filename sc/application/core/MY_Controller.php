<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 06/01/2018
 * Time: 14:05
 * Classe responsável por extender CI_Controller do CORE do sistema.
 * Tendo como finalidade prover alterações na raiz da aplicação.
 */

class MY_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();

        // CHECANDO SESSÃO DE LOGIN
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }
    }#End construct

}#End class