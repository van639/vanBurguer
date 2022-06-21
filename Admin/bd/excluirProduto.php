<?php
/******************************************************************************
        Objetivo: Arquivo para excluir dados de produtos no Banco de Dados MySQL
        Data: 29/11/2021
        Autor: Vanderson
*******************************************************************************/
require_once(SRC.'bd/conexaoMysql.php');

function excluirProduto ($id){
    $sql = "delete from tblprodutos where idprodutos =".$id;
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}
?>