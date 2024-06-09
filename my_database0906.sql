-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2024 г., 10:22
-- Версия сервера: 5.6.51
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cash_receipt_order`
--

CREATE TABLE `Cash_receipt_order` (
  `ID` int(11) NOT NULL,
  `OrderID` int(100) NOT NULL,
  `ClientID` int(100) NOT NULL,
  `Client_name` varchar(100) NOT NULL,
  `Client_Sname` varchar(100) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Box_count` int(11) NOT NULL,
  `ID_goods` int(11) NOT NULL,
  `Goods` varchar(100) NOT NULL,
  `Order_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `ID` int(11) NOT NULL,
  `Name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`ID`, `Name`) VALUES
(1, 'Зефир'),
(2, 'Шоколад'),
(3, 'Маршмэллоу'),
(4, 'Драже');

-- --------------------------------------------------------

--
-- Структура таблицы `Chat`
--

CREATE TABLE `Chat` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Number` varchar(100) NOT NULL,
  `Inn` varchar(100) NOT NULL,
  `Company_adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`ID`, `Name`, `Full_name`, `Company`, `Mail`, `Number`, `Inn`, `Company_adress`) VALUES
(1, 'Сергей', 'Смирных', ' ООО \"Вишня\"', 'bwd8oq343@gmail.com', '7 932 389 12 30', '19473046294', 'Россия, г. Челябинск, Дорожная ул., д. 20 кв.42'),
(2, 'Иван', 'Сидоров', 'ООО \"Йогурт\"', 'fewfe12@gmail.com', '7 892 439 82 11', '8632691603', 'Россия, г. Челябинск, Победы ул., д. 41'),
(3, 'Александр', 'Тюменцев', '\"Пятерочка\"', 'alex5@gmail.com', ' 8 800 555 35 35', '38745754832', 'Россия, г. Челябинск, Салавата Юлаева 28');

-- --------------------------------------------------------

--
-- Структура таблицы `Goods`
--

CREATE TABLE `Goods` (
  `ID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Num_of_boxes` int(11) NOT NULL,
  `Num_of_packages` int(11) NOT NULL,
  `Box_weight` int(11) NOT NULL,
  `Price_of_box` decimal(10,0) NOT NULL,
  `Price_of_package` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Goods`
--

INSERT INTO `Goods` (`ID`, `CategoryID`, `Name`, `Num_of_boxes`, `Num_of_packages`, `Box_weight`, `Price_of_box`, `Price_of_package`) VALUES
(1, 1, 'зефир2', 4, 20, 5, '520', '112'),
(2, 2, 'шоколад', 2, 3, 4, '5', '1'),
(3, 1, 'печенье', 30, 400, 20, '2300', '45'),
(4, 3, 'маршмеллоу', 20, 145, 2, '1200', '250'),
(13, 2, 'товар', 232, 1, 1, '1', '1'),
(14, 2, 'еще товар', 23, 454, 343, '1565', '2232'),
(16, 4, 'Какое-то драже', 2, 1, 3, '22', '1'),
(17, 3, 'Какое-то маршмэллоу', 1, 2, 2, '3', '111'),
(18, 2, 'Шоколадка', 1, 2, 3, '4', '5'),
(24, 4, '123', 22, 23, 3, '1565', '340'),
(25, 4, 'Сладкая вата', 10, 20, 1, '1325', '235');

-- --------------------------------------------------------

--
-- Структура таблицы `Goods_invoice`
--

CREATE TABLE `Goods_invoice` (
  `ID` int(11) NOT NULL,
  `ID_order` int(11) NOT NULL,
  `ID_Goods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `Job_analysis`
--

CREATE TABLE `Job_analysis` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) DEFAULT NULL,
  `Completed_orders` int(100) NOT NULL,
  `Cancelled_orders` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Job_analysis`
--

INSERT INTO `Job_analysis` (`ID`, `ID_User`, `Completed_orders`, `Cancelled_orders`) VALUES
(1, 6, 2, 1),
(9, 7, 16, 1),
(10, 20, 6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `Message`
--

CREATE TABLE `Message` (
  `ID` int(11) NOT NULL,
  `Body` varchar(100) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Order_form`
--

