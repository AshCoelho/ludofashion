<?php
// Declaração da classe Usuario
class Usuario {
    // Atributo para armazenar a conexão com o banco de dados
    private $conexao;

    // Construtor da classe que inicializa a conexão
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Método para adicionar um usuario no banco de dados
    public function adicionar($email, $senha, $cpf, $telefone, $nome_usuario, $nascimento) {
        // SQL para inserir um novo usuario
        $sql = "INSERT INTO usuarios (email, senha, cpf, telefone, nome_usuario, nascimento) VALUES (:email, :senha, :cpf, :telefone, :nome_usuario, :nascimento)";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':nascimento', $nascimento);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }

    // Método para listar todos os usuarios do banco de dados
    public function listar() {
        // SQL para selecionar todos os usuarios
        $sql = "SELECT * FROM usuarios";
        // Executa a consulta SQL
        $stmt = $this->conexao->query($sql);
        // Retorna todos os resultados da consulta como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para editar um usuario no banco de dados
    public function editar($id, $email, $senha, $cpf, $telefone, $nome_usuario, $nascimento) {
        // SQL para atualizar os dados de um usuario específico
        $sql = "UPDATE usuarios SET email = :email, cpf = :cpf, telefone = :telefone, nome_usuario = :nome_usuario, nascimento = :nascimento WHERE id = :id";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':nascimento', $nascimento);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }

    // Método para deletar usuarios selecionados
    public function deletar($ids) {
        // SQL para deletar os usuarios cujos IDs estão no array $ids
        $sql = "DELETE FROM usuarios WHERE id IN (" . implode(',', $ids) . ")";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }
}
?>
