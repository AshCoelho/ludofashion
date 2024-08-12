<?php
// Inicia uma sessão para acessar variáveis de sessão
session_start();
// Requer o arquivo de configuração do banco de dados
require 'config.php';

// Verificar se o usuário está logado e é um administrador
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: login.php');
    // Encerra o script
    exit();
}

// Obtém o ID do usuário a partir da sessão
$user_id = $_SESSION['user_id'];

// Prepara uma consulta para buscar o perfil do usuário
$stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
$stmt->execute([$user_id]);// Executa a consulta com o ID do usuário
$user = $stmt->fetch();// Armazena o resultado da consulta

// Se não for administrador, redirecionar para login
if ($user['perfil'] !== 'administrador') {
    header('Location: login.php');
    exit();// Encerra o script
}

// Verifica se o método de requisição é POST para processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processa a inclusão de um novo usuário
    if (isset($_POST['adicionar'])) {
          // Coleta os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = hash('sha256', $_POST['senha']);
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];

        // Prepara uma consulta para inserir o novo usuário no banco de dados
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, cpf, telefone, nascimento, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)');
        // Executa a consulta com os dados fornecidos
        $stmt->execute([$nome, $email, $senha, $cpf, $telefone, $nascimento, 'normal']);
    }

    // Processa a exclusão de usuários selecionados
    if (isset($_POST['excluir'])) {
         // Obtém os IDs dos usuários selecionados
        $ids = $_POST['ids'];
        // Converte os IDs para inteiros e cria uma string separada por vírgulas
        $ids = implode(',', array_map('intval', $ids));
        // Prepara uma consulta para excluir os usuários selecionados
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id IN ($ids)");
        // Executa a consulta
        $stmt->execute();
    }

    // Processa a edição de informações de um usuário
    if (isset($_POST['editar'])) {
        // Coleta os dados do formulário de edição
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];
        
        // Prepara uma consulta para atualizar as informações do usuário
        $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, email = ?, cpf = ?, telefone = ?, nascimento = ? WHERE id = ?');
        // Executa a consulta com os dados fornecidos
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
