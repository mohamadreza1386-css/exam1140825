# Instructor Notes – PHP OOP Exam (Products)

این فایل برای مدرس و ابزار تصحیح خودکار (هوش مصنوعی) است.
قرار نیست دانشجوها برای حل تمرین این فایل را مطالعه کنند، اما در ریپازیتوری وجود دارد.

این پروژه برای سنجش مفاهیم زیر طراحی شده است:

* `class` / `object`
* `property` / `method`
* `constructor`
* access modifiers (`protected` / `public`)
* `abstract class`
* `interface`
* inheritance (`extends`)
* استفادهٔ ساده از PDO و ترکیب PHP + HTML

کل نمرهٔ پیشنهادی: **۳۰**

## 1. فایل‌های مهم

* `config/student.php` → شناسهٔ دانشجو، نام، و جملهٔ یکتا
* `src/Product.php` → Task 1 (abstract class)
* `src/Sellable.php` → Task 2 (interface)
* `src/Book.php` → Task 3 (Book class)
* `src/Notebook.php` → Task 4 (Notebook class)
* `public/index.php` → Task 5 و Task 6 (ساخت اشیاء و نمایش آن‌ها)

## 2. Grading Rubric (Barnameh Bandi)

### Task 0 – Student metadata (`config/student.php`) – 0 points (required)

Check:

* `STUDENT_ID` is non-empty and plausible.
* `STUDENT_NAME` is non-empty and plausible.
* `STUDENT_SECRET_PHRASE` is a short Persian sentence (not just a single word), ideally unique among students.

If these fields are empty or obviously copied, mark as a potential cheating signal (ولی به خودی خود نمره ندارد).

---

### Task 1 – `abstract class Product` – 5 points

File: `src/Product.php`

1. **Properties (1 pt)**

   * `protected int $id;`
   * `protected string $title;`
   * `protected int $price;`

2. **Constructor (2 pts)**

   * Signature: `public function __construct(int $id, string $title, int $price)`
   * Assigns arguments to the three protected properties.

3. **Getters (2 pts)**

   * `public function getTitle(): string` returns `$this->title`.
   * `public function getPrice(): int` returns `$this->price`.

4. **Abstract method**

   * `abstract public function getTypeLabel(): string;`
   * If this is missing or not abstract, subtract up to 1 point.

---

### Task 2 – `interface Sellable` – 3 points

File: `src/Sellable.php`

* Must define:

  ```php
  interface Sellable
  {
      public function getFinalPrice(): int;
  }
  ```

Grading:

* 3 pts: interface with correct name and exact method signature.
* 1–2 pts: minor deviations but still clear and used consistently.
* 0 pts: no interface, wrong name, or method with different purpose.

---

### Task 3 – `class Book` – 5 points

File: `src/Book.php`

Expected:

```php
class Book extends Product implements Sellable
```

Grading details:

* 1 pt: correct class header (extends `Product`, implements `Sellable`).
* 2 pts: constructor:

  * Signature: `public function __construct(int $id, string $title, int $price)`
  * Correctly assigns to inherited properties (`$this->id`, `$this->title`, `$this->price`), either directly or via `parent::__construct`.
* 1 pt: `getTypeLabel()` returns the exact Persian label `"کتاب"`.
* 1 pt: `getFinalPrice()` returns price with 10% discount:

  * Accept forms like `(int) round($this->price * 0.9)` or `(int) ($this->price * 0.9)`.

---

### Task 4 – `class Notebook` – 5 points

File: `src/Notebook.php`

Expected:

```php
class Notebook extends Product implements Sellable
```

Grading details:

* 1 pt: correct class header.
* 2 pts: constructor with same pattern as `Book`.
* 1 pt: `getTypeLabel()` returns the exact Persian label `"دفتر"`.
* 1 pt: `getFinalPrice()` returns the original price (no discount).

---

### Task 5 – Building objects in `index.php` – 7 points

File: `public/index.php`

Inside the PHP section before HTML:

