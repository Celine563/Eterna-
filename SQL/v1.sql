DROP DATABASE IF EXISTS Eterna;

CREATE DATABASE Eterna;

USE Eterna;

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20),
    email VARCHAR(20),
    password_hash VARCHAR(20),
    full_name VARCHAR(20),
    address TEXT,
    phone_number VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50),
    parent_id INT DEFAULT NULL,
    FOREIGN KEY (parent_id) REFERENCES Categories(category_id) ON DELETE CASCADE
);

ALTER TABLE Categories ADD COLUMN sort_order INT DEFAULT 0;



CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(500),
    description TEXT,
    price DECIMAL(10, 2),
    stock_quantity INT DEFAULT 0,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    image_data LONGBLOB,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);



CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  
    total_amount DECIMAL(10, 2) NOT NULL,
    shipping_address TEXT NOT NULL,
    order_status ENUM('pending', 'shipped', 'delivered', 'canceled'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE OrderDetails (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT, 
    rating INT, 
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(product_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    payment_method ENUM('credit_card', 'paypal', 'bank_transfer'),
    payment_status ENUM('pending', 'completed', 'failed'),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id)
);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Women', NULL, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Men', NULL, 2);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Children', NULL, 3);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Bags', NULL, 4);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Beauty', NULL, 5);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Our Story', NULL, 6);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Dresses', 1, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Shoes', 1, 2);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Accessories', 1, 3);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Suits', 2, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Casual', 2, 2);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Shoes', 2, 3);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Clothing', 3, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Toys', 3, 2);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Handbags', 4, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Backpacks', 4, 2);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Skincare', 5, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Makeup', 5, 2);

INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('About Us', 6, 1);
INSERT INTO Categories (category_name, parent_id, sort_order) VALUES ('Mission', 6, 2);

INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Brown heel', 1, 'Chunky brown heeled mules', 85.00, 100, 1, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Black dress', 2, 'Black dress with white edges', 128.00, 49, 2, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Brown bag', 3, 'Classy brown tote bag', 47.00, 82, 3, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Gold necklace', 4, 'Classy gold dangling necklace', 95.00, 52, 4, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Bunny', 5, 'Cute beige bunny with clothes', 32.00, 12, 5, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Ties', 6, 'Classy chic ties', 18.00, 14, 6, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Brown backpack', 7, 'Chic school brown backpack', 49.00, 57, 7, NOW());
INSERT INTO products (product_name, product_id, description, price, stock_quantity, category_id, created_at)
VALUES ('Natural pink eyeshadow', 8, 'Eyeshadow case with natural pink colours', 53.00, 74, 8, NOW());

UPDATE `products` SET `product_id` = 1,`product_name` = 'Brown heel',`description` = 'Chunky brown heeled mules',`price` = '85.00',`stock_quantity` = 100,`category_id` = 8,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 1;
UPDATE `products` SET `product_id` = 2,`product_name` = 'Black dress',`description` = 'Black dress with white edges',`price` = '128.00',`stock_quantity` = 49,`category_id` = 7,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 2;
UPDATE `products` SET `product_id` = 3,`product_name` = 'Brown bag',`description` = 'Classy brown tote bag',`price` = '47.00',`stock_quantity` = 82,`category_id` = 15,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 3;
UPDATE `products` SET `product_id` = 4,`product_name` = 'Gold necklace',`description` = 'Classy gold dangling necklace',`price` = '95.00',`stock_quantity` = 52,`category_id` = 9,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 4;
UPDATE `products` SET `product_id` = 5,`product_name` = 'Bunny',`description` = 'Cute beige bunny with clothes',`price` = '32.00',`stock_quantity` = 12,`category_id` = 14,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 5;
UPDATE `products` SET `product_id` = 6,`product_name` = 'Ties',`description` = 'Classy chic ties',`price` = '18.00',`stock_quantity` = 14,`category_id` = 10,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 6;
UPDATE `products` SET `product_id` = 7,`product_name` = 'Brown backpack',`description` = 'Chic school brown backpack',`price` = '49.00',`stock_quantity` = 28,`category_id` = 16,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 7;
UPDATE `products` SET `product_id` = 8,`product_name` = 'Natural pink eyeshadow',`description` = 'Eyeshadow case with natural pink colours',`price` = '53.00',`stock_quantity` = 62,`category_id` = 18,`created_at` = '2025-08-11 11:57:36',`image_data` = NULL WHERE `products`.`product_id` = 8;
COMMIT;

