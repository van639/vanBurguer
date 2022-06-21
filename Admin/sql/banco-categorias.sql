create database dbcategoria;


show databases;

use dbcategoria;

create table tblcategorias
(
idcategorias int not null auto_increment primary key,

    tipo varchar(45) not null,
    unique index (idcategorias)
);


desc tblcategorias;

show tables;

select * from tblcategorias;

create table tblusuario(
	idusuario int not null auto_increment primary key,
    nome varchar (80)not null,
    nomeUsuario varchar (30) not null,
    senha varchar (30) not null,
    unique index (idusuario)
);

 alter table tblusuario
	modify column senha varchar(40) not null;
    
desc tblusuario;

select * from tblusuario;

create table tblcontatos(
	idcontatos int not null auto_increment primary key,
    nome varchar (45) not null,
	email varchar (45) not null,
    numero int not null,
    unique index (idcontatos)
);

select * from tblprodutos;
describe tblcontatos;

insert into tblcontatos ( nome, email, numero ) values ( 'Xerlok Hormis', 'XitaunzinhoxoraPiao@hotmail.com', '(23)9807805' );

alter table tblcontatos
	modify column numero varchar(20) not null;

create table tblprodutos(
	idprodutos int not null auto_increment primary key,
    nome varchar (45) not null,
    preco double not null,
    desconto double,
    descricao varchar (200) not null,
    destaque bit default 0,
    idcategorias int not null,
    saibamais text,
    
   constraint FK_Categorias_Produtos
    foreign key (idcategorias) 
    references tblcategorias (idcategorias),
    
    unique index (idprodutos)
);


drop table tblprodutos;
drop table tblcategorias;
select * from tblprodutos;
select * from tblcategorias;
desc tblprodutos;
 insert into tblprodutos( nome, preco, desconto, descricao, destaque, idcategorias, saibamais ) values ( 'vegetariano', '2309', '565', 'salada', 1, '3', 'vcn v vbnvbnv' );
 use dbcategoria;

Alter table tblprodutos
add column foto varchar(60) not null;


delete from tblprodutos where foto; 

select tblprodutos.*, tblcategorias.nome from tblprodutos inner join tblcategorias on tblcategorias.idcategorias = tblprodutos.idcategorias where tblprodutos.idprodutos = 4;