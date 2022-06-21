<?php
/******************************************************************************
        Objetivo: Arquivo para listar todos os dados de contatos no Banco de dados
        Data: 07/11/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/conexaoMysql.php');

function listarContatos(){
    $sql  = "select * from tblcontatos order by idcontatos desc";

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}


?>