CREATE TABLE `Order_form` (
  `ID` int(11) NOT NULL,
  `UserID` int(100) NOT NULL,
  `ClientID` int(100) NOT NULL,
  `User_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Sname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Client_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Client_Sname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` int(100) NOT NULL,
  `Goods` int(11) NOT NULL,
  `Box_count` int(11) NOT NULL,
  `Total_price` decimal(10,0) NOT NULL,
  `ID_goods` int(11) NOT NULL,
  `Now_date` date NOT NULL,
  `Deadline_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Roles`
--

CREATE TABLE `Roles` (
  `ID` int(11) NOT NULL,
  `Role_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Roles`
--

INSERT INTO `Roles` (`ID`, `Role_name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `Status`
--

CREATE TABLE `Status` (
  `ID` int(100) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Status`
--

INSERT INTO `Status` (`ID`, `Name`) VALUES
(1, 'Ожидание выполнения'),
(2, 'В процессе'),
(3, 'Выполнено'),
(4, 'Отклонена');

-- --------------------------------------------------------

--
-- Структура таблицы `Task`
--

CREATE TABLE `Task` (
  `ID` int(11) NOT NULL,
  `ClientID` int(100) DEFAULT NULL,
  `UserID` int(100) DEFAULT NULL,
  `Description` varchar(500) NOT NULL,
  `Status` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Task`
--

INSERT INTO `Task` (`ID`, `ClientID`, `UserID`, `Description`, `Status`) VALUES
(1, 1, 5, 'Предложить товар. Завтра с 15 до 18', 1),
(2, 1, 4, 'q11111', 1),
(3, 1, 6, '1121212', 2),
(4, 2, 7, 'кыштымская 12а', 4),
(7, 3, 20, 'до 18.06, предложить товар.', 3),
(8, 3, 7, 'до вечера', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Role` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `Number` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Passport_data` varchar(100) NOT NULL,
  `Inn` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Role`, `Name`, `Full_name`, `Number`, `Mail`, `Passport_data`, `Inn`, `Login`, `Password`) VALUES
(4, 2, 'Иван', 'Иванов', '7 892 439 82 11', 'fewfe12@gmail.com', '147613 3230', '1397402338', 'IvanIvanov', '123'),
(5, 2, 'Александр', 'Сидоров', '7 532 960 72 13', 'egewefeof@gmail.com', '957040 5261', '8632691603', 'AlexSidorov', '1234'),
(6, 2, 'Егор', 'Белых', '7 912 567 35 28', 'wfnwo98@gmail.com', '385528 3812', '55647388326', 'EgorBeli', '12345'),
(7, 2, 'Егор', 'С', '', 'me@mail.ru', '', '', 'Egor', '202cb962ac59075b964b07152d234b70'),
(15, 1, 'Сергей', 'Нестеренко', '891781212312313', 'nest_ss@mail.ru', '1212121212', '121212', 'nest_sy', '202cb962ac59075b964b07152d234b70'),
(19, 1, 'Егор', 'Мурашкин', '7 951 479 16 09', 'egormurashkin24@gmail.com', '147613 3230', '20740274833', 'admin', '202cb962ac59075b964b07152d234b70'),
(20, 2, 'Евгений', 'Крохолев', '', '', '', '', 'Евгений К.', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cash_receipt_order`
--
ALTER TABLE `Cash_receipt_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `ID_goods` (`ID_goods`);

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Chat`
--
ALTER TABLE `Chat`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id_idx` (`CategoryID`);

--
-- Индексы таблицы `Goods_invoice`
--
ALTER TABLE `Goods_invoice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Goods` (`ID_Goods`),
  ADD KEY `ID_order` (`ID_order`);

--
-- Индексы таблицы `Job_analysis`
--
ALTER TABLE `Job_analysis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Индексы таблицы `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Order_form`
--
ALTER TABLE `Order_form`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_goods` (`ID_goods`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Company` (`Company`);

--
-- Индексы таблицы `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_login` (`UserID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Role` (`Role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cash_receipt_order`
--
ALTER TABLE `Cash_receipt_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Chat`
--
ALTER TABLE `Chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Goods`
--
ALTER TABLE `Goods`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `Goods_invoice`
--
ALTER TABLE `Goods_invoice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Job_analysis`
--
ALTER TABLE `Job_analysis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Message`
--
ALTER TABLE `Message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Order_form`
--
ALTER TABLE `Order_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Roles`
--
ALTER TABLE `Roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Status`
--
ALTER TABLE `Status`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Task`
--
ALTER TABLE `Task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Cash_receipt_order`
--
ALTER TABLE `Cash_receipt_order`
  ADD CONSTRAINT `cash_receipt_order_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cash_receipt_order_ibfk_2` FOREIGN KEY (`ID_goods`) REFERENCES `Goods` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Goods_invoice`
--
ALTER TABLE `Goods_invoice`
  ADD CONSTRAINT `goods_invoice_ibfk_1` FOREIGN KEY (`ID_Goods`) REFERENCES `Goods` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goods_invoice_ibfk_2` FOREIGN KEY (`ID_order`) REFERENCES `Order_form` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Job_analysis`
--
ALTER TABLE `Job_analysis`
  ADD CONSTRAINT `job_analysis_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Order_form`
--
ALTER TABLE `Order_form`
  ADD CONSTRAINT `order_form_ibfk_1` FOREIGN KEY (`ID_goods`) REFERENCES `Goods` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_form_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_form_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_form_ibfk_4` FOREIGN KEY (`Company`) REFERENCES `clients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`Status`) REFERENCES `Status` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `Roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
