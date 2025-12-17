# Product API

API de gerenciamento de produtos para e-commerce, construída com
**Laravel 12**, **Domain-Driven Design (DDD)**, **BDD com Pest** e
**Docker**.

------------------------------------------------------------------------

## 📌 Visão Geral

Esta API permite: - Criar produtos - Reduzir o estoque de um produto -
Garantir regras de negócio no domínio (preço positivo, estoque não
negativo)

Projeto pensado para ser fácil de instalar, mesmo para quem não domina
Docker ou Laravel.

------------------------------------------------------------------------

## 🧱 Tecnologias Utilizadas

-   PHP 8.3
-   Laravel 12 (API only)
-   PostgreSQL 16
-   Pest (BDD)
-   Docker e Docker Compose

------------------------------------------------------------------------

## 📁 Estrutura do Projeto

    app/
     ├── Domain/            # Regras de negócio (DDD puro)
     ├── Application/       # Casos de uso / serviços
     ├── Infrastructure/   # Persistência e Docker
     ├── Http/              # Controllers e Requests

    tests/
     └── Feature/           # Testes BDD com Pest

------------------------------------------------------------------------

## 🚀 Requisitos

Antes de começar, tenha instalado:

-   Docker Desktop
-   Docker Compose

❗ Não é necessário instalar PHP, Composer ou PostgreSQL localmente.

------------------------------------------------------------------------

## ⚙️ Instalação

### 1️⃣ Clonar o repositório

    git clone https://github.com/Nzongo-Pedro/product-api
    cd product-api

### 2️⃣ Configurar ambiente

    cp .env.example .env

Variáveis principais:

    DB_CONNECTION=pgsql
    DB_HOST=postgres
    DB_PORT=5432
    DB_DATABASE=products
    DB_USERNAME=products
    DB_PASSWORD=products

### 3️⃣ Subir containers

    docker compose up --build

API disponível em: http://localhost:8000

### 4️⃣ Rodar migrations

    docker compose exec app php artisan migrate

------------------------------------------------------------------------

## 🧪 Testes (BDD)

    docker compose exec app php artisan test

Ou:

    docker compose exec app ./vendor/bin/pest

------------------------------------------------------------------------

## 🔌 Endpoints

### Criar produto

**POST** `/api/v1/products`

    {
      "name": "Teclado Mecânico",
      "description": "Switch azul",
      "price": 150.50,
      "stock_quantity": 10
    }

### Reduzir estoque

**PATCH** `/api/v1/products/{id}/decrease-stock`

    {
      "quantity": 3
    }

------------------------------------------------------------------------

## 🧠 Regras de Negócio

-   Preço deve ser maior que zero
-   Estoque nunca pode ser negativo
-   Estoque insuficiente gera erro de domínio

------------------------------------------------------------------------

## 🐳 Docker

Para parar os containers:

    docker compose down

Para remover volumes:

    docker compose down -v

------------------------------------------------------------------------

## 📚 Objetivo

Demonstrar DDD em Laravel -
Servir como base de API real - Preparação para testes técnicos


------------------------------------------------------------------------

## 📝 Licença

Uso livre para estudo e aprendizado.
