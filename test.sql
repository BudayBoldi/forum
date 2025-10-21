-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Okt 21. 11:25
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `test`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kartyak`
--

CREATE TABLE `kartyak` (
  `Szam` int(11) NOT NULL,
  `Nev` varchar(100) NOT NULL,
  `Iras` varchar(100) DEFAULT NULL,
  `Kep` varchar(100) DEFAULT NULL,
  `Link` varchar(100) DEFAULT NULL,
  `Ker` varchar(100) DEFAULT NULL,
  `Tart` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- A tábla adatainak kiíratása `kartyak`
--

INSERT INTO `kartyak` (`Szam`, `Nev`, `Iras`, `Kep`, `Link`, `Ker`, `Tart`) VALUES
(1, 'Cikk 1', 'Az úgy volt hogy ...', 'logo.jpg', '#', 'forum_hirek', ''),
(2, 'Cikk 2', 'Az ugy volt hogy ...', 'logo.jpg', '#', 'forum_hirek', ''),
(3, 'Cikk 3', 'Az meg ugy ...', 'logo.jpg', '#', 'szalap_hirek', ''),
(4, 'Cikk 4', 'Ja meg meg az ...', 'logo.jpg', '#', 'szalap_hirek', ''),
(5, 'Cikk 5', 'Meg meg az ...', 'logo.jpg', '#', 'gyujto_hirek', ''),
(6, 'Cikk 6', 'Meg meg az ...', 'logo.jpg', '#', 'gyujto_gondolatok', ''),
(7, 'Cikk 7', 'Meg meg az ...', 'logo.jpg', '#', 'sztars_hirek', ''),
(8, 'Cikk 8', 'Meg meg az ...', 'logo.jpg', '#', 'sztars_inmemoriam', ''),
(9, 'Cikk 9', 'Meg meg az ...', 'logo.jpg', '#', 'oszk_hirek', ''),
(10, 'Cikk 10', 'Meg meg az ...', 'logo.jpg', '#', 'oszk_magunkrol', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kommentek`
--

