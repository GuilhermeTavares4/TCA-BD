CREATE DATABASE biblioteca;

\c biblioteca

create table usuarios(
    id serial primary key, 
    nome varchar(100) not null, 
    email varchar(200) not null, 
    senha varchar(100) not null,
    tipo int not null,
    check(tipo=0 or tipo=1)
);

create table livros(
    id serial primary key, 
    autores varchar(300) not null, 
    titulo varchar(80) not null, 
    imagem varchar(100) not null, 
    ano int not null, 
    editora varchar(100) not null, 
    usuario_id int, 
    quant int not null, 
    check(ano<3000), 
    check(quant>=0), 
    foreign key (usuario_id) references usuarios(id)
);
