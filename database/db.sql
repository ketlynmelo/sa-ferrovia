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
    tipo_dado VARCHAR(45) NOT NULL,
    Trem_id_Trem INT NOT NULL,   
);



CREATE TABLE dados_sensor (
    id_dado INT NOT NULL AUTO_INCREMENT,
    valor DECIMAL(10,2) NOT NULL,
    data_hora DATETIME NOT NULL,
    Sensor_id_Sensor INT NOT NULL,  
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
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(45) NOT NULL,
    tipo_conta VARCHAR(45) NOT NULL,
    status VARCHAR(45) NOT NULL,
    ultimo_acesso VARCHAR(45) NOT NULL,
    Perfil_id_Perfil INT NOT NULL,
);