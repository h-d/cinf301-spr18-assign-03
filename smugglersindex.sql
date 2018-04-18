create database if not exists smugglersindex;
use smugglersindex;

drop table if exists orders_ships;
drop table if exists orders;
drop table if exists ships;
drop table if exists customers;
drop table if exists stores;
drop table if exists sellers;
drop table if exists manufacturers;
drop table if exists planets;

create table planets
(
  id int not null primary key auto_increment,
  name varchar(40),
  system varchar(40),
  affiliation varchar(40)
);


create table manufacturers
(
  id int not null primary key auto_increment,
  name varchar(40),
  ceo varchar(40),
  affiliation varchar(40),
  planet_id int,
  foreign key (planet_id) references planets (id)
);


create table ships
( id int not null primary key auto_increment,
  model varchar(25),
  type varchar(25),
  length decimal (10, 2),
  speed int,
  price decimal(15,2),
  quantity int,
  manufacturer_id int,
  planet_id int,
  foreign key (manufacturer_id) references manufacturers (id),
  foreign key (planet_id) references planets (id)
);

create table customers
( id int not null primary key auto_increment,
  name varchar(25),
  species varchar(25),
  affiliation varchar(45),
  occupation varchar(25),
  trust BOOL
);

create table orders
( id int not null primary key auto_increment,
  cost_total decimal(20,2),
  ship_method varchar(20),
  order_status varchar(25),
  customer_id int,
  foreign key (customer_id) references customers (id)
);

create table orders_ships
( order_id int not null references orders(id),
  ship_id int not null references ships (id),
  quantity int not null,
  primary key(order_id, ship_id)
);

create table sellers
(
  id int not null primary key auto_increment,
  name varchar(40),
  species varchar(40),
  affiliation varchar(40),
  alive bool
);



create table stores
(
  id int not null primary key auto_increment,
  name varchar(40),
  planet_id int,
  seller_id int,
  foreign key (seller_id) references sellers (id),
  foreign key (planet_id) references planets (id)
);


