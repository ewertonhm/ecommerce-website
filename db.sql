CREATE DATABASE database;
CREATE TABLE usuarios(
    id AUTO INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(15),
    bdate DATE,
    celular VARCHAR(15),
    endereco VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    senha VARCHAR(32) NOT NULL,
);
INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES (NULL, 'Administrador', 'admin', MD5('123456'));







$nome = mysqli_escape_string($link, $_POST['nome']);
        $email = mysqli_escape_string($link, $_POST['email']);
        $cpf = mysqli_escape_string($link, $_POST['cpf']);
        $bdate = mysqli_escape_string($link, $_POST['bdate']);
        $celular = mysqli_escape_string($link, $_POST['celular']);
        $login = mysqli_escape_string($link, $_POST['login']);
        $senha = mysqli_escape_string($link, $_POST['senha']);