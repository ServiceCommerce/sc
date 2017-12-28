<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/12/2017
 * Time: 21:18
 */

class SV extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function politica_de_privacidade(){
        $this->load->view('sv/politica_de_privacidade');
    }
}