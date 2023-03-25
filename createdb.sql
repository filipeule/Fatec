CREATE DATABASE lp2noite2023;

USE lp2noite2023;

CREATE TABLE cornos (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  nome varchar(100) NOT NULL,
  email varchar(300) NOT NULL,
  senha varchar(20) NOT NULL,
  cpf varchar(14) NOT NULL,
  telefone varchar(11) NOT NULL
);

CREATE TABLE tbStatus (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(50) NOT NULL
);

CREATE TABLE tbcursos (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(200) NOT NULL,
    nivel int(11) NOT NULL,
    faixaetariaminima int(11) NOT NULL,
    faixaetariamaxima int(11) NOT NULL,
    status int(11) NOT NULL
    );

CREATE TABLE tblocais (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(200) NOT NULL,
    endereco text NOT NULL,
    telefone varchar(20) NOT NULL,
    responsavel varchar(100) NOT NULL
    );