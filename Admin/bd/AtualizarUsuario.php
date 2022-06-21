<?php
/******************************************************************************
        Objetivo: Atualizar dados de um usuario existente no Banco de Dados
        Data:31/10/2021
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

function editarUsuario($arrayUsuario)
{
    $sql = "update tblusuario set
                nome = '".$arrayUsuario['nome']."',
                nomeUsuario = '".$arrayUsuario['nomeUsuario']."',
                senha = '".$arrayUsuario['senha']."'

            where idusuario = ".$arrayUsuario['id'];
            
    $conexao = conexaoMysql();

    if (mysqli_query($conexao, $sql))
        return true; //Retorna verdadeiro se o registro for inserido no banco de dados
    else
        return false;
}







