<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 11:03
 */
class Produtos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idProdutos','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getByCategoria($table,$fields,$where,$limit=false, $one=false,$array='array'){

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idProdutos','desc');
        $this->db->where('produtos.categoria_prod_id', $where);
        $this->db->join('imagem_produto', "produtos.idProdutos = imagem_produto.produtos_id AND imagem_produto.descricao = 'principal'");
        if ($limit != false){
            $this->db->limit($limit);
        }
        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getAll($table,$fields, $limit=false, $one=false,$array='array'){

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idProdutos','desc');
        $this->db->join('imagem_produto', "produtos.idProdutos = imagem_produto.produtos_id AND imagem_produto.descricao = 'principal' AND produtos.exibir = '1'");
        if ($limit != false){
            $this->db->limit($limit);
        }
        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->where('idProdutos',$id);
        $this->db->limit(1);
        return $this->db->get('produtos')->row();
    }

    function count($table){
        return $this->db->count_all($table);
    }


    function count_site(){
        $this->db->like('exibir', '1');
        $this->db->from('produtos');
        return $this->db->count_all_results();
    }


    function getIMG($fields,$where='',$url=false,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from('imagem_produto');
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();

        if($url == true){
            foreach ($result as $value) {

                $final[] = $value->url;

            }

            return $final;
        }else{
            return $result;
        }
    
    }






}