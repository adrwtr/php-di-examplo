# php-di-exemplo
Exemplo e aplicação simples em PHP com Dependence Injection para testes

# start docker service

```php
docker build -t php-di-exemplo .
docker run -it --rm -v "$PWD":/usr/src/app -p 8081:8081 --name php-di-exemplo php-di-exemplo
```

# Passo a passo

1 - Criação do projeto no gitlab

2 - Baixar o projeto na maquina

git clone https://github.com/adrwtr/php-di-exemplo.git

3 - Instalando composer no projeto para baixar pacotes de terceiros

```php
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

4 - adicionando no gitignore o composer

5 - Instalar o SLIM Framework

```php
php composer.phar require slim/slim:"4.*"
php composer.phar require slim/psr7
php composer.phar require php-di/php-di --with-all-dependencies
```

6 - Criar o arquivo public/index.php

```php
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
```

testando a aplicação base

php -S localhost:8080 -t public public/index.php



-----

7 - Criando uma rota que retorna um json

no index.php

```php
$app->get('/usuarios', function (Request $request, Response $response, $args) {
    $data = array(
        array(
            'id' => 1,
            'nome' => "Adriano"
        ),

        array(
            'id' => 2,
            'nome' => "Matheus"
        )
    );
    $payload = json_encode($data);

    $response->getBody()->write($payload);

    return $response
        ->withHeader(
            'Content-Type',
            'application/json'
        );
});
```

-----

8 - Agora vamos adicionar classes

Adicionar no composer json

```php
"autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
```

php composer.phar dump-autoload

Criar as classes

```php
src/Action/Action.php
src/Action/ActionPayload.php
src/Action/Usuario/UsuarioListarAction.php
```

alterar o index

Ver commit - 87f8e8b - Usando uma classe de Action - MVC

-----

9 - Criando a camada de dominio


```php
src\Domain\Model\Usuario.php
src\Domain\Repository\IUsuarioRepository.php
src\Domain\Repository\UsuarioRepository.php
```

ver commit - 6f9fc17 - "Adicionado a camada de dominio

-----

10 - Ligando a camada de dominio ao controller


```php
src\Domain\Model\Usuario.php
src\Service\UsuarioService.php
src\Action\Usuario\UsuarioListarAction.php
```
ver commit - 1a7bf9a - 1a7bf9a9ab3995ca54a039f1e438ddd3ec8f4ee6

-----

11 - Implementando o DI

```php
public\di.php
public\index.php
src\Action\Usuario\UsuarioListarAction.php
src\Service\UsuarioService.php
```

ver commit - tag vEXEMPLO-1

-----

12 - Alterando para memory e criand outras ações
