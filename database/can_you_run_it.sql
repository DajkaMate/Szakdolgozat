-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 09. 22:58
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `can_you_run_it`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bookmarks`
--

CREATE TABLE `bookmarks` (
  `INDEX` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `G_ID` varchar(50) NOT NULL,
  `B_TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `bookmarks`
--

INSERT INTO `bookmarks` (`INDEX`, `U_ID`, `G_ID`, `B_TIMESTAMP`) VALUES
(109, 49, '13', '2023-04-04 17:26:38');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `brands`
--

CREATE TABLE `brands` (
  `BRAND_NAME` varchar(100) NOT NULL,
  `BRAND_TYPE` varchar(100) NOT NULL,
  `LOGO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `brands`
--

INSERT INTO `brands` (`BRAND_NAME`, `BRAND_TYPE`, `LOGO`) VALUES
('Amd', 'CPU', 'Ryzen.jpg'),
('Amd', 'GPU', 'Amd.jpg'),
('ATI', 'GPU', 'ATI.jpg\r\n'),
('Intel', 'CPU', 'intel.jpg'),
('Intel', 'GPU', 'arc.jpg\r\n'),
('NVIDIA', 'GPU', 'nvidia.jpg\r\n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cpu`
--

CREATE TABLE `cpu` (
  `CPU_ID` int(11) NOT NULL,
  `CPU_MANUF` varchar(50) NOT NULL,
  `CPU_BRANDNAME` varchar(50) NOT NULL,
  `CPU_LINEUP` varchar(255) NOT NULL,
  `CPU_NAME` varchar(50) NOT NULL,
  `CPU_FREQ` int(11) NOT NULL,
  `CPU_BOOST` int(11) NOT NULL,
  `CPU_CORES` int(50) NOT NULL,
  `CPU_THREADS` int(50) NOT NULL,
  `CPU_GEN` varchar(100) NOT NULL,
  `CPU_GRAPHICS` varchar(50) NOT NULL,
  `CPU_CORENAME` varchar(100) NOT NULL,
  `CPU_COOLER` double NOT NULL,
  `CPU_PRICE` int(11) NOT NULL,
  `CPU_PREF` int(11) NOT NULL,
  `CPU_DATE` date NOT NULL,
  `CPU_IMG` varchar(100) NOT NULL DEFAULT 'img\\upload-cpu.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `cpu`
--

INSERT INTO `cpu` (`CPU_ID`, `CPU_MANUF`, `CPU_BRANDNAME`, `CPU_LINEUP`, `CPU_NAME`, `CPU_FREQ`, `CPU_BOOST`, `CPU_CORES`, `CPU_THREADS`, `CPU_GEN`, `CPU_GRAPHICS`, `CPU_CORENAME`, `CPU_COOLER`, `CPU_PRICE`, `CPU_PREF`, `CPU_DATE`, `CPU_IMG`) VALUES
(1, 'Intel', 'Core', 'i9 ', '13900K', 3000, 5800, 24, 32, 'Core i9', 'UHD Graphics 770', 'Raptor Lake-S', 0, 589, 142, '2022-09-27', 'img/cpu-img/core-i9-13900k.png'),
(2, 'Intel', 'Core', 'i7', '13700K', 3400, 5400, 16, 24, 'Core i7', 'UHD Graphics 770', 'Raptor Lake-S', 0, 409, 141, '2022-09-27', 'img/cpu-img/core-i7-13700k.png'),
(3, 'AMD', 'Ryzen', '9', '7950X', 3400, 5700, 16, 32, 'Ryzen 9', 'Radeon Graphics', 'Raphael', 0, 699, 140, '2022-09-27', 'img/cpu-img/ryzen-9-7950x.png'),
(4, 'AMD', 'Ryzen', '9', '7900X', 4700, 5600, 12, 24, 'Ryzen 9', 'Radeon Graphics', 'Raphael', 0, 549, 139, '2022-09-27', 'img/cpu-img/ryzen-9-7900x.png'),
(5, 'Intel', 'Core', 'i5', '13600K', 3500, 5100, 14, 20, 'Core i5', 'UHD Graphics 770', 'Raptor Lake-S', 5, 319, 138, '2022-09-27', 'img/cpu-img/core-i5-13600k.png'),
(6, 'AMD', 'Ryzen', '7', '7700X', 4500, 5400, 8, 16, 'Ryzen 7', 'Radeon Graphics', 'Raphael', 0, 399, 137, '2022-09-27', 'img/cpu-img/ryzen-7-7700x.png'),
(7, 'AMD', 'Ryzen', '5', '7600X', 4700, 5300, 6, 12, 'Ryzen 5', 'Radeon Graphics', 'Raphael', 0, 299, 136, '2022-09-27', 'img/cpu-img/ryzen-5-7600k.png'),
(8, 'Intel', 'Core', 'i9', '12900K', 3200, 5200, 15, 24, 'Core i9', 'UHD Graphics 770', 'Alder Lake-S', 0, 599, 135, '2021-10-04', 'img/cpu-img/core-i9-12900k.png'),
(9, 'Intel', 'Core', 'i7', '12700K', 3600, 5000, 12, 20, 'Core i7', 'UHD Graphics 770', 'Alder Lake-S', 0, 409, 134, '2021-10-04', 'img/cpu-img/core-i7-12700k.png'),
(10, 'Intel', 'Core', 'i5', '12600K', 3700, 4900, 10, 16, 'Core i5', 'UHD Graphics 770', 'Alder Lake-S', 0, 289, 133, '2021-10-04', 'img/cpu-img/core-i5-12600k.png'),
(11, 'AMD', 'Ryzen', '7', '5800X3D', 3400, 4500, 8, 16, 'Ryzen 7', '', 'Vermeer', 0, 289, 132, '2022-04-20', 'img/cpu-img/ryzen-7-5800x3D.png'),
(12, 'Intel', 'Core', 'i9', '11900K', 3500, 5300, 8, 16, 'Core i9', 'UHD Graphics 750', 'Rocket Lake', 0, 539, 131, '2021-03-16', 'img/cpu-img/core-i9-11900k.png'),
(13, 'AMD', 'Ryzen', '9', '5900X', 3700, 4800, 12, 24, 'Ryzen 9', '', 'Vermeer', 0, 499, 130, '2021-10-05', 'img/cpu-img/ryzen-9-5900x.png'),
(14, 'AMD', 'Ryzen', '7 ', '5800X', 3800, 4700, 8, 16, 'Ryzen 7', '', 'Vermeer', 0, 0, 129, '2020-11-05', 'img/cpu-img/Ryzen-7-5000.png'),
(15, 'AMD', 'Ryzen', '7 ', '5700X', 3400, 4600, 8, 16, 'Ryzen 7', '', 'Vermeer', 0, 299, 128, '2022-04-04', 'img/cpu-img/ryzen-7-5700x.png'),
(16, 'Intel', 'Core', 'i7', '11700K', 3600, 5000, 8, 16, 'Core i7', '', 'Rocket Lake', 0, 410, 127, '2021-03-16', 'img/cpu-img/core-i7-11700k.png'),
(17, 'Intel', 'Core', 'i7', '10700K', 3600, 5000, 8, 16, 'Core i7', 'UHD Graphics 750', 'Rocket Lake', 0, 410, 126, '2021-03-16', 'img/cpu-img/core-i7-10700k.png'),
(18, 'Intel', 'Core', 'i9', '10900K', 3700, 5300, 10, 20, 'Core i9', 'UHD Graphics 630', 'Comet Lake', 0, 499, 125, '2020-04-30', 'img/cpu-img/core-i9-10900k.png'),
(19, 'AMD', 'Ryzen', '9', '5950X', 3400, 4900, 16, 32, 'Ryzen 9', '', 'Vermeer', 0, 799, 124, '2020-10-05', 'img/cpu-img/ryzen-9-5950x.png'),
(20, 'Intel', 'Core', 'i9', '9900KS', 4000, 5000, 8, 16, 'Core i9', 'UHD 630', 'Coffee Lake-R', 0, 1499, 123, '2021-03-16', 'img/cpu-img/core-i9-9900ks.png'),
(21, 'Intel', 'Core', 'i5', '11600K', 3900, 4900, 6, 12, 'Core i5', 'UHD Graphics 750', 'Rocket Lake', 0, 262, 122, '2021-03-16', 'img/cpu-img/core-i5-11600k.png'),
(22, 'Intel', 'Core', 'i7', '10700K', 3800, 5100, 8, 16, 'Core i7', 'UHD Graphics 630', 'Comet Lake', 0, 410, 121, '2020-04-30', 'img/cpu-img/core-i7-10700k.png'),
(23, 'AMD', 'Ryzen', '5', '5600X', 3700, 4600, 6, 12, 'Ryzen 5', '', 'Vermeer', 0, 299, 120, '2020-10-05', 'img/cpu-img/ryzen-5-5600x.png'),
(24, 'Intel', 'Core', 'i9', '9900K', 3600, 5000, 8, 16, 'Core i9', 'UHD Graphics 630', 'Coffee Lake-R', 0, 488, 119, '2018-10-19', 'img/cpu-img/core-i9-9900k.png'),
(25, 'Intel', 'Core', 'i5', '12400', 2500, 4400, 6, 12, 'Core i5', 'UHD Graphics 730', 'Alder Lake-S', 1, 199, 118, '2022-01-04', 'img/cpu-img/core-i5-12400.png'),
(26, 'Intel', 'Core', 'i7', '9700K', 3600, 4900, 8, 8, 'Core i7', 'UHD Graphics 630', 'Coffee Lake', 0, 385, 117, '2018-10-19', 'img/cpu-img/core-i7-9700k.png'),
(27, 'Intel', 'Core', 'i3', '12300', 3500, 4400, 4, 8, 'Core i3', 'UHD Graphics 730', 'Alder Lake-S', 1, 143, 116, '2021-01-01', 'img/cpu-img/core-i3-12300.png'),
(28, 'Intel', 'Core', 'i5', '10600K', 4100, 4800, 6, 12, 'Core i5', 'UHD Graphics 630', 'Comet Lake', 0, 262, 115, '2020-04-30', 'img/cpu-img/core-i5-10600k.png'),
(29, 'AMD', 'Ryzen', '9', '3900XT', 3800, 4700, 8, 16, 'Ryzen 9', '', 'Matisse 2', 0, 499, 114, '2020-07-07', 'img/cpu-img/ryzen-9-3900xt.png'),
(30, 'AMD', 'Ryzen', '7', '3800XT', 3500, 4700, 8, 16, 'Ryzen 7', '', 'Matisse 2', 0, 399, 113, '2020-07-07', 'img/cpu-img/ryzen-7-3800xt.png'),
(31, 'AMD', 'Ryzen', '9', '3950X', 3500, 4700, 16, 32, 'Ryzen 9', '', 'Matisse', 0, 710, 112, '2019-11-25', 'img/cpu-img/ryzen-9-3950x.png'),
(32, 'AMD', 'Ryzen', '9', '3900X', 3800, 4600, 12, 24, 'Ryzen 9', '', 'Matisse', 1, 499, 111, '2019-07-07', 'img/cpu-img/ryzen-9-3900x.png'),
(33, 'Intel', 'Core', 'i7', '8700K', 3700, 4700, 6, 12, 'Core i7', 'UHD Graphics 730', 'Coffee Lake', 0, 122, 110, '2017-11-05', 'img/cpu-img/core-i7-8700k.png'),
(34, 'Intel', 'Core', 'i3', '12100', 3300, 4300, 4, 8, 'Core i3', 'UHD Graphics 730', 'Alder Lake-S', 1, 122, 109, '2022-01-04', 'img/cpu-img/core-i3-12100.png'),
(35, 'AMD', 'Ryzen', '7', '3800X', 3900, 4500, 8, 16, 'Ryzen 7', '', 'Matisse', 1, 328, 108, '2019-07-07', 'img/cpu-img/ryzen-7-3800x.png'),
(36, 'AMD', 'Ryzen', '7', '3700X', 3600, 4400, 6, 16, 'Ryzen 7', '', 'Matisse', 1, 274, 107, '2019-07-07', 'img/cpu-img/ryzen-7-3700x.png'),
(37, 'AMD', 'Ryzen', '5', '5500', 3600, 4200, 6, 12, 'Ryzen 5', '', 'Cezanne', 1, 159, 106, '2022-04-04', 'img/cpu-img/ryzen-5-5500.png'),
(38, 'AMD', 'Ryzen', '5', '3600XT', 3800, 4500, 6, 12, 'Ryzen 5', '', 'Matisse 2', 1, 249, 105, '2019-07-07', 'img/cpu-img/ryzen-5-3600xt.png'),
(39, 'AMD', 'Ryzen', '5', '3600X', 3800, 4400, 6, 12, 'Ryzen 5', '', 'Matisse', 1, 237, 104, '2019-07-07', 'img/cpu-img/ryzen-5-3600x.png'),
(40, 'AMD', 'Ryzen', '5', '3600', 3800, 4200, 6, 12, 'Ryzen 5', '', 'Matisse', 1, 167, 103, '2019-07-07', 'img/cpu-img/ryzen-5-3600.png'),
(41, 'Intel', 'Core', 'i5', '9600K', 2700, 4600, 6, 6, 'Core i5', 'UHD 630', 'Coffee Lake', 0, 198, 102, '2018-10-19', 'img/cpu-img/core-i5-9600k.png'),
(42, 'Intel', 'Core', 'i5', '11400', 2600, 4400, 6, 12, 'Core i5', 'UHD Graphics 730', 'Rocket Lake', 1, 182, 101, '2021-04-16', 'img/cpu-img/core-i5-11400.png'),
(43, 'Intel', 'Core', 'i3', '11300', 3500, 4400, 6, 8, 'Core i3', 'UHD Graphics 730', 'Alder Lake-S', 1, 143, 100, '2022-01-01', 'img/cpu-img/core-i3-11300.png'),
(44, 'Intel', 'Core', 'i5', '8600K', 3600, 4300, 6, 6, 'Core i5', '', 'Comet Lake', 0, 257, 99, '2017-10-05', 'img/cpu-img/core-i5-8600k.png'),
(45, 'Intel', 'Core', 'i5', '10400', 2900, 4300, 6, 12, 'Core i5', 'UHD Graphics 630', 'Comet Lake', 1, 182, 98, '2020-04-30', 'img/cpu-img/core-i5-10400.png'),
(46, 'Intel', 'Core', 'i5', '9400 F', 2900, 4100, 6, 6, 'Core i5', '', 'Comet Lake', 1, 169, 97, '2019-01-08', 'img/cpu-img/core-i5-9400f.png'),
(47, 'Intel', 'Core', 'i3', '10300', 3700, 4400, 4, 8, 'Core i3', 'UHD Graphics 630', 'Comet Lake', 1, 143, 96, '2020-04-30', 'img/cpu-img/core-i3-10300.png'),
(48, 'AMD', 'Ryzen', '3', '3300X', 3800, 4300, 4, 8, 'Ryzen 3', '', 'Matisse', 1, 120, 95, '2020-04-24', 'img/cpu-img/ryzen-3-3300x.png'),
(49, 'Intel', 'Core', 'i3', '9340K F', 4000, 4600, 4, 4, 'Core i3', '', 'Coffee Lake', 1, 173, 94, '2019-01-08', 'img/cpu-img/core-i3-9340kf.png'),
(50, 'AMD', 'Ryzen', '3', '3100', 3600, 3900, 4, 8, 'Ryzen 3', '', 'Matisse', 1, 99, 93, '2020-04-24', 'img/cpu-img/ryzen-3-3100.png'),
(51, 'Intel', 'Core', 'i3', '9100F', 3600, 4200, 4, 4, 'Core i3', '', 'Coffee Lake', 0, 74, 92, '2016-04-23', 'img/cpu-img/core-i3-9100f.png'),
(52, 'Intel', 'Core', 'i5', '8400', 2800, 4000, 6, 6, 'Core i5', 'Intel UHD Graphics 630', 'Coffee Lake', 1, 0, 91, '2017-10-05', 'img/cpu-img/Core-i5-8400.png'),
(53, 'Intel', 'Core', 'i3', '8350K', 4000, 0, 4, 4, 'Core i3', 'UHD Graphics 630', 'Coffee Lake', 0, 168, 90, '2017-10-05', 'img/cpu-img/core-i3-8350k.png'),
(54, 'AMD', 'Ryzen', '7', '2700X', 3700, 4350, 8, 16, 'Ryzen 7', '', 'Zen', 1, 117, 89, '2018-04-19', 'img/cpu-img/ryzen-7-2700x.png'),
(55, 'Intel', 'Core', 'i3', '8100', 3600, 0, 4, 4, 'Core i3', 'UHD Graphics 630', 'Coffee Lake', 1, 117, 88, '2017-10-05', 'img/cpu-img/core-i3-8100.png'),
(56, 'AMD', 'Ryzen', '5', '2600X', 3600, 4250, 6, 12, 'Ryzen 5', '', 'Zen', 0, 229, 87, '2018-04-19', 'img/cpu-img/ryzen-5-2600x.png'),
(57, 'Intel', 'Core', 'i5', '7600K', 3800, 4200, 4, 4, 'Core i5', 'HD 630', 'Kaby Lake', 0, 242, 86, '2017-01-03', 'img/cpu-img/core-i5-7600k.png'),
(58, 'Intel', 'Core', 'i7', '7700K', 4200, 4500, 4, 8, 'Core i7', 'HD Graphics 530', 'Kaby Lake', 0, 339, 85, '2017-01-03', 'img/cpu-img/core-i7-7700k.png'),
(59, 'AMD', 'Ryzen', '5', '1600 AF', 3200, 3600, 6, 12, 'Ryzen 5', '', 'Zen', 1, 85, 84, '2019-10-11', 'img/cpu-img/ryzen-5-1600-af.png'),
(60, 'AMD', 'Ryzen', '7', '1800X', 3600, 4000, 8, 16, 'Ryzen 7', '', 'Zen', 1, 499, 83, '2017-04-02', 'img/cpu-img/ryzen-7-1800x.png'),
(61, 'AMD', 'Ryzen', '7', '1700X', 3400, 3800, 8, 12, 'Ryzen 7', '', 'Zen', 1, 399, 82, '2017-04-02', 'img/cpu-img/ryzen-7-1700x.png'),
(62, 'AMD', 'Ryzen', '5', '1600X', 3600, 4000, 6, 12, 'Ryzen 5', 'Radeon RX Vega 11', 'Zen', 1, 249, 81, '2017-04-11', 'img/cpu-img/ryzen-5-1600x.png'),
(63, 'Intel', 'Core', 'i7', '6700K', 4000, 4200, 4, 8, 'Core i7', 'HD Graphics 530', 'Skylake', 0, 339, 80, '2015-08-01', 'img/cpu-img/core-i7-6700k.png'),
(64, 'Intel', 'Core', 'i7', '4790K', 4000, 4400, 4, 8, 'Core i7', 'Intel HD 4600', 'Haswell', 1, 339, 79, '2014-05-01', 'img/cpu-img/core-i7-4790k.png'),
(65, 'AMD', 'Ryzen', '5', '3400G', 3700, 4200, 4, 8, 'Ryzen 5', 'Radeon RX Vega 11', 'Picasso', 1, 160, 78, '2019-06-07', 'img/cpu-img/ryzen-5-3400g.png'),
(66, 'Intel', 'Core', 'i3', '7350K', 4200, 0, 2, 4, 'Core i3', '', 'Kaby Lake', 0, 179, 77, '2017-01-03', 'img/cpu-img/Core-i3-7350k.png'),
(67, 'Intel', 'Core', 'i3', '7350K', 4200, 0, 2, 4, 'Core i3', 'Intel HD 630', 'Kaby Lake', 0, 179, 76, '2017-01-03', 'img/cpu-img/Core-i3-7350k.png'),
(68, 'Intel', 'Core', 'i5', '6600K', 3500, 3900, 4, 4, 'Core i5', '', 'Skylake', 0, 242, 75, '2015-07-02', 'img/cpu-img/core-i5-6600k.png'),
(69, 'AMD', 'Ryzen', '3', '3200G', 3600, 4000, 4, 4, 'Ryzen 3', 'Radeon Vega 8', 'Picasso', 0, 89, 74, '2019-06-07', 'img/cpu-img/ryzen-3-3200g.png'),
(70, 'AMD', 'Ryzen', '5', '2400G', 3600, 3900, 4, 8, 'Ryzen 5', 'Radeon RX Vega 11', 'Raven Ridge', 1, 169, 73, '2018-02-12', 'img/cpu-img/ryzen-5-2400g.png'),
(71, 'Intel', 'Core', 'i7', '5930K', 3400, 3700, 6, 12, 'Core i7', '', 'Haswell-E', 0, 613, 72, '2014-09-01', 'img/cpu-img/core-i7-5930k.png'),
(72, 'Intel', 'Core', 'i7', '4930K', 3400, 3900, 6, 12, 'Core i7', '', 'Ivy Bridge-E', 0, 670, 71, '2013-09-01', 'img/cpu-img/core-i7-4930k.png'),
(73, 'Intel', 'Core', 'i7', '4770K', 3500, 3900, 4, 8, 'Core i7', 'Intel HD 4600', 'Haswell', 1, 399, 70, '2013-06-02', 'img/cpu-img/core-i7-4770k.png'),
(74, 'AMD', 'Ryzen', '3', '2200G', 3500, 3700, 4, 4, 'Ryzen 3', 'Radeon Vega 8', 'Raven Ridge', 1, 99, 69, '2018-02-12', 'img/cpu-img/ryzen-3-2200g.png'),
(75, 'Intel', 'Core', 'i3', '7100', 3900, 0, 2, 4, 'Core i3', 'Intel HD 630', 'Kaby Lake', 1, 117, 68, '2017-01-03', 'img/cpu-img/Core-i3-7100.png'),
(76, 'AMD', 'Ryzen', '3', '1300X', 3400, 3700, 4, 4, 'Ryzen 3', '', 'Zen', 1, 129, 67, '2017-06-27', 'img/cpu-img/ryzen-3-1300x.png'),
(77, 'Intel', 'Core', 'i5', '4690K', 3500, 3900, 4, 4, 'Core i5', 'Intel HD 4600', 'Haswell', 1, 300, 66, '2014-06-02', 'img/cpu-img/core-i5-4690k.png'),
(78, 'Intel', 'Core', 'i5', '4670K', 3400, 3800, 5, 8, 'Core i5', 'Intel HD 4600', 'Haswell', 1, 266, 65, '2013-06-02', 'img/cpu-img/core-i5-4670k.png'),
(79, 'Intel', 'Core', 'i7', '3770K', 3500, 3900, 5, 8, 'Core i7', 'Intel HD 4000', 'Ivy Bridge', 1, 294, 64, '2012-04-29', 'img/cpu-img/core-i7-3770k.png'),
(80, 'Intel', '', 'Pentium Gold', 'G5600', 3900, 0, 2, 4, 'Pentium Gold', 'UHD Graphics 630', 'Coffee Lake', 0, 93, 63, '2018-04-02', 'img/cpu-img/pentium-gold-g5600.png'),
(81, 'Intel', 'Core', 'i3', '6320', 3900, 0, 2, 4, 'Core i3', 'Intel HD 530', 'Skylake', 1, 157, 62, '2015-09-01', 'img/cpu-img/Core-i3-6310.png'),
(82, 'Intel', 'Core', 'i5', '3570K', 3400, 3800, 2, 4, 'Core i5', 'Intel HD 4000', 'Ivy Bridge', 1, 235, 61, '2012-04-29', 'img/cpu-img/core-i5-3570k.png'),
(83, 'Intel', '', 'Pentium Gold', 'G5620', 4000, 0, 2, 4, 'Pentium Gold', 'UHD Graphics 630', 'Coffee Lake', 0, 93, 60, '2019-02-20', 'img/cpu-img/pentium-gold-g5620.png'),
(84, 'Intel', 'Core', 'i3', '6100', 3700, 0, 2, 4, 'Core i3', 'Intel HD 530', 'Skylake', 0, 117, 59, '2015-09-01', 'img/cpu-img/Core-i3-6100.png'),
(85, 'Intel', 'Core', 'i3', '4340', 3600, 0, 2, 4, 'Core i3', 'Intel HD 4600', 'Haswell', 1, 210, 58, '2013-09-01', 'img/cpu-img/Core-i3-4340.png'),
(86, 'AMD', '', 'FX', '9590', 4700, 5000, 8, 8, 'FX', '', 'Vishera', 0, 495, 57, '2013-06-11', 'img/cpu-img/amd_fx_9590.png'),
(87, 'AMD', 'Athlon', '', '3000G', 3500, 0, 2, 4, 'Athlon', 'Radeon Vega 3', 'Zen', 1, 66, 56, '2019-11-20', 'img/cpu-img/amd_athlon_3000g.png'),
(88, 'Intel', '', 'Pentium', 'G4620', 3700, 0, 2, 4, 'Pentium', 'Intel HD 630', 'Kaby Lake', 1, 100, 55, '2017-01-03', 'img/cpu-img/intel_pentium_g4620.png'),
(89, 'AMD', '', 'FX', '6350', 3900, 4200, 6, 6, 'FX', '', 'Vishera', 1, 189, 54, '2022-09-27', 'img/cpu-img/amd-fx-6350.png'),
(90, 'Intel', 'Core', 'i3', '3250', 3500, 0, 2, 4, 'Core i3', 'Intel HD Graphics 2500', 'Vishera', 1, 61, 53, '2013-04-29', 'img/cpu-img/Core-i3-3250.png'),
(91, 'AMD', '', 'FX', '4350', 4200, 4300, 4, 4, 'FX', '', 'Vishera', 0, 440, 52, '2013-04-29', 'img/cpu-img/amd-fx-4350.png'),
(92, 'Intel', 'Core', 'i7', '2600K', 3400, 3800, 4, 4, 'Core i7', 'Intel HD 3000', 'Sandy Bridge', 1, 317, 51, '2011-01-09', 'img/cpu-img/core-i7-2600k.png'),
(93, 'Intel', 'Core', 'i5', '2500K', 3300, 3700, 4, 4, 'Core i5', 'Intel HD 3000', 'Sandy Bridge\r\n', 1, 289, 50, '2011-01-09', 'img/cpu-img/core-i5-2500k.png'),
(94, 'AMD', '', 'A8', '9600', 3100, 3400, 4, 4, 'A8\r\n', 'Radeon R7', 'Bristol Ridge', 1, 78, 49, '2017-06-27', 'img/cpu-img/amd_a8_9600.png'),
(95, 'AMD', '', 'A12', '9800', 3800, 4200, 4, 4, 'A12', 'Radeon R7', 'Bristol Ridge', 1, 139, 48, '2017-06-27', 'img/cpu-img/amd_a10_9700.png'),
(96, 'AMD', '', 'A8', '7670K', 3600, 3900, 4, 4, 'A8\r\n', 'Radeon R7', 'Godaveri', 0, 308, 47, '2015-07-20', 'img/cpu-img/amd-a8-7670k.png'),
(97, 'AMD', '', 'A8', '7650K', 3300, 3800, 4, 4, 'A8\r\n', 'Radeon R7', 'Kaveri', 1, 152, 46, '2015-01-07', 'img/cpu-img/amd-a8-7650k.png'),
(98, 'Intel', '', 'Pentium', 'G4520 ', 3200, 0, 2, 2, 'Pentium\r\n', 'Intel HD (Haswell)', 'Haswell', 0, 93, 45, '2013-10-01', 'img/cpu-img/intel_pentium_g3420.png'),
(99, 'AMD', '', 'FX', '8150', 3600, 4200, 8, 8, 'FX', '', 'Zambezi', 0, 1147, 44, '2011-10-16', 'img/cpu-img/amd_fx_8150.png'),
(100, 'Intel', 'Core', 'i7', '980', 3333, 3600, 6, 12, 'Core i7', '', 'Gulftown', 1, 1109, 43, '2011-06-26', 'img/cpu-img/amd_a10_9700.png'),
(101, 'AMD', '', 'A10', '9700', 3500, 3800, 4, 4, 'A10', 'Radeon R7', 'Bristol Ridge', 1, 90, 42, '2017-07-27', 'img/cpu-img/amd_a10_9700.png'),
(102, 'AMD', '', 'A6', '9500', 3500, 3800, 2, 2, 'A6', 'Radeon R5', 'Bristol Ridge', 1, 64, 41, '2016-09-05', 'img/cpu-img/amd_a6_9500.png'),
(103, 'AMD', '', 'A6', '7470K', 3700, 4000, 2, 2, 'A6', 'Radeon R5', 'Godaveri', 0, 215, 40, '2016-02-02', 'img/cpu-img/amd_a6-7470k.png'),
(104, 'AMD', '', 'FX', '6200', 3800, 4100, 6, 6, 'FX', '', 'Zambezi', 0, 0, 39, '2012-02-27', 'img/cpu-img/amd-fx-6200.png'),
(105, 'AMD', '', 'FX', '4300', 3800, 4000, 4, 4, 'FX', '', 'Vishera', 0, 122, 38, '2012-10-23', 'img/cpu-img/amd-fx-4300.png'),
(106, 'AMD', '', 'A10', '7890K', 4000, 4300, 4, 4, 'A10', 'Radeon R7', 'Godaveri', 1, 0, 37, '2016-01-11', 'img/cpu-img/amd-a10-7890k.png'),
(107, 'AMD', 'Athlon', 'X4', '880K', 4000, 4200, 4, 4, 'Athlon', '', 'Godaveri', 1, 0, 36, '2015-12-01', 'img/cpu-img/amd-x4-800k.png'),
(108, 'AMD', '', 'A4', '7300', 3800, 4000, 2, 2, 'A4', 'Radeon HD 8470D', 'Richland', 1, 0, 35, '2014-08-01', 'img/cpu-img/amd-a4-7300.png'),
(109, 'AMD', '', 'A8', '6600K', 3900, 4200, 4, 4, 'A8', '', 'Richland', 1, 0, 34, '2013-06-01', 'img/cpu-img/amd-a8-6800k.png\n'),
(110, 'Intel', 'Core', 'i7', '880', 3066, 3733, 4, 8, 'Core i7', '', 'Lynnfield', 1, 0, 33, '2010-05-30', 'img/cpu-img/Core-i7-880.png'),
(111, 'Intel', 'Core', 'i5', '680', 3600, 3860, 2, 4, 'Core i5', 'Intel HD', 'Clarkdale', 1, 294, 32, '2010-04-19', 'img/cpu-img/Core-i5-680.png'),
(112, 'Intel', 'Core', 'i7', '975', 3333, 3600, 2, 8, 'Core i7', '', 'Bloomfield', 1, 0, 31, '2009-06-02', 'img/cpu-img/Core-i7-975.png'),
(113, 'AMD', '', 'A6', '7400K', 3500, 3900, 2, 2, 'A6', 'Radeon R5', 'Kaveri', 1, 0, 30, '2014-07-31', 'img/cpu-img/amd-a6-7400k.png'),
(114, 'Intel', '', 'Pentium', 'G2140', 3300, 0, 2, 2, 'Pentium', 'Intel HD (Ivy Bridge)', 'Ivy Bridge', 1, 0, 29, '2013-06-09', 'img/cpu-img/intel_pentium_g2140.png'),
(115, 'AMD', '', 'A10', '6800K', 4100, 4400, 4, 4, 'A10', 'Radeon HD 8670D', 'Richland', 1, 0, 28, '2014-06-01', 'img/cpu-img/amd-a10-6800k.png'),
(116, 'Intel', '', 'Pentium', 'G3430', 3300, 0, 2, 2, 'Pentium', 'Intel HD (Haswell)', 'Haswell', 1, 0, 27, '2013-09-01', 'img/cpu-img/intel_pentium_g3430.png'),
(117, 'Intel', '', 'Celeron', 'G4920', 3200, 0, 2, 2, 'Celeron', 'UHD Graphics 610', 'Coffee Lake', 1, 0, 26, '2018-04-03', 'img/cpu-img/intel_celeron_g4920.png'),
(118, 'AMD', '', 'A10', '7850K', 3700, 4000, 4, 4, 'A10', 'Radeon R7', 'Kaveri', 1, 0, 25, '2014-01-14', 'img/cpu-img/amd-a10-7850k.png'),
(119, 'Intel', '', 'Pentium', 'G870', 3100, 0, 2, 2, 'Pentium', 'Intel HD (Sandy Bridge)', 'Sandy Bridge', 1, 0, 24, '2012-07-03', 'img/cpu-img/intel_pentium_g870.png'),
(120, 'Intel', 'Core', 'i3', '2130', 3400, 0, 2, 4, 'Core i3', 'Intel HD 2000', 'Sandy Bridge', 1, 0, 23, '2010-08-29', 'img/cpu-img/Core-i3-2130.png'),
(121, 'AMD', 'Phenom II', 'X4', '980 BE', 3700, 0, 4, 4, 'Phenom II X4', '', 'Deneb', 1, 0, 22, '2011-05-03', 'img/cpu-img/amd_phenom_ii_x4_980_be.png'),
(122, 'AMD', 'Phenom II', 'X4', '975 BE', 3600, 0, 4, 4, 'Phenom II X4', '', 'Deneb', 1, 0, 21, '2011-01-04', 'img/cpu-img/amd_phenom_ii_x4_975_be.png'),
(123, 'Intel', '', 'Celeron', 'G3950', 3000, 0, 2, 2, 'Celeron', 'Intel HD 610', 'Kaby Lake', 1, 0, 20, '2017-01-03', 'img/cpu-img/intel_celeron_g3950.png'),
(124, 'AMD', 'Phenom II', 'X6', '1090T BE', 3200, 3600, 6, 6, 'Phenom II X6', '', 'Thuban', 1, 0, 19, '2010-04-27', 'img/cpu-img/amd_phenom_ii_x6_1090t_be.png'),
(125, 'Intel', 'Core', 'i5', '760', 2800, 3333, 4, 4, 'Core i5', 'Intel UHD Graphics 630', 'Lynnfield', 1, 0, 18, '2010-07-18', 'img/cpu-img/Core-i5-760.png'),
(126, 'AMD', 'Phenom II', 'X3', '740 BE', 3000, 0, 3, 3, 'Phenom II X3', '', 'Heka', 1, 0, 17, '2009-09-01', 'img/cpu-img/amd_phenom_ii_x3_740_be.png'),
(127, 'Intel', 'Core', 'i3', '560', 3333, 0, 2, 4, 'Core i3', 'Intel HD', 'Clarkdale', 1, 138, 16, '2010-08-29', 'img/cpu-img/Core-i3-560.png'),
(128, 'Intel', 'Core 2', 'Quad', 'Q9650', 3000, 0, 4, 4, 'Core 2 Quad', '', 'Yorkfield', 1, 0, 15, '2008-08-10', 'img/cpu-img/intel_core_2_quad_q9650.png'),
(129, 'Intel', '', 'Celeron', 'G1630', 2800, 0, 2, 2, 'Celeron', 'Intel HD', 'Ivy Bridge', 1, 0, 14, '2013-09-01', 'img/cpu-img/intel_celeron_g1630.png'),
(130, 'AMD', '', 'A8', '3870K', 3000, 0, 4, 4, 'A8', 'Radeon HD 6550D', 'Llano', 1, 0, 13, '2011-12-20', 'img/cpu-img/amd-a8-3870k.png'),
(131, 'AMD', '', 'A6', '3670K', 2700, 0, 4, 4, 'A6', 'Radeon HD 6530D', 'Llano', 1, 0, 12, '2011-12-20', 'img/cpu-img/amd-a6-3670k.png'),
(132, 'AMD', '', 'A4', '3400', 2700, 0, 2, 2, 'A4', 'Radeon HD 6410D', 'Llano', 1, 0, 11, '2011-09-07', 'img/cpu-img/amd-a4-3400.png'),
(133, 'AMD', 'Athlon II ', 'X4', '651K', 3000, 0, 4, 4, 'Athlon II X4', '', 'Llano', 1, 0, 10, '2011-11-14', 'img/cpu-img/amd_athlon_ii_x4_651K.png'),
(134, 'Intel', '', 'Pentium Dual-Core', 'E6800', 3333, 0, 2, 2, 'Pentium Dual-Core', '', 'Wolfdale', 1, 0, 9, '2010-08-28', 'img/cpu-img/intel_pentium_e6800.png'),
(135, 'Intel', '', 'Celeron', 'G1850', 2900, 0, 2, 2, 'Celeron', 'Intel HD (Haswell)', 'Haswell', 1, 0, 8, '2014-05-01', 'img/cpu-img/intel_celeron_g1850.png'),
(136, 'Intel', '', 'Celeron', 'G1830', 2800, 0, 2, 2, 'Celeron', 'Intel HD (Haswell)', 'Haswell', 1, 0, 7, '2015-09-01', 'img/cpu-img/intel_celeron_g1830.png'),
(137, 'Intel', '', 'Celeron', 'G3920', 2900, 0, 2, 2, 'Celeron', 'Intel HD 510', 'Skylake', 1, 0, 6, '2015-09-01', 'img/cpu-img/intel_celeron_g3920.png'),
(138, 'Intel', 'Core 2', 'Quad', 'Q6600', 2400, 0, 4, 4, 'Core 2 Quad', '', 'Kentsfield', 1, 0, 5, '2007-07-23', 'img/cpu-img/intel_core_2_quad_q6600.png'),
(139, 'Intel', '', 'Pentium Dual-Core', 'E2200', 2200, 0, 2, 2, 'Pentium Dual-Core', '', 'Allendale\r\n', 1, 0, 4, '2007-12-02', 'img/cpu-img/intel_pentium_cual-core_e2200.png'),
(140, 'AMD', 'Phenom ', 'X4', '9650', 2300, 0, 4, 4, 'Phenom X4', '', 'Agena', 1, 0, 3, '2008-03-27', 'img/cpu-img/amd_phenom_x4_9650.png'),
(141, 'AMD', 'Phenom ', 'X3', '8850', 2500, 0, 3, 3, 'Phenom X3', '', 'Toliman', 1, 0, 2, '2008-10-21', 'img/cpu-img/amd_phenom_x3_8850.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `G_ID` int(11) NOT NULL,
  `G_NAME` varchar(50) NOT NULL,
  `G_GENRE` varchar(30) NOT NULL,
  `G_DEV` varchar(50) NOT NULL,
  `G_DATE` date DEFAULT NULL,
  `G_COVER` varchar(100) NOT NULL,
  `G_WIDE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`G_ID`, `G_NAME`, `G_GENRE`, `G_DEV`, `G_DATE`, `G_COVER`, `G_WIDE`) VALUES
(1, 'Grand Theft Auto V', 'Action', 'Rockstar Games', '2014-11-18', 'GTA5_Cover.jpg', 'GTAv_Wide.jpg'),
(2, 'Minecraft', 'Sandbox', 'Mojang', '2009-05-17', 'minecraft_Cover.jpg', 'Minecraft_Wide.jpg'),
(3, 'Forza Horizon 5', 'Racing', 'Xbox Game Studios', '2021-11-05', 'forzah5_Cover.jpg', 'forzah5_Wide.jpg'),
(4, 'Cyberpunk 2077', 'Action-Role-Playing', 'CD PROJEKT RED', '2020-12-10', 'cyberpunk2077_Cover.jpg', 'cyberpunk2077_Wide.jpg'),
(8, 'Elden Ring', 'Soulslike', 'FromSoftware', '2022-02-25', 'EldenRing_Cover.jpg', 'eldenring_Wide.jpg'),
(9, 'God of War', 'Action-adventure', 'Sony Interactive Entertainment', '2022-01-15', 'gow_Cover.jpg', 'gow_Wide.jpg'),
(11, 'League of Legends', 'MOBA', 'Riot Games', '2009-10-27', 'lol_Cover.jpg', 'lol_Wide.jpg'),
(12, 'World of Warcraft: Dragonflight', 'MMORPG', 'Blizzard Entertainment', '2022-11-28', 'wow_Cover.jpg', 'wow_Wide.jpg'),
(13, 'Read Dead Redemption II', 'Action-adventure', 'Rockstar Games', '2018-10-26', 'rdr2_Cover.jpg', 'rdr2_Wide.jpg'),
(15, 'Call of Duty: Warzone', 'FPS', 'Raven Software, Infinity Ward', '2020-03-10', 'warzone_Cover.jpg', 'warzone_wide.jpg'),
(16, 'Overwatch 2', 'FPS', 'Blizzard Entertainment', '2022-10-04', 'OW2_Cover.jpg', 'OW2_Wide.jpg'),
(18, 'The Witcher 3', 'Action-Role-Playing', 'CD Projekt RED', '2015-05-19', 'witcher3_Cover.jpg', 'witcher3_wide.jpg'),
(19, 'Fall Guys', 'Platform', 'Mediatonic', '2020-08-04', 'fallguys_Cover.jpg', 'fallguys_wide.jpg'),
(20, 'Call of Duty: Modern Warfare 2', 'FPS', 'Infinity Ward', '2022-10-28', '2022CODMW2_Cover.jpg', '2022CODMW2_wide.jpg'),
(21, 'Tom Clancy`s Rainbow Six Siege', 'FPS', 'Ubisoft Montreal', '2015-12-01', 'rainbow6_Cover.jpg', 'rainbow6_Wide.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gpu`
--

CREATE TABLE `gpu` (
  `GPU_ID` int(11) NOT NULL,
  `GPU_MANUF` varchar(50) NOT NULL,
  `GPU_BRANDNAME` varchar(255) NOT NULL,
  `GPU_PREFIX` varchar(10) DEFAULT NULL,
  `GPU_NAME` varchar(50) NOT NULL,
  `GPU_MEM` int(255) NOT NULL,
  `GPU_MEMTYPE` varchar(255) NOT NULL,
  `GPU_BIT` int(255) NOT NULL,
  `GPU_BASE` int(11) NOT NULL,
  `GPU_BOOST` int(11) NOT NULL,
  `GPU_DIRECTX` varchar(255) NOT NULL,
  `GPU_SLI` double NOT NULL,
  `GPU_DATE` date NOT NULL,
  `GPU_GEN` varchar(100) NOT NULL,
  `GPU_LEVEL` varchar(255) NOT NULL,
  `GPU_PERF` int(11) NOT NULL,
  `GPU_PRICE` float NOT NULL,
  `GPU_IMG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `gpu`
--

INSERT INTO `gpu` (`GPU_ID`, `GPU_MANUF`, `GPU_BRANDNAME`, `GPU_PREFIX`, `GPU_NAME`, `GPU_MEM`, `GPU_MEMTYPE`, `GPU_BIT`, `GPU_BASE`, `GPU_BOOST`, `GPU_DIRECTX`, `GPU_SLI`, `GPU_DATE`, `GPU_GEN`, `GPU_LEVEL`, `GPU_PERF`, `GPU_PRICE`, `GPU_IMG`) VALUES
(1, 'NVIDIA', 'GeForce', 'GTX', '650', 1, 'GDDR5', 128, 1058, 0, 'DirectX 12', 0, '2012-09-06', 'GeForce 600', '4', 1, 109, 'img/gpu-img/nvidia-geforce-gtx-650.png'),
(2, 'ATI', 'Radeon', 'HD', '5830', 1, 'GDDR5', 256, 800, 0, 'DirectX 11', 0, '2010-02-25', 'HD 5800', '5', 2, 239, 'img/gpu-img/ati-radeon-hd-5830.png'),
(3, 'AMD', 'Radeon', 'HD', '6790', 1, 'GDDR5', 256, 840, 0, 'DirectX 11', 0, '2011-04-04', 'HD 6700', '4', 3, 149, 'img/gpu-img/amd-radeon-hd-6790.png'),
(4, 'ATI', 'Radeon', 'HD', '4890', 1, 'GDDR5', 256, 850, 0, 'DirectX 11', 0, '2009-04-02', 'HD 4800', '3', 4, 249, 'img/gpu-img/ati-radeon-hd-4890.png'),
(5, 'AMD', 'Radeon', 'HD', '7770 GHz Edition', 1, 'GDDR5', 128, 1000, 1125, 'DirectX 12', 0, '2012-02-15', 'HD 7700', '4', 5, 159, 'img/gpu-img/amd-radeon-hd-7770-GHz-edition.png'),
(6, 'NVIDIA', 'GeForce', 'GT', '1030', 2, 'GDDR5', 64, 1228, 1468, 'DirectX 12', 0, '2017-05-17', 'GeForce 10', '5', 6, 79, 'img/gpu-img/nvidia-geforce-gt-1030.png'),
(7, 'AMD', 'Radeon', 'HD', '6850', 1, 'GDDR5', 256, 775, 0, 'DirectX 11', 0, '2010-10-21', 'HD 6800', '4', 7, 179, 'img/gpu-img/amd-radeon-hd-6850.png'),
(8, 'ATI', 'Radeon', 'HD', '5850', 1, 'GDDR5', 256, 725, 0, 'DirectX 11', 0, '2009-09-30', 'HD 5800', '3', 8, 299, 'img/gpu-img/ati-radeon-hd-5850.png'),
(9, 'NVIDIA', 'GeForce', 'GTX', '650 Ti', 1, 'GDDR5', 128, 928, 0, 'DirectX 12', 0, '2012-10-09', 'GeForce 600', '4', 9, 149, 'img/gpu-img/nvidia-geforce-gtx-650-ti.png'),
(10, 'AMD', 'Radeon', 'HD', '7790', 1, 'GDDR5', 128, 1000, 0, 'DirectX 12', 0, '2009-09-30', 'HD 7700', '4', 10, 149, 'img/gpu-img/amd-radeon-hd-7790.png'),
(11, 'AMD', 'Radeon', 'HD', '6870', 1, 'GDDR5', 256, 900, 0, 'DirectX 11', 0, '2010-10-21', 'HD 6800', '3', 11, 239, 'img/gpu-img/amd-radeon-hd-6870.png'),
(12, 'ATI', 'Radeon', 'HD', '5870', 1, 'GDDR5', 256, 850, 0, 'DirectX 11', 0, '2009-09-23', 'HD 5800', '2', 12, 399, 'img/gpu-img/ati-radeon-hd-5870.png'),
(13, 'ATI', 'Radeon', 'HD', '4870 X2', 2, 'GDDR5', 256, 750, 0, 'DirectX 10', 0, '2008-08-12', 'HD 4800', '2', 13, 550, 'img/gpu-img/ati-radeon-hd-4870-X2.png'),
(14, 'NVIDIA', 'GeForce', 'GTX', '750 Ti', 2, 'GDDR5', 128, 1020, 1085, 'DirectX 12', 0, '2014-02-18', 'GeForce 700', '4', 14, 149, 'img/gpu-img/nvidia-geforce-gtx-750-ti.png'),
(15, 'AMD', 'Radeon', 'HD', '6950', 2, 'GDDR5', 256, 800, 0, 'DirectX 11', 0, '2010-12-14', 'HD 6900', '3', 15, 550, 'img/gpu-img/amd-radeon-hd-6950.png'),
(16, 'NVIDIA', 'GeForce', 'GTX', '650 Ti Boost', 2, 'GDDR5', 192, 980, 1032, 'DirectX 12', 1, '2013-03-26', 'GeForce 600', '4', 16, 169, 'img/gpu-img/nvidia-geforce-gtx-650-ti-boost.png'),
(17, 'AMD', 'Radeon', 'HD', '7850', 2, 'GDDR5', 256, 860, 0, 'DirectX 12', 0, '2012-03-05', 'HD\n7800', '3', 17, 249, 'img/gpu-img/amd-radeon-hd-7850.png'),
(18, 'AMD', 'Radeon', 'HD', '6970', 2, 'GDDR5', 256, 880, 0, 'DirectX 11', 0, '2010-12-14', 'HD\n6900', '3', 18, 369, 'img/gpu-img/amd-radeon-hd-6970.png'),
(19, 'AMD', 'Radeon', 'R7', '265', 2, 'GDDR5', 256, 880, 0, 'DirectX 11', 0, '2014-02-13', 'R7 200', '3', 19, 369, 'img/gpu-img/amd-radeon-r7-265.png'),
(20, 'AMD', 'Radeon', 'R7', '460', 2, 'GDDR5', 128, 1090, 1200, 'DirectX 12', 0, '2016-08-08', 'R7 400', '3', 20, 369, 'img/gpu-img/amd-radeon-rx-460.png'),
(21, 'AMD', 'Radeon', 'R7', '370', 2, 'GDDR5', 256, 925, 975, 'DirectX 12', 0, '2015-06-18', 'R7 300', '4', 21, 149, 'img/gpu-img/amd-radeon-r7-370.png'),
(22, 'NVIDIA', 'GeForce', 'GTX', '660', 2, 'GDDR5', 192, 980, 1032, 'DirectX 12', 1, '2012-09-06', 'GeForce 600', '3', 22, 229, 'img/gpu-img/nvidia-geforce-gtx-660.png'),
(23, 'NVIDIA', 'GeForce', 'GTX', '950', 2, 'GDDR5', 128, 1024, 1188, 'DirectX 12', 1, '2015-08-20', 'GeForce 900', '3', 23, 159, 'img/gpu-img/nvidia-geforce-gtx-950.png'),
(24, 'AMD', 'Radeon', 'HD', '7870 GHz Edition', 2, 'GDDR5', 128, 1000, 0, 'DirectX 12', 0, '2012-03-05', 'HD 7800', '3', 24, 349, 'img/gpu-img/amd-radeon-hd-7870-GHz-edition.png'),
(25, 'AMD', 'Radeon', 'R9', '270X', 2, 'GDDR5', 256, 1000, 1050, 'DirectX 12', 0, '2013-10-08', 'R9 200', '3', 25, 199, 'img/gpu-img/amd-radeon-r9-270x.png'),
(26, 'NVIDIA', 'GeForce', 'GTX', '660 Ti', 2, 'GDDR5', 192, 915, 980, 'DirectX 12', 1, '2012-08-16', 'GeForce 600', '3', 26, 299, 'img/gpu-img/nvidia-geforce-gtx-660-ti.png'),
(27, 'NVIDIA', 'GeForce', 'GTX', '1050', 2, 'GDDR5', 128, 1354, 1455, 'DirectX 12', 0, '2016-10-25', 'GeForce 10', '4', 27, 109, 'img/gpu-img/nvidia-geforce-gtx-1050.png'),
(28, 'AMD', 'Radeon', 'HD', '7950', 3, 'GDDR5', 384, 800, 0, 'DirectX 12', 0, '2012-01-31', 'HD 7900', '2', 28, 449, 'img/gpu-img/amd-radeon-hd-7950.png'),
(29, 'NVIDIA', 'GeForce', 'GTX', '1630', 4, 'GDDR6', 64, 1740, 1785, 'DirectX 12', 0, '2022-07-28', 'GeForce 16', '5', 29, 199, 'img/gpu-img/nvidia-geforce-gtx-1630.png'),
(30, 'ATI', 'Radeon', 'HD', '5970', 2, 'GDDR5', 256, 725, 0, 'DirectX 12', 0, '2009-10-18', 'HD 5900', '5', 30, 699, 'img/gpu-img/ati-radeon-hd-5970.png'),
(31, 'NVIDIA', 'GeForce', 'GTX', '760', 2, 'GDDR5', 256, 980, 1032, 'DirectX 12', 0, '2013-06-25', 'GeForce 700', '4', 31, 249, 'img/gpu-img/nvidia-GeForce-GTX-760.png'),
(32, 'NVIDIA', 'GeForce', 'GTX', '670', 2, 'GDDR5', 256, 915, 980, 'DirectX 12', 1, '2012-05-10', 'GeForce 600', '2', 32, 399, 'img/gpu-img/nvidia-geforce-gtx-670.png'),
(33, 'NVIDIA', 'GeForce', 'GTX', '960', 2, 'GDDR5', 128, 1127, 1178, 'DirectX 12', 1, '2015-01-22', 'GeForce 900', '3', 33, 199, 'img/gpu-img/nvidia-geforce-gtx-960.png'),
(34, 'AMD', 'Radeon', 'R9', '380', 2, 'GDDR5', 256, 970, 0, 'DirectX 12', 0, '2015-06-18', 'R9 300', '3', 34, 199, 'img/gpu-img/amd-radeon-r9-380.png'),
(35, 'AMD', 'Radeon', 'R9', '285', 2, 'GDDR5', 256, 918, 0, 'DirectX 12', 0, '2014-09-02', 'R9 200', '3', 35, 249, 'img/gpu-img/amd-radeon-r9-285.png'),
(36, 'AMD', 'Radeon', 'HD', '7970', 3, 'GDDR5', 384, 925, 0, 'DirectX 12', 0, '2011-12-22', 'HD 7900', '2', 36, 549, 'img/gpu-img/amd-radeon-hd-7970.png'),
(37, 'NVIDIA', 'GeForce', 'GTX', '680', 2, 'GDDR5', 256, 1006, 1058, 'DirectX 12', 1, '2012-03-22', 'GeForce 600', '2', 37, 499, 'img/gpu-img/nvidia-geforce-gtx-680.png'),
(38, 'NVIDIA', 'GeForce', 'GTX', '1050 Ti', 4, 'GDDR5', 128, 1291, 1392, 'DirectX 12', 0, '2016-10-25', 'GeForce 10', '2', 38, 139, 'img/gpu-img/nvidia-geforce-gtx-1050-ti.png'),
(39, 'NVIDIA', 'GeForce', 'GTX', '770', 2, 'GDDR5', 256, 1046, 1085, 'DirectX 12', 1, '2013-05-30', 'GeForce 700', '2', 39, 139, 'img/gpu-img/nvidia-geforce-gtx-770.png'),
(40, 'AMD', 'Radeon', 'HD', '6990', 4, 'GDDR5', 256, 830, 0, 'DirectX 11', 1, '2011-03-08', 'HD 6900', '2', 40, 699, 'img/gpu-img/amd-radeon-hd-6990.png'),
(41, 'AMD', 'Radeon', 'R9', '280X', 3, 'GDDR5', 384, 850, 1000, 'DirectX 12', 0, '2013-10-08', 'R9 200', '3', 41, 299, 'img/gpu-img/amd-radeon-r9-280x.png'),
(42, 'AMD', 'Radeon', 'HD', '7970 GHz Edition', 3, 'GDDR5', 384, 1000, 1050, 'DirectX 12', 0, '2012-06-22', 'HD 7900', '2', 42, 499, 'img/gpu-img/amd-radeon-hd-7970-GHz-edition.png'),
(43, 'NVIDIA', 'GeForce', 'GTX', '780', 3, 'GDDR5', 384, 863, 902, 'DirectX 12', 1, '2013-05-23', 'GeForce 700', '2', 43, 649, 'img/gpu-img/nvidia-geforce-gtx-780.png'),
(44, 'Intel', 'Arc', NULL, 'A380', 6, 'GDDR6', 96, 2000, 2050, 'DirectX 12 Ultimate', 0, '2022-06-14', 'Arc 3', '4', 44, 149, 'img/gpu-img/intel-arc-a380.png'),
(45, 'AMD', 'Radeon', 'RX', '6400', 4, 'GDDR6', 64, 2039, 2321, 'DirectX 12 Ultimate', 0, '2022-01-19', 'RX 6000', '3', 45, 159, 'img/gpu-img/amd-radeon-rx-6400.png'),
(46, 'NVIDIA', 'GeForce', 'GTX', '1650', 4, 'GDDR5', 128, 1485, 1665, 'DirectX 12', 0, '2019-04-23', 'GeForce 16', '4', 46, 149, 'img/gpu-img/nvidia-geforce-gtx-1650.png'),
(47, 'AMD', 'Radeon', 'RX', '470', 4, 'GDDR5', 256, 926, 1206, 'DirectX 12', 0, '2022-01-19', 'RX 400', '4', 47, 179, 'img/gpu-img/amd-radeon-rx-470.png'),
(48, 'AMD', 'Radeon', 'R9', '290', 4, 'GDDR5', 512, 947, 0, 'DirectX 12', 0, '2013-10-05', 'R9 200', '2', 48, 399, 'img/gpu-img/amd-radeon-r9-290.png'),
(49, 'AMD', 'Radeon', 'RX', '570', 4, 'GDDR5', 256, 1168, 1244, 'DirectX 12', 0, '2017-04-18', 'RX 500', '4', 49, 169, 'img/gpu-img/amd-radeon-rx-570.png'),
(50, 'AMD', 'Radeon', 'R9', '390', 8, 'GDDR5', 512, 1000, 0, 'DirectX 12', 0, '2015-06-18', 'R9 300', '3', 50, 329, 'img/gpu-img/amd-radeon-r9-390.png'),
(51, 'AMD', 'Radeon', 'R9', '290x', 4, 'GDDR5', 512, 1000, 0, 'DirectX 12', 0, '2013-10-24', 'R9 200', '2', 51, 512, 'img/gpu-img/amd-radeon-r9-290x.png'),
(52, 'NVIDIA', 'GeForce', 'GTX', '970', 4, 'GDDR5', 256, 1050, 1178, 'DirectX 12', 1, '2014-09-19', 'GeForce 900', '3', 52, 329, 'img/gpu-img/nvidia-geforce-gtx-970.png'),
(53, 'NVIDIA', 'GeForce', 'GTX', 'TITAN', 6, 'GDDR5', 384, 836, 876, 'DirectX 12', 1, '2013-02-19', 'GeForce 700', '1', 53, 999, 'img/gpu-img/nvidia-geforce-gtx-titan.png'),
(54, 'NVIDIA', 'GeForce', 'GTX', '780 Ti', 3, 'GDDR5', 384, 875, 928, 'DirectX 12', 1, '2013-10-07', 'GeForce 700', '1', 54, 699, 'img/gpu-img/nvidia-geforce-gtx-780-ti.png'),
(55, 'AMD', 'Radeon', 'R9', '390X', 4, 'GDDR5', 512, 1050, 0, 'DirectX 12', 0, '2015-06-18', 'R9 300', '2', 55, 429, 'img/gpu-img/amd-radeon-r9-390x.png'),
(56, 'AMD', 'Radeon', 'HD', '7990', 5, 'GDDR5', 384, 950, 1000, 'DirectX 12', 0, '2013-04-24', 'HD 7900', '1', 56, 999, 'img/gpu-img/amd-radeon-hd-7990.png'),
(57, 'AMD', 'Radeon', 'RX', '480', 8, 'GDDR5', 256, 1120, 1266, 'DirectX 12', 0, '2016-06-29', 'RX 400', '3', 57, 229, 'img/gpu-img/amd-radeon-rx-480.png'),
(58, 'NVIDIA', 'GeForce', 'GTX', '690', 4, 'GDDR5', 256, 915, 1019, 'DirectX 12', 1, '2012-05-03', 'GeForce 600', '1', 58, 999, 'img/gpu-img/nvidia-geforce-gtx-690.png'),
(59, 'NVIDIA', 'GeForce', 'GTX', '1060', 6, 'GDDR5', 192, 1506, 1709, 'DirectX 12', 0, '2016-07-19', 'GeForce 10', '3', 59, 299, 'img/gpu-img/nvidia-geforce-gtx-1060-6gb.png'),
(60, 'AMD', 'Radeon', 'RX', '5500 OEM', 4, 'GDDR6', 128, 1500, 1670, 'DirectX 12', 0, '2019-10-07', 'RX 5000', '5', 60, 135, 'img/gpu-img/amd-radeon-rx-5500-oem.png'),
(61, 'AMD', 'Radeon', 'RX', '580', 8, 'GDDR5', 256, 1257, 1340, 'DirectX 12', 0, '2017-04-18', 'RX 500', '3', 61, 229, 'img/gpu-img/amd-radeon-rx-580.png'),
(62, 'AMD', 'Radeon', 'RX', '5500 XT', 4, 'GDDR6', 128, 1607, 1717, 'DirectX 12', 0, '2019-12-12', 'RX 5000', '4', 62, 169, 'img/gpu-img/amd-radeon-rx-5500-xt.png'),
(63, 'AMD', 'Radeon', 'RX', '6500 XT', 4, 'GDDR6', 64, 2310, 2610, 'DirectX 12 Ultimate', 0, '2022-01-19', 'RX 6000', '3', 63, 199, 'img/gpu-img/amd-radeon-rx-6500-xt.png'),
(64, 'NVIDIA', 'GeForce', 'GTX', '980', 4, 'GDDR5', 256, 1127, 1216, 'DirectX 12', 1, '2014-09-19', 'GeForce 900', '2', 64, 549, 'img/gpu-img/nvidia-geforce-gtx-980.png'),
(65, 'NVIDIA', 'GeForce', 'GTX', '1650 Super', 4, 'GDDR6', 128, 1530, 1725, 'DirectX 12', 0, '2019-11-22', 'GeForce 16', '4', 65, 159, 'img/gpu-img/nvidia-geforce-gtx-1650-super.png'),
(66, 'AMD', 'Radeon', 'R9', 'FURY', 4, 'HBM', 4096, 1000, 0, 'DirectX 12', 0, '2015-07-10', 'R9 300', '2', 66, 549, 'img/gpu-img/amd-radeon-r9-fury.png'),
(67, 'AMD', 'Radeon', 'RX', '590', 8, 'GDDR5', 256, 1469, 1545, 'DirectX 12', 0, '2018-09-15', 'RX 500', '3', 67, 279, 'img/gpu-img/amd-radeon-rx-590.png'),
(68, 'AMD', 'Radeon', 'R9', '295X2', 8, 'GDDR5', 512, 1018, 0, 'DirectX 12', 0, '2014-04-29', 'R9 200', '1', 68, 1499, 'img/gpu-img/amd-radeon-r9-295X2.png'),
(69, 'NVIDIA', 'GeForce', 'GTX', '1660', 6, 'GDDR5', 192, 1530, 1785, 'DirectX 12', 0, '2019-03-14', 'GeForce 16', '3', 69, 219, 'img/gpu-img/nvidia-geforce-gtx-1660.png'),
(70, 'AMD', 'Radeon', 'R9', 'FURY X', 4, 'HBM', 4096, 1050, 0, 'DirectX 12', 0, '2015-06-24', 'R9 300', '2', 70, 649, 'img/gpu-img/amd-radeon-r9-fury-x.png'),
(71, 'NVIDIA', 'GeForce', 'GTX', '980 Ti', 6, 'GDDR5', 384, 1000, 1076, 'DirectX 12', 1, '2015-07-02', 'GeForce 900', '2', 71, 649, 'img/gpu-img/nvidia-geforce-gtx-980-ti.png'),
(72, 'NVIDIA', 'GeForce', 'GTX', 'TITAN X', 12, 'GDDR5', 384, 1000, 1089, 'DirectX 12', 1, '2015-03-17', 'GeForce 900', '1', 72, 999, 'img/gpu-img/nvidia-geforce-gtx-titan-x.png'),
(73, 'NVIDIA', 'GeForce', 'GTX', '1660 Ti', 6, 'GDDR6', 192, 1500, 1770, 'DirectX 12', 0, '2019-10-22', 'GeForce 16', '3', 73, 279, 'img/gpu-img/nvidia-geforce-gtx-1660-ti.png'),
(74, 'NVIDIA', 'GeForce', 'GTX', '1660 Super', 6, 'GDDR6', 192, 1530, 1785, 'DirectX 12', 0, '2019-10-29', 'GeForce 16', '3', 74, 229, 'img/gpu-img/nvidia-geforce-gtx-1660-super.png'),
(75, 'NVIDIA', 'GeForce', 'GTX', '1070', 8, 'GDDR6', 256, 1506, 1683, 'DirectX 12', 1, '2016-06-10', 'GeForce 10', '3', 75, 379, 'img/gpu-img/nvidia-geforce-gtx-1070.png'),
(76, 'NVIDIA', 'GeForce', 'RTX', '3050', 8, 'GDDR6', 192, 1552, 1777, 'DirectX 12 Ultimate', 0, '2022-01-04', 'GeForce 30', '3', 76, 249, 'img/gpu-img/nvidia-geforce-rtx-3050-8gb.png'),
(77, 'NVIDIA', 'GeForce', 'GTX', '1070 Ti', 8, 'GDDR5', 256, 1607, 1660, 'DirectX 12', 1, '2017-11-02', 'GeForce 10', '2', 78, 399, 'img/gpu-img/nvidia-geforce-gtx-1070-ti.png'),
(78, 'AMD', 'Radeon', 'RX', '5600 XT', 6, 'GDDR6', 192, 1130, 1375, 'DirectX 12', 0, '2022-01-21', 'RX 5000', '3', 79, 279, 'img/gpu-img/amd-radeon-rx-5600-xt.png'),
(79, 'NVIDIA', 'GeForce', 'GTX', '1080', 8, 'GDDR5X', 2048, 1247, 1546, 'DirectX 12', 1, '2016-05-27', 'GeForce 10', '2', 81, 599, 'img/gpu-img/nvidia-geforce-gtx-1080.png'),
(80, 'NVIDIA', 'GeForce', 'RTX', '2060', 6, 'GDDR6', 192, 1365, 1680, 'DirectX 12 Ultimate', 0, '2019-01-07', 'GeForce 20', '3', 82, 349, 'img/gpu-img/nvidia-geforce-rtx-2060.png'),
(81, 'AMD', 'Radeon', 'RX', '5700', 8, 'GDDR6', 256, 1465, 1625, 'DirectX 12', 0, '2019-01-07', 'RX 5000', '3', 83, 349, 'img/gpu-img/amd-radeon-rx-5700.png'),
(82, 'Intel', 'Arc', NULL, 'A750', 8, 'GDDR6', 256, 2050, 2400, 'DirectX 12 Ultimate', 0, '2022-10-12', 'Arc 7', '3', 84, 289, 'img/gpu-img/intel-arc-a750.png'),
(83, 'AMD', 'Radeon', 'RX', '6600', 8, 'GDDR6', 128, 1626, 2491, 'DirectX 12 Ultimate', 0, '2021-10-13', 'RX 6000', '3', 86, 329, 'img/gpu-img/amd-radeon-rx-6600.png'),
(84, 'NVIDIA', 'GeForce', 'RTX', '2060 Super', 8, 'GDDR6', 192, 1470, 1650, 'DirectX 12 Ultimate', 0, '2019-07-09', 'GeForce 20', '2', 87, 399, 'img/gpu-img/nvidia-geforce-rtx-2060-super.png'),
(85, 'NVIDIA', 'GeForce', 'RTX', '2070', 8, 'GDDR6', 256, 1410, 1620, 'DirectX 12 Ultimate', 0, '2018-10-17', 'GeForce 20', '2', 88, 499, 'img/gpu-img/nvidia-geforce-rtx-2070.png'),
(86, 'NVIDIA', 'GeForce', 'RTX', '3060', 12, 'GDDR6', 192, 1320, 1777, 'DirectX 12 Ultimate', 0, '2021-01-12', 'GeForce 30', '3', 89, 329, 'img/gpu-img/nvidia-geforce-rtx-3060.png'),
(87, 'Intel', 'Arc', NULL, 'A770', 18, 'GDDR6', 256, 2100, 2400, 'DirectX 12 Ultimate', 0, '2022-10-12', 'Arc 7', '3', 90, 329, 'img/gpu-img/intel-arc-a770.png'),
(88, 'AMD', 'Radeon', 'RX', '5700 XT', 8, 'GDDR6', 256, 1605, 1755, 'DirectX 12', 0, '2019-01-07', 'RX 5000', '2', 91, 399, 'img/gpu-img/amd-radeon-rx-5700-xt.png'),
(89, 'NVIDIA', 'TITAN', NULL, 'X Pascal', 12, 'GDDR5X', 384, 1417, 1531, 'DirectX 12', 1, '2016-08-02', 'GeForce 10', '1', 94, 1199, 'img/gpu-img/nvidia-titan-x.png'),
(90, 'NVIDIA', 'GeForce', 'GTX', '1080 Ti', 11, 'GDDR5X', 352, 1481, 1582, 'DirectX 12', 1, '2017-03-10', 'GeForce 10', '1', 95, 699, 'img/gpu-img/nvidia-geforce-gtx-1080-ti.png'),
(91, 'NVIDIA', 'GeForce', 'RTX', '2070 Super', 8, 'GDDR6', 256, 1605, 1770, 'DirectX 12 Ultimate', 1, '2019-07-09', 'GeForce 20', '2', 96, 499, 'img/gpu-img/nvidia-geforce-rtx-2070-super.png'),
(92, 'AMD', 'Radeon', 'RX', '6600 XT', 8, 'GDDR6', 128, 1968, 2589, 'DirectX 12 Ultimate', 0, '2021-07-30', 'RX 6000', '3', 97, 379, 'img/gpu-img/amd-radeon-rx-6600-xt.png'),
(93, 'AMD', 'Radeon', 'RX', '6650 XT', 8, 'GDDR6', 128, 1968, 2589, 'DirectX 12 Ultimate', 0, '2022-05-10', 'RX 6000', '2', 98, 399, 'img/gpu-img/amd-radeon-rx-6650-xt.png'),
(94, 'NVIDIA', 'GeForce', 'RTX', '2080', 8, 'GDDR6', 256, 1515, 1710, 'DirectX 12 Ultimate', 1, '2018-09-20', 'GeForce 20', '1', 99, 699, 'img/gpu-img/nvidia-geforce-rtx-2080.png'),
(95, 'NVIDIA', 'GeForce', 'RTX', '2080 Super', 8, 'GDDR6', 256, 1650, 1815, 'DirectX 12 Ultimate', 1, '2019-07-23', 'GeForce 20', '1', 100, 699, 'img/gpu-img/nvidia-geforce-rtx-2080-super.png'),
(96, 'NVIDIA', 'GeForce', 'RTX', '3060 Ti', 8, 'GDDR6', 256, 1410, 1665, 'DirectX 12 Ultimate', 0, '2020-12-01', 'GeForce 30', '2', 101, 399, 'img/gpu-img/nvidia-geforce-rtx-3060-ti.png'),
(97, 'AMD', 'Radeon', 'RX', '6700 XT', 12, 'GDDR6', 192, 2321, 2581, 'DirectX 12 Ultimate', 0, '2021-03-03', 'RX 6000', '2', 102, 479, 'img/gpu-img/amd-radeon-rx-6700-xt.png'),
(98, 'NVIDIA', 'GeForce', 'RTX', '2080 Ti', 11, 'GDDR6', 352, 1350, 1545, 'DirectX 12 Ultimate', 1, '2016-09-20', 'GeForce 20', '1', 103, 999, 'img/gpu-img/nvidia-geforce-rtx-2080-ti.png'),
(99, 'AMD', 'Radeon', 'RX', '6750 XT', 12, 'GDDR6', 192, 2150, 2600, 'DirectX 12 Ultimate', 0, '2022-03-03', 'RX 6000', '2', 104, 549, 'img/gpu-img/amd-radeon-rx-6750-xt.png'),
(100, 'NVIDIA', 'GeForce', 'RTX', '3070', 8, 'GDDR6', 256, 1500, 1725, 'DirectX 12 Ultimate', 0, '2021-09-01', 'GeForce 30', '2', 105, 499, 'img/gpu-img/nvidia-geforce-rtx-3070.png'),
(101, 'NVIDIA', 'GeForce', 'RTX', '3070 Ti', 8, 'GDDR6X', 256, 1575, 1770, 'DirectX 12 Ultimate', 0, '2021-05-31', 'GeForce 30', '2', 106, 599, 'img/gpu-img/nvidia-geforce-rtx-3070-ti.png'),
(102, 'AMD', 'Radeon', 'RX', '6800', 16, 'GDDR6X', 256, 1700, 2105, 'DirectX 12 Ultimate', 0, '2020-10-28', 'RX 6000', '2', 107, 579, 'img/gpu-img/amd-radeon-rx-6800.png'),
(103, 'AMD', 'Radeon', 'RX', '6800 XT', 16, 'GDDR6X', 256, 1825, 2250, 'DirectX 12 Ultimate', 0, '2020-10-28', 'RX 6000', '2', 108, 649, 'img/gpu-img/amd-radeon-rx-6800-xt.png'),
(104, 'NVIDIA', 'GeForce', 'RTX', '3080', 10, 'GDDR6X', 320, 1440, 1710, 'DirectX 12 Ultimate', 0, '2020-09-01', 'GeForce 30', '1', 109, 699, 'img/gpu-img/nvidia-geforce-rtx-3080.png'),
(105, 'AMD', 'Radeon', 'RX', '6900 XT', 16, 'GDDR6X', 256, 1825, 2250, 'DirectX 12 Ultimate', 0, '2020-10-28', 'RX 6000', '1', 110, 999, 'img/gpu-img/amd-radeon-rx-6900-xt.png'),
(106, 'NVIDIA', 'GeForce', 'RTX', '3080 Ti', 12, 'GDDR6X', 384, 1440, 1710, 'DirectX 12 Ultimate', 0, '2020-09-01', 'GeForce 30', '1', 111, 1199, 'img/gpu-img/nvidia-geforce-rtx-3080-ti.png'),
(107, 'AMD', 'Radeon', 'RX', '6950 XT', 16, 'GDDR6', 256, 1860, 2310, 'DirectX 12 Ultimate', 0, '2022-05-10', 'RX 6000', '1', 112, 1099, 'img/gpu-img/amd-radeon-rx-6950-xt.png'),
(108, 'NVIDIA', 'GeForce', 'RTX', '3090', 24, 'GDDR6X', 384, 1395, 1695, 'DirectX 12 Ultimate', 1, '2020-09-01', 'GeForce 30', '1', 113, 1499, 'img/gpu-img/nvidia-geforce-rtx-3090.png'),
(109, 'NVIDIA', 'GeForce', 'RTX', '3090 Ti', 24, 'GDDR6X', 384, 1560, 1860, 'DirectX 12 Ultimate', 0, '2022-01-27', 'GeForce 30', '1', 114, 1999, 'img/gpu-img/nvidia-geforce-rtx-3090-ti.png'),
(110, 'AMD', 'Radeon', 'RX', '7900 XT', 20, 'GDDR6', 320, 1500, 2394, 'DirectX 12 Ultimate', 0, '2022-11-03', 'RX 7000', '1', 115, 899, 'img/gpu-img/amd-radeon-rx-7900-xt.png'),
(111, 'NVIDIA', 'GeForce', 'RTX', '4080', 16, 'GDDR6X', 256, 2205, 2505, 'DirectX 12 Ultimate', 0, '2022-09-20', 'GeForce 40', '1', 116, 1199, 'img/gpu-img/nvidia-geforce-rtx-4080.png'),
(112, 'AMD', 'Radeon', 'RX', '7900 XTX', 24, 'GDDR6', 384, 1900, 2505, 'DirectX 12 Ultimate', 0, '2022-11-03', 'RX 7000', '1', 117, 999, 'img/gpu-img/amd-radeon-rx-7900-xtx.png'),
(113, 'NVIDIA', 'GeForce', 'RTX', '4090 ', 24, 'GDDR6X', 384, 2235, 2520, 'DirectX 12 Ultimate', 0, '2022-09-20', 'GeForce 40', '1', 118, 1599, 'img/gpu-img/nvidia-geforce-rtx-4090.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `os`
--

CREATE TABLE `os` (
  `OS_ID` int(11) NOT NULL,
  `OS_DATE` date NOT NULL,
  `OS` varchar(50) NOT NULL,
  `OS_ORDER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `os`
--

INSERT INTO `os` (`OS_ID`, `OS_DATE`, `OS`, `OS_ORDER`) VALUES
(1, '2015-07-29', 'Windows 10 32bit', 11),
(2, '2015-07-29', 'Windows 10 64bit', 12),
(3, '2021-09-05', 'Windows 11 64bit', 13),
(4, '2009-09-22', 'Windows 7 32bit', 5),
(5, '2009-09-22', 'Windows 7 64bit', 6),
(6, '2012-09-26', 'Windows 8 32bit', 7),
(7, '2012-09-26', 'Windows 8 64bit', 8),
(8, '2012-09-17', 'Windows 8.1 32bit', 9),
(9, '2012-09-17', 'Windows 8.1 64bit', 10),
(10, '2007-01-30', 'Windows Vista 32bit', 1),
(11, '2007-01-30', 'Windows Vista 64bit', 2),
(12, '2001-09-25', 'Windows XP 32bit', 3),
(13, '2001-09-25', 'Windows XP 64bit', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ram`
--

CREATE TABLE `ram` (
  `RAM_GB` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `ram`
--

INSERT INTO `ram` (`RAM_GB`) VALUES
(1),
(2),
(4),
(6),
(8),
(10),
(12),
(16),
(20),
(24),
(32),
(64),
(128);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `systemrec`
--

CREATE TABLE `systemrec` (
  `SYS_ID` int(11) NOT NULL,
  `G_ID` varchar(50) NOT NULL,
  `SYS_MIN_CPU_INTEL` varchar(50) NOT NULL,
  `SYS_MIN_CPU_AMD` varchar(50) NOT NULL,
  `SYS_MIN_GPU_NVIDIA` varchar(50) NOT NULL,
  `SYS_MIN_GPU_AMD` varchar(50) NOT NULL,
  `SYS_MIN_RAM` varchar(30) NOT NULL,
  `SYS_REC_CPU_INTEL` varchar(50) NOT NULL,
  `SYS_REC_CPU_AMD` varchar(50) NOT NULL,
  `SYS_REC_GPU_NVIDIA` varchar(50) NOT NULL,
  `SYS_REC_GPU_AMD` varchar(50) NOT NULL,
  `SYS_REC_RAM` varchar(30) NOT NULL,
  `SYS_OS` varchar(100) NOT NULL,
  `SYS_SPACE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `systemrec`
--

INSERT INTO `systemrec` (`SYS_ID`, `G_ID`, `SYS_MIN_CPU_INTEL`, `SYS_MIN_CPU_AMD`, `SYS_MIN_GPU_NVIDIA`, `SYS_MIN_GPU_AMD`, `SYS_MIN_RAM`, `SYS_REC_CPU_INTEL`, `SYS_REC_CPU_AMD`, `SYS_REC_GPU_NVIDIA`, `SYS_REC_GPU_AMD`, `SYS_REC_RAM`, `SYS_OS`, `SYS_SPACE`) VALUES
(3, '16', '127', '141', '1', '5', '6', '112', '70', '59', '45', '8', '2', '50'),
(5, '12', '64', '62', '52', '51', '8', '33', '32', '100', '99', '16', '2', '128'),
(6, '20', '84', '76', '33', '47', '8', '73', '70', '59', '61', '12', '2', '25'),
(7, '8', '52', '48', '59', '61', '12', '33', '39', '75', '78', '16', '3', '60'),
(8, '9', '93', '76', '33', '51', '8', '68', '70', '59', '49', '8', '2', '70'),
(9, '3', '78', '76', '52', '47', '8', '52', '70', '75', '67', '16', '3', '110'),
(10, '4', '82', '99', '43', '47', '8', '64', '69', '59', '67', '12', '2', '70'),
(11, '19', '93', '76', '22', '28', '8', '93', '76', '22', '28', '8', '2', '2'),
(12, '15', '85', '104', '32', '28', '8', '93', '62', '52', '50', '12', '2', '175'),
(13, '13', '93', '89', '39', '41', '8', '73', '62', '59', '57', '12', '2', '150'),
(15, '21', '127', '122', '1', '2', '6', '93', '99', '32', '41', '8', '8', '30'),
(16, '18', '93', '122', '22', '24', '8', '79', '99', '39', '48', '8', '8', '35'),
(17, '1', '138', '141', '1', '3', '4', '85', '99', '22', '24', '8', '8', '72'),
(18, '11', '127', '141', '1', '2', '1', '90', '76', '1', '15', '2', '3', '16'),
(19, '2', '90', '97', '1', '2', '4', '77', '118', '31', '57', '8', '8', '4');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `ID` bigint(20) NOT NULL,
  `USER_ID` bigint(20) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_AVATAR` varchar(255) DEFAULT 'default-avatar.png',
  `USER_COLOR` varchar(255) NOT NULL,
  `USER_ADMIN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`ID`, `USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_EMAIL`, `USER_DATE`, `USER_AVATAR`, `USER_COLOR`, `USER_ADMIN`) VALUES
(48, 6762, 'qwer12345', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'qwer12345@gmail.com', '2023-03-08 02:39:48', 'default-avatar.png', '', 0),
(49, 35772, 'Admin123', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'admin@gmail.com', '2023-04-04 23:19:54', '35772.jpg', '', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`INDEX`);

--
-- A tábla indexei `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BRAND_NAME`,`BRAND_TYPE`);

--
-- A tábla indexei `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`CPU_ID`);

--
-- A tábla indexei `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`G_ID`);

--
-- A tábla indexei `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`GPU_ID`);

--
-- A tábla indexei `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`OS_ID`);

--
-- A tábla indexei `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`RAM_GB`);

--
-- A tábla indexei `systemrec`
--
ALTER TABLE `systemrec`
  ADD PRIMARY KEY (`SYS_ID`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USER_EMAIL` (`USER_EMAIL`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `USER_DATE` (`USER_DATE`),
  ADD KEY `USER_NAME` (`USER_NAME`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `INDEX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT a táblához `cpu`
--
ALTER TABLE `cpu`
  MODIFY `CPU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT a táblához `gpu`
--
ALTER TABLE `gpu`
  MODIFY `GPU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12356;

--
-- AUTO_INCREMENT a táblához `os`
--
ALTER TABLE `os`
  MODIFY `OS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `systemrec`
--
ALTER TABLE `systemrec`
  MODIFY `SYS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
