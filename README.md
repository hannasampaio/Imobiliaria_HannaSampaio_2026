<p align="center">
  <img src="public/images/logo.png" width="230">
</p>

<h1 align="center">🏢 Hanna Imobiliária</h1>

<p align="center">
Sistema de Gestão Imobiliária desenvolvido em <strong>Laravel 12</strong>, permitindo gerir clientes, apartamentos e vendas através de uma interface moderna, intuitiva e responsiva.
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel">
<img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php">
<img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql">
<img src="https://img.shields.io/badge/Bootstrap-5-purple?style=for-the-badge&logo=bootstrap">
<img src="https://img.shields.io/badge/Responsive-✔-green?style=for-the-badge">
</p>

---

## 📑 Índice

- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Perfis de Utilizador](#-perfis-de-utilizador)
- [Requisitos](#-requisitos)
- [Instalação](#-instalação)
- [Contas de Demonstração](#-contas-de-demonstração)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Relatórios](#-relatórios)
- [Fotografias](#-fotografias)
- [Contexto Académico](#-contexto-académico)
- [Licença](#-licença)
- [Autora](#-autora)

---

## ✨ Funcionalidades

**Autenticação**
- Login, registo e recuperação de palavra-passe

**Gestão de Clientes**
- Criar, editar, consultar e eliminar

**Gestão de Apartamentos**
- Upload de fotografias, pesquisa, ordenação e paginação

**Gestão de Vendas**
- Associação Cliente ↔ Apartamento
- Impede a venda de um apartamento já vendido

**Dashboard**
- Total de clientes, apartamentos e vendas
- Faturação e estatísticas (Chart.js)

**Relatórios PDF**
- Clientes, apartamentos e vendas (DomPDF)

---

## 🛠 Tecnologias

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- Bootstrap 5
- JavaScript
- DomPDF
- Vite
- Git / GitHub

---

## 👥 Perfis de Utilizador

### Administrador
✔ Gestão completa (clientes, apartamentos, vendas, eliminação de dados)

### Vendedor
✔ Gestão de clientes
✔ Gestão de apartamentos
✔ Gestão de vendas
❌ Não pode eliminar dados

---

## 📋 Requisitos

Antes de instalar, garanta que tem:

- PHP >= 8.2
- Composer
- Node.js >= 18 e npm
- MySQL
- Extensão PHP `pdo_mysql` ativa

---

## 🚀 Instalação

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
```

Configure as credenciais da base de dados no ficheiro `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) antes de continuar.

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

---

## 🔐 Contas de Demonstração

> ⚠️ **Nota:** estas contas existem apenas para fins de demonstração e avaliação do projeto. Não devem ser usadas em ambiente de produção.

**Administrador**
- Email: `hannasampaio@imobiliariahanna.com`
- Password: `123456789`

**Vendedor**
- Email: `vendedor@imobiliariahanna.com`
- Password: `987654321`

---

## 📁 Estrutura do Projeto

```
app/
  Http/Controllers/   → Lógica de negócio (Clientes, Apartamentos, Vendas)
  Models/              → Modelos Eloquent
database/
  migrations/          → Esquema da base de dados
  seeders/             → Dados iniciais (apartamentos, clientes, vendas, utilizadores)
public/
  images/              → Logótipo e assets estáticos
resources/
  views/               → Templates Blade
  css/, js/            → CSS e JS modulares (layout, dashboard, autenticação)
routes/
  web.php              → Definição de rotas
storage/
  app/public/          → Fotografias dos apartamentos
```

---

## 📄 Relatórios

O sistema permite gerar relatórios em PDF de:

- Clientes
- Apartamentos
- Vendas

---

## 📷 Fotografias

As fotografias dos apartamentos encontram-se em:

```
storage/app/public/apartamentos
```

Após a instalação, execute sempre:

```bash
php artisan storage:link
```

---

## 🎓 Contexto Académico

Projeto desenvolvido no âmbito do curso de **Software Developer** da **CESAE Digital**.

---

## 📜 Licença

Projeto desenvolvido para fins académicos. Uso livre para estudo e referência.

---

## 👩‍💻 Autora

**Hanna Sampaio**
Software Developer
CESAE Digital - Portugal
2026
