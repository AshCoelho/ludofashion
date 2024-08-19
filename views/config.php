<?php
$host = 'localhost'; 
$db   = 'usuarios_db'; 
$user = 'root';    
$pass = '';       

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
     // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>
