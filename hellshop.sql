-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 06:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hellshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `prodId` int(20) NOT NULL,
  `prodQty` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `prodId`, `prodQty`, `created_at`) VALUES
(48, 3, 4, 2, '2023-02-25 13:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-visible\r\n1-hidden',
  `opis` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ime`, `status`, `opis`, `image`, `created_at`) VALUES
(22, 'Trotinet', 0, 'Trotineti velikim koracima ulaze u grupu prevoznih sredstava. Odaberite između dečjih trotineta, trotineta za odrasle i ostalih dodataka. ✓ Veliki izbor.', '1676045476.PNG', '2023-02-10 16:11:16'),
(23, 'Roleri', 0, 'ROLERI I OPREMA. ROLLERBLADE roleri – vrhunski kvalitet, moderan dizajn. U ponudi su dečiji i ženski roleri i roleri za muškarce, rezervni točkići za rolere ...', '1676117501.PNG', '2023-02-11 12:11:41'),
(24, 'Dečji bicikli', 0, 'Najveći izbor dečjih bicikala, najbolje cene. Bicikli za decu Polar, Booster, RoyalBaby, Scott. Planet Bike, najbolje mesto za kupovinu bicikala.  Bicikle za decu za svaki džep. Proveren kvalitet, saveti prodavaca i profesionalna usluga.  Posetite Planet Bike prodavnice ili poručite dečje bicikle online putem našeg webshop-a, isporuka na kućnu adresu je besplatna za sve porudžbine u vrednosti preko 5.000 RSD.', '1676119090.jpg', '2023-02-11 12:38:10'),
(25, 'Gradski bicikli', 0, '“Gradski” modeli nude neprevaziđen komfor, pre svega zbog uspravnijeg položaja pri vožnji, većih točkova, udobnijeg sedišta i drugih detalja, što nimalo ne umanjuje njihovu sposobnost da se koriste za razonodu i rekreaciju.', '1676135502.jpg', '2023-02-11 17:11:42'),
(26, 'Drumski bicikli', 0, 'U ponudi imamo veliki izbor drumskih – trkačkih bicikala. Nudimo bajkove sa karbonskim i aluminijumskim ramom. Imamo muške i ženske drumaše u svim veličinama ramova. Zastupnici smo dva velika svetska brenda: Scott i Look. Look i Scott nude drumaše sa disk kočnicama kao i sa klasičnim kočnicama. U ponudi imamo aero bicikle kao i trkačke bicikle za brdo, i sve to za muškarce i žene. Moguće je kupiti i bicikl za triatlon ili hronometar.', '1676136444.jpg', '2023-02-11 17:27:24'),
(27, 'Skejtbord', 0, 'ODABERITE OBIČAN SKEJT ILI LONGBOARD', '1676141552.jpg', '2023-02-11 18:52:32'),
(31, 'Skije', 0, 'ELAN, NORDICA i Völkl skije Skije za rekreativce, decu, žene, muškarce i profesionalce. ', '1677426190.jpg', '2023-02-24 19:37:00'),
(32, 'Sobni bicikli', 0, 'Sobni bicikl je odličan aerobni uređaj, koji pomaže da se u kućnim uslovima izgradi snaga, poveća izdržljivost, poboljša kondicija, smanji stres i izgubi težina. Posetite Planet Bike prodajna mesta i odaberite Kettler ili Body Sculpture sobni bicikl.', '1677427536.jpg', '2023-02-26 16:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `trackingNo` varchar(255) NOT NULL,
  `imePrezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `adresa` mediumtext NOT NULL,
  `pincode` int(20) NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `payMode` varchar(255) NOT NULL,
  `payId` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-u procesu\r\n1-zavrseno\r\n2-otkazano',
  `komentar` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `trackingNo`, `imePrezime`, `email`, `telefon`, `adresa`, `pincode`, `totalPrice`, `payMode`, `payId`, `status`, `komentar`, `created_at`) VALUES
