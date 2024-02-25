-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `firstName`, `lastName`, `email`, `password`, `bio`) VALUES
('U002', 'Mori_Calliope.png', 'Mori', 'Calliope', 'mori.calliope@gmail.com', 'bb4f7fe1a6cdb138d8064d368ccb1ebe', 'The Grim Reaper\'s first apprentice'),
('U003', 'Takanashi_Kiara.png', 'Takanashi', 'Kiara', 'takanashi.kiara@gmail.com', 'e79f723de769d6f185fdfda0bf61ab1d', 'An idol whose dream is to become the owner of a fast food chain'),
('U004', 'Ninomae_Ina\'nis.png', 'Ninomae', 'Ina\'is', 'Ninomae.inais@gmail.com', 'f315d59b160838b0b00df4b4bc41d932', 'Despite her looks, Ina\'nis is actually a priestess of the Ancient Ones'),
('U005', 'Gawr_Gura.png', 'Gawr', 'Gura', 'gawr.gura@gmail.com', 'fd90b2a04d2434940687c7a9bc6be410', 'A descendant of the Lost City of Atlantis, who swam to Earth while saying, \"It\'s so boring down there LOLOLOL!\"'),
('U006', 'Watson_Amelia.png', 'Watson', 'Amelia', 'watson.amelia@gmail.com', 'cec2b2785a266442da552ef57d862e6f', 'Amelia heard strange rumors online surrounding hololive: talking foxes, magical squirrels, superhuman dogs, and more. Soon after beginning her investigation on hololive, and just out of interest, she decided to become an idol herself!'),
('U007', 'IRyS.png', 'IRyS', 'IRyS', 'irys@gmail.com', 'f7146d8f16396aa72a27a88fc4615460', 'A Nephilim who was once the embodiment of hope back in \"The Paradise\".'),
('U008', 'Ceres_Fauna.png', 'Ceres', 'Fauna', 'ceres.fauna@gmail.com', '923f23e2b769c78d4b66f566d4585209', 'The Keeper of Nature, a druidic kirin who appeared on the internet to win over humans and convince them to return to nature.'),
('U009', 'Ouro_Kronii.png', 'Ouro', 'Kronii', 'ouro.kronii@gmail.com', '99777fb63cf30397980d9345be00b077', 'Time is an unwavering, precise entity, and its Warden - its overseer - is equally cool and impeccable.'),
('U010', 'Nanashi_Mumei.png', 'Nanashi', 'Mumei', 'nanashi.mumei@gmail.com', 'e9f177bb8b3af3aee07f491db0c46dd1', 'The Guardian of Civilization, a traveling owl who has borne witness to numerous events.'),
('U011', 'Hakos_Baelz.png', 'Hakos', 'Baelz', 'hakos.baelz@gmail.com', '24b68f4d1a46135448b52dacd581c9bc', 'Chaos. Mayhem. Entropy..... All in the form of a cute little rat.'),
('U012', 'Shiori_Novella.png', 'Shiori', 'Novella', 'shiori.novella@gmail.com', '6f7cdddf6b1f3cd8cfe6c06fe54043cc', 'Driven by her thirst for knowledge, Shiori Novella is \"The Archiver.\"'),
('U013', 'Koseki_Bijou.png', 'Koseki', 'Bijou', 'koseki.bijou@gmail.com', '5e283a47c68cf58262d3d9420f500629', 'Formed from the crystallization of all forms of human emotion, Koseki Bijou is \"The Jewel of Emotions.\"'),
('U014', 'Nerissa_Ravencroft.png', 'Nerissa', 'Ravencroft', 'nerissa.ravencroft@gmail.com', '4258e45ee8b23fd88048b8e5583024c5', 'With a deep love of song, Nerissa Ravencroft is \"The Demon of Sound.\"'),
('U015', 'Fuwawa_Abyssgard.png', 'Fuwawa', 'Abyssgard', 'fuwawa.abyssgard@gmail.com', '0e79e2ffdcd6e1f1544d1ecf58b8d95e', 'The fluffy older twin sister of The Demonic Guard Dogs, who were sealed away in The Cell for being a pain in the godly behind, Fuwawa Abyssgard is \"The Fluffy One.\"'),
('U016', 'Mococo_Abyssgard.png', 'Mococo', 'Abyssgard', 'Mococo.abyssgard@gmail.com', 'cabf396234a899d13c320e8c166e474c', 'The fuzzy younger twin sister of The Demonic Guard Dogs, who were sealed away in The Cell for being a pain in the godly behind, Mococo Abyssgard is \"The Fuzzy One.\"'),
('UD01', 'Enma_-_Concept_Illustration_01-1.jpg', 'admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'This is Admin');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE new_id CHAR(4);

    SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) INTO @existing_max_id FROM users;

    SET new_id = LPAD(IFNULL(@existing_max_id + 1, 2), 3, '0');

    SET NEW.id = CONCAT('U', new_id);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
