<?php

    session_start();

    $nome = (string) null;
    $ingredientes = (string) null;
    $idCategorias = (int) null;
    $preco = (double) null;
    $desconto = (double) null;
    $chk = (boolean) null;
    $sabiaMais = (string) null;
    $id = (int) null;
    $foto = (string) null;

    $idCategorias = (int) null;
    $nomeCategoria = (string) "Selecione um item";
    $foto = (string) "img/imagemIndisponivel.jpg";
    $modo = (string) "Salvar";

    require_once('./functions/config.php');
    require_once(SRC.'bd/conexaoMysql.php');
    conexaoMysql();
    require_once(SRC.'controles/exibiDadosCategoria.php');
    require_once(SRC.'controles/exibiDadosProdutos.php');


    if(isset($_SESSION['produtos']))
    {
        $id = $_SESSION['produtos']['idprodutos'];
        $nome = $_SESSION['produtos']['nome'];
        $preco = $_SESSION['produtos']['preco'];
        $desconto = $_SESSION['produtos']['desconto'];
        $ingredientes = $_SESSION['produtos']['descricao'];
        $destaque = $_SESSION['produtos']['destaque'];
        $idCategorias = $_SESSION['produtos']['idcategorias'];
        $nomeCategoria = $_SESSION['produtos']['tipo'];
        $sabiaMais = $_SESSION['produtos']['saibamais'];
        $foto = $_SESSION['produtos']['foto'];
        $modo = "Atualizar";

        // if($destaque == 1)
        //     'checked';
        // elseif($destaque == 0)
        //     'checked';

        unset($_SESSION['produtos']);
    }



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <title>Administração de produtos</title>
</head>
<body>
    <div id="containerPrincipal">
        <header>
            <?php require_once('./header.php')?>
        </header>
        <nav>
            <?php require_once './nav.php'?>
        </nav>
        <main>
            <h2>Adm de Produtos</h2>
        <div id="containerConteudoProdutos">
            <form enctype="multipart/form-data" name="frmProdutos" method="post" action="controles/recebeDadosProdutos.php?modo=<?=$modo?>&nomeFoto=<?=$foto?>&id=<?=$id?>">
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Nome: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome do produto" maxlength="45">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Foto do Produto: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="file"  name="fleFoto" accept="image/jpeg, image/jpg, image/png">
                    </div>
                    <div id="visualizarFoto">
                    <img src="<?=NOME_DIRETORIO_FILE.$foto?>">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Descrição: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtDescricao" value="<?=$ingredientes?>" placeholder="Digite os igredientes:" maxlength="200">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Categoria: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <select name="sltCategorias">
                    <option selected value="<?=$idCategorias?>"><?=$nomeCategoria?></option>
                    <?php
                        $dadosCategorias = exibirCategorias();

                        while($rsCategorias=mysqli_fetch_assoc($dadosCategorias))
                        {
                    ?>
                        <option value="<?=$rsCategorias['idcategorias']?>"><?=$rsCategorias['tipo']?></option>
                    <?php
                        }
                    ?>
                        </select>
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Preço: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtPreco" value="<?=$preco?>" placeholder="Digite o preço:" maxlength="100">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Desconto: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtDesconto" value="<?=$desconto?>" placeholder="Digite o preço com desconto:" maxlength="100">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Destaque? </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <!-- ?= $chk == "1" ? 'checked' : ''?> -->
                        <?php
                            if($chk == "1")
                                'checked';
                            else{
                                $chk == "0";
                                'checked';
                            }
                        ?>
                        <input type="checkbox" name="chk" value="1" <?=$chk?>>Sim
                        <input type="checkbox" name="chk" value="0" <?=$chk?>>Não
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Saiba Mais: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <textarea name="txtSaibaMais" cols="50" rows="7" ><?=$sabiaMais
                        ?></textarea>
                    </div>
                </div>
                 <input type="submit" class="insert" id="btnSalvar" name="btnEnviar" value="<?=$modo?>">
            </div>
            <div id="containerExibirProdutos">
                <h4>Pré-Visualização</h4>
                <?php
                    $dadosProdutos = exibirProdutos();
                    while($rsProdutos=mysqli_fetch_assoc($dadosProdutos))
                    {
                ?>
                <div class="hamburguersItems">
                    <img src="<?=NOME_DIRETORIO_FILE.$rsProdutos['foto']?>"alt="" name>
                    <h6><?=$rsProdutos['nome']?></h6>
                    <p><?=$rsProdutos['descricao']?></p>
                    <div class="containerOpcoes">
                        <div class="opcoesProdutos">
                            <a href="controles/editaDadosProdutos.php?id=<?=$rsProdutos['idprodutos']?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controles/excluiDadosProdutos.php?id=<?=$rsProdutos['idprodutos']?>&foto=<?=$rsProdutos['foto']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <a>
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">                    
                            </a>
                        </div>
                    </div>
                    <div class="preco"><?='R$ '.$rsProdutos['preco']?></div>
                </div>
                <?php
                    }
                ?>
            </div>
        </form>
            
        </main>
        <footer>
        <?php require_once './footer.php'?>
        </footer>
    </div>
</body>
</html>