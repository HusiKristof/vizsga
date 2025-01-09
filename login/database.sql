create database vizsga

create table users(
    id int primary key,
    email varchar(255),
    name varchar(255),
    password varchar(255)
)