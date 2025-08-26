# 🚀 CRUD em Laravel com Autenticação

Este repositório contém um sistema completo de CRUD em Laravel com autenticação de usuários.
O objetivo principal é servir como material de estudo e prática no framework, mas também pode ser adaptado facilmente para projetos reais.

---

# 📌 Funcionalidades
• Registro de novos usuários (acesso público)  
• Login e Logout com sessão  
• Recuperação de senha por e-mail  
• Painel com listagem de usuários  
• Edição de informações do perfil  
• Remoção de contas  
• Rotas seguras utilizando middleware auth  

---

## 🛠️ Tecnologias Utilizadas

- Laravel 10
-  PHP 8+
-  MySQL
-  Bootstrap 5 para o front-end

---

## ⚙️ Como Rodar o Projeto

1. Clone o repositório: git clone () cd nome-do-repo
2. Instale as dependências: composer install npm install && npm run dev
3. Configure o arquivo .env: cp .env.example .env

Ajuste as variáveis de banco de dados conforme sua configuração local:

   DB_CONNECTION=mysql  
   DB_HOST=127.0.0.1  
   DB_PORT=3306  
   DB_DATABASE=crud_laravel  
   DB_USERNAME=root  
   DB_PASSWORD=  


4. Gere a chave da aplicação: php artisan key:generate
   
6. Rode as migrations: php artisan migrate
   
8. Inicie o servidor: php artisan serve
   
10. Acesse em: http://127.0.0.1:8000

---

## 👨‍💻 Estrutura de Telas

- **Página inicial**: login e botão para cadastro
- **Cadastro de usuário**: formulário em 2 colunas com 3 linhas
- **Área autenticada**: CRUD de usuários (listar, editar e excluir)
