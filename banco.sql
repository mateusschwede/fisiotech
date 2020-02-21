CREATE DATABASE fisiotech CHARSET = 'utf8';
USE fisiotech;

CREATE TABLE fisioterapeuta (
    crefito BIGINT NOT NULL,
    nome VARCHAR(70) NOT NULL,
    senha VARCHAR(5) NOT NULL,
    PRIMARY KEY(crefito)
) CHARSET = 'utf8';

CREATE TABLE paciente (
    cpf BIGINT NOT NULL,
    nome VARCHAR(70) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(cpf)
) CHARSET = 'utf8';

CREATE TABLE sessao (
    id INTEGER NOT NULL AUTO_INCREMENT,
    crefito BIGINT NOT NULL,
    cpf BIGINT NOT NULL,
    inicio DATETIME NOT NULL,
    termino DATETIME NOT NULL,
    realizada BOOLEAN NOT NULL DEFAULT false,
    cancelada BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY(id),
    FOREIGN KEY(crefito) REFERENCES fisioterapeuta(crefito),
    FOREIGN KEY(cpf) REFERENCES paciente(cpf)
) CHARSET = 'utf8';

INSERT INTO fisioterapeuta(crefito,nome,senha) VALUES
(12345,"mateus","123"),
(12346,"mateus2","1234"),
(12347,"mateus3","1235");

INSERT INTO paciente(cpf,nome) VALUES
(12345678909,"max"),
(12345678900,"max2"),
(12345678910,"max3");