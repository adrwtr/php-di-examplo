<?php

declare(strict_types=1);

namespace Test;

use DI\ContainerBuilder;
use Exception;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;

class TestCase extends PHPUnit_TestCase
{
    protected function getContainer() : \DI\Container
    {
        // Instantiate PHP-DI ContainerBuilder
        $containerBuilder = new ContainerBuilder();

        // Set up DI
        $fndi = require __DIR__ . '/../src/Config/di.php';
        $fndi($containerBuilder);

        // $doctrine = require_once __DIR__ . '/../src/Config/doctrine-bootstrap.php';
        // $doctrine($containerBuilder);

        // Build PHP-DI Container instance
        $container = $containerBuilder->build();

        return $container;
    }
}
