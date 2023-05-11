DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS usrlog;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT,
    tipo            INTEGER,
    ativado         INTEGER
);

INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (2,'teste 2','01-01-2001',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (3,'teste 3','01-01-2003',1,1);

CREATE TABLE IF NOT EXISTS usrlog (
    id              INTEGER PRIMARY KEY,
    nome            TEXT,
    email           TEXT,
    senha           TEXT

);

INSERT INTO usrlog (id, nome, email, senha) values (5,'teste 1','01-01-2000','1');