create database Emergency;

use Emergency;

create table backend(
	id int(11) auto_increment not null,
    name varchar(60) not null,
    phone varchar(20) unique,
    email varchar(40) unique,
    password varchar(255),
    primary key(id)
);

create table users(
	id int(11) auto_increment not null,
    name varchar(60) not null,
    gender enum('Male','Female'),
    phone varchar(20) unique,
    email varchar(40) unique,
    password varchar(255),
    emergencyName varchar(60),
    emergencyNumber varchar(20),
    primary key(id)
);

create table emergency(
	id int auto_increment not null,
    reporterNumber varchar(20) not null,
    type enum('Fire', 'Health', 'Robbery', 'Flood', 'Other', 'Accident'),
    recipient varchar(60),
    message text,
    locationLatitude varchar(20),
    locationLongitude varchar(20),
    image blob,
    primary key(id),
    foreign key(reporterNumber) references users(phone)
);

create table activity(
	id int(11) auto_increment not null,
    time timestamp,
    userId int,
    error varchar(60),
    primary key(id),
    foreign key(userId) references users(id)
);


insert into users(name, gender, phone, email, password, emergencyName, emergencyNumber) values
('Elvis Okoh-Asirifi', 'Male', '0248260286', 'elvis@gmail.com', '123456', 'Sarah Amoh', '0542573522');

insert into emergency(reporterNumber, type, message, locationLatitude, locationLongitude) values
('0248260286', 'Fire', 'Hello World', '5.2', '-0.21');

SELECT * from emergency where type in ('fire');