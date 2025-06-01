# 🛠️ Instruções para Rodar o Projeto pela Primeira Vez

Se esta é sua **primeira vez rodando o projeto**, siga os passos abaixo para configurar o ambiente corretamente.

> **ℹ️ Observação:** A API do projeto, uma plataforma de cursos/aprendizado, está localizada na pasta `/laravel`.

---

## ✅ Etapas de Inicialização

Abra o terminal e, na raiz do projeto, execute os comandos abaixo:

### 1. Acesse o diretório da API Laravel

```bash
cd laravel
```

### 2. Suba os containers com Docker

```bash
docker compose up -d
```

### 3. Istale as dependências PHP com o Composer (dentro do container)

```bash
docker exec app composer install
```

### 4. Execute as migrations

```bash
docker exec app php artisan migrate
```

### 5. Gere 20 usuários de teste com Tinker

```bash
docker exec -i app php artisan tinker --execute="\App\Models\User::factory()->count(20)->create();"
```