-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2023 г., 00:08
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bistro_food`
--

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `name`, `content`) VALUES
(1, 'navigation', '{\"logo\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/logo.png\", \"links\": [{\"hash\": \"#banner\", \"title\": \"Home\"}, {\"hash\": \"#about-us\", \"title\": \"Our Story\"}, {\"hash\": \"#catalog\", \"title\": \"Catalog\"}, {\"hash\": \"#gallery\", \"title\": \"Team\"}, {\"hash\": \"#reviews\", \"title\": \"Reviews\"}, {\"hash\": \"#contact-us\", \"title\": \"Contact Us\"}, {\"hash\": \"#gallery\", \"title\": \"Gallery\"}]}'),
(2, 'social', '{\"title\": \"Social Network\", \"social_links\": [{\"url\": \"https://twitter.com/\", \"icon\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/svg/twitter-svgrepo-com.svg\"}, {\"url\": \"https://www.facebook.com/\", \"icon\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/svg/facebook-svgrepo-com.svg\"}, {\"url\": \"https://myaccount.google.com/\", \"icon\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/svg/google-plus-svgrepo-com.svg\"}, {\"url\": \"https://www.pinterest.com/\", \"icon\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/svg/pinterest-svgrepo-com.svg\"}, {\"url\": \"https://www.instagram.com/\", \"icon\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/svg/instagram-svgrepo-com.svg\"}]}'),
(3, 'banner', '{\"banner_slider\": {\"slide_0\": {\"image\": {\"alt\": \"Avocado\", \"source\": {\"laptop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/avocado-first-screen-1440.jpg\", \"mobile\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/avocado-first-screen-mobile.jpg\", \"tablet\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/avocado-first-screen-tablet.jpg\", \"desktop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/avocado-first-screen-1920.jpg\", \"widescreen\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/avocado-first-screen-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"subtitle\": \"Nothing brings together like\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}, \"slide_1\": {\"image\": {\"alt\": \"Burger\", \"source\": {\"laptop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/burger-1440.jpg\", \"mobile\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/burger-mobile.jpg\", \"tablet\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/burger-tablet.jpg\", \"desktop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/burger-1920.jpg\", \"widescreen\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/burger-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"subtitle\": \"Nothing brings together like\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}, \"slide_2\": {\"image\": {\"alt\": \"Steak\", \"source\": {\"laptop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-1440.jpg\", \"mobile\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-mobile.jpg\", \"tablet\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-tablet.jpg\", \"desktop\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-1920.jpg\", \"widescreen\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}}}'),
(4, 'about', '{\"image\": {\"alt\": \"White background\", \"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/eggs.png\", \"image_type\": \"image/png\"}, \"title\": \"Who We Are\", \"button\": {\"url\": \"#\", \"text\": \"Find Out More\"}, \"subtitle\": \"Our Story\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis sem nibh id elituis sed odio sit amet. Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis sem nibh id elituis sed odio sit amet.\"}'),
(5, 'products', '{\"title\": \"Delicious Flavour of Autumn\", \"button\": {\"url\": \"#\", \"text\": \"View Complete Menu\"}, \"product\": {\"product_1\": {\"image\": {\"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/choco-cake.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"7.99\", \"title\": \"Chocolate Cake\", \"description\": \"Class aptent taciti ciosqu litora torquent per \", \"link_to_product\": \"#\"}, \"product_2\": {\"image\": {\"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/steak-capo.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"9.49\", \"title\": \"Capo Steak\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}, \"product_3\": {\"image\": {\"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/king-burger.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"8.50\", \"title\": \"King Burger\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}, \"product_4\": {\"image\": {\"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/mexican-burger.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"9.99\", \"title\": \"Mexican Burger\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}}, \"description\": \"View All Menu For Tasty Meal Today\"}'),
(6, 'team', '{\"title\": \"Meet our Chef\", \"position\": \"Executive Chef\", \"subtitle\": \"OUR TEAM\", \"signature\": {\"alt\": \"Chef signature\", \"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/signature.png\", \"image_type\": \"image/png\"}, \"chef_image\": {\"alt\": \"Chefs photo\", \"url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/Chef.png\", \"image_type\": \"image/png\"}, \"chief_name\": \"John Wick\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.\\r\\n Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.\"}'),
(7, 'reviews', '{\"slider\": {\"person_0\": {\"name\": \"Rick Thompson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"CEO of Delightetn\", \"thumbnails_url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/testimonial-1.png\"}, \"person_1\": {\"name\": \"Mark Simpson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"CEO of Brandcook\", \"thumbnails_url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/testimonial-2.png\"}, \"person_2\": {\"name\": \"Charles Nickelson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"Brand Chef of Seriously Fishman\", \"thumbnails_url\": \"E:\\\\OpenServer\\\\domains\\\\bistrofood/assets/img/picture/testimonial-1.png\"}}, \"subtitle\": \"What Client’s Say\", \"description\": \"1500+ Satisfied Clients\"}'),
(8, 'booking', '{\"title\": \"Booking Form\", \"button\": \"Make a Reservation\", \"fields\": {\"date\": \"Choose Date\", \"time\": \"Choose Time\", \"people\": \"How Many People\"}, \"description\": \"Call (800) 123-4567 from 5AM - 11PM daily, or book online with OpenTable. Reservations required for parties of 6 or more.\"}'),
(9, 'footer', '{\"info\": {\"contacts\": {\"phone\": \"(201) 256 - 3689\", \"title\": \"Contact Location\", \"address\": \"3784 Patterson Road, #8 New York, CA 69000\"}, \"copyright\": \"Copyright © 2021 Bistro Cafe. All rights reserved.\", \"working_hours\": {\"title\": \"Working Hours\", \"hours_0\": {\"name\": \"Monday - Friday\", \"hours\": \"09:00 AM - 10:00 PM\"}, \"hours_1\": {\"name\": \"Saturday - Sunday\", \"hours\": \"09:00 AM - 11:00 PM\"}}}, \"newsletter\": {\"title\": \"Join Our Newsletter\", \"subtitle\": \"Get latest news & updates in your inbox.\", \"button_text\": \"Subscribe Now\", \"field_placeholder\": \"Subscribe our delicious dishes\"}}');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total` float UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` smallint UNSIGNED DEFAULT NULL,
  `single_price` float UNSIGNED DEFAULT NULL,
  `additions` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` text,
  `quantity` int UNSIGNED DEFAULT '0',
  `price` float UNSIGNED DEFAULT '0',
  `is_main` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
