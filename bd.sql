CREATE DATABASE taxi_frota;
USE taxi_frota;

-- Usuários do sistema
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255)
);

-- Motoristas
CREATE TABLE motoristas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(20) UNIQUE,
    cnh VARCHAR(20),
    telefone VARCHAR(20)
);

-- Veículos
CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100),
    placa VARCHAR(10) UNIQUE,
    ano INT,
    status ENUM('ativo','inativo')
);

-- Viagens
CREATE TABLE viagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    motorista_id INT,
    veiculo_id INT,
    data_viagem DATE,
    origem VARCHAR(255),
    destino VARCHAR(255),
    valor DECIMAL(10,2),
    FOREIGN KEY (motorista_id) REFERENCES motoristas(id),
    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);

drop table viagens;

CREATE TABLE viagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    motorista_id INT NOT NULL,
    veiculo_id INT NOT NULL,
    data_viagem DATE NOT NULL,
    origem VARCHAR(255) NOT NULL,
    destino VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,

    FOREIGN KEY (motorista_id) REFERENCES motoristas(id) ON DELETE CASCADE,
    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id) ON DELETE CASCADE
);


