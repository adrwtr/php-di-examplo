<?php
declare(strict_types=1);

use App\Domain\Repository\UsuarioMemoryRepository;
use App\Service\UsuarioService;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        // lista de repositories
        UsuarioMemoryRepository::class => \DI\autowire(UsuarioMemoryRepository::class),

        // lista de services
        UsuarioService::class => \DI\autowire(UsuarioService::class),
    ]);
};
