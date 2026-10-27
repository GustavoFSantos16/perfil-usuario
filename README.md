# 🔐 Sistema de Autenticação e Preferências de Usuário em PHP

Este projeto é uma aplicação web simples desenvolvida em **PHP**, **HTML5** e **CSS3** com integração a banco de dados **MySQL**. O sistema permite que o usuário faça login, escolha uma cor de tema para sua interface, acesse uma área restrita e encerre a sessão com segurança.

---

## 🚀 Funcionalidades

- **Autenticação de Usuário:** Validação de credenciais no banco de dados MySQL (`exercicio`).
- **Gerenciamento de Sessão:** Controle de acesso a páginas restritas através de `session_start()`.
- **Persistência de Preferências:** Permite ao usuário escolher a cor de fundo desejada durante o login, mantendo a preferência visível na página de perfil.
- **Área Restrita:** Proteção da página de perfil (`15d_perfil.php`), impedindo o acesso de usuários não autenticados.
- **Logout Seguro:** Encerramento completo de sessão (`session_destroy()`) com redirecionamento para a tela de login.
- **Interface Moderna:** Layout responsivo e estilizado com técnicas de *Glassmorphism* e CSS flexbox.

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8.x** (Lógica de servidor, sessões e conexão MySQLi)
- **HTML5** (Estruturação semântica)
- **CSS3** (Estilização moderna e layout responsivo)
- **MySQL** (Banco de dados relacional)

---

## 📂 Estrutura do Projeto

```text
.
├── 15d_login.php      # Tela de login e processamento de credenciais/preferências
├── 15d_perfil.php     # Página restrita acessível apenas por usuários logados
├── 15d_logout.php     # Script de encerramento de sessão
├── style.css          # Folha de estilos CSS global
└── README.md          # Documentação do projeto
```

---

## 🗄️ Configuração do Banco de Dados

Crie o banco de dados e a tabela necessária executando o seguinte script SQL no seu gerenciador (ex: phpMyAdmin ou MySQL Workbench):

```sql
CREATE DATABASE IF NOT EXISTS exercicio;
USE exercicio;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Inserir usuário de teste
INSERT INTO usuarios (usuario, senha) VALUES ('admin', 'Senai@118');
```

---

## 🔧 Como Executar o Projeto

1. Certifique-se de ter um servidor local instalado (como **XAMPP**, **WAMP** ou **LAMP**).
2. Clone ou copie os arquivos do projeto para o diretório raiz do seu servidor local:
   - Exemplo (XAMPP): `C:/xampp/htdocs/seu-projeto/`
3. Inicie os serviços do **Apache** e **MySQL** no seu painel de controle.
4. Abra o navegador e acesse:
   ```text
   http://localhost/seu-projeto/15d_login.php
   ```

---

## 🔒 Boas Práticas e Segurança Aplicadas

- **Validação de Sessão:** Redirecionamento automático caso um usuário tente acessar o perfil diretamente via URL sem estar autenticado.
- **Prevenção contra XSS:** Tratamento de dados exibidos no HTML através de `htmlspecialchars()`.
- **Prevenção de Erros de Cabeçalho:** Chamadas de `session_start()` e `header()` posicionadas no topo dos arquivos PHP antes de qualquer saída de código HTML.