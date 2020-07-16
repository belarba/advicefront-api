<?php
declare(strict_types=1);

use App\Domain\Book\BookRepository;
use App\Infrastructure\Persistence\Book\InMemoryBookRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        BookRepository::class => \DI\autowire(InMemoryBookRepository::class),
    ]);
};
