<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id da categoria e encaminhar para
        a função que ira excluir o dado 
        Data: 22/10/2021
        Autor: Vanderson
*******************************************************************************/
    //Import do arquivo de configuração e constantes
    require_once('../functions/config.php');

    //Import do arquivo para excluir nobanco de dados
    require_once(SRC.'/bd/excluirCategorias.php');

    $idCategoria = $_GET['id'];

    if(excluir($idCategoria))
        echo(BD_MSG_EXCLUIR);
    else("
        <script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../categorias.php';
        </script>
    ")


?>