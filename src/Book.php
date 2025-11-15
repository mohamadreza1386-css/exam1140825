<?php
declare(strict_types=1);

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Sellable.php';

/**
 * Represents a book product.
 */
class Book extends Product implements Sellable
{
    /**
     * TODO(Task 3):
     * Implement a constructor with the signature:
     *
     * public function __construct(int $id, string $title, int $price)
     *
     * It must assign the arguments to the protected properties inherited
     * from Product. You do NOT have to use parent::__construct(); you can
     * directly assign to $this->id, $this->title, $this->price.
     */

    /**
     * TODO(Task 3):
     * Implement getTypeLabel() so that it returns the exact Persian string "کتاب".
     */

    /**
     * TODO(Task 3):
     * Implement getFinalPrice() so that it returns the price with 10% discount.
     * Example: price = 100000 → final price = 90000.
     */
}
