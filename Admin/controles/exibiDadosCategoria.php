<?php
/******************************************************************************
        Objetivo: Busca ou lista os dados da categoria, solicitando ao BD
        Data: 23/09/2021
        Autor: Vanderson
*******************************************************************************/
//Import do arquivo para inserir nobanco de dados
require_once(SRC.'bd/listarCategorias.php');
// require_once(SRC.'categorias.php');
// var_dump();
function exibirCategorias()
{
    $dadosCategoria = listar();
    return $dadosCategoria;
}

function criarArray($objeto)
{
    $cont = (int) 0;

    while($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array (
            "id"    =>  $rsDados['idcategorias'],
            "tipo"  =>  $rsDados['tipo']
        );

        $cont ++;
    }

    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

function criarJSON ($arrayDados)
{
    header("content-type:application/json/");

    $listJSON = json_encode($arrayDados);

    if(isset($listJSON))
        return $listJSON;
    else
        return false;
}



?>
