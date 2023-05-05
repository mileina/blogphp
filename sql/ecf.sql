-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 mai 2023 à 14:02
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
-- Base de données : `ecf`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `auteur`, `contenu`, `date`, `post_id`) VALUES
(6, 'Cindoche', 'J\'ai vraiment apprécié cet article ! Merci pour le partage.', '2023-05-03 20:18:52', 6),
(7, 'sicroll', 'C\'est top !', '2023-05-03 20:27:23', 6),
(8, 'Alex', 'J\'aime bien !', '2023-05-05 13:19:45', 17),
(9, 'Raphaël23', 'J\'ai adoré cet article, il m\'a appris beaucoup de choses intéressantes que je ne savais pas auparavant.', '2023-05-05 13:56:17', 17),
(10, 'Lily13', 'Merci pour ce post inspirant, j\'ai vraiment apprécié la façon dont vous avez partagé votre expérience personnelle.', '2023-05-05 13:56:32', 9),
(11, 'MaximeB', 'Je suis d\'accord avec votre point de vue, il est important de sensibiliser les gens à cette question.', '2023-05-05 13:56:40', 9),
(12, 'Alex78', 'Votre article est très bien écrit et facile à comprendre, même pour les novices en la matière comme moi.', '2023-05-05 13:56:51', 6),
(13, 'Léa_t', 'Je suis impressionné par la qualité de la recherche que vous avez effectuée pour écrire cet article, c\'est vraiment admirable.\r\n', '2023-05-05 13:57:05', 6),
(14, 'Tom_42', 'Merci pour ces conseils utiles, je suis sûr que je pourrai les appliquer dans ma vie quotidienne.', '2023-05-05 13:57:21', 7),
(15, 'Sophie21', 'Cet article m\'a vraiment fait réfléchir sur mon propre comportement, je vais essayer d\'être plus conscient de cela à l\'avenir.', '2023-05-05 13:57:31', 7),
(16, 'Antoine44', 'J\'apprécie vraiment la façon dont vous avez abordé ce sujet complexe, c\'est clair et précis.', '2023-05-05 13:57:41', 8),
(17, 'Elsa_L', 'C\'était très intéressant de lire les différentes opinions et points de vue dans les commentaires, cela enrichit encore plus la discussion.', '2023-05-05 13:57:48', 8),
(18, 'Nico_67', 'Bravo pour votre travail, votre article est une contribution précieuse à la communauté.', '2023-05-05 13:58:00', 10),
(19, 'BlueBird', 'J\'ai adoré cet article ! Merci pour ces informations précieuses.', '2023-05-05 13:58:22', 10),
(20, 'Sunflower77', 'Super intéressant, j\'ai appris beaucoup de choses en te lisant !', '2023-05-05 13:58:42', 11),
(21, 'TechGuru', 'Je ne suis pas tout à fait d\'accord avec toi sur ce point, mais ton point de vue est intéressant.', '2023-05-05 13:58:50', 11),
(22, 'MountainHiker', 'Bravo pour cet article très bien écrit et documenté !', '2023-05-05 13:59:02', 12),
(23, 'JazzManiac', 'Je suis tout à fait d\'accord avec toi, ce sujet est crucial et mérite d\'être discuté.', '2023-05-05 13:59:10', 12),
(24, 'CoffeeLover', 'Je ne connaissais pas du tout ce sujet, merci pour cette découverte !', '2023-05-05 13:59:27', 13),
(25, 'Bookworm', 'Ton article est vraiment complet, merci pour toutes ces informations.', '2023-05-05 13:59:34', 13),
(26, 'FitnessFan', 'Je suis d\'accord avec ta conclusion, il est important de prendre en compte tous les aspects de ce problème.', '2023-05-05 13:59:57', 15),
(27, 'AdventureSeeker', 'J\'aime beaucoup ta plume, continue comme ça !', '2023-05-05 14:00:04', 15),
(28, 'MovieBuff', 'J\'ai trouvé cet article très instructif, merci pour ton travail !', '2023-05-05 14:00:15', 14),
(29, 'CrazyLlama', 'Super article, très intéressant ! Merci pour le partage.', '2023-05-05 14:00:41', 14),
(30, 'EnigmaticFalcon', 'Je suis complètement d\'accord avec toi. C\'est un sujet très important.', '2023-05-05 14:00:57', 16),
(31, 'MysticPhoenix', 'Merci pour cet éclairage sur le sujet, j\'ai beaucoup appris.', '2023-05-05 14:01:08', 16);

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id`, `titre`, `contenu`, `auteur`, `date`) VALUES
(6, 'Mon expérience en tant que streameuse', 'Dans cet article, je partage mon expérience en tant que streameuse, les défis auxquels j\'ai été confrontée et les moments les plus mémorables de ma carrière. Rejoignez-moi pour un voyage passionnant à travers les coulisses du streaming en direct.', 'Mil', '2023-05-03 17:57:26'),
(7, 'Les meilleurs jeux vidéo de l\'année', 'Dans cet article, je vais partager avec vous les meilleurs jeux vidéo de l\'année. Préparez-vous à découvrir les titres les plus passionnants et les plus divertissants !', 'Mil\r\n', '2023-05-01 18:04:51'),
(8, 'Les jeux vidéo les plus attendus de cette année', 'Dans cet article, nous allons explorer les jeux vidéo les plus attendus de cette année. Du dernier opus de séries populaires aux nouveaux titres prometteurs, découvrez ce qui vous attend dans le monde du gaming.', 'Mil\r\n', '2023-04-25 18:08:54'),
(9, 'Les jeux vidéo indépendants à ne pas manquer', 'Dans cet article, nous allons mettre en lumière les meilleurs jeux vidéo indépendants du moment. Découvrez ces pépites créées par des studios plus modestes, mais qui offrent des expériences de jeu incroyables et uniques.', 'Mil\r\n', '2023-05-03 18:08:54'),
(10, 'Les jeux vidéo indépendants à surveiller en 2023', 'Dans cet article, nous vous présentons les jeux vidéo indépendants les plus attendus de 2023. Découvrez des titres innovants et captivants créés par des studios talentueux et passionnés.', 'Mil\r\n', '2023-03-15 19:35:57'),
(11, 'Les meilleures consoles de jeu en 2023', 'Nous comparons les meilleures consoles de jeu disponibles en 2023, en examinant leurs performances, leurs exclusivités et leurs fonctionnalités pour vous aider à choisir celle qui vous convient le mieux.', 'Mil\r\n', '2023-01-11 19:35:57'),
(12, 'Les meilleurs jeux de réalité virtuelle en 2023', 'Explorez les meilleurs jeux de réalité virtuelle en 2023, avec des expériences immersives et passionnantes sur différentes plates-formes VR. Plongez-vous dans des mondes incroyables et vivez des aventures inoubliables.', 'Mil\r\n', '2022-12-13 19:35:57'),
(13, 'Les jeux vidéo les plus attendus de 2023', 'Découvrez les jeux vidéo les plus attendus de 2023, des suites très attendues aux nouvelles franchises prometteuses. Préparez-vous à passer d\'innombrables heures de plaisir avec ces titres passionnants.', 'Mil\r\n', '2022-08-31 18:35:57'),
(14, 'Comment améliorer ses performances dans les jeux de tir à la première personne', 'Apprenez les astuces et les techniques pour améliorer vos performances dans les jeux de tir à la première personne. Devenez un joueur redoutable grâce à nos conseils sur l\'entraînement, la stratégie et le travail d\'équipe.', 'Mil\r\n', '2022-05-03 18:35:57'),
(15, 'Top 10 des jeux de rôle en 2023', 'Découvrez notre sélection des 10 meilleurs jeux de rôle en 2023. Des mondes ouverts aux aventures narratives, ces titres vous emmèneront dans des quêtes épiques et des histoires captivantes.', 'Mil\r\n', '2022-06-12 18:35:57'),
(16, 'Les jeux vidéo qui ont marqué l\'histoire', 'Retour sur les jeux vidéo qui ont marqué l\'histoire, des classiques intemporels aux titres révolutionnaires. Découvrez comment ces jeux ont influencé l\'industrie et ont laissé une empreinte indélébile sur la', 'Mil\r\n', '2022-03-29 18:35:57'),
(17, 'Comment réussir sur Twitch en 2023', 'Dans cet article, nous explorons les meilleures pratiques et stratégies pour réussir en tant que streameur sur Twitch en 2023. Apprenez à construire votre audience, à interagir avec vos spectateurs et à tirer parti des opportunités de monétisation sur la plateforme.', 'Mil\r\n', '2023-05-03 18:37:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `nom_utilisateur`, `mot_de_passe`, `role`) VALUES
(10, '', '', 'meas.pinya@gmail.com', 'mil', '$2y$10$mp17eCjW2U5jAI43hbLVSuKCX5WDeP7ESS3vFyyAMM2/k7VhHMUty', 'admin'),
(11, 'Alex', 'meas', 'alex@gmail.com', 'Alex', '$2y$10$3U3G3NRp89TnTPvhFO4.O.d.025RHQ7QD.z97j5JJABhe8o3U2OWO', 'USER');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('USER','ADMIN') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `postes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
