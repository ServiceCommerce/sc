<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 21/12/2017
 * Time: 11:05
 */

class Login_model extends CI_Model {

    public function check_login($email, $senha){
        $this->db->where('email',$email);
        $this->db->where('telefone',$senha);
        $this->db->limit(1);
        $cliente = $this->db->get('contato')->row();

        if(count($cliente) > 0){
            return $cliente;
        }else{
            return false;
        }
    }

}