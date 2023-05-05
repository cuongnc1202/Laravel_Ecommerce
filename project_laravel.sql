-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2023 lúc 04:49 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple Watch', 'appleee.png', '<b>ChipStore</b> - Phụ kiện thời trang unisex', 1, '2023-04-12 00:42:49', '2023-04-12 00:55:56'),
(2, 'Dây Chuyền', 'day-chuyen.png', '<p><b>ChipStore </b>- Phụ kiện thời trang unisex</p>', 1, '2023-04-12 00:51:21', '2023-04-12 00:57:45'),
(3, 'Kính Mắt', 'burberry-4121.png', '<p><b>ChipStore</b>&nbsp;- Phụ kiện thời trang unisex</p>', 1, '2023-04-12 00:52:03', '2023-04-12 01:01:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `avatar`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ChipStore tung ưu đãi tới 200 triệu đồng dịp Valentine', 'cs.png', '<blockquote><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 18px;\">Nhân ngày lễ Tình nhân, ChipStore triển khai chương trình \"Hãy nói lời yêu\" với hàng loạt ưu đãi lớn từ ngày 10/2 đến 20/2.</span></font><br></p></blockquote><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 14px;\">Dịp này, khách hàng có cơ hội sở hữu kim cương viên với ưu đãi tới 200 triệu đồng. Kim cương viên là loại đá quý hiếm hàng đầu và là biểu tượng của tình yêu vĩnh cửu. Tặng kim cương là lựa chọn hoàn hảo để tôn vinh người phụ nữ, thể hiện tình yêu chân thành, thuỷ chung mãi mãi. ChipStore sở hữu nhiều viên kim cương độc đáo và khác biệt, từ kích thước phong phú tới kiểu cắt đa dạng, kiểm định quốc tế uy tín. Kim cương viên ChipStore có kích thước đẹp, kết hợp với trang sức ổ sang trọng sẽ tôn lên đẳng cấp và khí chất thời thượng của phái yếu, đồng hành trong mọi khoảnh khắc quan trọng nhất.</span></font></p><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 14px;\">Hiện tại, khách hàng có cơ hội mua sắm thêm trang sức ổ với ưu đãi tới 10%. Phái mạnh cũng có thể lựa chọn các thiết kế trang sức đang được nhiều phái đẹp yêu thích và \"săn tìm\" để dễ dàng ghi điểm với nàng. Các sản phẩm hiện có ưu đãi tới 25%. Đặc biệt, bộ sưu tập trang sức kim cương 8 Hearts &amp; 8 Arrows với hiệu ứng \"độc nhất vô nhị\" - 8 mũi tên và 8 trái tim sẽ khiến các quý cô say mê.</span></font></p><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 14px;\">Bên cạnh trang sức kim cương, phái mạnh có thể lựa chọn trang sức ngọc trai mang ý nghĩa thủy chung và chân thành với thiết kế thanh lịch, trang nhã và nữ tính. Hoặc trang sức đá màu như bản hòa tấu sắc màu độc đáo như Aquamarine, Topaz, Citrine, Peridot... Mỗi loại đá sẽ mang đến một điều ước ngọt ngào, như một vị thần hộ mệnh luôn ở bên cô ấy.</span></font></p><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 14px;\">Với các cặp đôi lựa chọn Valentine là thời điểm về chung một nhà, ChipStore gửi tặng ưu đãi tới 10% trang sức cưới Wedding Land. Với hàng nghìn mẫu nhẫn cưới, nhẫn đính hôn, các cặp đôi sẽ thỏa sức lựa chọn tín vật tình yêu để gắn kết trong giây phút thiêng liêng nhất của đời người.</span></font></p><p><font color=\"#222222\" face=\"arial\"><span style=\"font-size: 14px;\">Khi mua bất kỳ sản phẩm nào với hóa đơn từ 10 triệu đồng, ChipStore tặng cặp vé xem phim 2D tại rạp CGV cho các cặp đôi, áp dụng tại hệ thống gần 200 Trung tâm Vàng bạc trang sức ChipStore trên toàn quốc. Đồng thời, các khách hàng của TPBank, My Viettel, Viettel Money, VinID, Vinaplus...được tặng thêm 2% khi mua trang sức cao cấp, đồng hồ, quà tặng Vàng Kim Bảo Phúc.</span></font></p>', 1, '2023-04-19 07:38:11', '2023-04-19 08:59:43'),
(3, 'Johnny Dang - ông vua kim hoàn gốc Việt nổi tiếng tại Mỹ', 'thumb_j_1.jpg', '<blockquote><p>Johnny Dang là nhân vật tầm cỡ trong giới chơi trang sức, đặc biệt với các rapper. Trong âm nhạc và văn hóa đại chúng, cái tên này cũng được nhắc tới rất nhiều qua những bài hát đình đám của Migos, Gucci Mane, Lil Pump, Keith Ape, Chief Keef...&nbsp;&nbsp;<span style=\"font-size: 1rem;\">Tạp chí Forbes thậm chí đã có bài viết để lý giải điều gì khiến một người Việt Nam nhập cư thành danh như vậy.</span></p></blockquote><p>Đổi đời ở Mỹ</p><p>\"Tôi chẳng biết gì về hip hop\", Dang trả lời phỏng vấn với NBC News. Thợ kim hoàn 47 tuổi thừa nhận điều ông thấy duy nhất ở Houston (Mỹ) chính là cơ hội lớn để làm giàu.</p><p>Dang sinh ra tại Đắk Lắk. Năm 1987, cha ông rời Việt Nam sang Mỹ. Thời gian trước đó, cha Dang đã bảo ông phải học thêm nhiều về nghề trang sức. Tới năm 1996, 2 cha con gặp lại nhau ở Texas, Mỹ.</p><p>\"Đó là lần đầu tiên tôi ra nước ngoài. Khi thấy một xa lộ 2 tầng, tôi đã không tin nổi vào mắt mình\", Dang nói.</p><p>Từ khi sang Mỹ, Dang làm việc trong quầy hàng sửa chữa trang sức ở chợ trời và thu nhập chỉ khoảng 100 USD/tháng. Năm 1998, thợ kim hoàn gốc Việt mở được một cửa hàng riêng trong trung tâm thương mại, lấy tên là TV Jewelry (T là Tuấn - tên tiếng Việt của Dang, còn V là Việt Nam).</p><p>Sau thời gian làm việc ở Mỹ, Dang nhận ra có sự khác biệt lớn giữa đồ trang sức tại đây và Việt Nam. Ở Mỹ, người ta chuộng trang sức hơn, đặc biệt là giới hip hop. Số lượng vàng làm đồ trang sức cũng nhiều hơn hẳn châu Á. Bên cạnh đó, thay vì làm trang sức kiểu thủ công như ở Việt Nam, tại Mỹ, Dang có cơ hội tiếp cận với các công nghệ mới.</p><p>Tuy nhiên, cuộc đời của Dang chỉ thực sự bước sang trang mới nhờ cuộc gặp gỡ Paul Wall - rapper kiêm doanh nhân - vào năm 2002. Thời điểm đó, grillz (đồ trang sức đeo trên răng) trở thành xu hướng toàn cầu với các rapper. Wall tìm đến cửa hàng của Dang và bị ấn tượng bởi cách làm grillz mà không cần mài răng - một kiểu không thực sự phổ biến lúc bấy giờ.</p><p>Với mối quan hệ và tầm hiểu biết của mình, Wall đưa Dang tiến sâu hơn vào sân chơi hip hop. Mặt khác, nhờ tầm ảnh hưởng từ Wall, nhiều rapper cũng tìm đến cửa hàng của thợ kim hoàn gốc Việt. Quan hệ hợp tác của họ kéo dài đến bây giờ.</p><p>Theo NBC News, những món đồ trang sức cho rapper là thị trường sinh lợi lớn. Trong ngành công nghiệp này, sự phô trương là không giới hạn và điều đó thúc đẩy mức giá sản phẩm tăng chóng mặt.</p>', 1, '2023-04-19 09:08:54', '2023-04-19 09:08:54'),
(4, 'PNJ giới thiệu BST \'Sắc xuân\' cho mùa Tết 2024', '5_ngang.jpg', '<blockquote><p>BST với tên gọi “Nụ tầm xuân” mượn hình ảnh hoa tầm xuân nở rộ giữa tiết trời đầu năm để thể hiện ý nghĩa tốt lành cho sự sinh sôi, nảy lộc và may mắn.</p></blockquote><p>Trong BST mới, PNJ mang đến 7 thiết kế được sáng tạo với đá moon, topaz và ruby, lấy cảm hứng từ những đóa hoa xuân mượt sắc hay hình tượng ong bướm. Chúng được nghệ nhân khắc họa và tạo hình thành những món trang sức đẹp mắt, tôn vinh phái đẹp trong ngày xuân.</p><p>Sắc đỏ của đá ruby không thể thiếu trong các thiết kế chào xuân mới của PNJ. Không chỉ là sắc màu của sự may mắn, hồng phát và tài lộc, màu đỏ còn tượng trưng cho lửa thành công và danh vọng. Vì thế, các thiết kế trang sức sở hữu sắc màu đỏ của đá ruby luôn được khách hàng yêu thích.</p><p>Với BST “Nụ tầm xuân”, đá ruby được tạo hình giọt, tượng trưng cho nụ hoa. Ngoài ra, sản phẩm được phối đá ECZ trắng và điểm xuyết cùng sắc vàng thịnh vượng, tổng thể thiết kế mang lại cảm giác e ấp nhưng vẫn ngập tràn sức sống của nụ hoa đang chờ nở rộ.</p><p>Ngoài màu đỏ của ruby, sắc hồng đá moon cũng được lòng khách hàng của PNJ. Để tối ưu hóa sự mượt mà vốn có của đá moon, các thiết kế trong BST tận dụng dáng đá cabochon để tăng thêm độ “tròn mượt”. Với thiết kế nhẹ nhàng mà sang trọng, trang sức đá moon sẽ cùng phái đẹp khoe dáng mềm mại, đón năm mới tròn đầy, viên mãn.</p><p>Sở hữu thiết kế giản đơn, hiện đại mà vẫn bật lên sự kiêu kỳ của cành hoa xuân, trang sức “Nụ tầm xuân” topaz xứng đáng là điểm nhấn giúp phái đẹp khoe nét xuân kiêu kỳ và hứng khởi.</p><p>Với BST mới của PNJ, phái đẹp có thể chào đón năm mới an nhiên, rực rỡ và khởi sắc. Để sở hữu những thiết kế của BST “Nụ tầm xuân” 2024độc quyền dành riêng cho năm mới<br></p>', 1, '2023-04-19 09:15:54', '2023-04-19 09:15:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kính Mắt', 'category_img_03.jpg', 1, '2023-04-08 00:44:59', '2023-04-08 00:44:59'),
(2, 'Dây Chuyền', 'vong-co-.jpg', 1, '2023-04-08 00:45:10', '2023-04-08 00:45:10'),
(3, 'Đồng Hồ', 'apple-8-8.jpg', 1, '2023-04-08 00:45:22', '2023-04-12 01:06:33'),
(4, 'Khuyên Tai', 'earrings.jpg', 1, '2023-04-08 00:45:58', '2023-04-08 00:48:23'),
(5, 'Lắc Tay', 'Vong-tay-bac-dinh-da-pha-le-hinh-trai-tim-1.jpg', 1, '2023-04-15 01:45:35', '2023-04-15 01:45:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hồng Anh', 'user1@gmail.com', '0987368798', 'Tân Tiến - Chương Mỹ - Hà Nội', '$2y$10$94HWmQk1FQHXdRlAitZ4uuMp5tFsmas4cAT7OaMl8l34aT0caJUXm', '2023-04-15 00:40:56', '2023-04-15 00:40:56'),
(2, 'Nguyễn Công Hồng Duy', 'user2@gmail.com', '0987654321', 'Xuân Mai - Chương Mỹ - Hà Nội', '$2y$10$94HWmQk1FQHXdRlAitZ4uuMp5tFsmas4cAT7OaMl8l34aT0caJUXm', '2023-04-15 00:44:13', '2023-04-30 19:34:10'),
(3, 'Nguyễn Hồng Đăng', 'user3@gmail.com', '0987345345', 'Hà Nội', '$2y$10$94HWmQk1FQHXdRlAitZ4uuMp5tFsmas4cAT7OaMl8l34aT0caJUXm', '2023-04-29 20:48:50', '2023-04-29 20:50:46'),
(5, 'Hoàng Vinh Quang', 'quanghv@gmail.com', '0987321654', 'Hà ội', '$2y$10$dD5aiEob5pKYODqtUc5cN.A1avKnAdOFzB.pvL1FpQOwbz6QMxeni', '2023-04-30 19:40:44', '2023-05-02 19:06:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vàng', 1, '2023-04-15 00:44:37', '2023-04-15 00:44:37'),
(2, 'Bạc', 1, '2023-04-15 00:44:51', '2023-04-15 00:44:51'),
(3, 'Kim Cương', 1, '2023-04-15 00:44:58', '2023-04-15 00:44:58'),
(4, 'Titanium', 1, '2023-04-15 00:45:09', '2023-04-15 00:45:09'),
(5, 'Silicon', 1, '2023-04-15 00:45:29', '2023-04-15 00:45:29'),
(6, 'Mã Não', 1, '2023-04-15 00:45:35', '2023-04-15 00:45:35'),
(7, 'Pha Lê', 1, '2023-04-15 00:45:41', '2023-04-15 00:45:41'),
(8, 'Phỉ Thúy', 1, '2023-04-15 00:45:48', '2023-04-15 00:45:48'),
(9, 'Nhôm', 1, '2023-04-15 00:46:01', '2023-04-15 00:46:01'),
(10, 'Alpine', 1, '2023-04-15 01:25:39', '2023-04-15 01:25:39'),
(11, 'Đá Carbon Tổng Hợp', 1, '2023-04-15 01:52:51', '2023-04-15 01:52:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_07_032357_create_banners_table', 1),
(6, '2023_04_07_032433_create_blogs_table', 1),
(7, '2023_04_07_032451_create_categories_table', 1),
(8, '2023_04_07_032556_create_materials_table', 1),
(9, '2023_04_07_032623_create_products_table', 1),
(10, '2023_04_07_034233_create_thumbnails_table', 1),
(11, '2023_04_07_034446_create_customers_table', 1),
(12, '2023_04_07_034459_create_orders_table', 1),
(13, '2023_04_07_034526_create_order_details_table', 1),
(14, '2023_04_07_123048_create_product_materials_table', 1),
(20, '2023_04_07_123058_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `phone`, `address`, `email`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Hồng Anh', '0987368798', 'Tân Tiến - Chương Mỹ - Hà Nội', 'user1@gmail.com', '12435', 3, '2023-04-21 20:23:23', '2023-05-02 18:44:30'),
(2, 2, 'Nguyễn Công Hồng Duy', '0334092204', 'Tân Tiến - Chương Mỹ - Hà Nội', 'user2@gmail.com', NULL, 3, '2023-04-30 19:23:19', '2023-04-30 19:33:05'),
(3, 1, 'Nguyễn Hồng Anh', '0987368798', 'Tân Tiến - Chương Mỹ - Hà Nội', 'user1@gmail.com', '123123', 3, '2023-04-30 20:20:21', '2023-05-02 18:45:08'),
(4, 1, 'Nguyễn Hồng Anh', '0987368798', 'Tân Tiến - Chương Mỹ - Hà Nội', 'user1@gmail.com', NULL, 3, '2023-04-30 22:00:03', '2023-05-02 18:48:23'),
(5, 1, 'Nguyễn Anh Lương', '0987368798', 'Nghệ An', 'user1@gmail.com', NULL, 1, '2023-05-02 18:43:44', '2023-05-02 19:00:20'),
(6, 5, 'Nguyễn Anh Lương', '0987321654', 'Nghệ An', 'luongna@gmail.com', 'Cường tặng thầy :)))', 1, '2023-05-02 19:04:22', '2023-05-04 18:12:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` double(15,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 17, 1, 2500000.000),
(2, 2, 2, 15190000.000),
(2, 16, 2, 4500000.000),
(3, 6, 1, 9489000.000),
(4, 16, 1, 4500000.000),
(5, 17, 2, 2500000.000),
(6, 17, 1, 2500000.000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` double(15,3) NOT NULL,
  `sale_price` double(15,3) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `sale_price`, `category_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple Watch S8 GPS 45mm - Chính hãng', 'apple-8-8.jpg', 10090000.000, 9990000.000, 3, '<p>Đường kính mặt: 45mm</p><p>Công nghệ màn hình:</p><p>- Màn hình luôn bật</p><p>- Retina</p><p>- Màn hình nhiều hơn gần 20% so với Apple Watch SE</p><p>Độ sáng: Đến 1000 nits</p><p>Chất liệu mặt: Kính cường lực</p><p>Bảo vệ: Chống bụi IP6X</p><p>Chống nước 5ATM (lên đến 50m)</p><p>Thời lượng pin:</p><p>- 18 giờ sử dụng</p><p>- 36 giờ ở chế độ tiết kiệm pin</p><p>Hỗ trợ sạc nhanh</p><p>Cổng sạc: Nam châm</p><p>Hệ điều hành: WatchOS</p><p>Tính năng:</p><p>- Cảm biến nhiệt độ</p><p>- Đo nhịp tim,oxy trong máu</p><p>- Phát hiện té ngã</p><p>- Đo calo tiêu thụ</p><p>- Chế độ tập thể thao</p><p>- Kết nối tai nghe</p><p>- Theo dõi chu kì kinh nguyệt</p><p>- Gửi thông báo khi có tai nạn</p><p>- Theo dõi giấc ngủ</p><p>Kết nối: GPS</p>', 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(2, 'Dây Chuyền Lili-413898-Moissanite  Đính Kim CươngTròn 1 Carat', 'LILI_413898_6.jpg', 15190000.000, NULL, 2, '<p>Một thiết kế đầy sang trọng đến từ trang sức LiLi, hãy tưởng tượng thiết kế dây chuyền bạc hình tròn cách điệu xinh xắn này ở trên cổ bạn, khi đi làm, đi chơi hay hẹn hò, sẽ thật tuyệt vời phải không nào. Món trang sức bạc này sẽ giúp bạn thêm phần đáng yêu và thu hút đó. Chất liệu sản phẩm được làm từ bạc 92.5% nguyên chất đính kim cương Moissanite 1 carat cao cấp.<br></p>', 1, '2023-04-15 00:57:18', '2023-05-02 09:43:25'),
(3, 'Apple Watch SE 2022 40mm - Trắng', 'apple-watch-se-2022-gps-40mm-thumbtz-1.webp', 6190000.000, 6000000.000, 3, '<p><b>Tiện ích:&nbsp;</b></p><p>- Theo dõi sức khỏe: Tính quãng đường chạy; Chế độ luyện tập; Theo dõi giấc ngủ; Theo dõi mức độ stress</p><p>- Hiển thị thông báo: Tin nhắn; Zalo; Messenger (Facebook); Line; Viber; Cuộc gọi</p><p>- Tiện ích khác: Nâng cổ tay sáng màn hình; Màn hình cảm ứng; Báo thức; Từ chối cuộc gọi; Dự báo thời tiết; La bàn; Đồng hồ bấm giờ; Điều khiển chơi nhạc; Rung thông báo; Cuộc gọi khẩn cấp SOS; Điều khiển chụp ảnh</p><p>- Kết nối: Bluetooth v5.3; GPS; Wifi</p><p><b>Pin</b></p><p>Thời gian sử dụng pin: Khoảng 1.5 ngày (ở chế độ tiết kiệm pin)Khoảng 18 giờ (ở chế độ sử dụng thông thường)</p><p><b>Màn hình</b></p><p>- Công nghệ màn hình: OLED</p><p>- Độ phân giải: 324 x 394 pixels</p><p></p><p>- Chất liệu mặt: Ion-X strengthened glass</p><p><b>Cấu hình</b></p><p>- CPU: Apple S8</p><p>- Bộ nhớ trong: 32 GB</p><p>- Hệ điều hành: WatchOS phiên bản mới nhất</p><p>- Kết nối được với hệ điều hành</p>', 1, '2023-04-15 01:15:55', '2023-04-15 01:35:21'),
(4, 'Apple Watch Series 7 41mm 4G  Green', 'Apple Watch Series7 41mm 4G  - Dây Cao Su - Green-1.jpg', 6170000.000, 5790000.000, 3, '<p>Chức năng màn hình luôn bật giữ cho chức năng xem giờ luôn hoạt động,tiết kiệm pin hơn</p><p>Thoải mái sử dụng ở hồ bơi hay ngoài trời với chuẩn kháng bụi IP6X ,chống nước đến 50m</p><p>Đo nhịp tim,oxy trong máu,theo dõi giấc ngủ cùng nhiều tính năng sức khoẻ tích hợp sẵn</p><p>Trải nghiệm âm nhạc với bộ nhớ trong 32GB cùng khả năng kết nối tai nghe bluetooth</p><p>Cổng sạc Type C,sạc nhanh 45 phút cho 80% pin</p><p>Hỗ trợ Esim cho phép nghe gọi ngay trên đồng hồ</p>', 1, '2023-04-15 01:22:08', '2023-04-29 20:59:44'),
(5, 'Apple Watch Ultra Large  LTE 49mm - Green', 'Apple Watch Ultra Large 49mm.jpg', 20490000.000, 19100000.000, 3, '<p>Công nghệ màn hình: OLED</p><p>Kích thước mặt: 49mm</p><p>Kết nối: LTE</p><p>Chất liệu vỏ: Viền Titanium</p><p>Chất liệu dây: Dây Alpine</p><p>Pin: Khoảng 36 giờ (ở chế độ sử dụng thông thường) và Khoảng 60 giờ (ở chế độ tiết kiệm pin)</p><p>Tính năng đặc biệt: Chế độ luyện tập,Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân, Cảm biến nhiệt độ, Theo dõi chu kỳ, Thiết lập gia đình - ghép nối nhiều Đồng hồ</p>', 1, '2023-04-15 01:28:36', '2023-04-29 21:00:24'),
(6, 'Dây Chuyền  FRECKLES  Vàng   18K  Cỏ 4 Lá Trái Tim Đính Kim Cương', 'Day-chuyen-vang-18k-dinh-kim-cuong-tu-nhien-trai-tim-co-4-la-LILI_1.jpg', 9489000.000, NULL, 2, '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Bạn có đang tìm kiếm một món trang sức tinh tế và sang trọng? Dây chuyền vàng 18k cỏ bốn lá đính kim cương LILI_482417 được thiết kế nhằm thỏa mãn yêu cầu đó. Thử tưởng tượng bạn diện em nó ra ngoài đi chơi, đi làm hay đi hẹn hò, đảm bảo bạn sẽ thêm phần xinh đẹp và thu hút đó. Sản phẩm được làm từ vàng 18k, điểm nhấn bởi các viên kim cương tự nhiên 0,2 Carat cao cấp lấp lánh, được chế tác tỉ mỉ công phu bởi những nghệ nhân lành nghề. Sẽ không bất ngờ khi sự xinh xắn, đáng yêu của bạn thu hút mọi người xung quanh đâu nhé !!</span><br></p>', 1, '2023-04-15 01:34:02', '2023-04-22 17:59:30'),
(7, 'Dây Chuyền Vàng Swarovski Dazzling-Swan Đính Pha Lê  Swarovski Dazzling Swan', 'day-chuyen-swarovski-dazzling-swan.png', 2800000.000, 2650000.000, 2, '<p>KIỂU DÁNG: Dây chuyền</p><p>GIỚI TÍNH: Nữ</p><p>MÀU SẮC: Vàng hồng</p><p>CHẤT LIỆU: Mạ vàng hồng</p><p>XUẤT XỨ: Áo</p>', 1, '2023-04-15 01:41:49', '2023-04-22 23:22:08'),
(8, 'Lắc Tay Bạc Black-Heart Đính Pha Lê Đen Hình Trái Tim', 'Vong-tay-bac-dinh-da-pha-le-hinh-trai-tim-1.jpg', 1188000.000, 1100000.000, 5, '<p>Sản phẩm được làm từ bạc S925 cao cấp được tô điểm bằng những viên đá Cubic Zirconia hình trái tim bao quanh. Chiếc lắc mang đến sự cuốn hút toát lên vẻ sang chảnh và nổi bật cho bạn. Chắc chắn chiếc lắc này sẽ là một trong những items xứng đáng nhất trong tủ trang sức của bạn<br></p>', 1, '2023-04-15 01:45:50', '2023-04-19 07:22:51'),
(9, 'Bông Tai Bạc  FRECKLES Mạ Bạch Kim Đính Pha Lê', 'Bong-tai-bac-Y-S925-nu-ma-bach-kim-dinh-da-CZ-hinh-trai-tim.jpg', 1671000.000, NULL, 4, '<p>Sản phẩm được làm từ bạc Ý S925 đính đá Cubic Zirconia cao cấp hình trái tim là một trong những mẫu khuyên tai đẹp nhất hiện nay. Thiết kế là lựa chọn hoàn hảo cho bạn trong những trang phục dự tiệc trang trọng, là một chiếc khuyên không thể thiếu cho những bạn đã bấm khuyên tai. Bạn có muốn cùng nó hóa trang thành nàng công chúa lộng lẫy không nào?<br></p>', 1, '2023-04-15 01:49:25', '2023-04-30 20:24:33'),
(10, 'Khuyên Tai Bạc  FRECKLES Đính Kim Cương  MOISSANITE Hình Giọt Nước', 'Khuyen-tai-bac-nu-dinh-kim-cuong-1.jpg', 3027000.000, NULL, 4, '<p>Chiếc bông tai được làm từ bạc 925 mạ bạch kim, đính kim cương Moissanite 1 carat tinh xảo, tỉ mỉ để từng chi tiết. Viên kim cương Moissanite được gắn trên chiếc bông tai càng làm nổi bật vẻ cuốn hút đầy thanh lịch cho cô nàng sở hữu. Ngoài ra với công nghệ tiên tiến hiện đại giúp cho sản phẩm có độ sáng bóng hoàn hảo góp phần tạo nên điểm nhấn riêng, giúp bạn trở thành nàng công chúa trong mắt mọi chàng trai.</p><p><br></p>', 1, '2023-04-15 01:51:55', '2023-04-22 18:00:36'),
(11, 'Khuyên Tai Bạc  FRECKLES Đính Pha Lê', 'Khuyen-tai-bac-nu-dinh-da-Carbon-tong-hop-3.jpg', 1256000.000, 1200000.000, 4, '<p>Đôi bông tai được làm từ bạc S925 được đính những viên đá Carbon tổng hợp cao cấp. Em nó vô cùng phù hợp dùng để đeo đi học, đi làm văn phòng mà không gây bất tiện nhưng vẫn giúp bạn khoe được cá tính của mình. Với sự tỉ mỉ trong từng đường nét thiết kế, bạn sẽ trở nên hoàn hảo hơn khi đeo chiếc nhẫn này đấy!<br></p>', 1, '2023-04-15 01:55:59', '2023-04-22 17:58:45'),
(12, 'Khuyên Tai Dây  FRECKLES Bạc Đính Kim Cương  MOISSANITE 1 CARAT', 'Bong-tai-bac-dinh-kim-cuong-2.jpg', 2490000.000, 2310000.000, 4, '<p>Sản phẩm chất liệu là bạc 92.5% nguyên chất, đính kim cương Moissanite 1 carat hình trái tim tinh xảo. Lấy cảm hứng từ những trang tiểu thuyết tình yêu, đây là một thiết kế mới lạ và đầy tính sáng tạo đến từ trang sức LiLi. Em nó sẽ giúp bạn nổi bật và thu hút mọi ánh nhìn dù bạn xuất hiện ở đâu, dạo phố, cafe, tiệc tùng hay đi làm. Đừng ngạc nhiên khi nhiều ánh mắt hướng về bạn vì sự tinh tế này nhé !!</p><p><br></p>', 1, '2023-04-15 01:58:10', '2023-04-22 18:01:37'),
(13, 'Lắc Bạc Phoenix Chuỗi Đan So Le', 'Lac-tay-bac-nam-chuoi-dan-.jpg', 7350000.000, 7200000.000, 5, '<p>Chiếc lắc tay làm từ bạc 925 sở hữu vẻ đẹp vừa quý phái lại vừa hiện đại, mang hơi hướng của sự phóng khoáng, là món phụ kiện không thể thiếu đối với mỗi chàng trai. Chiếc lắc là món trang sức với kiểu dáng, thiết kế, màu sắc tinh tế và là đại diện cho mỗi phong cách khác nhau các chàng tự tin xuống phố, hội họp bạn bè hay dự một buổi tiệc tùng nào đó. Đừng ngạc nhiên khi nhiều ánh mắt hướng về bạn vì sự tinh tế này nhé !!</p>', 1, '2023-04-15 02:02:12', '2023-04-15 02:02:12'),
(14, 'Lắc Tay Bạc  FRECKLES Mắt Xích Vuông King Of War', 'Vong-tay-bac-1.jpg', 8000000.000, 7820000.000, 5, '<p>Một thiết kế đơn giản mà thanh lịch, mang đến cho bạn sự tinh tế mà cá tính. Lắc tay bạc nam The King Of War được làm từ bạc 92.5% nguyên chất, được chế tác tỉ mỉ và công phu bởi những nghệ nhân lành nghề. Bạn sẽ cool hơn với em nó đấy !!</p><p><br></p>', 1, '2023-04-15 02:04:15', '2023-04-22 18:00:16'),
(15, 'Kính Mắt Gentle Monster Salver G1 Màu Đen Xám', 'kinh-mat-gentle-monster-sal-1.jpg', 5410000.000, 5358000.000, 1, NULL, 1, '2023-04-15 02:07:06', '2023-04-22 17:57:36'),
(16, 'Kính Dior Brown Square Ladies Sunglasses', 'dior-brown-square-ladies-1.jpg', 4500000.000, NULL, 1, '<p>Kính râm Dior. Số sê-ri: STELLAIRE1. Mã màu: 0Y3R/86. Hình dạng: Hình vuông. Chiều rộng ống kính: 59 mm. Cầu ống kính: 18 mm. Chiều dài cánh tay: 145 mm. Chống tia cực tím 100%. Chất liệu khung: Kim loại. Màu khung: Trắng. Loại ống kính: Nâu. Kiểu vành: Full-Rim. Mã UPC/EAN: 716736264165. Kính râm nữ Dior Brown Square STELLAIRE1 0Y3R/86 59.</p><p>Bao bì của nhà sản xuất đi kèm. Kích thước và màu sắc bao bì có thể thay đổi.</p>', 1, '2023-04-15 02:09:22', '2023-04-22 23:24:08'),
(17, 'Kính Saint Laurent Gray-Pilot Unisex Sunglasses', 'saint-laurent-gray-pilot-unisex-1.jpg', 2500000.000, NULL, 1, '<p>Kính râm Saint Laurent. Số sê-ri: SL 309. Mã màu: 006. Màu sắc: Xám. Hình dạng: Phi công. Chiều rộng ống kính: 58 mm. Cầu ống kính: 17 mm. Chiều dài cánh tay: 145 mm. Chống tia cực tím 100%. Không phân cực. Chất liệu khung: Kim loại. Màu khung: Bạc. Loại ống kính: Xám. Kiểu vành: Full-Rim. Mã UPC/EAN: 889652252018. Kính râm Saint Laurent Grey Pilot Unisex SL 309 006 58.<br></p>', 1, '2023-04-15 02:10:45', '2023-05-04 19:26:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_materials`
--

CREATE TABLE `product_materials` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_materials`
--

INSERT INTO `product_materials` (`product_id`, `material_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '2023-04-22 17:59:30', '2023-04-22 17:59:30'),
(7, 1, 1, '2023-04-22 23:22:08', '2023-04-22 23:22:08'),
(8, 2, 1, '2023-04-19 07:22:51', '2023-04-19 07:22:51'),
(9, 2, 1, '2023-04-30 20:24:33', '2023-04-30 20:24:33'),
(10, 2, 1, '2023-04-22 18:00:36', '2023-04-22 18:00:36'),
(11, 2, 1, '2023-04-22 17:58:45', '2023-04-22 17:58:45'),
(12, 2, 1, '2023-04-22 18:01:37', '2023-04-22 18:01:37'),
(13, 2, 1, '2023-04-15 02:02:12', '2023-04-15 02:02:12'),
(14, 2, 1, '2023-04-22 18:00:16', '2023-04-22 18:00:16'),
(6, 3, 1, '2023-04-22 17:59:30', '2023-04-22 17:59:30'),
(10, 3, 1, '2023-04-22 18:00:36', '2023-04-22 18:00:36'),
(12, 3, 1, '2023-04-22 18:01:37', '2023-04-22 18:01:37'),
(15, 4, 1, '2023-04-22 17:57:36', '2023-04-22 17:57:36'),
(16, 4, 1, '2023-04-22 23:24:08', '2023-04-22 23:24:08'),
(17, 4, 1, '2023-05-04 19:26:09', '2023-05-04 19:26:09'),
(1, 5, 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(3, 5, 1, '2023-04-15 01:35:21', '2023-04-15 01:35:21'),
(4, 5, 1, '2023-04-29 20:59:44', '2023-04-29 20:59:44'),
(7, 7, 1, '2023-04-22 23:22:08', '2023-04-22 23:22:08'),
(8, 7, 1, '2023-04-19 07:22:51', '2023-04-19 07:22:51'),
(9, 7, 1, '2023-04-30 20:24:33', '2023-04-30 20:24:33'),
(11, 7, 1, '2023-04-22 17:58:45', '2023-04-22 17:58:45'),
(1, 9, 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(3, 9, 1, '2023-04-15 01:35:21', '2023-04-15 01:35:21'),
(4, 9, 1, '2023-04-29 20:59:44', '2023-04-29 20:59:44'),
(5, 9, 1, '2023-04-29 21:00:24', '2023-04-29 21:00:24'),
(5, 10, 1, '2023-04-29 21:00:24', '2023-04-29 21:00:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `product_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'apple-8-7.jpg', 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(2, 1, 'apple-8-8.jpg', 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(3, 1, 'apple-8-9.jpg', 1, '2023-04-15 00:54:49', '2023-04-15 00:54:49'),
(4, 2, 'LILI_413898_2.jpg', 1, '2023-04-15 00:57:30', '2023-04-15 00:57:30'),
(5, 2, 'LILI_413898_4.jpg', 1, '2023-04-15 00:57:30', '2023-04-15 00:57:30'),
(6, 2, 'LILI_413898_5.jpg', 1, '2023-04-15 00:57:30', '2023-04-15 00:57:30'),
(7, 3, 'apple-watch-se-2022-gps-40mm-2.webp', 1, '2023-04-15 01:15:55', '2023-04-15 01:15:55'),
(8, 3, 'apple-watch-se-2022-gps-40mm-thumbtz-1.webp', 1, '2023-04-15 01:15:55', '2023-04-15 01:15:55'),
(9, 3, 'apple-watch-se-2022-gps-40mm-thumbtz-2.webp', 1, '2023-04-15 01:15:55', '2023-04-15 01:15:55'),
(10, 4, 'Apple Watch Series7 41mm 4G  - Dây Cao Su - Green.jpg', 1, '2023-04-15 01:22:08', '2023-04-15 01:22:08'),
(11, 4, 'Apple Watch Series7 41mm 4G  - Dây Cao Su - Green-1.jpg', 1, '2023-04-15 01:22:08', '2023-04-15 01:22:08'),
(12, 4, 'Apple Watch Series7 41mm 4G  - Dây Cao Su - Green-3.jpg', 1, '2023-04-15 01:22:08', '2023-04-15 01:22:08'),
(13, 5, 'Apple Watch Ultra Large 49mm -1.jpg', 1, '2023-04-15 01:28:36', '2023-04-15 01:28:36'),
(14, 5, 'Apple Watch Ultra Large 49mm -2.jpg', 1, '2023-04-15 01:28:36', '2023-04-15 01:28:36'),
(15, 5, 'Apple Watch Ultra Large 49mm.jpg', 1, '2023-04-15 01:28:36', '2023-04-15 01:28:36'),
(16, 6, 'Day-chuyen-vang-18k-co-bon-la.jpg', 1, '2023-04-15 01:34:02', '2023-04-15 01:34:02'),
(17, 6, 'Day-chuyen-vang-18k-co-bon-la-LILI.jpg', 1, '2023-04-15 01:34:02', '2023-04-15 01:34:02'),
(18, 6, 'Day-chuyen-vang-18k-co-bon-la-LILI-1.jpg', 1, '2023-04-15 01:34:02', '2023-04-15 01:34:02'),
(19, 6, 'Day-chuyen-vang-18k-dinh-kim-cuong-tu-nhien-trai-tim-co-4-la-LILI.jpg', 1, '2023-04-15 01:34:02', '2023-04-15 01:34:02'),
(20, 7, 'day-chuyen-swarovski-dazzling-swan.png', 1, '2023-04-15 01:41:49', '2023-04-15 01:41:49'),
(21, 7, 'day-chuyen-swarovski-dazzling-swan-1.png', 1, '2023-04-15 01:41:49', '2023-04-15 01:41:49'),
(22, 7, 'day-chuyen-swarovski-dazzling-swan-2.jpg', 1, '2023-04-15 01:41:49', '2023-04-15 01:41:49'),
(23, 8, 'Vong-tay-bac-dinh-da-pha-le-hinh-trai-tim-1.jpg', 1, '2023-04-15 01:45:50', '2023-04-15 01:45:50'),
(24, 8, 'Vong-tay-bac-dinh-da-pha-le-hinh-trai-tim-2.jpg', 1, '2023-04-15 01:45:50', '2023-04-15 01:45:50'),
(25, 8, 'Vong-tay-bac-dinh-da-pha-le-hinh-trai-tim-3.jpg', 1, '2023-04-15 01:45:50', '2023-04-15 01:45:50'),
(26, 9, 'Bong-tai-bac-Y-S925-nu-ma-bach-kim-dinh-da-CZ-hinh-trai-tim.jpg', 1, '2023-04-15 01:49:25', '2023-04-15 01:49:25'),
(27, 9, 'Bong-tai-bac-Y-S925-nu-ma-bach-kim-dinh-da-CZ-hinh-trai-tim1.jpg', 1, '2023-04-15 01:49:25', '2023-04-15 01:49:25'),
(28, 9, 'Bong-tai-bac-Y-S925-nu-ma-bach-kim-dinh-da-CZ-hinh-trai-tim2.jpg', 1, '2023-04-15 01:49:25', '2023-04-15 01:49:25'),
(29, 10, 'Khuyen-tai-bac-nu-dinh-kim-cuong-2.jpg', 1, '2023-04-15 01:51:55', '2023-04-15 01:51:55'),
(30, 10, 'Khuyen-tai-bac-nu-dinh-kim-cuong-3.jpg', 1, '2023-04-15 01:51:55', '2023-04-15 01:51:55'),
(31, 10, 'Khuyen-tai-bac-nu-dinh-kim-cuong-4.jpg', 1, '2023-04-15 01:51:55', '2023-04-15 01:51:55'),
(32, 11, 'Khuyen-tai-bac-nu-dinh-da-Carbon-tong-hop-1.jpg', 1, '2023-04-15 01:55:59', '2023-04-15 01:55:59'),
(33, 11, 'Khuyen-tai-bac-nu-dinh-da-Carbon-tong-hop-2.jpg', 1, '2023-04-15 01:55:59', '2023-04-15 01:55:59'),
(34, 11, 'Khuyen-tai-bac-nu-dinh-da-Carbon-tong-hop-4.jpg', 1, '2023-04-15 01:55:59', '2023-04-15 01:55:59'),
(35, 12, 'Bong-tai-bac-dinh-kim-cuong-1.jpg', 1, '2023-04-15 01:58:10', '2023-04-15 01:58:10'),
(36, 12, 'Bong-tai-bac-dinh-kim-cuong-3.jpg', 1, '2023-04-15 01:58:10', '2023-04-15 01:58:10'),
(37, 12, 'Bong-tai-bac-dinh-kim-cuong-4.jpg', 1, '2023-04-15 01:58:10', '2023-04-15 01:58:10'),
(38, 13, 'Lac-tay-bac-nam-chuoi-dan-.jpg', 1, '2023-04-15 02:02:12', '2023-04-15 02:02:12'),
(39, 13, 'Lac-tay-bac-nam-chuoi-dan-2.jpg', 1, '2023-04-15 02:02:12', '2023-04-15 02:02:12'),
(40, 13, 'Lac-tay-bac-nam-chuoi-dan-3.jpg', 1, '2023-04-15 02:02:12', '2023-04-15 02:02:12'),
(41, 14, 'Vong-tay-bac-2.jpg', 1, '2023-04-15 02:04:15', '2023-04-15 02:04:15'),
(42, 14, 'Vong-tay-bac-3.jpg', 1, '2023-04-15 02:04:15', '2023-04-15 02:04:15'),
(43, 14, 'Vong-tay-bac-4.jpg', 1, '2023-04-15 02:04:15', '2023-04-15 02:04:15'),
(44, 15, 'kinh-mat-gentle-monster-sal-2.jpg', 1, '2023-04-15 02:07:06', '2023-04-15 02:07:06'),
(45, 15, 'kinh-mat-gentle-monster-sal-3.jpg', 1, '2023-04-15 02:07:06', '2023-04-15 02:07:06'),
(46, 15, 'kinh-mat-gentle-monster-sal-4.jpg', 1, '2023-04-15 02:07:06', '2023-04-15 02:07:06'),
(47, 16, 'dior-brown-square-ladies-.jpg', 1, '2023-04-15 02:09:22', '2023-04-15 02:09:22'),
(48, 16, 'dior-brown-square-ladies-1.jpg', 1, '2023-04-15 02:09:22', '2023-04-15 02:09:22'),
(49, 16, 'dior-brown-square-ladies-2.jpg', 1, '2023-04-15 02:09:22', '2023-04-15 02:09:22'),
(50, 17, 'saint-laurent-gray-pilot-unisex-1.jpg', 1, '2023-04-15 02:10:45', '2023-04-15 02:10:45'),
(51, 17, 'saint-laurent-gray-pilot-unisex-2.jpg', 1, '2023-04-15 02:10:45', '2023-04-15 02:10:45'),
(52, 17, 'saint-laurent-gray-pilot-unisex-3.webp', 1, '2023-04-15 02:10:45', '2023-04-15 02:10:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$gjmtikArwVIDfaGYoty0pO2qZGaPobGnFtOPjh7GhkC06dBr4/5Q6', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_name_unique` (`name`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_name_unique` (`name`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_materials`
--
ALTER TABLE `product_materials`
  ADD PRIMARY KEY (`material_id`,`product_id`),
  ADD KEY `product_materials_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thumbnails_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_materials`
--
ALTER TABLE `product_materials`
  ADD CONSTRAINT `product_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `product_materials_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD CONSTRAINT `thumbnails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
