<?php
// Configurações do banco de dados
$host = 'localhost';   // Endereço do servidor MySQL (neste caso, o servidor está na máquina local)
$db   = 'usuarios_db'; // Nome do banco de dados ao qual você deseja se conectar
$user = 'root';         // Nome de usuário do MySQL (geralmente 'root' para ambiente local)
$pass = '';          // Senha do MySQL (geralmente vazio para ambiente local, mas pode variar)


// Tentar conectar ao banco de dados usando PDO (PHP Data Objects)
try {
    // Criar uma nova instância de PDO para se conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
     // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibir mensagem de erro se a conexão falhar
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>
