<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do cantato e encaminhar para
        a função que ira excluir o dado 
        Data: 07/11/2021
        Autor: Vanderson
*******************************************************************************/

require_once('../functions/config.php');
require_once(SRC.'bd/excluirContatos.php');

$id = $_GET['id'];

if(excluir($id))
    echo(BD_MSG_EXCLUIR);
else("
        <script>
        alert('". BD_MSG_ERRO ."');
        window.location.href='../contatos.php';
        </script>
    ")

?>