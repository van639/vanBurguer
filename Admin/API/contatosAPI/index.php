<?php

require_once('vendor/autoload.php');
require_once('../functions/config.php');

$app = new \Slim\App();

/********************    CONTATOS       ********************** */
    $app->post('/contatos', function ($request, $response, $args){

        $contentType = $request -> getHeaderLine('Content-Type');

        if($contentType == 'application/json')
        {
            $dadosBodyJSON = $request -> getParsedBody();

            if($dadosBodyJSON == "" || $dadosBodyJSON == null)
            {
                return $response   ->withStatus(406)
                                   ->withHeader('Content-Type', 'application/json')
                                   ->write('{"message":"Conteúdo enviado pelo body, não contém dados validos"}'); 
            }else
            {
                require_once(SRC.'controles/recebeDadosContatosAPI.php');

                if(inserirContatosAPI($dadosBodyJSON))
                {
                    return $response   ->withStatus(201)
                                       ->withHeader('Content-Type', 'application/json')
                                       ->write('{"message":"Item criado com sucesso"}');
                }else
                {
                    return $response   ->withStatus(400)
                                       ->withHeader('Content-Type', 'application/json')
                                       ->write('{"message":"Não foi possível salvar os dados, por favor conferir o body da mensagem"}');
                }

            }
        }else
        {
            // -> para ascessar o methodo
           return $response    ->withStatus(406)
                               ->withHeader('Content-Type', 'application/json')
                               ->write('{"message":"Formato de dados do Header incompatível com JSON"}');
        }

    });

    $app -> run();


?>