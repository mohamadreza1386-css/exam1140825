<?php
declare(strict_types=1);

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Sellable.php';

/**
 * Represents a notebook product.
 */
class Notebook extends Product implements Sellable
{
    /**
     * TODO(Task 4):
     * Implement a constructor with the signature:
     *
     * public function __construct(int $id, string $title, int $price)
     *
     * It must assign the arguments to the protected properties.
     */

    /**
     * TODO(Task 4):
     * Implement getTypeLabel() so that it returns the exact Persian string "دفتر".
     */

    /**
     * TODO(Task 4):
     * Implement getFinalPrice() so that it returns the original price without
     * any discount.
     */
}
