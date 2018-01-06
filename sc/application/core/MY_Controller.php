<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 06/01/2018
 * Time: 14:05
 */

class MY_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();

        // CHECANDO SESSÃO DE LOGIN
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }
    }#End construct

}