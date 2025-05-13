

CREATE DATABASE catalogojapi_db

USE CatalogoJapidb

CREATE TABLE Usuario(
    UserID int(4) PRIMARY KEY AUTO IDENTITY , 
    Senha varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    NomeCompleto varchar(50) NOT NULL,
    NomeUsuario NOT NULL
);


CREATE TABLE Cientista


/*
char
varchar
int
data
datatime
time

5   #####
10  ##########
15  ###############
20  ####################
50  ##################################################


*/