<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>LudoFashion</title>
</head>
<body>
    <?php
    require"nav.php"; 
session_start();
require 'config.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Buscar informações do usuário
$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
$stmt->execute([$user_id]);
$user_info = $stmt->fetch();

// Processar edição de informações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    
    // Verificar se a senha foi fornecida e atualizá-la
    if (!empty($_POST['senha'])) {
        $senha = hash('sha256', $_POST['senha']);
        $stmt = $pdo->prepare('UPDATE usuarios SET senha = ?, email = ?, telefone = ?, cpf = ?, nascimento = ? WHERE id = ?');
        $stmt->execute([$senha, $email, $telefone, $cpf, $nascimento,  $user_id]);
    } else {
        // Atualizar apenas os campos não sensíveis
        $stmt = $pdo->prepare('UPDATE usuarios SET senha = ?, email = ?, telefone = ?, cpf = ?, nascimento = ? WHERE id = ?');
        $stmt->execute([$senha, $email, $telefone, $cpf, $nascimento,  $user_id]);
    }
    
    // Redirecionar para evitar reenvio de formulário
    header('Location: perfil.php');
    exit();
}
?>
    <main>
        <section>
            <div id="menu">
                <p class="menu-icon"><img src="../img/perfil-perfil.png" alt="" width="30px" height="30px"><a href="" id="perfil-menu">Minha Conta</a></p>
                <p  class="menu-icon"><img src="../img/coracao-perfil.png" alt="" width="30px" height="30px"><a href="desejos.php" id="coracaoperf">Listas de Desejos</a></p>
                <p  class="menu-icon"><img src="../img/menu-perfil.png" alt="" width="40px" height="40px" id="categ"><a href="categorias.php" id="catego-perfil">Categorias</a></p>
                <p  class="menu-icon"><img src="../img/caixa-perfil.png" alt="" width="30px" height="30px"><a href="produtos.php" id="prod">Produtos</a></p>
            </div>
            <div id="perfil">
                <div id="titulo-perfil">
                    <h1 class="titulo">Meu perfil</h1>
                    <p class="titulo">Gerenciar e proteger sua conta</p>
                </div>
                
                <div id="perfil-grid">
                    <form method="post" action="">

                        
                        <label for="nome">Senha:</label>
                        <input type="text" name="nome" class="input" class="editar" id="edit" value="" required>Editar <br>

                        <label for="">Email:</label>
                        <input type="email" name="email" id="email"  class="input" required class="editar" id="editar" value=""> Editar <br>

                        <label for="" >Telefone:</label>
                        <input type="text" name="telefone"class="input" class="editar" id="editar" value="" required>Editar <br>

                        <label for="" >Sexo:</label>
                        <input type="radio" name="sexo"  > Masculino
                        <input type="radio" name="sexo"  > Feminino
                        <input type="radio" name="sexo"  > Outros
                        <br>

                        <label for="">CPF</label>
                        <input type="text" name="cpf" class="input" value="" required> <br>

                        <label for="" name="nascimento" id="nascimento">Data de nascimento:</label>
                        <input type="text" name="cpf" class="input" value="" required> <br>

                        <input type="submit" value="Gravar" id="gravar">
                    </form>
                    
                </div>
                 
            </div>
        </section>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html> 