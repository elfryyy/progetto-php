-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              5.7.17-log - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database gioielli
CREATE DATABASE IF NOT EXISTS `gioielli` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gioielli`;

-- Dump della struttura di tabella gioielli.carrello
CREATE TABLE IF NOT EXISTS `carrello` (
  `username` char(50) DEFAULT NULL,
  `cod_prodotto` int(11) DEFAULT NULL,
  KEY `username` (`username`),
  KEY `cod_prodotto` (`cod_prodotto`),
  CONSTRAINT `cod_prodotto` FOREIGN KEY (`cod_prodotto`) REFERENCES `prodotti` (`cod_prodotto`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella gioielli.carrello: ~2 rows (circa)
REPLACE INTO `carrello` (`username`, `cod_prodotto`) VALUES
	('elfry', 2),
	('giadi', 12);

-- Dump della struttura di tabella gioielli.prodotti
CREATE TABLE IF NOT EXISTS `prodotti` (
  `cod_prodotto` int(11) NOT NULL DEFAULT '0',
  `nome` char(50) NOT NULL DEFAULT '',
  `prezzo` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `categoria` char(50) NOT NULL DEFAULT '',
  `descrizione` text NOT NULL,
  `specifiche` text NOT NULL,
  `foto1` char(50) NOT NULL,
  `foto2` char(50) NOT NULL,
  `foto3` char(50) DEFAULT NULL,
  `foto4` char(50) DEFAULT NULL,
  `foto5` char(50) DEFAULT NULL,
  `sconto` int(11) DEFAULT NULL,
  `nuovo` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_prodotto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella gioielli.prodotti: ~18 rows (circa)
REPLACE INTO `prodotti` (`cod_prodotto`, `nome`, `prezzo`, `categoria`, `descrizione`, `specifiche`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `sconto`, `nuovo`) VALUES
	(1, 'Solis Ribbed Ring Round Diamond 0.5 Carat', 260.000000, 'Rings', 'Inspired by Jennie\'s mother\'s vintage pleated ring, the Solis collection represents energy and strength. Our Solis Ring features a round brilliant diamond prong set in a 14k solid gold ribbed band.', '14k solid gold—always. Non-hollow. Hollow.Average weight: 5,37g.Band width: 5mm (front), 3,5mm (back).Carat weight: 0,50ctw', 'r-solis1.jpg', 'r-solis2.jpg', 'r-solis3.jpg', 'r-solis4.jpg', 'r-solis5.jpg', NULL, NULL),
	(2, 'Luna Layered Ring Emerald', 210.000000, 'Rings', 'An update to our best selling Françoise Ellipse Ring—with an added gemstone for texture and character.', '14k solid gold—always. Non-hollow. Hollow. Average weight: 5,37g.Band width: 5mm (front), 3,5mm (back).Carat weight: 0,50ctw.Shape: Emerald', 'r-emerald1.jpg', 'r-emerald2.jpg', NULL, NULL, NULL, NULL, 1),
	(3, 'Luna Layered Ring Tourmaline', 210.000000, 'Rings', 'An update to our best selling Françoise Ellipse Ring—with an added gemstone for texture and character.', '14k solid gold—always. Non-hollow. Hollow. Average weight: 5,37g.Band width: 5mm (front), 3,5mm (back).Carat weight: 0,50ctw.Shape: Tourmaline', 'r-tourmaline1.jpg', 'r-tourmaline2.jpg', NULL, NULL, NULL, NULL, 1),
	(4, 'Luna Layered Ring Sapphire', 210.000000, 'Rings', 'An update to our best selling Françoise Ellipse Ring—with an added gemstone for texture and character.', '14k solid gold—always. Non-hollow. Hollow. Average weight: 5,37g.Band width: 5mm (front), 3,5mm (back).Carat weight: 0,50ctw.Shape: Sapphire', 'r-sapphire1.jpg', 'r-sapphire2.jpg', NULL, NULL, NULL, NULL, 1),
	(5, 'Classic Cigar Band Ring', 95.000000, 'Rings', 'Historically, cigar bands were used as decorative wrapping placed around cigars, and jewelers began using them as inspiration for wedding bands. Our Classic Cigar Band can be worn alone to make a statement, or stacked with eternity diamonds.', '14k solid gold—always.Average weight: 5,6g.Band width: 8.4mm (front), 7mm (back)', 'r-cigar1.jpg', 'r-cigar2.jpg', '', '', '', NULL, NULL),
	(6, 'North Star Signet Ring Diamond', 50.400000, 'Rings', 'Inspired by the two most resilient people in Jennie\'s life—her mother and grandmother. This ring serves as a reminder to follow your intuition', '14k solid gold—always.Hollow.Weight: Approx 1,8g.Measurements: 6,5mm x 5,5mm. Carat weight: 0,06ctw.Diamond clarity: SI 1-2\r\n', 'r-star1.jpg', 'r-star2.jpg', 'r-star3.jpg', 'r-star4.jpg', 'r-star5.jpg', 10, NULL),
	(7, 'Bold Hoop Earrings Extra Small', 67.000000, 'Earrings', 'Overstated hoops dress up any look. Luxuriously weighted—but won\'t weigh you down.', '14k solid gold—always. Weight: 1,7g per earring Thickness: 6,5mm. Total diameter: 23mm.Hinged back closure', 'e-bold-hoop1.jpg', 'e-bold-hoop2.jpg', 'e-bold-hoop3.jpg', 'e-bold-hoop4.jpg', 'e-bold-hoop5.jpg', NULL, 1),
	(8, 'Classic-Hoop-Earring-Medium', 40.000000, 'Earrings', 'Elevate your everyday look with our best selling classic hoops. Featuring a high polish finish and simple clasp—these hoops will remain a wardrobe staple that you’ll reach for day to night.', '14k solid gold—always.Weight: 1,2g per earring.Thickness: 4mm.Total diameter: 30mm.Hinged back closure', 'e-hoop1.jpg', 'e-hoop2.jpg', 'e-hoop3.jpg', 'e-hoop4.jpg', 'e-hoop5.jpg', 20, NULL),
	(9, 'Bold Teardrop Hoop Earrings', 85.000000, 'Earrings', 'Reminiscent of family heirlooms—start a story of your own with these bold hollow hoop', '14k solid gold—alwaysTotal weight: 5g.Hollow.Height: 20mm.Width: 8mm.Secure snap hinge closure', 'e-tear1.jpg', 'e-tear2.jpg', 'e-tear3.jpg', 'e-tear4.jpg', 'e-tear5.jpg', 15, NULL),
	(10, 'Baroque Pearl Hoop Earrings', 49.000000, 'Earrings', 'These earrings feature baroque pearls hanging from our Classic Hoop Earrings. Baroque pearls are naturally formed in the mollusk, and their finite beauty is derived from asymmetric silhouettes—making each pearl unique.', '14k solid gold—always.Weight: Approx 2,5g.Hoop: 20mm diameter, 4mm thick.Pearl: Approx 15mm x 5mm.Pearls are removable', 'e-baroque1.jpg', 'e-baroque2.jpg', 'e-baroque3.jpg', 'e-baroque4.jpg', 'e-baroque5.jpg', NULL, NULL),
	(11, 'Maison Oval Locket Necklace', 57.000000, 'Necklaces', 'Home is where the heart is. Our lockets represent a moment in time—keep them as family heirlooms for generations. Wear blank or engrave your signature lett', '14k solid gold—always.Hinge is silver for durability.Pendant weight: 1,7g.Measurements: 12,5mm x 15mm.Carat weight: 0,06ctw.Photo dimensions: 8mm x 11mm', 'n-oval1.jpg', 'n-oval2.jpg', 'n-oval3.jpg', 'n-oval4.jpg', 'n-oval5.jpg', 10, NULL),
	(12, 'Ribbed Maison Heart Locket Necklace Diamond', 60.000000, 'Necklaces', 'Home is where the heart is. Our lockets represent a moment in time—keep them as family heirlooms for generations. This locket features a star set diamond and Kinn\'s signature ribbing. To add a photo inside, open the locket and carefully press the photo into place.', '14k solid gold—always.Hinge is silver for durability.Pendant weight: 1,7g.Measurements: 12mm x 12mm.Carat weight: 0,01ctw.Photo dimensions: 10mm x 10mm heart shape', 'n-heart1.jpg', 'n-heart2.jpg', '', '', '', 15, NULL),
	(13, 'Teardrop Necklace', 45.000000, 'Necklaces', 'Our Teardrop Necklace is an unforgettable piece that is here to stay. Simple and elegant—wear from day to night', '14k solid gold—always.Average weight: 2,1g.Pendant measurements: 11,5mm x 5,5mm.Micro Rolo Link chain', 'n-tear1.jpg', 'n-tear2.jpg', 'n-tear3.jpg', 'n-tear4.jpg', 'n-tear5.jpg', NULL, NULL),
	(14, 'Baroque Pearl Necklace', 45.000000, 'Necklaces', 'Featuring our best selling Baroque Pearl Pendant—pair it with any of our necklace chains. Baroque pearls are naturally formed in the mollusk, and their finite beauty is derived from asymmetric silhouettes—making each pearl unique.', '14k solid gold—always.Pendant weight: 1,8g.Pearl height: Approx 11mm.Bail height: 6,3mm', 'n-baroque1.jpg', 'n-baroque2.jpg', NULL, NULL, NULL, NULL, NULL),
	(15, 'Maison Oval Locket', 37.000000, 'Pendants', 'Home is where the heart is. Our lockets represent a moment in time—keep them as family heirlooms for generations. Wear blank or engrave your signature letter.', '14k solid gold—always.Hinge is silver for durability.Weight: 1,7g.Measurements: 12.5mm x 15mm.Photo dimensions: 8mm x 11mm.Chain sold separately', 'p-oval1.jpg', 'p-oval2.jpg', 'p-oval3.jpg', 'p-oval4.jpg', 'p-oval5.jpg', 20, NULL),
	(16, 'North Star Pendant Diamond', 45.000000, 'Pendants', 'When you lose your way, let the North Star guide you. Featuring a star set natural diamond—this classic modern heirloom is meant to be passed down for generations.', '14k solid gold—always.Non-hollow.Weight: 3g.Measurements: 9mm x 12mm.Carat weight: 0,06ctw.Diamond clarity: SI1-2.Chain sold separately', 'p-star1.jpg', 'p-star2.jpg', NULL, NULL, NULL, NULL, NULL),
	(17, 'Brooklyn Baguette Pendant Emerald', 150.000000, 'Pendants', 'The Brooklyn Baguette Pendant features a beautiful emerald, and is meant to hang from your favorite chain. Carefully placed in a vintage inspired 14k solid gold setting—pass this modern heirloom down for generations to come.', '14k solid gold—always.Weight: Approx 1,3g.Carat weight: 75ctw.Chain sold separately', 'p-emerald1.jpg', 'p-emerald2.jpg', 'p-emerald3.jpg', 'p-emerald4.jpg', 'p-emerald5.jpg', NULL, 1),
	(18, 'Ribbed Maison Heart Locket Diamond', 42.000000, 'Pendants', 'Home is where the heart is. Our lockets represent a moment in time—keep them as family heirlooms for generations. This locket features a star set diamond and Kinn\'s signature ribbing. To add a photo inside, open the locket and carefully press the photo into place.', '14k solid gold—always.Hinge is silver for durability.Weight: 1,7g.Measurements: 12mm x 12mm.Total carat weight: 0,01ctw.Photo dimensions: 10mm x 10mm heart shape', 'p-heart1.jpg', 'p-heart2.jpg', 'p-heart3.jpg', 'p-heart4.jpg', 'p-heart5.jpg', 10, NULL);

-- Dump della struttura di tabella gioielli.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `nome` char(50) DEFAULT NULL,
  `cognome` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `telefono` char(50) DEFAULT NULL,
  `indirizzo` char(50) DEFAULT NULL,
  `comune` char(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella gioielli.utenti: ~2 rows (circa)
REPLACE INTO `utenti` (`username`, `password`, `nome`, `cognome`, `email`, `telefono`, `indirizzo`, `comune`) VALUES
	('elfry', 'asd', 'elfrida', 'gjata', 'elfrida.gjata@gmail.com', '3282744635', 'Via adda 6', 'vimercate'),
	('giadi', 'asd', 'giada', 'brescia', 'giadabrescia2006@gmail.com', '3888898610', 'via adda 6', 'vimercate');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
