<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id da categoria e encaminhar para
        a função que ira buscar os dados 
        Data: 06/10/2021
        Autor: Vanderson
*******************************************************************************/

    //Import do arquivo de configuração e constantes
    require_once('../functions/config.php');

    require_once(SRC.'bd/listarCategorias.php');

    $idCategorias = $_GET['id'];

    $dadosCategorias = buscar($idCategorias);

    if($rsCategorias=mysqli_fetch_assoc($dadosCategorias))
    {
        session_start();
        $_SESSION['categorias'] = $rsCategorias;

        header('location:../categorias.php');
    }

    else("
    <script>
        alert('". BD_MSG_ERRO ."');
        window.location.href='../../Admin/categorias.php';
    </script>
    ");

?>