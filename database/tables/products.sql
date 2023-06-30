-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 27 2021 г., 15:19
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `metal24`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

-- CREATE TABLE `products` (
--   `id` bigint UNSIGNED NOT NULL,
--   `market_id` int UNSIGNED DEFAULT NULL,
--   `category_id` int UNSIGNED DEFAULT NULL,
--   `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `market_id`, `category_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Медь блеск', NULL, NULL),
(2, 1, 1, 'Лом меди в силовом кабеле (более 50 мм2)', NULL, NULL),
(3, 1, 1, 'Кусковая медь', NULL, NULL),
(4, 1, 1, '«Отборка» ( не менее 3 мм.)', NULL, NULL),
(5, 1, 1, 'Обожженная (лом «жженка»)', NULL, NULL),
(6, 1, 1, 'Медь в масле', NULL, NULL),
(7, 1, 1, 'Электротехническая (в масле)', NULL, NULL),
(8, 1, 1, 'Медная катанка', NULL, NULL),
(9, 1, 1, 'Шинка трансформаторная медная', NULL, NULL),
(10, 1, 1, 'Лом эмальпровода', NULL, NULL),
(11, 1, 1, 'Медный микс (несортовая)', NULL, NULL),
(12, 1, 1, 'Медь в стеклоткани', NULL, NULL),
(13, 1, 1, 'Луженая медь', NULL, NULL),
(14, 1, 1, 'Медная стружка (сечка)', NULL, NULL),
(15, 1, 1, 'Медная проволока', NULL, NULL),
(16, 1, 1, 'Радиаторы медные', NULL, NULL),
(17, 1, 1, 'Медно-алюминиевые радиаторы', NULL, NULL),
(18, 1, 2, 'Алюминиево-медные радиаторы', NULL, NULL),
(19, 1, 2, 'Электротехнический алюминий ( в масле)', NULL, NULL),
(20, 1, 2, 'Провод АС', NULL, NULL),
(21, 1, 2, 'Лом алюминия в силовом кабеле (более 50 мм2)', NULL, NULL),
(22, 1, 2, 'Пищевой алюминий «пищевка»', NULL, NULL),
(23, 1, 2, 'Алюминиевый профиль (АД-31)', NULL, NULL),
(24, 1, 2, 'Алюминиевые ерши (трубы с ребрами)', NULL, NULL),
(25, 1, 2, 'Алюминиевые диски', NULL, NULL),
(26, 1, 2, 'Офсетные листы ( офсет)', NULL, NULL),
(27, 1, 2, 'Моторный алюминий', NULL, NULL),
(28, 1, 2, 'Сплав АМГ', NULL, NULL),
(29, 1, 2, 'Микс алюминия (несортовой лом)', NULL, NULL),
(30, 1, 2, 'Автомобильные номера', NULL, NULL),
(31, 1, 2, 'Сплав алюминия АМЦ', NULL, NULL),
(32, 1, 2, 'Алюминиевые банки', NULL, NULL),
(33, 1, 2, 'Алюминиевая стружка', NULL, NULL),
(34, 1, 2, 'Алюминиевая фольга', NULL, NULL),
(35, 1, 2, 'Лом алюминиевых радиаторов', NULL, NULL),
(36, 1, 2, 'Алюминиевая проволока', NULL, NULL),
(37, 1, 3, 'Марочная бронза (БрАж, БрОф, БрОц)', NULL, NULL),
(38, 1, 3, 'Микс бронзы (несортовой лом)', NULL, NULL),
(39, 1, 3, 'Кусковая бронза (кусок от 10 мм.)', NULL, NULL),
(40, 1, 3, 'Бронзовые изделия', NULL, NULL),
(41, 1, 3, 'Бронзовая стружка', NULL, NULL),
(42, 1, 4, 'Свинец в чушках', NULL, NULL),
(43, 1, 4, 'Лом свинца в силовом кабеле', NULL, NULL),
(44, 1, 4, 'Кабель со свинцовой оболочкой', NULL, NULL),
(45, 1, 4, 'Кабельный свинец (очищенный от гудрона)', NULL, NULL),
(46, 1, 4, 'Кусковой свинец (кусок более 10 мм.)', NULL, NULL),
(47, 1, 4, 'Свинцовые пластины', NULL, NULL),
(48, 1, 4, 'Кабельный свинец (не очищенный от гудрона)', NULL, NULL),
(49, 1, 4, 'Свинец «переплав»', NULL, NULL),
(50, 1, 4, 'Лом свинца в телефонном кабеле', NULL, NULL),
(51, 1, 4, 'Шиномонтажные грузики (балансировочные)', NULL, NULL),
(52, 1, 4, 'Свинцовая проволока', NULL, NULL),
(53, 1, 5, 'Марочная латунь Л-63', NULL, NULL),
(54, 1, 5, 'Марочная латунь Л–90', NULL, NULL),
(55, 1, 5, 'Лом латуни ЛС-59', NULL, NULL),
(56, 1, 5, 'Микс латуни (несортовая)', NULL, NULL),
(57, 1, 5, 'Кусковая латунь (кусок от 5мм.)', NULL, NULL),
(58, 1, 5, 'Лом латунных радиаторов', NULL, NULL),
(59, 1, 5, 'Латунная стружка', NULL, NULL),
(60, 1, 6, 'Лом высоколегированной стали (15-99% Ni)', NULL, NULL),
(61, 1, 6, 'Нержавейка 10% (габарит)', NULL, NULL),
(62, 1, 6, 'Нержавейка 10% (не габарит)', NULL, NULL),
(63, 1, 6, 'Нержавейка 8% (габарит)', NULL, NULL),
(64, 1, 6, 'Нержавейка 8% (не габарит)', NULL, NULL),
(65, 1, 6, 'Стружка нержавейки', NULL, NULL),
(66, 1, 6, 'Лом стали низколегированной (1-6% Ni)', NULL, NULL),
(67, 4, 7, 'Сталь негабаритная 5А', NULL, NULL),
(68, 4, 7, 'Сталь габаритная 3А/3А1', NULL, NULL),
(69, 4, 7, 'Проволока 13А', NULL, NULL),
(70, 4, 7, 'Стальная стружка 16А', NULL, NULL),
(71, 4, 8, 'Габаритный чугун 17А', NULL, NULL),
(72, 4, 8, 'Лом негабаритного чугуна 20А', NULL, NULL),
(73, 4, 8, 'Черный металл 22А', NULL, NULL),
(74, 4, 9, '12А ( жесть/оцинковка)', NULL, NULL),
(75, 4, 10, 'Черный лом габаритный 3Арм', NULL, NULL),
(76, 4, 10, 'Лом негабаритный 5Арм', NULL, NULL),
(77, 4, 10, 'Лом 13А (стальные канаты, проволока, арматура)', NULL, NULL),
(78, 4, 10, 'Черный лом мелкий 4А', NULL, NULL),
(79, 4, 10, 'Тонкостенный металлолома 12А1', NULL, NULL),
(80, 4, 10, 'Стружка черного металлолома', NULL, NULL),
(81, 4, 10, 'Арматура', NULL, NULL),
(82, 4, 10, 'Жесть', NULL, NULL),
(83, 7, 11, 'Лом титана ВТ1-0', NULL, NULL),
(84, 7, 11, 'Несортовой титан (микс)', NULL, NULL),
(85, 7, 11, 'Титановая стружка', NULL, NULL),
(86, 7, 12, 'Вольфрамовая проволока', NULL, NULL),
(87, 7, 12, 'Лом вольфрамовых электродов', NULL, NULL),
(88, 7, 13, 'Лом мельхиора МН-19', NULL, NULL),
(89, 7, 13, 'Мельхиор МН–40', NULL, NULL),
(90, 7, 13, 'Сплав МНЦ 15-20', NULL, NULL),
(91, 7, 14, 'Баббит Б-83', NULL, NULL),
(92, 7, 14, 'Лом баббита «самоплав»', NULL, NULL),
(93, 7, 14, 'Баббит Б-16', NULL, NULL),
(94, 7, 15, 'Лом молибдена печного', NULL, NULL),
(95, 7, 15, 'Прокат из молибдена', NULL, NULL),
(96, 7, 17, 'Лом ВК-ТК', NULL, NULL),
(97, 2, NULL, 'Медный кабель', NULL, NULL),
(98, 2, NULL, 'Силовой кабель', NULL, NULL),
(99, 2, NULL, 'Телефонный кабель', NULL, NULL),
(100, 2, NULL, 'Компьютерный кабель', NULL, NULL),
(101, 2, NULL, 'Алюминиевый кабель', NULL, NULL),
(102, 2, NULL, 'Свинцовый кабель', NULL, NULL),
(103, 2, NULL, 'Монтажный кабель', NULL, NULL),
(104, 2, NULL, 'Обмоточный кабель', NULL, NULL),
(105, 3, NULL, 'Лом слитых аккумуляторов', NULL, NULL),
(106, 3, NULL, 'Гелевые аккумуляторы', NULL, NULL),
(107, 3, NULL, 'Автомобильные аккумуляторы', NULL, NULL),
(108, 3, NULL, 'Свинцовые аккумуляторы', NULL, NULL),
(109, 3, NULL, 'Тяговые аккумуляторы', NULL, NULL),
(110, 3, NULL, 'Аккумуляторы от ИБП', NULL, NULL),
(111, 3, NULL, 'Эбонитовые аккумуляторы', NULL, NULL),
(112, 3, NULL, 'Щелочные аккумуляторы (ТНЖ, НК)', NULL, NULL),
(113, 5, NULL, 'Трансформаторы медные', NULL, NULL),
(114, 5, NULL, 'Трансформаторы алюминиевые', NULL, NULL),
(115, 6, NULL, 'Электрогенераторы', NULL, NULL),
(116, 6, NULL, 'Лом стартеров', NULL, NULL),
(117, 6, NULL, 'Компрессоры', NULL, NULL),
(118, 7, 16, 'Никель', NULL, NULL),
(119, 7, 18, 'Силумин', NULL, NULL),
(120, 7, 19, 'Припой', NULL, NULL),
(121, 7, 20, 'Олово', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
-- ALTER TABLE `products`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
-- ALTER TABLE `products`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;