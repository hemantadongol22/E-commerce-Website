-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 06:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_order`
--

CREATE TABLE `final_order` (
  `foid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE `ordered_product` (
  `od_id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `quantity`, `price`, `description`) VALUES
(1, 'Iphone 14 pro max', 'iphone14promax.jpg', 5, 200000, 'The iPhone 14 Pro and iPhone 14 Pro Max are smartphones designed, developed, and marketed by Apple Inc. They are the sixteenth-generation flagship iPhones, succeeding the iPhone 13 Pro and iPhone 13 Pro Max. The devices were unveiled alongside the iPhone 14 and iPhone 14 Plus during the Apple Event at Apple Park in Cupertino, California, on September 7, 2022. Pre-orders for the iPhone 14 Pro and 14 Pro Max began on September 9, 2022, and were made available on September 16, 2022. The iPhone 14 Pro and iPhone 14 Pro Max are the first iPhones to have a new type of display cutout called \"Dynamic Island\", replacing the notch design that has been in use since the iPhone X was introduced. \r\nAlong with the iPhone 14, iPhone 14 Pro models add bidirectional satellite connectivity to contact emergency services when out of range of Wi-Fi and cellular networks. '),
(2, 'Iphone 12', 'Iphone12.jpg', 95, 150000, 'The iPhone 12 and iPhone 12 Mini (stylized and marketed as iPhone 12 mini) are smartphones designed, developed, and marketed by Apple Inc. They are the fourteenth-generation, \"affordable flagship\" iPhones, succeeding the iPhone 11. They were unveiled at a virtually held Apple Special Event at Apple Park in Cupertino, California on October 13, 2020, alongside the \"premium flagship\" iPhone 12 Pro and iPhone 12 Pro Max and HomePod Mini. \r\n\r\nPre-orders for the iPhone 12 started on October 16, 2020, and the phone was released in most countries on October 23, 2020 alongside the iPhone 12 Pro and fourth-generation iPad Air. Pre-orders for the iPhone 12 Mini began on November 6, 2020, and the phone was released on November 13, 2020, alongside the iPhone 12 Pro Max.'),
(3, 'Iphone Xs max', 'iphonex.jpg', 125, 145000, 'The iPhone XS and iPhone XS Max (Roman numeral \"X\" pronounced \"ten\"[13]) are smartphones designed, developed and marketed by Apple Inc. They are the twelfth-generation flagships of the iPhone, succeeding the iPhone X. \r\nApple CEO Tim Cook announced the devices alongside a lower-end model, the iPhone XR, on September 12, 2018, at the Steve Jobs Theater at Apple Park. Pre-orders began on September 14, 2018, and the devices went on sale on September 21.\r\n\r\nImprovements besides increased computing speeds include dual-SIM support, filming with stereo audio, and strengthened water resistance. The XS Max was the first plus-sized iPhone to have the newer reduced bezel form factor, as the iPhone X did not have a larger variant.'),
(6, 'Asus Rog III', 'rog3.jpg', 12, 67000, 'The ROG Phone 3\'s overall design is similar to its predecessor (the ROG Phone 2) - a metal chassis and a glass backplate. It retains the RGB-illuminated logo on the back of the device which can be user-customized to show different colors. Two LED modules are located next to the camera, one of which acts as a flash and the other is an RGB LED used to light up the optional Lighting Armour case. The front of the phone features front-facing stereo speakers on either side of the display, and a camera built into the top bezel. The screen has a refresh rate of 144 Hz compared to the 120 Hz refresh rate of the ROG Phone 2, which can be configured to 60/90/120/144 Hz or Auto in the phone settings. The display itself is a 6.59-inch 1080p AMOLED panel with a 19.5:9 aspect ratio, which is protected by Corning Gorilla Glass 6 and supports DCI-P3 and HDR10+ with 270 Hz touch sensing. \r\n\r\nThe device uses the Qualcomm Snapdragon 865/865+ SoC and Adreno 650 GPU, paired with 8, 12 or 16 GB of RAM and 128 GB, 256 GB, or 512 GB of non-expandable UFS 3.1 storage.'),
(7, 'Xiaomi 12', 'Xiaomi 12.jpg', 50, 120000, 'The Redmi Note 12 and Note 12 5G/12R Pro have a front made of Gorilla Glass 3 while the other smartphones in the Redmi Note 12 series have a front made of Gorilla Glass 5. The backs of the Redmi Note 12, Note 12 5G, Note 12 Speed/Poco X5 Pro, Note 12 Turbo/Poco F5 are have their backs of polycarbonate but, Redmi Note 12 Pro 5G, Note 12 Pro+, and Note 12 Discovery have the bacirk madse of glass. Also, Redmi Note 12 5G, Redmi Note 12 Pro+, Redmi Note 12 Discovery, Redmi Note 12 Turbo/Poco F5 and Poco X5 have curved back panels while Redmi Note 12, Redmi Note 12 Pro 5G and Redmi Note 12 Pro Speed/Poco X5 Pro have flat back panels. The flat frame on all models is made of polycarbonate.\r\n\r\nThe design of the camera island of most Redmi Note 12 series models and the Poco X5 Pro is similar to that of the Redmi Note 11T Pro.');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `final_order`
--
ALTER TABLE `final_order`
  ADD PRIMARY KEY (`foid`),
  ADD UNIQUE KEY `oid` (`oid`),
  ADD KEY `billing_id` (`billing_id`),
  ADD KEY `shipping_id` (`shipping_id`);

--
-- Indexes for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `oid` (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_order`
--
ALTER TABLE `final_order`
  MODIFY `foid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordered_product`
--
ALTER TABLE `ordered_product`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `final_order` (`oid`);

--
-- Constraints for table `final_order`
--
ALTER TABLE `final_order`
  ADD CONSTRAINT `final_order_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`billing_id`),
  ADD CONSTRAINT `final_order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`shipping_id`);

--
-- Constraints for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD CONSTRAINT `ordered_product_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `ordered_product_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `final_order` (`oid`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `final_order` (`oid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
