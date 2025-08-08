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

CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(20),
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
INSERT INTO Categories (category_name, parent_id) VALUES ('Women', NULL);
INSERT INTO Categories (category_name, parent_id) VALUES ('Men', NULL);
INSERT INTO Categories (category_name, parent_id) VALUES ('Children', NULL);
INSERT INTO Categories (category_name, parent_id) VALUES ('Bags', NULL);
INSERT INTO Categories (category_name, parent_id) VALUES ('Beauty', NULL);
INSERT INTO Categories (category_name, parent_id) VALUES ('Our Story', NULL);

INSERT INTO Categories (category_name, parent_id) VALUES ('Dresses', 1);
INSERT INTO Categories (category_name, parent_id) VALUES ('Shoes', 1);
INSERT INTO Categories (category_name, parent_id) VALUES ('Accessories', 1);

INSERT INTO Categories (category_name, parent_id) VALUES ('Suits', 2);
INSERT INTO Categories (category_name, parent_id) VALUES ('Casual', 2);
INSERT INTO Categories (category_name, parent_id) VALUES ('Shoes', 2);

INSERT INTO Categories (category_name, parent_id) VALUES ('Clothing', 3);
INSERT INTO Categories (category_name, parent_id) VALUES ('Toys', 3);

INSERT INTO Categories (category_name, parent_id) VALUES ('Handbags', 4);
INSERT INTO Categories (category_name, parent_id) VALUES ('Backpacks', 4);

INSERT INTO Categories (category_name, parent_id) VALUES ('Skincare', 5);
INSERT INTO Categories (category_name, parent_id) VALUES ('Makeup', 5);

INSERT INTO Categories (category_name, parent_id) VALUES ('About Us', 6);
INSERT INTO Categories (category_name, parent_id) VALUES ('Mission', 6);




