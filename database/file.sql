-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(255) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     password VARCHAR(255) NOT NULL,
--     role ENUM('admin', 'client') NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     deleted_at TIMESTAMP NULL
-- );


-- CREATE TABLE products (
--     productid INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     description TEXT,
--     price DECIMAL(10, 2) NOT NULL,
--     quantity INT NOT NULL
-- );


-- INSERT INTO products (name, description, price, quantity) VALUES
-- ('Wireless Mouse', 'Ergonomic wireless mouse with 2.4 GHz connectivity.', 19.99, 50),
-- ('Mechanical Keyboard', 'RGB mechanical keyboard with blue switches.', 59.99, 30),
-- ('Laptop Stand', 'Adjustable aluminum laptop stand for better ergonomics.', 29.99, 40),
-- ('USB-C Hub', '7-in-1 USB-C hub with HDMI, USB 3.0, and SD card reader.', 39.99, 25),
-- ('Portable SSD', '1TB portable SSD with USB 3.1 and high-speed data transfer.', 119.99, 20),
-- ('Gaming Headset', 'Surround sound gaming headset with noise-canceling microphone.', 49.99, 35),
-- ('Webcam 1080p', 'Full HD webcam with autofocus and built-in microphone.', 34.99, 15),
-- ('Wireless Charger', 'Fast wireless charger compatible with iOS and Android devices.', 24.99, 45),
-- ('Bluetooth Speaker', 'Portable Bluetooth speaker with 12 hours of battery life.', 29.99, 50),
-- ('Smartwatch', 'Fitness tracking smartwatch with heart rate monitor and GPS.', 79.99, 10);
