<?php

//session_status() retorna de sessão já foi iniciada
//PHP_SESSION_ACTIVE - valida se já esta na memória o status de ativo
if(session_status() != PHP_SESSION_ACTIVE)
session_start();

?>

<div id="txtBemVindo">Bem Vindo <?=$_SESSION['nomeAdmin']?></div>
  <ul>
      <li>
        <a href="../Admin/produtos.php">
          <div id="imgAdmProdutos"></div>
          <h3>Adm. de Produtos</h3>
        </a>
      </li>
      <li>
        <a href="../Admin/categorias.php">
            <div id="imgAdmCategoria"></div>
            <h3>Adm. de Categorias</h3>
          </a>
      </li>
      <li>
        <a href="../Admin/contatos.php">
          <div id="imgContatos"></div>
          <h3>Contatos</h3>
          </a>
      </li>
      <li>
        <a href="../Admin/usuario.php">
          <div id="imgUsuario"></div>
          <h3>Usúarios</h3>
          </a>
      </li>
      <li id="containerLogout">
        <a href="../Admin/logout.php">  
          <div id="imgLogout"></div>
          <h3>logout</h3>
        </a>
      </li>
  </ul>