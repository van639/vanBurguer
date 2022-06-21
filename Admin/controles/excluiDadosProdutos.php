<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do produto e encaminhar para
        a função que ira excluir o dado 
        Data: 1/12/2021
        Autor: Vanderson
*******************************************************************************/
    //Import do arquivo de configuração e constantes
    require_once('../functions/config.php');

    //Import do arquivo para excluir no banco de dados
    require_once(SRC.'/bd/excluirProduto.php');

    $id = $_GET['id'];
    $nomeFoto = $_GET['foto'];

    if(excluirProduto($id))
    {
        unlink(SRC.NOME_DIRETORIO_FILE.$nomeFoto);
        echo("
        <script>
            alert('". MSG_EXCLUIR ."');
            window.location.href='../produtos.php';
        </script>
    ");
    }
    
    else("
        <script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../produtos.php';
        </script>
    ");
?> 