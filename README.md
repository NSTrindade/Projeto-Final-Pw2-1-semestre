
# 🛒 Projeto E-commerce Simples (CRUD com PHP e MySQL)

Este projeto é um e-commerce simples com as funcionalidades básicas de CRUD (Criar, Ler, Atualizar e Deletar), feito para o Projeto Final de PW II.

## 📌 Objetivo

Criar uma aplicação web que permita gerenciar produtos de uma loja online (ex: camisetas, livros, etc.), utilizando as tecnologias:
- **Frontend**: HTML + CSS (com Bootstrap) + JS
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


---


# 📁 Pasta `/views` - Interface do Usuário

A pasta `/views` armazena **todas as telas visíveis pelo usuário**, ou seja, a **interface do sistema** de e-commerce. Aqui é onde ficam as páginas HTML/PHP responsáveis por mostrar conteúdos, formulários e resultados ao usuário.

Abaixo estão os tipos de arquivos que podem existir dentro dessa pasta, organizados por função:

---

## 🔹 Telas de Navegação Geral

| Arquivo               | Função                                                             |
|-----------------------|---------------------------------------------------------------------|
| `inicio.php`          | Tela inicial do site, com destaques, banners, etc.                 |
| `sobre.php`           | Página "Sobre nós"                                                 |
| `contato.php`         | Formulário de contato                                              |
| `termos.php`          | Termos de uso e políticas de privacidade                          |

---

## 🔹 Telas de Autenticação

| Arquivo               | Função                                                             |
|-----------------------|---------------------------------------------------------------------|
| `login.php`           | Tela de login de usuário                                           |
| `cadastro_usuario.php`| Tela para novo usuário se cadastrar                                |
| `logout.php`          | Arquivo que finaliza a sessão/logoff                               |

---

## 🔹 Telas de Produtos (Core do e-commerce)

| Arquivo               | Função                                                             |
|-----------------------|---------------------------------------------------------------------|
| `home.php`            | Listagem dos produtos à venda (página principal)                   |
| `produto.php`         | Página detalhada de um único produto (`produto.php?id=1`)         |
| `cadastrar_roupa.php` | Tela do formulário para cadastrar nova roupa (produto)             |
| `edit.php`            | Tela para editar informações de um produto                        |
| `meus_produtos.php`   | Lista de produtos cadastrados pelo usuário                         |

---

## 🔹 Telas de Carrinho e Compra

| Arquivo               | Função                                                             |
|-----------------------|---------------------------------------------------------------------|
| `carrinho.php`        | Exibe os itens adicionados ao carrinho de compras                  |
| `finalizar_compra.php`| Formulário de checkout e dados de envio/pagamento                  |
| `pedidos.php`         | Lista de pedidos realizados pelo usuário                           |
| `detalhe_pedido.php`  | Detalhes de um pedido específico                                   |

---

## 🔹 Telas de Administração (opcional)

| Arquivo               | Função                                                             |
|-----------------------|---------------------------------------------------------------------|
| `dashboard.php`       | Painel administrativo com estatísticas                             |
| `usuarios.php`        | Gerenciar usuários cadastrados                                     |
| `relatorios.php`      | Relatórios de vendas e acessos                                     |

---

## 📁 Sugestão de Organização com Subpastas

Se o projeto ficar grande, você pode organizar melhor com subpastas dentro de `/views`:

```
/views
  /auth
    login.php
    cadastro_usuario.php
  /produtos
    home.php
    cadastrar.php
    edit.php
    produto.php
  /admin
    dashboard.php
    relatorios.php
  /site
    inicio.php
    sobre.php
    contato.php
```

Essa organização ajuda na escalabilidade e manutenção do projeto.

---

Feito para auxiliar na organização da interface de um projeto de e-commerce em PHP.

