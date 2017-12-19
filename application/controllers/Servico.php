<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 09:45
 */

class Servico extends CI_Controller{
    function __construct(){
        parent::__construct();
    }#end construct

    function index(){
        $this->servico();
    }#End index

    function servico(){
        $this->data['title'] = 'Serviços';
        $this->data['servicos_current'] = 'current';
        $this->data['view'] = 'Servicos';
        $this->load->view('assets/header', $this->data);
    }#End servico

}