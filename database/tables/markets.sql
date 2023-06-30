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
-- Структура таблицы `markets`
--

-- CREATE TABLE `markets` (
--   `id` bigint UNSIGNED NOT NULL,
--   `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `markets`
--

INSERT INTO `markets` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Приём цветного металла', NULL, NULL),
(2, 'Приём кабеля', NULL, NULL),
(3, 'Приём аккумуляторов', NULL, NULL),
(4, 'Приём черного металла', NULL, NULL),
(5, 'Приём трансформаторов', NULL, NULL),
(6, 'Приём электродвигателей', NULL, NULL),
(7, 'Приём металлов РЗМ', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `markets`
--
-- ALTER TABLE `markets`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `markets`
--
-- ALTER TABLE `markets`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
