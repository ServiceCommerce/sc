
<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 21/12/2017
 * Time: 10:52
 */

class login extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('client/login');
    }

    public function check_login(){

    }
}