CREATE DATABASE basketball;
USE basketball;

CREATE TABLE equipes (
    id_equipe INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE atletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_equipe INT,
    pontos INT DEFAULT 0,
    rebotes INT DEFAULT 0,
    assistencias INT DEFAULT 0,
    FOREIGN KEY (id_equipe) REFERENCES equipes (id_equipe) ON DELETE SET NULL
);

-- Inserir Equipes
INSERT INTO equipes (id_equipe, nome) VALUES
('1','Golden State Warriors'),
('2','Los Angeles Lakers'),
('3','LA Clippers'),
('4','Phoenix Suns' ),
('5','Sacramento Kings' );