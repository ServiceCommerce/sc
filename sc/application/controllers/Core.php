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

        $this->load->model('mapos_model','',TRUE);
        $this->load->library('encrypt');
        $this->load->library('info_plano');

        $this->load->helper(array('form', 'codegen_helper'));

    }#End __construct

    // metodo responsável por ditar senhas dos usuários do sistema.
    public function alterarSenha() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $this->load->library('form_validation');
        if ($this->form_validation->run('editar_senha') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $oldSenha = $this->input->post('oldSenha');
            $senha = $this->input->post('novaSenha');
            $senha2 = $this->input->post('novaSenha2');

            if($senha == $senha2){
                $oldSenha = $this->encrypt->sha1($oldSenha);
                $senha = $this->encrypt->sha1($senha);
                $result = $this->mapos_model->alterarSenha($senha,$oldSenha,$this->session->userdata('id'));
                if($result){
                    $this->session->set_flashdata('success','Syst-001');
                    redirect(base_url() . 'index.php/mapos/minhaConta');
                }
                else{
                    $this->session->set_flashdata('error','Syst-10001');
                    redirect(base_url() . 'index.php/mapos/minhaConta');
                }
            }else{
                $this->session->set_flashdata('error','Syst-10002');
                redirect(base_url() . 'index.php/mapos/minhaConta');
            }
        }
    }

    // metodo de saída do sistema
    public function sair(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}#End class