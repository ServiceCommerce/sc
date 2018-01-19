<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emitente extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mapos_model');

        $this->load->helper(array('form', 'codegen_helper'));


    }

    public function index() {
        $this->emitente();
    }

    public function emitente(){   

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('login/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Syst-10004');
           redirect(base_url());
        }

        $data['title'] = 'Emitente';
        $data['menuConfiguracoes'] = 'Configuracoes';
        $data['dados'] = $this->mapos_model->getEmitente();
        $data['view'] = 'mapos/emitente';
        $this->load->view('tema/header',$data);
    }

    public function cadastrarEmitente() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/login/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Syst-10006');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Razão Social','required|xss_clean|trim');
        $this->form_validation->set_rules('cnpj','CNPJ','required|xss_clean|trim');
        $this->form_validation->set_rules('ie','IE','required|xss_clean|trim');
        $this->form_validation->set_rules('logradouro','Logradouro','required|xss_clean|trim');
        $this->form_validation->set_rules('numero','Número','required|xss_clean|trim');
        $this->form_validation->set_rules('bairro','Bairro','required|xss_clean|trim');
        $this->form_validation->set_rules('cidade','Cidade','required|xss_clean|trim');
        $this->form_validation->set_rules('uf','UF','required|xss_clean|trim');
        $this->form_validation->set_rules('telefone','Telefone','required|xss_clean|trim');
        $this->form_validation->set_rules('email','E-mail','required|xss_clean|trim');


        

        if ($this->form_validation->run() == false) {
            
            $this->session->set_flashdata('error','Syst-10008');
            redirect(base_url().'index.php/emitente/');
            
        } 
        else {

            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $image = $this->do_upload();
            $logo = base_url().'assets/uploads/'.$image;


            $retorno = $this->mapos_model->addEmitente($nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email, $logo);
            if($retorno){

                $this->session->set_flashdata('success','Syst-002');
                redirect(base_url().'index.php/emitente/');
            }
            else{
                $this->session->set_flashdata('error','Syst-10009');
                redirect(base_url().'index.php/emitente/');
            }
            
        }
    }

    public function editarEmitente() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/login/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Syst-10010');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Razão Social','required|xss_clean|trim');
        $this->form_validation->set_rules('cnpj','CNPJ','required|xss_clean|trim');
        $this->form_validation->set_rules('ie','IE','required|xss_clean|trim');
        $this->form_validation->set_rules('logradouro','Logradouro','required|xss_clean|trim');
        $this->form_validation->set_rules('numero','Número','required|xss_clean|trim');
        $this->form_validation->set_rules('bairro','Bairro','required|xss_clean|trim');
        $this->form_validation->set_rules('cidade','Cidade','required|xss_clean|trim');
        $this->form_validation->set_rules('uf','UF','required|xss_clean|trim');
        $this->form_validation->set_rules('telefone','Telefone','required|xss_clean|trim');
        $this->form_validation->set_rules('email','E-mail','required|xss_clean|trim');


        

        if ($this->form_validation->run() == false) {
            
            $this->session->set_flashdata('error','Syst-10011');
            redirect(base_url().'index.php/emitente/');
            
        } 
        else {

            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $id = $this->input->post('id');


            $retorno = $this->mapos_model->editEmitente($id, $nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email);
            if($retorno){

                $this->session->set_flashdata('success','Syst-006');
                redirect(base_url().'index.php/emitente/');
            }
            else{
                $this->session->set_flashdata('error','Syst-10012');
                redirect(base_url().'index.php/emitente/');
            }
            
        }
    }

    public function editarLogo(){
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/login/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Syst-10013');
           redirect(base_url());
        }

        $id = $this->input->post('id');
        if($id == null || !is_numeric($id)){
           $this->session->set_flashdata('error','Syst-10014');
           redirect(base_url().'index.php/emitente/');
        }
        $this->load->helper('file');
        delete_files(FCPATH .'assets/uploads/');

        $image = $this->do_upload();
        $logo = base_url().'assets/uploads/'.$image;

        $retorno = $this->mapos_model->editLogo($id, $logo);
        if($retorno){

            $this->session->set_flashdata('success','Syst-003');
            redirect(base_url().'index.php/emitente/');
        }
        else{
            $this->session->set_flashdata('error','Syst-10015');
            redirect(base_url().'index.php/emitente/');
        }

    }

    function do_upload(){
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
            $this->session->set_flashdata('error','Syst-10005');
            redirect(base_url());
        }

        $this->load->library('upload');

        $image_upload_folder = FCPATH . 'assets/uploads';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp',
            'max_size'      => 2048,
            'remove_space'  => TRUE,
            'encrypt_name'  => TRUE,
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]['file_name'];
        }

    }
}
