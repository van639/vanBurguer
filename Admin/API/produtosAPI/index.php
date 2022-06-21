<?php

require_once('vendor/autoload.php');
require_once('../functions/config.php');
require_once(SRC.'controles/exibiDadosProdutos.php');

$app = new \Slim\App();
/*********************    PRODUTOS   **************** */
$app->get('/produtos', function ($request, $response, $args){

    if(isset($request -> getQueryParams()['nome']))
    {
        $nome = (string) null;
        $nome = $request -> getQueryParams()['nome'];

        if($listDados = buscarNomeProdutos($nome))

            if($listDadosArray = criarArrayProdutos($listDados))
                $listDadosArray = criarJSONProdutos($listDadosArray);

    }else
    {
        if($listDados = exibirProdutos())
            if($listDadosArray = criarArrayProdutos($listDados))
                $listDadosArray = criarJSONProdutos($listDadosArray);
    }
            
    if($listDadosArray)
    {
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDadosArray);
    }else{
        return $response    ->withStatus(204);
    }
});

/*************************   BUSCANDO PELO ID   ******************* */
$app->get('/produtos/{id}', function ($request, $response, $args){
    
    $id = $args['id'];
    
    if($listDados = buscarCategoria($id))
        if($listDadosArray = criarArrayProdutos($listDados))
            $listDadosArray = criarJSONProdutos($listDadosArray);

    if($listDadosArray)
    {
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write('{"message":"oi"}');
    }else{
        return $response    ->withStatus(204);
    }
});

$app -> run();
?>