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

create table transactions(
tran_id integer primary key auto_increment,
tran_date date not null,
description varchar(1000) not null,
lender integer not null references users(id),
borrower integer  not null references users(id),
is_borrower_group boolean not null
);

create table tran_splits_indiv(
tid integer not null references transactions(tran_id),
p_tid integer primary key auto_increment,
borrower integer not null references users(id),
paid boolean not null);

create table tran_splits_group(
tid integer not null references transactions(tran_id),
g_tid integer primary key auto_increment,
borrower integer not null references groups(gid),
paid boolean not null);
