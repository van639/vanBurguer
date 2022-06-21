<?php
/******************************************************************************
        Objetivo: Atualizar dados de um produto existente no Banco de Dados
        Data:01/12/2021
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

function editar($arrayProdutos)
{
    
    $sql = "update tblprodutos set
        nome = '".$arrayProdutos['nome']."',
        preco = '".$arrayProdutos['preco']."',
        desconto = '".$arrayProdutos['desconto']."',
        descricao = '".$arrayProdutos['descricao']."',
        destaque = '".$arrayProdutos['destaque']."',
        idcategorias = '".$arrayProdutos['idcategorias']."',
        saibamais = '".$arrayProdutos['saibamais']."',
        foto = '".$arrayProdutos['foto']."'

    where idprodutos = ".$arrayProdutos['id'];

    $conexao = conexaoMysql();

    if (mysqli_query($conexao, $sql))
        return true; 
    else
        return false;
}

?>