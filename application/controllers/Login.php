
<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 21/12/2017
 * Time: 10:52
 */

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('login_model', 'login');
    }

    public function index(){
        if($this->session->userdata('conectado') == TRUE){
            redirect(base_url().'index.php/client/painel');
        }else{
            $this->load->view('client/login');
        }

    }

    public function check_login(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','valid_email|required|trim');
        $this->form_validation->set_rules('telefone','telefone','required|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {
            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect($this->login);
            }
        }else{
            $email = $this->input->post('email');
            $senha = $this->input->post('telefone');

            $result = $this->login->check_login($email, $senha);

            if ($result) {
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
}