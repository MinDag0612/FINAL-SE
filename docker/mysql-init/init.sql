CREATE DATABASE IF NOT EXISTS final_se;

USE final_se;

CREATE TABLE IF NOT EXISTS account (
    id VARCHAR(50),
    name VARCHAR(100),
    password VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50),
    items TEXT,
    total_price DECIMAL(10, 2),
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

