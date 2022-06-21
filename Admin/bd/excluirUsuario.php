<?php
/******************************************************************************
        Objetivo: Arquivo para excluir dados de categorias no Banco de Dados MySQL
        Data:22/10/2021
        Autor: Vanderson
*******************************************************************************/


//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

function excluirUsuario($idUsuario)
{
    $sql = "delete from tblusuario where idusuario =".$idUsuario;
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}