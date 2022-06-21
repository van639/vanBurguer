<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber dados do usuario
        Data:31/10/2021
        Autor: Vanderson
*******************************************************************************/
require_once('../functions/config.php');
require_once(SRC.'/bd/inserirUsuario.php');
require_once(SRC.'/bd/AtualizarUsuario.php');

$nome = (string) null;
$nomeUsuario = (string) null;
$senha = (string) null;

if( isset($_GET['id']))
        $id = (int) $_GET['id'];
else
        $id = (int) 0;


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                $nome = $_POST['txtNome'];
                $nomeUsuario = $_POST['txtNomeUsuario'];
                $senha = $_POST['txtSenha'];
                $salvar = $_POST['btnEnviar'];
            
                $senhaCrpit = sha1($senha);
                
                //Tratamento de erros
                if($nome == null || $nomeUsuario== null || $senha == null)
                {
                echo("<script>
                        alert('". ERRO_CAIXA_VAZIA ."'); 
                        window.history.back();
                    </script>");
                }
                else
                {
                        $usuario = array (
                           "nome"        =>    $nome,
                           "nomeUsuario" =>    $nomeUsuario,
                           "senha"       =>    $senhaCrpit,
                           "id"          =>    $id

                        ); 
                        
                        if(strtoupper($_GET['modo']) == 'SALVAR')
                        {
                                if(inserirUsuario($usuario))
                                echo("<script>
                                        alert('". BD_MSG_INSERIR ."'); 
                                        window.location.href = '../usuario.php';
                                      </script>
                                ");
                                else
                                echo("<script>
                                        alert('". BD_MSG_ERRO ."'); 
                                        window.history.back();
                                      </script>
                                ");
                                
                        }
                        elseif (strtoupper($_GET['modo']) == 'ATUALIZAR')
                        {
                                if (editarUsuario($usuario))
                                echo("<script>
                                        alert('". BD_MSG_ATUALIZAR ."'); 
                                        window.location.href = '../usuario.php';
                                        </script>
                                ");
                                else
                                echo("<script>
                                        alert('". BD_MSG_ERRO ."'); 
                                        window.history.back();
                                        </script>
                                ");
                        }
                }                                                                                               
        }

?>