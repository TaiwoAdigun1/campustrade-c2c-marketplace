CREATE DATABASE IF NOT EXISTS campustrade;
USE campustrade;

DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS cart_items;
DROP TABLE IF EXISTS cart;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;

CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    category_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    product_image VARCHAR(255),
    status VARCHAR(30) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE cart_items (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    FOREIGN KEY (cart_id) REFERENCES cart(cart_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_status VARCHAR(30) DEFAULT 'Pending',
    total_amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    payment_method VARCHAR(50),
    payment_status VARCHAR(30) DEFAULT 'Pending',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

INSERT INTO roles(role_name) VALUES ('Admin'), ('Seller'), ('Customer');

-- password for all demo users: Admin123!
INSERT INTO users(role_id, full_name, email, password, phone) VALUES
(1, 'CampusTrade Admin', 'admin@campustrade.co.za', '$2y$10$FyV4oMYxyBdkVWiD2rEbEetJPCPH3jgZRIkhtIR7V7EUI6lfMC2LK', '0123456789'),
(2, 'Demo Seller', 'seller@campustrade.co.za', '$2y$10$FyV4oMYxyBdkVWiD2rEbEetJPCPH3jgZRIkhtIR7V7EUI6lfMC2LK', '0821111111'),
(3, 'Demo Customer', 'customer@campustrade.co.za', '$2y$10$FyV4oMYxyBdkVWiD2rEbEetJPCPH3jgZRIkhtIR7V7EUI6lfMC2LK', '0832222222');

INSERT INTO categories(category_name) VALUES ('Electronics'), ('Textbooks'), ('Clothing'), ('Accessories'), ('Household');

INSERT INTO products(seller_id, category_id, product_name, description, price, product_image, status) VALUES
(2, 1, 'Second-hand Laptop', 'A neat laptop suitable for assignments and online learning.', 4500.00, 'assets/images/placeholder.svg', 'Approved'),
(2, 2, 'Radiography Textbook', 'Used textbook in good condition.', 650.00, 'assets/images/placeholder.svg', 'Approved'),
(2, 3, 'Winter Jacket', 'Warm jacket, medium size.', 350.00, 'assets/images/placeholder.svg', 'Approved');
