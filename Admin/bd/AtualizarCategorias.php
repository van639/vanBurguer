<?php
/******************************************************************************
        Objetivo: Atualizar dados de uma categoria existente no Banco de Dados
        Data:13/10/2021
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

    function editar ($arrayCategorias)
    {
        $sql = "update tblcategorias set
                    tipo = '".$arrayCategorias['tipo']."'
                 where idcategorias = ". $arrayCategorias['id'];

    
         $conexao = conexaoMysql();
        
        if (mysqli_query($conexao, $sql))
            return true; 
        else
            return false; 
    }

?>