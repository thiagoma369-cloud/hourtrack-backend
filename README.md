Backend responsável pelo sistema de autenticação e gerenciamento de dados do projeto HourTrack SaaS.

📌 Sobre

Esta API foi desenvolvida em Laravel 13 para fornecer autenticação de usuários e persistência de dados para o frontend feito em Vue.js.

Ela é responsável por:

Cadastro de usuários
Login de usuários
Logout
Geração de token com Laravel Sanctum
Autenticação de rotas privadas
CRUD de serviços
CRUD de despesas
Persistência em banco de dados
Tecnologias utilizadas
Laravel 13
PHP 8.4
Laravel Sanctum
SQLite
Docker
Render
Rotas principais
Autenticação

POST /api/register

Criação de conta

POST /api/login

Login de usuário

POST /api/logout

Logout
Serviços

GET /api/servicos

Listar serviços

POST /api/servicos

Criar serviço

DELETE /api/servicos/{id}

Remover serviço
Despesas

POST /api/despesas

Criar despesa

DELETE /api/despesas/{id}

Remover despesa
Autenticação

O sistema utiliza Laravel Sanctum para gerar tokens de autenticação.

Fluxo:

Usuário faz login
Backend gera token
Frontend salva token no localStorage
Rotas protegidas exigem token Bearer
Deploy

API hospedada no Render utilizando Docker.

O Docker foi configurado para:

Instalar dependências
Criar banco SQLite
Rodar migrations automaticamente
Configurar ambiente Laravel
Melhorias futuras
Recuperação de senha
Refresh token
Logs de atividade
Multiusuários empresariais
Banco PostgreSQL
Autor

Desenvolvido por Thiago Matheus

Backend criado para dar suporte ao HourTrack SaaS.