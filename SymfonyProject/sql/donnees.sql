INSERT INTO site_sandrine_coupart_nutritionniste.web_content
(title, content)
VALUES
-- 1
("Qui suis-je ?",
"Diététicienne-nutritionniste diplômée de l’Institut de Commerce et de Gestion de l’Enseignement 
Supérieur (Paris). Ma vocation est d’accompagner des personnes motivées à retrouver une relation saine 
avec la nourriture healthy, afin de leur permettre d’atteindre leur objectif et se sentir mieux dans leur 
peau. Sportive et passionnée de ce milieu, du bien-être et de l’accompagnement personnel, mon activité se 
base principalement sur l’éducation nutritionnelle, et l’accompagnement personnel."),
-- 2
("QU’EST-CE QU’UNE CONSULTATION DIÉTÉTIQUE ?",
"C'est une activité de collaboration avec les médecins et les autres professionnels de santé
visant à établir les conditions d'un mieux être à travers une meilleure alimentation établie sur les bases
propres à chaque patient en prenant en compte les spécificités de chacun.");

INSERT INTO site_sandrine_coupart_nutritionniste.web_content
(content)
VALUES
-- 3
("Atteignez votre objectif de façon saine et durable, juste en rééquilibrant votre alimentation, avec 
plaisir et sans restriction alimentaire !");

INSERT INTO site_sandrine_coupart_nutritionniste.page
(name, title)
VALUES
-- 1
("accueil", "SANDRINE, DIÉTÉTICIENNE NUTRITIONNISTE"),
-- 2
("mentions_legales", "MENTIONS LÉGALES"),
-- 3
("politique_confidentialite", "POLITIQUE DE CONFIDENTIALITÉ"),
-- 4
("recette", "MES RECETTES HEALTHY");

INSERT INTO site_sandrine_coupart_nutritionniste.page_organisation
(page_id, place_in_page, level, web_content_id)
VALUES
(1, 1, 1, 1),
(1, 2, 1, 3),
(1, 3, 1, 2);


INSERT INTO site_sandrine_coupart_nutritionniste.web_content
(title, content)
VALUES
-- 4
("Données récupérées",
"Ce site ne récupère que des avis d'utilisateurs. Les utilisateurs identifiés peuvent proposer des avis sur leurs recettes."),
-- 5
("Données utilisateurs",
"Les données utilisateurs qui sont utilisés dans ce site sont des données fournies par les clients de Mme Coupart, nutritionniste. 
Ces données ont été fournies par les clients en connaissance de cause lors d'un entretien physique avec Mme Coupart.
Exploitation des données."),
-- 6
("Exploitation des données",
"Les données fournies permettent à Mme Coupart de proposer à ses clients des recettes personnalisées et adaptées. 
Mme Coupart a totalement conscience du caractère confidentiel de ces données et s'interdit toute exploitation commerciale ou toute diffusion. 
Les données récupérées, afin d'identifier l'auteur d'un avis sur une recette, seront anonymisées si l'avis doit être diffusé."),
-- 7
("Responsable sécurité",
"La personne responsable de la sécurité et de la gestion des données est"),
-- 8
(null,
"Mme Sandrine Coupart 57 Rue des Plantes en Pots 50356 Trifouillis-les-Alouettes"),
-- 9
("En cas de question",
"Vous pouvez contacter Mme Coupart ou la CNIL")
;

INSERT INTO site_sandrine_coupart_nutritionniste.page_organisation
(page_id, place_in_page, level, web_content_id)
VALUES
(3, 1, 1, 4),
(3, 2, 2, 5),
(3, 3, 2, 6),
(3, 4, 1, 7),
(3, 5, 2, 8),
(3, 5, 1, 9)
;

INSERT INTO site_sandrine_coupart_nutritionniste.web_content
(title, content)
VALUES
-- 10
("Propriétaire du site",
"Ce site appartient à Mme Sandrine Coupart, Diététicienne-Nutritionniste, diplômée d'état."),
-- 11
(null,
"Le siège social réside au 57 Rue des Plantes en Pots 50356 Trifouillis-les-Alouettes"),
-- 12
(null,
"Mme Coupart exerce en tant que profession libérale. Elle reçoit ses patients en consultation."),
-- 13
("Fonction du site",
"Mme Coupart a mis en place ce site pour permettre d'échanger avec sa patientelle. Ce site permet de proposer des recettes de bonne santé.
De plus, une partie privé permet à Mme Coupart d'avoir un lien privilégié avec ses patients."),
-- 14
("Partie authentifié",
"Mme Sandrine Coupart propose à ses patients un accès privé leur permettant de bénéficier de recettes particulières, conçues pour être adaptées
aux besoins et aux pathologies de chacun. L'accès à ce site est gratuit pour les patients."),
-- 15
("Condition générale d'utilisation",
"Les patients de Mme Coupart sont libres de consulter les recettes mises à leur disposition et peuvent émettre des commentaires sur ces recettes.
Mme Coupart se permet de modérer les commentaires et se réserve le droit de révoquer l'accès au site à toute personne n'ayant pas une attitude
respectueuse envers le travail de Mme Coupart ou les avis affichés sur ce site.")
;

INSERT INTO site_sandrine_coupart_nutritionniste.page_organisation
(page_id, place_in_page, level, web_content_id)
VALUES
(2, 1, 1, 10),
(2, 2, 2, 11),
(2, 3, 2, 12),
(2, 4, 1, 13),
(2, 5, 2, 14),
(2, 5, 2, 15)
;