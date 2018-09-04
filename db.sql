CREATE DATABASE database;
CREATE TABLE usuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(32) NOT NULL
);

CREATE TABLE dadosUsuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    datadenasc DATE,
    telefone VARCHAR(15),
    celular VARCHAR(15),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cod_usuario INT REFERENCES usuarios(id)
);

INSERT INTO usuarios (nome, login, senha, email, role) 
VALUES ('Administrador', 'admin', MD5('123456'), 'admin@local.com', 'ADM');

INSERT INTO dadosUsuarios(nome, cpf, datadenasc, telefone, celular, endereco, cidade, estado, cod_usuario)
VALUES ('Administrador', '000.000.000-00','01-01-2000', '(00)0000-0000','(00)00000-0000','Rua XXXXXXXXXX, Nº999','XXXXXXXXX XXXXXX','XXXXXXXX',1);

SELECT * FROM usuarios
INNER JOIN dadosUsuarios ON usuarios.id = dadosUsuarios.cod_usuario;