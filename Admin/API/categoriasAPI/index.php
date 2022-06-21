<?php
require_once('vendor/autoload.php');
require_once('../functions/config.php');
require_once(SRC.'controles/exibiDadosCategoria.php');


    $app = new \Slim\App();

    $app->get('/categorias', function ($request, $response, $args){
    
        if($listDados = exibirCategorias())
            if($listDadosArray = criarArray($listDados))
                $listDadosArray = criarJSON($listDadosArray);
        
                
        if($listDadosArray)
        {
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type', 'application/json')
                                ->write($listDadosArray);
        }else{
            return $response    ->withStatus(204);
        }
    });

    $app -> run();

?>