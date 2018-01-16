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
    public $last_url;

    function __construct(){
        parent::__construct();

        // CHECANDO SESSÃO DE LOGIN
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->last_url = $this->last_url();
    }#End construct

    // metodo responsável por capturar ultimo url
    protected function last_url(){
        if($this->session->flashdata('last_url') != null){
            $this->session->set_flashdata('last_url', current_url());
            return $this->session->flashdata('last_url');
        }else{
            $this->session->set_flashdata('last_url', current_url());
        }#End if
    }#End last_url()
}#End class