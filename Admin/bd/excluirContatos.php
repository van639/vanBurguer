<?php
/******************************************************************************
        Objetivo: Arquivo para excluir dados de contatos no Banco de Dados MySQL
        Data:07/11/2021
        Autor: Vanderson
*******************************************************************************/
require_once(SRC.'bd/conexaoMysql.php');

function excluir ($id){
    $sql = "delete from tblcontatos where idcontatos =".$id;
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}
?>