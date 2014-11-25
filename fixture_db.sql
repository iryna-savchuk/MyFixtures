-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 26 2014 г., 02:05
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fixture_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `name`, `text`) VALUES
(1, 'Irina Ivko', 'Some text for the first comment in database'),
(2, 'Alex', 'Some sample text for the second post'),
(3, 'Johnny Depp', 'The third comment for the posts'),
(5, 'Kate', 'Bla-bla-la'),
(7, 'Irina Ivko', 'tra-ta-ta'),
(10, 'Artur Kale', 'Some more text here for the third post'),
(11, 'Kaly Artson', 'Some more text here for the third post'),
(12, 'David G.', 'Bla-bla-la'),
(13, 'Irina Ivko', 'tra-ta-ta'),
(14, 'Paula', 'Not that long comment'),
(15, 'Jane Ostin', 'Some text here'),
(17, 'Irina Ivko', 'Some comment in database'),
(18, 'Timmy', 'Some sample comment for the post'),
(19, 'Brad Pitt', 'La-la-la-la-la-la');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `age`) VALUES
(6, 'Olga', 'Ivko', 0),
(7, 'Kate', 'Johnson', 33),
(8, 'David', 'Hoffman', 22),
(10, 'Jeremy', 'McFreeze', 40),
(1, 'Irina', 'Ivko', 50),
(2, 'Alex', 'Petrov', 25),
(3, 'Johnny', 'Depp', 51),
(5, 'Peter', 'McLane', 44),
(11, 'Jack', 'Zorro', 40),
(15, 'Ivko', 'Iryna', 27),
(16, 'Sam', 'Crunson', 40),
(17, 'Jeremy', 'McFreeze', 40),
(18, 'Sam', 'Tylor', 27),
(19, 'Graham', 'Nowly', 30),
(20, 'Kate', 'Thomson', 22),
(22, 'Kate', 'Jackson', 27),
(23, 'Dan', 'Skale', 31),
(24, 'Helen', 'Skale', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
