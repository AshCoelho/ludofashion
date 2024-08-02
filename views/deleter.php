<?php
// Inclui os arquivos de conexão e da classe Usuario
require 'conexao.php';
require 'Usuario.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Usuario
$usuario = new Usuario($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os IDs dos usuarios selecionados para deletar
    $ids = $_POST['ids'];

    // Deleta os usuarios selecionados no banco de dados
    $usuario->deletar($ids);
    // Redireciona para a página inicial
    header('Location: index.php');
}
?>
