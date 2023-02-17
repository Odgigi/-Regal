-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 fév. 2023 à 16:41
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `regal`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `dt_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `commentaire`, `dt_creation`) VALUES
(1, 'toto@yahoo.fr', 'super test', '2023-02-17 15:50:33'),
(2, 'toto@yahoo.fr', 'jgfrdhjd;', '2023-02-17 15:52:39');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `dt_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `contenu`, `dt_creation`) VALUES
(1, 'Mentions légales', '<p>Les&nbsp;<strong>mentions l&eacute;gales</strong>&nbsp;sont les informations qui permettent &agrave; l\'internaute de&nbsp;<strong>vous identifier</strong>.</p>\r\n<p>Les mentions l&eacute;gales sont&nbsp;<strong>obligatoires</strong>&nbsp;sur tout site internet professionnel et doivent &ecirc;tre&nbsp;<strong>facilement accessibles</strong>.</p>\r\n<p>Elles peuvent &ecirc;tre ins&eacute;r&eacute;es dans vos&nbsp;<a title=\"conditions g&eacute;n&eacute;rales de vente (CGV) - Nouvelle fen&ecirc;tre\" href=\"https://entreprendre.service-public.fr/vosdroits/R43253\" target=\"_blank\" rel=\"noopener\">conditions g&eacute;n&eacute;rales de vente (CGV)</a>&nbsp;ou dans une page d&eacute;di&eacute;e.</p>\r\n<p>Vous devez renseigner les informations suivantes&nbsp;:</p>\r\n<ul class=\"sp-item-list\">\r\n<li>Identit&eacute; de l\'entreprise : votre nom, pr&eacute;nom et adresse. Si vous &ecirc;tes entrepreneur individuel (y compris, micro-entrepreneur), vos nom et pr&eacute;nom sont accompagn&eacute;s de la mention entrepreneur individuel ou des initiales EI.</li>\r\n<li><a title=\"Num&eacute;ro d\'immatriculation - Nouvelle fen&ecirc;tre\" href=\"https://entreprendre.service-public.fr/vosdroits/F35934\" target=\"_blank\" rel=\"noopener\">Num&eacute;ro d\'immatriculation</a>&nbsp;au&nbsp;<abbr class=\"tool-tip\" tabindex=\"0\" data-toggle=\"tooltip\" data-sigle=\"R24403\" data-original-title=\"RCS&nbsp;:&nbsp;Registre du commerce et des soci&eacute;t&eacute;s\">RCS<span class=\"fr-sr-only\">: RCS&nbsp;:&nbsp;Registre du commerce et des soci&eacute;t&eacute;s</span></abbr></li>\r\n<li>Mail et num&eacute;ro de t&eacute;l&eacute;phone pour contacter votre entreprise</li>\r\n<li><a title=\"Num&eacute;ro d\'identification &agrave; la TVA - Nouvelle fen&ecirc;tre\" href=\"https://entreprendre.service-public.fr/vosdroits/F23570\" target=\"_blank\" rel=\"noopener\">Num&eacute;ro d\'identification &agrave; la TVA</a></li>\r\n<li>Identit&eacute; de&nbsp;<span class=\"tool-tip\" tabindex=\"0\" title=\"\" data-toggle=\"tooltip\" data-definition=\"R61596\" data-original-title=\"Entreprise en charge de stocker sur ses serveurs les donn&eacute;es du site internet\">l\'h&eacute;bergeur<span class=\"fr-sr-only\">: Entreprise en charge de stocker sur ses serveurs les donn&eacute;es du site internet</span></span>&nbsp;du site&nbsp;: nom ou d&eacute;nomination sociale, adresse et num&eacute;ro de t&eacute;l&eacute;phone</li>\r\n<li>Si vous exercez une&nbsp;<a title=\"activit&eacute; r&eacute;glement&eacute;e - Nouvelle fen&ecirc;tre\" href=\"https://entreprendre.service-public.fr/vosdroits/F36070\" target=\"_blank\" rel=\"noopener\">activit&eacute; r&eacute;glement&eacute;e</a>&nbsp;et soumise &agrave; autorisation (pharmacie ou d&eacute;bit de boissons, par exemple) : nom et adresse de l\'autorit&eacute; qui a d&eacute;livr&eacute; l\'autorisation.</li>\r\n</ul>\r\n<div class=\"fr-highlight  fr-my-4w fr-ml-0\" data-test=\"citation\">\r\n<p class=\"fr-text--bold\">Attention &nbsp;</p>\r\n<p>Le manquement &agrave; cette obligation d\'information est puni d\'<strong>1 an d\'emprisonnement</strong>&nbsp;et&nbsp;<span class=\"sp-prix\">75 000 &euro;&nbsp;</span><strong>d\'amende</strong>.</p>\r\n</div>', '2023-02-17 10:21:51');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `preparation` text NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` varchar(7) NOT NULL,
  `image` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `dt_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `preparation`, `prix`, `categorie`, `image`, `auteur`, `dt_creation`) VALUES
