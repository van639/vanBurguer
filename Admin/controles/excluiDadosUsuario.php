<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do usuario e encaminhar para
        a função que ira excluir o dado 
        Data: 31/10/2021
        Autor: Vanderson
*******************************************************************************/
    //Import do arquivo de configuração e constantes
    require_once('../functions/config.php');

    //Import do arquivo para excluir no banco de dados
    require_once(SRC.'/bd/excluirUsuario.php');

    $idUsuario = $_GET['id'];

    if(excluirUsuario($idUsuario))
        echo("
        <script>
            alert('Registro excluido com sucesso do Banco de Dados!');
            window.location.href='../../Admin/usuario.php';
        </script>"
        );
    else("
        <script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../usuario.php';
        </script>
    ");
    ?>