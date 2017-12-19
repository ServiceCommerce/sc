<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 08:58
 */

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();

    }#End construct

    function index(){
        $this->home();
    }#End index

    function home(){
        $this->data['title'] = 'Serralheria Lobo Junior';
        $this->data['team_current'] = 'current';
        $this->data['view'] = 'Home';
        $this->load->view('assets/header', $this->data);
    }#End home
}