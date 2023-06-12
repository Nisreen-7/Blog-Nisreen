-- Active: 1685437711224@@127.0.0.1@3306@blog_nisreen
DROP Table if EXISTS categorie ;

DROP Table if EXISTS article ;

DROP Table if EXISTS commentaire ;

CREATE Table
    categorie (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL
    );

CREATE Table
    article (
        id INT PRIMARY KEY AUTO_INCREMENT,
        label VARCHAR(255) NOT NULL,
        image VARCHAR(255),
        prix FLOAT NOT NULL,
        description VARCHAR(255),
        id_categorie INT,
        Foreign Key (id_categorie) REFERENCES categorie(id)
    );
    select * from article;

CREATE Table
    commentaire (
        id INT PRIMARY KEY AUTO_INCREMENT,
        commentaire VARCHAR(255) NOT NULL,
        id_article int,
        Foreign Key (id_article) REFERENCES article(id)
    );