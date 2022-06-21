<?php
/******************************************************************************
        Objetivo: Inserir dados de Contatos no Banco de Dados
        Data:05/11/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/conexaoMysql.php');

function inserirContatos($arrayContatos)
{

    $sql = "insert into tblcontatos
    (
        nome,
        email,
        numero
    )
    values
    (
        '".$arrayContatos['nome']."',
        '".$arrayContatos['email']."',
        '".$arrayContatos['numero']."'
    )";

    $conexao = conexaoMysql();
        
    if (mysqli_query($conexao, $sql))
        return true; 
    else
        return false;
}

?>