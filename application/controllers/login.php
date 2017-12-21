
<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 21/12/2017
 * Time: 10:52
 */

class login extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if($this->session->userdata('conectado') == TRUE){
            redirect(base_url().'index.php/client/painel');
        }else{
            $this->load->view('client/login');
        }

    }

    public function check_login(){
        $email = $this->input->post('email');
        $senha = $this->input->post('telefone');

        if ($email == "admin@admin.com" && $senha == '123456' ) {
            $dados = array('nome' => 'teste', 'id' => 23,'token' => 20540658, 'conectado' => TRUE);
            $this->session->set_userdata($dados);

            if($ajax == true){
                $json = array('result' => true);
                echo json_encode($json);
            }
            else{
                redirect(base_url().'index.php/client/painel');
            }

        } else {
            //caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
            $dados['erro'] = "Usuário/Senha incorretos";
            redirect(base_url());
        }
    }
}