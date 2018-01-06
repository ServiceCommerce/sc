<?php

/*
 * ---------------------------------------------------------------
 *      Class PRODUTOS
 * ---------------------------------------------------------------
 * 
 * Classe responsável por fazer o controle de todas as partes de produtos.
 * 
 * - INDEX          - Chama o gerenciar;
 * - GERENCIAR      - Responsável por recolher e 
 * - ADICIONAR      -
 * - EDITAR         -
 * - VIZUALISAR     -
 * - EXCLUIR        -
 * - ADICIONAR_SITE -
 */

class Produtos extends MY_Controller{
    private $dados_produto;

    function __construct(){
        parent::__construct();


        $this->load->helper(array('form', 'codegen_helper', 'url'));
        $this->load->model('produtos_model', 'produtos', TRUE);
        $this->load->model('categorias_model', 'categoria', TRUE);
        $this->data['menuProdutos'] = 'Produtos';
        $this->data['title'] = 'Produtos';

    }

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          INDEX
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function index()
    {
        $this->gerenciar();
    }

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          GERENCIAR
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function gerenciar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
            $this->session->set_flashdata('error', 'Prod-10001');
            redirect(base_url());
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url() . 'index.php/produtos/gerenciar/';
        $config['total_rows'] = $this->produtos->count('produtos');
        $config['per_page'] = 10;
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

        $this->data['results'] = $this->produtos->get('produtos', 'idProdutos,nome,unidade,precoCompra,precoVenda,estoque,estoqueMinimo', '', $config['per_page'], $this->uri->segment(3));

        $this->data['footerScript'] = 'produtos';
        $this->data['title'] = 'Produtos - Gerenciar';

