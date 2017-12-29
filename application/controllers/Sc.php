<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/12/2017
 * Time: 21:18
 */

class Sc extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function painel(){
        ($this->db == true) ? $this->data['db_conect'] = true : $this->data['db_conect'] = false;

        ($this->db->db_debug == true) ? $this->data['db_debug'] = true : $this->data['db_debug'] = false;

        $this->load->view('sc/sc_painel', $this->data);
    }

    public function politica_de_privacidade(){
        $this->load->view('sc/politica_de_privacidade');
    }
}