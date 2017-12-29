<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 29/12/2017
 * Time: 17:02
 */

class Sc extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('info_plano');
    }

    public function sc_painel(){
        ($this->db == true) ? $this->data['db_conect'] = true : $this->data['db_conect'] = false;

        ($this->db->db_debug == true) ? $this->data['db_debug'] = true : $this->data['db_debug'] = false;

        $this->data['sc_version'] = $this->info_plano->sc_Version();


            $this->load->view('sc/sc_painel', $this->data);
    }
}