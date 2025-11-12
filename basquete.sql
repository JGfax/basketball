CREATE DATABASE IF NOT EXISTS basketball;
USE basketball;

    CREATE TABLE equipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

create table jogador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE atletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_equipe INT,
    pontos INT DEFAULT 0,
    rebotes INT DEFAULT 0,
    assistencias INT DEFAULT 0,
    FOREIGN KEY (id_equipe) REFERENCES equipes(id) ON DELETE SET NULL
);

-- Inserir Equipes
INSERT INTO equipes (nome, id_equipe) VALUES
('Golden State Warriors', '1'),
('Los Angeles Lakers', '2'),
('LA Clippers', '3'),
('Phoenix Suns', '4'),
('Sacramento Kings', '5');
