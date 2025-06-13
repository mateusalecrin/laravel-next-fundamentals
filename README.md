### Se esta é sua **primeira vez executando o projeto**, siga os passos abaixo para configurar o ambiente corretamente.

<br>

>  A API do projeto, uma plataforma de cursos/aprendizado, está localizada na pasta `/laravel`.
> 

<br>

### Etapas de Inicialização

<br>

```bash
cd laravel
```

<sub>Acesse o diretório da API Laravel</sub>

<br>
<br>

```bash
docker compose up -d
```

<sub>Suba os containers com Docker</sub>

<br>
<br>

```bash
docker exec app composer install
```

<sub>Istale as dependências PHP com o Composer dentro do container</sub>

<br>
<br>

```bash
docker exec app php artisan migrate
```

<sub>Execute as migrations</sub>

<br>
<br>

```bash
docker exec -i app php artisan tinker --execute="\App\Models\User::factory()->count(20)->create();"
```

<sub>Gere 20 usuários de teste com Tinker</sub>

<br>
<br>
