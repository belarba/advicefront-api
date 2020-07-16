<?php
declare(strict_types=1);

namespace App\Application\Actions\Book;

use App\Application\Actions\Action;
use App\Domain\Book\BookRepository;
use Psr\Log\LoggerInterface;

abstract class BookAction extends Action
{
    /**
     * @var BookRepository
     */
    protected $bookRepository;

    /**
     * @param LoggerInterface $logger
     * @param BookRepository  $bookRepository
     */
    public function __construct(LoggerInterface $logger, BookRepository $bookRepository)
    {
        parent::__construct($logger);
        $this->bookRepository = $bookRepository;
    }
}
