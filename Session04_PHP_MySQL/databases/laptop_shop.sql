-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 06:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `url`, `image`, `status`) VALUES
(1, 'https://www.thegioididong.com/dtdd/iphone-15-plus-512gb?utm_flashsale=1', 'https://cdn.tgdd.vn/Products/Images/42/303825/iphone-15-plus-1-1-750x500.jpg', 1),
(2, 'https://www.thegioididong.com/dong-ho-deo-tay/elio-ess11-03-unisex?utm_flashsale=1', 'https://cdn.tgdd.vn/Products/Images/7264/320544/elio-ess11-03-unisex-1-750x500.jpg', 1),
(3, 'https://www.thegioididong.com/tai-nghe/tai-nghe-bluetooth-tws-ava-freego-y913?utm_flashsale=1', 'https://cdn.tgdd.vn/Products/Images/54/325305/Kit/tai-nghe-bluetooth-tws-ava-freego-y913-note.jpg', 1),
(4, 'https://www.thmilk.vn/products/kem-que-th-true-ice-cream-cong-thuc-topkid-so-co-la-nguyen-chat-huong-vanilla-tu-nhien/', 'https://www.thmilk.vn/wp-content/uploads/2019/11/que-4.png', 1),
(5, 'https://www.bachhoaxanh.com/banh-bong-lan/banh-con-ca-bong-bang-mochi-socola-dau-do-orion-goi-145g-5-goi-x-29g?srsltid=AfmBOooLAejmL1t_TPnHd0QIcz3waACX6phNlJt42pWQ5UaZDsLN7K4F', 'https://cdn.tgdd.vn/Products/Images/3358/328696/bhx/banh-bong-lan-orion-202408081413397641.jpg', 1),
(6, 'https://tocotocotea.com/order/', 'https://tocotocotea.com/wp-content/uploads/2024/06/Xanh-Nhai-Xoai-Bang-Tuyet.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `stock`) VALUES
(1, 'DELL', 'Các dòng laptop Dell chính hãng', 27),
(2, 'HP', 'Các dòng laptop HP', 30),
(3, 'Lenovo', 'Các dòng laptop Lenovo', 60);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','shipped','delivered','canceled') DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` float NOT NULL,
  `stock` int DEFAULT '0',
  `category_id` int DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intro` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `category_id`, `image_url`, `created_at`, `intro`) VALUES
(1, 'Dell Inspiron 14', 'Intel Core i5, 8GB RAM, 256GB SSD', 9999000, 10, 1, 'Dell01.jpg', '2024-10-02 06:20:44', 'Laptop Dell Inspiron 15 3530 i5U085W11SLU là một chiếc laptop vô cùng phù hợp trong phân khúc laptop dành cho dân văn phòng và học tập. Với thiết kế tinh tế, hiệu năng mạnh mẽ từ chip Intel Gen 13 mới nhất, cùng màn hình tần số quét cao 120 Hz, sản phẩm này hứa hẹn sẽ đáp ứng mọi nhu cầu từ công việc đến giải trí của người dùng'),
(2, 'HP Pavilion 15', 'Intel Core i7, 16GB RAM, 512GB SSD', 12999000, 15, 2, 'HP01.jpg', '2024-10-02 06:20:44', 'Laptop HP Pavilion 15-eg3094TU 8C5L5PA sở hữu hiệu năng mạnh mẽ đến từ bộ vi xử lý Intel Core i5 thế hệ 13 có 10 nhân 12 luồng. Core i5-1335U được sản xuất trên tiến trình 10nm, xung nhịp cơ bản 1.3GHz và tối đa lên đến 4.6GHz cho phép bạn giải quyết mọi công việc từ các tác vụ văn phòng nhẹ nhàng cho tới các tác vụ nâng cao như Photoshop hay AI vô cùng mượt mà.'),
(3, 'Dell Inspiron 14', 'Intel Core i5, 8GB RAM, 256GB SSD', 9999000, 10, 1, 'Dell01.jpg', '2024-10-02 12:33:48', 'Laptop Dell Inspiron 15 3530 i5U085W11SLU là một chiếc laptop vô cùng phù hợp trong phân khúc laptop dành cho dân văn phòng và học tập. Với thiết kế tinh tế, hiệu năng mạnh mẽ từ chip Intel Gen 13 mới nhất, cùng màn hình tần số quét cao 120 Hz, sản phẩm này hứa hẹn sẽ đáp ứng mọi nhu cầu từ công việc đến giải trí của người dùng'),
(4, 'HP Pavilion 15', 'Intel Core i7, 16GB RAM, 512GB SSD', 1299900, 15, 2, 'HP01.jpg', '2024-10-02 12:33:48', 'Laptop HP Pavilion 15-eg3094TU 8C5L5PA sở hữu hiệu năng mạnh mẽ đến từ bộ vi xử lý Intel Core i5 thế hệ 13 có 10 nhân 12 luồng. Core i5-1335U được sản xuất trên tiến trình 10nm, xung nhịp cơ bản 1.3GHz và tối đa lên đến 4.6GHz cho phép bạn giải quyết mọi công việc từ các tác vụ văn phòng nhẹ nhàng cho tới các tác vụ nâng cao như Photoshop hay AI vô cùng mượt mà.'),
(5, 'Laptop Dell Latitude 3520', 'i5 1135G7/8GB/256GB/15.6\"FHD/Win11', 20000, 5, 1, 'Dell02.jpg', '2024-10-02 14:16:39', 'Laptop Dell Latitude 3520 70280543 thu hút với vẻ ngoài sang trọng, gam màu đen lịch lãm. Đây là một chiếc laptop khá gọn nhẹ, thích hợp dành cho các bạn học sinh, sinh viên cũng như dân văn phòng. Vỏ máy được làm bằng nhựa cao cấp cứng cáp, bền đẹp, đồng thời giúp giảm trọng lượng cho thân máy, các đường bo cong mềm mại, tinh tế. Bản lề gập mở chắc chắn, tạo cảm giác yên tâm, thoải mái khi sử dụng. Một điểm ấn tượng của chiếc laptop 15.6 inch này đó là thân máy chỉ có trọng lượng khoảng 1.79kg, dễ dàng mang theo mang không tốn nhiều công sức.'),
(6, 'Dell Vostro 15 3520 ', 'i5 1235U/8GB/512GB/120Hz/OfficeHS/Win11', 100000000, 2, 1, 'Dell03.jpg', '2024-10-04 13:50:50', 'Laptop Dell Vostro được trang bị bộ vi xử lý Intel Core i5 1235U với cấu trúc 10 nhân và 12 luồng, có tốc độ xung nhịp cơ bản 1.30 GHz và tối đa lên đến 4.4 GHz nhờ công nghệ Turbo Boost. Thiết bị đạt 5240 điểm đa nhân và 1127 điểm đơn nhân khi mình đo được bằng công cụ Cinebench R23, từ hai con số trên cũng đủ cho thấy CPU có khả năng xử lý mượt mà và hiệu quả các tác vụ thường ngày như lướt web, soạn thảo văn bản, xem phim, giải trí hay chỉnh sửa video, hình ảnh và chơi game ở mức cấu hình trung bình.'),
(15, 'Kirestin Velez', 'Ipsum nihil sit et ', 895, 60, 3, 'lenovo_01.jpg', '2024-10-08 15:28:26', 'Est eum illo officia');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `cart_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `role` enum('customer','admin') DEFAULT 'customer',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `address`, `role`, `image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '0123456789', 'Hà Nội', 'admin', 'g1.png'),
(2, 'lmc', 'lmc', 'lmc@gmail.com', '0111111111', 'Hải Phòng', 'customer', 'g2.png'),
(3, 'duongthoo', 'duongthoo', 'duongthoo@gmail.com', '02222222', 'Thái Nguyên', 'customer', 'g3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detail_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
