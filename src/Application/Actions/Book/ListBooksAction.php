<?php
declare(strict_types=1);

namespace App\Application\Actions\Book;

use Psr\Http\Message\ResponseInterface as Response;

class ListBooksAction extends BookAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $books = $this->bookRepository->findAll();

        if (isset($this->request->getQueryParams()['title'])) {
            $books = array_values(array_filter($books, function ($v) {
                return substr_count($v['title'], $this->request->getQueryParams()['title']) > 0;
            }));
        }

        $this->logger->info("Book list was viewed.");

        return $this->respondWithData($books);
    }
}