(1, 'Salade de fleurs estivale', '<h2 class=\"recipe-subtitle\" data-block=\"recipe-instructions-title\">&Eacute;tapes de pr&eacute;paration</h2>\r\n<div class=\"recipe-instructionContent\" data-block=\"recipe-instructions-content\">\r\n<p>1) Une fois vos fleurs cueillies, laissez le temps &agrave; leurs &eacute;ventuels habitants de fuir en les disposant sur un torchon.</p>\r\n<p>2) D&eacute;coupez votre salade en lamelles et r&acirc;pez les carottes. D&eacute;coupez les radis en rondelles et les figues en morceaux assez grossiers. D&eacute;tachez les fleurs d&rsquo;ail des ours des tiges, r&eacute;servez-les et hachez finement les tiges que vous int&eacute;grez dans votre salade.</p>\r\n<p>3) D&eacute;posez les graines germ&eacute;es au centre de l&rsquo;assiette.</p>\r\n<p>4) Arrachez les p&eacute;tales des pissenlits pour en saupoudrer la salade. D&eacute;posez les autres fleurs sur la salade. Pr&eacute;parez votre vinaigrette en m&eacute;langeant tous les ingr&eacute;dients et assaisonnez votre salade.</p>\r\n</div>', 15, 'entree', 'https://fac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Ffac.2F2018.2F07.2F30.2F70f9c5fc-5bbd-447a-946b-3eff1bb002a1.2Ejpeg/650x324/quality/80/crop-from/center/salade-de-fleurs-estivale.jpeg', 'Bénédicte, bloggeuse de Make Me Green', '2023-02-17 11:47:29'),
(3, 'Boeuf braisé aux carottes', '<ul data-onscroll=\"\">\r\n<li class=\"\">\r\n<h3>1</h3>\r\n<p>Lavez le persil, &eacute;pongez-le ; faites un bouquet garni (attachez le persil avec la feuille de laurier et la branche de thym).</p>\r\n</li>\r\n<li class=\"\">\r\n<h3>2</h3>\r\n<p>Coupez la viande en gros d&eacute;s. Pelez et &eacute;mincez l\'oignon. D&eacute;taillez des lardons dans la poitrine fum&eacute;e.</p>\r\n<div id=\"divInstructionVideos\" class=\"instructions_videos\">\r\n<h4>GESTES TECHNIQUES</h4>\r\n<div class=\"video_modal_btn\" data-player=\"SyQk0332G\" data-videomodal=\"5811601204001\">\r\n<div class=\"video_modal_btn_img\"><picture><source srcset=\"https://img.cuisineaz.com/150x120/2020/07/24/i0-emincer-ses-legumes.webp\" type=\"image/webp\"><source srcset=\"https://img.cuisineaz.com/150x120/2020/07/24/i0-emincer-ses-legumes.jpeg\" type=\"image\"><img src=\"https://img.cuisineaz.com/150x120/2020/07/24/i0-emincer-ses-legumes.jpeg\" width=\"150\" height=\"120\" loading=\"lazy\"></picture></div>\r\n&Eacute;mincer ses l&eacute;gumes</div>\r\n<div class=\"video_modal_btn\" data-player=\"SyQk0332G\" data-videomodal=\"5811673776001\">\r\n<div class=\"video_modal_btn_img\"><picture><source srcset=\"https://img.cuisineaz.com/150x120/2019/11/28/i151128-.webp\" type=\"image/webp\"><source srcset=\"https://img.cuisineaz.com/150x120/2019/11/28/i151128-.jpeg\" type=\"image\"><img src=\"https://img.cuisineaz.com/150x120/2019/11/28/i151128-.jpeg\" width=\"150\" height=\"120\" loading=\"lazy\"></picture></div>\r\nTailler un oignon</div>\r\n<div class=\"video_modal_btn\" data-player=\"SyQk0332G\" data-videomodal=\"5985539836001\">\r\n<div class=\"video_modal_btn_img\"><picture><source srcset=\"https://img.cuisineaz.com/150x120/2020/06/17/i0-comment-degermer-l-ail.webp\" type=\"image/webp\"><source srcset=\"https://img.cuisineaz.com/150x120/2020/06/17/i0-comment-degermer-l-ail.jpeg\" type=\"image\"><img src=\"https://img.cuisineaz.com/150x120/2020/06/17/i0-comment-degermer-l-ail.jpeg\" width=\"150\" height=\"120\" loading=\"lazy\"></picture></div>\r\nComment d&eacute;germer l\'ail ?</div>\r\n</div>\r\n</li>\r\n<li class=\"\">\r\n<h3>3</h3>\r\n<p>Dans une cocotte, faites chauffer l\'huile sur feu mod&eacute;r&eacute; ; lorsqu\'elle est bien chaude, faites-y revenir l\'oignon et les lardons ; retirez-les puis faites dorer les morceaux de viande sur toutes leurs faces.</p>\r\n</li>\r\n<li class=\"onscroll_on\">\r\n<h3>4</h3>\r\n<p>Replacez lardons et oignons dans la cocotte, salez et poivrez puis versez le vin blanc ; ajoutez 25 cl d\'eau, le bouquet garni et les 2 gousses d\'ail &eacute;cras&eacute;es avec le plat d\'un gros couteau. Couvrez, baissez le feu au maximum et laissez braiser 1 h 30 mn.</p>\r\n</li>\r\n<li class=\"onscroll_on\">\r\n<h3>5</h3>\r\n<p>Pelez les carottes, lavez-les et coupez-les en b&acirc;tonnets de 4 cm de long puis ajoutez-les &agrave; la viande. V&eacute;rifiez l\'assaisonnement, ajoutez un peu d\'eau si n&eacute;cessaire. Prolongez la cuisson &agrave; couvert, pendant 45 mn.</p>\r\n</li>\r\n<li class=\"onscroll_on\">&nbsp;</li>\r\n</ul>', 20, 'plat', 'https://img.cuisineaz.com/660x660/2017/09/12/i132338-boeuf-braise-aux-carottes.webp', 'Cuisine AZ', '2023-02-17 12:37:56'),
(4, 'Flan de Ferrero', '<h2>Preparaci&oacute;n</h2>\r\n<p><label class=\"receta-containercheck\">Precalienta el horno a 180&deg; C.<input id=\"paso-284137\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Para el Caramelo, calienta una sart&eacute;n a fuego bajo con el az&uacute;car, hasta que se forme un caramelo color &aacute;mbar. Vierte en un molde para flan cubriendo toda la superficie. Reserva.<input id=\"paso-284138\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Para el flan, lic&uacute;a la leche evaporada con la vainilla, la crema de avellanas y los chocolates hasta obtener una mezcla homog&eacute;nea. Reserva.<input id=\"paso-284139\" type=\"checkbox\"></label><label class=\"receta-containercheck\">En un bowl bate los huevos con las yemas y el az&uacute;car hasta que se cambien de color.<input id=\"paso-284140\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Agrega la mezcla de la licuadora a una ollita y calienta a fuego lento hasta que se reduzca una cuarta parte, retira del fuego y tempera la mezcla de los huevos con la leche, y regresa poco a poco la preparaci&oacute;n de los huevos a la ollita, cocina hasta espesar a fuego bajo, cuidando de que el huevo no se cueza.<input id=\"paso-284141\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Agrega la preparaci&oacute;n anterior al molde sobre el caramelo, tapa muy bien con papel aluminio, hornea a ba&ntilde;o mar&iacute;a por 2 &frac12; horas. Retira del horno, enfr&iacute;a y refrigera al menos 2 horas. Desmolda.<input id=\"paso-284142\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Mezcla la crema con el chocolate derretido y coloca en una manga pastelera con duya rizada.<input id=\"paso-284143\" type=\"checkbox\"></label><label class=\"receta-containercheck\">Decora el flan con rosetones de crema y los chocolates. Sirve.</label></p>', 17, 'dessert', 'https://cdn7.kiwilimon.com/recetaimagen/30877/34947.jpg', ' Kiwilimón', '2023-02-17 12:50:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `dt_creation`) VALUES
(1, 'admin', 'admin@admin.fr', 'odile', '2023-02-16 22:21:21'),
(2, 'Sarah', 'sarah@boblog.com', '9fc58423aa0341dd75c031e1b2fabe0a', '2023-02-17 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