        $this->data['view'] = 'produtos/produtos';
        $this->load->view('tema/header', $this->data);

    }

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          ADICIONAR
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function adicionar(){

        // Checando permissões
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aProduto')) {
            $this->session->set_flashdata('error', 'Prod-10002');
            redirect(base_url());
        }

        // Carregando bibliotecas
        $this->load->library('form_validation');
        $this->load->library('info_plano', 'plano');

        $this->data['custom_error'] = '';

        if ($this->input->post('exibirNoSite') == TRUE) {
            $exibir = 1;
        } else {
            $exibir = 0;
        }

        // verifica se há categoria cadastrada, caso não haja envia para o cadastro de categorias
        if ($this->categoria->count('categoria_produto') == 0) {
            $this->session->set_flashdata('error', 'Prod-10003');
            redirect(base_url() . 'index.php/categorias/');
        } else {
            $this->data['categ'] = $this->categoria->get('idCategoria_prod, nome', '', '', '');
        }#End if ($this->categoria->count('categoria') == 0) {

        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aProdutoS')) {

            if ($this->produtos->count_site() < $this->info_plano->produto()) {
                $this->data['exibir_site'] = '<INPUT TYPE="checkbox" NAME="exibirNoSite" VALUE="1"> Exibir produto no site';
            } else {
                $this->data['exibir_site'] = 'Você atingiu o limite de exposição ao site.';
            }#end IF

        } else {
            $this->data['exibir_site'] = 'Você não tem permissão para adicionar produtos no site';

        }#end if($this->permission->checkPermission($this->session->userdata('permissao'),'aProdutoS')) {

        //verifica se o valor é fixo ou a partir
        if ($this->input->post('aPartir') == TRUE) {
            $aPartir = $this->input->post('aPartir');
        } else {
            $aPartir = null;
        }#End if ($this->input->post('aPartir') == TRUE) {

        // Verifica se o produto tem estoque
        if ($this->input->post('semEstoque') == TRUE) {
            $semEstoque = 1;
            $estoque = null;
            $estoqueMinimo = null;
        } else {
            $semEstoque = 0;
            $estoque = $this->input->post('estoque');
            $estoqueMinimo = $this->input->post('estoqueMinimo');
        }#End if ($this->input->post('semEstoque') == TRUE) {

        // Recebe e trada a entrada de valores
        $precoCompra = $this->input->post('precoCompra');
        $precoCompra = str_replace(",", "", $precoCompra);
        $precoVenda = $this->input->post('precoVenda');
        $precoVenda = str_replace(",", "", $precoVenda);

        // organiza os dados para serem inseridos no banco
        $query = array(
            'nome' => $this->input->post('nome'),
            'unidade' => $this->input->post('unidade'),
            'precoCompra' => $precoCompra,
            'precoVenda' => $precoVenda,
            'estoque' => $estoque,
            'estoqueMinimo' => $estoqueMinimo,
            'aPartir' => $aPartir,
            'semestoque' => $semEstoque,
            'categoria_prod_id' => $this->input->post('categoria'),
            'exibir' => $exibir
        );

        // Verifica se PRODUTOS foi validado
        if ($this->form_validation->run('produtos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            // Insere dados no banco e retorna o ID dos dados inseridos
            $id = $this->produtos->add($query, TRUE);

            // Caso o valos retornado seja um ID
            if (is_numeric($id)) {

                // Caso produto seja exibido no site
                if ($this->input->post('exibirNoSite') == TRUE) {
                    // Mensagem de sucesso
                    $this->session->set_flashdata('success', 'Prod-002');
                    // Redireciona para a tela de parametros de exibiçao com ID dos dados inseridos
                    redirect(base_url() . 'index.php/produtos/publicarSite?idProduto=' . $id);

                } else {
                    $this->session->set_flashdata('success', 'Prod-003');
                    redirect(base_url() . 'index.php/produtos/');

                }# End if ($this->input->post('exibirNoSite') == TRUE) {

            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }# End else if ($this->produtos_model->add('produtos', $data) == TRUE) {

        }#End else ($this->form_validation->run('produtos') == false) {

        $this->data['title'] .= ' - Adicionar';

        $this->data['view'] = 'produtos/adicionarProduto';
        $this->load->view('tema/header', $this->data);

    }#End Adicionar()

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          EDITAR
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function editar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) {
            $this->session->set_flashdata('error', 'Prod-10004');
            redirect(base_url());
        }
        $this->load->library('form_validation');

        $this->data['result'] = $this->produtos->getById($this->uri->segment(3));

        if ($this->form_validation->run('produtos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $id = $this->input->post('id');

            if ($this->input->post('exibirNoSite') == TRUE) {
                $exibir = 1;
            } else {
                $exibir = 0;
            }

            if ($this->input->post('aPartir') == TRUE) {
                $aPartir = $this->input->post('aPartir');
            } else {
                $aPartir = null;
            }#End if ($this->input->post('aPartir') == TRUE) {

            // Verifica se o produto tem estoque
            if ($this->input->post('semEstoque') == TRUE) {
                $semEstoque = 1;
                $estoque = null;
                $estoqueMinimo = null;
            } else {
                $semEstoque = 0;
                $estoque = $this->input->post('estoque');
                $estoqueMinimo = $this->input->post('estoqueMinimo');
            }#End if ($this->input->post('semEstoque') == TRUE) {

            // Recebe e trada a entrada de valores
            $precoCompra = $this->input->post('precoCompra');
            $precoCompra = str_replace(",", "", $precoCompra);
            $precoVenda = $this->input->post('precoVenda');
            $precoVenda = str_replace(",", "", $precoVenda);

            // organiza os dados para serem inseridos no banco
            $query = array(
                'nome' => $this->input->post('nome'),
                'unidade' => $this->input->post('unidade'),
                'precoCompra' => $precoCompra,
                'precoVenda' => $precoVenda,
                'estoque' => $estoque,
                'estoqueMinimo' => $estoqueMinimo,
                'aPartir' => $aPartir,
                'semestoque' => $semEstoque,
                'categoria_prod_id' => $this->input->post('categoria'),
                'exibir' => $exibir
            );



            // Caso o valos retornado seja um ID
            if ($this->produtos->edit($query, array('idProdutos' => $this->uri->segment(3)))) {

                // Caso produto seja exibido no site seja diferente
                if ($this->data['result']->exibir == 0 && $exibir == 1) {
                    // Mensagem de sucesso
                    $this->session->set_flashdata('success', 'Prod-002');
                    // Redireciona para a tela de parametros de exibiçao com ID dos dados inseridos
                    redirect(base_url() . 'index.php/produtos/publicarSite?idProduto=' . $id);

                } else {
                    $this->session->set_flashdata('success', 'Prod-006');
                    redirect(base_url() . 'index.php/produtos/');

                }# End if ($this->input->post('exibirNoSite') == TRUE) {

            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }# End else if ($this->produtos_model->add('produtos', $data) == TRUE) {

        }#End else ($this->form_validation->run('produtos') == false){} ELSE{


        $this->data['categoria'] = $this->categoria->get('idCategoria_prod, nome', '', '', '');

        $this->data['view'] = 'produtos/editarProduto';
        $this->load->view('tema/header', $this->data);

    }

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          VISUALIZAR
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function visualizar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
            $this->session->set_flashdata('error', 'Prod-10001');
            redirect(base_url());
        }

        // Recebe os dados do produto
        $result = $this->produtos->getById($this->uri->segment(3));

        // escreve uma mensagem apresentavel caso o produto não tenha estoque
        if ($result->estoque == null) {
            $result->estoque = 'Produto sem estoque';
            $result->estoqueMinimo = 'Produto sem estoque';
        }#End if

        // array para converter Object em array
        $dados = array();

        foreach ($result as $key => $value) {
            $dados[$key] = $value;
        }#End foreach

        $where = array('produtos_id' => $this->uri->segment(3));

        $this->data['imagem_url'] = $this->produtos->getIMG('url', $where);

        $this->data['categoria'] = $this->categoria->getById($result->categoria_prod_id);

        if($result->exibir == 1){$this->data['exibir_site'] = 'checked="checked"';}

        $this->data['result'] = $dados;

        if ($this->data['result'] == null) {
            $this->session->set_flashdata('error', 'Prod-10005');
            redirect(base_url() . 'index.php/produtos/editar/' . $this->input->post('idProdutos'));
        }

        $this->data['view'] = 'produtos/visualizarProduto';
        $this->load->view('tema/header', $this->data);

    }

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          EXCLUIR
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function excluir()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dProduto')) {
            $this->session->set_flashdata('error', 'Prod-10006');
            redirect(base_url());
        }


        $id = $this->input->post('id');
        if ($id == null) {

            $this->session->set_flashdata('error', 'Prod-10007');
            redirect(base_url() . 'index.php/produtos/gerenciar/');
        }

        //$this->db->where('produtos_id', $id);
        //$this->db->delete('produtos_os');


        //$this->db->where('produtos_id', $id);
        //$this->db->delete('itens_de_vendas');

        if ($this->produtos->getById($id)->exibir == 1){
            $this->load->helper('file');

            foreach ($this->produtos->getIMG('url', array('produtos_id'=> $id)) as $item) {
                $dir = explode( base_url(), $item->url);
                unlink('.'.$dir[1]);
            }

            $this->produtos->delete('imagem_produto', 'produtos_id', $id);
        }

        $this->produtos->delete('produtos', 'idProdutos', $id);


        $this->session->set_flashdata('success', 'Prod-004');
        redirect(base_url() . 'index.php/produtos/gerenciar/');
    }# End function excluir(){

    /**
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     ********************************************************************************************************************************************
     * ----------------------------------------------------
     *          ADICIONAR SITE
     * ----------------------------------------------------
     *
     *
     *
     *
     *
     *
     */

    function publicarSite()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aProdutoS')) {
            $this->session->set_flashdata('error', 'Prod-10008');
            redirect(base_url());
        }

        // instancia o plano do cliente
        $this->load->library('info_plano');


        // Set configurações de Upload
        $config['upload_path'] = './docs/Exibir/produtos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $config['file_name'] = 'Img_Produto-' . '-' . date('Ymd');

        // set biblioteca de upload
        $this->load->library('upload', $config);

        // Caso os arquivos sejam enviados
        if ($this->input->post('up') || $this->input->post('up') == true) {

            $id = $this->input->post('id');

            $query = array();

            // Loop para coletar dados do upload
            for ($i = 0; $i < $this->info_plano->imagem_produto(); $i++) {

                // nome do upload
                $tmp_input_name = 'imagem' . $i;


                // Caso o upload não tenha sido feito
                if (!$this->upload->do_upload($tmp_input_name)) {

                    if (!$_FILES[$tmp_input_name]['error'] == 4) {
                        $error = array('error' => $this->upload->display_errors());
                        echo $this->upload->display_errors();

                    }# End if

                } else {// Caso o upload tenha ocorrido com sucesso

                    $data = $this->upload->data();

                    $q = array(
                        'nomeImagem' => $data['file_name'],
                        'tipo' => $data['file_ext'],
                        'url' => base_url() . '/docs/Exibir/produtos/' . $data['file_name'],
                        'cadastro' => date('Ymd'),
                        'produtos_id' => $id,
                    );

                    array_push($query, $q);

                    if (!is_numeric($this->produtos->addIMG($q, true))) {
                        $error = 'Não foi possivel fazer a a inserção da imagem';
                        $url_imag[] = $data['full_path'];
                    }
                }
            }# End for

            if (!empty($error)) {

                $this->session->set_flashdata('error', 'Prod-10009');

                foreach ($url_imag as $key => $value) {
                    unlink($value);
                }

                redirect(base_url() . 'index.php/produtos');
            } else {

                $this->session->set_flashdata('success', 'Prod-Prod-005');
                redirect(base_url() . 'index.php/produtos/descricaoSite?idProduto=' . $id);

            }#end if (!empty($error)) {

            //echo print_r($query);

        } else {

            $id = $this->input->get('idProduto');

            $this->data['title'] .= ' - Adicionar no site';


            $this->data['img'] = $this->info_plano->imagem_produto();
            $this->data['id'] = $id;
            $this->data['view'] = 'produtos/adicionarNoSite';
            $this->load->view('tema/header', $this->data);

        }# End -- }else{ # if ($this->input->post('up') || $this->input->post('up') == true) {

    }# End function addSite(){

    public function descricaoSite(){

        if ($this->input->post('up') || $this->input->post('up') == true) {

            $id = $this->input->post('id');
            $query = array(
                'descricao' => $this->input->post('descricao')
            );
            if($this->produtos->addById($id, $query)){
                if($this->produtos->editImg(array('descricao' => 'principal'), array('idImg_prod' => $this->input->post('destaque')))){
                    $this->session->set_flashdata('success', 'Prod-001');
                    redirect(base_url() . 'index.php/produtos');
                }
            }
        }else{
            $id = $this->input->get('idProduto');
        }
        $this->data['imagens'] = $this->produtos->getIMG('idImg_prod,url', array('produtos_id' => $id));

        $this->data['id'] = $id;
        $this->data['view'] = 'produtos/adicionarDescricao';
        $this->load->view('tema/header', $this->data);
    }
}

