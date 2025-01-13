CREATE DATABASE Youdemy

CREATE TABLE roles(
    id_role int PRIMARY KEY AUTO_INCREMENT,
    role varchar(50) NOT NULL
);

CREATE TABLE users(
	id_user int PRIMARY KEY AUTO_INCREMENT,
    username varchar(225) NOT NULL,
    email varchar(225) NOT NULL,
    ville varchar(225) NOT NULL,
    telephone int(13) NOT null,
    image longBlob NULL,
    password varchar(225) NOT NULL,
    id_role int NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles(id_role) ON DELETE CASCADE
);

ALTER TABLE users
ADD status ENUM('Active', 'Suspendu') DEFAULT 'Suspendu' AFTER password;

CREATE TABLE catalogues(
    id_catalogue int PRIMARY KEY AUTO_INCREMENT,
    catalogue_titre varchar(225) NOT NULL,
    catalogue_contenu varchar(225) NOT NULL,
    catalogue_image longBlob NOT NULL
);

CREATE TABLE cours(
    id_cour int PRIMARY KEY AUTO_INCREMENT,
    cours_titre varchar(225) NOT NULL,
    cours_contenu varchar(225) NOT NULL,
    video text NULL,
    id_user int NOT NULL,
    id_catalogue int NOT NULL,
    FOREIGN KEY (id_catalogue) REFERENCES catalogues(id_catalogue) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);
