# API de Tarefas

API REST desenvolvida com **Laravel** e **PostgreSQL** para gerenciamento de tarefas.

O projeto foi desenvolvido como exercício prático para aprender a criar uma API REST utilizando Laravel, trabalhando com rotas, controllers, models, migrations, validação de dados, banco de dados PostgreSQL e testes das requisições utilizando o Postman.

---

## Tecnologias utilizadas

- PHP
- Laravel
- PostgreSQL
- Eloquent ORM
- API REST
- Postman
- cURL

---

## Funcionalidades

A API permite realizar as seguintes operações:

- Listar todas as tarefas
- Criar uma nova tarefa
- Consultar uma tarefa específica
- Atualizar uma tarefa
- Atualizar parcialmente uma tarefa
- Excluir uma tarefa

---

## Estrutura da tarefa

Cada tarefa possui os seguintes campos:

| Campo | Tipo | Descrição |
|---|---|---|
| `id_tarefa` | integer | Identificador único da tarefa |
| `titulo` | string | Título da tarefa |
| `concluida` | boolean | Indica se a tarefa foi concluída |

O campo `id_tarefa` é gerado automaticamente pelo banco de dados.

---

# Como baixar o projeto

Clone o repositório utilizando Git:

```bash
git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
```

Entre na pasta do projeto:

```bash
cd nome-do-projeto
```

---

# Instalação das dependências

O projeto utiliza o Composer para gerenciar as dependências do PHP.

Execute:

```bash
composer install
```

Depois, crie o arquivo `.env` a partir do arquivo de exemplo:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

---

# Configuração do banco de dados

O projeto utiliza **PostgreSQL**.

Primeiro, crie um banco de dados no PostgreSQL. Por exemplo:

```text
toDo
```

Depois, abra o arquivo `.env` e configure a conexão:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=toDo
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

Altere os valores de acordo com a configuração do seu ambiente.

> **Importante:** não envie o arquivo `.env` para o GitHub. Ele deve permanecer no `.gitignore`, principalmente porque pode conter senhas e outras informações de configuração.

---

# Executando as migrations

Depois de configurar o banco de dados, execute as migrations:

```bash
php artisan migrate
```

As migrations irão criar as tabelas necessárias no banco de dados.

---

# Executando o projeto

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

Por padrão, o projeto ficará disponível em:

```text
http://127.0.0.1:8000
```

A API utiliza o prefixo `/api`.

Portanto, a URL base da API é:

```text
http://127.0.0.1:8000/api
```

---

# Rotas da API

As rotas foram criadas utilizando `apiResource`:

```php
Route::apiResource('tarefas', TarefaController::class);
```

Essa configuração cria automaticamente as rotas necessárias para realizar as operações CRUD.

## Resumo das rotas

| Método | URL | Ação |
|---|---|---|
| GET | `/api/tarefas` | Listar todas as tarefas |
| POST | `/api/tarefas` | Criar uma tarefa |
| GET | `/api/tarefas/{id}` | Consultar uma tarefa |
| PUT | `/api/tarefas/{id}` | Atualizar uma tarefa |
| PATCH | `/api/tarefas/{id}` | Atualizar parcialmente |
| DELETE | `/api/tarefas/{id}` | Excluir uma tarefa |

---

# Testando a API

As requisições podem ser testadas utilizando **Postman**, **Insomnia** ou **cURL**.

Os exemplos abaixo utilizam cURL e Postman.

---

## 1. Listar todas as tarefas

### Método

```text
GET
```

### URL

```text
http://127.0.0.1:8000/api/tarefas
```

### cURL

```bash
curl http://127.0.0.1:8000/api/tarefas
```

### Postman

Configure:

```text
Method: GET
URL: http://127.0.0.1:8000/api/tarefas
```

Depois clique em:

```text
Send
```

### Exemplo de resposta

```json
[
    {
        "id_tarefa": 1,
        "titulo": "Estudar Laravel",
        "concluida": false
    },
    {
        "id_tarefa": 2,
        "titulo": "Estudar Postman",
        "concluida": true
    }
]
```

---

# 2. Criar uma tarefa

### Método

```text
POST
```

### URL

```text
http://127.0.0.1:8000/api/tarefas
```

### cURL

```bash
curl -X POST http://127.0.0.1:8000/api/tarefas \
-H "Content-Type: application/json" \
-d '{"titulo":"Estudar Laravel"}'
```

### Postman

Configure:

```text
Method: POST
URL: http://127.0.0.1:8000/api/tarefas
```

Depois:

```text
Body → raw → JSON
```

Envie:

```json
{
    "titulo": "Estudar Laravel"
}
```

O campo `concluida` não precisa ser enviado, pois o controller define seu valor inicial como `false`.

### Exemplo de resposta

```json
{
    "id_tarefa": 1,
    "titulo": "Estudar Laravel",
    "concluida": false
}
```

O status HTTP esperado é:

```text
201 Created
```

---

# 3. Consultar uma tarefa específica

### Método

```text
GET
```

### URL

Substitua `{id}` pelo ID da tarefa.

