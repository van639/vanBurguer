<?php
/******************************************************************************
        Objetivo: Arquivo para listar todos os dados de usuario no Banco de dados
        Data: 31/10/2021
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once(SRC.'bd/conexaoMysql.php');

function listarUsuario ()
{
    $sql= "select * from tblusuario order by idusuario desc";

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;

}

function buscarUsuario ($idUsuario)
{
    $sql = "select * from tblusuario where idusuario =" .$idUsuario;

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

?>
