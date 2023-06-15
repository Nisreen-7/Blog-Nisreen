-- Active: 1685437711224@@127.0.0.1@3306@blog_nisreen

DROP Table if EXISTS commentaire ;

DROP Table if EXISTS article ;

DROP Table if EXISTS categorie ;

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
        prix INT NOT NULL,
        description VARCHAR(255),
        id_categorie INT,
        Foreign Key (id_categorie) REFERENCES categorie(id)
    );

CREATE Table
    commentaire (
        id INT PRIMARY KEY AUTO_INCREMENT,
        commentaire VARCHAR(255) NOT NULL,
        id_article int,
        Foreign Key (id_article) REFERENCES article(id)
    );

INSERT INTO commentaire
VALUES (1, 'super', 1), (2, 'parfaite', 1), (3, 'super', 2), (4, 'bon et simple', 2), (5, 'j\'ame bien', 3), (6, 'superbre', 3), (7, 'sympa', 4), (8, 'pratique et coloré', 5), (9, 'magnifique', 6), (10, 'bon pour les enfants', 7), (11, 'elegant', 8), (12, 'pas mal', 2), (13, 'trés joli', 4), (14, 'trés joli', 4), (15, 'trés joli', 4), (16, 'parfaite', 4), (17, 'parfaite', 4), (18, 'parfaite', 4);

INSERT INTO article
VALUES (
        1,
        'Tricycle',
        'https://m.media-amazon.com/images/I/71L2af1B8SL._AC_SL1500_.jpg',
        30,
        ' Premier Velo Bébé Draisienne pour les enfants 1-3 ans |Tricycle Evolutif sans pédales',
        1
    ), (
        2,
        'Tunnel',
        'https://m.media-amazon.com/images/I/71LoLa3mm1L._AC_SL1500_.jpg',
        20,
        'NUBUNI Tunnel Enfant 180 cm. : Parc Bebe Pliable : Tente Pop Up : Kids Toys Jeux Enfant : Jeux Bebe : Jeu Enfant : Aire de Juex Exterieur A',
        1
    ), (
        3,
        'Porteur',
        'https://m.media-amazon.com/images/I/71CfHX2EO8L._AC_SX425_.jpg',
        50,
        'Porteur bebe convertible en draisienne, trotteur évolutif 2 en 1 avec siège ajustable pour enfants de 1 à 3 ans, roues silencieuses pour jouer à l\'intérieur et l\'extérieur, rose',
        1
    ), (
        4,
        'Toboggan des boules',
        'https://www.natureetdecouvertes.com/fstrz/r/s/cache.natureetdecouvertes.com/Medias/Images/Articles/97065990/4013594538046-toboggan-boules-et-xylophone_P1.jpg?width=610&height=610&frz-v=600',
        70,
        'Toboggan des boules avec xylophone',
        2
    ), (
        5,
        'Chicco Dindolino',
        'https://m.media-amazon.com/images/I/41l4KMGhfDL._AC_SL1000_.jpg',
        50,
        'Chicco DindolinoJouets Ecoiffier - 846 - Sac demi-lune et ses briques à empiler Abrick – Jeu de construction pour enfants – 100 pièces – Dès 18 mois – Fabriqué en France ',
        2
    ), (
        6,
        'Boites à forme',
        'https://m.media-amazon.com/images/I/61wemOSBAqL._AC_SL1500_.jpg',
        75,
        'Cube De Tri De Formes, Jouets d\'éveil et 1er âge,Jouets de développement en bois pour enfants, Trieur de formes pour enfants, Cadeau pour garçons et filles de 2 3 4 5 ans',
        2
    ), (
        7,
        'LEGO',
        'https://m.media-amazon.com/images/I/616+XuGZXrL._AC_SY450_.jpg',
        65,
        'Jouets Ecoiffier - 846 - Sac demi-lune et ses briques à empiler Abrick – Jeu de construction pour enfants – 100 pièces – Dès 18 mois – Fabriqué en France',
        3
    ), (
        8,
        'LEGO-BRIKS',
        'https://m.media-amazon.com/images/I/81AO134FghL._AC_SL1500_.jpg',
        90,
        'Strictly Briks - Ensemble de Construction de Tour Big Briks - de qualité - pour Grosses Briques - pour Construire Une Tour - Compatible avec Les Grandes Marques - Bleu, Vert, Rouge, Jaune',
        3
    ), (
        9,
        'Puzzle Enfant',
        'https://m.media-amazon.com/images/I/81v0OszRTKL._AC_SX425_.jpg',
        15,
        'Ravensburger - Puzzle Enfant - Puzzles 2x24 p - Chiens héroïques - Pat\'Patrouille - Dès 4 ans - 09064',
        3
    ), (
        10,
        'Monopoli',
        'https://img.freepik.com/photos-premium/family-ludo-desk-jeu-societe-bois-gros-plan-fond-blanc-rendu-3d_476612-14836.jpg',
        10,
        'Lorem ipsum doliasfuidem laboriosam minus quis accusamus non molestias sunt, eius aperiam perspiciatis. Qui, distinctio voluptatum.',
        1
    ), (
        11,
        'Echec',
        'https://www.cambronne-les-clermont.fr/medias/images/jeux.jpg',
        50,
        'Lorem ipsum doliasfuidem laboriosam minus quis accusamus non molestias sunt, eius aperiam perspiciatis. Qui, distinctio voluptatum.',
        4
    ), (
        12,
        'test',
        'https://www.cambronne-les-clermont.fr/medias/images/jeux.jpg',
        9,
        'test',
        2
    ), (
        13,
        'test2',
        'test2',
        50,
        'test2',
        4
    );

INSERT INTO categorie
VALUES (1, 'Jeux de motricité'), (2, 'Jeux de manipulation'), (3, 'Les jeux d\'assemblage'), (4, 'Jeux educatifs'), (5, 'test'), (6, 'CatTest');