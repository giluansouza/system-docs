# 📌 Sistema de Gestão de Documentos

## 🛠️ Sobre o Projeto

Este é um sistema de **gestão de documentos sensíveis** desenvolvido com **Laravel** e **React**, estruturado para permitir **armazenamento, indexação e busca de documentos**. Ele é composto por um **monólito Laravel** para administração e uma **API protegida com Sanctum**, consumida pelo frontend React.

O sistema vai permitir busca avançada, criação de grafos e integração com IA para melhorar o fluxo de consulta e respostas.

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

=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> 267b53e (First commit)
