<?php

//Para Fazer Logout
    //unset()
    //session_destroy()

    unset($_SESSION['statusLogin']);
    unset($_SESSION['nomeAdmin']);
    session_destroy();

    header('location:../index.php');
?>