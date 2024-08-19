<?php
session_start();
require 'config.php';

// Bloco de verificação de autenticação e perfil do usuário
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();


    if ($user['perfil'] !== 'administrador') {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Ludo Fashion</title>
</head>
<body>
<header>
    <a href="index.php" class="ludo"><img src="../img/logo.png" alt="" width="60px"></a>
    <form action="" id="form-buscar">
        <input type="search" name="buscar" id="buscar" placeholder="Buscar...">
        <button type="submit" id="btn-buscar" alt=""><img src="../img/lupa.png" alt="lupa" width="25px"></button>
    </form>

    <a href="crud.php" class="icon-link">
        <img src="../img/admin.png" alt="">
        Usuários
    </a>


    <a href="duvidas.php" class="icon-link">
        <img src="../img/ajuda.png" alt="Ajuda">
        Dúvidas
    </a>
    <a href="login.php" class="icon-link">
        <img src="../img/sair-perfil.png" alt="sair">
        Sair
    </a>
</header>
<nav>
        <a href="catalogo.php" class="catalogo">Catálogo</a>
        <a href="sobre.php" class="sobre">Sobre a Loja</a>
    </nav>
        <h1 class="usuario" >Olá Administrador, seja bem vindo!</h1>
        <section id="banner">
                <div id="txt-banner">
                    <p style="font-size: 25px;">Promoção</p>
                    <p style="font-size: 80px;">50%</p>
                    <p style="font-size: 80px;">OFF</p>
                    <p style="font-size: 25px;">Desconto em toda a coleção de verão</p>
                </div>
        </section>

        <section class="conteudo">
            
            <h1><em>Desconto em toda a coleção de verão </em></h1>

            <div class="card-container">
                <div class="teste">
                    <div class="card">
                        <img src="../img/conj-azul.jpg" alt="" width="100%">
                    </div>
                </div>

                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conjunto-nude.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/canga.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conj-laranja.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conju-azil.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="teste">
                    <div class="card">
                        <img src="../img/calça-pan.jpg" alt="" width="100%">
                    </div>
                </div>

                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/biquine.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/blusa-azul.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/calça-verde.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/jaqueta.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
             </div>
        </section>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>
