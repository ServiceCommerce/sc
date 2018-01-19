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

        // CARREGANDO BIBLIOTECAS
        $this->load->library('info_plano');

        // CHECANDO SESSÃO DE LOGIN
        $this->verificar_sessao();
        // CHECANDO PARAMETROS DO SISTEMA
        $this->checkVersion();

        $this->last_url = $this->last_url();
    }#End construct

    private function verificar_sessao(){
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('login/login');
        }#End if
    }#End verificar_login()


    // metodo responsável por capturar ultimo url
    private function last_url(){
        if($this->session->flashdata('last_url') != null){
            $this->session->set_flashdata('last_url', current_url());
            return $this->session->flashdata('last_url');
        }else{
            $this->session->set_flashdata('last_url', current_url());
        }#End if
    }#End last_url()

    private function checkVersion(){
        $this->load->model('mapos_model','');

        $db_version = $this->info_plano->db_version();
        $db_current = $this->mapos_model->getDbVersion();

        if($this->db != true || $db_version !== $db_current){
            redirect(base_url('index.php/login/scPainel'));
        }#End if
    }#End checkVersion
}#End class