<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber dados de categoria
        Data:18/10/2021
        Autor: Vanderson
*******************************************************************************/
require_once('../functions/config.php');
// require_once('../Admin/functions/config.php');
require_once(SRC.'/bd/inserirCategorias.php');
require_once(SRC.'bd/AtualizarCategorias.php');
// require_once(SRC.'categorias.php');

    $nome = (string) null;

    if (isset($_GET['id']))
        $id = (int) $_GET['id'];
    else
        $id = (int) 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST['txtNome'];
        // $salvar = $_POST['btnEnviar'];

        //Validação de campo obrigatório
        if ($nome == null)
        echo("<script>
                alert('". ERRO_CAIXA_VAZIA ."'); 
                window.history.back();
            </script>");

        //validação de qtd de caracters
        elseif (strlen($nome)>35)
        {
            echo("<script>
                alert('". ERRO_MAXLENGHT ."'); 
                window.history.back();
            </script>");

        }else
            {
                $categorias = array (
                    "tipo"   => $nome,
                    "id"     => $id
                );
            
        
            if (strtoupper ($_GET['modo']) == 'SALVAR')
            {
                //Chama a funçao do arquivo inserirCliente.php e encaminha o array com os dados do cliente
                if (inserir($categorias))
                    echo("<script>
                            alert('". BD_MSG_INSERIR ."'); 
                            window.location.href = '../categorias.php';
                        </script>
                        ");
                else
                    echo("<script>
                            alert('". BD_MSG_ERRO ."'); 
                            window.history.back();
                        </script>
                        ");
                
            }elseif (strtoupper ($_GET['modo']) == 'ATUALIZAR')
            {
                if (editar($categorias))
                echo("<script>
                        alert('". BD_MSG_ATUALIZAR ."'); 
                        window.location.href = '../categorias.php';
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