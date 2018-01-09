<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 08/01/2018
 * Time: 20:54
 */

class Web_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }#End __construct()

    function getCategorias($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

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
}