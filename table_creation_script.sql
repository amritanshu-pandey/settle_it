use studies;
drop table users;
create table users(
id integer primary key auto_increment,
name varchar(100),
gender varchar(1),
email varchar(100),
mobile numeric);



