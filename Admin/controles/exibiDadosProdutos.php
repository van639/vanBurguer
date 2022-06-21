<?php
/******************************************************************************
        Objetivo: Lista os dados de produtos, solicitando ao BD
        Data: 23/09/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/listarProdutos.php');

function exibirProdutos ()
{
    $dados = listarProdutos();
    return $dados;
}

function criarArrayProdutos ($objeto)
{
    $cont = (int) 0;

    while($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array (
            "id"        =>      $rsDados['idprodutos'],
            "nome"      =>      $rsDados['nome'],
            "preco"     =>      $rsDados['preco'],
            "desconto"  =>      $rsDados['desconto'],
            "descricao" =>      $rsDados['descricao'],
            "destaque"  =>      $rsDados['destaque'],
            "categoria" =>      $rsDados['idcategorias'],
            "foto"      =>      $rsDados['foto'],
            "saibaMais" =>      $rsDados['saibamais']
        );

        $cont ++;
    }
    var_dump($arrayDados);
    die;
    
    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

function criarJSONProdutos ($arrayDados)
{
    header("content-type:application/json/");

    $listProdutosJSON = json_encode($arrayDados);

    if(isset($listProdutosJSON))
        return $listProdutosJSON;
    else
        return false;
}

function buscarCategoria($id)
{
    $dados = buscarIdCategoria($id);
    return $dados;
}

function buscarNomeProdutos($nome)
{
    $dados = buscarNome($nome);
    return $dados;
}

?>