* Student must:

  * Loop over `$rows` returned by `db/db.php`.
  * For each row:

    * If `$row['type'] === 'book'` → create `new Book(...)`
    * If `$row['type'] === 'notebook'` → create `new Notebook(...)`
  * Push each object into `$products` array.

Grading:

* 3 pts: correct `foreach` over `$rows`.
* 2 pts: correct creation of `Book` objects for `type = 'book'`.
* 2 pts: correct creation of `Notebook` objects for `type = 'notebook'`.

Common mistakes and partial credit:

* Wrong type comparison but still mapping logically → partial credit.
* Misusing `Product` directly instead of subclasses → deduct points.

---

### Task 6 – Rendering products in HTML – 5 points

File: `public/index.php`

Within the HTML section, inside `foreach ($products as $product)`:

* Title: `echo $product->getTitle();`
* Type: `echo $product->getTypeLabel();`
* Base price: `echo $product->getPrice();`
* Final price: `echo $product->getFinalPrice();`

Grading:

* 1 pt: uses `getTitle()`.
* 1 pt: uses `getTypeLabel()`.
* 1 pt: uses `getPrice()`.
* 2 pts: uses `getFinalPrice()` and shows it distinctly.

If the student accesses properties directly (e.g. `$product->title`) instead of using getters, subtract 1–2 points for this task.

---

## 3. Anti-cheat design notes

این موارد برای کمک به تشخیص تقلب است:

1. **Student metadata (`config/student.php`)**

   * هر دانشجو باید یک جملهٔ یکتا در `STUDENT_SECRET_PHRASE` بنویسد.
   * تکرار این جمله‌ها بین چند ریپو، یا خالی بودن آن‌ها، نشانهٔ مشکوک است.

2. **Personalization in UI**

   * صفحهٔ `index.php` در هدر، `STUDENT_ID` و `STUDENT_NAME` را نمایش می‌دهد، و در فوتر `STUDENT_SECRET_PHRASE` را.
   * اگر اینها مقدار پیش‌فرض داشته باشند، احتمالاً دانشجو بخش 0 را انجام نداده است.

3. **Commit history**

   * حداقل چند commit معنادار توصیه شده است.
   * یک commit بزرگ با پیام کلی و بدون منطق زمانی، می‌تواند نشانهٔ کپی یک‌باره باشد.

4. **Code style**

   * راه‌حل‌های مبتنی بر هوش مصنوعی معمولاً:

     * کامنت‌های انگلیسی طولانی و رسمی تولید می‌کنند.
     * نام متغیرها و متدها را بیش از حد توصیفی و یکنواخت انتخاب می‌کنند.
   * اگر چند دانشجو دقیقاً یک استایل غیرمعمول دارند، احتمالاً از یک ابزار مشترک استفاده شده است.

5. **Optional oral confirmation**

   * می‌توانید از چند دانشجو به طور تصادفی بخواهید کد خودشان را در ۱–۲ دقیقه توضیح بدهند (به‌خصوص آن‌هایی که کد خیلی کامل ولی سابقهٔ ضعیف داشتند).

---

## 4. Using an AI tool for grading

برای استفاده از یک ابزار هوش مصنوعی جهت تصحیح:

1. متن `README.md` و `INSTRUCTOR_NOTES.md` را به ابزار بدهید تا صورت سؤال و Rubric را بفهمد.
2. لینک GitHub دانشجو (یا محتویات ریپو) را در اختیار ابزار قرار دهید.
3. از ابزار بخواهید:

   * برای هر Task (0 تا 6) بررسی کند آیا شرایط گفته‌شده در این فایل رعایت شده است یا خیر.
   * برای هر Task نمره بدهد و در نهایت جمع ۳۰ نمره‌ای را گزارش کند.
   * موارد مشکوک به تقلب را (طبق بخش Anti-cheat design notes) در قالب توضیح جداگانه ذکر کند.

پایان INSTRUCTOR_NOTES.
