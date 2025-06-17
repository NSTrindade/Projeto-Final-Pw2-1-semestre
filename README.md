
# 🛒 Projeto E-commerce Simples (CRUD com PHP e MySQL)

Este projeto é um e-commerce simples com as funcionalidades básicas de CRUD (Criar, Ler, Atualizar e Deletar), feito para o Projeto Final de PW II.

## 📌 Objetivo

Criar uma aplicação web que permita gerenciar produtos de uma loja online (ex: camisetas, livros, etc.), utilizando as tecnologias:
- **Frontend**: HTML + CSS (com Bootstrap)
- **Backend**: PHP
- **Banco de dados**: MySQL

---

## 🗂️ Estrutura de Pastas

```
/ecommerce
  /assets
    /css
    /js
  /includes
    db_connection.php
  /views
    home.php
    edit.php
    create.php
  /controllers
    create.php
    update.php
    delete.php
  /models
    Product.php (opcional)
```

---

## 🧱 Banco de Dados

### Criação do Banco:
```sql
CREATE DATABASE ecommerce;
USE ecommerce;
```

### Tabela `produtos`:
```sql
CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  imagem VARCHAR(255)
);
```

---

## 🔌 Conexão com o Banco

Arquivo: `includes/db_connection.php`

```php
<?php
$host = 'localhost';
$db   = 'ecommerce';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
```

---

## 🔧 Funcionalidades

- ✅ **Cadastro de Produto** (`controllers/create.php`)
- 📋 **Listagem de Produtos** (`views/home.php`)
- ✏️ **Edição de Produto** (`views/edit.php` + `controllers/update.php`)
- ❌ **Exclusão de Produto** (`controllers/delete.php`)

---

## 🎨 Design Responsivo

- Utilização de [Bootstrap](https://getbootstrap.com/) para responsividade e estilo visual.
- Interface simples e moderna, adaptável para celulares, tablets e desktops.

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
```

---

## 🔐 Segurança

- Validação de dados no servidor (PHP)
- Prevenção de SQL Injection com prepared statements
- Estrutura organizada para facilitar futuras implementações de autenticação

---

## ✅ Checklist de Entrega

- [x] Operações CRUD funcionais
- [x] Conexão com banco de dados
- [x] Design moderno e responsivo
- [x] Estrutura organizada de pastas
- [x] Código limpo e comentado

---

## 🚀 Como Começar

1. Suba o banco de dados no MySQL
2. Ajuste os dados de conexão em `db_connection.php`
3. Acesse o projeto via navegador local (ex: `http://localhost/ecommerce/views/home.php`)
4. Comece a cadastrar e gerenciar produtos!

---

Feito com 💻 para o Projeto Final de PW II.
