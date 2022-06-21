<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <div id="containerLogin">
        <h1>Autenticação para o CMS</h1><br>
        <p>Van-Burgueria</p>
        <form action="autenticar.php" name="frmLogin" method="post">
        <label>
            Login:
        </label>
        <input class="inserirDados" type="text" name="txtLogin" size="20" maxlength="40" value=""><br><br>
        <label>
            Senha:
        </label>
        <input class="inserirDados" type="password" name="txtSenha" size="20" maxlength="40" value=""><br>
        <input id="button" type="submit" name="" value="Login">
        </form>
    </div>
</body>
</html>