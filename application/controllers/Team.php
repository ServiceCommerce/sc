<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 27/11/2017
 * Time: 09:41
 */

class Team extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->team();
    }#End index()

    function team(){
        $this->data['title'] = 'Sobre Nós';
        $this->data['team_current'] = 'current';
        $this->data['view'] = 'Team';
        $this->load->view('assets/header', $this->data);
    }#End team

}