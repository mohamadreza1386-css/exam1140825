CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
price INT NOT NULL,
type ENUM('book', 'notebook') NOT NULL
);

INSERT INTO products (title, price, type) VALUES
('راهنمای PHP شی‌گرا', 150000, 'book'),
('مهارت‌های HTML و CSS', 120000, 'book'),
('دفتر ساده A5', 30000, 'notebook'),
('دفتر شطرنجی A4', 45000, 'notebook');
