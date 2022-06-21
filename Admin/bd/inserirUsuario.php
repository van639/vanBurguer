<?php
/******************************************************************************
        Objetivo: Inserir dados de Usuario no Banco de Dados
        Data:31/10/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/conexaoMysql.php');

function inserirUsuario($arrayUsuario)
{
    $sql = "insert into tblusuario
        (
            nome,
            nomeUsuario,
            senha
        )
        values
        (
            '". $arrayUsuario['nome'] ."',
            '". $arrayUsuario['nomeUsuario']."',
            '".$arrayUsuario['senha']."'
        )";
    
        $conexao = conexaoMysql();
        
        //Envia o script SQL para o BD  --> mysqli_query($conexao, $sql);
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no banco de dados
        else
            return false; //Retorna falso se houver algum problema
}

?>