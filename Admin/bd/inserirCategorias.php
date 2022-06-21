<?php
/******************************************************************************
        Objetivo: Inserir dados de Categorias no Banco de Dados
        Data:19/10/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/conexaoMysql.php');

function inserir ($arrayCategorias)
{
    $sql = "insert into tblcategorias
    (
        tipo
    )
    values
    (
        '". $arrayCategorias['tipo'] ."'
    )

";

        //Chamando a função que estabelece a conexão com o BD
        $conexao = conexaoMysql();
        
        //Envia o script SQL para o BD  --> mysqli_query($conexao, $sql);
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no banco de dados
        else
            return false; //Retorna falso se houver algum problema
}

?>