(40, 3, 'dijanacode82564555888', 'Jovan', 'jovan@gmail.com', '064555888', 'jkjkjk', 123, 14490, 'pp', NULL, 0, NULL, '2023-02-23 17:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(20) NOT NULL,
  `orderId` int(20) NOT NULL,
  `prodId` int(20) NOT NULL,
  `oiKolicina` int(20) NOT NULL,
  `cena` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orderId`, `prodId`, `oiKolicina`, `cena`, `created_at`) VALUES
(45, 40, 17, 1, 14490, '2023-02-23 17:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `kratkiOpis` mediumtext NOT NULL,
  `opis` mediumtext NOT NULL,
  `orginalnaCena` float NOT NULL,
  `prodajnaCena` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-vidljiv\r\n1-sakriven',
  `trending` tinyint(4) NOT NULL COMMENT '0-no trending\r\n1-trending',
  `kolicina` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `ime`, `kratkiOpis`, `opis`, `orginalnaCena`, `prodajnaCena`, `image`, `status`, `trending`, `kolicina`, `created_at`) VALUES
(4, 24, 'BICIKL GURALICA POLISPORT', 'POLISPORT BALANCE BIKE', 'Pedagoška igračka za uzrast dece od 2-5 godina.  Polisport Balance Bike je trening bicikl koji pomaže deci da nauče kako da upravljaju i balansiraju. Omogućava deci da izgrade poverenje koje će im trebati kada budu spremni za tradicionalni bicikl sa pedalama - nisu potrebni pomoćni točkići! Deca sede tako da njihove male noge mogu udobno doći do zemlje. Ugrađeni graničnik za okretanje volana takođe omogućava deci da održavaju kontrolu koliko se okreću. Udobne gumene ručke volana, ergonomski dizajnirano sedište i točkovi koji apsorbuju udarce pružaju dodatnu udobnost. Polisport Balance Bike ima podesivo sedište koje raste sa detetom.  Specifikacija:  za uzrast dece od 2-5 godina za težinu dece < 25 kg mogućnost podešavanja visine sedišta težina: 3 kg standards: CE - EN71: 2011', 8000, 6000, '1677338630.jpg', 0, 1, 5, '2023-02-11 17:00:49'),
(5, 24, 'BICIKL GURALICA BELLELLI ', 'BICIKL  BELLELLI PVC', 'Pedagoška igračka za uzrast dece od 2-5 godina.  Naizmeničnim guranjem i odgurivanjem nogama, deca uče da uspostave ravnotežu u toku kretanja, što omogućava lakše i brže savladavanje vožnje bicikla bez pomoćnih točkova.  PVC bicikl 12\" bez pedala za uzrast dece od 2-5 godina mogućnost podešavanja visine sedišta', 1000, 9490, '1676134960.jpg', 0, 0, 12, '2023-02-11 17:02:40'),
(6, 24, 'BICIKL GURALICA POLAR BREZA', 'BICIKL  POLAR DRVO', 'Balance bicycle... Pedagoška igračka za uzrast dece od 2-5 godina.  Guralice omogućavaju deci da samostalno istražuju svoje okruženje, da proširuju opseg svojih pokreta, izgrade motorne veštine i steknu osećaj za ravnotežu. Tako uvereni u vlastite sposobnosti, deca imaju dobru osnovu i najbolju pripremu za svoj prvi bicikl.  Naizmeničnim guranjem i odgurivanjem nogama, deca uče da uspostave ravnotežu u toku kretanja, što omogućava lakše i brže savladavanje vožnje bicikla bez pomoćnih točkova.  Specifikacija:  drveni bicikl bez pedala prečnik točka: 28cm visina sedišta: podesiva 36 - 46 cm mekano sedište maksimalna nosivost: 25kg materijal: drvo / Breza', 9000, 8490, '1676135037.jpg', 0, 0, 55, '2023-02-11 17:03:57'),
(7, 24, 'BICIKL POLAR JUNIOR 14', 'Polar Junior 14', 'Kid`s Bike...  Naša linija za najmlađe kombinuje potrebu da se deci omogući dobra zabava uz maksimalnu kontrolu i bezbednost prilikom vožnje bicikla.  Deca žele da oponašaju odrasle, sa nedovoljno snage da savladaju često teške i nezgrapne bicikle. Naš koncept je da dečiji bicikl maksimalno olakšamo, prilagodimo komponente dečijoj anatomiji i snazi, jer je to siguran put da dete uživa u vožnji i zavoli ovu divnu aktivnost.     Polar Junior 14 Namenjen za uzrast 3 - 5 godina / visine deteta 90 - 110cm.     Konstruisan za sigurne prve okretaje pedala, dizajniran da izmami osmeh kod dece. Prilagođena potrebama mladih biciklista geometrija čini Polar Junior izuzetno udobnim za sedenje i vožnju.  Podešavanjem nosača volana i visine sedišta možete prilagoditi bicikl visini deteta, da može da spusti stopala i lako nauči da balansira i vozi.  Bicikl je opremljen V-kočnicom na prednjem točku i ručicom kočnice specijalno dizajniranom za dečiju ruku, i \"kontra\" kočnicom na zadnjem točku (jednostavno aktiviranje guranjem pedale unazad) koje vašem detetu pružaju dobru sigurnost i kontrolu.  Pomoćni točkići (koji se mogu ukloniti) povećanju samopouzdanje tako da deca mogu početi samostalno da voze.  Da bismo olakšali vožnju, koristili smo gume sa urbanom gaznom površinom koje garantuju laganu i stabilnu vožnju bez nepotrebnog otpora kotrljanja.  Pored toga, tu je i zaštita za lanac koja odgovara dizajnu bicikla i štiti i lanac i vaše dete.  Zahvaljujući ovim rešenjima, vožnja bicikla nije samo odličan već i siguran način da provedete izuzetno zabavno vreme na otvorenom.     Izbor odgovarajuće veličine bicikla zavisi od visine deteta. Potražite vama odgovarajuću veličinu u Tabeli veličina     Specifikacija: Model: Polar Junior 14 Veličina točka: 14\" Ram: čelik Polar Juniorr Viljuška: čelik / rigid Ručica kočnice: čelik / pvc Junior Kočnica prednja: V kočnica Kočnica zadnja: kontra Sedište: MonteGrappa Junior Točkovi: 14\" čelik Gume: Pneumatic rubber Dodatna oprema Girl: Pomoćni točkići, zvonce, blatobrani, ručka za guranje, prednja korpica Dodatna oprema Boy: Pomoćni točkići, zvonce, blatobrani, nosač bidona, bidon Težina: Girl 10,00 kg / Boy 10,20 kg', 15000, 13490, '1676135189.jpg', 0, 0, 61, '2023-02-11 17:06:29'),
(8, 25, 'BICIKL POLAR GRAZIA 1s bordo', 'BICIKL POLAR GRAZIA COASTER 28', 'City...  Ride in style!  Gradski bicikl za dame sa posebnim stilom života.  Elegantan, funkcionalan i udoban, dizajniran za svakodnevnu rutinu.  Bilo da se radi o pukom odlasku do prodavnice ili vozite da ostante u formi, najvažnija stvar koju možete da uradite je da u skadu sa svojim biciklom uživate u vožnji.     Polar Grazia 1s Grazia je opremljena mnogim korisnim dodacima koji značajno poboljšavaju udobnost upotrebe. Korpa napred i pak treger pozadi nude mnoge mogućnosti za siguran transport vaše torbe, stvari iz prodavnice, garderobe ..., što je veoma zgodno i, štaviše, korpa jednostavno izgleda odlično! Iznad točkova su blatobrani u boji koji štite biciklistu od vode i prljavštine. Štitnik za suknju u dezenu modela. Tu je i rasveta koja garantuje adekvatnu vidljivost i bezbednost prilikom vožnje po mraku.  Ram bicikle je dizajniran tako da vam neće biti problem ulazak ili silazak sa bicikle, čak i ako ste u suknji. Zakrivljeni volan omogućava da zauzmete udoban, uspravan položaj, a široko sedište sa oprugom će ublažiti udare od neravnina sa puta i povećati dobnost u vožnji. Čelična konstrukcija nije samo izdržljiva, već ima i atraktivan dizajn.  Jednobrzinski pogonski sklop vam omogućava da lako održite ritam vožnje.  Za kočenje su zadužene pouzdane V-brake kočnice. V-kočnice su provereno i cenjeno rešenje. One garantuju laku kontrolu brzine i omogućavaju vam da brzo zaustavite bicikl. Njihov jednostavan dizajn omogućava dug i nesmetan rad.  28” točkovi će se lako nositi sa neravninama na putu, dok gume obezbeđuju dobro prianjanje na suvom asfaltu i nizak otpor kotrljanja.     Polar Gracija dolazi u 2 veličine, izbor odgovarajuće veličine zavisi od vaše visine. Potražite vama odgovarajuću veličinu u Tabeli veličina     Specifikacija: Model: Polar Grazia Coaster 28 Veličina točka: 700c ( 622 / 28\") Broj brzina: 1 Ram: Hi Ten Čelik Viljuška: Hi-Ten Čelik Kruta 28\" Ležaj viljuške: 1\" Navoj Lula volana: Alu/Čelik 22.2/80mm Volan: Čelik 620mm Ručke volana: Hermans Ergo Cev sedišta: Čelik 25.4x300mm Sedište: P:Lab City Lady Obruči: Beretta 28\" Alu Dupli Zid 36H Prednja glavčina: Čelik 36H Zadnja glavčina: Čelik Kontra 36H Ručice kočnica: Saccon PVC-Alu Kočnice: Saccon V-Brake Alu Lanac: KMC Z-410 Ležaj/osovina srednje glave: Thun Patrona Prednji lančanik: Čelik 38T 170mm Pedale: City Alu Nogica: Čelik Gume: 700x40C Dodatna oprema: Blatobrani, Svetlo Prednje + Zadnja Bljeskalica, Korpa za teret prednja, Pak treger, Zvonce, Štitnik lanca, Štitnik za suknju Težina: 17,50 kg', 26500, 25000, '1676135636.jpg', 0, 1, 5, '2023-02-11 17:13:56'),
(9, 25, 'BICIKL SCOTT SUB CROSS 20 MEN', 'SCOTT HIBRID', 'Scott hibrid bicikli su svestrani, dizajnirani da budu udobni i pouzdani na svim terenima.  Zahvaljujući svom jedinstvenom dizajnu i geometriji koja preuzima ključne karakteristike i od MTB-a i od drumskog biciklizma, ovi bicikli su posebno napravljeni za putovanje na posao, vikend avanture i vožnju na putu i ​​van njega.  Na kraju krajeva, Scott hibrid bicikli su napravljeni za zabavu gde god želite.     SUB ( Speed Utility Bike )  Scott SUB Cross 20 akcentuje komfor i udobnost za putovanja i transport. Opremljen sa Shimano Deore grupom, mehanizmom za zaključavanje prednjeg amortizera i Syncros komponentama, SUB Cross 20 je savršen za izlete.     Glavne Karakteristike  Sub Cross Men Alloy Frame Suntour NEX HLO 63mm Fork Shimano Deore T6000 30 Speed Shimano Hyd. Brakes Kenda Booster Specifikacija:  SCOTT SUB CROSS 20 Men Veličina točka: 700 Broj brzina: 30 Ram: Sub Cross Alloy 6061 D.B. / Sub Cross Men geometry / Internal cable routing / SCOTT urban kit ready Viljuška: Suntour NEX HLO / Hyd. Lockout / 63mm travel Ležaj viljuške: GW 1SI110 OE integ. Zadnji menjač: Shimano Deore RD-T6000-SGS / Shadow Type / 30Speed Prednji menjač: Shimano Deore FD-T6010 / 34.9mm Ručice menjača: Shimano Deore SL-M6000-10 / R-fire plus 2 / w/gear indicator Kočnice: Shimano BR-MT200 / Hydr. Disc / SM-RT10 CL Rotor / 160F/160R Prednji lančanik: Shimano FC-T521 / 48x36x26 / w/CG Ležaj/osovina srednje glave: Shimano BB-ES300 / Cartridge Type Volan: Syncros UC3.0 / 31.8 / Tbar/660mm/9° bend Lula volana: Syncros UC3.0 / 7° / Black Pedale: Feimin FP-873-ZU Cev sedišta: Syncros UC3.0 / 31.6mm / 350mm / Black Sedište: Syncros UC2.5 Prednja glavčina: Formula CL51 Zadnja glavčina: Shimano FH-TX5058 Lanac: KMC X10-1 Zadnji lančanik: Shimano CS-HG500-10 / 11-32 T Obruči: Syncros X-20 Disc / 32H / black / Gume: Kenda Booster / 700x45C / 30 TPI Težina: 13.40 kg', 125000, 119900, '1677408927.jpg', 0, 0, 22, '2023-02-11 17:18:38'),
(10, 25, 'BICIKL POLAR FORESTER PRO black-grey', 'TREKKING BIKE', 'Trekking Bike...  Bicikl je oduvek bio sredstvo transporta i komunikacije. Danas, sve više ljudi bira bicikl kao alternativni prevoz i jeftino rešenje za urbanu mobilnost. “Gradski” modeli nude neprevaziđen komfor, pre svega zbog uspravnijeg položaja pri vožnji, većih točkova, udobnijeg sedišta i drugih detalja, što nimalo ne umanjuje njihovu sposobnost da se koriste za razonodu i rekreaciju.  Naša Trekking linija je posebno napravljena za transport i rekreaciju u gradskim sredinama. Forester će omogućiti vožnju van asfaltiranih staza.     Polar Forester Pro Da li tražite bicikl koji će biti vaš idealan saputnik?  Hibridni bicikl kao što je Polar Forester zna kako da kombinuje najbolje od 2 sveta, robustnost planinskog bicikla sa komforom i brzinom gradskog bicikla, čineći jedan hibridni spoj idealan za udobnu vožnju u urbanim ili ruralnim područjima.  Zbog aktivnog položaja sedenja i velikog broja stepena prenosa brzina, možete na duže, vikend ili kratke vožnje.  Sa Polar Foresterom, sve je na dohvat ruke!     Glavne karakteristike Ram Aluminijum 6061 / Butted / Hydroformed / Unutrašnje rutiranje kablova Viljuška Suntour NEX-HLO amortizer sa zaključavanjem Shimano Altus 3x8 pogonski sklop Shimano MT200 hidraulične disk kočnice 700c točkovi Forester dolazi sa ramom napravljenim od 6061 aluminijumskih hidroformiranih „butted“ cevi. Sa ovom tehnikom, dobijeni materijal željenog oblika ima tanji zid i veću krutost, deblji na tačkama naprezanja, ali tanji na drugim mestima. Rezultat je lagan i čvrst ram, sa veoma dobrim voznim karakteristikama. Bužiri i sajle su u velikoj meri rutirani kroz ram, ovo ne samo da daje elegantan izgled, već i dobro štiti bužire i sajle od blata i prljavštine.  Kada vozite bicikl po zemljanom putu, udobnost je veoma važna. Prednja viljuška sa amortizerom osigurava da se sve neravnine bez napora apsorbuju. Na ovaj način uvek održavate potpunu kontrolu.  Lockout dozvoljava brze vožnje po asfaltu i udobnost po lošem putu.  Amortizer je veoma važan kada se vozi po neasfaltiranim putevima, ali na asfaltu vam je potrebno mnogo manje amortizacije. Iz tog razloga smo montirali Suntour NEX-HLO amortizer sa blokadom. Ovaj amortizer nudi vam kao vozaču opciju da zaključate kretanje amortizera tokom vožnje po asfaltu. Na ovaj način možete prilagoditi bicikl u potpunosti po svom ukusu tokom vožnje, udobnost ili brzina na putu.  3x8 pogonski sklop sa kasetom 12-32T obezbeđuje veoma širok izbor stepena prenosa na ovom hibridnom biciklu. Ovo omogućava nesmetano kretanje protiv vetra ili uzbrdo. Shimano Altus komponente obezbeđuju precizne promene brzina.  Kočnice - Shimano MT200 hidraulične disk kočnice. Za bezbedno učešće u saobraćaju važno je da bicikl bude opremljen dobrim kočnicama. Shimano hidraulične disk kočnice tačno ispunjavaju ovaj zahtev. Sa velikom snagom kočenja i dobrom doziranjem, ovaj bicikl vam daje svo samopouzdanje koje vam je potrebno tokom lepe, duge vožnje.  Točkovi od 28” su opremljeni gumama sa šarom gazećeg sloja koja ima nizak otpor kotrljanja i dobro prianjanje.     Polar Forester Pro dolazi u 3 veličine, izbor odgovarajuće veličine bicikla zavisi od vaše visine. Potražite vama odgovarajuću veličinu u Tabeli veličina     Specifikacija: Model: Forester Pro Veličina točka: 700c ( 622 / 28\") Broj brzina: 3x8 Ram: Aluminijum 6061 / Butted / Hydroformed / Unutrašnje rutiranje kablova Viljuška: Suntour NEX HLO-DS700C Disc Ležaj viljuške: 1-1/8\" A-Head Polu Integrisan Lula volana: Alu Podesiva 28.6mm OS 31.8mm 105mm Volan: Alu 670mm OS 31.8mm 15mm rise Ručke volana: Hermans Ergo Cev sedišta: Alu 27.2x350mm Sedište: P:Lab Trekking Obruči: Beretta 29\" Alu Dupli Zid 36H Prednja glavčina: Shimano HB-TX505 36H Zadnja glavčina: Shimano FH-TX505-8 36H Kočnice: Shimano BL/BR-MT200 Hidraulične Prednji menjač: Shimano Altus FD-M310 Zadnji menjač: Shimano Altus RD-M370 SGS Ručice menjača: Shimano Altus SL-M315 3x8 Rapid Fire Plus Zadnji lančanik: Shimano CS-HG31-8 11-30T Lanac: KMC Z8.1 Ležaj/osovina srednje glave: Shimano Patrona BB-UN101 Prednji lančanik: Shimano FC-TY301 48x38x28T 170mm Pedale: MTB Alu Nogica: Alu Podesiva Gume: 700x38C Dodatna oprema: Zvonce', 62000, 59900, '1676136059.jpg', 0, 0, -1, '2023-02-11 17:20:59'),
(11, 25, 'BICIKL POLAR GRAZIA 6s Retro', 'BICIKL POLAR GRAZIA 6-SPEED 28 Retro', 'City...  Klasični gradski bicikl.  Funkcionalan i udoban, dizajniran za svakodnevnu rutinu.  Bilo da se radi o pukom odlasku do prodavnice ili vozite da ostante u formi, najvažnija stvar koju možete da uradite je da u skadu sa svojim biciklom uživate u vožnji.     Polar Grazia 6s Retro Gradski bicikl u klasičnom retro dizajnu.  Grazia Retro je opremljena korisnim dodacima koji značajno poboljšavaju udobnost upotrebe. Pak treger pozadi za siguran transport vaše torbe, stvari iz prodavnice, garderobe ... Iznad točkova su blatobrani u boji koji štite biciklistu od vode i prljavštine. Tu je i rasveta koja garantuje adekvatnu vidljivost i bezbednost prilikom vožnje po mraku.  Ram bicikle je dizajniran tako da vam neće biti problem ulazak ili silazak sa bicikle. Zakrivljeni volan omogućava da zauzmete udoban, uspravan položaj, a široko sedište sa oprugom će ublažiti udare od neravnina sa puta i povećati dobnost u vožnji.  Bicikl je opremljen 1x6 pogonskim sklopom. Shimano zadnji menjač omogućava brze i lake promene brzina kako bi se prilagodili vašim trenutnim potrebama u zavisnosti od terena, nagiba i potrebne brzine. Shimano sistem se odlikuje jednostavnim korišćenjem i velikom izdržljivošću. Proces promene brzina je izuzetno jednostavan, laganim rotiranjem ručice menjača na volanu.  Za kočenje su zadužene pouzdane V-brake kočnice. V-kočnice su provereno i cenjeno rešenje. One garantuju laku kontrolu brzine i omogućavaju vam da brzo zaustavite bicikl. Njihov jednostavan dizajn omogućava dug i nesmetan rad.  28” točkovi će se lako nositi sa neravninama na putu, dok gume obezbeđuju dobro prianjanje na suvom asfaltu i nizak otpor kotrljanja.     Polar Gracija dolazi u 2 veličine, izbor odgovarajuće veličine zavisi od vaše visine. Potražite vama odgovarajuću veličinu u Tabeli veličina     Specifikacija: Model: Polar Grazia 6-Speed 28 Retro Veličina točka: 700c ( 622 / 28\") Broj brzina: 1x6 Ram: Hi Ten Čelik Viljuška: Hi-Ten Čelik Kruta 28\" Ležaj viljuške: 1\" Navoj Lula volana: Alu/Čelik 22.2/80mm Volan: Čelik 620mm Ručke volana: Hermans Ergo Cev sedišta: Čelik 28.6x300mm Sedište: P:Lab City Lady Obruči: Beretta 28\" Alu Dupli Zid 36H Prednja glavčina: Čelik 36H Zadnja glavčina: Čelik 36H Ručice kočnica: Saccon PVC-Alu Kočnice: Saccon V-Brake Alu Zadnji menjač: Shimano RD-TY21 GS Ručice menjača: Shimano SL-RS36-6 Revo Shifter Zadnji lančanik: Shimano MF-TZ500 14-28T Lanac: KMC Z6 Ležaj/osovina srednje glave: Thun Patrona Prednji lančanik: Čelik 40T 170mm Pedale: City Alu Nogica: Čelik Gume: 700x40C Dodatna oprema: Blatobrani, Svetlo Prednje + Zadnja Bljeskalica, Pak treger, Zvonce, Štitnik lanca Težina: 17.40 kg (M)', 28000, 26990, '1676136133.jpg', 0, 0, 10, '2023-02-11 17:22:13'),
(12, 26, 'BICIKL SCOTT ADDICT RC 10 prism grey', 'BICIKL SCOTT ADDICT RC 10', 'Scott Road ...  ... drumski bicikli dizajnirani sa neverovatnom preciznošću, obraćajući pažnju i na najmanje detalje. Bez obzira na vaš nivo ili vaš željeni tip vožnje, moćete naći svog savršenog partnera na drumu.     Addict RC  Lightweight  Kada se penjete putevima zbog kojih želite da odustanete, imati lagani bicikl je siguran način da održite motivaciju na visokom nivou. Nastavite da gurate, skoro ste stigli.     RC je skraćenica od Racing Concept. Ova serija je dizajnirana da zadovolji zahteve World Tour Team-ova obezbeđujući izuzetno lagan i čvrst ram što ga čini prvim izborom za svakog penjača. Potpuno novi Addict RC ima dobro dokazanu Scott race geometriju na kojoj vozač može postići idealnu poziciju za optimalan prenos snage i udobnost u sedištu.  Addict RC je Benchmark Road Bike kada se trka. Dizajniran potrebama DSM tima i ambicioznih svakodnevnih vozača. Izuzetno lagana, Scott-ova najjača karbonska struktura do danas, sa potpuno integrisanim rutiranjem kablova i aero karakteristikama, novi Addict RC je mašina iz snova iz svakog ugla.  Addict RC predstavlja vrednost male težine kao nijedan drugi drumski bicikl. Znanje o karbonu i stručnost u proizvodnji omogućavaju da Scott ponudi jedan od najlakših proizvodnih bicikala na tržištu bez ikakvog kompromisa u pogledu krutosti ili efikasnosti pedaliranja.     Addict RC 10  Lagan, brz i spreman za okretanje glave. Addict RC 10 pruža vam svu konkurentsku prednost o kojoj ste ikada sanjali. Potpuno integrisani kablovi i specifikacija spremna za trke daju vam alat za sprint do vrha planine ili osvajanje vašeg lokalnog criterium-a.     ● INTEGRACIJA  Addict RC je prvi drumski bicikl sa potpuno integrisanim kablovima za mehaničke i elektronske promene brzina. Ovo je postignuto bez ikakvog kompromisa u pogledu kvaliteta menjanja brzina ili kočenja, kao ni krutosti šola volana. Pored toga, dizajniran je tako da mehaničari lako menjaju kablove i održavaju bicikl.     ● LAGAN I KRUT  Kroz pametno nanošenje slojeva karbona i pojačanje u određenim zonama postigli smo veću krutost bottom bracket i šolja volana bez ikakvog kompromisa u pogledu usklađenosti seat stays-a. Dalje, potpuno šuplja struktura kao i minimalne tačke vezivanja i bez delova od legure za ispune ili nosače kočnica na kraju čine izuzetno lagan frame set.     ● SYNCROS CRESTON IC HANDLE BAR  Čist i nenatrpan, naš novi Syncros combo cockpit omogućava nam da sve kablove potpuno interno usmerimo kroz volan, šolje volana i u ram kao deo SCOTT-ovog novog ICC rutiranja. Radeći sa međunarodno poznatim, Gebiomized partnerom, stvorili smo vrhunski ergonomski oblik za vozače. V-oblik nam je takođe omogućio da smanjimo težinu i optimizujemo krutost, istovremeno poboljšavajući vođenje kablova što olakšava život mehaničara. Takođe možemo dobiti više aerodinamike tako što ćemo našu novu kompjutersku integraciju staviti u međuprostor.     ● COMFORT ZONE CONSTRUCTION  Kao i Foil, novi Addict RC ima seat stay vezu koja dovodi do glatke vožnje čak i kada postane grubo. Ovo se postiže bez ikakvog uticaja na efikasnost pedaliranja i krutost bottom bracket-a.     ● GEOMETRIJA  Novi Addict koristi race geometriju koja ispunjava zahteve naših profesionalnih vozača i sportski orjentisanih kupaca koji preferiraju agresivniji položaj i veoma direktno rukovanje.     Glavne Karakteristike  Addict RC Disc HMX Carbon Frame Addict RC HMX Fork SRAM FORCE AXS Disc 24 Speed Syncros Capital 1.0 35 Disc Wheels Schwalbe ONE Race-Guard Tires Syncros Carbon/Alloy parts Specifikacija:  SCOTT ADDICT RC 10 Veličina točka: 700c Broj brzina: 2 x 12 Ram: Addict RC Disc HMX / Road Race geometry / Replaceable Derailleur Hanger / Internal cable routing Viljuška: Addict RC HMX Flatmount Disc / 1 1/4\"-1 1/2\" Eccentric Carbon steerer Ležaj viljuške: Syncros Addict RC Integrated Zadnji menjač: SRAM FORCE eTap AXS / 24 Speed Electronic Shift System Prednji menjač: SRAM FORCE eTap AXS Electronic Shift System Ručice menjača/kočnica: SRAM FORCE eTap AXS HRD Shift-Brake System Kočnice: SRAM FORCE eTap AXS HRD Shift-Brake System / Flatmount Prednji lančanik: SRAM FORCE Power meter Crankset / 48/35 T Ležaj/osovina srednje glave: SRAM DUB PF ROAD 86.5 Volan: Syncros Creston 1.0 Compact / Carbon Lula volana: Syncros RR 1.5 / 1 1/4\" Pedale: - Cev sedišta: Syncros Duncan 1.0 Aero Sedište: Syncros Belcarra Regular 2.0 Točkovi: Syncros Capital 1.0 35 Disc / 24 Front / 24 Rear / Syncros Axle w/Removable Lever with Tool Lanac: SRAM FORCE Zadnji lančanik: SRAM FORCE XG1270 / 10-33T Gume: Schwalbe ONE Race-Guard Fold / 700x28C Težina: 7.84 kg    Tehnologije:     ● EVO-LAP TECHNOLOGY  Uz pravilan izbor materijala, osamdeset posto posla na izradi rame je urađeno. Ali preostalih dvadeset posto zahteva najviše naših napora. Iz tog razloga, naš izbor najnaprednijih karbonskih vlakana na tržištu praćen je intenzivnom upotrebom specifičnih alata, kao što je FEA (finite element analysis) softver, za mapiranje rasporeda karbona.  Pomoću FEA softvera možemo simulirati različite sile na virtuelnom modelu rama i u skladu sa tim prilagoditi konstrukciju rama. FEA softver nam omogućava da kreiramo kompletne virtuelne prototipove koji uključuju sve fizičke fenomene koji postoje u realnom svetu.  Sa našom Evo-Lap tehnologijom modeliramo ram za optimizaciju površine, simuliramo strukture cevi sa različitim orijentacijama slojeva, posmatramo rezultate korišćenja različitih konfiguracija i testiramo distribuciju sile u različitim delovima rama. Zahvaljujući ovom opsežnom kompjuterskom modelovanju, optimizovali smo slojeve karbona u svim delovima našeg rama. Kada su delovi spojeni zajedno u prvim prototipovima, rezultat je bio super lagan i kompaktan ram bez žrtvovanja krutosti, udobnosti ili otpornosti na udar. Čitav asortiman je imao koristi od naše Evo-Lap tehnologije.     ● SANDWICH DROPOUTS  Addict RC dropout su dizajnirani da budu integrisani u thru-axle sistem zahvaljujući dizajnu šuplje cevi koji omogućava jednostavnu i laganu strukturu.     ● HOLLOW STRUCTURE  Kompletan set rama je šupalj i ima nikad neviđenu čistu unutrašnjost kako bi se maksimalno smanjila težina.     ● SEAT CLAMP  Naša nova ultra-lagana šelna sedišta teži samo 12 grama i omogućava mehanizam stezanja koji je veoma prihvatljiv za karbon. Ovo nam je omogućilo da uštedimo još više težine na cevi sedišta (težina cevi sedišta: 142 grama).     ● INTEGRATED CABLE ROUTING  Addict RC i Foil dolaze sa potpuno integrisanim kablovima za mehaničko i elektronsko menjanje brzina. Ovo su postigli naši inženjeri bez ikakvog kompromisa u pogledu kvaliteta menjanja brzina i kočenja ili krutosti head tube cevi. Štaviše, iznenađujuće je lako za mehaničare da menjaju kablove i održavaju bicikl.', 800000, 791000, '1676136556.jpg', 0, 0, 2, '2023-02-11 17:29:16'),
(13, 26, 'BICIKL LOOK 765 OPTIMUM PLUS Disc metallic blue', 'BICIKL LOOK 765 OPTIMUM + SHIMANO 105 MIX 2X11 METALLIC BLUE-GLOSSY', '765 OPTIMUM+ ENDURANCE I RIDE LONGER     On The Road And Trail  Zahvaljujući specifičnoj geometriji: relativno kratka top tube i podignut kokpit kao rezultat postavljanja headset u višu poziciju, 765 OPTIMUM DISC je svestran endurance bicikl. Podjednako dobro se snalazi na brdovitim putevima kao i na lakim šljunčanim stazama.  765 OPTIMUM DISC, sa svojim disk kočnicama, ima dovoljno slobodnog prostora da omogući upotrebu guma do 30 mm širine, pružajući vozaču „light gravel“ tip bicikla. Takođe koristi benefite „CARBON + FLAX FIBER“ tehnologije koja mu daje apsolutnu udobnost.     765 OPTIMUM+ Napravi još jedan krug ...  VOŽNJA. TO JE SVE. 765 OPTIMUM+, ILI UMETNOST JEDNOSTAVNOSTI.  Otkrijte - ili ponovo - slobodu vožnje gde god i kako god izaberete sa potpuno novim LOOK 765 OPTIMUM+ karbonskim drumskim biciklom. Kada krajnji učinak i marginalni dobici ne preokrenu vaš pogon, vratite stvari na jednostavnost koja vožnju čini zabavnim.  Imajući ovo na umu, LOOK inženjeri su dizajnirali ram od karbonskih vlakana 765 OPTIMUM+ tako da bude jednostavan i pristupačan. Njegova geometrija i kompozicija su predodređeni za ugodan, rekreativni biciklizam. Precizno odabrane komponente zaokružuju bicikl koji je zbunjujuće - i utešno - racionalan.     ● A BIKE THAT TAKES AWAY THE IFS AND THE BUTS VERSATILITY PERSONIFIED  Drumski bicikl, definitivno. Ali ne samo to. Snaga 765 OPTIMUM+ leži u čvrstoj svestranosti koja će vas odvesti bilo gde. Njegove komponente, geometrija orijentisana na izdržljivost i pedantna mešavina karbonskih vlakana su dizajnirani da se kreću po najravnijim putevima i najbrdovitijim stazama.  Originalno opremljen Road točkovima i gumama, ovo je bicikl koji se lako transformiše u terenskog ratnika zahvaljujući širokim zazorima guma i napred i pozadi. Full-carbon Viljuška i 3D Wave seatstays mogu da prihvate širine guma do 700x42. Da li vam treba više? Nema problema: 765 OPTIMUM+ je takođe kompatibilan sa MTB točkovima od 27,5 inča i gumama 650x2,1.  Krenite ka novim horizontima u udobnosti i sa samopouzdanjem.     ● UDOBAN KAO FOTELJA. GEOMETRIJA DIZAJNOVANA ZA VAS.  Geometrija rama 765 OPTIMUM+ je neosporno orijentisana na izdržljivost. Igrajući se sa dužinom rama - 10 mm kraćom - i visinom - 20 mm višom, LOOK inženjeri su postigli položaj koji je uspravniji od trkačkih modela. Drugim rečima, ovaj bicikl je predodređen da ponudi povećanu udobnost u svim vožnjama, dugim ili kratkim. Od sada uživajte u luksuzu rama prilagođenog vašim biciklističkim ambicijama.     ● 30 GODINA ', 369000, 350000, '1677419254.jpg', 0, 0, 56, '2023-02-11 17:31:10'),
(14, 26, 'BICIKL SCOTT SPEEDSTER 30 red', 'BICIKL SCOTT SPEEDSTER 30', 'Scott Road ...  ... drumski bicikli dizajnirani sa neverovatnom preciznošću, obraćajući pažnju i na najmanje detalje. Bez obzira na vaš nivo ili vaš željeni tip vožnje, moćete naći svog savršenog partnera na drumu.     Speedster  Endurance  Ako uživate u dugim danima u sedištu i vraćanju kući nakon što se upale ulična svetla, onda su Endurance bicikli za vas. Udobni, efikasni i dinamični, ovi bicikli jedu kiometre za doručak     Novi Speedster je lakši i moderniji nego ikada ranije. Novi frame kit karakteriše karbonska viljuška, unutrašnje rutiranje kablove i udobna geometrija.  Speedster 30  SCOTT Speedster 30 je lagan, okretan i ekonomičan drumski aluminijumski bicikl. Sa potpuno integrisanim kablovima, ne samo da ovaj bicikl nudi dobru vožnju, već i dobar izgled!     Glavne Karakteristike  Speedster Disc Alloy Frame Speedster Disc Carbon Fork Shimano Sora 18 Speed Syncros Race 24 Disc Rims Schwalbe Lugano Tires Specifikacija:  SCOTT SPEEDSTER 30 Veličina točka: 700c Broj brzina: 2 x 9 Ram: Speedster Disc / 6061 D.Butted Alloy / Endurance geometry / int. cable routing / Syncros fender kit ready Viljuška: Speedster HMF Disc / 1 1/4\"-1 1/2\" Eccentric Carbon steerer Ležaj viljuške: Acros AIF-1113 Zadnji menjač: Shimano Sora RD-R3000-GS / 18 Speed Prednji menjač: Shimano Sora FD-R3000 Ručice menjača/kočnica: Shimano Sora ST-R3000 / Dual control 18 Speed Kočnice: Tektro MD-C511 Mech.Disc / Tektro TR-160-35 rotor 160/F and 160/R Prednji lančanik: Shimano Compact / FC-R345 / 50x34 T Ležaj/osovina srednje glave: Shimano BB-ES300 Volan: Syncros Creston 2.0 Compact / 31.8mm Lula volana: Syncros RR2.5 / 1 1/4\" / four Bolt 31.8mm Pedale: - Cev sedišta: Syncros RR2.5 27.2/350mm Sedište: Syncros Tofino Regular 2.5 Prednja glavčina: Formula Team II CL Disc 28 H Zadnja glavčina: Formula Team II CL Disc 28 H Lanac: KMC X9 Zadnji lančanik: Shimano CS-HG400 / 9 Speed 11-32 T Obruči: Syncros Race 24 / 28 Front / 28 Rear Gume: Schwalbe Lugano / 700x32C Težina: 10.5 kg', 165000, 155900, '1676136758.jpg', 0, 0, -1, '2023-02-11 17:32:38'),
(15, 26, 'BICIKL LOOK 795 BLADE Disc black mat glossy', 'BICIKL LOOK 795 BLADE DISC SHIMANO ULTEGRA 2X11', '795 BLADE AERO I RIDE FASTER     Da li ste mislili da će crno na crnom ostati neprimećeno? Razmislite ponovo, jer ovaj efikasan i svestran aero bicikl kombinuje najbolje od LOOK inženjeringa od karbonskih vlakana sa najboljim Shimano grupama. I to će bez sumnje biti primećeno.     NOVI PROCESI PROIZVODNJE ZA NOV SASTAV KARBONA  Zahvaljujući vlaknima sa još većim modulom, udeo karbonskih vlakana je jednostavno udvostručen (sa 32% na 63%), krutost cevi se postiže brže i broj slojeva se može smanjiti. To znači da je debljina cevi, a time i njihova težina, znatno smanjena. Ultra high modulus (UHM) vlakna se dodaju do 4% u najvažnijim strateškim oblastima kako bi se osigurala optimalna krutost. Rezultat je ultra lagan i izuzetno jak aero ram.     Specifikacija:  795 BLADE DISC SHIMANO ULTEGRA 2X11 Veličina točka: 700c Broj brzina: 2 x 11 Ram: Carbon / 54% IM FIBERS, 32% HM FIBERS, 8% HR FIBERS, 6% OTHER FIBERS Zadnji menjač: SHIMANO ULTEGRA R 8000 Prednji menjač: SHIMANO ULTEGRA R 8000 Ručice menjača/kočnica: SHIMANO ULTEGRA Kočnice: SHIMANO ULTEGRA DISC HYDRAU / rotor SHIMANO CENTERLOCK RT 800 F: 160 mm R : 140 mm Prednji lančanik: SHIMANO ULTEGRA 52X36 R8000 Ležaj/osovina srednje glave: BB 386 / Token Ninja TF 38624 Volan: LOOK LS2 ALLOY Lula volana: LOOK ADS Pedale: - Cev sedišta: LOOK AEROPOST 2. CARBON 400 mm Sedište: LOOK by SAN MARCO SHORT FIT DYNAMIC Narrow open fit Točkovi: LOOK R 38 D CARBON TUBELESS Lanac: SHIMANO CN HG 601 Zadnji lančanik: SHIMANO ULTEGRA 11X30 R8000 Gume: HUTCHINSON FUSION 5 TUBELESS READY 700 X 25 (Bike delivered with inner tube)    TECHNOLOGIES     ● NOVI EPS PROCES PROIZVODNJE  Nova EPS (Ektended Polistirene) tehnologija se koristi za dobijanje vrhunskih, ultralakih proizvoda. Skuplji od tradicionalnog procesa, koristi se samo za naše modele bicikala najviših performansi. Umesto da ima jedan kalup za svaku veličinu rama, ovaj metod zahteva dva: jedan za spoljašnji oblik rama i jedan za unutrašnji. EPS proces se sastoji od prevlačenja sloja tkanine od ugljeničnih vlakana preko tvrdog polistirena, koji se zatim uklanja. Proces oblikovanja visoke tehnologije izbegava bilo kakve nabore, poroznosti i oblasti slabosti u karbonu.  Ovo čini 795 BLADE jednim od najlakših aerodinamičnih bicikala visokih performansi na tržištu.     ● CARBON CORE DESIGNED & MANUFACTURED BY LOOK  Od početka LOOK-a u svetu biciklizma, u vreme kada je metal bio kralj, naš izbor je uvek bio karbon. Više od 30 godina razvijali smo - u okviru sopstvenih fabrika - jedinstvenu ekspertizu i opsežno znanje u tehnologijama karbonskih vlakana da bismo postigli visoko specifična svojstva koja su orijentisana na performanse.     NAŠ DNK JE KARBON  Pre trideset godina, LOOK je započeo izvanrednu avanturu proizvodnje karbonskih ramova i viljuški.  Pre trideset godina, u vreme kada su čelični ramovi ukrotili visoke vrhove, LOOK je prihvatio neverovatan izazov savladavanja novog materijala, karbona. Karbon o kome danas razgovaramo nije ništa drugo do vlakno visokih performansi sa neverovatnim mehaničkim svojstvima koja zahtevaju veliku stručnost u procesu transformacije. Koriste se u obliku tkanine i u slojevima prethodno zasićenim smolom, moguće nam je da proizvedemo lagane i složene delove sa performansama bez premca u svetu biciklizma.  Ono što je pre trideset godina izgledalo kao fantazija, pretvorilo se u istinsko stečeno znanje koje je postalo ponos cele kompanije. Dan za danom, mesec za mesecom, naša strast je rasla sve više i više, što je konačno dovelo do stvaranja kulture naše kompanije, našeg DNK.     \"SOMETHING TO BE PROUD OF, THE ARCHITECTS OF THE VICTORIES OF CHAMPIONS.\"     RUČNA IZRADA  Globalni uspesi ne pripadaju samo šampionima, već i svima onima u Neversu koji svakodnevno nastavljaju da inoviraju, neprestano unapređuju znanje, rade do najveće preciznosti, kontrolišu sve do najsitnijih detalja u svakom proizvodnom koraku, muče svaki materijal, eliminišući sve što ima i najmanji nedostatak i nastavljajući, danas kao i juče, da ručno proizvodimo i sklapamo svaku viljušku i svaki ram za uživanje svih onih koji vole biciklizam.     REZANJE, SASTAVLJANJE I OBLIKOVANJE KORAK 1 Karbonski materijal pruža elastičnost, fleksibilnost, živost, performanse, odziv i udobnost. Kvaliteti koje nema nijedan drugi materijal koji omogućavaju ramovima da zadrže svoju početnu geometriju tokom celog života. Što se tiče otpora, on je 5 puta bolji od titanijuma.     BRUŠENJE I KONTROLA KORAK 2 Uz 100% kontrolu nad celokupnom proizvodnjom, 100% arhiviranje početne krutosti plus sledljivost serija materijala, mašina i operatera, LOOK čini sve da osigura da njegova kontrola kvaliteta karbona osigurava vaš kvalitet na putu.     DEKORACIJA I LAKOVI KORAK 3 Da bismo obezbedili visokokvalitetne proizvode, posebnu pažnju posvećujemo završnoj obradi proizvoda. Dekoracija, farbanje i lakiranje prolaze kroz individualne i veoma zahtevne kontrole.     AERO TEST KORAK 4 Za nas se ne radi samo o razgovoru. Zato pridajemo izuzetnu važnost testiranju svih prototipova u aerotunelu kako bismo naučno garantovali kvalitet naših inovacija.     ● 3S TEHNOLOGIJA  Seatstays 795 BLADE dizajnirani su za maksimalnu efikasnost. Odsustvo mosta između njih i njihov zakrivljeni oblik omogućavaju im da se savijaju pod silom koju prenosi zadnja nabla. Zadnji točak nikada ne gubi kontakt sa putem, obezbeđujući optimalan prenos snage i povećani grip i kontrolu.     ● LAKO RUTIRANJE KABLOVA  795 BLADE je dizajniran sa integracijom kablova i lakom održavanju na umu. I felna i disk kočnica su kompatibilni sa mehaničkim ili elektronskim grupama.  Kablovi mjenjača su sprovedeni kroz lulu i šolje volana na obe verzije. Rim brake verzija nudi kablove od volana do prednje kočione čeljusti (prednja kočnica) i do top tube (zadnja kočnica), a glavni cilj je da se efikasnost kočnica zadrži na visokom nivou i lako održavanje. Kod verzije sa disk kočnicom, kablovi kočnica su kombinovani sa kablovima menjača i provučena kroz lulu i šolje volana za izuzetno uredan prednji kraj i optimizovanu aerodinamiku. Podešavanje visine lule je olakšano zahvaljujući odstojnicima sa specifičnim otvorima za kablove na zadnjoj strani.', 520000, 509000, '1676136834.jpg', 0, 0, 2, '2023-02-11 17:33:54'),
(16, 23, 'ROLERI ROLLERBLADE MAXXUM XT black-red', 'ROLERI ROLLERBLADE MAXXUM XT', 'Rollerblade® je zaslužan za nastajanje jednog od najbrže razvijajućih sportova u svetu. Globalni lider na tržištu \"inline\" rolera, Rollerblade® je zaslužan za razvoj roleraškog sporta i promenu svesti kod ljudi u percepciji ovog sporta. Roleri su u početku prihvaćeni kao isključivo sredstvo za vansezonske treninge hokejaša, dok su danas roleri prihvaćeni kao svakodnevni i tzv. \"lifestyle\" proizvod koga može koristiti svako. U današnje vreme profesionalni sportisti, zaljubljenici u fitness i rekreaciju svih uzrasta uživaju u sportu vožnje \"inline\" rolera.     RollerBlade Maxxum XT Group: Fitness / X-Training  Maxxum XT je hibridnai roler koji spaja brzinu i izdržljivost sa dodatnom bočnom podrškom. Potpuno novo pristajanje ima modifikovanu školjku za manju težinu i poboljšanu podršku, dok Footboard Sizer obezbeđuje odgovarajuće performanse. Performanse i kondicija čine Maxxum XT popularnim izborom za Rollerblade-ov \"Skate to Ski\" program, koji pomaže skijašima da koriste rolanje van sezone, pomažući im da ostanu u formi. Skate Liner Plus sa Performance Skate Insole Plus poboljšava sposobnost rolanja sa poboljšanim jastučićima, poboljšanim omotačem, većom prozračnošću i podstavom u peti koja apsorbuje udarce. Footboard Sizer nudi dve veličine u jednom roleru. Omogućava vozačima rolera da umetnu podnožje ispod uloška da bi se stvorilo udobnije, bolje pristajanje ili da ga uklone kako bi se prilagodili većoj veličini za više prostora u svojim rolerima.     Karakteristike ● OVAJ ROLER JE ZA - Fitnes, gradsko rolanje, putovanje na posao i rekreativno klizanje. Često se koristi u Rollerblade-ovom programu \"Skate to Ski\".  ● SKATE LINER PLUS & FOOTBOARD SIZER - Pruža vrhunsko pristajanje sa novim dizajnom jastučića i anatomskim pristajanjem. Perforirana mreža u prednjem delu stopala pruža prozračnost, dok područje prstiju od likre osigurava udobnost u kutiji za prste. Comfort Flex jezik sa svojim obloženim krilima i ojačanom središnjom šipkom daje poboljšanu fleksibilnost i kontrolu. Footboard sizer vam omogućava da stvorite čvršće pristajanje ili više prostora u rolerima.  ● PREMIUM SECURE CLOSURE SYSTEM - Mikropodesivi 45° i kopče za manžetne sa pertlama kroz školjku i postavu manžetne pomažu da se dobije prilagođeno precizno pristajanje.  ● EXTRUDED ALUMINUM FRAME – Čvrsti, stabilni 280mm/11” bočno podesiv ram spušta centar gravitacije, povećavajući brzinu i upravljivost.  ● ROLLERBLADE SUPREME WHEELS - 90mm/85A točkovi sa Twincam ILQ-7 Plus ležajevima smanjuju habanje i maksimiziraju brzinu.     Target User  NIVO LIČNE VEŠTINE  Nov u vožnji rolera                      Pro  ○ ○ ○    ○ ○ ○    ● ● ●    ● ● ●    ○ ○ ○  * Vožnja rolera je tehnički sport. Da biste izabrali najbolju opciju rolera, važno je da definišete svoju sposobnost vožnje. Uvek možete nadograditi komponente rolera i/ili aktuelni roler kako se vaša sposobnost poboljšava.  PERFORMANSE ROLERA  Slobodno vreme                          Pro  ○ ○ ○    ○ ○ ○    ● ● ●    ● ● ●    ○ ○ ○  * Performanse rolera su vrsta rolera koja vam je potrebna za vaš nivo vožnje  BOČNA PODRŠKA  Velika                                Minimalna  ○ ○ ○    ● ● ●    ○ ○ ○    ○ ○ ○    ○ ○ ○  * Bočna podrška uključuje visinu manžetne i opštu strukturu rolera, plus veličinu točka. Kako se veličina vašeg točka povećava, bočna podrška postaje važnija. Roleri sa tvrdom cipelom pružaju više bočne podrške od rolera sa mekanom cipelom.  FIT  Casual                            Competition  ○ ○ ○    ○ ○ ○    ● ● ●    ● ● ●    ○ ○ ○  * Prianjanje rolera ima veze sa udobnošću i performansama. Kako se nivo vaše veštine povećava, prianjanje postaje čvršće za veću kontrolu i sposobnost rolanja.  ZAUSTAVNA SNAGA  Najbolje za kočenje   Nema kočnica  ○ ○ ○    ● ● ●    ● ● ●    ○ ○ ○    ○ ○ ○  * Na snagu zaustavljanja ili koliko brzo možete da se zaustavite utiče visina manžetne, veličina točka i dužina rama. Roleri sa većim točkom i dužim ramom će smanjiti količinu zaustavne moći. Roleri sa manjom zaustavnom snagom su za naprednije vozače.  ISKUSTVO ROLANJA  Umereno                                    Brzo  ○ ○ ○    ○ ○ ○    ● ● ●    ○ ○ ○    ○ ○ ○  * Iskustvo rolanja uzima u obzir kombinaciju rama, točkova, ležajeva i osovina. Što je kvalitet komponenti rolera bolji, to će se roleri kotrljati brže i glatkije.     Specifikacija TOČKOVI - Supreme 90mm/85A GORNJI SPOLJNI DEO CIPELE - Maxxum, molded, vented, Shock Eraser, Anti-Torsion Box, 3WD Ready ULOŽAK / LINER - Skate Liner Plus, anatomical padding, Control Flex tongue, heel cup and ankle pockets, sublimated lining, stretch toe box, V-cut, PSI Plus footbed, Footboard Sizer for fit adjustment, cuff eyelets RAM / ŠINE - Extruded Alu (max 90mm) 280mm/11\" KOČNICA - kočnica na roleru ZATVARANJE - Micro adj cuff buckle, 45° buckle, laces LEŽAJEVI - Twincam ILQ-7 Plus    Tehnologije ● Footboard Sizer  Novi Footboard Sizer nudi dve veličine u jednom roleru. Omogućava vozačima da umetnu Footboard ispod uloška da bi se stvorilo udobnije, bolje pristajanje ili da ga uklone kako bi se prilagodili većoj veličini za više prostora u svojim rolerima.     ● Skate Liner Plus  Skate Liner Plus pruža pravu nadogradnju i poboljšava držanje i sposobnost rolanja uz unapređenu amortizaciju, poboljšano omotavanje, veću prozračnost i podloga koja apsorbuje udarce u peti. V-cut liner obezbeđuje udobnost dok Comfort Flex Tongue olakšava podršku i savijanje.     ● Performance Skate Insole Plus  Rollerblade PSI+ uložak dodaje više odziva vašim rolerima sa ojačanim ležištem u peti za podršku i optimalan položaj stopala u ulošku.     ● 3WD Ready  3WD Ready omogućava vozačima da konvertuju svoje rolere u roler sa 3 točka.     ● Supreme  Rollerblade Supreme high performance točkovi su projektovani da obezbede pravu količinu prianjanja, brzine i habanja. Specifični poliuretan poboljšava odskok, kontrolu i udobnost.     ● Twincam ILQ-7  Twincam ILQ-7 ležaj je 7-kuglični ležaj visokih performansi. Sa najlonskim držačima i metalnim štitnicima, oni su izdržljiviji od ostalih ležajeva. Japanska Kiodo mast pruža vrhunsko podmazivanje koje minimizira trenje za bolje kotrljanje.     ● Molded (tvrda cipela)  Molded roleri su izuzetno otporni, izdržljivi, agilni i brzo reaguju.     ● Shock Eraser  Shock Eraser pomaže da se minimizira udar i učini rolanje ugodnijim za trikove, skokove ili jednostavno rolanje avanturističkim stazama.     ● Anti Torsion Box  Anti Torsion Box je specijalno dizajniran za Twister Edge rolere. Integrisan je u đon cipele i radi u kombinaciji sa aluminijumskim umetnutim pločama kako bi se maksimizirao prenos energije i poboljšala torziona krutost.', 30200, 28400, '1676137100.jpg', 0, 1, -2, '2023-02-11 17:38:20'),
(17, 23, 'ROLERI ROLLERBLADE DEČIJI MICRO CUBE G pink', 'ROLERI ROLLERBLADE MICRO CUBE G', 'Rollerblade® je zaslužan za nastajanje jednog od najbrže razvijajućih sportova u svetu. Globalni lider na tržištu ', 16100, 14490, '1677419225.jpg', 0, 0, 36, '2023-02-11 17:40:38'),
(18, 23, 'ROLERI ROLLERBLADE DEČIJI MICROBLADE CUBE ', 'ROLERI ROLLERBLADE MICRO CUBE midnight blue-warm orange', 'Rollerblade® je zaslužan za nastajanje jednog od najbrže razvijajućih sportova u svetu. Globalni lider na tržištu ', 17200, 14490, '1677356249.jpg', 0, 0, 9, '2023-02-11 17:41:51'),
(19, 23, 'ROLERI ROLLERBLADE RB CRUISER black-neon yellow', 'ROLERI ROLLERBLADE RB CRUISER', 'Rollerblade® je zaslužan za nastajanje jednog od najbrže razvijajućih sportova u svetu. Globalni lider na tržištu ', 17900, 16990, '1677355579.jpg', 0, 0, 9, '2023-02-11 17:43:01'),
(20, 22, 'TROTINET XPLORER E-Scooter S6 10\" black', 'TROTINET XPLORER E-Scooter S6 10\" black', 'E-scooter Xplorer S6 10\"...  Električni trotinet S6 10\" brenda Xplorer, izdvaja se od konkurencije kako po samom kvalitetu izrade, tako i po specifikacijama kao što su - Honeycomb gume (OTPORNE NA BUŠENJE - nemaju unutrašnju gumu) veličine 10\" ; Prednji i zadnji amortizer, koji čine vožnju nesvakidašnje udobnom; Podesivost visine upravljača; Prednje i zadnje svetlo za maksimalnu bezbednost pri vožnji; LCD display; Motor snage 500W, koji može da nosi osobu do 120kg; Laka prenosivost i male dimenzije sklopljenog uređaja.  Specifikacija:  Naziv: Xplorer Električni trotinet S6 10\" Tip proizvoda: E-scooter Veličina točkova: prednja i zadnja guma 10\' Honeycomb Baterija: 10,4 Ah Snaga motora: brushless 36V/350W, maksimalna snaga 500W Maksimalna brzina: 25km/h, EU regulativa Maksimalno opterećenje: 120 kg Napon: 100V-240V (50~60HZ) Vreme punjenja: 5-6h Punjač: 110V/240V, 2.0A Kocnice: električna kočnica + disk kočnica dva u jednom LCD ekran: Eksterni LCD ekran +USB priključak za punjenje Amortizeri: Prednji i zadnji Svetla: Prednje i zadnje svetlo Veličina sklopljenog trotineta: 1222*456*1194 mm Veličina rasklopljenog trotineta: 1107 * 180 * 423 mm Domet: 45-55 km NV: 17,7 kg G.V: 21.09KG', 76900, 69900, '1676137554.jpg', 0, 0, 25, '2023-02-11 17:45:54'),
(22, 22, 'TROTINET STREET SURFING X 200 electro blue', 'TROTINET STREET SURFING X 200', 'Street Surfing X200 je specijalno napravljen za svakodnevnu upotrebu. Visinu upravljača možete prilagoditi svojim željama, a zahvaljujući mehanizmu za preklapanje može se čuvati na malom prostoru.  - Visina 90-100 cm - Podnožje: 54 x 12mm aluminijum - Širina volana: 35cm - Neklizajuća površina - Nogica - Spona sa 2 zavrtnja - Podesivi volan sa penastim ručkama volana - Podešavanje volana u 3 pozicije - Kočnica - Mogućnost sklapanja - Točkovi: 200mm / 85А Polyurethane (PU) / ABEC 7 - Preporučeni uzrast: 8+ godina - Max. opterećenje: 100 kg - Težina: 3.8 kg', 12000, 10500, '1676137662.jpg', 0, 0, 18, '2023-02-11 17:47:42'),
(24, 22, 'TROTINET ROYAL BABY SABER black-green', 'TROTINET ROYAL BABY SABER', 'Trotinet... omiljena zabava za decu...  Specifikacija:  Royal Baby Saber Model: RO203M Težina: 2660 g Visina: 660-900 mm / mogućnost podešavanja visine volana u 3 nivoa Širina: 270 mm Dužina: 560 mm Prečnik točkova: Ø 120mm prednji točkovi / 2 kom, Ø 80mm zadnji točkovi / 2 kom Širina točkova: 24 mm Rastojanje prednjih točkova: 235 mm Ležaji: precision bearing Udaljenost osovine: 460 mm Mogućnost rasklapanja: volan - baza Materijal baze: Glass Fiber Nylon Base Širina baze: 135mm Dužina baze: 315mm Materijali koji se koriste: GFK, PP, ALU Nožna kočnica Za uzrast 3 + godine Max. opterećenje: 60 kg', 7000, 5900, '1676137770.jpg', 0, 0, 15, '2023-02-11 17:49:30'),
(26, 22, 'ROCES TROTINET ALU 125mm pink', 'ROCES TROTINET ALU 125mm pink', 'Za Uzrast	8+ Godina Max. Opterećenje	80 Kg Tip	Klasični', 6300, 4200, '1676137884.jpg', 0, 0, 21, '2023-02-11 17:51:24'),
(28, 27, 'LONGBOARD STREET SURFING STREAMING ', 'LONGBOARD STREET SURFING STREAMING black-red-white', ' Streaming... Longboard Kicktail 36\'  Street Surfing Cut Kicktail 36\" longboard idealan je za ulična krstarenja i urbano manervisanje. Ovaj board ima 8-slojni ply deck za izdržljivost i prostrani cut kicktail za bezbrižnu i uzbudljivu vožnju. Aluminijumski trucks sa riser pads-om smanjuju vibracije za stabilan osećaj surfovanja. Za svakog surfera, Kicktail 36 \"je odlično oružje za gradski saobraćaj i slalom između pešaka.      - Dimenzija daske: 91 x 21.5 cm     - Materijal daske: 8-slojni javor     - Grip tape for maximum traction     - Međuosovinsko rastojanje: 57.5 cm     - Concave: 0.39”     - Točkovi: 70 x 51mm / 80A Polyurethane (PU) / Round lip     - Risers: to reduce vibration     - Silentblock: 92A     - Trucks: 7 \"painted ALU - reverse pin construction for easier turning     - Ležajevi: ABEC 9     - Preporučeni uzrast: 8+ godina     - Max. opterećenje: 100 kg     - Težina: 3 kg', 8100, 7600, '1676142016.jpg', 0, 0, 5, '2023-02-11 19:00:16'),
(29, 27, ' CASTERBOARD STREET SURFING', 'CASTERBOARD STREET SURFING WAVE GLX RATTLE SNAKE ', ' Wave GLX nastavlja da donosi istu glatku vožnju i lake okrete u casterboarding. Zabavite se krstarenjem i izvođenjem raznih trikova sa prvim casterboard-om ikada napravljenim.      - Dimenzija: 86 x 23 cm     - Printed grip tape on decks     - Grip pattern built in for top traction     - 360°casters     - Točkovi: 78mm     - Ležajevi: ABEC 7', 8100, 6990, '1676149693.jpg', 0, 0, 11, '2023-02-11 19:01:29'),
(30, 27, 'ROCES SKATEBOARD TEXTURESKULL CONCAVE', 'ROCES SKATEBOARD TEXTURESKULL CONCAVE ', ' Roces Tekture Skull Concave ima 9-slojnu ploču od javorovog drveta zaobljenog oblika. Zahvaljujući točkovima 54x36 mm idealan je za svakog skejtbordera.      Deck: 9 ply maple wood 31x8”x11mm     Non-slip: normal     Bearings: ABEC 3     Wheel: 50x36mm, Polyurethane     Trolley: heavy aluminum, sandy', 6900, 6460, '1676142158.jpg', 0, 0, 9, '2023-02-11 19:02:38'),
(31, 27, 'SKATEBOARD STREET SURFING CRUISER KICKTAIL ', 'SKATEBOARD STREET SURFING CRUISER KICKTAIL white soul', ' Streaming... Artist Series... Cruiser Kicktail 28 \'  Skateboard Cruiser Kicktail 28 \' Vhite Soul dizajniran je posebno za cruising, carving & freestyle.      - Dimenzija daske: 71 x 21cm     - Materijal daske: 9-slojni javor     - Grip tape printed     - Točkovi: 60x45mm, 80A, PU, rounded edges     - Trucks: 5 \"lacquered ALU Seagull     - Ležajevi: ABEC 9     - Preporučeni uzrast: 8+ godina     - Max. opterećenje: 70 kg     - Težina: 2,6 kg', 8100, 5990, '1676142230.jpg', 0, 0, 11, '2023-02-11 19:03:50'),
(34, 31, 'SKIJE NORDICA DEČIJE TEAM GT FLAT black-red', 'SKIJE NORDICA TEAM GT (FLAT)', 'Nordica Junior Series... Za prve korake na snegu i za buduće profesionalce...     Specifikacija & Tehnologija    Sizes: 70 · 80 · 90 · 100 · 110 · 120 · 130 · 140 (FLAT) Sidecut (by size): 102-67-89 (70-90) · 104-67-93 (100-110) · 106-67-95 (120-140) Radius (by size): 3 (70) · 4 (80) · 5 (90) · 6 (100) · 7 (110) · 8 (120) · 10 (130) · 12 (140) DIN setting: 2-7 EPS (M 7.0 FASTRAK) 0,75-4,5 EPS (M 4.5 FASTRAK) System:FASTRAK BABY (70-80) · FASTRAK KID (90-120) · FASTRAK JUNIOR (130-140) Ski construction: ENERGY FRAME CA Napomena: uz skije ne dolaze vezovi / Preporučen vez: Marker M4.5', 13160, 5900, '1677267523.jpg', 0, 1, 12, '2023-02-24 19:38:43'),
(35, 31, 'SKIJE NORDICA DEČIJE LITTLE BELLE FLAT blue-pink', 'SKIJE NORDICA LITTLE BELLE (FLAT)', 'Nordica Junior Series... Za prve korake na snegu i za buduće profesionalce...     Specifikacija & Tehnologija    Sizes: 70 · 80 · 90 · 100 · 110 · 120 · 130 · 140 (FLAT) Sidecut (by size): 102-67-89 (70-90) · 104-67-93 (100-110) · 106-67-95 (120-140) Radius (by size): 3 (70) · 4 (80) · 5 (90) · 6 (100) · 7 (110) · 8 (120) · 10 (130) · 12 (140) DIN setting: 2-7 EPS (M 7.0 FASTRAK) 0,75-4,5 EPS (M 4.5 FASTRAK) System: FASTRAK BABY (70-80) · FASTRAK KID (90-120) · FASTRAK JUNIOR (130-140) Ski construction: ENERGY FRAME CA Napomena: uz skije ne dolaze vezovi / Preporučen vez: Marker M4.5', 13160, 5900, '1677267598.jpg', 0, 0, 21, '2023-02-24 19:39:58'),
(36, 31, 'SKIJE ELAN RACE PRO KHUN EL4.5 QT', 'SKIJE ELAN RACE PRO KHUN EL4.5', 'Elan Junior Series  Rocker Type: Camber Tehnologija : Construction - Cap, Core - Composite, Base - Extruded Sistem / Plate: Quick Trick Vez: EL4.5 QT', 11990, 7500, '1677267690.jpg', 0, 1, 15, '2023-02-24 19:41:30');
INSERT INTO `products` (`id`, `categoryId`, `ime`, `kratkiOpis`, `opis`, `orginalnaCena`, `prodajnaCena`, `image`, `status`, `trending`, `kolicina`, `created_at`) VALUES
(37, 31, 'SKIJE ELAN PORSCHE DESIGN ACE (DB1022)', 'SKIJE ELAN PORSCHE DESIGN ELAN ACE', 'Elan - Always Good Times  Good Times - po Elan-u je sve u tome, a najbolje vreme je ono koje se provodi sa prijateljima i porodicom u planinama. Bilo da se radi o porodičnom putovanju tokom vikenda na vašu omiljenu lokalnu destinaciju ili avanturu sa najboljim prijateljima, uvek je dobro kada se okružite onima sa kojima ste najbliži. Dobro provedeno vreme na padini povezuje ljude i stvara nezaboravne trenutke. To je suština svega. \"Good Times\"  Porsche Design  State-Of-The-Art Innovation Meets Premium Design  1963. godine profesor Ferdinand Alexander Porsche stvorio je jedan od najznačajnijih dizajnerskih predmeta u savremenoj istoriji: Porsche 911. Sledeći njegovu viziju da principe i mit o Porscheu odnesu izvan automobilskog sveta, stvorio je ekskluzivnu marku životnog stila Porsche Design 1972. godine. Njegova filozofija i jezik dizajna i danas se mogu videti u svim Porsche Design proizvodima. Deljenje strasti za inovacijama, gde dizajn prati funkciju, bio je pokretački trenutak da Elan i Porsche Design krenu zajedno na novi put saradnje, gde sofisticirane dizajnerske ideje i inovativna rešenja stvaraju jedan od najistaknutijih proizvoda u skijaškoj industriji, koji premašuje svakodnevni odnos dizajn-proizvod', 121400, 76990, '1677267784.jpg', 0, 1, 8, '2023-02-24 19:43:04'),
(38, 31, 'SKIJE ELAN VARIO', 'SKIJE ELAN VARIO', 'Elan - Always Good Times  Good Times - po Elan-u je sve u tome, a najbolje vreme je ono koje se provodi sa prijateljima i porodicom u planinama. Bilo da se radi o porodičnom putovanju tokom vikenda na vašu omiljenu lokalnu destinaciju ili avanturu sa najboljim prijateljima, uvek je dobro kada se okružite onima sa kojima ste najbliži. Dobro provedeno vreme na padini povezuje ljude i stvara nezaboravne trenutke. To je suština svega. ', 18990, 14990, '1677355540.jpg', 0, 0, 24, '2023-02-24 19:44:43'),
(40, 31, 'SKIJE ELAN WINGMAN 82 TI PS ELX11 (DB3832)', 'SKIJE ELAN WINGMAN ', 'Elan - Always Good Times  Good Times - po Elan-u je sve u tome, a najbolje vreme je ono koje se provodi sa prijateljima i porodicom u planinama. Bilo da se radi o porodičnom putovanju tokom vikenda na vašu omiljenu lokalnu destinaciju ili avanturu sa najboljim prijateljima, uvek je dobro kada se okružite onima sa kojima ste najbliži. Dobro provedeno vreme na padini povezuje ljude i stvara nezaboravne trenutke. To je suština svega. \"Good Times\"  ALL MOUNTAIN WINGMAN  Osetite slobodu otvorenog terena i pripremite se za istraživanje, Wingman ti čuva leđa. Ne radi se samo o pronalaženju idealne situacije, već o pronalaženju zadovoljstva. Wingman serija spaja Elanove nagrađivane tehnologije sa all-mountain skijanjem. Napravljen da poboljša energiju skijaša u svim uslovima i terenima, Wingman ti uvek čuva leđa. Kao najbliži most Ripstick kolekciji, Wingman je izgrađen sa sledećom evolucijom Elanovog modernog asimetričnog ski dizajna, Amphibio sa Truline tehnologi', 57990, 49300, '1677356055.jpg', 0, 1, 68, '2023-02-25 20:14:15'),
(42, 32, 'SOBNI BICIKL/ERGO KETTLER TOUR 600 R', 'SOBNI BICIKL/ERGO ', 'Biciklizam je jedna od najefikasnijih vežbi za poboljšanje kvaliteta života, za ljude svih uzrasta. Odličan aerobni uređaj, koji pomaže, da se izgradi snaga, poveća izdržljivost, poboljša kondicija, smanji stres i izgubi težina.  Novu generaciju KETTLER sobnih bicikli definiše inovativna tehnologija i mladalački dizajn.  TOUR 600 R  8 trening programa uključujući urednik za individualne vežbe Maksimalna snaga od 320 vati za stimulativni trening Veoma udoban i tih indukcioni sistem Udobno i podesivo sedište sa fiksnim naslonom Sa ležećim ergometrom TOUR 600 R ne pravite kompromise: pogodan je i za terapeutsku obuku i za intenzivnu obuku. Poboljšavate svoju formu, svoje zdravlje i kardiovaskularni sistem uz maksimalnu udobnost. Sa osam programa, uključujući trening sa kontrolom pulsa, možete da izazovete sebe na tačno onom nivou koji vam odgovara, ili možete kreirati sopstveni individualni program u uređivaču programa. ', 169490, 144490, '1677427795.jpg', 0, 1, 11, '2023-02-26 16:09:55'),
(43, 32, 'SOBNI BICIKL KETTLER RIDE 300 R', 'SOBNI BICIKL KETTLER RIDE 300 R', 'Biciklizam je jedna od najefikasnijih vežbi za poboljšanje kvaliteta života, za ljude svih uzrasta. Odličan aerobni uređaj, koji pomaže, da se izgradi snaga, poveća izdržljivost, poboljša kondicija, smanji stres i izgubi težina.  Novu generaciju KETTLER sobnih bicikli definiše inovativna tehnologija i mladalački dizajn.  RIDE 300 R  Visokokvalitetan i jednostavan za korišćenje računar za obuku Zdravlje na prvi pogled zahvaljujući prikazu trenutne zone otkucaja srca Više programa obuke uključujući program orijentisan na rad srca Korisnički profili koji omogućavaju pet osoba da sačuvaju svoje rezultate Podesivo sedište i niski ulaz Ležeći bicikl RIDE 300 R nudi vam trening koji je individualan koliko i vaši zahtevi za zdravim vežbanjem. Sa mnogim korisnim funkcijama, ovaj ležeći bicikl za vežbanje vas podržava u svakoj sekundi vašeg vežbanja.', 143990, 113990, '1677427859.jpg', 0, 0, 9, '2023-02-26 16:10:59'),
(44, 32, 'SOBNI BICIKL BODY SCULPTURE KC-1422H', 'SOBNI BICIKL BODY SCULPTURE ', 'Zabavite se i odradite zdravi trening na sobnom biciklu.  Sobni bicikl obezbeđuje sve pogodnosti, da uradite aerobni trening u udobnosti svog doma, da jačate mišiće nogu, smanjite masne naslage na telu i poboljšajte svoju kondiciju. Da se osećate bolje i zdravije....  Sobni bicikl BODY SCULPTURE KC-1422 idealna sprava za kućni trening.  Displej sa promenjivim prikazom svih relevantnih podataka. Ručno podešavanje kočionog sistema. Sedište podesivo po visini obezbeđuje idealnu poziciju za trening.  Funkcije displeja:  - Vreme - Brzina - Distanca - Potrošnja kalorija - Scan ( brzi pregled parametara ) Specifikacija:  - Ručno podešavanje opterećenja - Široke pedale s trakom - Sedište podesivo po visini - Dimenzije sprave: 75 x 50.5 x 102 cm - Maksimalna masa korisnika: 100 kg Sprava je projektovana za kućnu upotrebu i nije predviđena za javno ili komercijalno korišćenje. Pre početka upotrebe sprave, obavezno konsultujte lekara.', 13900, 9900, '1677428295.jpg', 0, 1, 40, '2023-02-26 16:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(20) NOT NULL,
  `grad` varchar(255) NOT NULL,
  `adresa` mediumtext NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `radnoVreme` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `grad`, `adresa`, `telefon`, `radnoVreme`) VALUES
(1, 'Beograd', 'Nemanjina 1', '011/256-8956', '9 - 21'),
(2, 'Novi Sad', 'Pozorišni trg 1', '021/355-9878', '9 - 21'),
(3, 'Kruševac', 'Trg mira 1', '037/ 568-5698', '9 - 21'),
(4, 'Šabac', 'Macvanska 1', '015/ 356-458', '9 - 21'),
(5, 'Krupanj', 'Radjevska 1', '015/855-968', '9 - 21'),
(6, 'Subotica', 'Somborska 1', '056/69-987', '9 - 21'),
(10, 'Zlatibor ', 'Miladina Pećinara 1', '0642352444', '9 - 21'),
(11, 'Novi Pazar ', 'Rifata Burdževica 1', '0645688855', '9 - 21'),
(12, 'Niš', 'Sinđelićev trg 1', '0647788999', '9 - 21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(2) DEFAULT 0 COMMENT '0-user 1-admin 2-extra admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `email`, `password`, `role_as`, `created_at`) VALUES
(1, 'Ana', 'ana@gmail.com', '123', 0, '2023-02-07 14:04:16'),
(2, 'Admin', 'admin@admin.com', 'admin', 1, '2023-02-08 13:58:38'),
(3, 'Jovan', 'jovan@gmail.com', '123', 0, '2023-02-21 08:51:16'),
(5, 'Jelena', 'jelena@gmail.com', '$2y$12$clIO4YTP1m8zuDPIdhu/3O3KA3wDyWu/qmR5xzmt8jTBvKCq66Q2W', 0, '2023-02-23 06:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(20) NOT NULL,
  `prodId` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `prodId`, `userId`, `created_at`) VALUES
(7, 38, 3, '2023-02-25 13:01:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoyId` (`categoryId`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoyId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
