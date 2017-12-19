<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 09:49
 */

class Contato extends CI_Controller{
    function __construct(){
        parent::__construct();
    }#End construct

    function index(){
        $this->contato();
    }#End index

    function contato(){
        $this->data['title'] = 'Contato';
        $this->data['contato_current'] = 'current';

        $this->data['view'] = 'Contato';
        $this->load->view('assets/header', $this->data);
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

}