Exemplo:

```text
http://127.0.0.1:8000/api/tarefas/1
```

### cURL

```bash
curl http://127.0.0.1:8000/api/tarefas/1
```

### Postman

Configure:

```text
Method: GET
URL: http://127.0.0.1:8000/api/tarefas/1
```

Clique em:

```text
Send
```

### Exemplo de resposta

```json
{
    "id_tarefa": 1,
    "titulo": "Estudar Laravel",
    "concluida": false
}
```

---

# 4. Atualizar uma tarefa

O método `PUT` pode ser utilizado para atualizar os dados da tarefa.

### Método

```text
PUT
```

### URL

```text
http://127.0.0.1:8000/api/tarefas/1
```

### cURL

```bash
curl -X PUT http://127.0.0.1:8000/api/tarefas/1 \
-H "Content-Type: application/json" \
-d '{"titulo":"Estudar Laravel e APIs","concluida":true}'
```

### Postman

Configure:

```text
Method: PUT
URL: http://127.0.0.1:8000/api/tarefas/1
```

Depois:

```text
Body → raw → JSON
```

Envie:

```json
{
    "titulo": "Estudar Laravel e APIs",
    "concluida": true
}
```

### Exemplo de resposta

```json
{
    "id_tarefa": 1,
    "titulo": "Estudar Laravel e APIs",
    "concluida": true
}
```

---

# 5. Atualizar parcialmente uma tarefa

Também é possível utilizar o método `PATCH` para alterar somente um dos campos.

### Método

```text
PATCH
```

### URL

```text
http://127.0.0.1:8000/api/tarefas/1
```

### cURL

Por exemplo, para marcar uma tarefa como concluída:

```bash
curl -X PATCH http://127.0.0.1:8000/api/tarefas/1 \
-H "Content-Type: application/json" \
-d '{"concluida":true}'
```

### Postman

Configure:

```text
Method: PATCH
URL: http://127.0.0.1:8000/api/tarefas/1
```

Em:

```text
Body → raw → JSON
```

Envie:

```json
{
    "concluida": true
}
```

Como a validação utiliza `sometimes`, não é necessário enviar o `titulo` quando o objetivo é alterar somente `concluida`.

---

# 6. Excluir uma tarefa

### Método

```text
DELETE
```

### URL

```text
http://127.0.0.1:8000/api/tarefas/1
```

### cURL

```bash
curl -X DELETE http://127.0.0.1:8000/api/tarefas/1
```

### Postman

Configure:

```text
Method: DELETE
URL: http://127.0.0.1:8000/api/tarefas/1
```

Não é necessário enviar Body.

Clique em:

```text
Send
```

A API retorna:

```text
204 No Content
```

---

# Validação

A criação de tarefas exige que o campo `titulo` seja enviado.

A validação utilizada no controller é:

```php
$dados = $request->validate([
    'titulo' => 'required|string|max:255',
]);
```

Portanto, o seguinte JSON é válido:

```json
{
    "titulo": "Estudar APIs"
}
```

Enquanto este JSON apresenta erro de validação:

```json
{}
```

Também não é permitido que o título tenha mais de 255 caracteres.

Para atualização, são utilizadas as seguintes regras:

```php
$dados = $request->validate([
    'titulo' => 'sometimes|string|max:255',
    'concluida' => 'sometimes|boolean',
]);
```

Isso permite atualizar apenas os campos necessários.

---

# Estrutura básica do projeto

A estrutura relacionada à API é organizada da seguinte maneira:

```text
projeto/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── TarefaController.php
│   │
│   └── Models/
│       └── Tarefa.php
│
├── database/
│   └── migrations/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── .env
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

# Controller

O `TarefaController` é responsável por receber as requisições e executar as operações da API.

Entre as principais ações estão:

```text
index()    → listar tarefas
store()    → criar tarefa
show()     → consultar uma tarefa
update()   → atualizar tarefa
destroy()  → excluir tarefa
```

As rotas são definidas utilizando:

```php
Route::apiResource('tarefas', TarefaController::class);
```

---

# Model

O model `Tarefa` utiliza o Eloquent ORM:

```php
class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    protected $primaryKey = 'id_tarefa';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'concluida',
    ];
}
```

O projeto utiliza `id_tarefa` como chave primária e não utiliza os campos automáticos `created_at` e `updated_at`.

---

# Objetivo do projeto

O objetivo deste projeto é praticar o desenvolvimento de uma **API REST com Laravel**, utilizando um banco de dados PostgreSQL.

Durante o desenvolvimento foram praticados conceitos como:

- Criação de projetos Laravel
- Configuração do PostgreSQL
- Migrations
- Models
- Eloquent ORM
- Controllers
- API Resource Routes
- CRUD
- Métodos HTTP
- JSON
- Validação de dados
- Respostas HTTP
- Testes de API com Postman
- Testes utilizando cURL

---

# Autor

Desenvolvido por **Dayane Rodrigues** como projeto de estudo e prática de desenvolvimento backend com Laravel e PostgreSQL.
