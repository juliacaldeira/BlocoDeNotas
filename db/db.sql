DROP DATABASE IF EXISTS bloco_notas;
CREATE DATABASE bloco_notas;
USE bloco_notas;

CREATE TABLE usuario (
    usuario_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(40) NOT NULL
);
CREATE TABLE nota (
    nota_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    text VARCHAR(4000) NOT NULL, 
    usuario_id INT NOT NULL, 
    FOREIGN KEY(usuario_id) REFERENCES usuario(usuario_id) ON DELETE CASCADE
);
