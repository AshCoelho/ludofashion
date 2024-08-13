-- Criação do banco de dados
CREATE DATABASE usuarios_db;

-- Seleção do banco de dados
USE usuarios_db;

-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    telefone VARCHAR(12) NOT NULL,
    nascimento VARCHAR(10),
    perfil ENUM('normal', 'administrador') DEFAULT 'normal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Inserção do usuario e administrador 
INSERT INTO usuarios (nome, email, senha, cpf, telefone, nascimento, perfil) VALUES 
('normal', 'normal@exemplo.com', SHA2('12345678', 256), '12345678912', '123456789123', '2024-12-12','normal');


INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador', 'admin@exemplo.com', SHA2('senha_admin', 256), 'administrador');


