<?php
/******************************************************************************
        Objetivo: Lista os dados de contatos, solicitando ao BD
        Data: 23/09/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/listarContatos.php');

function exibirContatos ()
{
    $dadosContatos = listarContatos();
    return $dadosContatos;
}


?>