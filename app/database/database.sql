CREATE DATABASE IF NOT EXISTS systems;

USE systems;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    sobrenome VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    aniversario DATE,
    telefone VARCHAR(9),
    CPF VARCHAR(11) UNIQUE,
    RG VARCHAR(30),
    genero VARCHAR(225),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    cep VARCHAR(9),
    rua VARCHAR(255),
    bairro VARCHAR(225),
    cidade VARCHAR(255),
    uf VARCHAR(2),
    ibge VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS cadastro_conta_corrente (
    id INT AUTO_INCREMENT PRIMARY KEY, -- 
    userId INT,
    titular VARCHAR(100),
    nome_do_banco VARCHAR(255),
    prefixo INT,
    numero_da_agencia VARCHAR(255),
    nome_da_conta VARCHAR(255),
    saldo DECIMAL(10, 2) DEFAULT NULL, -- Saldo pode ser indefinido (NULL)
    limite DECIMAL(10, 2) DEFAULT NULL, -- Limite da conta (corrigido para DECIMAL)
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME ON UPDATE CURRENT_TIMESTAMP,
    status INT,
    CONSTRAINT fk_user FOREIGN KEY (userId) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS cadastro_conta_rede (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    nome_da_conta VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS cadastro_conta_vindi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    nome_da_conta VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS registro_de_despesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descriacao VARCHAR(255),
    tipo VARCHAR(255),
    data_da_despesa VARCHAR(225),
    valor_da_despesa DECIMAL(10, 2) DEFAULT NULL,
    nome_da_despesa VARCHAR(225)
);

CREATE TABLE
reset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

ALTER TABLE users MODIFY COLUMN telefone VARCHAR(17);

DELETE FROM users;

select * from users;

select * from endereco;

drop TABLE endereco;