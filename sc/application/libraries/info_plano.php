<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * info_plano Class
 *
 * Biblioteca para controle Planos e pacotes
 *
 * @author		Claudio Magalhães
 * @copyright	        Copyright (c) 2017, Claudio Magalhães.
 * @since		Version 1.0
 * 
 */



class info_plano extends CI_Controller{

	private $id_plano = 1;
	public $plano;
	public $expo_produto;
	public $expo_servico;
	public $suporte;
    public $imgProduto;
    public $systemVersion = '0.2.2';
    public $dbVersion = '1.1';

	public function __construct(){
		$this->index();
    }

   	private function index(){

     	switch ($this->id_plano) {
     		case '1':
     			$this->plano = 'Plano Básico';
     			$this->expo_produto = 40;
     			$this->expo_servico = 10;
     			$this->suporte = 'Básico';
                $this->imgProduto = 4;
     			break;
     		
     		default:
     			# code...
     			break;
     	}# End switch ($this->id_plano) {
    }# End public function index(){

    public function produto(){
    	return $this->expo_produto;
    }# End public expo_produto(){

    public function imagem_produto(){
        return $this->imgProduto;
    }

    public function db_Version(){
        return $this->dbVersion;
    }

    public function sc_version(){
        return $this->systemVersion;
    }

    public function checkDbVersion($currentVersion){
        if($this->dbVersion != $currentVersion){
            if($this->dbVersion > $currentVersion){
               return array(true, 'Banco de dados desatualizado, versão requerida ' . $this->dbVersion);
            }elseif($this->dbVersion < $currentVersion){
                return array(true, 'Banco de dados não suportado ainda, versão requerida ' . $this->dbVersion);
            }
        }else{
            return array(false);
        }
    }

}# End class Config_system{
