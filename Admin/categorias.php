<?php

    session_start();

    $id = (int) 0;
    $nome = (string) null;
    $modo = (string) "Salvar";

    require_once('functions/config.php');

    // require_once(SRC.'bd/conexaoMysql.php');
    // conexaoMysql();
    // require_once(SRC.'controles/recebeDadosCategoria.php');
    require_once(SRC.'controles/exibiDadosCategoria.php');

    if(isset($_SESSION['categorias']))
    {
        $id = $_SESSION['categorias']['idcategorias'];
        $nome = $_SESSION['categorias']['tipo'];
        $modo = "Atualizar";

        unset($_SESSION['categorias']);
    }
    // var_dump($_SESSION['categorias']['nome']);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/categoria.css">
    <title>Categorias</title>
</head>
<body>
    <div id="containerPrincipal">
        <header>
            <?php require_once'./header.php'?>
        </header>
        <nav>
            <?php require_once'./nav.php'?>
        </nav>
        <main>
            <h2>Categoria</h2>
            <div id="containerConteudoCategoria">
            <form action="controles/recebeDadosCategoria.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCadastro" method="post">
                <div class="inserirDado">
                    <label>
                        <div class="insert">Insira uma categoria:</div>

                    </label>
                    <input type="text" class="insert" name="txtNome" value="<?=$nome?>" maxlength="20">
                    <input type="submit" class="insert" id="btnSalvar" name="btnEnviar" value="<?=$modo?>">
                        
                </div>
                <div id="containerExibiDados">
                    <ul>
                        <h4>Consulta de Dados</h4>
                        <li>ID:</li>
                        <li>Nome:</li>
                        <li>Opções:</li>
                    </ul>
                    <div id="containerDadosEopcoes">
                        <?php

                            $dadosCategorias = exibirCategorias();

                            while($rsCategorias=mysqli_fetch_assoc($dadosCategorias))
                            {
                        ?>
                        <div class="id"><?=$rsCategorias['idcategorias']?></div>
                        <div class="nome"><?=$rsCategorias['tipo']?></div>
                        <div class="opcoes">
                            <a href="controles/editaDadosCategorias.php?id=<?=$rsCategorias['idcategorias']?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controles/excluiDadosCategorias.php?id=<?=$rsCategorias['idcategorias']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </form>
            </div>
        </main>
        <footer>
            <?php require_once'./footer.php'?>
        </footer>
    </div>
</body>
</html>