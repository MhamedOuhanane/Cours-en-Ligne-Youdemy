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
    description text NULL,
    cours_contenu text NOT NULL,
    id_user int NOT NULL,
    id_catalogue int NOT NULL,
    FOREIGN KEY (id_catalogue) REFERENCES catalogues(id_catalogue) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);

ALTER TABLE cours 
ADD createDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER cours_contenu;

CREATE TABLE tags(
    id_tag int PRIMARY KEY AUTO_INCREMENT,
    tag_Titre varchar(225) NOT NULL
);


CREATE TABLE tagCours(
    id_tag int NOT NULL,
    id_cour int NOT NULL,
    FOREIGN KEY (id_cour) REFERENCES cours(id_cour) on DELETE CASCADE,
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag) on DELETE CASCADE
);


CREATE TABLE inscriptionCours(
    id_inscription int PRIMARY KEY AUTO_INCREMENT,
    date_inscret datetime DEFAULT CURRENT_TIMESTAMP,
    id_user int NOT null,
    id_cour int NOT null, 
    FOREIGN KEY (id_cour) REFERENCES cours(id_cour) on DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) on DELETE CASCADE
);

CREATE VIEW listecours AS 
SELECT c.* ,g.catalogue_titre, g.catalogue_contenu, u.username, u.image, t.*
FROM cours c
JOIN catalogues g ON c.id_catalogue = g.id_catalogue
JOIN users u ON u.id_user = c.id_user 
JOIN tagcours tc ON tc.id_cour = c.id_cour
left JOIN tags t ON t.id_tag = tc.id_tag;

ALTER TABLE cours
CHANGE desctiption description text NOT NULL,
ADD imageCours longblob NOT  NULL AFTER description;