<?php
declare(strict_types=1);

namespace App\Application\Actions\Book;

use Psr\Http\Message\ResponseInterface as Response;

class ViewBookAction extends BookAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $bookId = (int) $this->resolveArg('id');
        $book = $this->bookRepository->findBookWithId($bookId);

        $this->logger->info("Book with id `${bookId}` was viewed.");

        return $this->respondWithData($book);
    }
}
