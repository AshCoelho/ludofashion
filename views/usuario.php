<?php
// Definimos a classe User que vai representar um usuário no sistema.
class Usuario {
    private $conn; // Propriedade que vai armazenar a conexão com o banco de dados
    private $table_name = 'usuarios'; // Nome da tabela no banco de dados

    // Propriedades da classe que correspondem às colunas da tabela.
    public $id;
    public $name;
    public $email;
    public $senha;
    public $cpf;
    public $telefone;
    public $nascimento;


    // O construtor da classe recebe a conexão com o banco de dados.
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário no banco de dados.
    public function create() {
        // Definimos a query SQL para inserir um novo usuário.
        $query = 'INSERT INTO ' . $this->table_name . ' SET name=:name, email=:email, senha=:senha, cpf=:cpf, telefone=:telefone, nascimento=:nascimento';
        // Preparamos a query.
        $stmt = $this->conn->prepare($query);

        // Sanitizamos os dados.
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->nascimento = htmlspecialchars(strip_tags($this->nascimento));

        // Associamos os valores aos parâmetros da query.
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', password_hash($this->senha, PASSWORD_BCRYPT));
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':nascimento', $this->nascimento);

        // Executamos a query e retornamos true em caso de sucesso, ou false em caso de falha.
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todos os usuários do banco de dados.
    public function read() {
        // Definimos a query SQL para selecionar todos os usuários.
        $query = 'SELECT * FROM ' . $this->table_name;
        // Preparamos a query.
        $stmt = $this->conn->prepare($query);
        // Executamos a query.
        $stmt->execute();
        // Retornamos o resultado da query.
        return $stmt;
    }
}
?>
