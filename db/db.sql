DROP DATABASE IF EXISTS bloco_notas;
CREATE DATABASE bloco_notas;
USE bloco_notas;

CREATE TABLE user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL, 
    date DATETIME NOT NULL
);
CREATE TABLE nota (
    title VARCHAR(100) NOT NULL,
    text VARCHAR(MAX) NOT NULL, 
    user_id INT NOT NULL, 
    FOREIGN KEY(user_id) REFERENCES user(user_id) ON DELETE CASCADE
);
