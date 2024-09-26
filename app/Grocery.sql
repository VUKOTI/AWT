CREATE DATABASE Shop;
USE Shop;

CREATE TABLE grocery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price INT,
    quantity VARCHAR(100)
);

INSERT INTO grocery (id, name, price, quantity) VALUES (2200, 'Maidha', 20, '10 Kg');
SELECT * FROM grocery;