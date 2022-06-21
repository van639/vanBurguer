<?php
/******************************************************************************
        Objetivo: Arquivo para configuração de variaveis e constantes que serão
         ultilizadas no sistema 
        Data:19/10/2021
        Autor: Vanderson
*******************************************************************************/

define ('SRC' , $_SERVER['DOCUMENT_ROOT'].'/vanderson/hamburgueria/Admin/');

//Variaveis e constantes para conexão com o Banco de dados MySQl
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = '12345678';
const BD_DATABASE = 'dbcategoria';

const BD_MSG_INSERIR = "Registro salvo com sucesso no Banco de Dados!";
const BD_MSG_ATUALIZAR = "Registro Atualizado com sucesso!";
const BD_MSG_ERRO = "ERRO: Não foi possivel manipular os dados no Banco de Dados!";

const BD_MSG_EXCLUIR = "
                        <script>
                        alert('Registro excluido com sucesso do Banco de Dados!');
                        window.location.href='../../Admin/categorias.php';
                        </script>";

const MSG_EXCLUIR =  "Registro excluido com sucesso do Banco de Dados!";               

const MSG_SENHA_LOGIN_INVALIOS = '<script> 
                                        alert("Login ou Senha inválidos!");
                                        window.history.back();
                                </script>'; 

const ERR0_CONEXAO_BD = "Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o Administrador do Sistema";

const ERRO_CAIXA_VAZIA = "Não foi possivel realizar a operação, pois existem campos obrigatórios a serem preenchidos!";
                        
const ERRO_MAXLENGHT = "Não foi possivel realizar a operação, pois a quantidade de caracteres ultrapassa o permitido no Banco de Dados";
                        
//Constantes para upload de arquivos
define ('NOME_DIRETORIO_FILE', 'arquivos/');
$extensoesPermitidasImg = array ("image/png", "image/jpg", "image/jpeg");

define ('EXTENSOES_PERMITIDAS' , $extensoesPermitidasImg );
const TAMANHO_FILE = "5120";

?>