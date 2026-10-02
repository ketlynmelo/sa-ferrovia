CREATE DATABASE situação_aprendizagem

USE situação_aprendizagem;


CREATE TABLE trem (
    id_Trem INT PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    nome_trem VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    carga VARCHAR(50) NOT NULL,
    velocidade VARCHAR(45) NOT NULL
);


CREATE TABLE sensor (
    id_Sensor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_sensor VARCHAR(45) NOT NULL,
    localizacao VARCHAR(45) NOT NULL,
    tipo_dado ENUM('Velocidade', 'Temperatura', 'Falha', 'Vibração') NOT NULL   
);

CREATE TABLE relatorio (
    id_Relatorio INT PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_geracao DATETIME NOT NULL
);


CREATE TABLE rota (
    id_Rota INT PRIMARY KEY NOT NULL,
    nome_rota VARCHAR(45) NOT NULL,
    horario_rota VARCHAR(45) NOT NULL,
    ponto_inicial VARCHAR(45) NOT NULL,
    ponto_final VARCHAR(45) NOT NULL,
    distancia VARCHAR(45) NOT NULL,
    sensor_id INT,
    FOREIGN KEY (sensor_id) REFERENCES sensor(id_Sensor)
    );


CREATE TABLE usuario (
    id_Usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo_conta ENUM('Administrador', 'Usuário') NOT NULL,
    status ENUM('Ativo', 'Inativo') NOT NULL,
    UNIQUE (email)
);