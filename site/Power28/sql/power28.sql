-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 11 jan. 2019 à 16:20
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `power28`
--

-- --------------------------------------------------------

--
-- Structure de la table `category_faq`
--

CREATE TABLE `category_faq` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category_faq`
--

INSERT INTO `category_faq` (`id`, `name_category`) VALUES
(1, 'PRISE EN MAIN'),
(2, 'FONCTIONNALITÉS'),
(3, 'FACTURATION & SÉCURITE'),
(4, 'FORUM'),
(5, 'AUTRES');

-- --------------------------------------------------------

--
-- Structure de la table `category_forum`
--

CREATE TABLE `category_forum` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category_forum`
--

INSERT INTO `category_forum` (`id`, `name_category`, `image`) VALUES
(1, 'Fonctionnalités', 'functionality.png'),
(2, 'Améliorations', 'improvements.png'),
(3, 'Dysfonctionnements', 'problem.png'),
(4, 'Avis', 'opinion.png'),
(5, 'Achats Optionnels', 'purchase.jpg'),
(6, 'Autres', 'other.png');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `topic_id`, `user_id`, `comment`, `author`, `created_at`, `is_published`) VALUES
(1, 1, 2, 'Salut ! Sed ac tortor lobortis, eleifend nisi quis, gravida orci. Mauris ac posuere arcu. Duis vitae libero velit. Aenean tempor ultrices augue, ut facilisis purus efficitur eget. Phasellus id ultrices nisl. Ut congue nisl ac suscipit facilisis. Ut ut ipsum ex. Nulla eleifend lacus vel sapien tristique, ac faucibus velit molestie. Suspendisse nec luctus nulla. Nam non nisl quis turpis dictum hendrerit. Etiam ultricies risus id sodales tincidunt. Mauris id porttitor nunc, non pharetra lacus. Cras venenatis laoreet metus, quis imperdiet ipsum porttitor eu. Nullam mollis congue tincidunt. Donec quis euismod neques.', 'Chloe87', '2018-07-01 22:00:07', 1),
(2, 1, 1, 'Oui, praesent fermentum elementum egestas. Curabitur nunc sapien, cursus ac lectus sit amet, elementum vestibulum ligula. Pellentesque vestibulum dolor quis eros pulvinar, non congue ipsum mollis. Phasellus aliquet orci vel lacus ultrices, quis sodales odio tempus. Pellentesque mattis mi id lobortis laoreet. Duis at nisl non nunc dignissim consectetur. Sed facilisis ante sed orci lobortis volutpat. ', 'ThomasS93', '2018-07-02 02:27:23', 1),
(3, 2, 4, 'Oui, je te le recommande. Praesent diam mi, dictum in imperdiet et, sollicitudin sed turpis. Nam mollis felis at leo lobortis porta. Maecenas gravida justo nec magna placerat ullamcorper. Vestibulum sed ipsum varius, scelerisque dolor eu, hendrerit velit. Proin condimentum ante turpis, vel ullamcorper eros semper a. Sed mattis eleifend nunc, quis mollis nisi maximus id.', 'ManonP', '2018-07-02 02:33:15', 1),
(4, 2, 2, 'Selon toi, tu penses vestibulum suscipit, nibh a elementum luctus, ex est gravida quam, non commodo sapien nibh ac orci. Praesent sed lectus dapibus, posuere neque vel, luctus enim. Ut mattis dolor non dolor malesuada tempus. Morbi risus elit, feugiat ut est sed, egestas elementum sem. Donec id tristique ex, quis cursus massa. Duis et facilisis felis. Nullam eleifend ex non elit consequat feugiat.', 'Chloe87', '2018-07-02 02:57:05', 1),
(5, 3, 2, 'Je te le recommande ! Aliquam sed erat nunc. Nulla ultrices elementum elit, quis iaculis metus congue vitae. Praesent eget nibh ut ex malesuada posuere non at lacus. Aliquam dignissim mauris quis ante eleifend malesuada. Pellentesque tempus dolor in turpis euismod cursus. Pellentesque ut ultricies nisl. Quisque a iaculis lacus, commodo dapibus leo.', 'Chloe87', '2018-07-02 03:06:44', 1),
(6, 3, 1, 'Oui, mais Maecenas aliquam, eros ut placerat tincidunt, metus diam maximus felis, at accumsan lectus felis ac tellus. Donec placerat molestie purus, sed hendrerit eros viverra sit amet. Maecenas faucibus elementum congue. Vestibulum pretium massa suscipit massa mattis tincidunt. Curabitur vulputate, justo id tempor volutpat, nulla risus viverra justo, sit amet scelerisque urna arcu ut orci. Ut porttitor nibh sit amet turpis pellentesque faucibus. In pretium aliquet venenatis. Nullam feugiat tortor quis velit vehicula, non euismod tortor congue. Aenean vel lacus feugiat, semper felis ac, tempus felis.', 'ThomasS93', '2018-07-08 02:10:54', 1),
(7, 5, 4, 'Il faut juste que tu vestibulum pretium massa suscipit massa mattis tincidunt. Curabitur vulputate, justo id tempor volutpat, nulla risus viverra justo, sit amet scelerisque urna arcu ut orci. Ut porttitor nibh sit amet turpis pellentesque faucibus. In pretium aliquet venenatis.', 'ManonP', '2018-07-08 02:14:51', 1),
(8, 2, 1, 'Praesent diam mi, dictum in imperdiet et, sollicitudin sed turpis. Nam mollis felis at leo lobortis porta.', 'ThomasS93', '2018-07-08 16:45:00', 1),
(9, 1, 7, 'Oui, il a raison! Nulla eleifend lacus vel sapien tristique, ac faucibus velit molestie. Suspendisse nec luctus nulla. ', 'anto9', '2018-07-08 16:47:38', 1),
(10, 5, 1, 'hello', 'ThomasS93', '2018-07-09 10:21:55', 1),
(11, 2, 8, 'Hey', 'stess', '2019-01-11 16:06:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `is_published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `category_id`, `question`, `answer`, `is_published`) VALUES
(1, 1, 'Puis-je utiliser Power28 sur tous types de support (ordinateur, smartphone, tablette) ?', 'Non, Power28 est seulement accessible sur ordinateur et tablette.', 1),
(2, 1, 'Puis-je accéder à Power28 sans une connexion Internet ?\r\n', 'Oui, Power28 est un logiciel qui ne nécessite pas de connexion internet.', 1),
(3, 3, 'Quels sont les modes de payement possibles ?', 'Vous pouvez payer par carte bancaire virement ou prélèvement bancaire.', 1),
(4, 3, 'Avez-vous une attestation de conformité pour le logiciel ? ', 'Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat. ', 1),
(5, 2, 'Comment j’accède et je teste les nouvelles fonctionnalités Power28 ?', 'Lorem ipsum dolor sit amet, elit, erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 1),
(6, 5, 'Est-ce que je peux bénéficier d’une formation ? ', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facili iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.\r\n\r\nLorem ipsum dolor sit amet, elit, erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 1),
(7, 3, 'Pouvez-vous me donner des informations concernant la sécurité des informations stocké sur vos serveurs ? ', 'Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat.Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat.Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat.', 1),
(8, 4, 'Comment créer un nouveau topic ?', 'Ut wisi enim ad ex ea commodo consequat.Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat.Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat.\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facili iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, elit, erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 1),
(9, 4, 'Comment supprimer un topic ?', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 1);

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_power28` text NOT NULL,
  `price_training` text NOT NULL,
  `price_filesMaker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `price_power28`, `price_training`, `price_filesMaker`) VALUES
(1, 1, '1200', '600', 0),
(2, 2, '1200', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `is_published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `question`, `content`, `author`, `created_at`, `is_published`) VALUES
(1, 'Comment fonctionne Power28?', 'Bonjour ! Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facili iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'ThomasS93', '2018-06-12', 1),
(2, 'Est-il nécessaire d\'acheter \r\nl\'hébergement FilesMaker ?', 'Salut ! Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 'Chloe87', '2018-06-19', 1),
(3, 'Que pensez-vous de l\'hébergement FilesMarker ?', 'Fusce porta at arcu sollicitudin fermentum. Praesent fermentum elementum egestas. Curabitur nunc sapien, cursus ac lectus sit amet, elementum vestibulum ligula. Pellentesque vestibulum dolor quis eros pulvinar, non congue ipsum mollis. Phasellus aliquet orci vel lacus ultrices, quis sodales odio tempus. Pellentesque mattis mi id lobortis laoreet. Duis at nisl non nunc dignissim consectetur. Sed facilisis ante sed orci lobortis volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum et bibendum massa. Maecenas vestibulum ultricies venenatis. Sed pretium, quam sed venenatis consequat, dui felis ornare justo, sit amet aliquam mi quam ut urna. Suspendisse potenti.', 'ManonP', '2018-07-03', 1),
(4, 'Est-il envisageable de créer des fonctionnalités spécifiques à mon activité ?', 'Bonjour ! Nullam pharetra, nibh nec commodo iaculis, justo urna bibendum purus, ut euismod elit diam in tellus. Vivamus non magna hendrerit, ultrices dolor bibendum, pretium tortor. Donec vestibulum sem enim, sit amet egestas libero egestas non. Curabitur sit amet sapien consectetur, malesuada elit sed, convallis enim. Nullam molestie volutpat lorem. Donec sem dolor, commodo et molestie ut, ornare nec risus. Integer quis felis mollis, suscipit quam id.', 'ThomasS93', '2018-07-04', 1),
(5, 'Problème de mise à jour !', 'Maecenas aliquam, eros ut placerat tincidunt, metus diam maximus felis, at accumsan lectus felis ac tellus. Donec placerat molestie purus, sed hendrerit eros viverra sit amet. Maecenas faucibus elementum congue. Vestibulum pretium massa suscipit massa mattis tincidunt. Curabitur vulputate, justo id tempor volutpat, nulla risus viverra justo, sit amet scelerisque urna arcu ut orci. Ut porttitor nibh sit amet turpis pellentesque faucibus. In pretium aliquet venenatis. Nullam feugiat tortor quis velit vehicula, non euismod tortor congue. Aenean vel lacus feugiat, semper felis ac, tempus felis.', 'ThomasS93', '2018-07-08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `topic_category`
--

CREATE TABLE `topic_category` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic_category`
--

INSERT INTO `topic_category` (`id`, `topic_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 4),
(4, 4, 1),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `company_name`, `pseudo`, `email`, `password`, `address`, `postcode`, `city`, `mobile`, `is_admin`) VALUES
(1, 'Thomas', 'Souvan', 'Syrin', 'ThomasS93', 'thomas@gmail.com', '2510c39011c5be704182423e3a695e91', '30 avenue Nicolas Ledoux', '93420', 'Villepinte', '0626898756', 1),
(2, 'chloe', 'marchal', 'Newwor', 'Chloe87', 'chloe@gmail.com', '2510c39011c5be704182423e3a695e91', 'é adsf', 'dcfds', 'vfcds', '0654768907', 0),
(4, 'Manon', 'Pirriou', '', 'ManonP', 'manon@gmail.com', '2510c39011c5be704182423e3a695e91', '67 avenue Licres', '75009', 'Paris', '0654826542', 1),
(6, 'Célia', 'Aguercif', 'Facility', 'CeliaA', 'celia@gmail.com', '2510c39011c5be704182423e3a695e91', '  39 avenue de la paix', '75001', 'Paris', '654326675', 0),
(7, 'Antonio', 'DaCosta', 'Syptr', 'anto9', 'antonio@gmail.com', '2510c39011c5be704182423e3a695e91', '43 avenue clairy', '93600', 'Aulnay-sous-Bois', '0654324567', 0),
(8, 'Stecy', 'Cauchin', '', 'stess', 'Stecy@gmail.com', '2510c39011c5be704182423e3a695e91', ' 67 avenue Licres', '75009', 'Paris', '654826542', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category_faq`
--
ALTER TABLE `category_faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_forum`
--
ALTER TABLE `category_forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic_category`
--
ALTER TABLE `topic_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category_faq`
--
ALTER TABLE `category_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `category_forum`
--
ALTER TABLE `category_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `topic_category`
--
ALTER TABLE `topic_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
