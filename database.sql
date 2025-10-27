CREATE DATABASE marina_luxe CHARACTER SET utf8 COLLATE utf8_general_ci;


USE marina_luxe;

-- جدول المستخدمين لتسجيل الدخول
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,       
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL     
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- قائمة الطعام
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name_ar VARCHAR(100) NOT NULL,     -- اسم الطبق بالعربية
    name_en VARCHAR(100) NOT NULL,     -- اسم الطبق بالإنجليزية
    price DECIMAL(10,2) NOT NULL,      
    description_ar TEXT,               -- وصف الطبق بالعربية
    description_en TEXT                -- وصف الطبق بالإنجليزية
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Delivery Orders
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,        
    delivery_time DATETIME NOT NULL,    
    payment_method VARCHAR(50) NOT NULL,
    status ENUM('قيد التنفيذ','مكتمل','ملغي') DEFAULT 'قيد التنفيذ'
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- حجوزات المطعم (حجز الطاولات)
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,        
    guests_count INT NOT NULL,          
    reservation_date DATE NOT NULL,     
    reservation_time TIME NOT NULL,     
    status ENUM('قيد التنفيذ','مكتمل','ملغي') DEFAULT 'قيد التنفيذ'
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
