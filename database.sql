CREATE DATABASE IF NOT EXISTS db_latihan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL DEFAULT 'User'
);

INSERT INTO users (nama, email, role) VALUES
('Baha', 'baha@example.com', 'Admin'),
('Rina', 'rina@example.com', 'User'),
('Andi Pratama', 'andi@example.com', 'User');
