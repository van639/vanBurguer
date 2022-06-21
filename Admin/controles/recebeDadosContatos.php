<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber dados de contatos
        Data:05/11/2021
        Autor: Vanderson
*******************************************************************************/
 require_once('./Admin/functions/config.php');
 require_once(SRC.'bd/inserirContatos.php');

    $nome = (string) null;
    $email = (string) null;
    $numero = (int) null;
    $id = (int) null;
    $butao = (string) null;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $numero = $_POST['txtCelular'];
        $butao = $_POST['btnEnviar'];

        if($nome == null || $email == null || $numero == null)
        {
            echo("<script>
                    alert('". ERRO_CAIXA_VAZIA ."'); 
                    window.history.back();
                </script>");

        }
        else{
                $contatos = array (
                    "nome"  =>  $nome,
                    "email" =>  $email,
                    "numero"=>  $numero,
                    "id"    =>  $id
                );
                
                if(strtoupper($butao) == 'ENVIAR')
                {
                    if(inserirContatos($contatos))
                    echo("<script>
                            alert('". BD_MSG_INSERIR ."'); 
                            window.location.href = './index.php';
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