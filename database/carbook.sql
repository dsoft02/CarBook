-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Audi', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(2, 'BMW', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(3, 'Chevrolet', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(4, 'Honda', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(5, 'Hyundai', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(6, 'Toyota', 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `seat_type_id` bigint(20) UNSIGNED NOT NULL,
  `car_model_id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `doors` int(11) NOT NULL DEFAULT 0,
  `color` varchar(100) NOT NULL,
  `fuel_type` varchar(40) DEFAULT NULL,
  `mileage` int(11) NOT NULL DEFAULT 0,
  `transmission` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand_id`, `seat_type_id`, `car_model_id`, `year`, `doors`, `color`, `fuel_type`, `mileage`, `transmission`, `description`, `price`, `images`, `status`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Audi RS Q8', 1, 2, 3, '2022', 3, 'Black', 'Hybrid', 45871, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 15000.00000000, '[\"cars\\/IEHsTwnI3ettRlnZuDSCpVcQwNrfEnKyw5wZbQtb.png\",\"cars\\/Mk5lSnMvTQAKF203R268xqrYc4Elb8M8ZRFFfB9g.png\",\"cars\\/hda4HwreSaZ9pDTRU8a3e8yr6lX3tDpUPiLbI75X.png\"]', 1, 1, '2024-10-17 09:39:41', '2024-10-20 11:13:28'),
(2, 'Audi A4', 1, 2, 2, '2004', 2, 'Red', 'Hybrid', 44137, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 17858.00000000, '[\"cars\\/Hczc1VBWBkIlmAjOvczNVaCx7ovoYjB09rld26UV.png\",\"cars\\/0G4M8SUma9VdsA5CPvON8ziuqEIymtF3Z6s0Bkhl.png\"]', 1, 0, '2024-10-17 09:39:41', '2024-10-17 10:05:55'),
(3, 'Audi Q5', 1, 2, 2, '2015', 3, 'Blue', 'Diesel', 177778, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 32311.00000000, '[\"cars\\/XXt4cTMUlAzeTVDYEMiEpu40IGHepqMz6cyKYhQb.png\",\"cars\\/el3KwRZfarNRJwhXhzj8q3sUhB9hILKkL71qeEAB.png\"]', 1, 0, '2024-10-17 09:39:41', '2024-10-17 10:05:55'),
(4, 'Audi A6', 1, 2, 2, '2014', 2, 'Green', 'Petrol', 27269, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 16447.00000000, '[\"cars\\/j7MVu6wokOQTtHuLbNbPTshVUw5tzOjJ2g1bMh8Z.png\",\"cars\\/uMo9Hr6ba4xGhAVHjKXUxHrJzwIEVDdUNnPx9v1s.png\"]', 1, 1, '2024-10-17 09:39:41', '2024-10-17 10:05:55'),
(5, 'Audi Q7', 1, 2, 3, '2017', 5, 'Green', 'Petrol', 62465, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 48595.00000000, '[\"cars\\/xacHfdeI5K9I4t2qXavBeH71QvyAjiFHrxdr6s45.png\",\"cars\\/vlh7nGqP1StDH0lck6lutPqoOI98Yomm8mW6qyUd.png\"]', 1, 1, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(6, 'Audi A8', 1, 2, 3, '2023', 5, 'Red', 'Electric', 20603, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 21474.00000000, '[\"cars\\/uKLR9a1B6ZAKjkVRWumYZ2skbhIjTb81lQdtglJU.png\",\"cars\\/qRyty3wEBYlQdVUCexRPtTWcn9SoHO7MWR5cd7gr.png\"]', 1, 1, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(7, 'Camz Ferrari Portofino', 2, 5, 4, '2022', 4, 'Black', 'Electric', 132710, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 49176.00000000, '[\"cars\\/ucCSc68ArIFWQEBaTGXkbjcSaDku3mk1ZS79rVOb.png\",\"cars\\/j7kODmdHPROMakdq5VZFTOFykKrlFcPW5G1xOZH8.png\",\"cars\\/sZ6PFYJaeH4GctffFF9NcMD7oZqJYN7Xw5SMezKO.png\"]', 1, 1, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(8, 'CamFord Mustang', 2, 5, 5, '2024', 2, 'Blue', 'Diesel', 67441, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 41309.00000000, '[\"cars\\/qSgd5ttRyPqYWR2TxOqDSf2yPdzOxydLMzSp904X.png\",\"cars\\/gTYOInC4x0W2bBmBNFa1Cs8ld7So8oPG8zbhviSh.png\"]', 1, 0, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(9, 'CamFord Mustang', 3, 2, 8, '2014', 3, 'Black', 'Diesel', 87840, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 47516.00000000, '[\"cars\\/QQ7gA0ohdoBzsDaNUgSUDfWBa5YNKb9XJmXrME7K.png\",\"cars\\/03wpeGEp4g7PLTOrwEdOoODvJg80mxfLY5a0QtNY.png\",\"cars\\/o0MsVsipKeWumR2jTba1QqSWpUFD8mCB4d67Suxp.png\"]', 1, 0, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(10, 'CamFo Explorer', 3, 2, 7, '2004', 3, 'Silver', 'Petrol', 81874, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 20011.00000000, '[\"cars\\/6Pm9XCCKtzIm4WYRQ2iCdikg6awB0ETe4BklZqXg.png\",\"cars\\/T7nRWAFpUA82l0l05Djy2d5HKS8yi8csKReU8ZpC.png\"]', 1, 1, '2024-10-17 09:39:42', '2024-10-17 10:05:55'),
(11, 'Altra Benz C-Class', 3, 2, 8, '2001', 4, 'Blue', 'Diesel', 38953, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 18469.00000000, '[\"cars\\/WODay1BikpP2nllbzFiClCNeescOhVkfP6XRGb9u.png\",\"cars\\/IwH9d5Bmdjrlnh98y7bHELKoMEbXZFcYJnGwsQ3J.png\",\"cars\\/tJj0vNsTedPg3JVQkUekljcXORBaQItHXLTGd0ji.png\"]', 1, 0, '2024-10-17 09:39:42', '2024-10-17 10:11:40'),
(12, 'Corvette Z51', 3, 2, 9, '2016', 2, 'Black', 'Petrol', 197512, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 30429.00000000, '[\"cars\\/GX9mwsCyHfg84Vk6J6S8FE7O0yRIfPchWJhxnrHP.png\",\"cars\\/255ChU8goOX1CNkRU3wgZXEn11yi8Jasnc8qIgR4.png\"]', 1, 1, '2024-10-17 09:39:42', '2024-10-17 10:10:55'),
(13, 'Shevrolet Corvette Z51', 4, 1, 11, '2003', 5, 'Silver', 'Petrol', 18545, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 28821.00000000, '[\"cars\\/Lhku1PUKZT3c4UM7bMODJZEXtkLQRMQ9JVlGN5Uj.png\",\"cars\\/aqHbfbBNcMAcWzxXPyktBGmCwJyEvAgwQ8yEBroZ.png\",\"cars\\/ytahxqScn5EsUah5ZUwkWGSfNYXpAjfaVOj1vYNU.png\"]', 1, 0, '2024-10-17 09:39:42', '2024-10-17 10:09:51'),
(14, 'City 1.3 i-VTEC', 4, 2, 11, '2016', 5, 'Silver', 'Petrol', 58735, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 30084.00000000, '[\"cars\\/6feQ5JS9NzqJ3fgQKcee2EV8BBsiU60TjINy984v.png\",\"cars\\/OCjP3gXcFaPF07jnemO3nHVFBXkHiprcgdKNaF1I.png\",\"cars\\/XpTO3M9juqkxHAWvxRVbKiDvYE7qP6rPzdPIK2QK.png\"]', 1, 1, '2024-10-17 09:39:43', '2024-10-17 10:05:55'),
(15, 'City 1.4 i-VTEC', 4, 1, 12, '2017', 3, 'Silver', 'Electric', 165743, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 28790.00000000, '[\"cars\\/pek7nSVLZZxctmLpxP7JfixqPiEVivJp5YHYjMWo.png\",\"cars\\/Ik4j0WHOLq9XyO0rHzdyF435bMUcWsDSCio3tkrY.png\"]', 1, 0, '2024-10-17 09:39:43', '2024-10-17 10:05:55'),
(16, 'Altra Benz C-Class', 5, 1, 13, '2010', 3, 'Silver', 'Diesel', 68953, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 7004.00000000, '[\"cars\\/eML4aW5lv1hsqoXCRXn4H8sqs3dyIV6rvxS2fTI1.png\",\"cars\\/WLJk46f12NVFLPC1O2RjmhAtAzv5TW5ZSexdVSii.png\"]', 1, 1, '2024-10-17 09:39:43', '2024-10-17 10:05:55'),
(17, 'Camz Ferrari Portofino', 5, 1, 14, '2017', 3, 'Silver', 'Petrol', 102810, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 7713.00000000, '[\"cars\\/98kXFYo61jq0q2MskRHSYrQCfTDxeMFV6Y82ZmjX.png\",\"cars\\/lB2ihLifLKRAvnUR9vkGa81SEoCdXiQM7GwJeq7v.png\",\"cars\\/szWSW7CwEA4sexi7Lp41HvANvcekexw3ShyxBzV0.png\"]', 1, 1, '2024-10-17 09:39:43', '2024-10-17 10:05:55'),
(18, 'Camry', 6, 6, 16, '2009', 4, 'Green', 'Diesel', 22498, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 26762.00000000, '[\"cars\\/fxm6nzvYsYkhZy9rvQeC4T4qTMokGrFBmrPd8WOV.png\",\"cars\\/hDl74K7u9GApVmmx1LuQbOVOFuWLkGE7AuSpWuuw.png\",\"cars\\/h1pddFa42OBN3Y1DJ57ro8s8cpkYQd4qMjD4FtoM.png\"]', 1, 1, '2024-10-17 09:39:43', '2024-10-17 10:05:55'),
(19, 'Corolla', 6, 6, 18, '2008', 4, 'Blue', 'Petrol', 147295, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 38689.00000000, '[\"cars\\/Vqiq9dzSXkOeb4N1R9rxTTcG0xMZJH4sOUNH8cDo.png\",\"cars\\/M0Rr0p2qxr4kgOneJEM9Qr8hr597slTdw8ypMivQ.png\"]', 1, 1, '2024-10-17 09:39:44', '2024-10-17 10:05:55'),
(20, 'RAV4', 6, 6, 18, '2014', 4, 'Black', 'Hybrid', 37757, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 16177.00000000, '[\"cars\\/zbNkChlE7J7PXFyQmRkSotfkB4kDrNuwHf1eGx1c.png\",\"cars\\/R3RepYYXehnZzvXwMcAWmYx83VilpIZbdliKlkQo.png\"]', 1, 0, '2024-10-17 09:39:44', '2024-10-17 10:05:56'),
(21, 'Highlander', 6, 6, 18, '2017', 3, 'Silver', 'Petrol', 49088, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 15684.00000000, '[\"cars\\/WNuZ8bZ22YobMrphIF2ZSSYzeoSQQ0wFdjBBw9Tf.png\",\"cars\\/DCsPhJ6PrFXTNV6gIlnYIjf2YcojZ9gTbXAtcX1N.png\",\"cars\\/nkFq5kQvarIjimTipCnSjt37ahnUWx7YdKJmrtdx.png\"]', 1, 0, '2024-10-17 09:39:44', '2024-10-17 10:05:56'),
(22, 'Tacoma', 6, 6, 16, '2001', 5, 'Gray', 'Electric', 58699, 'Manual', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 29098.00000000, '[\"cars\\/WJz9IHwAvJcY0ktsa260TjqupknWT0BTfHeg0AiZ.png\",\"cars\\/Yv8MInO6qyWh1kz39SFNSqyEOiKJPRi5IXP9zw7q.png\"]', 1, 0, '2024-10-17 09:39:44', '2024-10-17 10:05:56'),
(23, 'Prius', 6, 6, 16, '2011', 5, 'Green', 'Electric', 23029, 'Automatic', '<p>In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it&rsquo;s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.</p>', 18689.00000000, '[\"cars\\/DVratIRGVa6cpXDFeXVxhApJzMljur1l9pGnGtCC.png\",\"cars\\/HuSAhKs6NvhWGv8aXOeKHCFmkOo6YV36qvYbeQyl.png\"]', 1, 1, '2024-10-17 09:39:44', '2024-10-17 10:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioning', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(2, 'Child Seat', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(3, 'GPS', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(4, 'Music Player', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(5, 'Seat Belt', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(6, 'Bluetooth', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(7, 'Power Steering', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(8, 'Car Kit', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(9, 'Remote central locking', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(10, 'Navigation System', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(11, 'Auxiliary heating', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(12, 'Head-up display', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `car_feature_car`
--

CREATE TABLE `car_feature_car` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `car_feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_feature_car`
--

INSERT INTO `car_feature_car` (`id`, `car_id`, `car_feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 6, NULL, NULL),
(4, 1, 7, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 2, 7, NULL, NULL),
(8, 2, 11, NULL, NULL),
(9, 3, 6, NULL, NULL),
(10, 3, 8, NULL, NULL),
(11, 3, 10, NULL, NULL),
(12, 3, 12, NULL, NULL),
(13, 4, 2, NULL, NULL),
(14, 4, 10, NULL, NULL),
(15, 4, 11, NULL, NULL),
(16, 4, 12, NULL, NULL),
(17, 5, 2, NULL, NULL),
(18, 5, 3, NULL, NULL),
(19, 5, 5, NULL, NULL),
(20, 5, 10, NULL, NULL),
(21, 6, 1, NULL, NULL),
(22, 6, 3, NULL, NULL),
(23, 6, 4, NULL, NULL),
(24, 6, 5, NULL, NULL),
(25, 7, 2, NULL, NULL),
(26, 7, 4, NULL, NULL),
(27, 7, 5, NULL, NULL),
(28, 7, 11, NULL, NULL),
(29, 8, 2, NULL, NULL),
(30, 8, 3, NULL, NULL),
(31, 8, 8, NULL, NULL),
(32, 8, 11, NULL, NULL),
(33, 9, 1, NULL, NULL),
(34, 9, 2, NULL, NULL),
(35, 9, 3, NULL, NULL),
(36, 9, 5, NULL, NULL),
(37, 10, 2, NULL, NULL),
(38, 10, 4, NULL, NULL),
(39, 10, 6, NULL, NULL),
(40, 10, 11, NULL, NULL),
(41, 11, 5, NULL, NULL),
(42, 11, 9, NULL, NULL),
(43, 11, 11, NULL, NULL),
(44, 11, 12, NULL, NULL),
(45, 12, 4, NULL, NULL),
(46, 12, 5, NULL, NULL),
(47, 12, 9, NULL, NULL),
(48, 12, 12, NULL, NULL),
(49, 13, 4, NULL, NULL),
(50, 13, 9, NULL, NULL),
(51, 13, 10, NULL, NULL),
(52, 13, 11, NULL, NULL),
(53, 14, 1, NULL, NULL),
(54, 14, 4, NULL, NULL),
(55, 14, 9, NULL, NULL),
(56, 14, 11, NULL, NULL),
(57, 15, 2, NULL, NULL),
(58, 15, 6, NULL, NULL),
(59, 15, 7, NULL, NULL),
(60, 15, 10, NULL, NULL),
(61, 16, 3, NULL, NULL),
(62, 16, 5, NULL, NULL),
(63, 16, 6, NULL, NULL),
(64, 16, 7, NULL, NULL),
(65, 17, 2, NULL, NULL),
(66, 17, 4, NULL, NULL),
(67, 17, 6, NULL, NULL),
(68, 17, 11, NULL, NULL),
(69, 18, 2, NULL, NULL),
(70, 18, 3, NULL, NULL),
(71, 18, 6, NULL, NULL),
(72, 18, 10, NULL, NULL),
(73, 19, 1, NULL, NULL),
(74, 19, 3, NULL, NULL),
(75, 19, 5, NULL, NULL),
(76, 19, 6, NULL, NULL),
(77, 20, 1, NULL, NULL),
(78, 20, 3, NULL, NULL),
(79, 20, 5, NULL, NULL),
(80, 20, 10, NULL, NULL),
(81, 21, 2, NULL, NULL),
(82, 21, 5, NULL, NULL),
(83, 21, 8, NULL, NULL),
(84, 21, 11, NULL, NULL),
(85, 22, 6, NULL, NULL),
(86, 22, 7, NULL, NULL),
(87, 22, 10, NULL, NULL),
(88, 22, 12, NULL, NULL),
(89, 23, 1, NULL, NULL),
(90, 23, 2, NULL, NULL),
(91, 23, 3, NULL, NULL),
(92, 23, 11, NULL, NULL),
(93, 14, 5, NULL, NULL),
(94, 14, 6, NULL, NULL),
(95, 1, 1, NULL, NULL),
(96, 1, 5, NULL, NULL),
(97, 2, 5, NULL, NULL),
(98, 2, 6, NULL, NULL),
(99, 3, 4, NULL, NULL),
(100, 3, 5, NULL, NULL),
(101, 3, 7, NULL, NULL),
(102, 4, 1, NULL, NULL),
(103, 4, 5, NULL, NULL),
(104, 7, 1, NULL, NULL),
(105, 8, 1, NULL, NULL),
(106, 8, 5, NULL, NULL),
(107, 10, 1, NULL, NULL),
(108, 10, 5, NULL, NULL),
(109, 10, 9, NULL, NULL),
(110, 21, 1, NULL, NULL),
(111, 21, 3, NULL, NULL),
(112, 21, 4, NULL, NULL),
(113, 21, 6, NULL, NULL),
(114, 21, 7, NULL, NULL),
(115, 21, 9, NULL, NULL),
(116, 22, 1, NULL, NULL),
(117, 22, 5, NULL, NULL),
(118, 22, 9, NULL, NULL),
(119, 23, 5, NULL, NULL),
(120, 23, 9, NULL, NULL),
(121, 18, 1, NULL, NULL),
(122, 18, 4, NULL, NULL),
(123, 18, 5, NULL, NULL),
(124, 17, 1, NULL, NULL),
(125, 17, 5, NULL, NULL),
(126, 15, 5, NULL, NULL),
(127, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `name`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A3', 1, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(2, 'A4', 1, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(3, 'Q5', 1, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(4, '3 Series', 2, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(5, '5 Series', 2, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(6, 'X3', 2, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(7, 'Malibu', 3, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(8, 'Impala', 3, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(9, 'Equinox', 3, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(10, 'Civic', 4, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(11, 'Accord', 4, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(12, 'CR-V', 4, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(13, 'Elantra', 5, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(14, 'Sonata', 5, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(15, 'Tucson', 5, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(16, 'Camry', 6, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(17, 'Corolla', 6, 1, '2024-10-17 09:39:40', '2024-10-17 09:39:40'),
(18, 'RAV4', 6, 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Sunday User', 'customer@carbook.com', 'Testing', '<p>\r\n\r\n</p><p>Hello John,</p><p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.</p><p>Raw denim McSweeney\'s bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix. Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore whatever viral Truffaut.</p><p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney\'s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven\'t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p><p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p><p>Thanks,<br>Jane</p>\r\n\r\n<p></p>', '2024-10-21 00:08:54', '2024-10-21 00:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE `leases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `trx` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `car_id`, `user_id`, `start_date`, `end_date`, `total_price`, `trx`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2024-10-21', '2024-10-23', 97190.00, 'CARBOOK_660635894', 'canceled', '2024-10-20 05:30:18', '2024-10-20 06:53:36'),
(2, 5, 2, '2024-10-21', '2024-10-23', 97190.00, 'CARBOOK_660635894', 'completed', '2024-10-20 05:30:21', '2024-10-20 17:04:06'),
(3, 8, 2, '2024-10-21', '2024-10-23', 82618.00, 'CARBOOK_900310204', 'canceled', '2024-10-21 01:27:10', '2024-10-21 01:29:18'),
(4, 8, 2, '2024-10-21', '2024-10-23', 82618.00, 'CARBOOK_900310204', 'confirmed', '2024-10-21 01:27:55', '2024-10-21 01:27:55'),
(5, 8, 2, '2024-10-21', '2024-10-23', 82618.00, 'CARBOOK_900310204', 'confirmed', '2024-10-21 01:28:39', '2024-10-21 01:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_11_194851_create_brands_table', 1),
(6, '2024_10_11_194904_create_car_models_table', 1),
(7, '2024_10_11_194914_create_locations_table', 1),
(8, '2024_10_11_194939_create_seat_types_table', 1),
(9, '2024_10_11_202323_create_cars_table', 1),
(10, '2024_10_11_202757_create_ratings_table', 1),
(11, '2024_10_11_210024_create_car_features_table', 1),
(12, '2024_10_11_210442_create_car_feature_car_table', 1),
(13, '2024_10_11_213111_create_leases_table', 1),
(14, '2024_10_18_010554_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Rating value between 1 and 5',
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `car_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 2, 'Nice car', '2024-10-19 14:58:10', '2024-10-19 14:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `seat_types`
--

CREATE TABLE `seat_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_types`
--

INSERT INTO `seat_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2 Seater', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(2, '4 Seater', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(3, '5 Seater', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(4, '7 Seater', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(5, '8 Seater', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41'),
(6, 'Van', 1, '2024-10-17 09:39:41', '2024-10-17 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer','staff') NOT NULL DEFAULT 'customer',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `profile_picture`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@carbook.com', NULL, '$2y$10$QsOwCxXaMl8vyc2Kf4AKluNtwabGi8ZtCXoXXDv7ydXvxjw89P8.6', '1234567890', '123 Admin St, Admin City', '', 'admin', 1, NULL, '2024-10-17 09:39:39', '2024-10-17 09:39:39'),
(2, 'Sunday User', 'customer@carbook.com', NULL, '$2y$10$zUWrMIgwGfMNLHxw17Y2e.7c3KhO/rsKi3G26o7iMYQJESuFn8UMW', '0987654321', '456 Customer Rd, Customer City', 'profile_pictures/IJ2h5G9NsO6O0pxMyRZ0EJbSM1u1shT4dEi53bHY.jpg', 'customer', 1, NULL, '2024-10-17 09:39:40', '2024-10-20 23:16:09'),
(3, 'Staff User', 'staff@carbook.com', NULL, '$2y$10$5lkwMsr/dmfy3AqldSBn7eQlRjhOtzl7UBY7ZNuCfmQWju.l2jlsW', '5551234567', '789 Staff Ave, Staff City', '', 'staff', 1, NULL, '2024-10-17 09:39:40', '2024-10-17 09:39:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`),
  ADD KEY `cars_seat_type_id_foreign` (`seat_type_id`),
  ADD KEY `cars_car_model_id_foreign` (`car_model_id`),
  ADD KEY `cars_status_index` (`status`),
  ADD KEY `cars_year_index` (`year`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_features_name_unique` (`name`);

--
-- Indexes for table `car_feature_car`
--
ALTER TABLE `car_feature_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_feature_car_car_id_foreign` (`car_id`),
  ADD KEY `car_feature_car_car_feature_id_foreign` (`car_feature_id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_models_name_unique` (`name`),
  ADD KEY `car_models_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leases`
--
ALTER TABLE `leases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leases_car_id_foreign` (`car_id`),
  ADD KEY `leases_user_id_foreign` (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_car_id_foreign` (`car_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `seat_types`
--
ALTER TABLE `seat_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_feature_car`
--
ALTER TABLE `car_feature_car`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leases`
--
ALTER TABLE `leases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seat_types`
--
ALTER TABLE `seat_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_car_model_id_foreign` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_seat_type_id_foreign` FOREIGN KEY (`seat_type_id`) REFERENCES `seat_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_feature_car`
--
ALTER TABLE `car_feature_car`
  ADD CONSTRAINT `car_feature_car_car_feature_id_foreign` FOREIGN KEY (`car_feature_id`) REFERENCES `car_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_feature_car_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
