TRUNCATE TABLE tag;
TRUNCATE TABLE video_tag;
TRUNCATE TABLE theme;
TRUNCATE TABLE video_theme;
TRUNCATE TABLE video;

/********************************* VIDEOS **************************************/

/* videos Youtube PHP*/
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (1/31) : Présentation', '78', '0', 'Présentation de la formation', 'https://www.youtube.com/embed/r_NiFqLvfsc', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (2/31) : Les objets, c''est quoi ?', '433', '0', '...', 'https://www.youtube.com/embed/cD2o7YudR3k', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (3/31) : Notre première classe', '1277', '0', '...', 'https://www.youtube.com/embed/xmoOvoiPNhU', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (4/31) : La visibilité public / private', '420', '0', '...', 'https://www.youtube.com/embed/zZ_tVAPfGAA', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (5/31) : Un exemple concret : Form', '675', '0', '...', 'https://www.youtube.com/embed/rTGmcdFAWqw', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (6/31) : Bien documenter ses classes', '302', '0', '...', 'https://www.youtube.com/embed/KAL1vJtHces', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (7/31) : Propriétés et Méthodes statiques', '640', '0', '...', 'https://www.youtube.com/embed/KAL1vJtHces', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (8/31) : L''héritage', '452', '0', '...', 'https://www.youtube.com/embed/ccuoGgWz5Do', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (9/31) : Exemple d''héritage', '329', '0', '...', 'https://www.youtube.com/embed/GCjDC5-a8fM', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (10/31) : L''autoloading', '382', '0', '...', 'https://www.youtube.com/embed/BzJltEYYbMo', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (11/31) : Les namespaces', '904', '0', '...', 'https://www.youtube.com/embed/dV4jgx5b4gk', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (12/31) : TP : La structure', '700', '0', '...', 'https://www.youtube.com/embed/sqiP39cH5K4', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (13/31) : TP : Connexion à la base de donnée', '2284', '0', '...', 'https://www.youtube.com/embed/weE2adYHPG0', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (14/31) : TP : Création des classes Table', '2344', '0', '...', 'https://www.youtube.com/embed/3pACUHqop9U', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'La POO en PHP (15/31) : TP : Problèmes d''organisation', '119', '0', '...', 'https://www.youtube.com/embed/8ylOLaKPkB8', 'Grafikart');

/* videos Youtube JAVASCRIPT*/

INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'COURS COMPLET JAVASCRIPT [1/65] - Présentation du cours JavaScript', '108', '0', 'Présentation de la formation', 'https://www.youtube.com/embed/VZLflMqC6dI', 'Pierre Giraud');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'COURS COMPLET JAVASCRIPT [2/65] - Introduction au JavaScript', '200', '0', '...', 'https://www.youtube.com/embed/lDO14MA0C_o', 'Pierre Giraud');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'COURS COMPLET JAVASCRIPT [3/65] - Environnement de travail', '92', '0', '...', 'https://www.youtube.com/embed/dNIJUmjZeMI', 'Pierre Giraud');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'COURS COMPLET JAVASCRIPT [4/65] - Où écrire le code JavaScript', '576', '0', '...', 'https://www.youtube.com/embed/gpdierJ5-kw', 'Pierre Giraud');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `url`, `author`) VALUES (NULL, 'COURS COMPLET JAVASCRIPT [5/65] - Syntaxe, indentation et commentaires', '450', '0', '...', 'https://www.youtube.com/embed/AtUwagcoDL8', 'Pierre Giraud');

/*********************************** TAG *****************************************/

INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'prog');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'objet');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'poo');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'php');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'javascript');


/************************************ VIDEO_TAG ************************************/

/* videos Youtube PHP*/
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '6');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '7');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '8');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '9');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '10');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '11');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '12');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '13');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '14');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '15');

INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '6');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '7');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '8');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '9');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '10');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '11');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '12');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '13');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '14');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '15');

INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '6');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '7');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '8');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '9');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '10');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '11');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '12');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '13');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '14');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '15');

INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '6');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '7');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '8');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '9');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '10');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '11');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '12');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '13');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '14');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '15');

/* videos Youtube JAVASCRIPT*/

/**************************************** THEME *********************************/

INSERT INTO `theme` (`idTheme`, `title`, `description`) VALUES (NULL, 'PHP', NULL);
INSERT INTO `theme` (`idTheme`, `title`, `description`) VALUES (NULL, 'JAVASCRIPT', NULL);

/**************************************** VIDEO_THEME **************************************/

INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('1', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('2', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('3', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('4', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('5', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('6', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('7', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('8', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('9', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('10', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('11', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('12', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('13', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('14', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('15', '1');