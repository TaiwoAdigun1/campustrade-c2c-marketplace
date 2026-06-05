-- CampusTrade C2C Marketplace MySQL Database
-- Required project format: PHP + MySQL with RBAC support
DROP DATABASE IF EXISTS campustrade_db;
CREATE DATABASE campustrade_db;
USE campustrade_db;

CREATE TABLE roles (
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(50) NOT NULL UNIQUE,
  permissions TEXT
);

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  role_id INT NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  phone VARCHAR(20),
  password VARCHAR(255) NOT NULL,
  status ENUM('Active','Suspended') DEFAULT 'Active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  seller_id INT NOT NULL,
  category_id INT NOT NULL,
  name VARCHAR(150) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  condition_ VARCHAR(30),
  location VARCHAR(120),
  stock INT DEFAULT 1,
  image_url VARCHAR(255),
  status ENUM('Pending','Approved','Rejected') DEFAULT 'Pending',
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
  order_status ENUM('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  total_amount DECIMAL(10,2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE order_items (
  order_item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  seller_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id),
  FOREIGN KEY (seller_id) REFERENCES users(user_id)
);

CREATE TABLE payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  payment_method ENUM('Card','EFT','Cash') NOT NULL,
  payment_status ENUM('Pending','Paid','Failed','Refunded') DEFAULT 'Pending',
  payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

INSERT INTO roles (role_name, permissions) VALUES
('Admin','manage_users,manage_roles,manage_products,manage_categories,manage_orders,view_reports'),
('Seller','list_products,edit_own_products,delete_own_products,view_sales'),
('Customer','browse_products,add_to_cart,checkout,view_orders');

INSERT INTO users (role_id, full_name, email, phone, password, status) VALUES
(1,'Admin User','admin@campustrade.co.za','0710000001','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active'),
(2,'Seller User','seller@campustrade.co.za','0710000002','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active'),
(3,'Customer User','customer@campustrade.co.za','0710000003','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active'),
(2,'Thabo Mokoena','thabo@campus.ac.za','0711111111','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active'),
(2,'Ayesha Khan','ayesha@campus.ac.za','0712222222','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active'),
(3,'Lerato Phiri','lerato@campus.ac.za','0713333333','$2y$12$Gze3HbhTOiEPZTtLdl98Mu7c6Rpebygt6hhLMJvT.AUfbkFE2cRrG','Active');

INSERT INTO categories (category_name) VALUES
('Electronics'),('Books'),('Fashion'),('Furniture'),('Stationery'),('Appliances'),('Sports');

INSERT INTO products (seller_id, category_id, name, description, price, condition_, location, stock, image_url, status) VALUES
(4,1,'Dell Latitude Laptop','Reliable Dell Latitude laptop, perfect for students. Comes with charger.',4500,'Used - Good','Johannesburg',1,'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=600&fit=crop','Approved'),
(5,1,'iPhone 11 64GB','iPhone 11 in excellent condition. Battery health 89%. Original box included.',5200,'Used - Excellent','Cape Town',1,'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=600&fit=crop','Approved'),
(6,2,'Accounting Textbook','First-year accounting textbook with minimal highlights.',350,'Used - Good','Pretoria',2,'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=600&fit=crop','Approved'),
(2,3,'Nike Sneakers','Nike sneakers, size UK 9. Worn a few times only.',800,'Used - Good','Durban',1,'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&h=600&fit=crop','Approved'),
(2,4,'Study Desk','Solid wood study desk with spacious surface and one drawer.',1200,'Used - Good','Johannesburg',1,'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=800&h=600&fit=crop','Approved'),
(2,1,'Bluetooth Speaker','Portable Bluetooth speaker with 10-hour battery life.',450,'New','Bloemfontein',3,'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=800&h=600&fit=crop','Approved'),
(2,5,'Scientific Calculator','Casio fx-991 scientific calculator. All functions working.',300,'Used - Excellent','Pretoria',1,'https://images.unsplash.com/photo-1564939558297-fc396f18e5c7?w=800&h=600&fit=crop','Approved'),
(2,3,'Backpack','Spacious backpack with laptop compartment.',250,'Used - Good','Soweto',1,'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800&h=600&fit=crop','Approved'),
(2,6,'Microwave Oven','20L microwave oven. Works perfectly for student accommodation.',900,'Used - Good','Cape Town',1,'https://images.unsplash.com/photo-1574269910231-bc508bcb42aa?w=800&h=600&fit=crop','Approved'),
(2,4,'Office Chair','Ergonomic office chair with adjustable height.',750,'Used - Good','Johannesburg',1,'https://images.unsplash.com/photo-1580480055273-228ff5388ef8?w=800&h=600&fit=crop','Approved'),
(2,6,'Hair Dryer','Professional hair dryer with multiple heat settings.',400,'Used - Excellent','Durban',1,'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?w=800&h=600&fit=crop','Approved'),
(2,1,'Graphic Design Tablet','Drawing tablet with pen included. Suitable for design students.',1600,'Used - Good','Cape Town',1,'https://images.unsplash.com/photo-1561154464-82e9adf32764?w=800&h=600&fit=crop','Approved'),
(2,2,'Medical Terminology Book','Comprehensive medical terminology reference book.',500,'Used - Good','Pretoria',1,'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=800&h=600&fit=crop','Approved'),
(2,7,'Soccer Boots','Adidas soccer boots, size UK 8. Studs in good shape.',650,'Used - Good','Johannesburg',1,'https://images.unsplash.com/photo-1593341646782-e0b495cff86d?w=800&h=600&fit=crop','Approved'),
(2,1,'Ring Light','10-inch ring light with phone holder and tripod.',550,'New','Durban',2,'https://images.unsplash.com/photo-1610142657772-cb44e15a7be1?w=800&h=600&fit=crop','Approved');

INSERT INTO orders (customer_id, order_status, total_amount) VALUES (3,'Delivered',5200),(3,'Shipped',350),(6,'Processing',450);
INSERT INTO order_items (order_id, product_id, seller_id, quantity, price) VALUES (1,2,5,1,5200),(2,3,6,1,350),(3,6,2,1,450);
INSERT INTO payments (order_id, payment_method, payment_status) VALUES (1,'Card','Paid'),(2,'EFT','Paid'),(3,'Cash','Pending');
