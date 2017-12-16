<?php

class Clientes extends CI_Controller {
    private $idCiente ='';
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('clientes_model','',TRUE);
            $this->load->model('contatos_model','',TRUE);
            $this->load->model('endereco_model','',TRUE);
            $this->data['menuClientes'] = 'clientes';
            $this->data['title'] = 'Clientes';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Clie-10001');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/clientes/gerenciar/';
        $config['total_rows'] = $this->clientes_model->count('clientes');
        $config['per_page'] = 500;
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
        
	    $this->data['results'] = $this->clientes_model->get('clientes','idClientes,nome,documento','',$config['per_page'],$this->uri->segment(3));

	    $this->data['title'] = 'Clientes - Gerenciar';
	    $this->data['footerScript'] = 'clientes';

       	$this->data['view'] = 'clientes/clientes';
       	$this->load->view('tema/header',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){
           $this->session->set_flashdata('error','Clie-10002');
           redirect(base_url());
        }

        $this->load->library('form_validation');

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nome' => set_value('nomeCliente'),
                'documento' => set_value('documento'),
                'dataCadastro' => date('Y-m-d')
            );

            $id = $this->clientes_model->add('clientes', $data, TRUE);
            if (!is_numeric($id)) {
                $this->session->set_flashdata('error','Clie-10003');
                redirect(current_url());
            } else {
                $this->idCiente = $id;
                $erro;

                $query_contato = array(
                    'telefone'  => $this->input->post('telefone'),
                    'email'     => $this->input->post('email'),
                    'clientes_id'   => $this->idCiente
                );

                if(!$this->clientes_model->add('contato', $query_contato) == true){
                    $erro = 'Contato';
                }else{
                    $query_endereco = array(
                        'rua'       => $this->input->post('rua'),
                        'numero'    => $this->input->post('numero'),
                        'bairro'    => $this->input->post('bairro'),
                        'cep'       => $this->input->post('cep'),
                        'cidade'    => $this->input->post('cidade'),
                        'estado'    => $this->input->post('estado'),
                        'clientes_id'   => $this->idCiente
                    );
                }

                if(!$this->clientes_model->add('endereco', $query_endereco) == true){
                    if(!empty($erro)){
                        $erro .= ' e Endereço';
                    }else{
                        $erro = 'Endereço';
                    }
                }else{
                    $this->session->set_flashdata('success','Clie-001');
                    redirect(base_url('index.php/clientes'));
                }

                $this->session->set_flashdata('error','Clie-10004');
                redirect(base_url('index.php/clientes/editar/'. $this->idCiente));
            }
        }

        $this->data['view'] = 'clientes/adicionarCliente';
        $this->load->view('tema/header', $this->data);

    }

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
           $this->session->set_flashdata('error','Clie-10005');
           redirect(base_url());
        }
        $this->load->library('form_validation');

        $this->data['resultCliente'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['resultContato'] = $this->contatos_model->getById('contato', $this->uri->segment(3));
        $this->data['resultEndereco'] = $this->endereco_model->getById($this->uri->segment(3));

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $erro = false;

            # QUERY DE ALTERAÇÃO CLIENTE
            $editCliente = array(
                'nome'   => $this->input->post('nomeCliente'),
                'documento'     => $this->input->post('documento')
            );

            if(!$this->clientes_model->edit('clientes', $editCliente, 'idClientes', $this->uri->segment(3))){
                $erro = true;
                $msgErro = 'Nome, CPF/CNPJ ';
            }

            # QUERY DE ALTERAÇÃO CONTATO
            $editContato = array(
                'telefone'  => $this->input->post('telefone'),
                'email'     => $this->input->post('email')
            );

            if(!$this->contatos_model->edit('contato', $editContato, 'idContato', $this->data['resultContato']->idContato)){
                $erro = true;
                $msgErro .= 'E-mail, Telefone, Celular ';
            }

            # QUERY DE ALTERAÇÃO ENDEREÇO
            $editEndereço = array(
                'rua'       => $this->input->post('rua'),
                'numero'    => $this->input->post('numero'),
                'bairro'    => $this->input->post('bairro'),
                'cep'       => $this->input->post('cep'),
                'cidade'    => $this->input->post('cidade'),
                'estado'    => $this->input->post('estado')
            );

            if(!$this->endereco_model->edit('endereco', $editEndereço, 'idEndereco',  $this->data['resultEndereco']->idEndereco)){
                $erro = true;
                $msgErro .= 'Rua, Numero, Bairro, CEP, Cidade, Estado';
            }

            if($erro == true){
                $this->session->set_flashdata('error', 'Clie-10006');
                redirect(base_url('index.php/clientes'));
            }else{
                $this->session->set_flashdata('success', 'Clie-002');
                redirect(base_url('index.php/clientes'));
            }

        }

        $this->data['view'] = 'clientes/editarCliente';
        $this->load->view('tema/header', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Clie-10007');
           redirect(base_url());
        }

        $this->data['resultCliente'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['resultContato'] = $this->contatos_model->getById('contato', $this->uri->segment(3));
        $this->data['resultEndereco'] =$this->endereco_model->getById($this->uri->segment(3));

        $this->data['resultOS'] = $this->clientes_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'clientes/visualizar';
        $this->load->view('tema/header', $this->data);

        
    }
	
    public function excluir(){

            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
               $this->session->set_flashdata('error','Clie-10008');
               redirect(base_url());
            }

            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Clie-10009');
                redirect(base_url().'index.php/clientes/gerenciar/');
            }

            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $os = $this->db->get('os')->result();

            if($os != null){

                foreach ($os as $o) {
                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('servicos_os');

                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('produtos_os');


                    $this->db->where('idOs', $o->idOs);
                    $this->db->delete('os');
                }
            }

            // excluindo Vendas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $vendas = $this->db->get('vendas')->result();

            if($vendas != null){

                foreach ($vendas as $v) {
                    $this->db->where('vendas_id', $v->idVendas);
                    $this->db->delete('itens_de_vendas');


                    $this->db->where('idVendas', $v->idVendas);
                    $this->db->delete('vendas');
                }
            }

            //excluindo receitas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $this->db->delete('lancamentos');



            $this->clientes_model->delete('clientes','idClientes',$id); 

            $this->session->set_flashdata('success','Clie-003');
            redirect(base_url().'index.php/clientes/gerenciar/');
    }
}

