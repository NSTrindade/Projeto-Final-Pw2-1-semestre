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
  papel ENUM('cliente', 'administrador') DEFAULT 'cliente',
  telefone VARCHAR(20) NULL,
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar usuário administrador padrão
-- Email: admin@example.com, Senha: adm1234
INSERT INTO Usuario (nome, email, senha, papel) VALUES 
('Administrador', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'administrador');

-- Criar tabela para carrinho de compras
CREATE TABLE Carrinho (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  produto_id INT NOT NULL,
  quantidade INT NOT NULL DEFAULT 1,
  data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
  FOREIGN KEY (produto_id) REFERENCES Produto(id) ON DELETE CASCADE
);

-- Criar tabela para pedidos
CREATE TABLE Pedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pendente', 'aprovado', 'enviado', 'entregue', 'cancelado') DEFAULT 'pendente',
  total DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE
);

-- Criar tabela para itens do pedido
CREATE TABLE ItemPedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pedido_id INT NOT NULL,
  produto_id INT NOT NULL,
  quantidade INT NOT NULL,
  preco_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES Pedido(id) ON DELETE CASCADE,
  FOREIGN KEY (produto_id) REFERENCES Produto(id) ON DELETE CASCADE
);

SELECT * FROM USUARIO;