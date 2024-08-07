
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <?php @require"nav.php"; 
    
    // Inclui os arquivos de conexão e da classe Carro
    require 'conexao.php';
    require 'cadastroclass.php';

    // Cria a conexão com o banco de dados
    $conexao = (new Conexao())->conectar();
    // Cria uma instância da classe Carro
    $usuario = new Usuario($conexao);

    // Verifica se a requisição é do tipo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtém os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];

        // Adiciona o carro no banco de dados
        $usuario->adicionar($nome, $email, $senha, $cpf, $telefone, $nascimento);
        // Redireciona para a página inicial
        header('Location: index.php');
        exit;
    }
?>
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
                                <input type="text" name="nome" id="nomeusuario" placeholder="Seu Usuário" required maxlength="20">
                            </div>

                            <div class="campo">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" placeholder="Seu Telefone" required maxlength="13">
                            </div>

                            <div class="campo">
                                <label for="datanasc">Data de Nascimento</label>
                                <input type="date" name="nascimento" id="datanasc" required>
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
