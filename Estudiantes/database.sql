
CREATE DATABASE campusv2;

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    direccion VARCHAR (50),
    logros VARCHAR (60),
    ser VARCHAR (50),
    skill VARCHAR (50),
    review VARCHAR (50),
    ingles VARCHAR (50)
);  

DROP TABLE campers;
DROP TABLE users;
CREATE TABLE users(
    id INT primary key AUTO_INCREMENT,
    idCamper INT NOT NULL,
    email VARCHAR (80) NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    FOREIGN KEY (idCamper) REFERENCES campers(id)
);

