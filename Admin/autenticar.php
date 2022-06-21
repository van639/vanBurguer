<?php
//Import do Arquivo Conexão
require_once('functions/config.php');
require_once('bd/conexaoMysql.php');

$login = (string) null;
$senha = (string) null;

//Recebe os dados via post do Login
$login = $_POST['txtLogin'];
$senha = sha1($_POST['txtSenha']);

if($login != "" && $senha != "")
{
    $sql = "select * from tblusuario
        where nomeUsuario = '".$login."' and
              senha = '".$senha."'";
    
    $conexao = conexaoMysql();
    
    $select = mysqli_query($conexao, $sql);
    if($rsUsuario = mysqli_fetch_assoc($select))
    {
        //Ativa o uso de variavel de sessao
        session_start();
        //variavel de sessão
        $_SESSION['nomeAdmin'] = $rsUsuario['nome'];
        $_SESSION['statusLogin'] = true;

        //Permite redirecionar para uma página
        header('location:./dashboard.php');
    }
    else
        echo(MSG_SENHA_LOGIN_INVALIOS);
        
}

?>