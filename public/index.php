<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use DI\ContainerBuilder;
use Slim\Factory\ServerRequestCreatorFactory;

use App\Action\Usuario\UsuarioListarAction;
use App\Action\Usuario\UsuarioProcurarAction;
use App\Action\Usuario\UsuarioIncluirAction;
use App\Action\Usuario\UsuarioAlterarAction;
use App\Action\Usuario\UsuarioExcluirAction;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Set up DI
$fndi = require __DIR__ . '/di.php';
$fndi($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->group('/usuarios', function (Group $group) {
    $group->get('/procurar/{id}', UsuarioProcurarAction::class);
    $group->get('/listar', UsuarioListarAction::class);
    $group->post('/incluir', UsuarioIncluirAction::class);
    $group->put('/alterar/{id}', UsuarioAlterarAction::class);
    $group->delete('/excluir/{id}', UsuarioExcluirAction::class);
});

$app->run();