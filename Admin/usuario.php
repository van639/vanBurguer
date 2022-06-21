<?php

require_once('../Admin/functions/config.php');
require_once(SRC.'controles/exibiDadosUsuario.php');

session_start();

$nome = (string) null;
$nomeUsuario = (string) null;
$senha = (string) null;
$id = (int) null;
$modo =(string) "Salvar";

    if(isset($_SESSION['usuario']))
    {
        $id = $_SESSION['usuario']['idusuario'];
        $nome = $_SESSION['usuario']['nome'];
        $nomeUsuario = $_SESSION['usuario']['nomeUsuario'];
        $senha = $_SESSION['usuario']['senha'];
        $modo = "Atualizar";

        unset($_SESSION['usuario']);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/usuario.css">
    <title>Document</title>
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
            <h2>Usúarios</h2>
            <div id="containerConteudoUsuario">
                <form name="frmUsuario" method="post" action="controles/recebeDadosUsuario.php?modo=<?=$modo?>&id=<?=$id?>">
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome de Usúario: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNomeUsuario" value="<?=$nomeUsuario?>" placeholder="Digite seu Usúario" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="password" name="txtSenha" value="" placeholder="Insira Uma Senha" maxlength="100">
                        </div>
                    </div>
                    <input type="submit" class="insert" id="btnSalvar" name="btnEnviar" value="<?=$modo?>">

                    <div id="containerExibiDados">
                        <ul>
                            <h4>Consulta de Dados</h4>
                            <li>ID:</li>
                            <li>Nome:</li>
                            <li>Opções:</li>
                        </ul>
                        <div id="containerDadosEopcoes">
                            <?php

                                $dadosUsuario = exibirUsuario();
                                while($rsUsuario=mysqli_fetch_assoc($dadosUsuario))
                                {
                            ?>
                            <div class="id"><?=$rsUsuario['idusuario']?></div>
                            <div class="nome"><?=$rsUsuario['nome']?></div>
                            <div class="opcoes">
                                <a href="controles/editaDadosUsuario.php?id=<?=$rsUsuario['idusuario']?>">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>
                                <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controles/excluiDadosUsuario.php?id=<?=$rsUsuario['idusuario']?>">
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