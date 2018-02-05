<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/12/2017
 * Time: 03:44
 */

class MY_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();

        if((!$this->session->userdata('id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
            redirect(base_url());
        }
    }

}