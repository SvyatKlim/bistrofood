-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2023 г., 04:57
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

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
(1, 'navigation', '{\"logo\": \"logo.png\", \"links\": [{\"hash\": \"#banner\", \"title\": \"Home\"}, {\"hash\": \"#about-us\", \"title\": \"Our Story\"}, {\"hash\": \"#catalog\", \"title\": \"Catalog\"}, {\"hash\": \"#team\", \"title\": \"Team\"}, {\"hash\": \"#reviews\", \"title\": \"Reviews\"}, {\"hash\": \"#contact-us\", \"title\": \"Contact Us\"}, {\"hash\": \"#gallery\", \"title\": \"Gallery\"}]}'),
(2, 'social', '{\"title\": \"Social Network\", \"social_links\": [{\"url\": \"https://twitter.com/\", \"icon\": \"twitter-svgrepo-com.svg\"}, {\"url\": \"https://www.facebook.com/\", \"icon\": \"facebook-svgrepo-com.svg\"}, {\"url\": \"https://myaccount.google.com/\", \"icon\": \"google-plus-svgrepo-com.svg\"}, {\"url\": \"https://www.pinterest.com/\", \"icon\": \"pinterest-svgrepo-com.svg\"}, {\"url\": \"https://www.instagram.com/\", \"icon\": \"instagram-svgrepo-com.svg\"}]}'),
(3, 'banner', '{\"banner_slider\": {\"slide_0\": {\"image\": {\"alt\": \"Avocado\", \"source\": {\"laptop\": \"avocado-first-screen-1440.jpg\", \"mobile\": \"avocado-first-screen-mobile.jpg\", \"tablet\": \"avocado-first-screen-tablet.jpg\", \"desktop\": \"avocado-first-screen-1920.jpg\", \"widescreen\": \"avocado-first-screen-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"subtitle\": \"Nothing brings together like\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}, \"slide_1\": {\"image\": {\"alt\": \"Burger\", \"source\": {\"laptop\": \"burger-1440.jpg\", \"mobile\": \"burger-mobile.jpg\", \"tablet\": \"burger-tablet.jpg\", \"desktop\": \"burger-1920.jpg\", \"widescreen\": \"burger-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"subtitle\": \"Nothing brings together like\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}, \"slide_2\": {\"image\": {\"alt\": \"Steak\", \"source\": {\"laptop\": \"steak-1440.jpg\", \"mobile\": \"steak-mobile.jpg\", \"tablet\": \"steak-tablet.jpg\", \"desktop\": \"steak-1920.jpg\", \"widescreen\": \"steak-2560.jpg\"}, \"image_type\": \"image/jpg\"}, \"title\": \"Bistro Cafe\", \"button\": {\"url\": \"#\", \"name\": \"Find Out More\"}, \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis semnibh idelituis sed odio sit amet.\"}}}'),
(4, 'about', '{\"image\": {\"alt\": \"White background\", \"url\": \"eggs.png\", \"image_type\": \"image/png\"}, \"title\": \"Who We Are\", \"button\": {\"url\": \"#\", \"text\": \"Find Out More\"}, \"subtitle\": \"Our Story\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis sem nibh id elituis sed odio sit amet. Aenean sollicitudin, lorem quis bibendum auctor, nisi conse quat ipsum, nec sagittis sem nibh id elituis sed odio sit amet.\"}'),
(5, 'products', '{\"title\": \"Delicious Flavour of Autumn\", \"button\": {\"url\": \"#\", \"text\": \"View Complete Menu\"}, \"product\": {\"product_1\": {\"image\": {\"url\": \"choco-cake.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"7.99\", \"title\": \"Chocolate Cake\", \"description\": \"Class aptent taciti ciosqu litora torquent per \", \"link_to_product\": \"#\"}, \"product_2\": {\"image\": {\"url\": \"steak-capo.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"9.49\", \"title\": \"Capo Steak\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}, \"product_3\": {\"image\": {\"url\": \"king-burger.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"8.50\", \"title\": \"King Burger\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}, \"product_4\": {\"image\": {\"url\": \"mexican-burger.jpg\", \"image_type\": \"image/jpg\"}, \"price\": \"9.99\", \"title\": \"Mexican Burger\", \"description\": \"Class aptent taciti ciosqu \", \"link_to_product\": \"#\"}}, \"description\": \"View All Menu For Tasty Meal Today\"}'),
(6, 'team', '{\"title\": \"Meet our Chef\", \"position\": \"Executive Chef\", \"subtitle\": \"OUR TEAM\", \"signature\": {\"alt\": \"Chef signature\", \"url\": \"signature.png\", \"image_type\": \"image/png\"}, \"chef_image\": {\"alt\": \"Chefs photo\", \"url\": \"Chef.png\", \"image_type\": \"image/png\"}, \"chief_name\": \"John Wick\", \"description\": \"Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.\\r\\n Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.\"}'),
(7, 'reviews', '{\"slider\": {\"person_0\": {\"name\": \"Rick Thompson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"CEO of Delightetn\", \"thumbnails_url\": \"testimonial-1.png\"}, \"person_1\": {\"name\": \"Mark Simpson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"CEO of Brandcook\", \"thumbnails_url\": \"testimonial-2.png\"}, \"person_2\": {\"name\": \"Charles Nickelson\", \"text\": \"“Duis diam eros, dignissim sed condimentum ac, vehicula nec nisl. Suspendisse condimentum libero tempus, accumsan augue et, varius dui. Morbi justo tortor, tincidunt ornare magna ut, molestie mattis enim. Cras ac justo et augue ”\", \"position\": \"Brand Chef of Seriously Fishman\", \"thumbnails_url\": \"testimonial-1.png\"}}, \"subtitle\": \"What Client’s Say\", \"description\": \"1500+ Satisfied Clients\"}'),
(8, 'booking', '{\"title\": \"Booking Form\", \"button\": \"Make a Reservation\", \"fields\": {\"date\": \"Choose Date\", \"time\": \"Choose Time\", \"people\": \"How Many People\"}, \"description\": \"Call (800) 123-4567 from 5AM - 11PM daily, or book online with OpenTable. Reservations required for parties of 6 or more.\"}'),
(9, 'footer', '{\"info\": {\"contacts\": {\"phone\": \"(201) 256 - 3689\", \"title\": \"Contact Location\", \"address\": \"3784 Patterson Road, #8 New York, CA 69000\"}, \"copyright\": \"Copyright © 2021 Bistro Cafe. All rights reserved.\", \"working_hours\": {\"title\": \"Working Hours\", \"hours_0\": {\"name\": \"Monday - Friday\", \"hours\": \"09:00 AM - 10:00 PM\"}, \"hours_1\": {\"name\": \"Saturday - Sunday\", \"hours\": \"09:00 AM - 11:00 PM\"}}}, \"newsletter\": {\"title\": \"Join Our Newsletter\", \"subtitle\": \"Get latest news & updates in your inbox.\", \"button_text\": \"Subscribe Now\", \"field_placeholder\": \"Subscribe our delicious dishes\"}}'),
(10, 'gallery', '{\"image_1\": {\"alt\": \"image 1\", \"source\": {\"laptop\": \"photo01-660.png\", \"mobile\": \"photo01-430.png\"}, \"image_type\": \"image/png\"}, \"image_2\": {\"alt\": \"image 2\", \"source\": {\"laptop\": \"photo02-660.png\", \"mobile\": \"photo02-430.png\"}, \"image_type\": \"image/png\"}, \"image_3\": {\"alt\": \"image 3\", \"source\": {\"laptop\": \"photo03-660.png\", \"mobile\": \"photo03-430.png\"}, \"image_type\": \"image/png\"}, \"image_4\": {\"alt\": \"image 4\", \"source\": {\"laptop\": \"photo04-660.png\", \"mobile\": \"photo04-430.png\"}, \"image_type\": \"image/png\"}, \"image_5\": {\"alt\": \"image 5\", \"source\": {\"laptop\": \"photo05-660.png\", \"mobile\": \"photo05-430.png\"}, \"image_type\": \"image/png\"}, \"image_6\": {\"alt\": \"image 6\", \"source\": {\"laptop\": \"photo06-660.png\", \"mobile\": \"photo06-430.png\"}, \"image_type\": \"image/png\"}, \"image_7\": {\"alt\": \"image 7\", \"source\": {\"laptop\": \"photo07-660.png\", \"mobile\": \"photo07-430.png\"}, \"image_type\": \"image/png\"}, \"image_8\": {\"alt\": \"image 8\", \"source\": {\"laptop\": \"photo08-660.png\", \"mobile\": \"photo08-430.png\"}, \"image_type\": \"image/png\"}, \"image_9\": {\"alt\": \"image 9\", \"source\": {\"laptop\": \"photo09-660.png\", \"mobile\": \"photo09-430.png\"}, \"image_type\": \"image/png\"}}');

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
  `is_main` tinyint(1) DEFAULT '1',
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `price`, `is_main`, `image_url`) VALUES
(1, 'Chocolate Cake', 'Class aptent taciti ciosqu litora torquent per  ', 100, 8, 1, ''),
(5, 'Chocolate  Cake Masturbakedasdasdas ', 'Class aptent taciti ciosqu litora torquent per  as dasd as', 100, 1012, 1, ''),
(6, 'Chocolate  Cake Masturbakedasdasdas  ad gfd gdf', 'Class aptent taciti ciosqu litora torquent per  as dasd as', 100, 1012, 1, ''),
(9, 'Soy Sauce additional', 'Soy SauceSoy SauceSoy SauceSoy SauceSoy SauceSoy SauceSoy SauceSoy SauceSoy Sauce', 11212121, 2, 1, ''),
(10, 'Hot Fudge Brownie', 'Chocolate Brownie with vanilla bean ice-cream', 75, 3, 1, ''),
(22, 'GGG Steak Ribeye', 'Wagyu Ribeye with truffle-asiago-roasted garlic mashed potatoes and Blue Lake green beans with bacon, red onion, and garlic chips', 10, 81, 1, 'http://bistrofood.loc/assets/img/picture/uploads/loija-nguyen-NYBnDWeOX2c-unsplash.jpg'),
(24, 'Something Burger', 'Hahahaha I am not a burger/ I am Kettle =)', 1, 100, 1, 'http://bistrofood.loc/assets/img/picture/uploads/coffee_kettle.png');

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
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'adminovich', 'admin.adminovich@gmail.com', 'test1234', 0),
(2, 'Test', 'test', 'test@gmail.com', '$2y$10$MhJwjJ07ROYCoa7DYST/1uVFqcAUX6.fVMJnVKx/QvQyPMyOhOVxK', 1),
(9, 'admin', 'admin', 'admin@gmail.com', '$2y$10$iaO8BLj.xOljog5OoXNRVuu6GL/9FAwC33GoqTC2.pRuc17.ldcm6', 1);

--
-- Индексы сохранённых таблиц
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
