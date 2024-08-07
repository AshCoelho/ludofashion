<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/desejos.css">
    <title>LudoFashion</title>
</head>
<body>
    <?php @require"nav.php"; ?>
    <main>
        <section>
            <div id="menu">
                <p class="menu-icon"><img src="../img/perfil-perfil.png" alt="" width="30px" height="30px"><a href="perfil.php" id="perfil-menu">Minha Conta</a></p>
                <p  class="menu-icon"><img src="../img/coracao-perfil.png" alt="" width="30px" height="30px"><a href="desejos.php" id="coracaoperf">Listas de Desejos</a></p>
                <p  class="menu-icon"><img src="../img/menu-perfil.png" alt="" width="40px" height="40px" id="categ"><a href="categorias.php" id="catego-perfil">Categorias</a></p>
                <p  class="menu-icon"><img src="../img/caixa-perfil.png" alt="" width="30px" height="30px"><a href="produtos.php" id="prod">Produtos</a></p>
            </div>
            <div id="main-secundaria">
                <div id="titulo-perfil">
                    <h1 class="titulo">Minha Lista de Desejos</h1>
                    <p class="titulo">Gerenciar sua lista de desejos</p>
                </div>
                <div id="grid">
                    <div class="desejo">
                        <img src="../img/calçAlfaiataria.jpg" alt="" width="80px" height="100px"> 
                        <a href=""><p class="descricao">Calça Alfaiataria Tamanho 40 <br class="descricao-cor"><span class="fino">Preto, Branco, Bege e Rosa </span> </p></a>
                        <p id="preco1">R$ 140,00</p>
                    </div>
                    <div class="desejo">
                        <img src="../img/anabela.jpg" alt="" width="80px" height="100px">
                        <a href="produtos.html"><p class="descricao">Sandália Anabela Tamanho 35 ao 39<br> <span class="fino">Dourado e Branco</span></p> </a>
                        <p id="preco2">R$ 135,00</p>
                    </div>
                    <div class="desejo">
                        <img src="../img/cropped.jpg" alt="" width="80px" height="100px"> 
                        <a href=""><p class="descricao">Cropped Manga Longa Tamanho M <br class="descricao-cor"><span class="fino">Rosa, Branco e Azul</span></p></a>
                        <p id="preco3">R$ 70,00</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>