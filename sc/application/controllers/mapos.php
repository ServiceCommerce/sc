<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mapos_model','',TRUE);
        $this->load->library('encrypt');
        $this->load->library('info_plano');

        $this->load->helper(array('form', 'codegen_helper'));
        $version = $this->info_plano->checkDbVersion($this->mapos_model->getDbVersion());

        if($version[0] == true){
            redirect(base_url('index.php/erro/db_error_version'));
        }
    }

    public function index() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect(base_url());
        }

        $this->data['title'] = 'Dashboard2';
        //$this->data['ordens'] = $this->mapos_model->getOsAbertas();
        $this->data['produtos'] = $this->mapos_model->getProdutosMinimo();
        // $this->data['os'] = $this->mapos_model->getOsEstatisticas();
        // $this->data['estatisticas_financeiro'] = $this->mapos_model->getEstatisticasFinanceiro();
        $this->data['menuPainel'] = 'Painel';
        $this->data['footerScript'] = 'dashboard';
        $this->data['view'] = 'mapos/painel';
        $this->load->view('tema/header',  $this->data);
      
    }

    public function minhaConta() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }
        $this->load->library('form_validation');
        if ($this->form_validation->run('editar_usuario') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $query = array(
                'nome' => $this->input->post('nome'),
                'email'=> $this->input->post('email')
            );
            $this->load->model('usuarios_model', 'usuarios');
            if($this->usuarios->edit('usuarios', $query, 'idUsuarios', $this->session->userdata('id'))){
                $this->session->set_flashdata('success', 'Syst-005');
                redirect(base_url('index.php/mapos/minhaConta'));
            }
        }

        $this->load->model('contatos_model', 'contato', true);

        $this->data['usuario'] = $this->mapos_model->getById($this->session->userdata('id'));

        $this->data['title'] = 'Minha conta';



        $this->data['view'] = 'mapos/minhaConta';
        $this->load->view('tema/header',  $this->data);
     
    }

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

    public function pesquisar() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }
        
        $termo = $this->input->get('termo');

        $data['results'] = $this->mapos_model->pesquisar($termo);
        $this->data['produtos'] = $data['results']['produtos'];
        $this->data['servicos'] = $data['results']['servicos'];
        $this->data['os'] = $data['results']['os'];
        $this->data['clientes'] = $data['results']['clientes'];
        $this->data['view'] = 'mapos/pesquisa';
        $this->load->view('tema/topo',  $this->data);
      
    }

    public function login(){
        if(($this->session->userdata('logado'))){
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->view('mapos/login');

    }

    public function sair(){
        $this->session->sess_destroy();
        redirect(base_url());
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


    public function backup(){

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){
           $this->session->set_flashdata('error','Syst-10003');
           redirect(base_url());
        }

        
        
        $this->load->dbutil();
        $prefs = array(
                'format'      => 'zip',
                'filename'    => 'backup'.date('d-m-Y').'.sql'
              );

        $backup =& $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file(base_url().'backup/backup.zip', $backup);

        $this->load->helper('download');
        force_download('backup'.date('d-m-Y H:m:s').'.zip', $backup);
    }


    public function emitente(){   

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
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

    function do_upload(){
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

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


    public function cadastrarEmitente() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/mapos/login');
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
            redirect(base_url().'index.php/mapos/emitente');
            
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
                redirect(base_url().'index.php/mapos/emitente');
            }
            else{
                $this->session->set_flashdata('error','Syst-10009');
                redirect(base_url().'index.php/mapos/emitente');
            }
            
        }
    }


    public function editarEmitente() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/mapos/login');
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
            redirect(base_url().'index.php/mapos/emitente');
            
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
                redirect(base_url().'index.php/mapos/emitente');
            }
            else{
                $this->session->set_flashdata('error','Syst-10012');
                redirect(base_url().'index.php/mapos/emitente');
            }
            
        }
    }


    public function editarLogo(){
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('index.php/mapos/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Syst-10013');
           redirect(base_url());
        }

        $id = $this->input->post('id');
        if($id == null || !is_numeric($id)){
           $this->session->set_flashdata('error','Syst-10014');
           redirect(base_url().'index.php/mapos/emitente'); 
        }
        $this->load->helper('file');
        delete_files(FCPATH .'assets/uploads/');

        $image = $this->do_upload();
        $logo = base_url().'assets/uploads/'.$image;

        $retorno = $this->mapos_model->editLogo($id, $logo);
        if($retorno){

            $this->session->set_flashdata('success','Syst-003');
            redirect(base_url().'index.php/mapos/emitente');
        }
        else{
            $this->session->set_flashdata('error','Syst-10015');
            redirect(base_url().'index.php/mapos/emitente');
        }

    }

    public function addProfile(){

        $this->load->library('upload');

        $config['upload_path'] = './docs/System/UserProfile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $config['file_name'] = 'UserProfile-'. date('Ymdsu');
        // set biblioteca de upload
        $this->upload->initialize($config);

        // Caso o arquivo não tenha sido upado
        if (!$this->upload->do_upload('imgfile')){

            $this->session->set_flashdata('error', 'Syst-10016');
            redirect(base_url().'index.php/mapos/minhaConta');

        }else{

            $data = $this->upload->data();

            $url_img = base_url().'docs/System/userProfile/'. $data['file_name'];
            // Monta a QUERY
            $q = array('img_url' => $url_img);

            unlink('docs/system/userprofile/'. $data['filme_name']);

            // caso não seja possivel inserir no banco de dados
            $up = $this->mapos_model->edit('usuarios', $q, 'idUsuarios', $this->session->userdata('id'));


            if ($up == true) {

                $this->session->set_userdata('profile', $url_img);

                $this->session->set_flashdata('error', 'Syst-10007');

                redirect(base_url().'index.php/mapos/minhaConta');
            }else{ // tudo OK
                $this->session->set_flashdata('success', 'Syst-004');

                #$this->setProfileSession($q['url']);

                redirect(base_url().'index.php/mapos/minhaConta');
            }
        }
    }#End imageProfile(){


}
