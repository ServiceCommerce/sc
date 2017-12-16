<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permission Class
 *
 * Biblioteca para controle de permissões
 *
 * @author		Ramon Silva
 * @copyright	        Copyright (c) 2013, Ramon Silva.
 * @since		Version 1.0
 * v... Visualizar
 * e... Editar
 * d... Deletar ou Desabilitar
 * c... Cadastrar
 * array de permissoes para o autosig.
 */



class Permission{

    var $Permission = array();
    var $table = 'permissoes';//Nome tabela onde ficam armazenadas as permissões
    var $pk = 'idPermissao';// Nome da chave primaria da tabela
    var $select = 'permissoes';// Campo onde fica o array de permissoes.

    public function  __construct() {
        log_message('debug', "Permission Class Initialized");
        $this->CI =& get_instance();
        $this->CI->load->database();

    }

    public function checkPermission($idPermissao = null,$atividade = null){
        if($idPermissao == null || $atividade == null){
            return false;
        }
        // Se as permissões não estiverem carregadas, requisita o carregamento
        if($this->Permission == null){
            // Se não carregar retorna falso
            if(!$this->loadPermission($idPermissao)){
                return false;
            }
        }

        if(is_array($this->Permission[0])){

        
            if(array_key_exists($atividade, $this->Permission[0])){
                // compara a atividade requisitada com a permissão.
                if ($this->Permission[0][$atividade] == 1) {
                    return true;
                } else {
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }

    }
    private function loadPermission($id = null){

        if($id != null){
            $this->CI->db->select($this->table.'.'.$this->select);
            $this->CI->db->where($this->pk,$id);
            $this->CI->db->limit(1);
            $array = $this->CI->db->get($this->table)->row_array();
            
            if(count($array) > 0){

                $array = unserialize($array[$this->select]);
                //Atribui as permissoes ao atributo permission
                $this->Permission = array($array);
                return true;

                
            }
            else{
                return false;
            }
            
        }
        else{
            return false;
        }

    }

    function menu($idPermissao){
        $menu = array();

        //DASHBOARD
        $menu[] = array(
            'icon1'     => 'fa fa-dashboard',
            'icon2'     => 'fa fa-angle-left pull-right',
            'link'      => base_url('index.php/dashboard'),
            'nome'      => 'Dashboard',
            'active'    => 'mapos',
            'method'    => 'index'
        );

        //CLIENTES
        if($this->checkPermission($idPermissao,'vCliente')){
            $menu['clientes'] = array(
                'icon1'     => 'fa fa-users',
                'icon2'     => 'fa fa-angle-left pull-right',
                'link'      => base_url('index.php/clientes'),
                'nome'      => 'Clientes',
                'active'    => 'clientes',
                'method'    => 'index'
            );
        }#end if CLIENTES

        // PRODUTOS
        if($this->checkPermission($idPermissao,'vProduto')){
            $menu['produtos'] = array(
                'icon1'     => 'fa fa-barcode',
                'icon2'     => 'fa fa-angle-left pull-right',
                'link'      => base_url('index.php/produtos'),
                'nome'      => 'Produtos',
                'active'    => 'produtos',
                'method'    => 'index'
            );
        }#End if

        // CATEGORIAS
        if($this->checkPermission($idPermissao,'vCategoria')){
            $menu['categorias'] = array(
                'icon1'     => 'fa fa-dashboard',
                'icon2'     => 'fa fa-angle-left pull-right',
                'link'      => base_url('index.php/categorias'),
                'nome'      => 'Categorias',
                'active'    => 'categorias',
                'method'    => 'index'
            );
        }#End if

        // CONFIGURAÇÕES
        if($this->checkPermission($idPermissao,'cUsuario')  || $this->checkPermission($idPermissao,'cEmitente') || $this->checkPermission($idPermissao,'cPermissao') || $this->checkPermission($idPermissao,'cBackup')){
            $menu['configuracao'] = array(
                'icon1'     => 'fa fa-wrench',
                'icon2'     => 'fa fa-angle-left pull-right',
                'link'      => 'drop',
                'nome'      => 'Configurações',
                'active'    => '',
                'method'    => '',
                'drop'      => ''
            );
            $drop = array();

            if($this->checkPermission($idPermissao,'cUsuario')){
                $drop[] = array(
                    'icon1'     => 'fa fa-dashboard',
                    'icon2'     => 'fa fa-angle-left pull-right',
                    'link'      => base_url('index.php/usuarios'),
                    'nome'      => 'Usuarios',
                );
                $menu['configuracao']['drop'] = $drop;

            }#End if cUSUARIO

            if($this->checkPermission($idPermissao,'cEmitente')){
                $drop[] = array(
                    'icon1'     => 'fa fa-circle-o',
                    'link'      => base_url('index.php/mapos/emitente'),
                    'nome'      => 'Emitende',
                );
                $menu['configuracao']['drop'] = $drop;

            }#End if cEMITENTE

            if($this->checkPermission($idPermissao,'cPermissao')){
                $drop[] = array(
                    'icon1'     => 'fa fa-check-square-o',
                    'link'      => base_url('index.php/permissoes'),
                    'nome'      => 'Permissão',
                );
                $menu['configuracao']['drop'] = $drop;

            }#End if cPERMISSAO

            if($this->checkPermission($idPermissao,'cBackup')){
                $drop[] = array(
                    'icon1'     => 'fa fa-cloud',
                    'link'      => base_url('index.php/mapos/backup'),
                    'nome'      => 'Backup',
                );
                $menu['configuracao']['drop'] = $drop;

            }#End if cPERMISSAO

        }#End if

        return $menu;
    }
}