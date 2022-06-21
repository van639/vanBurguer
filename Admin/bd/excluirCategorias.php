<?php
/******************************************************************************
        Objetivo: Arquivo para excluir dados de categorias no Banco de Dados MySQL
        Data:22/10/2021
        Autor: Vanderson
*******************************************************************************/


//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

function excluir( $idCategoria){
    $sql = "delete from tblcategorias where idcategorias = ".$idCategoria;

    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}
?>