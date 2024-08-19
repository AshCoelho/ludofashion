<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Obtém o ID do usuário a partir da sessão
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch(); //armazenar

if ($user['perfil'] !== 'administrador') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    if (isset($_POST['adicionar'])) {
          
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = hash('sha256', $_POST['senha']);
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];

       
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, cpf, telefone, nascimento, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)');
       
        $stmt->execute([$nome, $email, $senha, $cpf, $telefone, $nascimento, 'normal']);
    }

   
    if (isset($_POST['excluir'])) {
        $ids = $_POST['ids'];
        // Converte os IDs para inteiros e cria uma string separada por vírgulas
        $ids = implode(',', array_map('intval', $ids));
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id IN ($ids)");
        $stmt->execute();
    }

    // Processa a edição de informações de um usuário
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];
        
        $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, email = ?, cpf = ?, telefone = ?, nascimento = ? WHERE id = ?');
        $stmt->execute([$nome, $email, $cpf, $telefone, $nascimento, $id]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="../css/gerenciador_admin.css">
    <script src="DOM.js" defer></script>
</head>
<body>
    <?php @require"nav.php"; ?>
    <h1>Gerenciamento de Usuários</h1>

    <!-- Formulário para adicionar um novo usuário -->
    <h2>Adicionar Usuário</h2>
    <form method="post" action="" id="formulario">
        <label>Nome:</label>
        <input type="text" name="nome" class="input_admin"required>
        <label>Email:</label>
        <input type="email" name="email" class="input_admin" required>
        <label>Senha:</label>
        <input type="password" name="senha" class="input_admin" required>
        <label>Cpf:</label>
        <input type="text" name="cpf" class="input_admin" required>
        <label>Telefone:</label>
        <input type="text" name="telefone" class="input_admin" required>
        <label>Nascimento:</label>
        <input type="text" name="nascimento" class="input_admin" required>
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <!-- Tabela de usuários com opções de edição e exclusão -->
    <h2>Usuários</h2>
    <form method="post" action="" >
        <table>
            <tr>
                <th>Selecionar</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php
            // Listar todos os usuários
            $stmt = $pdo->query('SELECT * FROM usuarios');
            while ($row = $stmt->fetch()) {
                echo "<tr>
                    <td><input type='checkbox' name='ids[]' value='{$row['id']}'></td>
                    <td>{$row['nome']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <!-- Formulário de edição -->
                        <form method='post' action='' style='display:inline'>
                            <label>Nome:</label>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='text' name='nome' value='{$row['nome']}' required>
                            <label>E-mail:</label>
                            <input type='email' name='email' value='{$row['email']}' required>
                            <label>Cpf:</label>
                            <input type='text' name='cpf' value='{$row['cpf']}' required>
                            <label>Telefone:</label>
                            <input type='text' name='telefone' value='{$row['telefone']}' required>
                            <label>Data de Nascimento:</label>
                            <input type='text' name='nascimento' value='{$row['nascimento']}' required>
                            <button type='submit' name='editar'>Editar</button>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <button type="submit" name="excluir" id="butao_excluir">Excluir Selecionados</button>
    </form>
</body>
</html>
