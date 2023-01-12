-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jan 2023 um 10:14
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `schoolshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'default_profile_picture.png',
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `house_nr` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_nr` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orders` int(20) NOT NULL,
  `role` int(11) NOT NULL,
  `logged_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `accounts`
--

INSERT INTO `accounts` (`id`, `profile_picture`, `name`, `lastname`, `gender`, `country`, `city`, `zip_code`, `address`, `house_nr`, `username`, `email`, `phone_nr`, `password`, `orders`, `role`, `logged_in`) VALUES
(6, 'default_profile_picture.png', 'Admin', 'Admin', 'Male', 'Germany', 'Berlin', '361', 'Berlin 361', 0, 'Admin', 'admin@root.de', '', '$2y$10$Y06JfYP/4N5YPYWenriUL.Im2LqIslHcjliQgJ3/yS.au0W9AdOi2', 0, 0, 1),
(7, 'default_profile_picture.png', 'Support', 'Support', 'Female', 'United States of America', 'New York City', '54526', 'NYC Street 5', 0, 'Support', 'support@root.de', '', '$2y$10$Y06JfYP/4N5YPYWenriUL.Im2LqIslHcjliQgJ3/yS.au0W9AdOi2', 0, 1, 0),
(8, 'default_profile_picture.png', 'Customer', 'Customer', 'Other', 'Japan', 'Tokyo', '113-0001', 'Hakusan', 0, 'Customer', 'customer@root.de', '', '$2y$10$Y06JfYP/4N5YPYWenriUL.Im2LqIslHcjliQgJ3/yS.au0W9AdOi2', 0, 2, 0),
(10, 'profile-picture-10.png', 'Gustavo', 'Fring', 'Male', 'Germany', 'Jefferson St', '87110', 'Jefferson St', 1213, 'Gustavo', 'eat@lospolloshermanos.now', '(505) 146-0195', '$2y$10$B2eKv.DdEndkVIYLzm.RtOLOmOFDaQMwGjQsVZoiQ4dL9wCiCk7bu', 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `c_id` int(2) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `amount_sold` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `amount_sold`) VALUES
(1, 'fruit', 9),
(2, 'vegetable', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `discount`
--

CREATE TABLE `discount` (
  `d_id` int(1) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `discount`
--

INSERT INTO `discount` (`d_id`, `value`) VALUES
(1, 10),
(2, 20),
(3, 25),
(4, 50),
(5, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `prod_id`, `date`) VALUES
(1, 10, 70, '2023-01-11 09:38:04'),
(2, 10, 44, '2023-01-11 09:38:04'),
(3, 10, 60, '2023-01-11 09:38:04'),
(4, 10, 48, '2023-01-11 11:47:06'),
(5, 10, 42, '2023-01-12 08:17:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_category` varchar(255) DEFAULT NULL,
  `prod_description` text DEFAULT NULL,
  `prod_price` decimal(10,2) DEFAULT NULL,
  `prod_vendor` varchar(255) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT NULL,
  `prod_picture` varchar(255) DEFAULT 'default.png',
  `d_id` int(1) DEFAULT 5,
  `c_id` int(2) NOT NULL,
  `prod_sold` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_category`, `prod_description`, `prod_price`, `prod_vendor`, `prod_stock`, `prod_picture`, `d_id`, `c_id`, `prod_sold`) VALUES
(41, 'Indian Pineapple - extra sweet', '1', 'The pineapple (Ananas comosus) is a tropical plant with an edible fruit; it is the most economically significant plant in the family Bromeliaceae. The pineapple is indigenous to South America, where it has been cultivated for many centuries. The introduction of the pineapple to Europe in the 17th century made it a significant cultural icon of luxury. Since the 1820s, pineapple has been commercially grown in greenhouses and many tropical plantations.', '8.99', 'REWE Markt GmbH', 86, 'pineapples.jpg', 5, 1, 0),
(42, 'Red Apples - 1kg', '1', 'An apple is an edible fruit produced by an apple tree (Malus domestica). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today. Apples have been grown for thousands of years in Asia and Europe and were brought to North America by European colonists. Apples have religious and mythological significance in many cultures, including Norse, Greek, and European Christian tradition.', '15.99', 'REWE Markt GmbH', 286, 'red_apples.png', 1, 1, 1),
(43, 'American Apricots', '1', 'The apricot is a small tree, 8–12 m (26–39 ft) tall, with a trunk up to 40 cm (16 in) in diameter and a dense, spreading canopy. The leaves are ovate, 5–9 cm (2.0–3.5 in) long, and 4–8 cm (1.6–3.1 in) wide, with a rounded base, a pointed tip, and a finely serrated margin. The flowers are 2–4.5 cm (0.8–1.8 in) in diameter, with five white to pinkish petals; they are produced singly or in pairs in early spring before the leaves. The fruit is a drupe (stonefruit) similar to a small peach, 1.5–2.5 cm (0.6–1.0 in) diameter (larger in some modern cultivars), from yellow to orange, often tinged red on the side most exposed to the sun; its surface can be smooth (botanically described as: glabrous) or velvety with very short hairs (botanically: pubescent). The flesh is usually succulent, but dry in some species such as P. sibirica. Its taste can range from sweet to tart. The single seed or \"kernel\" is enclosed in a hard shell, often called a \"stone\", with a grainy, smooth texture except for three ridges running down one side.', '9.99', 'ALDI Einkauf SE & Co. oHG', 145, 'Apricots.jpg', 3, 1, 0),
(44, 'Latin American Sweet Bananas', '1', 'A banana is an elongated, edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas. The fruit is variable in size, color, and firmness, but is usually elongated and curved, with soft flesh rich in starch covered with a rind, which may be green, yellow, red, purple, or brown when ripe. The fruits grow upward in clusters near the top of the plant. Almost all modern edible seedless (parthenocarp) bananas come from two wild species – Musa acuminata and Musa balbisiana. The scientific names of most cultivated bananas are Musa acuminata, Musa balbisiana, and Musa × paradisiaca for the hybrid Musa acuminata × M. balbisiana, depending on their genomic constitution. The old scientific name for this hybrid, Musa sapientum, is no longer used.', '13.99', 'ALDI Einkauf SE & Co. oHG', 124, 'bananas.jpg', 5, 1, 2),
(45, 'Spanisch Pears - 0.75kg', '1', 'Pears are fruits produced and consumed around the world, growing on a tree and harvested in the Northern Hemisphere in late summer into October. The pear tree and shrub are a species of genus Pyrus, in the family Rosaceae, bearing the pomaceous fruit of the same name. Several species of pears are valued for their edible fruit and juices, while others are cultivated as trees.', '11.99', 'ALDI Einkauf SE & Co. oHG', 96, 'spanish_pears.jpg', 3, 1, 0),
(46, 'Sweet Blackberries', '1', 'The blackberry is an edible fruit produced by many species in the genus Rubus in the family Rosaceae, hybrids among these species within the subgenus Rubus, and hybrids between the subgenera Rubus and Idaeobatus. The taxonomy of blackberries has historically been confused because of hybridization and apomixis, so that species have often been grouped together and called species aggregates. For example, the entire subgenus Rubus has been called the Rubus fruticosus aggregate, although the species R. fruticosus is considered a synonym of R. plicatus.', '5.99', 'REWE Markt GmbH', 234, 'sweet-blackberries.png', 5, 1, 0),
(47, 'Canadian Premium Cranberries', '1', 'Cranberries are a group of evergreen dwarf shrubs or trailing vines in the subgenus Oxycoccus of the genus Vaccinium. In Britain, cranberry may refer to the native species Vaccinium oxycoccos, while in North America, cranberry may refer to Vaccinium macrocarpon. Vaccinium oxycoccos is cultivated in central and northern Europe, while Vaccinium macrocarpon is cultivated throughout the northern United States, Canada and Chile. In some methods of classification, Oxycoccus is regarded as a genus in its own right. They can be found in acidic bogs throughout the cooler regions of the Northern Hemisphere.', '12.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 112, 'canneberges-canada.jpeg', 5, 1, 0),
(48, 'Egyptian Dates - Bittersweet', '1', 'Phoenix dactylifera, commonly known as date or date palm, is a flowering plant species in the palm family, Arecaceae, cultivated for its edible sweet fruit called dates. The species is widely cultivated across northern Africa, the Middle East, and South Asia, and is naturalized in many tropical and subtropical regions worldwide. P. dactylifera is the type species of genus Phoenix, which contains 12–19 species of wild date palms.', '8.99', 'ALDI Einkauf SE & Co. oHG', 323, 'Medjool-Dates.jpg', 5, 1, 1),
(49, 'Chinese Quality Strawberries - Extra Sweet', '1', 'The garden strawberry (or simply strawberry; Fragaria × ananassa) is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness. It is consumed in large quantities, either fresh or in such prepared foods as jam, juice, pies, ice cream, milkshakes, and chocolates. Artificial strawberry flavorings and aromas are also widely used in products such as candy, soap, lip gloss, perfume, and many others.', '14.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 56, 'chinese-strawberries.jpg', 4, 1, 0),
(50, 'Turkish Figs', '1', 'The fig is the edible fruit of Ficus carica, a species of small tree in the flowering plant family Moraceae. Native to the Mediterranean and western Asia, it has been cultivated since ancient times and is now widely grown throughout the world, both for its fruit and as an ornamental plant. Ficus carica is the type species of the genus Ficus, containing over 800 tropical and subtropical plant species.', '9.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 236, 'turkish_figs.jpg', 5, 1, 0),
(51, 'Indonesian Coconut - Premium Quality', '1', 'The coconut tree (Cocos nucifera) is a member of the palm tree family (Arecaceae) and the only living species of the genus Cocos. The term \"coconut\" (or the archaic \"cocoanut\") can refer to the whole coconut palm, the seed, or the fruit, which botanically is a drupe, not a nut. The name comes from the old Portuguese word coco, meaning \"head\" or \"skull\", after the three indentations on the coconut shell that resemble facial features. They are ubiquitous in coastal tropical regions and are a cultural icon of the tropics.', '14.99', 'REWE Markt GmbH', 89, 'coconut.jpg', 5, 1, 0),
(52, 'Indian Pomegranate', '1', 'The pomegranate (Punica granatum) is a fruit-bearing deciduous shrub in the family Lythraceae, subfamily Punicoideae, that grows between 5 and 10 m (16 and 33 ft) tall. Young pomegranate in Side, Turkey. The pomegranate was originally described throughout the Mediterranean region. It was introduced into Spanish America in the late 16th century and into California by Spanish settlers in 1769. The fruit is typically in season in the Southern Hemisphere from March to May, and in the Northern Hemisphere from September to February. As intact sarcotestas or juice, pomegranates are used in baking, cooking, juice blends, meal garnishes, smoothies, and alcoholic beverages, such as cocktails and wine.', '12.99', 'ALDI Einkauf SE & Co. oHG', 135, 'indian_pomegranate.jpg', 5, 1, 0),
(53, 'German Premium Raspberry', '1', 'The raspberry is the edible fruit of a multitude of plant species in the genus Rubus of the rose family, most of which are in the subgenus Idaeobatus. The name also applies to these plants themselves. Raspberries are perennial with woody stems. World production of raspberries in 2020 was 895,771 tonnes, led by Russia with 20% of the total.', '12.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 87, 'raspberry.png', 4, 1, 0),
(54, 'American Kiwi - 1kg', '1', 'Kiwifruit (often shortened to kiwi in North American, British and continental European English) or Chinese gooseberry is the edible berry of several species of woody vines in the genus Actinidia.[1][2] The most common cultivar group of kiwifruit is oval, about the size of a large hens egg: 5–8 centimetres (2–3 inches) in length and 4.5–5.5 cm in diameter. It has a thin, fuzzy, fibrous, tart but edible light brown skin and light green or golden flesh with rows of tiny, black, edible seeds. The fruit has a soft texture with a sweet and unique flavour.', '9.99', 'ALDI Einkauf SE & Co. oHG', 134, 'kiwi.png', 5, 1, 0),
(55, 'Mexican Mango - 0.75kg', '1', 'A mango is an edible stone fruit produced by the tropical tree Mangifera indica. It is believed to have originated between northwestern Myanmar, Bangladesh, and northeastern India. M. indica has been cultivated in South and Southeast Asia since ancient times resulting in two types of modern mango cultivars: the \"Indian type\" and the \"Southeast Asian type\". Other species in the genus Mangifera also produce edible fruits that are also called \"mangoes\", the majority of which are found in the Malesian ecoregion.', '13.99', 'REWE Markt GmbH', 78, 'mango.jpg', 2, 1, 0),
(56, 'Turkish Cucumbers - 1kg', '2', 'Cucumber (Cucumis sativus) is a widely-cultivated creeping vine plant in the Cucurbitaceae family that bears usually cylindrical fruits, which are used as culinary vegetables. Considered an annual plant, there are three main varieties of cucumber—slicing, pickling, and seedless—within which several cultivars have been created. The cucumber originates from South Asia, but now grows on most continents, as many different types of cucumber are traded on the global market. In North America, the term wild cucumber refers to plants in the genera Echinocystis and Marah, though the two are not closely related.', '15.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 139, 'turkish_cucumbers.jpg', 5, 2, 0),
(57, 'German Premium Quality Potatoes', '2', 'The potato is a starchy food, a tuber of the plant Solanum tuberosum and is a root vegetable native to the Americas. The plant is a perennial in the nightshade family Solanaceae. Wild potato species can be found from the southern United States to southern Chile. The potato was originally believed to have been domesticated by Native Americans independently in multiple locations, but later genetic studies traced a single origin, in the area of present-day southern Peru and extreme northwestern Bolivia. Potatoes were domesticated there approximately 7,000–10,000 years ago, from a species in the Solanum brevicaule complex. In the Andes region of South America, where the species is indigenous, some close relatives of the potato are cultivated.', '19.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 238, 'german_potatoes.jpg', 5, 2, 0),
(58, 'Chinese Cucumber', '2', 'The carrot (Daucus carota subsp. sativus) is a root vegetable, typically orange in color, though purple, black, red, white, and yellow cultivars exist, all of which are domesticated forms of the wild carrot, Daucus carota, native to Europe and Southwestern Asia. The plant probably originated in Persia and was originally cultivated for its leaves and seeds. The most commonly eaten part of the plant is the taproot, although the stems and leaves are also eaten. The domestic carrot has been selectively bred for its enlarged, more palatable, less woody-textured taproot.', '12.99', 'REWE Markt GmbH', 102, 'asianlongchinesecucumber.jpg', 5, 2, 0),
(59, 'Indian Eggplant - Bitter', '2', 'Eggplant (US, Canada), aubergine (UK, Ireland) or brinjal (Indian subcontinent, Singapore, Malaysia, South Africa) is a plant species in the nightshade family Solanaceae. Solanum melongena is grown worldwide for its edible fruit. Most commonly purple, the spongy, absorbent fruit is used in several cuisines. Typically used as a vegetable in cooking, it is a berry by botanical definition. As a member of the genus Solanum, it is related to the tomato, chili pepper, and potato, although those are of the New World while the eggplant is of the Old World. Like the tomato, its skin and seeds can be eaten, but, like the potato, it is usually eaten cooked. Eggplant is nutritionally low in macronutrient and micronutrient content, but the capability of the fruit to absorb oils and flavors into its flesh through cooking expands its use in the culinary arts.', '14.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 104, 'indian_eggplant.png', 1, 2, 0),
(60, 'Premium Spanish Chili peppers', '2', 'Chili peppers, from Nahuatl chīlli, are varieties of the berry-fruit of plants from the genus Capsicum, which are members of the nightshade family Solanaceae, cultivated for their pungency. Chili peppers are widely used in many cuisines as a spice to add \"heat\" to dishes. Capsaicin and related compounds known as capsaicinoids are the substances giving chili peppers their intensity when ingested or applied topically. While chili peppers are (to varying degrees) pungent or \"spicy\", there are other varieties of capsicum such as bell peppers (UK: peppers) which generally provide additional sweetness and flavor to a meal rather than “heat.”', '17.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 53, 'chili_peppers.jpg', 5, 2, 1),
(61, 'Purple Onions', '2', 'An onion (Allium cepa L., from Latin cepa meaning \"onion\"), also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. The shallot is a botanical variety of the onion which was classified as a separate species until 2010.: 21  Its close relatives include garlic, scallion, leek, and chive.', '10.99', 'ALDI Einkauf SE & Co. oHG', 144, 'purple_onions.jpg', 5, 2, 0),
(62, 'Egyptian Garlic - Intensive', '2', 'Garlic (Allium sativum) is a species of bulbous flowering plant in the genus Allium. Its close relatives include the onion, shallot, leek, chive, Welsh onion and Chinese onion. It is native to South Asia, Central Asia and northeastern Iran and has long been used as a seasoning worldwide, with a history of several thousand years of human consumption and use. It was known to ancient Egyptians and has been used as both a food flavoring and a traditional medicine. China produces 76% of the worlds supply of garlic.', '14.99', 'ALDI Einkauf SE & Co. oHG', 146, 'egyptian_garlic.png', 5, 2, 0),
(63, 'German Radish', '2', 'The radish (Raphanus raphanistrum subsp. sativus) is an edible root vegetable of the family Brassicaceae that was domesticated in Asia prior to Roman times. Radishes are grown and consumed throughout the world, being mostly eaten raw as a crunchy salad vegetable with a pungent, slightly spicy flavor, varying in intensity depending on its growing environment. There are numerous varieties, varying in size, flavor, color, and length of time they take to mature. Radishes owe their sharp flavor to the various chemical compounds produced by the plants, including glucosinolate, myrosinase, and isothiocyanate.', '11.99', 'ALDI Einkauf SE & Co. oHG', 89, 'german_radish.png', 1, 2, 0),
(64, 'Kenyan Peas - Premium Quality', '2', 'The pea is most commonly the small spherical seed or the seed-pod of the flowering plant species Pisum sativum. Each pod contains several peas, which can be green or yellow. Botanically, pea pods are fruit, since they contain seeds and develop from the ovary of a (pea) flower. The name is also used to describe other edible seeds from the Fabaceae such as the pigeon pea (Cajanus cajan), the cowpea (Vigna unguiculata), and the seeds from several species of Lathyrus.', '9.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 245, 'Kenyan_Peas.jpg', 5, 2, 0),
(65, 'Nigerian Ginger', '2', 'Ginger (Zingiber officinale) is a flowering plant whose rhizome, ginger root or ginger, is widely used as a spice and a folk medicine. It is a herbaceous perennial which grows annual pseudostems (false stems made of the rolled bases of leaves) about one meter tall bearing narrow leaf blades. The inflorescences bear flowers having pale yellow petals with purple edges, and arise directly from the rhizome on separate shoots.', '13.99', 'REWE Markt GmbH', 78, 'ginger.jpg', 5, 2, 0),
(66, 'Chinese Rice - 2kg', '2', 'Rice is the seed of the grass species Oryza sativa (Asian rice) or less commonly Oryza glaberrima (African rice). The name wild rice is usually used for species of the genera Zizania and Porteresia, both wild and domesticated, although the term may also be used for primitive or uncultivated varieties of Oryza.', '25.99', 'ALDI Einkauf SE & Co. oHG', 289, 'chinese_rice.png', 5, 2, 0),
(67, 'American Broccoli - 0.5kg', '2', 'Broccoli (Brassica oleracea var. italica) is an edible green plant in the cabbage family (family Brassicaceae, genus Brassica) whose large flowering head, stalk and small associated leaves are eaten as a vegetable. Broccoli is classified in the Italica cultivar group of the species Brassica oleracea. Broccoli has large flower heads, usually dark green, arranged in a tree-like structure branching out from a thick stalk which is usually light green. The mass of flower heads is surrounded by leaves. Broccoli resembles cauliflower, which is a different but closely related cultivar group of the same Brassica species.', '10.99', 'EDEKA ZENTRALE Stiftung & Co. KG', 187, 'broccoli-1238250_1920.jpg', 5, 2, 0),
(68, 'Ukrainian Pumpkins - Premium Quality', '2', 'A pumpkin is a vernacular term for mature winter squash of species and varieties in the genus Cucurbita that has culinary and cultural significance but no agreed upon botanical or scientific meaning. The term pumpkin is sometimes used interchangeably with \"squash\" or \"winter squash\", and is commonly used for cultivars of Cucurbita argyrosperma, Cucurbita ficifolia, Cucurbita maxima, Cucurbita moschata, and Cucurbita pepo.', '16.99', 'REWE Markt GmbH', 67, 'pumpkins.png', 5, 2, 0),
(69, 'Iranian Melon', '2', 'A melon is any of various plants of the family Cucurbitaceae with sweet, edible, and fleshy fruit. The word \"melon\" can refer to either the plant or specifically to the fruit. Botanically, a melon is a kind of berry, specifically a \"pepo\". The word melon derives from Latin melopepo, which is the latinization of the Greek μηλοπέπων (mēlopepōn), meaning \"melon\", itself a compound of μῆλον (mēlon), \"apple, treefruit (of any kind)\" and πέπων (pepōn), amongst others \"a kind of gourd or melon\". Many different cultivars have been produced, particularly of cantaloupes.', '13.99', 'ALDI Einkauf SE & Co. oHG', 235, 'iranian_melon.jpg', 5, 2, 0),
(70, 'Chinese Cauliflower - 1kg', '2', 'Cauliflower is one of several vegetables in the species Brassica oleracea in the genus Brassica, which is in the Brassicaceae (or mustard) family. It is an annual plant that reproduces by seed. Typically, only the head is eaten – the edible white flesh is sometimes called \"curd\" (with a similar appearance to cheese curd). The cauliflower head is composed of a white inflorescence meristem. Cauliflower heads resemble those in broccoli, which differs in having flower buds as the edible portion. Brassica oleracea also includes broccoli, Brussels sprouts, cabbage, collard greens, and kale, collectively called \"cole\" crops, though they are of different cultivar groups.', '16.99', 'ALDI Einkauf SE & Co. oHG', 165, 'chinese_cauliflower.png', 2, 2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_pictures`
--

CREATE TABLE `product_pictures` (
  `picture_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `product_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `product_pictures`
--

INSERT INTO `product_pictures` (`picture_id`, `prod_id`, `product_picture`) VALUES
(1, 66, 'chinese_rice.png'),
(2, 66, 'chinese_rice2.png'),
(3, 66, 'chinese_rice3.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `assigned_to` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `creator` varchar(30) NOT NULL,
  `created_on` date NOT NULL,
  `done` tinyint(1) NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`id`, `type`, `title`, `priority`, `assigned_to`, `description`, `due_date`, `creator`, `created_on`, `done`, `last_edited`) VALUES
(27, 'Test', 'Ticket', 'LOW', 'Admin Admin', 'Test Ticket, ignore!', '2022-12-31', 'Admin Admin', '2022-12-31', 0, '2022-12-31 16:11:09');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indizes für die Tabelle `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`d_id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indizes für die Tabelle `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `discount`
--
ALTER TABLE `discount`
  MODIFY `d_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `product_pictures`
--
ALTER TABLE `product_pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
