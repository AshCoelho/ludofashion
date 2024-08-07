<?php
session_start();
require 'config.php';

// Verificar login e perfil
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
<?php require"header.php"?>
        <h1 class="usuario" >Olá Administrador!</h1>
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
