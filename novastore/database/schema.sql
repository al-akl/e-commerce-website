CREATE DATABASE IF NOT EXISTS novastore;

USE novastore;

CREATE TABLE IF NOT EXISTS users (
	userID INT AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(50) not null,
	lastName VARCHAR(50) not null,
	email VARCHAR(100) unique not null,
	password VARCHAR(255) not null,
	role ENUM('CUSTOMER', 'ADMINISTRATOR') DEFAULT 'CUSTOMER',
	balance DECIMAL(10,2) DEFAULT 1000.0,
	registrationDate DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS shoppingcart (
	cartID INT AUTO_INCREMENT PRIMARY KEY,
	userID INT,
	creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS category (
	categoryID INT AUTO_INCREMENT PRIMARY KEY,
	categoryName VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS products (
	barcode VARCHAR(50) PRIMARY KEY,
	name VARCHAR(100) not null,
	description VARCHAR(255) not null,
	unitPrice DECIMAL(10,2) not null,
	stockQuantity INT DEFAULT 0,
    insertionDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    imageReference VARCHAR(255),
	categoryID INT,
	FOREIGN KEY (categoryID) REFERENCES category(categoryID)
);

CREATE TABLE IF NOT EXISTS orders (
	orderID INT AUTO_INCREMENT PRIMARY KEY,
	userID INT,
	totalPrice DECIMAL(10,2),
	orderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE IF NOT EXISTS orderLine (
	lineID INT AUTO_INCREMENT PRIMARY KEY,
	barcode VARCHAR(50),
	orderID INT,
	priceAtPurchase DECIMAL(10,2),
	quantity INT,
	totalPrice DECIMAL(10,2),
	FOREIGN KEY (barcode) REFERENCES products(barcode),
	FOREIGN KEY (orderID) REFERENCES orders(orderID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS payments (
	paymentID INT AUTO_INCREMENT PRIMARY KEY,
	orderID INT,
	paymentMethod VARCHAR(100),
	amount DECIMAL(10,2),
	paymentDate DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (orderID) REFERENCES orders(orderID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS cartitem (
	cartitemID INT AUTO_INCREMENT PRIMARY KEY,
	cartID INT,
	barcode VARCHAR(50),
	quantity INT DEFAULT 1,
	FOREIGN KEY (cartID) REFERENCES shoppingcart(cartID) ON DELETE CASCADE,
	FOREIGN KEY (barcode) REFERENCES products(barcode)
);

CREATE TABLE IF NOT EXISTS reviews (
    reviewID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    barcode VARCHAR(50) NOT NULL,
    content VARCHAR(300) NOT NULL,
	rating  INT NOT NULL,
    reviewDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE,
    FOREIGN KEY (barcode) REFERENCES products(barcode) ON DELETE CASCADE
);