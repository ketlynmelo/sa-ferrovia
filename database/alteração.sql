-- Execute no banco utilizado pela aplicacao.
-- Cria sensor e rota em instalacoes incompletas sem substituir tabelas existentes.

CREATE TABLE IF NOT EXISTS sensor (
    id_Sensor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_sensor VARCHAR(45) NOT NULL,
    localizacao VARCHAR(45) NOT NULL,
    tipo_dado ENUM('Velocidade', 'Temperatura', 'Falha', 'Vibração', 'Localização', 'Proximidade') NOT NULL
);

CREATE TABLE IF NOT EXISTS rota (
    id_Rota INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_rota VARCHAR(45) NOT NULL,
    horario_rota VARCHAR(45) NOT NULL,
    ponto_inicial VARCHAR(45) NOT NULL,
    ponto_final VARCHAR(45) NOT NULL,
    distancia VARCHAR(45) NOT NULL,
    trem_id INT NULL,
    CONSTRAINT fk_rota_trem FOREIGN KEY (trem_id) REFERENCES trem(id_Trem),
    sensor_id INT,
    FOREIGN KEY (sensor_id) REFERENCES sensor(id_Sensor)
);

-- Remove o vinculo legado quando presente (MariaDB do XAMPP).
ALTER TABLE sensor
    DROP FOREIGN KEY IF EXISTS fk_sensor_trem,
    DROP COLUMN IF EXISTS Trem_id_Trem;
