CREATE DATABASE ESCOLA;

USE ESCOLA;

CREATE TABLE alunos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sexo CHAR(1) NOT NULL,
    bim1 FLOAT,
    bim2 FLOAT,
    bim3 FLOAT,
    bim4 FLOAT
);

INSERT INTO alunos (nome, sexo, bim1, bim2, bim3, bim4) VALUES
    ('Maria', 'F', 7.5, 8.0, 7.5, 8.5),
    ('João', 'M', 6.0, 7.5, 6.5, 7.0),
    ('Ana', 'F', 8.0, 8.5, 9.0, 8.5),
    ('Pedro', 'M', 5.5, 6.0, 5.0, 5.5),
    ('Sofia', 'F', 9.0, 9.5, 8.5, 9.0),
    ('Lucas', 'M', 7.0, 7.5, 7.0, 7.5),
    ('Juliana', 'F', 6.5, 7.0, 6.0, 6.5),
    ('Mateus', 'M', 8.5, 9.0, 8.5, 9.0),
    ('Laura', 'F', 5.0, 5.5, 4.5, 5.0),
    ('Gabriel', 'M', 7.5, 8.0, 7.5, 8.0),
    ('Camila', 'F', 6.0, 6.5, 6.0, 6.5),
    ('Mariana', 'F', 6.5, 7.0, 6.5, 7.0),
    ('Rafael', 'M', 8.0, 8.5, 8.0, 8.5),
    ('Fernanda', 'F', 7.0, 7.5, 7.0, 7.5),
    ('Rodrigo', 'M', 6.0, 6.5, 6.0, 6.5),
    ('Carolina', 'F', 8.5, 9.0, 8.5, 9.0),
    ('Paulo', 'M', 5.5, 6.0, 5.5, 6.0),
    ('Isabela', 'F', 6.0, 6.5, 6.0, 6.5),
    ('Thiago', 'M', 7.5, 8.0, 7.5, 8.0),
    ('Gabriela', 'F', 8.0, 8.5, 8.0, 8.5),
    ('Marcos', 'M', 6.5, 7.0, 6.5, 7.0),
    ('Luana', 'F', 5.5, 6.0, 5.5, 6.0),
    ('Diego', 'M', 7.0, 7.5, 7.0, 7.5),
    ('Amanda', 'F', 7.5, 8.0, 7.5, 8.0),
    ('Carlos', 'M', 6.0, 6.5, 6.0, 6.5),
    ('Larissa', 'F', 8.5, 9.0, 8.5, 9.0),
    ('Daniel', 'M', 5.0, 5.5, 5.0, 5.5),
    ('Julia', 'F', 6.5, 7.0, 6.5, 7.0),
    ('José', 'M', 7.0, 7.5, 7.0, 7.5),
    ('Luiza', 'F', 8.0, 8.5, 8.0, 8.5),
    ('Felipe', 'M', 6.0, 6.5, 6.0, 6.5),
    ('Natália', 'F', 7.5, 8.0, 7.5, 8.0),
    ('André', 'M', 8.5, 9.0, 8.5, 9.0),
    ('Tatiane', 'F', 5.5, 6.0, 5.5, 6.0),
    ('Bruno', 'M', 7.0, 7.5, 7.0, 7.5),
    ('Fernanda', 'F', 6.0, 6.5, 6.0, 6.5),
    ('Ricardo', 'M', 8.0, 8.5, 8.0, 8.5),
    ('Lívia', 'F', 7.5, 8.0, 7.5, 8.0),
    ('Vinícius', 'M', 5.0, 5.5, 5.0, 5.5),
    ('Roberta', 'F', 6.5, 7.0, 6.5, 7.0),
    ('Gustavo', 'M', 7.0, 7.5, 7.0, 7.5),
    ('Patrícia', 'F', 8.0, 8.5, 8.0, 8.5);

