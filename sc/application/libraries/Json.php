<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 19/01/2018
 * Time: 22:33
 */

class Json {
    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper('file');
    }#End __construct()

    public function menu($version=false){

        if($menuJson = read_file('./docs/System/Json/menuPainel.json')){
            $menu = json_decode($menuJson);
            if($version == false){
                return $menu->menu;
            }else{
                return $menu->version;
            }
        }else{

        }#End if()
    }#End menu()
}