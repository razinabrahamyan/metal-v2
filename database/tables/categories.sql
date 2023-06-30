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
-- Структура таблицы `categories`
--

-- CREATE TABLE `categories` (
--   `id` bigint UNSIGNED NOT NULL,
--   `market_id` int UNSIGNED NOT NULL,
--   `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `market_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Медь', NULL, NULL),
(2, 1, 'Алюминий', NULL, NULL),
(3, 1, 'Бронза', NULL, NULL),
(4, 1, 'Свинец', NULL, NULL),
(5, 1, 'Латунь', NULL, NULL),
(6, 1, 'Нержавейка', NULL, NULL),
(7, 4, 'Сталь', NULL, NULL),
(8, 4, 'Чугун', NULL, NULL),
(9, 4, 'Оцинковка', NULL, NULL),
(10, 4, 'Чермет', NULL, NULL),
(11, 7, 'Титан', NULL, NULL),
(12, 7, 'Вольфрам', NULL, NULL),
(13, 7, 'Мельхиор', NULL, NULL),
(14, 7, 'Баббит', NULL, NULL),
(15, 7, 'Молибден', NULL, NULL),
(16, 7, 'Никель', NULL, NULL),
(17, 7, 'Цинк', NULL, NULL),
(18, 7, 'Силумин', NULL, NULL),
(19, 7, 'Припой', NULL, NULL),
(20, 7, 'Олово', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
-- ALTER TABLE `categories`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
-- ALTER TABLE `categories`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
