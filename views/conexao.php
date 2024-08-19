<?php
//declaracao
class Conexao {
   
    private $host = 'localhost';
    private $dbname = 'usuarios_db';
    private $usuario = 'root';
    private $senha = '';

   
    public function conectar() {
        try {
            
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->senha);
            // Define o modo de erro do PDO para exceções
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
?>