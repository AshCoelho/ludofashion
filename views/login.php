<?php
session_start();
require 'config.php';

// Processar o login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se 'email' e 'senha' estão definidos
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verificar se o login é para o administrador
        if ($email === 'admin@exemplo.com' && hash('sha256', $senha) === hash('sha256', 'senha_admin')) {
            $_SESSION['user_id'] = 1; // ID do administrador
            header('Location: crud.php');
            exit();
        } else { 
            // Buscar informações do usuário normal
            $stmt = $pdo->prepare('SELECT id, perfil, senha FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            // Verificar se a senha está correta
            if ($user && hash('sha256', $senha) === $user['senha']) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php');
                exit();
            } else {
                $error = 'Email ou senha incorretos!';
            }
        }
    } else {
        $error = 'Por favor, preencha todos os campos!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php @require "nav.php"; ?>
    <main>
        <section id="login">
            <div id="formulario">
                <h1>Login</h1>

                <form method="post" action="">
                    <div class="campo">
                        <label for="ilogin">E-mail</label>
                        <input type="email" name="email" id="ilogin" required placeholder="seu email" maxlength="30">
                    </div>

                    <div class="campo">
                        <label for="isenha">Senha</label>
                        <input type="password" name="senha" id="isenha" required placeholder="sua senha" minlength="8" maxlength="20">
                    </div>
                    <button type="submit" id="entrar">Entrar</button>
                    <?php if (isset($error)) echo "<p>$error</p>"; ?>
                    <div class="login-cadastro">
                        <a href=""><img src="../img/google.png" alt="logo google de cadastro"></a>

                        <a href="cadastro.php">Cadastrar</a>
                        <a href="duvidas.php">Precisa de Ajuda?</a>
                    </div>
                </form>
            </div>
        </section>          
    </main>
    <?php @require "footer.php"; ?>
</body>
</html>
