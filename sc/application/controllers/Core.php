<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 08/01/2018
 * Time: 13:04
 * Classe responsável por operações não visuais.
 * Tendo como finalidade reunir as funções do sistema e organiza-las.
 */

class Core extends MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('mapos_model','mapos');
        $this->load->library('encrypt');
        $this->load->library('info_plano');

        $this->load->helper(array('form', 'codegen_helper'));

    }#End __construct

    public function dashboard(){
        $this->data['title'] = 'Dashboard';
        $this->data['produtos'] = $this->mapos->getProdutosMinimo();
        $this->data['menuPainel'] = 'Painel';
        $this->data['footerScript'] = 'dashboard';
        $this->data['view'] = 'mapos/painel';
        $this->load->view('tema/header',  $this->data);
    }#End dashboard()

    // metodo de saída do sistema
    public function sair(){
        $this->session->sess_destroy();
        redirect(base_url());
    }#End sair()
}#End class