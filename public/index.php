<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/student.php';
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../src/Sellable.php';
require_once __DIR__ . '/../src/Book.php';
require_once __DIR__ . '/../src/Notebook.php';

/**
 * NOTE TO STUDENTS:
 * - Do NOT change the general HTML structure.
 * - Complete only the TODO sections in PHP code.
 */

$products = [];

// TODO(Task 5):
// Loop over $rows (fetched from the database) and create the correct
// object type for each row:
// - if $row['type'] === 'book'     → new Book(...)
// - if $row['type'] === 'notebook' → new Notebook(...)
// Then push each created object into the $products array.

?><!DOCTYPE html>

<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>آزمون PHP OOP – فهرست محصولات</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="app-background" aria-hidden="true"></div>

<header class="site-header">
    <div class="site-header__content">
        <div>
            <p class="eyebrow">آزمون عملی PHP</p>
            <h1>فهرست محصولات – پروژهٔ شی‌ءگرایی</h1>
            <p class="subtitle">
                با تکمیل کلاس‌های شی‌ءگرا و متصل‌کردن آن‌ها به PDO، این صفحهٔ فارسی یک فروشگاه جمع‌وجور را نمایش می‌دهد.
            </p>
        </div>
        <div class="student-meta glass-panel">
            <p><strong>شماره دانشجویی:</strong> <?php echo STUDENT_ID; ?></p>
            <p><strong>نام دانشجو:</strong> <?php echo STUDENT_NAME; ?></p>
        </div>
    </div>
</header>

<main class="site-main">
    <section class="hero">
        <div class="hero__content">
            <h2>منطق شی‌ءگرا را بسازید تا رابط فارسی بدرخشد</h2>
            <p>
                داده‌ها از دیتابیس فارسی بارگذاری می‌شوند و پس از کامل‌کردن TODOها، کارت‌های محصولات مثل یک فروشگاه مدرن نمایش داده خواهند شد.
                روی منطق PHP تمرکز کنید؛ ظاهر و تجربه کاربری از قبل آماده است.
            </p>
            <ul class="hero__highlights">
                <li>کلاس انتزاعی + interface</li>
                <li>ارث‌بری Book و Notebook</li>
                <li>شبکه داده با PDO</li>
            </ul>
        </div>
        <div class="hero__visual">
            <div class="glow-card">
                <p class="glow-card__label">نمایش زنده</p>
                <p class="glow-card__value">کاملاً واکنش‌گرا</p>
                <span class="spark"></span>
            </div>
            <div class="gradient-ring"></div>
        </div>
    </section>

    <section class="product-list-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">خروجی وظایف</p>
                <h2>محصولات</h2>
            </div>
            <p class="section-subtitle">
                پس از ساخت اشیاء و فراخوانی متدها، این لیست فارسی به صورت خودکار به‌روز می‌شود.
            </p>
        </div>

        <?php if (empty($products)): ?>
            <div class="empty-state glass-panel">
                <h3>فعلاً محصولی وجود ندارد!</h3>
                <p>
                    برای دیدن کارت محصولات، گام‌های شی‌ءگرایی را تکمیل کنید تا داده‌ها از دیتابیس فارسی خوانده شوند.
                </p>
            </div>
        <?php else: ?>
            <div class="products" data-products-grid>
                <?php foreach ($products as $product): ?>
                    <article class="product-card" data-product-card>
                        <header>
                            <p class="badge">خوانده‌شده از دیتابیس</p>
                            <h3 class="product-title">
                                <!-- TODO(Task 6): echo the product title using getTitle() -->
                            </h3>
                            <p class="product-type">
                                <!-- TODO(Task 6): echo the product type label using getTypeLabel() -->
                            </p>
                        </header>
                        <dl class="product-prices">
                            <div>
                                <dt>قیمت پایه</dt>
                                <dd class="product-price">
                                    <!-- TODO(Task 6): echo the base price using getPrice() -->
                                </dd>
                            </div>
                            <div>
                                <dt>قیمت نهایی</dt>
                                <dd class="product-final-price">
                                    <!-- TODO(Task 6): echo the final price using getFinalPrice() -->
                                </dd>
                            </div>
                        </dl>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<footer class="site-footer">
    <p>عبارت محرمانه دانشجو: <?php echo STUDENT_SECRET_PHRASE; ?></p>
</footer>
<script src="assets/app.js"></script>
</body>
</html>
