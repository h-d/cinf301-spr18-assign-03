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
  hq varchar(40),
  planet_id int,
  foreign key (planet_id) references planets (id)
);


create table ships
( id int not null primary key auto_increment,
  model varchar(25),
  ship_class varchar(25),
  length decimal (10, 2),
  hyperdrive_class int,
  price decimal(15,2),
  quantity int,
  manufacturer varchar(40),
  planet varchar(40),
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
  trust bool
);
create table orders
( id int not null primary key auto_increment,
  cost_total decimal(20,2),
  shipping_method varchar(40),
  order_status varchar(25),
  customer varchar(40),
  customer_id int,
  orders_ships_id int,
  foreign key (customer_id) references customers (id)
);
create table orders_ships
( order_id int not null auto_increment,
  ship_name varchar(40),
  ship_id int,
  customer varchar(40),
  quantity int not null,
  customer_id int,
  foreign key (customer_id) references customers (id),
  primary key (order_id)
);

create table sellers
(
  id int not null primary key auto_increment,
  name varchar(40),
  species varchar(40),
  affiliation varchar(40),
  alive bool,
  store_id int
);



create table stores
(
  id int not null primary key auto_increment,
  name varchar(40),
  location varchar(40),
  planet varchar(40),
  owner varchar(40),
  planet_id int,
  seller_id int,
  foreign key (seller_id) references sellers (id),
  foreign key (planet_id) references planets (id)
);


