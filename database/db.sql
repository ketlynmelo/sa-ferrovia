CREATE DATABASE situação_aprendizagem

USE situação_aprendizagem;


CREATE TABLE trem (
    id_Trem INT NOT NULL AUTO_INCREMENT,
    nome_trem VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    carga VARCHAR(45) NOT NULL,
    velocidade VARCHAR(45) NOT NULL,
);


CREATE TABLE sensor (
    id_Sensor INT NOT NULL AUTO_INCREMENT,
    nome_sensor VARCHAR(45) NOT NULL,
    localização VARCHAR(45) NOT NULL,
    tipo_dado ENUM('Velocidade', 'Temperatura', 'Falha', 'Vibração') NOT NULL,
    Trem_id_Trem INT NOT NULL,   
);

CREATE TABLE relatorio (
    id_Relatorio INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_geracao DATETIME NOT NULL,
);


CREATE TABLE rota (
    id_Rota INT NOT NULL,
    nome_rota VARCHAR(45) NOT NULL,
    horario_rota VARCHAR(45) NOT NULL,
    ponto_inicial VARCHAR(45) NOT NULL,
    ponto_final VARCHAR(45) NOT NULL,
);


CREATE TABLE usuario (
    id_Usuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo_conta ENUM('Administrador', 'Usuário') NOT NULL,
    status ENUM('Ativo', 'Inativo') NOT NULL,
    ultimo_acesso DATETIME NULL,
    PRIMARY KEY (id_Usuario),
    UNIQUE (email)
);