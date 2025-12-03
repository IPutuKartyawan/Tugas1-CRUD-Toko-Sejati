CREATE DATABASE crud_produk;
USE crud_produk;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    image_path VARCHAR(255),
    status ENUM('active','inactive') NOT NULL
);
INSERT INTO products (name, category, price, stock, image_path, status)
VALUES
-- MAKANAN
('Roti Tawar Gandum', 'Makanan', 18000, 40, NULL, 'active'),
('Mie Instan Goreng', 'Makanan', 3500, 200, NULL, 'active'),
('Sosis Ayam 500gr', 'Makanan', 25000, 60, NULL, 'active'),
('Nugget Ayam 1kg', 'Makanan', 56000, 25, NULL, 'active'),

-- MINUMAN
('Air Mineral 600ml', 'Minuman', 4000, 120, NULL, 'active'),
('Teh Botol 350ml', 'Minuman', 5000, 75, NULL, 'active'),
('Kopi Latte Kaleng', 'Minuman', 12000, 45, NULL, 'active'),
('Jus Jeruk Kotak 1L', 'Minuman', 18000, 32, NULL, 'active'),

-- SAYUR
('Wortel 1kg', 'Sayur', 15000, 50, NULL, 'active'),
('Bayam 250gr', 'Sayur', 5000, 40, NULL, 'active'),
('Kentang 1kg', 'Sayur', 14000, 60, NULL, 'active'),
('Brokoli 300gr', 'Sayur', 12000, 28, NULL, 'active'),

-- BUAH
('Apel Fuji 1kg', 'Buah', 38000, 35, NULL, 'active'),
('Jeruk Medan 1kg', 'Buah', 26000, 40, NULL, 'active'),
('Pisang Cavendish 1kg', 'Buah', 22000, 25, NULL, 'active'),
('Semangka Utuh', 'Buah', 30000, 15, NULL, 'active'),

-- BAHAN DAPUR / DLL
('Gula Pasir 1kg', 'Lainnya', 14500, 80, NULL, 'active'),
('Minyak Goreng 1L', 'Lainnya', 14000, 90, NULL, 'active'),
('Garam Dapur 500gr', 'Lainnya', 4000, 70, NULL, 'active'),
('Kecap Manis Botol 520ml', 'Lainnya', 18000, 30, NULL, 'active');