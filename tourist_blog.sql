-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 26 2020 г., 00:28
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tourist_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `continents`
--

CREATE TABLE `continents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `continents`
--

INSERT INTO `continents` (`id`, `name`) VALUES
(1, 'Eurasia'),
(2, 'Africa'),
(3, 'Americas'),
(4, 'Oceania');

-- --------------------------------------------------------

--
-- Структура таблицы `continents_countries`
--

CREATE TABLE `continents_countries` (
  `continent_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `continents_countries`
--

INSERT INTO `continents_countries` (`continent_id`, `country_id`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`) VALUES
(1, 'Afghanistan', 'afghanistan'),
(2, 'Aland Islands', 'aland-islands'),
(3, 'Albania', 'albania'),
(4, 'Algeria', 'algeria'),
(5, 'American Samoa', 'american-samoa'),
(6, 'Andorra', 'andorra'),
(7, 'Angola', 'angola'),
(8, 'Anguilla', 'anguilla'),
(9, 'Antigua and Barbuda', 'antigua-and-barbuda'),
(10, 'Argentina', 'argentina'),
(11, 'Armenia', 'armenia'),
(12, 'Aruba', 'aruba'),
(13, 'Australia', 'australia'),
(14, 'Austria', 'austria'),
(15, 'Azerbaijan', 'azerbaijan'),
(16, 'Bahamas', 'bahamas'),
(17, 'Bahrain', 'bahrain'),
(18, 'Bangladesh', 'bangladesh'),
(19, 'Barbados', 'barbados'),
(20, 'Belarus', 'belarus'),
(21, 'Belgium', 'belgium'),
(22, 'Belize', 'belize'),
(23, 'Benin', 'benin'),
(24, 'Bermuda', 'bermuda'),
(25, 'Bhutan', 'bhutan'),
(26, 'Bolivia', 'bolivia'),
(27, 'Bosnia and Herzegovina', 'bosnia-and-herzegovina'),
(28, 'Botswana', 'botswana'),
(29, 'Brazil', 'brazil'),
(30, 'British Virgin Islands', 'british-virgin-islands'),
(31, 'Brunei Darussalam', 'brunei-darussalam'),
(32, 'Bulgaria', 'bulgaria'),
(33, 'Burkina Faso', 'burkina-faso'),
(34, 'Burundi', 'burundi'),
(35, 'Cambodia', 'cambodia'),
(36, 'Cameroon', 'cameroon'),
(37, 'Canada', 'canada'),
(38, 'Cape Verde', 'cape-verde'),
(39, 'Cayman Islands', 'cayman-islands'),
(40, 'Central African Republic', 'central-african-republic'),
(41, 'Chad', 'chad'),
(42, 'Chile', 'chile'),
(43, 'China', 'china'),
(44, 'Colombia', 'colombia'),
(45, 'Comoros', 'comoros'),
(46, 'Congo', 'congo'),
(47, 'Cook Islands', 'cook-islands'),
(48, 'Costa Rica', 'costa-rica'),
(49, 'Cote d\'Ivoire', 'cote-divoire'),
(50, 'Croatia', 'croatia'),
(51, 'Cuba', 'cuba'),
(52, 'Cyprus', 'cyprus'),
(53, 'Czech Republic', 'czech-republic'),
(54, 'Democratic Republic of the Congo', 'democratic-republic-of-congo'),
(55, 'Denmark', 'denmark'),
(56, 'Djibouti', 'djibouti'),
(57, 'Dominica', 'dominica'),
(58, 'Dominican Republic', 'dominican-republic'),
(59, 'Ecuador', 'ecuador'),
(60, 'Egypt', 'egypt'),
(61, 'El Salvador', 'el-salvador'),
(62, 'Equatorial Guinea', 'equatorial-guinea'),
(63, 'Eritrea', 'eritrea'),
(64, 'Estonia', 'estonia'),
(65, 'Ethiopia', 'ethiopia'),
(66, 'Faeroe Islands', 'faeroe-islands'),
(67, 'Falkland Islands', 'falkland-islands'),
(68, 'Fiji', 'fiji'),
(69, 'Finland', 'finland'),
(70, 'France', 'france'),
(71, 'French Guiana', 'french-guiana'),
(72, 'French Polynesia', 'french-polynesia'),
(73, 'Gabon', 'gabon'),
(74, 'Gambia', 'gambia'),
(75, 'Georgia', 'georgia'),
(76, 'Germany', 'germany'),
(77, 'Ghana', 'ghana'),
(78, 'Gibraltar', 'gibraltar'),
(79, 'Greece', 'greece'),
(80, 'Greenland', 'greenland'),
(81, 'Grenada', 'grenada'),
(82, 'Guadeloupe', 'guadeloupe'),
(83, 'Guam', 'guam'),
(84, 'Guatemala', 'guatemala'),
(85, 'Guernsey', 'guernsey'),
(86, 'Guinea', 'guinea'),
(87, 'Guinea-Bissau', 'guinea-bissau'),
(88, 'Guyana', 'guyana'),
(89, 'Haiti', 'haiti'),
(90, 'Holy See', 'holy-see'),
(91, 'Honduras', 'honduras'),
(92, 'Hong Kong', 'hong-kong'),
(93, 'Hungary', 'hungary'),
(94, 'Iceland', 'iceland'),
(95, 'India', 'india'),
(96, 'Indonesia', 'indonesia'),
(97, 'Iran', 'iran'),
(98, 'Iraq', 'iraq'),
(99, 'Ireland', 'ireland'),
(100, 'Isle of Man', 'isle-of-man'),
(101, 'Israel', 'israel'),
(102, 'Italy', 'italy'),
(103, 'Jamaica', 'jamaica'),
(104, 'Japan', 'japan'),
(105, 'Jersey', 'jersey'),
(106, 'Jordan', 'jordan'),
(107, 'Kazakhstan', 'kazakhstan'),
(108, 'Kenya', 'kenya'),
(109, 'Kiribati', 'kiribati'),
(110, 'Kuwait', 'kuwait'),
(111, 'Kyrgyzstan', 'kyrgyzstan'),
(112, 'Laos', 'laos'),
(113, 'Latvia', 'latvia'),
(114, 'Lebanon', 'lebanon'),
(115, 'Lesotho', 'lesotho'),
(116, 'Liberia', 'liberia'),
(117, 'Libyan Arab Jamahiriya', 'libyan-arab-jamahiriya'),
(118, 'Liechtenstein', 'liechtenstein'),
(119, 'Lithuania', 'lithuania'),
(120, 'Luxembourg', 'luxembourg'),
(121, 'Macao', 'macao'),
(122, 'Macedonia', 'macedonia'),
(123, 'Madagascar', 'madagascar'),
(124, 'Malawi', 'malawi'),
(125, 'Malaysia', 'malaysia'),
(126, 'Maldives', 'maldives'),
(127, 'Mali', 'mali'),
(128, 'Malta', 'malta'),
(129, 'Marshall Islands', 'marshall-islands'),
(130, 'Martinique', 'martinique'),
(131, 'Mauritania', 'mauritania'),
(132, 'Mauritius', 'mauritius'),
(133, 'Mayotte', 'mayotte'),
(134, 'Mexico', 'mexico'),
(135, 'Micronesia', 'micronesia'),
(136, 'Moldova', 'moldova'),
(137, 'Monaco', 'monaco'),
(138, 'Mongolia', 'mongolia'),
(139, 'Montenegro', 'montenegro'),
(140, 'Montserrat', 'montserrat'),
(141, 'Morocco', 'morocco'),
(142, 'Mozambique', 'mozambique'),
(143, 'Myanmar', 'myanmar'),
(144, 'Namibia', 'namibia'),
(145, 'Nauru', 'nauru'),
(146, 'Nepal', 'nepal'),
(147, 'Netherlands', 'netherlands'),
(148, 'Netherlands Antilles', 'netherlands-antilles'),
(149, 'New Caledonia', 'new-caledonia'),
(150, 'New Zealand', 'new-zealand'),
(151, 'Nicaragua', 'nicaragua'),
(152, 'Niger', 'niger'),
(153, 'Nigeria', 'nigeria'),
(154, 'Niue', 'niue'),
(155, 'Norfolk Island', 'norfolk-island'),
(156, 'North Korea', 'north-korea'),
(157, 'Northern Mariana Islands', 'northern-mariana-islands'),
(158, 'Norway', 'norway'),
(159, 'Oman', 'oman'),
(160, 'Pakistan', 'pakistan'),
(161, 'Palau', 'palau'),
(162, 'Palestine', 'palestine'),
(163, 'Panama', 'panama'),
(164, 'Papua New Guinea', 'papua-new-guinea'),
(165, 'Paraguay', 'paraguay'),
(166, 'Peru', 'peru'),
(167, 'Philippines', 'philippines'),
(168, 'Pitcairn', 'pitcairn'),
(169, 'Poland', 'poland'),
(170, 'Portugal', 'portugal'),
(171, 'Puerto Rico', 'puerto-rico'),
(172, 'Qatar', 'qatar'),
(173, 'Reunion', 'reunion'),
(174, 'Romania', 'romania'),
(175, 'Russian Federation', 'russian-federation'),
(176, 'Rwanda', 'rwanda'),
(177, 'Saint Helena', 'saint-helena'),
(178, 'Saint Kitts and Nevis', 'saint-kitts-and-nevis'),
(179, 'Saint Lucia', 'saint-lucia'),
(180, 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon'),
(181, 'Saint Vincent and the Grenadines', 'saint-vincent-and-grenadines'),
(182, 'Saint-Barthelemy', 'saint-barthelemy'),
(183, 'Saint-Martin', 'saint-martin'),
(184, 'Samoa', 'samoa'),
(185, 'San Marino', 'san-marino'),
(186, 'Sao Tome and Principe', 'sao-tome-and-principe'),
(187, 'Saudi Arabia', 'saudi-arabia'),
(188, 'Senegal', 'senegal'),
(189, 'Serbia', 'serbia'),
(190, 'Seychelles', 'seychelles'),
(191, 'Sierra Leone', 'sierra-leone'),
(192, 'Singapore', 'singapore'),
(193, 'Slovakia', 'slovakia'),
(194, 'Slovenia', 'slovenia'),
(195, 'Solomon Islands', 'solomon-islands'),
(196, 'Somalia', 'somalia'),
(197, 'South Africa', 'south-africa'),
(198, 'South Korea', 'south-korea'),
(199, 'South Sudan', 'south-sudan'),
(200, 'Spain', 'spain'),
(201, 'Sri Lanka', 'sri-lanka'),
(202, 'Sudan', 'sudan'),
(203, 'Suriname', 'suriname'),
(204, 'Svalbard and Jan Mayen Islands', 'svalbard-and-jan-mayen-islands'),
(205, 'Swaziland', 'swaziland'),
(206, 'Sweden', 'sweden'),
(207, 'Switzerland', 'switzerland'),
(208, 'Syrian Arab Republic', 'syrian-arab-republic'),
(209, 'Tajikistan', 'tajikistan'),
(210, 'Tanzania', 'tanzania'),
(211, 'Thailand', 'thailand'),
(212, 'Timor-Leste', 'timor-leste'),
(213, 'Togo', 'togo'),
(214, 'Tokelau', 'tokelau'),
(215, 'Tonga', 'tonga'),
(216, 'Trinidad and Tobago', 'trinidad-and-tobago'),
(217, 'Tunisia', 'tunisia'),
(218, 'Turkey', 'turkey'),
(219, 'Turkmenistan', 'turkmenistan'),
(220, 'Turks and Caicos Islands', 'turks-and-caicos-islands'),
(221, 'Tuvalu', 'tuvalu'),
(222, 'U.S. Virgin Islands', 'us-virgin-islands'),
(223, 'Uganda', 'uganda'),
(224, 'Ukraine', 'ukraine'),
(225, 'United Arab Emirates', 'united-arab-emirates'),
(226, 'United Kingdom', 'united-kingdom'),
(227, 'United States', 'united-states'),
(228, 'Uruguay', 'uruguay'),
(229, 'Uzbekistan', 'uzbekistan'),
(230, 'Vanuatu', 'vanuatu'),
(231, 'Venezuela', 'venezuela'),
(232, 'Viet Nam', 'viet-nam'),
(233, 'Wallis and Futuna Islands', 'wallis-and-futuna-islands'),
(234, 'Western Sahara', 'western-sahara'),
(235, 'Yemen', 'yemen'),
(236, 'Zambia', 'zambia'),
(237, 'Zimbabwe', 'zimbabwe');

-- --------------------------------------------------------

--
-- Структура таблицы `entries`
--

CREATE TABLE `entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `place` varchar(15) NOT NULL,
  `comments` varchar(50) NOT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `country_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `entries`
--

INSERT INTO `entries` (`id`, `place`, `comments`, `img_url`, `user_id`, `time`, `country_id`) VALUES
(1, 'trfd', 'efds', 'ewfd', 1, '2020-10-25 14:59:01', 1),
(2, 'ewdse', 'fdewf', 'efrew1', 1, '2020-10-25 14:59:03', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `sid` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `sid`) VALUES
(1, 'ruslan', 'ruslan_aliyev_@hotmail.com', NULL, '$2y$10$9frqqvU4S.gf4NupEV8Sz.ZOguwrIgyDBpMEFfq7O6plOvFs60zTy', NULL, NULL, NULL, 'normal', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_entry` (`user_id`),
  ADD KEY `country_entry` (`country_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT для таблицы `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `country_entry` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `user_entry` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
