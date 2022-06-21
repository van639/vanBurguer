<?php
/******************************************************************************
        Objetivo: Busca ou lista os dados de usuario, solicitando ao BD
        Data: 31/09/2021
        Autor: Vanderson
*******************************************************************************/
//Import do arquivo para inserir no banco de dados
// require_once('../Admin/functions/config.php');
require_once(SRC.'bd/listarUsuario.php');

function exibirUsuario()
{
    $dadosUsuario = listarUsuario();
    return $dadosUsuario;
}

?>