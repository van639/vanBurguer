<?php
/******************************************************************************
        Objetivo: Arquivo para listar todos os dados da categoria no Banco de dados
        Data: 21/10/2021
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once(SRC.'bd/conexaoMysql.php');

function listar ()
{
    $sql = "select * from tblcategorias order by idcategorias desc";
    
    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscar ($idCategorias)
{
    $sql = "select * from tblcategorias where idcategorias = " . $idCategorias;

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

?>