<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 20/12/2017
 * Time: 23:41
 */

class Erro extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mapos_model', 'mapos');
        $this->load->library('info_plano');
    }

    public function db_error_version(){
        //$this->data['mensagem'] = $this->uri->segment(3);
        $this->data['currentVersion'] = $this->mapos->getDbVersion();
        $this->data['dbVersion'] = $this->info_plano->db_Version();
        $this->load->view('error/db_error', $this->data);
    }#public function db_error_version(){
}