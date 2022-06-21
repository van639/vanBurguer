<?php
/******************************************************************************
        Objetivo: Arquivo para fazer upload de Imagens
        Data:25/11/2021
        Autor: Vanderson
*******************************************************************************/
require_once('../functions/config.php');

function uploadFoto ($arrayFoto)
{
    $fotoFile = $arrayFoto;
    $tamanhoOriginal = (int) 0;
    $tamanhoKb = (int) 0;
    $extensao = (string) null;
    $tipoArquivo = (string) null;
    $nomeArquivo = (string) null;
    $nomeArquivoCript = (string) null;
    $arquivoTemp = (string) null;
    $foto = (string) null;

    if($fotoFile['size'] > 0 && $fotoFile['type'] != "")
    {
        $tamanhoOriginal = $fotoFile['size'];
        $tamanhoKb = $tamanhoOriginal/1024;
        $tipoArquivo = $fotoFile['type'];

        //Valida se o tamanho do arquivo é menor do que o permitido
        if($tamanhoKb <= TAMANHO_FILE)
        {
            if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS))
            {
                $nomeArquivo = pathinfo ($fotoFile['name'], PATHINFO_FILENAME);
                $extensao = pathinfo ($fotoFile['name'], PATHINFO_EXTENSION);
                $nomeArquivoCript = sha1($nomeArquivo.uniqid(time()));

                $foto = $nomeArquivoCript.".".$extensao;
                $arquivoTemp = $fotoFile['tmp_name'];

                if(move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE.$foto))
                    return $foto;
                else
                    echo('Erro no upload de arquivo');
            }else
                echo('Erro tipo de arquivo');
        }else
            echo('Erro tamanho do Arquivo');
    }
}

?>