<?php
declare(strict_types=1);

use App\Domain\Repository\UsuarioMemoryRepository;
use App\Domain\Repository\UsuarioSQLiteRepository;

use App\Domain\Repository\IUsuarioRepository;

use App\Service\UsuarioService;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder, bool $sn_test) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        // lista de repositories

        // memory
        IUsuarioRepository::class => $sn_test
            ? \DI\autowire(UsuarioMemoryRepository::class)
            : \DI\autowire(UsuarioSQLiteRepository::class),

        // sqlite
        // IUsuarioRepository::class => \DI\autowire(UsuarioSQLiteRepository::class),

        // lista de services
        UsuarioService::class => \DI\autowire(UsuarioService::class),
    ]);
};
