# Vesti Teste

## Inicio do ambiente docker

```bash
# iniciar submodulo do laradock do projeto
$ git submodule update --init --recursive

# entrar dentro da pasta do submodule
$ cd laradock

# criar o .env local copiando do .env.example do projeto
$ cp env-example .env

# se for usuário linux ou tiver instalado um servidor web e/ou mysql na sua máquina, alterar as seguintes portas
NGINX_HOST_HTTP_PORT=80 --> NGINX_HOST_HTTP_PORT=8000 por exemplo
POSTGRES_PORT=5432 --> POSTGRES_PORT=5433 por exemplo

# configurar os dados do banco
POSTGRES_DB=vesti
POSTGRES_USER=vesti
POSTGRES_PASSWORD=root

# subir os containers necessários para o ambiente de desenvolvimento, nginx e mysql
$ docker-compose up -d nginx postgres

# caso esteja em linux os comandos de docker-compose precisam estar em super usuário. Por exemplo:
$ sudo docker-compose up -d nginx postgres

# entrar dentro do container de área de trabalho
$ docker-compose exec workspace bash
|
```

Para detalhes da documentação do Laradock  [Laradock docs](https://laradock.io/).

## Inicio da aplicação Laravel

```bash
# instalar as dependencias do projeto
$ composer install

# criar o .env 
$ cp .env.example .env

# iniciar a key da aplicação
$ artisan key:generate

# configurar os seguintes locais do .env
DB_HOST=127.0.0.1 --> DB_HOST=postgres
DB_DATABASE=laravel --> DB_DATABASE=vesti
DB_USERNAME= --> DB_USERNAME=vesti
DB_PASSWORD= --> DB_PASSWORD=root

para acessar a integração de produtos basta acessar a url: 'http://sua_url_porta/products'.

Para detalhes da documentação do Laravel [Laravel docs](https://laravel.com).
