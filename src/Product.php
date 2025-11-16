<?php
declare(strict_types=0);


abstract class Product
{
    // TODO(Task 1):
    // Add protected properties:
    // - int $id
    // - string $title
    // - int $price
    protected int $id;
    protected string $title;
    protected int $price;

    /**
     * TODO(Task 1):
     * Implement a constructor with the exact signature:
     *
     * public function __construct(int $id, string $title, int $price)
     *
     * It must assign the arguments to the protected properties.
     */
    public function __construct(int $id, string $title, int $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * TODO(Task 1):
     * Implement this method to return the product title.
     *
     * public function getTitle(): string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * TODO(Task 1):
     * Implement this method to return the product price.
     *
     * public function getPrice(): int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Each subclass must return a human-readable type label,
     * for example "Book" or "Notebook".
     *
     * This method MUST stay abstract.
     */

    abstract public function getTypeLabel(): string;
}

