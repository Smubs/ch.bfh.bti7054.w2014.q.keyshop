SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `keyshop_categories` (
  `id`          INT(11)                 NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(200)
                COLLATE utf8_unicode_ci NOT NULL,
  `description` TEXT
                COLLATE utf8_unicode_ci NOT NULL,
  `css_class`   VARCHAR(200)
                COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci
  AUTO_INCREMENT =9;

INSERT INTO `keyshop_categories` (`id`, `name`, `description`, `css_class`) VALUES
  (2, ''Betriebssystem'', ''Ein Betriebssystem ist eine Zusammenstellung von Computerprogrammen,
   die die Systemressourcen eines Computers wie Arbeitsspeicher, Festplatten,
   Ein - und Ausgabegeräte verwaltet und diese Anwendungsprogrammen zur Verfügung stellt.'', ''fa fa - cubes''),
  (4, ''Software'', ''Software ist ein Sammelbegriff für Programme und die zugehörigen Daten.'', ''fa fa - desktop''),
  (5, ''CMS'', ''Content Management System'', ''fa fa - cogs''),
  (6, ''Onlineshop'', ''Ein Onlineshop ist eine spezielle Form des Versandhandels,
   bei dem ein Händler oder Hersteller gewerbliche Waren oder Dienstleistungen zum Verkauf oder zur Miete anbietet.'',
   ''fa fa - shopping - cart''),
  (7, ''Videobearbeitung'', '''', ''fa fa - camera''),
  (8, ''Grafikbearbeitung'', '''', ''fa fa - photo'');

CREATE TABLE IF NOT EXISTS `keyshop_countries` (
  `id`           INT(11)    NOT NULL AUTO_INCREMENT,
  `country_code` VARCHAR(2) NOT NULL,
  `country_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =243;

INSERT INTO `keyshop_countries` (`id`, `country_code`, `country_name`) VALUES
  (1, ''US'', ''United States''),
  (2, ''CA'', ''Canada''),
  (3, ''AF'', ''Afghanistan''),
  (4, ''AL'', ''Albania''),
  (5, ''DZ'', ''Algeria''),
  (6, ''DS'', ''American Samoa''),
  (7, ''AD'', ''Andorra''),
  (8, ''AO'', ''Angola''),
  (9, ''AI'', ''Anguilla''),
  (10, ''AQ'', ''Antarctica''),
  (11, ''AG'', ''Antigua AND / OR Barbuda''),
  (12, ''AR'', ''Argentina''),
  (13, ''AM'', ''Armenia''),
  (14, ''AW'', ''Aruba''),
  (15, ''AU'', ''Australia''),
  (16, ''AT'', ''Austria''),
  (17, ''AZ'', ''Azerbaijan''),
  (18, ''BS'', ''Bahamas''),
  (19, ''BH'', ''Bahrain''),
  (20, ''BD'', ''Bangladesh''),
  (21, ''BB'', ''Barbados''),
  (22, ''BY'', ''Belarus''),
  (23, ''BE'', ''Belgium''),
  (24, ''BZ'', ''Belize''),
  (25, ''BJ'', ''Benin''),
  (26, ''BM'', ''Bermuda''),
  (27, ''BT'', ''Bhutan''),
  (28, ''BO'', ''Bolivia''),
  (29, ''BA'', ''Bosnia AND Herzegovina''),
  (30, ''BW'', ''Botswana''),
  (31, ''BV'', ''Bouvet Island''),
  (32, ''BR'', ''Brazil''),
  (33, ''IO'', ''British lndian Ocean Territory''),
  (34, ''BN'', ''Brunei Darussalam''),
  (35, ''BG'', ''Bulgaria''),
  (36, ''BF'', ''Burkina Faso''),
  (37, ''BI'', ''Burundi''),
  (38, ''KH'', ''Cambodia''),
  (39, ''CM'', ''Cameroon''),
  (40, ''CV'', ''Cape Verde''),
  (41, ''KY'', ''Cayman Islands''),
  (42, ''CF'', ''Central African Republic''),
  (43, ''TD'', ''Chad''),
  (44, ''CL'', ''Chile''),
  (45, ''CN'', ''China''),
  (46, ''CX'', ''Christmas Island''),
  (47, ''CC'', ''Cocos (Keeling) Islands''),
  (48, ''CO'', ''Colombia''),
  (49, ''KM'', ''Comoros''),
  (50, ''CG'', ''Congo''),
  (51, ''CK'', ''Cook Islands''),
  (52, ''CR'', ''Costa Rica''),
  (53, ''HR'', ''Croatia (Hrvatska)''),
  (54, ''CU'', ''Cuba''),
  (55, ''CY'', ''Cyprus''),
  (56, ''CZ'', ''Czech Republic''),
  (57, ''DK'', ''Denmark''),
  (58, ''DJ'', ''Djibouti''),
  (59, ''DM'', ''Dominica''),
  (60, ''DO'', ''Dominican Republic''),
  (61, ''TP'', ''East Timor''),
  (62, ''EC'', ''Ecuador''),
  (63, ''EG'', ''Egypt''),
  (64, ''SV'', ''El Salvador''),
  (65, ''GQ'', ''Equatorial Guinea''),
  (66, ''ER'', ''Eritrea''),
  (67, ''EE'', ''Estonia''),
  (68, ''ET'', ''Ethiopia''),
  (69, ''FK'', ''Falkland Islands (Malvinas)''),
  (70, ''FO'', ''Faroe Islands''),
  (71, ''FJ'', ''Fiji''),
  (72, ''FI'', ''Finland''),
  (73, ''FR'', ''France''),
  (74, ''FX'', ''France, Metropolitan''),
  (75, ''GF'', ''French Guiana''),
  (76, ''PF'', ''French Polynesia''),
  (77, ''TF'', ''French Southern Territories''),
  (78, ''GA'', ''Gabon''),
  (79, ''GM'', ''Gambia''),
  (80, ''GE'', ''Georgia''),
  (81, ''DE'', ''Germany''),
  (82, ''GH'', ''Ghana''),
  (83, ''GI'', ''Gibraltar''),
  (84, ''GR'', ''Greece''),
  (85, ''GL'', ''Greenland''),
  (86, ''GD'', ''Grenada''),
  (87, ''GP'', ''Guadeloupe''),
  (88, ''GU'', ''Guam''),
  (89, ''GT'', ''Guatemala''),
  (90, ''GN'', ''Guinea''),
  (91, ''GW'', ''Guinea - Bissau''),
  (92, ''GY'', ''Guyana''),
  (93, ''HT'', ''Haiti''),
  (94, ''HM'', ''Heard AND Mc Donald Islands''),
  (95, ''HN'', ''Honduras''),
  (96, ''HK'', ''Hong Kong''),
  (97, ''HU'', ''Hungary''),
  (98, '' IS '', ''Iceland''),
  (99, '' IN '', ''India''),
  (100, ''ID'', ''Indonesia''),
  (101, ''IR'', ''Iran (Islamic Republic of)''),
  (102, ''IQ'', ''Iraq''),
  (103, ''IE'', ''Ireland''),
  (104, ''IL'', ''Israel''),
  (105, ''IT'', ''Italy''),
  (106, ''CI'', ''Ivory Coast''),
  (107, ''JM'', ''Jamaica''),
  (108, ''JP'', ''Japan''),
  (109, ''JO'', ''Jordan''),
  (110, ''KZ'', ''Kazakhstan''),
  (111, ''KE'', ''Kenya''),
  (112, ''KI'', ''Kiribati''),
  (113, ''KP'', ''Korea, Democratic People''''s Republic of''),
  (114, ''KR'', ''Korea, Republic of''),
  (115, ''XK'', ''Kosovo''),
  (116, ''KW'', ''Kuwait''),
  (117, ''KG'', ''Kyrgyzstan''),
  (118, ''LA'', ''Lao People''''s Democratic Republic''),
  (119, ''LV'', ''Latvia''),
  (120, ''LB'', ''Lebanon''),
  (121, ''LS'', ''Lesotho''),
  (122, ''LR'', ''Liberia''),
  (123, ''LY'', ''Libyan Arab Jamahiriya''),
  (124, ''LI'', ''Liechtenstein''),
  (125, ''LT'', ''Lithuania''),
  (126, ''LU'', ''Luxembourg''),
  (127, ''MO'', ''Macau''),
  (128, ''MK'', ''Macedonia''),
  (129, ''MG'', ''Madagascar''),
  (130, ''MW'', ''Malawi''),
  (131, ''MY'', ''Malaysia''),
  (132, ''MV'', ''Maldives''),
  (133, ''ML'', ''Mali''),
  (134, ''MT'', ''Malta''),
  (135, ''MH'', ''Marshall Islands''),
  (136, ''MQ'', ''Martinique''),
  (137, ''MR'', ''Mauritania''),
  (138, ''MU'', ''Mauritius''),
  (139, ''TY'', ''Mayotte''),
  (140, ''MX'', ''Mexico''),
  (141, ''FM'', ''Micronesia, Federated States of''),
  (142, ''MD'', ''Moldova, Republic of''),
  (143, ''MC'', ''Monaco''),
  (144, ''MN'', ''Mongolia''),
  (145, ''ME'', ''Montenegro''),
  (146, ''MS'', ''Montserrat''),
  (147, ''MA'', ''Morocco''),
  (148, ''MZ'', ''Mozambique''),
  (149, ''MM'', ''Myanmar''),
  (150, ''NA'', ''Namibia''),
  (151, ''NR'', ''Nauru''),
  (152, ''NP'', ''Nepal''),
  (153, ''NL'', ''Netherlands''),
  (154, ''AN'', ''Netherlands Antilles''),
  (155, ''NC'', ''New Caledonia''),
  (156, ''NZ'', ''New Zealand''),
  (157, ''NI'', ''Nicaragua''),
  (158, ''NE'', ''Niger''),
  (159, ''NG'', ''Nigeria''),
  (160, ''NU'', ''Niue''),
  (161, ''NF'', ''Norfork Island''),
  (162, ''MP'', ''Northern Mariana Islands''),
  (163, ''NO'', ''Norway''),
  (164, ''OM'', ''Oman''),
  (165, ''PK'', ''Pakistan''),
  (166, ''PW'', ''Palau''),
  (167, ''PA'', ''Panama''),
  (168, ''PG'', ''Papua New Guinea''),
  (169, ''PY'', ''Paraguay''),
  (170, ''PE'', ''Peru''),
  (171, ''PH'', ''Philippines''),
  (172, ''PN'', ''Pitcairn''),
  (173, ''PL'', ''Poland''),
  (174, ''PT'', ''Portugal''),
  (175, ''PR'', ''Puerto Rico''),
  (176, ''QA'', ''Qatar''),
  (177, ''RE'', ''Reunion''),
  (178, ''RO'', ''Romania''),
  (179, ''RU'', ''Russian Federation''),
  (180, ''RW'', ''Rwanda''),
  (181, ''KN'', ''Saint Kitts AND Nevis''),
  (182, ''LC'', ''Saint Lucia''),
  (183, ''VC'', ''Saint Vincent AND the Grenadines''),
  (184, ''WS'', ''Samoa''),
  (185, ''SM'', ''San Marino''),
  (186, ''ST'', ''Sao Tome AND Principe''),
  (187, ''SA'', ''Saudi Arabia''),
  (188, ''SN'', ''Senegal''),
  (189, ''RS'', ''Serbia''),
  (190, ''SC'', ''Seychelles''),
  (191, ''SL'', ''Sierra Leone''),
  (192, ''SG'', ''Singapore''),
  (193, ''SK'', ''Slovakia''),
  (194, ''SI'', ''Slovenia''),
  (195, ''SB'', ''Solomon Islands''),
  (196, ''SO'', ''Somalia''),
  (197, ''ZA'', ''South Africa''),
  (198, ''GS'', ''South Georgia South Sandwich Islands''),
  (199, ''ES'', ''Spain''),
  (200, ''LK'', ''Sri Lanka''),
  (201, ''SH'', ''St.Helena''),
  (202, ''PM'', ''St.Pierre AND Miquelon''),
  (203, ''SD'', ''Sudan''),
  (204, ''SR'', ''Suriname''),
  (205, ''SJ'', ''Svalbarn AND Jan Mayen Islands''),
  (206, ''SZ'', ''Swaziland''),
  (207, ''SE'', ''Sweden''),
  (208, ''CH'', ''Switzerland''),
  (209, ''SY'', ''Syrian Arab Republic''),
  (210, ''TW'', ''Taiwan''),
  (211, ''TJ'', ''Tajikistan''),
  (212, ''TZ'', ''Tanzania, United Republic of''),
  (213, ''TH'', ''Thailand''),
  (214, ''TG'', ''Togo''),
  (215, ''TK'', ''Tokelau''),
  (216, ''TO'', ''Tonga''),
  (217, ''TT'', ''Trinidad AND Tobago''),
  (218, ''TN'', ''Tunisia''),
  (219, ''TR'', ''Turkey''),
  (220, ''TM'', ''Turkmenistan''),
  (221, ''TC'', ''Turks AND Caicos Islands''),
  (222, ''TV'', ''Tuvalu''),
  (223, ''UG'', ''Uganda''),
  (224, ''UA'', ''Ukraine''),
  (225, ''AE'', ''United Arab Emirates''),
  (226, ''GB'', ''United Kingdom''),
  (227, ''UM'', ''United States minor outlying islands''),
  (228, ''UY'', ''Uruguay''),
  (229, ''UZ'', ''Uzbekistan''),
  (230, ''VU'', ''Vanuatu''),
  (231, ''VA'', ''Vatican City State''),
  (232, ''VE'', ''Venezuela''),
  (233, ''VN'', ''Vietnam''),
  (234, ''VG'', ''Virgin Islands (British)''),
  (235, ''VI'', ''Virgin Islands (U.S.)''),
  (236, ''WF'', ''Wallis AND Futuna Islands''),
  (237, ''EH'', ''Western Sahara''),
  (238, ''YE'', ''Yemen''),
  (239, ''YU'', ''Yugoslavia''),
  (240, ''ZR'', ''Zaire''),
  (241, ''ZM'', ''Zambia''),
  (242, ''ZW'', ''Zimbabwe'');

CREATE TABLE IF NOT EXISTS `keyshop_keys` (
  `id`       INT(11)                 NOT NULL AUTO_INCREMENT,
  `product_id` INT(11) DEFAULT NULL,
  `order_id` INT(11) DEFAULT NULL,
  `key`      TEXT
             COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9ABF2C784584665A` (`product_id`),
  KEY `IDX_9ABF2C788D9F6D38` (`order_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci
  AUTO_INCREMENT =37;

INSERT INTO `keyshop_keys` (`id`, `product_id`, `order_id`, `key`) VALUES
  (1, 2, 1, ''HPKWI - X88SL - UWGZW - RO794 - HTAPK''),
  (2, 3, 1, ''OI4AR - 3DRNJ - VAINC - PBBHM - VOHYR''),
  (3, 4, 2, ''OTI4D - KUW9J - 5PG1B - 1FFJI - VXPY1''),
  (12, 2, 1, ''GQWAM - 4Q8Z0 - IW4LZ - O4E60 - R2KXF''),
  (13, 2, 1, ''W6RCB - FVQUP - S6EC9 - 52KY6 - WMAMP''),
  (14, 3, 3, ''YO2I5 - TD3LI - 2FTE8 - VJ0QQ - RNWB0''),
  (15, 3, NULL, ''RFLMS - 1KKTQ - ENIWI - D3F7Q - O5ZOJ''),
  (19, 2, NULL, ''HG4MN - 6V82R - BQQPT - 12M4L - JMDQE''),
  (20, 2, NULL, ''L8N8R - OJPW2 - X86J9 - R0896 - U1F59''),
  (21, 2, NULL, ''MC6TY - H39LI - VI6ZY - DP6VH - AOBYX''),
  (22, 2, NULL, ''WQAP5 - AZJQG - 1FV9R - HE894 - B1PVI''),
  (23, 4, NULL, ''2LJO7-PJR1Y-FMVYT-XRIIH-W5E43''),
  (24, 4, NULL, ''C3J1Z - X37SC - ETCOR - ULIAO - PFVPB''),
  (25, 6, NULL, ''KKUXD-PXCOI-KUJ99-EMUKY-JQC7J\r''),
  (26, 6, NULL, ''8CRM5-R9Q6J-0DXLM-Q99DP-EOTCR\r''),
  (27, 6, NULL, ''OAIO7-3JIQJ-34K4B-17BUJ-7GQM9\r''),
  (28, 6, NULL, ''CLNDJ - 6QZGC - 598KB - ZLWQ0 - ORYPR''),
  (29, 7, NULL, ''3ZB3F-W62ZY-TEB39-GYDIB-H7YPG\r''),
  (30, 7, NULL, ''W4VPF-Q8J5I-VHD8L-EHQFD-JUOZB\r''),
  (31, 7, NULL, ''KHLZL-1ONRO-4OH93-FY3UM-KX614\r''),
  (32, 7, NULL, ''3TW0O-I2Y4Q-Q6XSV-4PINH-QIHIZ''),
  (33, 8, NULL, ''TKT6U-E9SYL-I357Z-IO446-E892I\r''),
  (34, 8, NULL, ''QGYFT-W0SUE-JKXU6-5YVS3-MBVUU\r''),
  (35, 8, NULL, ''Y2O6U-TVE3Z-9T7WA-499PC-AW3ED\r''),
  (36, 8, NULL, ''2ZG9X-4EJ7Z-PXGRT-K7H5Z-A3T4N'');

CREATE TABLE IF NOT EXISTS `keyshop_orders` (
  `id`      INT(11)                 NOT NULL AUTO_INCREMENT,
  `date`    TIMESTAMP               NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status`  ENUM(''waiting'', ''confirmed'', ''cancelled'')
            COLLATE utf8_unicode_ci NOT NULL,
  `user_id` INT(11)                 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B36B75ABA76ED395` (`user_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci
  AUTO_INCREMENT =4;

INSERT INTO `keyshop_orders` (`id`, `date`, `status`, `user_id`) VALUES
  (1, ''2015 - 01 - 11 17:35:29'', ''confirmed'', 2),
  (2, ''2015 - 01 - 11 17:35:32'', ''confirmed'', 3),
  (3, ''2015 - 01 - 11 17:35:35'', ''confirmed'', 2);

CREATE TABLE IF NOT EXISTS `keyshop_orders_products` (
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`order_id`, `product_id`),
  KEY `IDX_AD4E53B8D9F6D38` (`order_id`),
  KEY `IDX_AD4E53B4584665A` (`product_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci;

INSERT INTO `keyshop_orders_products` (`order_id`, `product_id`) VALUES
  (1, 2),
  (1, 3),
  (2, 4),
  (3, 3);

CREATE TABLE IF NOT EXISTS `keyshop_products` (
  `id`          INT(11)                 NOT NULL AUTO_INCREMENT,
  `status`      TINYINT(1)              NOT NULL,
  `name`        VARCHAR(40)
                COLLATE utf8_unicode_ci NOT NULL,
  `description` TEXT
                COLLATE utf8_unicode_ci NOT NULL,
  `price`       DOUBLE                  NOT NULL,
  `discount_price` DOUBLE DEFAULT NULL,
  `picture`     VARCHAR(200)
                COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci
  AUTO_INCREMENT =9;

INSERT INTO `keyshop_products` (`id`, `status`, `name`, `description`, `price`, `discount_price`, `picture`) VALUES
  (2, 1, ''Windows 8.1 Pro'', ''Das stabile und bewährte Windows 8.1 Pro.'', 150, 75, ''windows - 8.1.jpg''),
  (3, 1, ''Windows 10 Beta'', ''Testen Sie die Beta - Version von Windows 10.'', 15, 10, ''windows - 10.jpg''),
  (4, 1, ''Microsoft Office 2013 Professional Plus'', ''Alles, was Sie für''''s Arbeiten benötigen.'', 200, 100,
   ''office - 2013.jpg''),
  (6, 1, ''Windows 7'',
   ''Microsoft Windows 7 ist ein Betriebssystem des US-amerikanischen Unternehmens Microsoft.Es erschien am 22. Oktober 2009 und ist der Nachfolger von Microsoft Windows Vista.Der weltweite Marktanteil von Windows 7 liegt bei 50 Prozent.'',
   90, NULL, ''windows - 7.jpg''),
  (7, 1, ''Adobe Photoshop CS5'',
   ''Adobe Photoshop CS5 ist ein Bildbearbeitungsprogramm für Pixelgrafiken des US-amerikanischen Softwarehauses Adobe Systems.Im Bereich der Bildbearbeitung und Druckvorstufe ist das Programm Weltmarktführer und marktbeherrschend.'',
   250, NULL, ''photoshop - cs5.jpg''),
  (8, 1, ''Pinnacle Studio 18 Ultimate'',
   ''Pinnacle Studio ist eine Videobearbeitungs-Software des Unternehmens Pinnacle Systems.'', 160, NULL,
   ''pinnacle - studio - 18 - ultimate.jpg'');

CREATE TABLE IF NOT EXISTS `keyshop_products_categories` (
  `product_id` INT(11) NOT NULL,
  `category_id` INT(11) NOT NULL,
  PRIMARY KEY (`product_id`, `category_id`),
  KEY `IDX_FC5E19B24584665A` (`product_id`),
  KEY `IDX_FC5E19B212469DE2` (`category_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci;

INSERT INTO `keyshop_products_categories` (`product_id`, `category_id`) VALUES
  (2, 2),
  (2, 4),
  (3, 2),
  (3, 4),
  (4, 4),
  (6, 2),
  (6, 4),
  (7, 4),
  (7, 8),
  (8, 4),
  (8, 7);

CREATE TABLE IF NOT EXISTS `keyshop_users` (
  `id`        INT(11)                 NOT NULL AUTO_INCREMENT,
  `admin`     TINYINT(1)              NOT NULL,
  `email`     VARCHAR(254)
              COLLATE utf8_unicode_ci NOT NULL,
  `password`  VARCHAR(60)
              COLLATE utf8_unicode_ci NOT NULL,
  `firstname` VARCHAR(100)
              COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname`  VARCHAR(100)
              COLLATE utf8_unicode_ci DEFAULT NULL,
  `address`   VARCHAR(100)
              COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip`       VARCHAR(20)
              COLLATE utf8_unicode_ci DEFAULT NULL,
  `place`     VARCHAR(100)
              COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `IDX_E3CFC3DCF92F3E70` (`country_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  COLLATE =utf8_unicode_ci
  AUTO_INCREMENT =7;

INSERT INTO `keyshop_users` (`id`, `admin`, `email`, `password`, `firstname`, `lastname`, `address`, `zip`, `place`, `country_id`)
VALUES
  (2, 1, ''raess.michael@gmail.com'', ''$2a$10$2ML4OM6xHW4w3ctbc / UGqOm2kjN / wdXY50nMIW / Y38xKgiW / DNASe'',
   ''Michael'', ''Räss'', ''Interlakenstrasse 90'', ''3705'', ''Faulensee'', 208),
  (3, 1, ''tobischmoker@gmail.com'', ''$2a$10$74Etz3He2OQ.b1Y.zs / ZbuZCz6GE74ADnuhdactjuC2JTeJgZT / py'', ''Tobias'',
   ''Schmoker'', ''Rugenaustrasse 23'', ''3800'', ''Interlaken'', 208),
  (5, 1, ''admin@keyshop.ch'', ''$2a$10$fiH9i / dZLmJ4g6NC.SKjR./ UczSmT3owuGxd6nI9qGFrrU27QvxzC'', '''', '''', '''',
   '''', '''', 208),
  (6, 0, ''customer@keyshop.ch'', ''$2a$10$MhTG55tSTwLgBCIg / B4Si.ftJjHgMrlNk9IKMLCI9m9Z5NX2dEbV.'', '''', '''', '''',
   '''', '''', 208);


ALTER TABLE `keyshop_keys`
ADD CONSTRAINT `FK_9ABF2C784584665A` FOREIGN KEY (`product_id`) REFERENCES `keyshop_products` (`id`),
ADD CONSTRAINT `FK_9ABF2C788D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `keyshop_orders` (`id`);

ALTER TABLE `keyshop_orders`
ADD CONSTRAINT `FK_B36B75ABA76ED395` FOREIGN KEY (`user_id`) REFERENCES `keyshop_users` (`id`);

ALTER TABLE `keyshop_orders_products`
ADD CONSTRAINT `FK_AD4E53B4584665A` FOREIGN KEY (`product_id`) REFERENCES `keyshop_products` (`id`),
ADD CONSTRAINT `FK_AD4E53B8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `keyshop_orders` (`id`);

ALTER TABLE `keyshop_products_categories`
ADD CONSTRAINT `FK_FC5E19B212469DE2` FOREIGN KEY (`category_id`) REFERENCES `keyshop_categories` (`id`),
ADD CONSTRAINT `FK_FC5E19B24584665A` FOREIGN KEY (`product_id`) REFERENCES `keyshop_products` (`id`);

ALTER TABLE `keyshop_users`
ADD CONSTRAINT `FK_E3CFC3DCF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `keyshop_countries` (`id`);
