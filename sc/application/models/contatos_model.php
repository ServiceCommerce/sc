<?php
class Contatos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idContato','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($table, $where){
        $this->db->where('clientes_id', $where);
        $this->db->limit(1);
        return $this->db->get($table)->row();
    }

    function add($table,$data, $return_id){
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1')
        {
            if ($return_id == TRUE) {
                return $this->db->insert_id();
            }else{
                return TRUE;
            }
        }

        return FALSE;
    }

    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }

        return FALSE;
    }

    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }

    function count($table) {
        return $this->db->count_all($table);
    }

}