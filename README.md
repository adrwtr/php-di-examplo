# php-di-exemplo
Exemplo e aplicação simples em PHP com Dependence Injection para testes

# Passo a passo

1 - Criação do projeto no gitlab

2 - Baixar o projeto na maquina

git clone https://github.com/adrwtr/php-di-exemplo.git

3 - Instalando composer no projeto para baixar pacotes de terceiros

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

4 - adicionando no gitignore o composer

5 - Instalar o SLIM Framework

php composer.phar require slim/slim:"4.*"
php composer.phar require slim/psr7

6 - Criar o arquivo public/index.php

<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();


testando a aplicação base

php -S localhost:8080 -t public public/index.php

6 - 