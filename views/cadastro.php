<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <?php @require"header.php"; ?>
    <main>
        <section id="section-cadastro">
            <div id="div-form">
                <h1>Cadastrar</h1>
                <form action="" class="action" method="post">
                    <div class="div-inputs">
                        <div  class="dados">
                            <div class="campo">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="iemail" placeholder="Seu E-mail" required maxlength="30">
                            </div>

                            <div class="campo">
                                <label for="email">Senha</label>
                                <input type="nome" name="nome" id="nome" placeholder="Sua Senha" required minlength="8" maxlength="20">
                            </div>

                            <div class="campo">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" placeholder="Seu CPF" required minlength="11" maxlength="11">
                            </div>
                        </div>

                        <div class="dados">
                            <div class="campo">
                                <label for="nomeusuario">Nome de Usuário</label>
                                <input type="text" name="nomeusuario" id="nomeusuario" placeholder="Seu Usuário" required maxlength="20">
                            </div>

                            <div class="campo">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="itelefone" placeholder="Seu Telefone" required minlength="13" maxlength="13">
                            </div>

                            <div class="campo">
                                <label for="datanasc">Data de Nascimento</label>
                                <input type="date" name="datanasc" id="datanasc" placeholder="Sua data de nascimento" required minlength="8" maxlength="8">
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Entrar">

                    <div class="login-cadastro">
                        <a href=""><img src="../img/google.png" alt="logo google de cadastro"></a>

                        <a href="">Salvar</a>
                        <a href="login.php">Já tem conta?</a>
                    </div>
                </form>

            </div>
        </section>
               
                 
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>