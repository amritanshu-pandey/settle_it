use studies;
drop table users;
create table users(
id integer primary key auto_increment,
name varchar(100),
gender varchar(1),
email varchar(100),
mobile numeric);

create table groups(
gid integer primary key auto_increment,
gname varchar(100)
);

create table group_members(
gid integer references groups(gid),
mid integer references users(id),
active boolean);



