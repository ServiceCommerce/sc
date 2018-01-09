<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 08/01/2018
 * Time: 16:21
 */

class Web extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->library('site');
        $this->load->model('Web_model');

    }#End __construct()

    public function home(){
        $this->data['title'] = 'Serralheria Lobo Junior';
        $this->data['team_current'] = 'current';
        $this->data['view'] = 'web/Home';
        $this->load->view('web/assets/header', $this->data);
    }#END home

    public function servico(){
        $this->data['title'] = 'Serviços';
        $this->data['servicos_current'] = 'current';
        $this->data['view'] = 'web/Servicos';
        $this->load->view('web/assets/header', $this->data);
    }#End servico

    function team(){
        $this->data['title'] = 'Sobre Nós';
        $this->data['team_current'] = 'current';
        $this->data['view'] = 'web/Team';
        $this->load->view('web/assets/header', $this->data);
    }#End team

    function contato(){
        $this->data['title'] = 'Contato';
        $this->data['contato_current'] = 'current';

        $this->data['view'] = 'web/Contato';
        $this->load->view('web/assets/header', $this->data);
    }#End contato

    public function EnviarEmail(){

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.uni5.net',
            'smtp_port' => 587,
            'smtp_user' => 'contato@servicecommerce.uni5.net',
            'smtp_pass' => 'padrao123'
        );

        // Carrega a library email
        $this->load->library('email', $config);

        $dados = $this->input->post();

        $this->email->from($dados['email'],$dados['nome']);
        $this->email->to('claudio.magalhaes@outlook.com.br');

        $this->email->subject($dados['assunto']);
        $this->email->message($dados['mensagem']);

        if ($this->email->send()){
            $this->session->set_flashdata('success','Email enviado com sucesso!');
            redirect(base_url().'index.php/contato');
        }else{
            $this->session->set_flashdata('Erro','Email não enviado!');
            redirect(base_url().'index.php/contato');
        }
    }#end enviarEmail

}#End class