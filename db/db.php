<?php
declare(strict_types=0);

/**
 * Simple PDO connection and product fetch.
 * Adjust $dsn, $user, $pass for your local environment.
 */

$dsn = 'mysql:host=localhost;dbname=oop_exam;charset=utf8mb4';
$user = 'root';
$pass = '';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$stmt = $pdo->query('SELECT id, title, price, type FROM products');
$rows = $stmt->fetchAll();
