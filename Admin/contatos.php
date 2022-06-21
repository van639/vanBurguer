<?php

require_once('./functions/config.php');
require_once(SRC.'controles/exibiDadosContatos.php');





?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contatos.css">
    <title>Contatos</title>
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
        <h2>Contatos</h2>
            <div id="containerConteudoContatos">
                <ul>
                    <h4>Consulta de Dados</h4>
                    <li>ID</li>
                    <li>Nome</li>
                    <li>Contato</li>
                    <li>Email</li>
                    <li>Opções:</li>
                </ul>
                <div id="containerDadosDeContatos">
                <?php
                    $dadosContatos = exibirContatos();
                    while($rsContatos=mysqli_fetch_assoc($dadosContatos))
                    {
                ?>
                    <div class="id"><?=$rsContatos['idcontatos']?></div>
                    <div class="nome"><?=$rsContatos['nome']?></div>
                    <div class="contato"><?=$rsContatos['numero']?></div>
                    <div class="email"><?=$rsContatos['email']?></div>
                    <div class="opcoes">
                        <a onclick= "return confirm('Tem certeza que deseja excluir?');" href="controles/excluiDadaosContatos.php?id=<?=$rsContatos['idcontatos']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </main>
        <footer>
            <?php require_once'./footer.php'?>
        </footer>
    </div>
</body>
</html>