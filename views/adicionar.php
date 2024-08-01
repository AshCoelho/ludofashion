<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'usuario.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Carro
$usuario = new Usuario($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $nome_usuario = $_POST['nome_usuario'];
    $nascimento = $_POST['nascimento'];
    // Adiciona o carro no banco de dados
    $carro->adicionar($email, $senha, $cpf, $telefone, $nome_usuario, $nascimento);
    // Redireciona para a página inicial
    header('Location: index.php');
}
?>
