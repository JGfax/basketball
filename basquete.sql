create database basquete;
use basquete;

create table usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    senha VARCHAR(255),  -- Aumenta o tamanho da coluna para 255 caracteres
    email VARCHAR(100)
);
