<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php @require"header.php"; ?>
    <main>
        <section id="login">
            <div id="formulario">
                <h1>Login</h1>

                <form action="">
                    <div class="campo">
                        <label for="ilogin">E-mail</label>
                        <input type="email" name="login" id="ilogin" placeholder="seu email" required maxlength="30">
                    </div>

                    <div class="campo">
                        <label for="isenha">Senha</label>
                        <input type="password" name="senha" id="isenha" placeholder="sua senha" required minlength="8" maxlength="20">
                    </div>
                    <button id="entrar">Entrar</button>

                    <div class="login-cadastro">
                        <a href=""><img src="../img/google.png" alt="logo google de cadastro"></a>

                        <a href="perfil.php">Cadastrar</a>
                        <a href="duvidas.php">Precisa de Ajuda?</a>
                    </div>
                </form>

            </div>
        </section>          
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>