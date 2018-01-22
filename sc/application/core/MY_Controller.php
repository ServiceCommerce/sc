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
    public $menuPainel;
    public $messageLog;

    function __construct(){
        parent::__construct();

        $this->load->library('info_plano');
        $this->load->library('flashMenseger');

        // CHECANDO SESSÃO DE LOGIN
        $this->verificar_sessao();
        // CHECANDO PARAMETROS DO SISTEMA
        $this->checkVersion();
        // GERANDO MENU
        $this->menuPainel = $this->getMenu($this->json->menu());
        // SETA MENSAGEM DE FLASHDATA
        $this->messageLog = $this->messagemLog();

        $this->last_url = $this->last_url();
    }#End construct

    // METODO RESPONSÁVEL POR VERIFICAR SESSÃO DO USUÁRIO
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

    private function getMenu($menuPainel){
        $dados = array(); // recebe todos os dados
        $dropResult = array(); //recebe os dados referentes ao drop
        $check; // apontador para permissão consecida por algum drop
        foreach ($menuPainel as $menu){
            if($menu->link == 'drop'){ // verifica de há drop
                foreach ($menu->drop as $drop){
                    if($this->permission->checkpermission($this->session->userdata('permissao'), $drop->permission)){
                        $check = true;
                        $dropResult[] = $drop;
                    }#End if()
                }#End foreach()

                if($check == true){ // caso exista drop e o usuário tenha permissão
                    $menu->drop = $dropResult;
                    $dados[] = $menu;
                }
            }else{
                if($menu->permission != 'dashboard'){ //todos os usuário tem acesso a dashboard
                    if($this->permission->checkpermission($this->session->userdata('permissao'), $menu->permission)){
                        $dados[] = $menu;
                    }
                }else{
                    $dados[] = $menu;
                }
            }#End if()
        }#End foreach()
        return $dados;
    }#End getMenu()

    public function messagemLog(){
        if($this->session->flashdata('success') != null){
            return $this->flashmenseger->get($this->session->flashdata('success'));
        }elseif ($this->session->flashdata('error') != null){
            return $this->flashmenseger->get($this->session->flashdata('error'));
        }
    }#End flashMenseger()
}#End class