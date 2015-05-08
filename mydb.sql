-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2015 г., 07:12
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `idcommunication` int(11) NOT NULL,
  `communication_date` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(32) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `communication_files`
--

CREATE TABLE IF NOT EXISTS `communication_files` (
  `idcommunication_files` int(11) NOT NULL,
  `communication_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `communication_members`
--

CREATE TABLE IF NOT EXISTS `communication_members` (
  `idcommunication_members` int(11) NOT NULL,
  `communication_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `idcustomer` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer_contacts`
--

CREATE TABLE IF NOT EXISTS `customer_contacts` (
  `idcustomer_contacts` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `contact_name` varchar(128) NOT NULL,
  `contact_phone` varchar(16) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_skype` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `idfiles` int(11) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `file_describe` varchar(255) DEFAULT NULL,
  `link` text,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `idproject` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `hours` smallint(6) DEFAULT NULL,
  `budget` int(11) NOT NULL,
  `bug_tracker` varchar(255) NOT NULL,
  `svn` varchar(255) DEFAULT NULL,
  `testflight` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project_team`
--

CREATE TABLE IF NOT EXISTS `project_team` (
  `idproject_team` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `idtimeline` int(11) NOT NULL,
  `timeline_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timeline_subject` varchar(128) NOT NULL,
  `timeline_describe` text,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT 'Null',
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'neoz', 'BQlJKrllgyIHt0uzU6ZBqnoJTAKm6nmv', '$2y$13$Lqce3s8YFS/vGjP5LtBrZ.Md1hDKYU2/gBwS0TOIqkArLCH4kBkrm', 'Null', 'a@a.ru', 10, 1430918961, 1430918961);

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `iduser_roles` int(11) NOT NULL,
  `role_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`idcommunication`), ADD KEY `fk_communication_project1_idx` (`project_id`);

--
-- Индексы таблицы `communication_files`
--
ALTER TABLE `communication_files`
  ADD PRIMARY KEY (`idcommunication_files`), ADD KEY `fk_communication_files_communication_members1_idx` (`communication_id`);

--
-- Индексы таблицы `communication_members`
--
ALTER TABLE `communication_members`
  ADD PRIMARY KEY (`idcommunication_members`), ADD KEY `fk_communication_members_communication1_idx` (`communication_id`), ADD KEY `fk_communication_members_user1_idx` (`user_id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Индексы таблицы `customer_contacts`
--
ALTER TABLE `customer_contacts`
  ADD PRIMARY KEY (`idcustomer_contacts`), ADD KEY `fk_customer_contacts_customer1_idx` (`customer_id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idfiles`), ADD KEY `fk_files_user1_idx` (`user_id`), ADD KEY `fk_files_project1_idx` (`project_id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`), ADD KEY `fk_project_customer1_idx` (`customer_id`);

--
-- Индексы таблицы `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`idproject_team`), ADD KEY `fk_project_team_project_idx` (`project_id`), ADD KEY `fk_project_team_user1_idx` (`user_id`), ADD KEY `fk_project_team_user_roles1_idx` (`role_id`);

--
-- Индексы таблицы `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`idtimeline`), ADD KEY `fk_timeline_user1_idx` (`user_id`), ADD KEY `fk_timeline_project1_idx` (`project_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`iduser_roles`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `communication`
--
ALTER TABLE `communication`
  MODIFY `idcommunication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `communication_files`
--
ALTER TABLE `communication_files`
  MODIFY `idcommunication_files` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `communication_members`
--
ALTER TABLE `communication_members`
  MODIFY `idcommunication_members` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customer_contacts`
--
ALTER TABLE `customer_contacts`
  MODIFY `idcustomer_contacts` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `idfiles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `project_team`
--
ALTER TABLE `project_team`
  MODIFY `idproject_team` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `timeline`
--
ALTER TABLE `timeline`
  MODIFY `idtimeline` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `iduser_roles` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `communication`
--
ALTER TABLE `communication`
ADD CONSTRAINT `fk_communication_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `communication_files`
--
ALTER TABLE `communication_files`
ADD CONSTRAINT `fk_communication_files_communication_members1` FOREIGN KEY (`communication_id`) REFERENCES `communication_members` (`idcommunication_members`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `communication_members`
--
ALTER TABLE `communication_members`
ADD CONSTRAINT `fk_communication_members_communication1` FOREIGN KEY (`communication_id`) REFERENCES `communication` (`idcommunication`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_communication_members_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `customer_contacts`
--
ALTER TABLE `customer_contacts`
ADD CONSTRAINT `fk_customer_contacts_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
ADD CONSTRAINT `fk_files_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_files_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `fk_project_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `project_team`
--
ALTER TABLE `project_team`
ADD CONSTRAINT `fk_project_team_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_project_team_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_project_team_user_roles1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`iduser_roles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `timeline`
--
ALTER TABLE `timeline`
ADD CONSTRAINT `fk_timeline_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_timeline_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
