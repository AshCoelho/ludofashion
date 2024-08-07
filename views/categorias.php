<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/categorias.css">
    <title>LudoFashion</title>
</head>
<body>
    <?php @require"nav.php"; ?>
    <main>
            <div id="categoria-container">
                <div class="menu-cat">
                    <img src="../img/menu.png" alt="" class="menu-icon">
                    <h1 class="titulo">Categorias</h1>
                </div>
                <div class="flex">
                    <div  id="categoria-grid">
                    
                        <div class="produtos" width="100%">
                            <p class="nomes-cat">Casual</p> 
                            <img src="../img/editar.png" alt="" width="25px" height="26px"  class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="25px" height="26px" class="animacao">
                        </div>

                        <div class="produtos" width="100%">
                            <p class="nomes-cat">Social</p>
                            <img src="../img/editar.png" alt="" width="25px"  height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="25px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Maquiagem</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Esportivo</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Bolsas</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Banho</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Langeries</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                         <div class="produtos" width="100%">
                            <p class="nomes-cat">Calcinhas</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                       <div class="produtos" width="100%">
                            <p class="nomes-cat">Moda praia</p>
                            <img src="../img/editar.png" alt="" width="24px" height="26px" class="animacao"> 
                            <img src="../img/lixeira.png" alt="" width="24px" height="26px" class="animacao">
                       </div>
                   
                    </div>
                    <a href="produtos-cadastrados.php"><p id="adicionar-produtos" class="animacao"><img src="../img/adicionar.png" alt="adicionar produto" width="25px" height="25px" id="icon-adicionar" class="animacao"> Adicionar categoria<p></a>
                </div>
            </div>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>