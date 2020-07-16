<?php
declare(strict_types=1);

namespace App\Domain\Book;

interface BookRepository
{
    /**
     * @return Book[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Book
     * @throws BookNotFoundException
     */
    public function findBookWithId(int $id): Book;
}
