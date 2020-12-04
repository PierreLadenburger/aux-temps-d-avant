-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 déc. 2020 à 14:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aux-temps-d-avant`
--

-- --------------------------------------------------------

--
-- Structure de la table `ailleur`
--

DROP TABLE IF EXISTS `ailleur`;
CREATE TABLE IF NOT EXISTS `ailleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ailleur`
--

INSERT INTO `ailleur` (`id`, `nom`, `adresse`, `lat`, `lng`, `site`, `categorie`) VALUES
(1, 'test', '7 rue de l\'aqueduc', NULL, NULL, 'test', 'maison');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `diminutif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `nom`, `description`, `diminutif`) VALUES
(1, 'La Forge', 'La Forge propose un espace de 31 m² pour 2 à 3 personnes. Rénovée dans un esprit traditionnel épuré et conservant toute son authenticité, elle offre tout le confort actuel dans une ambiance cosy. ', 'forge'),
(2, 'La Grange', 'La Grange propose un espace de 25 m2 pour 2 personnes.Dans le même esprit traditionnel et authentique et avec le même confort, elle s\'inspire du romantisme allemand de la fin du 18ème siècle et offre donc une ambiance beaucoup plus romantique.', 'grange'),
(3, 'L\'Alcôve', 'L\'Alcôve propose un espace de 23 m² pour 2 personnes. Toujours dans le même esprit, pour cette chambre, nous avons voulu allier une alcôve de tradition alsacienne et le 18ème siècle duquel date notre corps de ferme pour créer une ambiance plus intimiste et chaleureuse. ', 'alcove');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201118142048', '2020-11-18 14:20:53', 47),
('DoctrineMigrations\\Version20201125083021', '2020-11-25 08:30:31', 391),
('DoctrineMigrations\\Version20201125101911', '2020-11-25 10:19:22', 161),
('DoctrineMigrations\\Version20201127083828', '2020-11-27 08:38:39', 400),
('DoctrineMigrations\\Version20201127094259', '2020-11-27 09:43:10', 225),
('DoctrineMigrations\\Version20201127112421', '2020-11-27 11:24:34', 212);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `nom`, `commentaire`, `date`) VALUES
(1, 'Adeline et Hugo', '« Deux magnifiques nuits au sein de ce petit coin de paradis alsacien, ce havre de paix dont les murs bleus ont imprégné nos mémoires et nos coeurs. Des petits déjeuners typiques et savoureux agréablement marqués par la présence de notre charmante hôtesse n’ont pas manqué de nous séduire. En un mot, nous sommes conquis ! Assurément on ne pourra plus parler d’Alsace sans parler d’Aux temps d’avant !\nBonne continuation dans vos projets qui s’annoncent déjà très prometteurs ! »', '2011-12-04'),
(3, 'Anne-Marie et François', '« Nous avons un peu découvert l’âme de la région à travers l’amour que les habitants portent à leurs maisons … »', '2012-08-01'),
(4, 'Karen und Mike', '«  … wie auf Rosen gebettet ! Eine Nacht im Elsass, unvergesslich. So stellt man es sich in Frankreich vor, mit viel Charme und Liebe zum Detail. Vielen Dank für die Gastfreundschaft, das charmante Zimmer im Dachgeschoss und das leckere Frühstück mit selbsgemachten Kuchen und Marmelade ! Wir werden wieder kommen, um mal kurz dem Allltag zu entfliehen. »', '2012-10-02'),
(5, 'Esperanza et Laura', '«  Tous les mots pour décrire la beauté, le charme, la sérénité qui émanent de ce lieu ont sans doute déjà été dits. Je voudrai simplement vous dire, là sincèrement le bonheur que j’ai eu à vivre ici ce week-end. Parmi vous et cette région que j’aime tant … Merci infiniment et surtout A nous revoir ! »', '2012-12-09'),
(6, 'Agnès et Thierry', '« Comment transcrire autant de plaisir, d’émotion et de bons moments en quelques lignes. Nous avons vu en premier les lieux, la chambre décorée avec tellement de goût ensuite le petit déjeuner plus que copieux avec des confitures délicieuses, faites maison, bien sûr. Du « Hefekuche » et du « Beddelman » (et là je m’adresse à l’Alsace de mon enfance – merci pour ce beau cadeau le matin ! ).\nEnsuite nous avons rencontré Carine, gentillesse, délicatesse assurée. Vous avez su nous mettre très à l’aise, en nous laissant le temps qu’il fallait et ensuite avez su nous conter l’Alsace avec ses moments importants de l’histoire. Un grand merci à vous, Carine, votre emplacement est déjà unique, mais la plus grande particularité c’est votre présence.\nJ’ai failli oublier « Dorka » ( ! orthographe?) qui nous a accueilli tout aussi gentiment. Forte de toutes ces bonnes impressions et des souvenirs de mon Alsace natale, je peux repartir de bon pied. Deux mots pour finir : Merci et à bientôt ! »', '2013-07-22'),
(7, 'Francine et Laurence', '« Une maison bleue, sur la ligne bleue des Vosges … En fait une ancienne forge reconvertie qui abrite ses trésors : patrimoine architectural préservé, bon goût et gentillesse. Pour pimenter l’accueil : les grands yeux d’une « patou ». Merci pour cette rencontre et votre souci du bien-être de vos invités. Bonne continuation. »', '2013-07-08'),
(8, 'Thérèse et François', '«  Il restait un coin de France que nous ne connaissions pas ! Pourquoi ne pas y être venus plus tôt ? Un séjour inoubliable dans une maison « historique » revisitée par Carine et Christian. Merci à vous deux pour votre gentillesse, en souhaitant vous revoir bientôt ! »', '2013-09-28'),
(9, 'Jean Luc et Geneviève', '« 2 jours délicieux passés dans une région pleine de charme et d’histoire. Aucune faute de goût pour votre chambre. L’accueil est chaleureux. On a même le droit de refaire le monde autour d‘un petit déjeuner gourmand. On se croirait à la maison. La chambre est coquette et quelle douche !.. A consommer sans modération. Bien amicalement. »', '2013-11-11'),
(11, 'Dagmar', '«  Mir fehlen die Worte ! Danke und Au revoir. »', '2014-04-21'),
(13, 'Rock et Susi', '« Une bien belle découverte. Nous sommes tombés sous le charme de ce lieu qui nous offre un magnifique retour aux sources. Tout est parfait, un accueil très chaleureux, une décoration typique et dans son jus, une foultitude de petites attentions délicates.\nContinuez ainsi, c’est zéro défaut et l’assurance de très beaux souvenirs pour ceux qui ont la chance de découvrir ce petit coin de paradis. Merci. »', '2014-06-10'),
(14, 'Pia und Hubert', '« Wir durften die erste Gäste in diesem wunderschönen Zimmer sein, ein Beispiel wie man in genialer Weise Altes mit Neueun kombinieren kann. Wir haben uns rundum Wohlgefühlt, ganz Wunderbar geschlafen und gefrühstückt und bedauern dass wir schon weiterfahren müssen Ein ganz besonderer Ort. »', '2014-10-05'),
(15, 'Floriane et Ghislain', '« Le seul défaut de ce séjour, c’est qu’il fut trop court ! Nous avons été très bien accueillis, chaleureusement et sans chichis. Cette pause dans notre quotidien nous a bien ressourcé. Comme je l’ai dit à Carine, la chambre est aménagée avec beaucoup de goût, en sachant garder un joli coté rustique. Merci à vous pour cette conversation à bâtons rompus à la table du petit déj., cela nous a permis de mieux connaître l’histoire de cette maison, mais aussi des alentours !\nPuisse votre maison vous apporter encore beaucoup de bonheur, de rencontres et d’histoires. A bientôt. »', '2015-04-19'),
(16, 'Famille Minni', '« Un deuxième séjour, cette fois-ci en famille, tout aussi agréable que le premier, dans ce nid douillet que vous avez magnifiquement concocté pour le plaisir de chacun !\nMerci pour ces moments précieux qui constituent un beau chapitre dans le livre de nos souvenirs familiaux. »', '2015-10-24'),
(17, 'Anne et Jean-Charles', '« Une halte de charme au bon goût … de l’Alsace. Calme et volupté d’une maison à aucune autre pareille. Votre accueil aussi fait la différence. »', '2015-12-05'),
(18, 'X', '«... Und Wir waren schon wieder Hier ... »', '2015-12-08'),
(19, 'Claire et Jean-Baptiste', '« Merci pour cette nuit, pour cet accueil, pour cette chaleur. Mais un grand merci à vous de protéger notre culture et patrimoine alsacien. Ces maisons à colombage qui nous en disent tant sur le passé.\nCette chambre nous a transporté pendant la nuit. Et c’est des étoiles plein les yeux que nous repartons. Encore merci. » ', '2015-12-09'),
(21, 'E ', '« Un bref moment hors du temps dans un coin d’authenticité et de chaleur alsacienne.\nBravo ! Tout est parfait ! Bonne continuation. »\n', '2016-02-07'),
(22, 'Stéphanie et Vincent', '« Venus en mars 2015, nous voilà de retour dans ce cadre enchanteur... Le plaisir reste le même ! Ça pourrait bien devenir une tradition familiale de venir vous voir chaque année au sortir de l’hiver ! Bravo à vous. »\n', '2016-02-27'),
(24, 'Anne et Georges', '« C’est un grand plaisir de découvrir cette belle région et de profiter d’un accueil sympathique, convivial et efficace. Nous y passons du bon temps et avons envie d’y revenir pour en voir encore plus.\nQuelle admiration devant le travail accompli dans cette magnifique demeure où se côtoient modernité et passé. Une vraie passion à saluer !! »\n', '2016-04-06'),
(25, 'Christian et Suzanne', '« De tout coeur, comment vous remercier. Gentillesse, accueil, super petit déjeuner. Charme, sensibilité… Bravo juste pour cette belle création. Ce partage de cette belle générosité. Bizz à la magnifique Dorka, »\n', '2016-07-22'),
(26, 'Gunther und Vera', '« Vielen Dank für 2 Wunderschöne Tage hier auf Ihre Anwesen. Die unglaubliche Liebe zum Detail macht den Aufenthalt zu einem unvergesslichen Erlebnis. Wir werden es umbedingt weiter empfehlen. Danke auch für das liebevolle Frühstück in dem zauberhaften Garten. »\n', '2016-08-14'),
(27, 'Valérie et Philippe', '« Merci pour cet accueil chaleureux et grand Bravo pour la remise en état de ce petit bijou. »\n', '2016-09-26'),
(28, 'Doris et Patrick', '«Sogar fer d’elsassaer esch Gundershoffa a erlabnis ! Un so g’mettlich… Mer komma garn weder ! »\n', '2016-10-29'),
(29, 'Nathalie et Stéphane', '« Quelle délicieuse nuit, nous venons de passer dans cette chambre pleine de charme ! La literie est excellente, la douche à l’italienne spacieuse avec une grande pression d’eau. Tous les petits détails sont la pour qu’on regrette d’y passer aussi peu de temps. Nous avons hâte de revenir au printemps pour découvrir les extérieurs. Merci à notre hôtesse. »\n', '2016-12-04'),
(30, 'Barbara und Nicole', '« Liebe Carine, eigentlich kann man all das, was man empfindet, wenn man die vielen lievevollen Details gesehen hat, gar nicht in worte fassen. Auch wenn wir nur eine kurtze Zeit hier verbringen konnten, haben wir uns sehr sehr wohl gefühlt. Dieses Anwesen habt Ihr mit Eurer Liebe zum Detail und Eurer wärme zum strahlen gebracht. \nDas Haus schreibt schon so viel geschichte und wird noch weitere schreiben.\nEin hertzliches Dankeschön und bis bald – denn wir waren nicht das letzte mal hier ! »\n', '2016-12-11'),
(31, 'Rose-Marie et Michel', '« Sommes tombés sous le charme. Une maison, objet de toute votre attention qui en retour offre à vos hôtes : sérénité et beauté. Pour compléter le charme, une table soignée tant dans la présentation que dans la qualité et saveurs des produits proposés. \nUn petit déjeuner en terrasse, où l’on découvre en plus l’amour du jardin. Naturellement tout ceci n’est possible que grâce à votre gentillesse, merci. »\n', '2017-06-12'),
(32, 'Jean-Pierre', '« Un projet construit autour de la foi et de la passion pour faire revivre un espace certainement chargé d’histoire. Et un résultat avec du goût et qui donne du sens aux choses. De quoi se faire embarquer pendant une nuit ou plus dans cette aventure.\nContinuez. Merci. »\n', '2017-09-06'),
(33, 'Lynda und Kerstin', '« Ankommen – da sein – wohlfühlen – geniessen ! Leben pur,\nDanke für eine wunderbare Zeit an einem zauberhaften Ort. Merci beaucoup für die Gastfreundschaft !!! »\n', '2017-09-10'),
(34, 'Jean-Pierre', '«Un lieu avec une histoire et une âme\nUne hôtesse pour le mettre en scène et le valoriser,\nUne alchimie subtile qui permet aux invités de se sentir chez soi et de revenir... »\n', '2017-09-13'),
(35, 'Annika und Michael', '« Wir kamen, sahen und verliebten uns sofort in diese Unterkunft. Die Zimmer sind so wunderschön eingerichtet, so dass man sich gleich unglaublich wohl fühlt. Das Frühstück ist mit liebe gemacht und die Gastfreundschaft ist so herzlich. Wir werden diese Unterkunft so schnell nicht vergessen und bestimmt noch oft hierher zurück kehren ! »\n', '2017-10-16'),
(36, 'Céline et Francis', '«Escapade régionale, loin des turbulences familiales, pour un week-end amoureux génial. Merci à vous pour la jolie chambre. »\n', '2017-10-21'),
(37, 'Lili ', '« Vous avez créé un lieu magique, où l’on ressent vibrer votre âme. Cela a été un grand plaisir de faire partie de votre ferme pendant quelques jours et de laisser notre âme – baumeln -. Merci pour le chaleureux accueil, l’inspiration et le repos. »\n', '2017-11-01'),
(38, 'Ulrike und Kurt', '« Liebe Gastgeber ! Selten haben wir so schön, stilvoll in Wunderbaren Ambiente gewohnt. Hier stimmt einfach alles, angefangen von der Gastfreundschaft bis zum Träumen in einem typisch Elsässer Zimmer bis zum Frühstück. »\n', '2017-11-19'),
(39, 'Otto und Sady', '« Ein paar Worte reichen nicht aus, um Euch für Eure aussergewöhnliche Gastfreundschaft zu danken. Wir hatten eine unglaublich schöne Zeit bei Euch und mit Euch, daran werden wir oft denken. Eure so liebevoll eingerichteten Zimmer, der urig eingerichtete Kuhstall sowie der liebevoll gedeckte Frühstücktisch, das alles seid Ihr. »\n', '2017-12-10'),
(40, 'Barbara et Damien', '« Un grand merci pour votre accueil si chaleureux ! Je suis fan de votre déco et de tous vos petits objets. Vive la chambre la plus alsacienne ! »\n', '2017-12-23'),
(41, 'Sabine et Fabien', '«Quel bonheur ! Votre concept est juste fabuleux. Tout y est avec en prime une grande passion qui habite les murs et qui transmet toutes émotions. Merci. »\n', '2018-02-17'),
(42, 'Louise et Hervé', '« Nouveau séjour dans cette magnifique chambre d’hôte. Accueil toujours aussi chaleureux. Les travaux ont bien avancé depuis notre dernier passage, nous vous souhaitons autant de réussite pour la suite de vos projets. Merci pour tout et au plaisir d’une prochaine visite. »\n', '2018-03-04'),
(43, 'Thomas und Jutta', '« Vielen Dank für die wunderschönen Tage in Gundershoffen.\nCurare (lateinisch) = sich sorgen, sich kümmern, pflegen (die Gastfreundschaft)\n… sie tragen Ihren Namen völlig zurecht ! A bientôt. »\n', '2018-08-19'),
(44, 'Michel et Monique', '« Que de travail ! Mais le résultat est magnifique, nous avons adoré la chambre alsacienne et le petit déjeuner très copieux, le pain perdu et le kougelhopf = la cerise sur le gateau !\nUne hôtesse très accueillante et aux petits soins, nous avons passé un excellent séjour dans votre maison et tenons à vous en remercier sincèrement. »\n', '2018-09-09'),
(45, 'Maya', '« Je suis très contente d’avoir trouvé ce petit bijou d’antan ! Vous êtes des maîtres de restauration et d’hospitalité ! Merci. »\n', '2018-09-22'),
(46, 'Maryse', '« Thank you dear Carine for making my stay so very enjoyable ! I’ll return ! »\n', '2018-09-24'),
(47, 'Martine et Walter', '« Il est difficile de rajouter quoi que ce soit à ce qui a déjà été écrit. Mais nous ne pouvons que rajouter notre satisfaction d’avoir séjourné dans une authentique maison alsacienne. Nous qui adorons l’Alsace, pouvons affirmer que c’est la 1ère fois que nous retrouvons autant d’authenticité dans votre superbe rénovation. Et c’est un plaisir encore plus grand de discuter avec la maîtresse des lieux et de partager (un peu) sa passion ! Literie de rêve, petit déjeuner extra, que dire de plus si ce n’est que nous reviendrons certainement. »\n', '2018-10-06'),
(49, 'Françoise et Félix', '«  Une rencontre de quelques minutes avec la beauté peut vous changer le coeur pour jamais. » Jacqueline de Romilly<br>\nComme cela est dit en peu de mots… Rien à ajouter !\nLa vérité du coeur, la vérité de l’instant, la vérité de l’homme !\nMerci pour tout . »\n', '2014-04-18'),
(50, 'Renate und Franz-Josef', 'A rchitektenpaar am Werk<br>\nU rsprüngliches Wohnen<br>\nX – da gibt’s nix (besseres)<br><br>\nT atkräftig in Angriff genommen<br>\nE ngagement über Jahre<br>\nM utige Entscheidung<br>\nP läne schmieden und umsetzen<br>\nS üsses Frühstück<br><br>\nD as ist typpisch französisch<br>\nA aussergewöhnliche Atmosphäre<br>\nV ision verwirklicht<br>\nA mbiente pur<br>\nN ostalgie in alle Ecken<br>\nT hank you, merci und danke schön<br>\n', '2016-04-03'),
(52, 'Yves et Christine', '« Malgré la proximité de la route qui nous a fait peur au début, nous avons très bien dormi sans bruit gênant. Merci pour votre accueil et la qualité de votre chambre et petit déjeuner. Bravo pour votre courage aussi à travers tous ces travaux de restauration et d’aménagement. Nous vous souhaitons d’en voir le bout rapidement. » ', '2012-06-09');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chambre_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_14B784189B177F54` (`chambre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `chambre_id`, `url`) VALUES
(1, 1, '/uploads/forge1.jpg'),
(2, 1, '/uploads/forge3.jpg'),
(3, NULL, '/uploads/exterieur1.jpg\r\n'),
(4, NULL, '/uploads/exterieur2.jpg\r\n'),
(5, NULL, '/uploads/exterieur3.jpg\r\n'),
(6, NULL, '/uploads/exterieur4.jpg\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chambre_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C849559B177F54` (`chambre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `chambre_id`, `date`) VALUES
(4, 1, '2020-11-26'),
(9, 1, '2020-11-29'),
(11, 1, '2020-11-23'),
(12, 1, '2020-11-21'),
(15, 1, '2020-11-27'),
(16, 1, '2020-11-28'),
(17, 2, '2020-11-28'),
(18, 2, '2020-11-27'),
(19, 3, '2020-11-28'),
(20, 1, '2020-12-01'),
(21, 2, '2020-12-02'),
(22, 3, '2020-12-03');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id`, `nom`, `adresse`, `lat`, `lng`, `site`) VALUES
(1, 'Les Akcias', '35 Rue des Acacias, 67110 Niederbronn-les-Bains, France', 48.9582495, 7.632587199999989, 'http://www.les-akcias.fr/'),
(2, 'Au Chasseur', '39 Rue Principale, 67580 Mietesheim, France', 48.878023, 7.641507199999978, 'http://au-chasseur.com/'),
(3, 'Au relais du Bois', '27 Rue du Général Leclerc, 67580 Mertzwiller, France', 48.8619722, 7.674496999999974, 'http://www.relais-du-bois.fr/'),
(5, 'L’orgelstub', '5 Place du Marché, 67350 Pfaffenhoffen, France', 48.8455376, 7.609869200000048, 'https://sites.google.com/site/orgelstub/'),
(7, 'Le Cygne', '35 Grand Rue, 67110 Gundershoffen, France', 48.9066865, 7.658799799999997, 'http://www.aucygne.fr/fr/'),
(8, 'La Merise *', '7 Rue d\'Eschbach, 67580 Laubach, France', 48.879985, 7.722427000000039, 'https://lamerise.alsace/fr/'),
(9, 'Les jardins du moulin', '7 Rue du Moulin, 67110 Gundershoffen, France', 48.9031873, 7.659447499999942, 'https://www.les-jardins-du-moulin.fr/'),
(10, 'Zuem Buerestuebel', '9 Rue de la République, 67110 Niederbronn-les-Bains, France', 48.9516955, 7.641097400000035, 'http://www.winstub-zuem-buerestuebel.com/'),
(11, 'S\'bastberger stuewel', '25 Rue Principale, 67330 Bouxwiller, France', 48.8018157, 7.453829100000007, 'www.gillespudlowski.com  › Imbsheim'),
(12, 'C au carré', '19 Rue du Marché, 67350 Val-de-Moder, France', 48.8456501, 7.610517999999956, 'https://caucarre.eatbu.com'),
(15, 'test', '7 Rue de l\'Aqueduc, 67500 Haguenau, France', 48.8104104, 7.7803874, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `tourisme`
--

DROP TABLE IF EXISTS `tourisme`;
CREATE TABLE IF NOT EXISTS `tourisme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tourisme`
--

INSERT INTO `tourisme` (`id`, `nom`, `adresse`, `lat`, `lng`, `site`, `categorie`) VALUES
(1, 'Maisons à colombage', '67330 Bouxwiller, France', 48.824882, 7.482779, NULL, 'cite');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`) VALUES
(1, 'pladenburger67@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Sm56YThGL1NiNS42L2t6TQ$mfLr9+xmWvP+0xAgvYdW2GU0wRkzUXpqRHD4odJOD78');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B784189B177F54` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C849559B177F54` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