CREATE TABLE `kommentek` (
  `Nev` varchar(50) DEFAULT NULL,
  `Datum` datetime DEFAULT NULL,
  `Szoveg` text DEFAULT NULL,
  `Link` varchar(25) DEFAULT NULL,
  `Ker` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- A tábla adatainak kiíratása `kommentek`
--

INSERT INTO `kommentek` (`Nev`, `Datum`, `Szoveg`, `Link`, `Ker`) VALUES
('sabatus', '2025-05-25 20:27:06', '<a href=\"#\">Széchenyi-Serlegbeszéd 2025, </a> Remek találkozás, remek szervezés.', '#', 'forum_hirek'),
('sabatus', '2025-06-04 19:59:42', '<a href=\"#\">A 165 éve elhunyt gróf Széchenyi István, </a>\r\nSzép gondolatok', '#', 'forum_hirek'),
('almassyv', '2021-01-28 21:40:02', '<a href=\"#\">Az én Széchenyim, </a>\r\nKedves Miklós, ?lyan beszédes és a néz?höz szóló Széchenyit formáztál gipszbe, hogy ez önmagáért beszél a szerz?jér?l és az érintettr?l egyaránt.\r\nKöszönöm, és várom, hogy ehhez hasonlóan h? Széchenyit faragj abból a nemes fából.\r\nAl-Va azaz Almássyné Vali', '#', 'gyujto_gondolatok'),
('budaymiklos', '2021-01-07 09:14:58', '<a href=\"#\">Jelentés a Hitel angol nyelvre fordításának helyzetér?l, </a>\r\nZsiray László véleménye:\r\nSzia Miklós, kösz a felhívást, több helyre fogom továbbítani a leveledet, Svájcba és Németországba is, az ott él? rokonaimnak.\r\nCsak így tovább, sok er?t a továbbiakhoz. Minden tiszteletem az elszántságodhoz.', '#', 'szalap_hirek'),
('budaymiklos', '2021-01-07 09:15:48', '<a href=\"#\">Jelentés a Hitel angol nyelvre fordításának helyzetér?l, </a>\r\nStégerné Tusa Cecília véleménye :\r\nGratulálok ehhez a nagyszer? projekthez és köszönöm, hogy tájékoztattál róla. Én az Elefántcsont-tornyomban vajmi keveset tudtam err?l, de örülök, hogy még mindig ilyen aktívan szervezed és intézed a \"Széchenyi-ügyeket\".\r\nTermészetesen a tájékoztatót továbbküldöm ismer?seimnek, illetve a Széchenyi Kör levelez?listáján is elküldjük a tájékoztatást.', '#', 'szalap_hirek'),
('budaymiklos', '2021-01-08 21:01:48', '<a href=\"#\">Jelentés a Hitel angol nyelvre fordításának helyzetér?l, </a>\r\nZwickl József véleménye:\r\nGratulálok a Hitel angol nyelv? fordításához. Ezek szerint jól pályáztál és eredményesen lobbiztál.\r\nJó hogy az illetékesek felfedezték ebben a Széchenyi-ismeretek nemzetközi terjesztését és ezzel együtt országunk jó hírének gyarapítását.\r\nVégre sikerülhet a fordítás anyagi hátterének megteremtése, amely a korábbi ígéretekhez képest elhúzódott.\r\nTovábbi jó munkát és sok sikert kívánok a megvalósításhoz.', '#', 'szalap_hirek'),
('budaymiklos', '2021-01-08 21:05:38', '<a href=\"#\">Jelentés a Hitel angol nyelvre fordításának helyzetér?l, </a>\r\nBujdosó Balázs dr. véleménye:\r\nNem vitás , hogy ez nagy eredmény , de - ha a Jóisten engedi - egyszer majd németre is le kellene fordítani, hogy világossá váljon , nem csak \"bedolgozók\" vagyunk a német élettérben !', '#', 'szalap_hirek'),
('budaymiklos', '2021-08-02 08:26:36', '<a href=\"#\">Elhunyt Papp Éva, </a>\r\nNagyon megütött a halálhír. Éva er?s oszlopa, motorja volt az Országos Széchenyi Körnek, de az egész Széchenyista mozgalomnak is. Tanulmányozta a Széchenyi-írásokat, leleményesen választott témákat az életm?b?l és az el?adásaival magával ragadta a hallgatóságot. Nem csak Szegeden, hanem az egész országban hírnevet szerzett, népszer?sítette Széchenyit, figyeltek a szavára. Kedves, közvetlen személyét nagyon megszerettem, és úgy gondolom, hogy ezzel mindenki így lehetett. Sokat veszítettünk távozásával, az emlékét meg?rzöm!', '#', 'sztars_inmemoriam'),
('budaymiklos', '2021-08-03 19:05:57', '<a href=\"#\">Elhunyt Papp Éva, </a>\r\nEgervölgyi Dezs? írta:\r\n15-én még egy kiállításról szóló el?adásra hívta fel a figyelmünket, és most a „HIR”. Megdöbbentett!\r\n\r\nAlig találkoztunk, akkor váltottunk pár mondatot, csak Széchenyi volt a téma.\r\n\r\nA Széchenyi Fórumban megjelent hírekb?l és az archívumból, (könyvtárból) ismertem tevékenységét, melyet az elkötelezettség, elhivatottság jellemzett.\r\n\r\nSzegényebbek lettünk, szegényebb lett az Országos Széchenyi Kör.\r\n\r\nNyugodj békében!', '#', 'sztars_inmemoriam'),
('budaymiklos', '2021-11-02 17:26:43', '<a href=\"#\">In memoriam Almássy Lászlóné (1940-2021), </a>\r\nEgervölgyi Dezs? írta\r\nValira emlékezve: el?kerestem 2015-ben, a gy?ri közgy?lésen készült fényképet, mert az emlék, és az segít emlékezni.\r\nBalra áll Imre, középen, Vali, jobb szélen Dezs?.\r\nKüldök egy emléklapot, írom barátomnak: „Igaz nem száz, nem is ötven évr?l szól, de úgy érzem, már a száznak, az ötvennek a töredékére is jó emlékezni, mert bizonytalan, hogy lesz-e bel?le ötven.”\r\nNem gondoltam a bizonytalanságra, a bekövetkezhet?, váratlan eseményre, csak Nagycenk járt az eszembe, és a barátaim, akikkel sok szép napot töltöttünk Széchenyi szellemisége árnyékában.\r\n„Valika!” Örültem, amikor tavaly, Széchényi Istvánra emlékezve megdicsértél Tamással együtt engem is. Jól eset, mint korábban minden alkalommal, ha leveledet olvastam.\r\nAzóta eltelt egy év, és emlék marad számomra a közös fényképünk.\r\nNehezen írom e pár sort, mert rövid az id?, hogy széchenyis kapcsolatunkat igazán feldolgozzam lelkileg.\r\nTöbb id?re lesz szükségem, ha a Teremt? engedi.\r\nKívánok örök nyugodalmat.', '#', 'oszk_hirek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tabla`
--

CREATE TABLE `tabla` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Pwd` varchar(50) DEFAULT NULL,
  `Age` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- A tábla adatainak kiíratása `tabla`
--

INSERT INTO `tabla` (`ID`, `Name`, `Pwd`, `Age`) VALUES
(1, 'Falucskai Virág', '$1$2025-10-$UdjmZFq9YyASsmHAXuazo/', '2025-10-21 11:22:55');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kartyak`
--
ALTER TABLE `kartyak`
  ADD PRIMARY KEY (`Szam`);

--
-- A tábla indexei `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kartyak`
--
ALTER TABLE `kartyak`
  MODIFY `Szam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `tabla`
--
ALTER TABLE `tabla`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
