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
    age INT,
    bio TEXT,
    favorite_athlete VARCHAR(200),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS sports (
    id VARCHAR(100) NOT NULL PRIMARY KEY,
    name VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    performance FLOAT NOT NULL,
    sport_id VARCHAR(100) NOT NULL,
    user_id INT,
    deity VARCHAR(100),
    deity_influence FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (sport_id) REFERENCES sports(id) ON DELETE CASCADE
);

INSERT IGNORE INTO sports (id, name) VALUES ('pugilato', 'Pugilato');
INSERT IGNORE INTO sports (id, name) VALUES ('corsa', 'Corsa');
INSERT IGNORE INTO sports (id, name) VALUES ('lotta', 'Lotta');
INSERT IGNORE INTO sports (id, name) VALUES ('danza', 'Danza');
INSERT IGNORE INTO sports (id, name) VALUES ('lancio-del-disco', 'Lancio del disco');
INSERT IGNORE INTO sports (id, name) VALUES ('salto-in-lungo', 'Salto in lungo');
INSERT IGNORE INTO sports (id, name) VALUES ('lancio-del-giavellotto', 'Lancio del giavellotto');

CREATE TRIGGER empty_profile AFTER INSERT ON users
    FOR EACH ROW
    INSERT INTO profiles (user_id) VALUES (NEW.id);
