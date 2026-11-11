CREATE DATABASE situação_aprendizagem;

USE situação_aprendizagem;


CREATE TABLE trem (
    id_Trem INT PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    nome_trem VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    carga VARCHAR(50) NOT NULL,
    velocidade VARCHAR(45) NOT NULL,
    Usuario_id_Usuario INT NULL;
    CONSTRAINT fk_trem_usuario
    FOREIGN KEY (Usuario_id_Usuario) REFERENCES usuario(id_Usuario);

--  ALTER TABLE trem
-- ADD COLUMN Usuario_id_Usuario INT NULL;

-- ALTER TABLE trem
-- ADD CONSTRAINT fk_trem_usuario
-- FOREIGN KEY (Usuario_id_Usuario)
-- REFERENCES usuario(id_Usuario);
);

CREATE TABLE sensor (
    id_Sensor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_sensor VARCHAR(45) NOT NULL,
    localizacao VARCHAR(45) NOT NULL,
    tipo_dado ENUM('Velocidade', 'Temperatura', 'Falha', 'Vibração', 'Localização', 'Proximidade') NOT NULL   
);

ALTER TABLE sensor
ADD COLUMN Trem_id_Trem INT NOT NULL,
ADD CONSTRAINT fk_sensor_trem
FOREIGN KEY (Trem_id_Trem)
REFERENCES trem(id_Trem);

CREATE TABLE relatorio (
    id_Relatorio INT PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_geracao DATETIME NOT NULL
);


CREATE TABLE rota (
    id_Rota INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_rota VARCHAR(45) NOT NULL,
    horario_rota VARCHAR(45) NOT NULL,
    ponto_inicial VARCHAR(45) NOT NULL,
    ponto_final VARCHAR(45) NOT NULL,
    distancia VARCHAR(45) NOT NULL,
    sensor_id INT,
    FOREIGN KEY (sensor_id) REFERENCES sensor(id_Sensor)
    );

--     ALTER TABLE rota
-- ADD COLUMN trem_id INT NULL;

-- ALTER TABLE rota
-- ADD CONSTRAINT fk_rota_trem
-- FOREIGN KEY (trem_id)
-- REFERENCES trem(id_Trem);


CREATE TABLE usuario (
    id_Usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo_conta ENUM('Administrador', 'Usuário') NOT NULL,
    status ENUM('Ativo', 'Inativo') NOT NULL,
    UNIQUE (email),
    cep varchar(9) DEFAULT NULL,
    logradouro varchar(150) DEFAULT NULL,
    bairro varchar(100) DEFAULT NULL,
    cidade varchar(100) DEFAULT NULL,
    numero varchar(6) DEFAULT NULL,
    uf char(2) DEFAULT NULL
);

Insert into usuario
VALUES (null, 'Adm', '12345678912', '2004-03-12', 'adm@gmail.com', '$2y$10$Mhr9MVrbBi0r8Gnp56BAsO9EdyOoLQLwu2gHyN5VLhITeIxWQxeKO', 'Administrador', 'Ativo', '89239-000', 'Rua Eugenio Ernesto Kunde', 'Pirabeiraba', 'Joinville', '348', 'SC' );
-- ALTER TABLE usuario
-- ADD COLUMN cep VARCHAR(9) NULL,
-- ADD COLUMN logradouro VARCHAR(150) NULL,
-- ADD COLUMN numero VARCHAR(10) NULL,
-- ADD COLUMN bairro VARCHAR(100) NULL,
-- ADD COLUMN cidade VARCHAR(100) NULL,
-- ADD COLUMN estado VARCHAR(2) NULL,
-- ADD COLUMN uf CHAR(2) NULL;