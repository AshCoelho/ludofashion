<?php
class Usuario {
    private $conexao;


    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    
    public function adicionar($nome, $email, $senha, $cpf, $telefone, $nascimento) {
        $senhaHash = hash('sha256', $senha); // Criptografa a senha usando SHA-256
        $sql = "INSERT INTO usuarios (nome, email, senha, cpf, telefone, nascimento) VALUES (:nome, :email, :senha, :cpf, :telefone, :nascimento)";
        
      
        $stmt = $this->conexao->prepare($sql);
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash); // Usa a senha criptografada
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':nascimento', $nascimento);
        
        
        return $stmt->execute();
    }

    
    public function listar() {
        // SQL para selecionar todos os usuarios
        $sql = "SELECT * FROM usuarios";
      
        $stmt = $this->conexao->query($sql);
      
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function editar($id, $nome, $email, $senha, $cpf, $telefone, $nascimento) {
        $senhaHash = hash('sha256', $senha); // Criptografa a senha usando SHA-256
        
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, cpf = :cpf,  telefone = :telefone, nascimento = :nascimento  WHERE id = :id";
      
        $stmt = $this->conexao->prepare($sql);

        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash); // Usa a senha criptografada
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':nascimento', $nascimento);
        
      
        return $stmt->execute();
    }

   
    public function deletar($ids) {
        // SQL para deletar os usuarios cujos IDs estão no array $ids
        $sql = "DELETE FROM usuarios WHERE id IN (" . implode(',', array_map('intval', $ids)) . ")";
       
        $stmt = $this->conexao->prepare($sql);
      
        return $stmt->execute();
    }

   
    public function verificarSenha($senhaFornecida, $senhaHash) {
        // Compara a senha fornecida com a senha armazenada (criptografada) no banco de dados
        return hash('sha256', $senhaFornecida) === $senhaHash;
    }
}
?>