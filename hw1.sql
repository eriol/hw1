CREATE DATABASE IF NOT EXISTS athletike;

USE athletike;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200),
    birthday DATE,
    bio TEXT,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TRIGGER empty_profile AFTER INSERT ON users
    FOR EACH ROW
    INSERT INTO profiles (user_id) VALUES (NEW.id);
