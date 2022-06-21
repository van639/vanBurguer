<?php
/******************************************************************************
        Objetivo: Arquivo para configurar a conexão com o Banco de Dados MySQL
        Data:19/10/2021
        Autor: Vanderson
*******************************************************************************/
    
//Abre a conexão com base de dados MySQL
function conexaoMysql()
{
        
    //Declaração de variaveis para conexão com BD
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;
    

    if($conexao = mysqli_connect($server, $user, $password, $database))
        return $conexao;
    else
    {
        echo("nao conectou com o banco");
        return false;
    }
}
?>