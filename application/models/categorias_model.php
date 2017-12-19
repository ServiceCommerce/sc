<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 11:03
 */

class Categorias_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function get($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

        $this->db->select($fields);
        $this->db->from('categoria_produto');
        $this->db->where('exibir', 1);
        if ($perpage != 0) {
            $this->db->limit($perpage,$start);
        }

        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }# End GET

    function getById($id){
        $this->db->where('idCategoria_prod',$id);
        $this->db->limit(1);
        return $this->db->get('categoria_produto')->row();
    }

    function count($table){
        return $this->db->count_all($table);
    }
}