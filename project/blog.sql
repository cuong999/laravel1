-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2018 at 10:07 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_detail`
--

CREATE TABLE `blog_detail` (
  `id` int(20) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` text COLLATE utf8mb4_unicode_ci,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chitiet_tin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_listblog` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_detail`
--

INSERT INTO `blog_detail` (`id`, `tieude`, `hinhanh`, `mota`, `chitiet_tin`, `id_listblog`) VALUES
(12, 'Mỹ, NATO dè chừng “cơn ác mộng” từ sức mạnh tàu ngầm Nga', '36617969_1418789751554638_1102562347341316096_n1.jpg', '  Các quan chức Hải quân NATO từng nhiều lần cảnh báo về sức mạnh của tàu ngầm Nga, một lực lượng mà NATO miêu tả là phức tạp và triển khai tích cực tại các vùng biển, trong khi Mỹ nhận định các tàu ngầm Moscow đang hoạt động mạnh nhất kể từ sau Chiến tranh Lạnh.  ', '<p>Theo&nbsp;<em>Business Insider</em>, c&aacute;c quan chức Mỹ lo ngại về những khu vực m&agrave; t&agrave;u ngầm Nga đang hoạt động. Họ từng cảnh b&aacute;o c&aacute;c t&agrave;u ngầm Nga đang tiếp cận hệ thống c&aacute;p ngầm trọng yếu dưới biển, điều m&agrave; t&agrave;u ngầm Mỹ từng l&agrave;m trong thời kỳ Chiến tranh Lạnh. Tuy nhi&ecirc;n, năng lực vượt trội nhất của c&aacute;c t&agrave;u ngầm Nga l&agrave; khả năng tấn c&ocirc;ng ch&iacute;nh x&aacute;c v&agrave;o c&aacute;c mục ti&ecirc;u tr&ecirc;n mặt đất.</p>\r\n\r\n<p>Khi được hỏi về dẫn chứng cụ thể nhất cho thấy sự ph&aacute;t triển của t&agrave;u ngầm Nga, Đ&ocirc; đốc James Foggo, chỉ huy Lực lượng Hải qu&acirc;n Mỹ tại ch&acirc;u &Acirc;u v&agrave; ch&acirc;u Phi, đ&atilde; đề cập tới c&aacute;c t&ecirc;n lửa được trang bị tr&ecirc;n t&agrave;u. Đ&acirc;y l&agrave; những vũ kh&iacute; cho thấy năng lực tấn c&ocirc;ng mặt đất uy lực của t&agrave;u ngầm Nga.</p>\r\n\r\n<p>&ldquo;T&ecirc;n lửa h&agrave;nh tr&igrave;nh lớp Kalibr được ph&oacute;ng từ c&aacute;c hệ thống ph&ograve;ng vệ ven biển, c&aacute;c m&aacute;y bay tầm xa v&agrave; c&aacute;c t&agrave;u ngầm ở ngo&agrave;i khơi bờ biển Syria. Ch&uacute;ng cho thấy khả năng c&aacute;c t&ecirc;n lửa n&agrave;y c&oacute; thể tấn c&ocirc;ng gần như mọi thủ đ&ocirc; ở ch&acirc;u &Acirc;u từ bất kỳ v&ugrave;ng biển n&agrave;o quanh ch&acirc;u &Acirc;u&rdquo;, &ocirc;ng Foggo cho biết.2323</p>\r\n\r\n<p>C&aacute;c t&ecirc;n lửa Kalibr, gồm c&aacute;c phi&ecirc;n bản chống hạm, tấn c&ocirc;ng mặt đất v&agrave; chống ngầm, đ&atilde; được đưa v&agrave;o hoạt động từ những năm 1990. T&ecirc;n lửa Kalibr tấn c&ocirc;ng mặt đất c&oacute; thể được ph&oacute;ng từ c&aacute;c t&agrave;u ngầm v&agrave; t&agrave;u nổi, c&oacute; khả năng mang theo đầu đạn nặng hơn 450kg bắn tới c&aacute;c mục ti&ecirc;u c&aacute;ch xa từ 1.500-2.000 km.</p>\r\n', 1),
(18, 'Có một Hà Nội khác lạ trong đợt gió mùa đầu tiên', 'Crygirl1.jpg', '  Sáng 10/10, Hà Nội trở lạnh khi gió mùa tràn về, kết thúc những ngày nóng ấm của cuối thu dâd. Có một Hà Nội khác lạ trong đợt gió mùa đầu tiên           ', '<p>&nbsp;<strong>S&aacute;ng 10/10, H&agrave; Nội trở lạnh khi gi&oacute; m&ugrave;a tr&agrave;n về, kết th&uacute;c những ng&agrave;y n&oacute;ng ấm của cuối thu.</strong></p>\r\n\r\n<p>S&aacute;ng 10/10, H&agrave; Nội trở lạnh khi gi&oacute; m&ugrave;a tr&agrave;n về, kết th&uacute;c những ng&agrave;y n&oacute;ng ấm của cuối thu.sdcsd11133</p>\r\n', 3),
(19, 'Điểm xét tuyển lớp 10 ở Hà Nội: Điểm môn Toán, Văn sẽ nhân đôi', 'Crygirl13.jpg', 'Theo kế hoạch công tác tuyển sinh vào lớp 10 THPT năm học 2019-2020 của Hà Nội vừa được UBND thành phố phê duyệt, điểm xét tuyển sẽ gồm điểm thi môn Toán cộng điểm thi môn Ngữ văn và nhân đôi. Điểm thi môn Ngoại ngữ, cộng điểm thi môn thứ 4, cộng với điểm cộng thêm. Trong đó, bài thi của các môn tính theo thang điểm 10.', '<p>Theo kế hoạch, kỳ thi tuyển sinh v&agrave;o lớp 10 THPT năm học 2019 - 2020 tại H&agrave; Nội sẽ diễn ra trong hai ng&agrave;y 2 - 3/6/2019, sớm hơn 1 tuần so với năm học trước, tạo khoảng c&aacute;ch về thời gian giữa kỳ thi n&agrave;y với kỳ thi THPT quốc gia năm 2019.</p>\r\n\r\n<p>Cũng theo Sở GD&amp;ĐT H&agrave; Nội, dự kiến, trong th&aacute;ng 10/2018, Sở GD&amp;ĐT sẽ c&ocirc;ng bố đề minh họa c&aacute;c m&ocirc;n của kỳ thi tuyển sinh lớp 10 THPT năm học 2019 - 2020. Việc c&ocirc;ng bố sớm đề thi minh họa sẽ gi&uacute;p gi&aacute;o vi&ecirc;n v&agrave; học sinh c&oacute; định hướng tốt hơn trong dạy học v&agrave; &ocirc;n tập, đủ thời gian chuẩn bị cho kỳ thi.</p>\r\n\r\n<p>Phương &aacute;n tuyển sinh lớp 10 THPT năm học 2019 - 2020 được Sở GD&amp;ĐT H&agrave; Nội x&acirc;y dựng, tr&igrave;nh UBND th&agrave;nh phố H&agrave; Nội ph&ecirc; duyệt l&agrave; tổ chức thi 4 b&agrave;i độc lập gồm: To&aacute;n, Ngữ văn, Ngoại ngữ v&agrave; một m&ocirc;n thi kh&aacute;c.</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `list_blog`
--

CREATE TABLE `list_blog` (
  `id` int(10) NOT NULL,
  `ten_danhmuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_blog`
--

INSERT INTO `list_blog` (`id`, `ten_danhmuc`) VALUES
(1, 'Thể Thao'),
(3, 'Xã Hội'),
(4, 'Công Nghệ'),
(5, 'Giáo Dục'),
(6, 'Văn Hóa'),
(7, 'Thời Tiết');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_blog`
--
ALTER TABLE `list_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_detail`
--
ALTER TABLE `blog_detail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `list_blog`
--
ALTER TABLE `list_blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
