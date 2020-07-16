<?php
declare(strict_types=1);

namespace App\Domain\Book;

use App\Domain\DomainException\DomainRecordNotFoundException;

class BookNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The book you requested does not exist.';
}
