<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do produto e encaminhar para
        a função que ira buscar os dados 
        Data: 01/12/2021
        Autor: Vanderson
*******************************************************************************/
require_once('../functions/config.php');

require_once(SRC.'bd/listarProdutos.php');

$id = $_GET['id'];

$dadosProdutos = buscarProdutos($id);

if($rsProdutos=mysqli_fetch_assoc($dadosProdutos))
{
        session_start();
        $_SESSION['produtos'] = $rsProdutos;
        
        header('location:../produtos.php');

}else("
        <script>
        alert('". BD_MSG_ERRO ."');
        window.location.href='../produtos.php';
        </script>
");



?>