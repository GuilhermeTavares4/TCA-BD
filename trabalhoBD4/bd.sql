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
    quant int not null, 
    check(ano<3000), 
    check(quant>=0), 
);

create table usuario_livro (
    usuario_id int not null references usuarios(id) on delete cascade,
    livro_id int not null references livros(id) on delete cascade,
    constraint pkey primary key (usuario_id, livro_id)
);



insert into livros (autores, titulo, imagem, ano, editora, usuario_id, quant) values(
    'guidiimestre', 'porra', './uploads/bucktooth.jpg', 2021, 'felipe', 4 
);

insert into livros (autores, titulo, imagem, ano, editora, usuario_id, quant) values(
    'fegasop', 'porra 2', './uploads/terraria.jpeg', 2011, 'guilherme', 10000000
);

insert into livros (autores, titulo, imagem, ano, editora, quant) values(
    'briao', 'traumas da guerra', './uploads/zazu.jpeg', 2005, 'testa reluzente', 3
);

insert into usuario_livro (usuario_id, livro_id) values 
    (5,1), 
    (5,2);
