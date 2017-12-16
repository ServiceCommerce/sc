<?php
class Categorias_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        // campos pesquizados
        $this->db->select($fields);

        // Tabela pesquizada
        $this->db->from('categoria_produto');

        // Caso seja declarado o LIMIT
        if ($perpage != 0) {
            $this->db->limit($perpage,$start);
        }

        // Caso seja declarado ORDER BY
       // $this->db->order_by('idCategoria','asc');

        // Caso seja declarado o WHERE
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
    
    function add($data){
        $this->db->insert('categoria_produto', $data);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
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
	
	function count($table, $where=null){
        $this->db->from($table);
        if($where !== null){
            $this->db->where($where);
            return count($this->db->get()->result());
        }else{
            return $this->db->count_all($table);
        }

    }
}