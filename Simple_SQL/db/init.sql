-- create database web_hacking;
use web_hacking;

create table users(idx int not null auto_increment, id varchar(24) not null, pw varchar(256) not null, name varchar(255), primary key(idx));

insert into users(id, pw, name) values ('admin','BS0MT72L1RUCC', 'admin'), ('guest', 'guest', 'guest');
