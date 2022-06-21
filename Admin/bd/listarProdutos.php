<?php
/******************************************************************************
        Objetivo: Arquivo para listar todos os dados de produtos no Banco de dados
        Data: 28/11/2021
        Autor: Vanderson
*******************************************************************************/
require_once(SRC.'bd/conexaoMysql.php');

function listarProdutos(){
    $sql  = "select * from tblprodutos order by idprodutos desc";

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarProdutos ($id)
{
    $sql = "select tblprodutos.*, tblcategorias.tipo
                from tblprodutos
                    inner join tblcategorias
                    on tblcategorias.idcategorias = tblprodutos.idcategorias
                where tblprodutos.idprodutos = " . $id;

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}

function buscarNome ($nome)
{
    $sql = "select tblprodutos.*, tblcategorias.tipo
        from tblprodutos
            inner join tblcategorias
            on tblcategorias.idcategorias = tblprodutos.idcategorias
        where tblprodutos.nome like '%".$nome."%'";

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarIdCategoria ($idCategoria)
{
    $sql = "select tblprodutos.*, tblcategorias.tipo
        from tblprodutos
            inner join tblcategorias
            on tblcategorias.idcategorias = tblprodutos.idcategorias
        where tblprodutos.idcategorias like '.$idCategoria.'";

        $conexao = conexaoMysql();
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}

?>