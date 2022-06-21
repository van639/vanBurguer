<?php
require_once('./Admin/functions/config.php');
require_once(SRC.'controles/recebeDadosContatos.php');
require_once(SRC.'bd/conexaoMysql.php');
require_once(SRC.'controles/exibiDadosCategoria.php');
require_once(SRC.'controles/exibiDadosProdutos.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Van Burguer</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script/bannerRotativov.js" defer></script>
    <script src="script/ancora.js" defer></script>
    <script src="script/jquery.js" defer></script>
</head>
<body>
    <div id="containerPrincipal">
        <!-- MENU -->
        <header>
            <ul>
             <li id="logo"></li>   
             <li class="menu">
                <a href="#containerEmpresa">A Empresa</a> 
            </li>   
             <li class="menu">
                <a href="#containerContatosNossasLojas">Lojas</a>    
            </li>   
             <li class="menu">
                <a href="#containerHamburguersPromocao">Promoções</a> 
            </li>   
             <li class="menu">
                <a href="#containerDestaques">Destaques</a> 
            </li>   
             <li class="menu">
                 <a href="#containerContatos">Contatos</a>
            </li>   
            </ul>
        </header>
        <!-- BANNER -->
        <div id="banner">
            <img class="selected" src="img/imagePrincipal01.jpg" alt="Image1">
            <img src="img/imgPrincipal01.PNG" alt="Image2">
            <img src="img/banner03.jpg" alt="Image3">
            <img src="img/banner04.jpg" alt="Image4">
            <h1>Van-Burguer</h1>
        </div>
        <form action="" method="post">
        <!-- CONTEUDO -->
        <div id="containerConteudo">
            
                <div id="containerPesquisa">
                    <div id="caixaMenu">
                        <div id="menuAnimation">
                        <ul>
                        <?php
                        $dadosCategorias = exibirCategorias();

                        while($rsCategorias=mysqli_fetch_assoc($dadosCategorias))
                        {
                        ?>
                            <li class="menuItem"><a href=""><?=$rsCategorias['tipo']?></a></li>
                        <?php
                        }
                        ?>
                        </ul>  
                        </div>   
                    </div>
                    <div id="pesquisa">
                        <input class="campoPesquisa"  type="text">
                        <button id="lupa"></button>
                    </div>

                </div>
                <!-- Area produtos -->
                <div id="containerHamburguers">
                    <main>
                    <?php
                        $dadosProdutos = exibirProdutos();
                        while($rsProdutos=mysqli_fetch_assoc($dadosProdutos))
                        {
                    ?>
                        <div class="hamburguersItems">
                             <img src="<?='./Admin/'.NOME_DIRETORIO_FILE.$rsProdutos['foto']?>">
                             <h2><?=$rsProdutos['nome']?></h2>
                            <p><?=$rsProdutos['descricao']?></p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco"><?='R$ '.$rsProdutos['preco']?></div>
                        </div>
                    <?php
                        }
                    ?>
                        <div class="hamburguersItems">
                            <img src="img/produto-01.jpg" alt=""/>
                            <h2>VanCheese</h2>
                            <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco">R$23,00</div>
                        </div>
                        <div class="hamburguersItems">
                            <img src="img/produto-02.png" alt="">
                            <h2>VanSalada</h2>
                            <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco">R$23,00</div>
                            
                        </div>
                        <div class="hamburguersItems">
                            <img src="img/produto-03.jpg" alt="" name>
                            <h2>VanSalada</h2>
                            <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco">R$23,00</div>
                        </div>
                        <div class="hamburguersItems">
                            <img src="img/produto-02.png" alt="">
                            <h2>VanSalada</h2>
                            <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco">R$23,00</div>
                        </div>
                        <div class="hamburguersItems">
                            <img src="img/produto-02.png" alt="">
                            <h2>VanSalada</h2>
                            <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                            <div class="btnSaibaMais">SAIBA MAIS</div>
                            <div class="preco">R$23,00</div>
                        </div>
                        
                    </main>
                </div>  <!-- CONTAINER hAMBURGUERS-->

                <div id="containerEmpresa">
                    <h2>A Empresa</h2>
                    <div id="txtHistoriaEmpresa">
                    Fundada em setembro de 2021 por Vanderson Aparecido aos seus 19 anos. A Van-Burgueria foi fazendo sucesso ao decorrer dos tempos
                    hoje em dia temos uma van-Burgueria por toda America do Sul uma finalização no alvo -, o Barcelona voltou a campo na noite desta quarta (29) pela Champions League, para encarar o Benfica. O torcedor catalão mais otimista 
                    poderia imaginar que o "pior já havia passado", afinal de contas, o Bayern é a principal força da chave.
                     Contudo, a partir do exato momento em que bola rolou no Estádio da Luz, os blaugranas viram o mesmo filme da estreia se repetir diante seus olhos.Se ignorarmos os comentários, com 3 linhas a mais temos um texto com degradê! Eu coloquei acima o que cada linha do CSS faz, mas vamos dar uma rápida passada pelo que está acontecendo aqui. Vamos montar cada etapa do exemplo acima.

                    Adicionar um degradê
                    Primeiro, precisamos ter um degradê. Em CSS, degradês são suportados como imagens de fundo. Usando background-image, podemos criar um degradês lineares, radiais e cônicos. No exemplo acima, usei um linear-gradient no sentido de cima para baixo (to bottom).
                    </div>
                    <div id="imgEmpresa"></div>
                </div> <!-- CONTAINER EMPRESA-->

                <h3>Nossas Promoções</h3>
                <div id="containerHamburguersPromocao">
                    <div class="hamburguersItems">
                        <img src="img/produto-02.png" alt="">
                        <h2>VanSalada</h2>
                        <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                        <div class="btnSaibaMais">SAIBA MAIS</div>
                        <div class="precoAntigo">R$25,00</div>
                        <div class="preco">R$23,00</div>
                    </div>
                    <div class="hamburguersItems">
                        <img src="img/produto-02.png" alt="">
                        <h2>VanSalada</h2>
                        <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                        <div class="btnSaibaMais">SAIBA MAIS</div>
                        <div class="precoAntigo">R$25,00</div>
                        <div class="preco">R$23,00</div>
                    </div>
                    <div class="hamburguersItems">
                        <img src="img/produto-02.png" alt="">
                        <h2>VanSalada</h2>
                        <p>Pão no senteio, salada, tomate, bife, molho barbecue</p>
                        <div class="btnSaibaMais">SAIBA MAIS</div>
                        <div class="precoAntigo">R$25,00</div>
                        <div class="preco">R$23,00</div>
                    </div>  
                    
                </div> <!-- containerHamburguersPromocao -->
                <div id="containerDestaques">
                    <div id="txtDEstaques">
                        <h3>Destaques da Loja</h3>
                    </div>
                    <div id="containerImgDestaque">
                        <div class="imgDestaque" id="gif01"></div>
                        <div class="imgDestaque" id="gif02"> </div>
                        <div class="imgDestaque" id="gif03"></div>
                        <div class="imgDestaque" id="gif04"></div>
                    </div>
                </div>
                
        </div> <!-- CONTAINER CONTEUDO-->
            <div id="containerContatosNossasLojas">
                <div id="containerLojas">
                    Nossas Lojas
                <div class="unidadesLoja">
                    Unidade Morumbi
                    <div id="imgNossasLojas01"></div>
                    <div class="txtLocalLoja">
                        Rua Gunkerty  n°:787
                        Cidade de São Paulo
                    </div>
                </div>
                <div class="unidadesLoja">
                    Unidade Alphaville
                    <div id="imgNossasLojas02"></div>
                    <div class="txtLocalLoja">
                        Rua Albuquerqui n°: 358
                        Cidade de Barueri sp
                    </div>
                </div>
                </div>
                <div id="containerContatos">
                    ENTRE EM CONTATO
                    <div class="classInserirContatos">
                        <label>
                            Nome:
                        </label> 
                        <input class="inserirDados" type="text" name="txtNome" size="20" maxlength="45" value="" placeholder="Insira seu nome">

                    </div>
                    <div class="classInserirContatos">
                        <label>
                            E-mail:
                        </label> 
                        <input class="inserirDados" type="text" name="txtEmail" size="20" maxlength="45" value="" placeholder="Insira seu e-mail">
                        
                    </div>
                    <div class="classInserirContatos">
                        <label>
                            Celular:
                        </label> 
                        <input  class="inserirDados" type="text" name="txtCelular" size="20" maxlength="40" value="" placeholder="Insira seu numero">
                        
                    </div> 
                    <input type="submit" id="butaoformulario" value="Enviar" name="btnEnviar">
                </div>
                <div id="containerRedesSociais">
                    <a href="https://pt-br.facebook.com/">
                        <div class="facebook">
                        </div>
                    </a>
                    <a href="http://instagram.com/__vandinho">
                    <div class="instagram"></div>
                    </a>
                    <a href="https://www.whatsapp.com/?lang=pt_br">
                    <div class="whatsApp"></div>
                    </a>
                </div>
            </div>
        </form>
    </div> <!-- CONTAINER PRRINCIPAL-->
    <footer>
        <span>Copyright &copy; 2021| Vanderson Aparecido</span>
    </footer>
</body>
</html>