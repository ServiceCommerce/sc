<?php

class Usuarios extends MY_Controller {
    
    function __construct() {
        parent::__construct();


        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){
          $this->session->set_flashdata('error','User-10001');
          redirect(base_url());
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('usuarios_model', '', TRUE);
        $this->load->model('mapos_model', '', TRUE);
        $this->data['menuUsuarios'] = 'Usuários';
        $this->data['menuConfiguracoes'] = 'Configurações';
        $this->data['title'] = 'Usuários';

    }#end __construct

    function index(){
		$this->gerenciar();
	}

	// tela de gerenciamento de usuários
	function gerenciar(){
        
        $this->load->library('pagination');

        $config['base_url'] = base_url().'index.php/usuarios/gerenciar/';
        $config['total_rows'] = $this->usuarios_model->count('usuarios');
        $config['per_page'] = 100;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

		$this->data['results'] = $this->usuarios_model->get($config['per_page'],$this->uri->segment(3));

		$this->data['title'] .= ' - Gerenciar';
		$this->data['footerScript'] = 'usuarios';

	    $this->data['view'] = 'usuarios/usuarios';
       	$this->load->view('tema/header',$this->data);

    }#END gerenciar()
	
    function adicionar(){  
          
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('usuarios') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);

        } else
        {     

            $this->load->library('encrypt');                       
            $data = array(
                    'nome' => set_value('nome'),
					'email' => set_value('email'),
					'senha' => $this->encrypt->sha1($this->input->post('senha')),
					'situacao' => set_value('situacao'),
                    'permissoes_id' => $this->input->post('permissoes_id'),
					'dataCadastro' => date('Y-m-d')
            );
           
			if ($this->usuarios_model->add('usuarios',$data) == TRUE)
			{
                $this->session->set_flashdata('success','User-001');
				redirect(base_url().'index.php/usuarios/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';

			}
		}
        $this->data['title']= "Usuários - Adicionar";
        $this->data['footerScript'] = 'usuarios/adicionar';

        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome');   
		$this->data['view'] = 'usuarios/adicionarUsuario';
        $this->load->view('tema/header',$this->data);

    }#End adicionar()
    
    function editar(){  
          
        $this->load->library('form_validation');

        if ($this->form_validation->run('editar_usuario') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        { 

            if ($this->input->post('idUsuarios') == 1 && $this->input->post('situacao') == 0)
            {
                $this->session->set_flashdata('error','User-10002');
                redirect(base_url().'index.php/usuarios/editar/'.$this->input->post('idUsuarios'));
            }

            $senha = $this->input->post('senha'); 
            if($senha != null){
                $this->load->library('encrypt');   
                $senha = $this->encrypt->sha1($senha);

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'email' => $this->input->post('email'),
                        'senha' => $senha,
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );
            }  

            else{

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'email' => $this->input->post('email'),
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );

            }  

			if ($this->usuarios_model->edit('usuarios',$data,'idUsuarios',$this->input->post('idUsuarios')))
			{
                $this->session->set_flashdata('success','User-002');
				redirect(base_url().'index.php/usuarios/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';

			}
		}

		$this->data['result'] = $this->usuarios_model->getById($this->uri->segment(3));
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 

        $this->data['title'] .= ' - Editar';

		$this->data['view'] = 'usuarios/editarUsuario';
        $this->load->view('tema/header',$this->data);


    }#End editar()

    function excluir(){
            $ID =  $this->uri->segment(3);
            $this->usuarios_model->delete('usuarios','idUsuarios',$ID);             
            redirect(base_url().'index.php/usuarios/gerenciar/');
    }#End excluir()

    // Metodo responsável por alterar imagem de perfil do usuário
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
    }#End imageProfile()

    // Tela MINHA CONTA
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
}#End class

