<?php
declare(strict_types=1);

namespace App\Domain\Book;

use JsonSerializable;

class Book implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $isbn;

    /**
     * @var string
     */
    private $coverUrl;

    /**
     * @var string
     */
    private $description;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param int       $isbn
     * @param string    $coverUrl
     * @param string    $description
     */
    public function __construct(?int $id, string $title, int $isbn, string $coverUrl, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->coverUrl = $coverUrl;
        $this->description = $description;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getISBN(): int
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getCoverURL(): string
    {
        return $this->coverUrl;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
