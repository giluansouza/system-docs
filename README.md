# 📌 Sistema de Gestão de Documentos Sensíveis

## 🛠️ Sobre o Projeto

Este é um sistema de **gestão de documentos sensíveis** desenvolvido com **Laravel** e **React**, estruturado para permitir **armazenamento, indexação e busca de documentos**. Ele é composto por um **monólito Laravel** para administração e uma **API protegida com Sanctum**, consumida pelo frontend React.

- **API**: Desenvolvida com Laravel, protegida por **Laravel Sanctum**, e consumida pelo frontend React.
- **Painel Administrativo**: Implementado com Laravel Breeze (Blade), fornecendo login, registro e dashboard integrado.
- **Banco de Dados**: PostgreSQL.
- **Busca e Indexação**: Elasticsearch para armazenar e buscar documentos.
- **Containerização**: Utiliza Docker e Laravel Sail.
- **Cache e fila**: Redis.

---

## 🚀 Tecnologias Utilizadas
- **Laravel** (Backend API e Painel Administrativo)
- **Laravel Sanctum** (Autenticação da API via tokens)
- **Laravel Breeze** (Autenticação do painel administrativo com Blade)
- **PostgreSQL** (Banco de dados)
- **Elasticsearch** (Indexação e busca de documentos)
- **Redis** (Cache e filas)
- **Docker + Laravel Sail** (Ambiente de desenvolvimento)
- **React** (Frontend separado, não incluído neste repositório)

---

## 🔧 Como Instalar e Configurar o Projeto

### 1️⃣ **Clonar o Repositório**
```bash
# Clonar o projeto
git clone https://github.com/seu-usuario/seu-projeto.git
cd seu-projeto
```

### 2️⃣ **Subir os Containers com Docker**
```bash
# Criar e iniciar os containers
sail up -d
```

### 3️⃣ **Instalar as Dependências do Laravel**
```bash
sail composer install
```

### 4️⃣ **Configurar o Arquivo `.env`**
Copie o exemplo e configure as variáveis:
```bash
cp .env.example .env
```
Edite o `.env` com as configurações:
```ini
APP_NAME="Meu Projeto"
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

ELASTICSEARCH_HOST=elasticsearch
ELASTICSEARCH_PORT=9200
REDIS_HOST=redis
```

### 5️⃣ **Gerar a Chave da Aplicação**
```bash
sail artisan key:generate
```

### 6️⃣ **Rodar as Migrações**
```bash
sail artisan migrate
```

### 7️⃣ **Instalar Laravel Breeze para Painel Administrativo**
```bash
sail composer require laravel/breeze --dev
sail artisan breeze:install blade
sail npm install && sail npm run dev
```

### 8️⃣ **Instalar Laravel Sanctum para a API**
```bash
sail composer require laravel/sanctum
sail artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
sail artisan migrate
```
No arquivo `app/Http/Kernel.php`, adicione **Sanctum** no middleware da API:
```php
protected $middlewareGroups = [
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
```
No `app/Models/User.php`, adicione o trait `HasApiTokens`:
```php
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
}
```

### 9️⃣ **Reiniciar o Servidor**
```bash
sail down
sail up -d
```

---

## 🔑 **Autenticação na API (Sanctum)**

### **1. Login e Obtenção de Token**
```bash
curl -X POST "http://localhost/api/login" \
     -H "Content-Type: application/json" \
     -H "Accept: application/json" \
     -d '{
        "email": "admin@example.com",
        "password": "senha"
     }'
```

**Resposta esperada:**
```json
{
    "token": "1|W0a2fbNq1Mlz8k5Km4V8LZKHy9KrMHmQAf2oc"
}
```

### **2. Requisição Autenticada**
```bash
curl -X GET "http://localhost/api/user" \
     -H "Authorization: Bearer 1|W0a2fbNq1Mlz8k5Km4V8LZKHy9KrMHmQAf2oc" \
     -H "Accept: application/json"
```

### **3. Logout**
```bash
curl -X POST "http://localhost/api/logout" \
     -H "Authorization: Bearer 1|W0a2fbNq1Mlz8k5Km4V8LZKHy9KrMHmQAf2oc" \
     -H "Accept: application/json"
```

---

## 📄 **Rotas Disponíveis**

### **Rotas da API** (`routes/api.php`)
| Método | Rota                 | Descrição              |
|---------|----------------------|--------------------------|
| POST    | `/api/login`         | Autenticação e gera token |
| GET     | `/api/user`          | Retorna dados do usuário |
| POST    | `/api/logout`        | Revoga o token do usuário |
| POST    | `/api/documents`     | Insere um documento |
| GET     | `/api/documents/search?query=xxx` | Busca no Elasticsearch |

### **Rotas do Painel Admin** (`routes/web.php`)
| Método | Rota        | Descrição          |
|---------|------------|----------------|
| GET     | `/login`   | Tela de login  |
| GET     | `/register`| Cadastro de usuários |
| GET     | `/dashboard` | Painel do Admin |

---

## 📌 **Conclusão**
Este projeto fornece uma arquitetura completa para um sistema com **API Laravel protegida por Sanctum** e um **painel administrativo embutido**. O frontend React se comunicará com a API usando **tokens Bearer**, garantindo separação clara entre as partes.

Agora, você pode continuar desenvolvendo o frontend em React e expandir a aplicação! 🚀

