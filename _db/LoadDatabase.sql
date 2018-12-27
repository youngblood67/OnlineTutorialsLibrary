INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `link`, `author`) VALUES (NULL, 'La POO en PHP (1/31) : Présentation', '2284', '0', 'Présentation de la formation', 'https://www.youtube.com/watch?v=r_NiFqLvfsc&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16&index=1', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `link`, `author`) VALUES (NULL, 'La POO en PHP (2/31) : Les objets, c''est quoi ?', '432', '0', 'Introduction aux objets', 'https://www.youtube.com/watch?v=cD2o7YudR3k&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16&index=2', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `link`, `author`) VALUES (NULL, 'La POO en PHP (3/31) : Notre première class', '1277', '0', 'Explication du concept de classe', 'https://www.youtube.com/watch?v=xmoOvoiPNhU&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16&index=3', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `link`, `author`) VALUES (NULL, 'La POO en PHP (4/31) : La visibilité public / private', '419', '0', 'Explication du concept de visibilité', 'https://www.youtube.com/watch?v=zZ_tVAPfGAA&index=4&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16', 'Grafikart');
INSERT INTO `video` (`idVideo`, `title`, `duration`, `price`, `description`, `link`, `author`) VALUES (NULL, 'La POO en PHP (5/31) : Un exemple concret : Form', '674', '0', 'Exemple : création d''un formulaire en utilisant le concept de la programmation orientée objet', 'https://www.youtube.com/watch?v=rTGmcdFAWqw&index=5&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16', 'Grafikart');

INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'PHP');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'Programmation');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'POO');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'informatique');
INSERT INTO `tag` (`idTag`, `title`) VALUES (NULL, 'développement');

INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('1', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('2', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('3', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('4', '5');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('5', '1');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('5', '2');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('5', '3');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('5', '4');
INSERT INTO `video_tag` (`idTag`, `idVideo`) VALUES ('5', '5');

INSERT INTO `theme` (`idTheme`, `title`, `description`) VALUES (NULL, 'Informatique', NULL);

INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('1', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('2', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('3', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('4', '1');
INSERT INTO `video_theme` (`idVideo`, `idTheme`) VALUES ('5', '1');