<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 21/01/2018
 * Time: 14:29
 */

class flashMenseger{
    private $file = './docs/System/Json/messageLog.json';
    private $dados;

    function __construct(){
        $this->CI =& get_instance();
    }#End __contruct()

    public function get($cod){
        return $this->setMessage($cod);
    }#End get()

    private function setMessage($cod){
        $this->dados = read_file($this->file);

        $dados = json_decode($this->dados);
        $msg = explode('-', $cod);

        // INICIALIZA BUSCA POR CLASSE AFETADA
        foreach ($dados->message as $key => $value){
           if($key == $msg[0]){
               // INICIALIZA BUSCA POR CÓDIGO DO ERRO
               foreach ($value as $item) {
                   if($item->cod == $msg[1]){
                       return $item;
                   }#End if()
             }#End foreach()
           }#End if()
        }#End foreach()
    }

}#End class