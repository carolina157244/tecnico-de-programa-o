-- Cria o banco de dados (se ainda não existir)
CREATE DATABASE IF NOT EXISTS `salao_beleza`;

-- Usa o banco de dados criado
USE `salao_beleza`;

-- Tabela de Clientes
CREATE TABLE `clientes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `telefone` VARCHAR(20),
    `email` VARCHAR(100) UNIQUE,
    `data_cadastro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Serviços
CREATE TABLE `servicos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL UNIQUE,
    `preco` DECIMAL(10, 2) NOT NULL,
    `duracao_minutos` INT
);

-- Tabela de Agendamentos (Relaciona Clientes e Serviços)
CREATE TABLE `agendamentos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `cliente_id` INT NOT NULL,
    `servico_id` INT NOT NULL,
    `data_hora` DATETIME NOT NULL,
    `status` ENUM('Agendado', 'Confirmado', 'Cancelado', 'Concluído') DEFAULT 'Agendado',
    FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`servico_id`) REFERENCES `servicos`(`id`) ON DELETE RESTRICT
);