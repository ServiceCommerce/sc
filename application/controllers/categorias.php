<?php
/*

*/

class Categorias extends CI_Controller {
    
   

    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
       // $this->load->model('produtos_model', 'produtos', TRUE);
        $this->load->model('categorias_model', 'categoria', TRUE);
       //$this->data['menuProdutos'] = 'Produtos';

        $this->data['title'] = 'Categorias';
    }

    function index(){
	   $this->gerenciar();
    }

    function gerenciar(){
       
        $this->load->library('table');
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/categorias/gerenciar/';
        $config['total_rows'] = $this->categoria->count('categoria_produto');
        $config['per_page'] = 13;
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

        $this->data['results'] = $this->categoria->get('idCategoria_prod, nome, descricao','',$config['per_page'],$this->uri->segment(3));
       
        $this->data['view'] = 'categorias/categorias';
        $this->load->view('tema/header',$this->data);
       
        
    }
	
    function adicionar() {

        // Checando permissões
       if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCategoria')){
          $this->session->set_flashdata('error','cate-10001');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        
        if ($this->form_validation->run('categorias') == false) {
            //redirect(base_url() . 'index.php/os/');
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

        // cria a QUERY
        $query = array(
                'nome'          => $this->input->post('nome'),
                'descricao'     => $this->input->post('descricao'),
                'exibir'        => $this->input->post('exibirNoSite')
                );

            // Inserindo dados no banco
            if (!$this->categoria->add($query) == TRUE) {
             
                $this->session->set_flashdata('error', 'cate-10002');
                redirect(base_url('index.php/categorias/'));

            } else {
                $this->session->set_flashdata('success','Cate-001');
                redirect(base_url('index.php/categorias/'));
            }# End if ($this->categoria->add($query) == TRUE) {
        }#End else ($this->form_validation->run('produtos') == false) {

        $this->data['title'] .= ' - Adicionar';
        $this->data['view'] = 'categorias/adicionarCategoria';
        $this->load->view('tema/header', $this->data);
     
    }#End Adicionar()

    function editar() {
        // Checando permissões
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eCategoria')){
            $this->session->set_flashdata('error','Cate-10003');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['title'] .= ' - Editar';

        if ($this->form_validation->run('categorias') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            if ($this->input->post('exibirNoSite') == TRUE) {
                $exibir = 1;
            } else {
                $exibir = 0;
            }

            $query = array(
                'nome'          => $this->input->post('nome'),
                'descricao'     => $this->input->post('descricao'),
                'exibir'        => $exibir
            );
            if($this->categoria->edit('categoria_produto', $query, 'idCategoria_prod', $this->uri->segment(3)) == true){
                $this->session->set_flashdata('success', 'Cate-002');
                redirect(base_url('index.php/categorias'));
            }else{
                $this->session->set_flashdata('error', 'Cate-10004');
                redirect(base_url('index.php/categorias'));
            }
        }
        $this->data['result'] = $this->categoria->getById($this->uri->segment(3));
        $this->data['view'] = 'categorias/editarCategoria';
        $this->load->view('tema/header', $this->data);

    }


    function visualizar() {
        // Checando permissões
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCategoria')){
            $this->session->set_flashdata('error','Cate-10005');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['title'] .= ' - Visualizar';

        $this->data['result'] = $this->categoria->getById($this->uri->segment(3));
        $this->data['view'] =  'categorias/visualizarCategoria';
        $this->load->view('tema/header', $this->data);
    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dCategoria')){
           $this->session->set_flashdata('error','Cate-10006');
           redirect(base_url());
        }

        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Cate-10007');
            redirect(base_url().'index.php/categorias/gerenciar/');
        }

        if($this->categoria->count('produtos', array('categoria_prod_id' => $id, 'exibir' => '1')) >0 ){
            $this->session->set_flashdata('error','Cate-10008');
            redirect(base_url().'index.php/categorias/gerenciar/');
        }else{
            $this->categoria->delete('categoria_produto','idCategoria_prod',$id);

            $this->session->set_flashdata('success','Cate-003');
            redirect(base_url().'index.php/categorias/gerenciar/');
        }

    }
}

