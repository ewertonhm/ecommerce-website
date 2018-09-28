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

CREATE TABLE genero(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL
);

CREATE TABLE artista(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE album(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    ano INT,
    capa TEXT,
    cod_artista INT REFERENCES artista(id),
    cod_genero INT REFERENCES genero(id)
);

CREATE TABLE faixa(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    posicao INT,
    duracao VARCHAR(25),
    cod_album INT REFERENCES album(id)
);

CREATE TABLE midia(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL
);

CREATE TABLE produto(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cod_album INT REFERENCES album(id),
    cod_midia INT REFERENCES midia(id),
    preco INT,
    qtd_estoque INT
);

CREATE TABLE compra (
	id SERIAL PRIMARY KEY,
	cod_usuaro INT NOT NULL REFERENCES usuarios(id),
	data_compra DATETIME DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE item_compra(
	cod_produto INT NOT NULL REFERENCES produto(id),
	cod_compra INT NOT NULL REFERENCES compra(id),
	qntd INT NOT NULL,
	valor FLOAT NOT NULL,
	CONSTRAINT pk_item PRIMARY KEY (cod_produto,cod_compra)
);

INSERT INTO usuarios (nome, login, senha, email, role) 
VALUES ('Administrador', 'admin', MD5('123456'), 'admin@local.com', 'ADM');

INSERT INTO dadosUsuarios(nome, cpf, datadenasc, telefone, celular, endereco, cidade, estado, cod_usuario)
VALUES ('Administrador', '000.000.000-00','01-01-2000', '(00)0000-0000','(00)00000-0000','Rua XXXXXXXXXX, Nº999','XXXXXXXXX XXXXXX','XXXXXXXX',1);

SELECT * FROM usuarios
INNER JOIN dadosUsuarios ON usuarios.id = dadosUsuarios.cod_usuario;