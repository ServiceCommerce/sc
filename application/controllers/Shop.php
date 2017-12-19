<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 19/10/2017
 * Time: 17:36
 */

class Shop extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->data['title'] = 'Shop';
        $this->load->model('produtos_model', 'produtos', TRUE);
        $this->load->model('categorias_model', 'categorias', TRUE);

    }#end Construct

    public function index(){

    }#end index

    public function produtos(){

        $this->data['categorias'] = $this->categorias->get('idCategoria_prod,nome');

        if($this->uri->segment(3)){
            $this->data['produtos'] = $this->produtos->getByCategoria('produtos', 'produtos.categoria_prod_id,produtos.idProdutos,produtos.nome,produtos.descricao,produtos.precoVenda,produtos.aPartir,imagem_produto.url', $this->uri->segment(3));
        }else{
            $this->data['produtos'] = $this->produtos->getAll('produtos', 'produtos.categoria_prod_id,produtos.idProdutos,produtos.nome,produtos.descricao,produtos.precoVenda,produtos.aPartir,imagem_produto.url');
        }

        $this->data['title'] .= ' - Produtos';
        $this->data['view'] = 'Shop';
        $this->load->view('assets/header', $this->data);

    }

    public function produtosSingle(){
        $this->data['view'] = 'single';
        $this->data['produtos'] = $this->produtos->getById($this->uri->segment(3));
        $this->data['imagemProduto'] = $this->produtos->getIMG('url', array('produtos_id' => $this->uri->segment(3)), true);
        $this->data['produtosCategoria'] = $this->produtos->getByCategoria('produtos', 'produtos.idProdutos,produtos.nome,produtos.descricao,produtos.precoVenda,produtos.aPartir,imagem_produto.url', $this->data['produtos']->categoria_prod_id, 4);
        $this->load->view('assets/header', $this->data);
    }

}