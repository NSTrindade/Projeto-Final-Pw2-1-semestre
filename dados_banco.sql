CREATE DATABASE ecommerce;
USE ecommerce;

CREATE TABLE Produto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  imagem VARCHAR(255)
);

ALTER TABLE Usuario ADD COLUMN telefone VARCHAR(20) NULL;

CREATE TABLE Usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE, /* UNIQUE para não ter emails repetidos */
  senha VARCHAR(255) NOT NULL,       /* VARCHAR(255) para armazenar a senha criptografada (hash) */
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



SELECT * FROM USUARIO;