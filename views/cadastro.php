<?php
include_once 'header.php'; // Incluímos o cabeçalho
include_once 'Database.php'; // Incluímos a classe Database
include_once 'Usuario.php'; // Incluímos a classe Usuario

// Criamos uma nova instância da classe Database e obtemos a conexão.
$database = new Database();
$db = $database->getConnection();

// Criamos uma nova instância da classe Usuario e passamos a conexão.
$usuario = new Usuario($db);

// Verificamos se o formulário foi enviado.
if ($_POST) {
    // Definimos as propriedades do usuário com os valores do formulário.
    $usuario->nome = $_POST['nomeusuario'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->cpf = $_POST['cpf'];
    $usuario->telefone = $_POST['telefone'];
    $usuario->nascimento = $_POST['datanasc'];

    // Tentamos criar o usuário e exibimos uma mensagem de sucesso ou erro.
    if ($usuario->create()) {
        echo '<div class="alert alert-success">Usuário criado com sucesso.</div>';
    } else {
        echo '<div class="alert alert-danger">Erro ao criar usuário.</div>';
    }
}
?>

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
                <form action="cadastro.php" method="post">
                    <div class="div-inputs">
                        <div class="dados">
                            <div class="campo">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="iemail" placeholder="Seu E-mail" required maxlength="30">
                            </div>

                            <div class="campo">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" placeholder="Sua Senha" required minlength="8" maxlength="20">
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
                                <input type="tel" name="telefone" id="telefone" placeholder="Seu Telefone" required maxlength="13">
                            </div>

                            <div class="campo">
                                <label for="datanasc">Data de Nascimento</label>
                                <input type="date" name="datanasc" id="datanasc" required>
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Cadastrar">

                    <div class="login-cadastro">
                        <a href="login.php">Já tem conta?</a>
                    </div>
                </form>
            </div>
        </section>         
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>
