# 🛒 UrbanStyle - E-commerce com Controle de Acesso

Este projeto é um e-commerce completo com sistema de autenticação e autorização baseado em papéis de usuário (Cliente e Administrador), desenvolvido para o Projeto Final de PW II.

## 🎯 Funcionalidades Implementadas

### ✅ **Sistema de Autenticação e Autorização**
- **Dois tipos de usuário**: Cliente e Administrador
- **Conta de Administrador padrão**:
  - Email: `admin@example.com`
  - Senha: `adm1234`
- **Controle de acesso baseado em papéis**
- **Sessões seguras** com verificação de autenticação

### ✅ **Funcionalidades do Administrador**
- **Acesso exclusivo ao Dashboard** (`/views/admin/dashboard.php`)
- **CRUD completo de produtos** (Criar, Ler, Atualizar, Deletar)
- **Estatísticas em tempo real** (produtos cadastrados, usuários registrados)
- **Navegação dinâmica** com link para Dashboard quando logado

### ✅ **Funcionalidades do Cliente**
- **Visualização de produtos** sem acesso às funções de gerenciamento
- **Sistema de carrinho de compras** (funcionalidade implementada)
- **Registro de conta** automático como Cliente

### ✅ **Melhorias na Interface**
- **CSS global aplicado** em todas as páginas
- **Mensagens de feedback** para todas as ações
- **Navegação responsiva** com Bootstrap 5
- **Controle de visibilidade** dos botões de gerenciamento

## 🗄️ **Estrutura do Banco de Dados**

### Tabelas Criadas:
```sql
-- Usuários com papel
CREATE TABLE Usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  senha VARCHAR(255) NOT NULL,
  papel ENUM('cliente', 'administrador') DEFAULT 'cliente',
  telefone VARCHAR(20) NULL,
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Produtos
CREATE TABLE Produto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  imagem VARCHAR(255)
);

-- Carrinho de compras
CREATE TABLE Carrinho (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  produto_id INT NOT NULL,
  quantidade INT NOT NULL DEFAULT 1,
  data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
  FOREIGN KEY (produto_id) REFERENCES Produto(id)
);

-- Pedidos
CREATE TABLE Pedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pendente', 'aprovado', 'enviado', 'entregue', 'cancelado') DEFAULT 'pendente',
  total DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);

-- Itens do pedido
CREATE TABLE ItemPedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pedido_id INT NOT NULL,
  produto_id INT NOT NULL,
  quantidade INT NOT NULL,
  preco_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES Pedido(id),
  FOREIGN KEY (produto_id) REFERENCES Produto(id)
);
```

## 🚀 **Como Configurar e Usar**

### 1. **Configuração do Banco de Dados**
```bash
# Execute o script SQL
mysql -u root -p < dados_banco.sql
```

### 2. **Configuração da Conexão**
Edite `includes/db_connection.php`:
```php
$host = 'localhost';
$db   = 'ecommerce';
$user = 'root';
$pass = '';
```

### 3. **Credenciais de Acesso**
- **Administrador**: admin@example.com / adm1234
- **Clientes**: Registre-se através do formulário público

## 📁 **Estrutura de Arquivos**

```
Projeto-Final-Pw2-1-semestre-main/
├── index.php                           # Ponto de entrada
├── dados_banco.sql                     # Script do banco atualizado
├── includes/
│   ├── db_connection.php              # Conexão com banco
│   └── auth_functions.php             # Funções de autenticação
├── controllers/
│   ├── login_usuario.php              # Login com controle de papel
│   ├── registrar_usuario.php          # Registro como cliente
│   ├── logout.php                     # Logout
│   ├── create.php                     # CRUD - Create (admin only)
│   ├── update.php                     # CRUD - Update (admin only)
│   ├── delete.php                     # CRUD - Delete (admin only)
│   └── adicionar_carrinho.php         # Carrinho de compras
├── views/
│   ├── admin/
│   │   ├── dashboard.php              # Dashboard admin (protegido)
│   │   └── relatorios.php             # Relatórios
│   ├── auth/
│   │   ├── login.php                  # Login com mensagens
│   │   └── cadastro_usuario.php       # Registro público
│   ├── produtos/
│   │   ├── home.php                   # Listagem de produtos
│   │   ├── produto.php                # Detalhes + carrinho
│   │   ├── cadastrar_produto.php      # Cadastro (admin only)
│   │   └── edit.php                   # Edição (admin only)
│   └── site/
│       ├── inicio.php                 # Página inicial
│       ├── sobre.php                  # Sobre
│       └── contato.php                # Contato
└── assets/
    ├── css/                           # Estilos CSS
    └── img/                           # Imagens
```

## 🔒 **Controle de Acesso Implementado**

### **Páginas Protegidas (Apenas Admin)**
- `/views/admin/dashboard.php`
- `/views/produtos/cadastrar_produto.php`
- `/views/produtos/edit.php`
- `/controllers/create.php`
- `/controllers/update.php`
- `/controllers/delete.php`

### **Páginas Públicas**
- `/views/produtos/home.php` (listagem de produtos)
- `/views/produtos/produto.php` (detalhes + carrinho)
- `/views/auth/login.php`
- `/views/auth/cadastro_usuario.php`

### **Funcionalidades por Papel**

| Funcionalidade | Cliente | Administrador |
|----------------|---------|---------------|
| Visualizar produtos | ✅ | ✅ |
| Adicionar ao carrinho | ✅ | ✅ |
| Acessar dashboard | ❌ | ✅ |
| CRUD de produtos | ❌ | ✅ |
| Ver estatísticas | ❌ | ✅ |

## 🎨 **Interface e UX**

### **Melhorias Implementadas**
- ✅ **Mensagens de feedback** para todas as ações
- ✅ **Navegação dinâmica** baseada no papel do usuário
- ✅ **CSS global** aplicado consistentemente
- ✅ **Responsividade** com Bootstrap 5
- ✅ **Controle de visibilidade** dos botões de gerenciamento

### **Fluxo de Navegação**
1. **Usuário não logado**: Acesso limitado à visualização
2. **Cliente logado**: Visualização + carrinho
3. **Admin logado**: Todas as funcionalidades + dashboard

## 🔧 **Funcionalidades Técnicas**

### **Segurança**
- ✅ **Prepared Statements** para prevenir SQL Injection
- ✅ **Validação de dados** no servidor
- ✅ **Controle de sessão** seguro
- ✅ **Verificação de papéis** em todas as páginas protegidas

### **Performance**
- ✅ **Queries otimizadas** com índices
- ✅ **Upload de imagens** com validação
- ✅ **Cache de sessão** para usuários logados



 