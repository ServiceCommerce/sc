<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 24/11/2017
 * Time: 17:47
 */

class teste extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->model('produtos_model', 'produtos');

    }

    function index(){

        $this->load->vliew('pasta/teste');
    }

    function abc(){

    }
}