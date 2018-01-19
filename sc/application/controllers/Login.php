<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 08/01/2018
 * Time: 05:34
 */

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mapos_model','',TRUE);

        $this->load->helper(array('form', 'codegen_helper'));
    }

    public function index(){
        $this->login();
    }

    public function login(){
        if(($this->session->userdata('logado'))){
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->view('mapos/login');
    }

    public function verificarLogin(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','valid_email|required|xss_clean|trim');
        $this->form_validation->set_rules('senha','Senha','required|xss_clean|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {

            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                $this->session->set_flashdata('error','Os dados de acesso estão incorretos.');
                redirect($this->login);
            }
        }
        else {

            $email = $this->input->post('email');
            $senha = $this->input->post('senha');

            $this->load->library('encrypt');
            $senha = $this->encrypt->sha1($senha);

            $this->db->where('email',$email);
            $this->db->where('senha',$senha);
            $this->db->where('situacao',1);
            $this->db->limit(1);
            $usuario = $this->db->get('usuarios')->row();
            if(count($usuario) > 0){

                if($usuario->img_url == null || $usuario->img_url == 'null'){
                    $profile = base_url('docs/System/UserProfile/default-unisex.png');
                }else{
                    $profile = $usuario->img_url;
                }

                $dados = array('nome' => $usuario->nome, 'id' => $usuario->idUsuarios,'permissao' => $usuario->permissoes_id , 'logado' => TRUE, 'dataCadastro' => $usuario->dataCadastro, 'profile' => $profile);
                $this->session->set_userdata($dados);

                if($ajax == true){
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    redirect(base_url('index.php/dashboard'));
                }


            }
            else{


                if($ajax == true){
                    $json = array('result' => false);
                    echo json_encode($json);
                }
                else{
                    $this->session->set_flashdata('error','Os dados de acesso estão incorretos.');
                    redirect($this->login);
                }
            }

        }

    }

    public function scPainel(){
        $this->load->library('info_plano');
        $this->load->model('mapos_model', 'mapos');
        ($this->mapos->getDbVersion()) ? $this->data['db_conect'] = true : $this->data['db_conect'] = false;

        ($this->db->db_debug == true) ? $this->data['db_debug'] = true : $this->data['db_debug'] = false;

        $this->data['sc_version'] = $this->info_plano->sc_Version();

        $this->data['db_version'] = $this->info_plano->db_version();

        if($this->db == true){
            $this->data['db_current'] = $this->mapos->getDbVersion();
        }else{
            $this->data['db_current'] = null;
        }


        $this->load->view('sc/sc_painel', $this->data);
    }
}