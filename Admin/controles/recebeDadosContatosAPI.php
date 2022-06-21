<?php
/******************************************************************************************************************
    Objetivo: Arquivo resposável por receber dados da API (POST)
    Data:09/12/21
    Autor:Vanderson 
******************************************************************************************************************/

//Import do arquivo de configuração
require_once ('../functions/config.php');
//Import do arquivo que vai inserir no banco de dados
require_once (SRC.'bd/inserirContatos.php');

function inserirContatosAPI($array)
{
    if(inserirContatos($array))
        return true;
    else
        return false;
}
?>