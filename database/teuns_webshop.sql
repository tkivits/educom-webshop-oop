-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 03 aug 2022 om 15:10
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teuns_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `ID` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`ID`, `user_id`, `total`) VALUES
(6, 1, '51.96'),
(7, 1, '51.96'),
(8, 1, '86.96'),
(9, 2, '45.98'),
(10, 1, '42.97'),
(11, 1, '42.97'),
(12, 1, '64.94'),
(13, 1, '44.98'),
(14, 2, '49.95'),
(15, 2, '53.98'),
(16, 2, '52.97'),
(17, 2, '200.00'),
(18, 1, '89.96'),
(19, 1, '89.96'),
(20, 1, '43.98'),
(21, 2, '22.99'),
(22, 1, '154.93');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_item`
--

CREATE TABLE `order_item` (
  `ID` int(3) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order_item`
--

INSERT INTO `order_item` (`ID`, `order_id`, `product_id`, `quantity`) VALUES
(6, 6, 3, 1),
(7, 6, 4, 3),
(8, 7, 3, 1),
(9, 7, 4, 3),
(10, 8, 1, 1),
(11, 8, 3, 2),
(12, 8, 4, 1),
(13, 8, 5, 1),
(14, 9, 5, 2),
(15, 10, 4, 2),
(16, 10, 5, 1),
(17, 11, 4, 2),
(18, 11, 5, 1),
(19, 12, 2, 1),
(20, 12, 4, 5),
(21, 13, 3, 1),
(22, 13, 5, 1),
(23, 14, 4, 5),
(24, 15, 1, 1),
(25, 15, 3, 2),
(26, 16, 2, 2),
(27, 16, 5, 1),
(28, 17, 1, 20),
(29, 18, 3, 2),
(30, 18, 5, 2),
(31, 20, 3, 2),
(32, 21, 5, 1),
(33, 22, 3, 6),
(34, 22, 5, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `ID` int(3) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `item_description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename_image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`ID`, `name`, `price`, `item_description`, `filename_image`) VALUES
(1, 'Daar Waar De Rivierkreeften Zingen', '10.00', 'Een onwaarschijnlijk succesverhaal. Ruim 6 miljoen exemplaren verkocht in de VS! Kya Clark is in haar eentje opgegroeid in het moeras van Barkley Cove in North Carolina, afgesloten van de bewoonde wereld. Om zichzelf te onderhouden ruilt ze vis, en groenten uit haar moestuin voor andere levensmiddelen. Ze voelt zich er thuis, beschouwt de natuur als haar leerschool. Maar als ze in aanraking komt met twee jongemannen uit de stad ontdekt ze dat er ook een andere wereld is. Wanneer een van hen dood wordt gevonden, valt de verdenking onmiddellijk op Kya.', 'Images/Daar_Waar_De_Rivierkreeften_Zingen.png'),
(2, 'De Geheimen Van De Kostschool', '14.99', 'In de detective De geheimen van de kostschool van bestsellerauteur Lucinda Riley onderzoekt detective Jazz de moord op een vijftienjarige jongen. En de tijd dringt, want er vallen meer slachtoffers… In de spannende roman De geheimen van de kostschool van Lucinda Riley, bekend van de internationale hitserie De zeven zussen wordt op een kleine, exclusieve kostschool in Norfolk een leerling dood aangetroffen. De schokkende gebeurtenis is volgens het schoolhoofd een tragisch ongeval, maar de politie is daar niet zo zeker van. Detective Jazz Hunter wordt op de zaak gezet en probeert door te dringen in de gesloten wereld van de kostschool. Maar al snel nemen de gebeurtenissen een verontrustende wending, en blijkt er veel meer aan de hand dan een noodlottig ongeval.', 'Images/De_Geheimen_Van_De_Kostschool.png'),
(3, 'De Kracht Van Keuze', '21.99', 'In De kracht van keuze, haar meest persoonlijke boek tot nu toe, neemt Kelly je mee in haar leven en deelt haar kijk op thema’s als vriendschap, ambitie, opvoeding, liefde, verlies en zelfvertrouwen. Het boek voelt als een goed gesprek met een vriendin: zonder voor jou te bepalen wat je moet doen, geeft Kelly je inzichten om ook in jouw leven de juiste keuzes te maken, de keuzes die bij jou passen, en zo de regie terug te pakken op allerlei vlakken.', 'Images/De_Kracht_Van_Keuze.png'),
(4, 'It Ends With Us', '9.99', 'SOMETIMES the ONE WHO LOVES YOU IS the ONE WHO HURTS YOU the MOST. Lily hasnt always had it easy, but thats never stopped her from working hard for the life she wants. Shes come a long way from the small town in Maine where she grew up - she graduated from college, moved to Boston, and started her own business. So when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lilys life suddenly seems almost too good to be true. Ryle is assertive, stubborn, maybe even a little arrogant. Hes also sensitive, brilliant, and has a total soft spot for Lily, but Ryles complete aversion to relationships is disturbing. As questions about her new relationship overwhelm her, so do thoughts of Atlas Corrigan - her first love and a link to the past she left behind. He was her kindred spirit, her protector. When Atlas suddenly reappears, everything Lily has built with Ryle is threatened. With this bold and deeply personal novel, Colleen Hoover delivers a heart-wrenching story that breaks exciting new ground for her as a writer. It Ends With Us is an unforgettable tale of love that comes at the ultimate price.', 'Images/It_Ends_With_Us.png'),
(5, 'Overprikkeld Brein', '22.99', 'Het handboek \'Overprikkeld brein\' van Brain Balance Expert Charlotte Labee biedt concrete handvatten voor meer rust en balans. Brain Balance Expert Charlotte Labee deelt in \'Overprikkeld brein\' de laatste wetenschappelijke kennis over ons vaak overprikkelde en oververmoeide brein. Charlotte helpt je om symptomen van overprikkeling te herkennen en geeft concrete handvatten om je brein en leven weer in balans te krijgen. Ze laat zien hoe je door aan de slag te gaan met voeding, beweging, ontspanning en verbinding binnen 10 weken meer rust ervaart en je energie terugkrijgt.', 'Images/Overprikkeld_Brein.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `ID` int(2) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `email`, `name`, `password`) VALUES
(1, 'coach@man-kind.nl', 'Geert Weggemans', 'halt!'),
(2, 't.kivits@hotmail.com', 'Teun Kivits', 'test'),
(4, 't.kivits@hotmail.com', 'Teun Kivits', 'test');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `order_item`
--
ALTER TABLE `order_item`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
