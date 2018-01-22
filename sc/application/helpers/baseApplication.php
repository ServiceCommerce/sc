<?php
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 22/01/2018
 * Time: 17:20
 */


function baseApp(){

    $dados = file_get_contents('./docs/System/Json/baseApplication.json');
    $dadosDecod = json_decode($dados);

    return $dadosDecod->sc;
}

function webApp(){

    $dados = file_get_contents('./sc/docs/System/Json/baseApplication.json');
    $dadosDecod = json_decode($dados);

    return $dadosDecod->web;
}