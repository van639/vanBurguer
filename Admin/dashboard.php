<?php
    session_start();
    if(!isset($_SESSION['statusLogin']) || !$_SESSION['statusLogin'])
    {
        
        header('location: ./index.php');
    }
       


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
            <h2>Titulo Da Sessão</h2>
            <div id="containerTextDasborad">
                <p>Bem-Vindo <?=$_SESSION['nomeAdmin']?> a arêa de admnistração da Van-Burgueria, aqui você poderá adcionar, atualizar e deletar produtos,
                 categorias e usúarios e terá acesso aos contatos de quem escreveu na página principal. </p>
            </div>
        </main>
        <footer>
            <?php require_once'./footer.php'?>
        </footer>
    </div>
</body>
</html>