Drop DATABASE Coral;

create database if not exists Coral;
grant all privileges on Coral.* to 'root'@'localhost'
identified by 'root';
use Coral;

create table corals
(
	name varchar(30)
	price integer(20)
);

create table clients
(
	name varchar(25)
);

insert into clients values ('anne');
