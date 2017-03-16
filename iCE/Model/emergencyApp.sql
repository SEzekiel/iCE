create database Emergency;

use Emergency;

create table users(
	id int auto_increment,
    name varchar(60) not null,
    phone varchar(20) unique,
    email varchar(20) unique,
    password varchar(255),
    primary key(id)
);

create table emergencyOfficial(
	id int auto_increment,
    name varchar(60) not null,
    gender enum('Male','Female'),
    phone varchar(20) unique,
    email varchar(20) unique,
    password varchar(255),
    emergencyName varchar(60),
    emergencyNumber varchar(20),
    primary key(id)
);

create table emergency(
	id int auto_increment,
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
	id int auto_increment not null,
    time timestamp,
    userId int,
    error varchar(60),
    primary key(id),
    foreign key(userId) references users(id)
);


