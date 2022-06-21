<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber dados de produtos
        Data:11/11/2021
        Autor: Vanderson
*******************************************************************************/
require_once('../functions/config.php');
require_once(SRC.'bd/inserirProdutos.php');
require_once(SRC.'bd/atualizarProdutos.php');
require_once(SRC.'functions/upload.php');

//Declaração de variaveis
$nome = (string) null;
$ingredientes = (string) null;
$idCategorias = (int) null;
$preco = (double) null;
$desconto = (double) null;
$chk = (string) null;
$sabiaMais = (string) null;
$foto = (string) null;
$modo = (string) null;

if(isset($_GET['id']))
    $id = (int) $_GET['id'];
else
    $id = (int) 0;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nome = $_POST['txtNome'];
    $ingredientes = $_POST['txtDescricao'];
    $idCategorias = $_POST['sltCategorias'];
    $preco = $_POST['txtPreco'];
    $desconto = $_POST['txtDesconto'];
    $sabiaMais = $_POST['txtSaibaMais'];
    $chk = $_POST['chk'];
    $nomeFoto = $_GET['nomeFoto'];

   if(strtoupper($_GET['modo']) == 'ATUALIZAR')
   {
        if($_FILES['fleFoto']['name'] != "")
        {
            $foto = uploadFoto($_FILES['fleFoto']);
            unlink(SRC.NOME_DIRETORIO_FILE.$nomeFoto);
        }else{
                $foto = $nomeFoto;
        }
    }else{
            $foto = uploadFoto($_FILES['fleFoto']);
        }

    //Validação de campos obrigatoriios
    if($nome == null || $preco == null || $ingredientes == null || $idCategorias == null)
    {
        echo("<script>
                alert('". ERRO_CAIXA_VAZIA ."'); 
                window.history.back();
            </script>");
    }
    else{
            $produtos  = array(
                "nome"          =>      $nome,
                "descricao"     =>      $ingredientes,
                "preco"         =>      $preco,
                "desconto"      =>      $desconto,
                "saibamais"     =>      $sabiaMais,
                "destaque"      =>      $chk,
                "id"            =>      $id,
                "idcategorias"  =>      $idCategorias,
                "foto"          =>      $foto
            );

            if(strtoupper($_GET['modo']) == 'SALVAR')
            {
                
                if(inserirProdutos($produtos))
                    echo("<script>
                        alert('". BD_MSG_INSERIR ."'); 
                        window.location.href = '../produtos.php';
                    </script>
                    ");
                else
                    echo("<script>
                        alert('". BD_MSG_ERRO ."'); 
                        window.history.back();
                        </script>
                    ");
            }elseif(strtoupper($_GET['modo']) == 'ATUALIZAR')
            {
                if(editar($produtos))
                echo("<script>
                        alert('". BD_MSG_ATUALIZAR ."'); 
                        window.location.href = '../produtos.php';
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