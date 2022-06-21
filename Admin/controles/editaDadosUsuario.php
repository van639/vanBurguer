<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do usuario e encaminhar para
        a função que ira buscar os dados 
        Data: 06/10/2021
        Autor: Vanderson
*******************************************************************************/

    //Import do arquivo de configuração e constantes
    require_once('../functions/config.php');

    require_once(SRC.'bd/listarUsuario.php');

    $idUsuario = $_GET['id'];

    $dadosUsuario = buscarUsuario($idUsuario);

    if($rsUsuario=mysqli_fetch_assoc($dadosUsuario))
    {
        session_start();
        $_SESSION['usuario'] = $rsUsuario;

        header ('location:../usuario.php');

    }else("
    <script>
        alert('". BD_MSG_ERRO ."');
        window.location.href='../../Admin/usuario.php';
    </script>
    ");

?>

