<?php
/******************************************************************************
        Objetivo: Inserir dados de Usuario no Banco de Dados
        Data:31/10/2021
        Autor: Vanderson
*******************************************************************************/
//require_once('../functions/config.php');
require_once(SRC.'bd/conexaoMysql.php');

function inserirProdutos($array)
{
    $sql = " insert into tblprodutos(
        nome,
        preco,
        desconto,
        descricao,
        destaque, 
        idcategorias,
        saibamais,
        foto
        )
        values
        (
            '".$array['nome']."',
            '".$array['preco']."',
            '".$array['desconto']."',
            '".$array['descricao']."',
            ".$array['destaque'].",
            '".$array['idcategorias']."',
            '".$array['saibamais']."',
            '".$array['foto']."'

        )";

        $conexao = conexaoMysql();

        if (mysqli_query($conexao, $sql))
            return true; 
        else
            return false;
            
}

?>