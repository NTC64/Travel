-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 11:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `userID` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `hotelName` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`userID`, `username`, `password`, `name`, `role`, `hotelName`, `phone`) VALUES
(1, 'admin', '123', 'Super Admin', '', '', ''),
(2, 'thuong', 'normal', 'Admin', '', '', ''),
(5, 'chung', '123', 'Chung - Name', '', '', ''),
(18, 'admin', '123', 'Chung', 'admin', '1', '1'),
(26, '5', '5', '5', 'user', '', ''),
(28, '6', '6', 'Đây là seller 6', 'seller', '6', '6'),
(29, '7', '7', 'Đây là seller 7', 'seller', '7', '7'),
(55, '2', '2', 'Admin 1', 'superadmin', '', '2'),
(63, 'tinazel', '1234', 'Thuong', 'user', '', ''),
(65, '10', '10', 'Admin Role', 'admin', '', ''),
(66, 'thuong2002', 'thuong2002', 'Nguyen Huu Thuong', 'user', '', ''),
(67, 'superadmin', '123', 'Normal', 'superadmin', '', ''),
(68, 'TDH Hotel', '123', 'Trần Duy Hưng', 'seller', 'Trần Duy Hưng', '0915646736');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(60) NOT NULL,
  `cartPrice` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `note` text NOT NULL,
  `cart_payment` varchar(50) NOT NULL,
  `cartStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `order_code`, `userID`, `tourID`, `fullName`, `phone`, `address`, `cartPrice`, `people`, `startDate`, `endDate`, `note`, `cart_payment`, `cartStatus`) VALUES
(1, 0, 26, 11, 'Huu Thuong', '0915646736', 'Ha Noi', 10000, 1, '2022-12-21', '2022-12-26', 'Đây là note', 'VNPAY', 'Đang chờ xác nhận'),
(7, 447288, 26, 12, '1', '1', '1', 30000, 1, '2022-12-10', '2022-12-11', '1', 'VNPAY', 'Đang chờ xác nhận'),
(9, 573602, 63, 16, 'Ọc ọc', '02314132313', 'Ọc ọc', 2000000, 1, '2022-12-21', '2022-12-24', 'Ọc ọc', 'VNPAY', 'Đang chờ xác nhận'),
(10, 103597, 26, 12, '12312', '321312', '321312312312', 150000, 5, '2022-12-10', '2022-12-11', '231312321312312312', 'VNPAY', 'Đang chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `categoryNews` varchar(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`categoryNews`, `categoryName`) VALUES
('N01', 'Hà Nội'),
('N02', 'Thế giới'),
('N03', 'Thanh Hoá'),
('N04', 'Nha Trang'),
('N05', 'Phú Quốc'),
('N06', 'Trần Duy Hưng');

-- --------------------------------------------------------

--
-- Table structure for table `category_tours`
--

CREATE TABLE `category_tours` (
  `categoryTours` varchar(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tours`
--

INSERT INTO `category_tours` (`categoryTours`, `categoryName`) VALUES
('T01', 'Tour HCM'),
('T02', 'Tour Miền Trung'),
('T03', 'Tour Hà Nội'),
('T04', 'Tour Miền Tây'),
('T05', 'Tour Nha Trang'),
('T06', 'Tour Trần Duy Hưng');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `categoryID` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `uploadID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `userID`, `categoryID`, `title`, `description`, `content`, `uploadID`, `date`) VALUES
(18, 55, 'N01', 'test', 'des', 'content', 20, '2022-11-24'),
(20, 55, 'N01', 'ĂN TỐI TRÊN SÔNG SÀI GÒN: BỮA ĂN TỐI LÃNG MẠN, ẤM ÁP TRÊN TÀU SÀI GÒN CRUISE NGẮM THÀNH PHỐ VỀ ĐÊM. ', 'Có vé VIP', 'Điểm hấp dẫn\r\n– Tàu hoạt động theo mô hình du lịch – nhà hàng mỗi ngày trên sông Sài Gòn tại khu du lịch Tân Cảng - A100 Ung Văn Khiêm, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh\r\n\r\n– Du khách đi du thuyền có thể thưởng thức các món ăn ngon theo sở thích riêng của mình trong khung cảnh lãng mạn.\r\n\r\n– Mỗi tầng là mỗi phong cách nhạc khác nhau. Bên cạnh đó tầng 1 và tầng 2 : Phục vụ các món ăn Việt – Hoa đa dạng phong phú nhạc sống, ảo thuật, múa Hawai. Tầng 3 : Nhà hàng Âu – quầy bar với các loại thức uống cocktail, chương trình nhạc Flamenco, hòa tấu violon, guitar, ảo thuật, thổi sáo.\r\n1. Điều kiện giá vé:\r\n\r\n–  Nhóm dưới 4 khách phụ thu phí lên tàu là 40.000 Vnđ/ khách.\r\n\r\n–  Giá vé áp dụng trên một khách đối với nhóm khách tối thiểu là 02 người trở lên cho một thực đơn tự chọn trước (tàu Saigon), áp dụng với thực đơn từ Menu 01 đến menu 06.\r\n\r\n– Nhóm của Qúy Khách sẽ ngồi bàn ăn riêng biệt, không ngồi chung bàn ăn với nhóm khách khác. \r\n\r\n– Đơn giá áp dụng cho tất cả các ngày kể ngày cả cuối tuần, ngày lễ.\r\n\r\n– Vé đã mua không được hoàn đổi trong mọi trường hợp, trừ những trường hợp bất khả kháng như: thiên tai, hỏa hoạn hoặc tàu không thể hoạt động do điều kiện khách quan.\r\n\r\n2. Gía vé bao gồm:\r\n\r\n– Vé tham quan tàu du lịch nhà hàng tàu Sài Gòn trên Sông Sài Gòn.\r\n\r\n– Ăn uống: Bao gồm bữa ăn tối theo thực đơn (đính kèm trong chương trình bên dưới) + Trà đá miễn phí.\r\n\r\n– Chương trình ca múa nhạc, ảo thuật, múa Hawai phục vụ khách.\r\n\r\n– HDV suốt hành trình\r\n\r\n– Bảo hiểm 10.000.000 Vnd/ Vụ\r\n\r\n3. Gía vé không bao gồm:\r\n\r\n– Nước uống các loại và các thức ăn ngoài thực đơn, các chi phí khác như tiền tip, gửi xe.\r\n\r\n– Thuế giá trị gia tăng VAT\r\n\r\n4. Chính sách trẻ em:\r\n\r\nChính sách trẻ em của tàu Sài Gòn được áp dụng như sau:\r\n\r\n+ Trẻ em từ 1 – 3 tuổi : miễn phí (ăn cùng bố mẹ)\r\n\r\n+ Trẻ em từ 4 tuổi trở lên : tính 1 vé \r\n\r\nChính sách trẻ em của biểu diễn múa rối nước được áp dụng như sau:\r\n\r\n+ Trẻ em và người lớn bằng giá.\r\n\r\n5. Các quy định về thời gian:\r\n\r\n– Tàu khởi hành vào tất cả các ngày trong tuần kể cả chủ nhật và ngày lễ.\r\n\r\n– Thời gian khởi hành:18h30 lên tàu, 20h00 tàu chạy, 21h00 tàu cập bến.\r\n\r\n– Địa điểm đón và trả khách: Bến Số 10B Đường Tôn Đức Thắng, Quận 1, TP. Hồ Chí Minh.\r\n\r\nTÀU SÀI GÒN\r\n\r\nTầng 1: Phục vụ nhạc sống, múa Hawai.\r\n\r\nTầng 2: Phục vụ nhạc sống, múa Hawai.\r\n\r\nTầng 3: Phục vụ nhạc hòa tấu, ghita, thổi sáo, múa Flamenco.\r\nTHÔNG TIN STK CHO KHÁCH HÀNG ĐẶT TOUR\r\n\r\n--------------------------------------------\r\n\r\n1/ NGÂN HÀNG TP Bank\r\nSTK: 03053175701\r\nCTK: CÔNG TY ULSAIT.\r\n\r\n2/ NGÂN HÀNG MB Bank\r\nSTK: 2052028888 \r\nNgân hàng MB Bank Chi Nhánh Hà Nội\r\nCTK: Nguyễn Hữu Thường\r\n\r\n \r\n3/ NGÂN HÀNG Momo\r\nSTK: 0915646736\r\nCTK: Nguyễn Hữu Thường\r\n\r\n\r\nGhi Chú: Quý khách có thể tham khảo thêm chương trình Tour Miền Tây như Tour Cần Thơ, Tour Cà Mau, Tour Châu Đốc..... và nhiều chương trình hấp dẫn khác.', 22, '2022-11-24'),
(21, 55, 'N02', 'Những cổ động viện có gương mặt ấn tượng nhất World Cup 2022', 'World Cup', 'Hàng chục nghìn người hâm mộ đổ về Qatar để tận hưởng không khí lễ hội bóng đá lớn nhất thế giới.\r\nGiới chức Qatar kỳ vọng rằng những con hẻm nhỏ hẹp đặc trưng của khu chợ có tuổi đời hàng thế kỷ này sẽ thu hút các tín đồ túc cầu giáo.\r\n\r\nÔng Abdul Rahman Mohammed Al-Nama, Giám đốc một văn phòng chuyên cung cấp dịch vụ cưỡi ngựa và lạc đà, chia sẻ: “Chắc chắn là sẽ có rất đông người tới đây. Chúng tôi chưa từng được chứng kiến sự kiện nào ở quy mô như thế. Tôi nghĩ rằng nhiều khách du lịch sẽ muốn nhìn thấy những con lạc đà và chụp ảnh với chúng, bởi vì loài vật này không xuất hiện tại châu Âu và Đông Á”.\r\n\r\nĐể chuẩn bị cho ngày hội bóng đá được người dân thế giới mong chờ này, nhà chức trách Qatar đã chi hàng chục tỉ USD để tu bổ và xây mới hệ thống tàu điện ngầm cũng như các cơ sở hạ tầng liên quan, mang lại cho Doha sự lột xác ngoạn mục.\r\n\r\nBên ngoài Doha, nhiều khu nghỉ dưỡng mới cũng đã được xây dựng. Qatar muốn sử dụng World Cup 2022 làm đòn bẩy để thúc đẩy chiến dịch thu hút khách du lịch ở mức trung bình 1,5 triệu người/năm lên 6 triệu người vào năm 2030.', 23, '2022-11-24'),
(22, 55, 'N03', 'test', 'test', 'test', 28, '2022-11-23'),
(23, 55, 'N02', 'Đây là title', 'Description', 'Còn ten 1\r\n\r\nCòn ten 2', 29, '2022-11-01'),
(25, 55, 'N03', 'Thêm lại category', 'Thêm lại category', 'Thêm lại category\r\nThêm lại category\r\nThêm lại category\r\nThêm lại category\r\nThêm lại category\r\nThêm lại category\r\nThêm lại category', 31, '2022-12-03'),
(26, 55, 'N01', 'Review du lịch Hà Đông', 'Hà Đông không đẹp cho lắm', 'Ọc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\nỌc ọc\r\n', 32, '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tourID` int(11) NOT NULL,
  `categoryTours` varchar(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `tourName` varchar(50) NOT NULL,
  `tourPrice` int(11) NOT NULL,
  `tourDescription` text NOT NULL,
  `tourImage` varchar(100) NOT NULL,
  `tourLocation` varchar(50) NOT NULL,
  `tourDate` date NOT NULL,
  `tourTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tourID`, `categoryTours`, `sellerID`, `tourName`, `tourPrice`, `tourDescription`, `tourImage`, `tourLocation`, `tourDate`, `tourTime`) VALUES
(11, 'T03', 29, 'Du lịch Phú Quốc: Cẩm nang từ A đến Z', 10000000, 'Tổng quan du lịch Phú Quốc\r\nPhú Quốc là quần đảo xinh đẹp nằm sâu trong vùng vịnh Thái Lan, thuộc tỉnh Kiên Giang. Ở vùng biển phía Nam của tổ quốc, đảo Ngọc Phú Quốc – hòn đảo lớn nhất của Việt Nam, cũng là đảo lớn nhất trong quần thể 22 đảo tại đây. Nước biển trong vắt, những dòng suối yên bình cùng nhiều hải sản độc đáo chính là lợi thế tuyệt vời của du lịch Phú Quốc.\r\n\r\nLên lịch du lịch Phú Quốc\r\n• Thời điểm đông khách du lịch nhất là từ tháng 4 đến tháng 9.\r\n\r\n• Tuy nhiên, mùa khô (tháng 10 đến tháng 3 năm sau) là thời điểm Phú Quốc đẹp nhất. Nhìn chung bạn có thể yên tâm du lịch Phú Quốc vào bất cứ thời điểm nào trong năm vì nhiệt độ trung bình năm chỉ vào khoảng 28 độ C.\r\n\r\n• Quan trọng nhất là theo dõi dự báo thời tiết để tránh những ngày mưa bão.\r\n\r\nDi chuyển: Phương tiện, di chuyển khi du lịch Phú Quốc\r\nPhương tiện đến Phú Quốc chủ yếu bằng máy bay, tàu cao tốc hay phà. ', 'hehe.jpg', 'Phú Quốc', '2022-12-21', 5),
(12, 'T01', 28, 'Đi tù thôi', 30000, 'Ý tôi là nhà tù Hoả Lò 🐧🐧🐧\r\n\r\nKhông chỉ hấp dẫn trên các trang mạng xã hội, trải nghiệm tại nhà tù Hoả Lò quả thật khiến cho ai cũng phải trầm trồ.\r\n\r\nHai công trình ở Hà Nội vừa “lột xác” ngoạn mục: Nhà Thờ Lớn phục hồi vẻ hoài cổ, một phố đi bộ mới đang cực hot \r\nDu lịch lịch sử lên ngôi, 3 tour chỉ vòng quanh Hà Nội nhưng luôn kín người đặt chỗ: Không gian trải nghiệm quá khứ ám ảnh siêu thực \r\n\r\nThời gian gần đây, hoạt động tham quan nhà tù Hoả Lò trở nên hot hơn hẳn, thu hút đông đảo du khách, nhất là các bạn trẻ. Vẫn phải công nhận rằng, những nội dung \"chất lừ\" do đội ngũ admin Fanpage của nhà tù Hoả Lò sáng tạo là lý do khiến người xem thích thú hơn, mong muốn được đến Hoả Lò hơn. Thế nhưng bên cạnh đó, không thể phủ nhận rằng tham quan tận nơi mới là điều hấp dẫn nhất, bởi chỉ nghe review của một vài bạn trẻ thôi, nhiều người khác đã \"đứng ngồi không yên\", muốn đến ngay địa điểm này để được trực tiếp trải nghiệm những điều thú vị.\r\n\r\nVà quả thật là bõ công bởi những gì mà nhà tù Hoả Lò đã mang lại!\r\n\r\nNhà tù Hoả Lò nằm tại số 1 phố Hoả Lò, một vị trí trung tâm ngay giữa lòng Hà Nội. Thật ra trước đó, nơi này cũng đã thu hút rất nhiều du khách đến tham quan, bao gồm cả những vị khách đến từ các tỉnh thành khác và cả du khách nước ngoài. Thế nhưng trong khoảng 2 năm trở lại đây, địa điểm này mới thật sự được lan truyền rộng rãi trên các phương tiện truyền thông, theo một cách thật khác, khiến bất cứ ai cũng tò mò mà muốn xách balo lên và đi ít nhất 1 lần.\r\n\r\nTạm không bàn đến những câu chuyện \"sởn gai ốc\" hay bề dày lịch sử của nhà tù Hoả Lò ở bài viết này, bởi đó là những điều mà bạn nên trải nghiệm trực tiếp. Hãy nghe những review chân thực nhất của một bạn trẻ lần đầu đến trải nghiệm tại nhà tù Hoả Lò, để biết vì sao địa điểm này ngày càng hot đối với giới trẻ. \r\n\r\nThời gian gần đây, hoạt động tham quan nhà tù Hoả Lò trở nên hot hơn hẳn, thu hút đông đảo du khách, nhất là các bạn trẻ. Vẫn phải công nhận rằng, những nội dung \"chất lừ\" do đội ngũ admin Fanpage của nhà tù Hoả Lò sáng tạo là lý do khiến người xem thích thú hơn, mong muốn được đến Hoả Lò hơn. Thế nhưng bên cạnh đó, không thể phủ nhận rằng tham quan tận nơi mới là điều hấp dẫn nhất, bởi chỉ nghe review của một vài bạn trẻ thôi, nhiều người khác đã \"đứng ngồi không yên\", muốn đến ngay địa điểm này để được trực tiếp trải nghiệm những điều thú vị.\r\n\r\nVà quả thật là bõ công bởi những gì mà nhà tù Hoả Lò đã mang lại!\r\n\r\nTrọn vẹn trải nghiệm tham quan nhà tù Hoả Lò đầy ấn tượng, lý giải vì sao lại thu hút nhiều người đến vậy\r\n\r\nNhà tù Hoả Lò nằm tại số 1 phố Hoả Lò, một vị trí trung tâm ngay giữa lòng Hà Nội. Thật ra trước đó, nơi này cũng đã thu hút rất nhiều du khách đến tham quan, bao gồm cả những vị khách đến từ các tỉnh thành khác và cả du khách nước ngoài. Thế nhưng trong khoảng 2 năm trở lại đây, địa điểm này mới thật sự được lan truyền rộng rãi trên các phương tiện truyền thông, theo một cách thật khác, khiến bất cứ ai cũng tò mò mà muốn xách balo lên và đi ít nhất 1 lần.\r\n\r\nTạm không bàn đến những câu chuyện \"sởn gai ốc\" hay bề dày lịch sử của nhà tù Hoả Lò ở bài viết này, bởi đó là những điều mà bạn nên trải nghiệm trực tiếp. Hãy nghe những review chân thực nhất của một bạn trẻ lần đầu đến trải nghiệm tại nhà tù Hoả Lò, để biết vì sao địa điểm này ngày càng hot đối với giới trẻ. \r\n\r\nNhà tù Hoả Lò\r\n\r\nĐịa chỉ: Số 1 phố Hoả Lò, Hoàn Kiếm, Hà Nội\r\n\r\nThời gian mở cửa: 8h - 17h hàng ngày\r\n\r\nCác chương trình tham quan khác sẽ có các khung giờ khác, tuỳ thuộc sự sắp xếp của BTC.\r\n\r\nĐến nhà tù Hoả Lò vào một buổi sáng giữa tuần, thật bất ngờ khi lượng khách đến đây lại rất đông, đủ để thấy được độ hot của địa điểm này. Bên cạnh một số nhóm du khách đến từ các tỉnh khác, đa số còn lại đều là các bạn học sinh, sinh viên ở Hà Nội rủ nhau đi trải nghiệm.\r\n\r\nNgay bên ngoài nhà tù là khu vực bán vé và bãi gửi xe miễn phí. Giá vé tham quan hàng ngày là 30k/người, trừ những trường hợp đặc biệt khác sẽ được giảm giá hoặc miễn phí vé vào.\r\n\r\nSau khi mua vé xong, lại tiếp tục có các nhân viên hướng dẫn vô cùng nhiệt tình. Trước khi bắt đầu hành trình tham quan, bạn có thể thuê những chiếc bộ đàm có tai nghe để nghe thuyết minh chi tiết ở từng phòng, từng khu vực... Dù ở mỗi phòng, mỗi vật trưng bày đều đã có những tấm biển ghi thông tin, thế nhưng phải công nhận rằng việc được nghe thuyết minh chi tiết khiến cho hành trình đi nhà tù Hoả Lò trở nên vô cùng lý thú. Bởi bên cạnh những thông tin về từng nhân vật lịch sử, đồ vật trưng bày, từng khu vực hay căn phòng thì còn cả trích dẫn lời kể của những nhân vật từng ở trong nhà tù này, khiến cho mọi thứ trở nên vô cùng sống động. \r\n\r\nHành trình tham quan bắt đầu sau tấm bảng chỉ dẫn, đưa các vị khách vào khu vực trưng bày đầu tiên. Rồi cứ thế, dòng người nối đuôi nhau đi đến từng khu vực, mọi thứ dần hiện lên một cách chân thực hơn khi ánh sáng tối dần và gần như chỉ còn le lói bên trong ngục tối.\r\n\r\nNếu như trước đó chúng ta chỉ có hình dung về nhà tù trong tưởng tượng, hay qua truyện, qua phim thì việc đi trực tiếp vào bên trong nhà tù Hoả Lò với thứ ánh sáng yếu ớt, vô cùng chân thực như thế này mới thật sự là trải nghiệm ấn tượng nhất. Từ những khu vực giam giữ tù nhân nam, tù nhân nữ, cho đến ngục tối, nơi giam giữ tử tù cho đến các vật dụng như quần áo của tù nhân, những vật dụng đựng đồ ăn, đồ uống đều được trưng bày, mang đến một hình dung rất rõ nét về cuộc sống bên trong nhà tù Hoả Lò.', 'hoalo.jpg', 'Hoả Lò', '2022-12-10', 1),
(16, 'T01', 28, 'Du lịch miền Trung mùa mưa bão', 2000000, 'Ọc ọc ọc ...... 😀\r\nCứuuuuu', 'ococ.jpg', 'Thanh Hoá', '2022-12-21', 3),
(17, 'T05', 29, 'Du lịch Nha Trang tự túc SIÊU TIẾT KIỆM ', 5000000, 'Du lịch Nha Trang tự túc cần chuẩn bị những gì? Chi phí bao nhiêu? Đi lại như thế nào? Có đặc sản gì ngon? Tất cả sẽ được review chi tiết từ A - Z trong bài viết dưới đây cùng gợi ý lịch trình du lịch Nha Trang tự túc cho bạn.\r\n\r\nBạn đang lên kế hoạch cho chuyến du lịch Nha Trang tự túc của mình nhưng lại loay hoay chưa biết nên bắt đầu từ đâu? Vậy hãy cùng khám phá ngay bí kíp du lịch Nha Trang tự túc SIÊU TIẾT KIỆM sau đây để chuẩn bị tốt nhất cho chuyến đi sắp tới nhé!\r\n\r\nLet’s go!!!\r\n\r\n1. Du lịch Nha Trang mùa nào đẹp nhất?\r\nTheo kinh nghiệm du lịch Nha Trang tự túc của nhiều du khách, thời gian lý tưởng nhất để đến thành phố biển là từ giữa tháng 3 đến tháng 8. Tuy nhiên, do thuộc phía Nam miền Trung nên Nha Trang có khí hậu cực kì ôn hòa để bạn có thể đi du lịch hầu như mọi thời điểm trong năm. Thời tiết Nha Trang được chia làm 2 mùa rõ rệt:\r\n\r\n1.1. Du lịch Nha Trang mùa khô\r\nTừ tháng 1 đến tháng 8 hằng năm là mùa khô ở Nha Trang. Mặc dù là mùa nắng nhưng cái nắng ở Nha Trang lại không gay gắt như ở miền Bắc hay Bắc Trung Bộ nên thời tiết vào tầm này rất dễ chịu, phù hợp cho các hoạt động du lịch, vui chơi, nghỉ dưỡng. Tháng 4 đến tháng 8 là các tháng du lịch cao điểm, bạn nên chuẩn bị thật kĩ khi đi vào những tháng này nếu không muốn gặp tình trạng “sold out” phòng khách sạn, vé, dịch vụ các điểm vui chơi.\r\n\r\n1.2. Du lịch Nha Trang mùa mưa\r\nMùa mưa Nha Trang kéo dài từ tháng 9 đến tháng 12 hằng năm, đặc biệt mưa nhiều vào tháng 10 và 11. Nếu bạn có kế hoạch du lịch trong khoảng thời gian này thì hãy nhớ cập nhật tình hình dự báo thời tiết thường xuyên nhé.\r\n\r\nCó một điều đặc biệt bạn không nên bỏ lỡ chính là 2 lễ hội lớn nhất trong năm tại Nha Trang: Lễ hội Tháp Bà (20 – 23/3 âm lịch hàng năm) và Festival biển Nha Trang được tổ chức vào mùa hè của các năm lẻ. \r\n\r\n2. Kinh nghiệm di chuyển đến Nha Trang  \r\n2.1. Phương tiện di chuyển đến Nha Trang\r\nMáy bay\r\n\r\nHiện nay có rất nhiều hãng hàng không có đường bay từ Hà Nội và thành phố Hồ Chí Minh đến sân bay Cam Ranh. Với lựa chọn này bạn chỉ mất 1-2h đồng hồ là đến được Nha Trang, tiết kiệm được rất nhiều thời gian.\r\n\r\nTừ sân bay Cam Ranh tới trung tâm thành phố Nha Trang khoảng 35km nên để tiết kiệm chi phí, bạn có thể đi xe bus đỗ ngay tại cổng sân bay để tới trung tâm thành phố hoặc đi taxi, đặt dịch vụ xe đưa đón sân bay của Vinpearl nếu du lịch Nha Trang theo nhóm đông.\r\n\r\nGiá tham khảo:\r\n\r\n          + Giá vé máy bay từ Hà Nội tới Nha Trang dao động từ 850.000 - 2.000.000 VNĐ/1 chiều và từ 1.500.000 - 3.200.000 VNĐ/khứ hồi.\r\n          + Giá vé máy bay từ Sài Gòn đi Nha Trang dao động từ 400.000 - 1.300.00 VNĐ/1 chiều và từ 600.000 - 2.000.000 VNĐ/khứ hồi.\r\n\r\nDu lịch Nha Trang tự túc không mua theo tour hoặc combo bạn có thể chủ động săn vé từ sớm vài tháng đến nửa năm, tranh thủ các dịp ưu đãi của nhiều hãng hàng không để mua được vé rẻ, thậm chí là vé 0đ.\r\n\r\nXe khách\r\n\r\nNếu bạn chọn xe khách đi Nha Trang từ Hà Nội, bạn sẽ phải mất nguyên 1 ngày đêm (khoảng 26 tiếng) để đến được thành phố. Còn từ thành phố Hồ Chí Minh sẽ “nhẹ nhàng” hơn là chỉ mất từ 7-8 tiếng thôi.\r\n\r\nVậy nên nếu bạn ở Hà Nội thì mình khuyên là nên lựa chọn máy bay hoặc tàu hỏa để tiết kiệm thời gian. Từ Sài Gòn thì xe khởi hành vào ban đêm nên bạn chỉ cần ngủ một giấc ngon lành là sáng mai đã có mặt tại thành phố biển Nha Trang xinh đẹp rồi.\r\n\r\nGiá tham khảo:\r\n\r\n          + Giá xe khách giường nằm từ Hà Nội đến Nha Trang: 500.000 - 620.000 VNĐ/chiều/giường\r\n          + Giá xe khách giường nằm từ Sài Gòn đi Nha Trang: 170.000 - 230.000 VNĐ/chiều/giường', 'nhatrang.jpg', 'Nha Trang', '2022-12-25', 3),
(18, 'T06', 28, 'Trần Duy Hưng - Con đường không ngủ', 5000000, 'Gái TDH rất xinh, mỗi tội hơi chảnh vì tôi chưa gặp bao giờ \r\nGái TDH rất xinh, mỗi tội hơi chảnh vì tôi chưa gặp bao giờ \r\nGái TDH rất xinh, mỗi tội hơi chảnh vì tôi chưa gặp bao giờ \r\nCái gì quan trọng phải nói 3 lần', 'tdh.jpg', 'Trung Hoà - Cầu Giấy - Hà Lội', '2022-12-13', 1),
(19, 'T01', 68, 'Trần Duy Hưng', 500000, 'Đây là điểm ăn chơi có tiếng của dân Hà Nội 1\r\nTôi là Hà Nội 2 nên méo biết gì', 'lmao.png', 'Ha Noi', '2022-12-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `uploadID` int(11) NOT NULL,
  `resources` text NOT NULL,
  `resourcesDescrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`uploadID`, `resources`, `resourcesDescrip`) VALUES
(20, 'Mr Bean Waiting Meme.mp4', ''),
(22, 'asrm.mp4', ''),
(23, '10minute.mp4', ''),
(28, 'asrm1.mp4', ''),
(29, 'asrm2.mp4', ''),
(31, 'VID20201225163442 (1).mp4', ''),
(32, 'phanh.mp4', '');

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL,
  `bankcode` varchar(50) NOT NULL,
  `banktranno` varchar(50) NOT NULL,
  `cardtype` varchar(10) NOT NULL,
  `orderinfor` varchar(200) NOT NULL,
  `paydate` varchar(100) NOT NULL,
  `tmncode` varchar(50) NOT NULL,
  `transaction_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vnpay`
--

INSERT INTO `vnpay` (`id_vnpay`, `price`, `code_cart`, `bankcode`, `banktranno`, `cardtype`, `orderinfor`, `paydate`, `tmncode`, `transaction_no`) VALUES
(1, '3000000', '447288', 'NCB', 'VNP13895593', 'ATM', 'Thanh toán đơn hàng 447288 tại website của ULSA IT ', '20221206050111', 'KND9C4V3', 13895593),
(2, '200000000', '573602', 'NCB', 'VNP13895594', 'ATM', 'Thanh toán đơn hàng 573602 tại website của ULSA IT ', '20221206050746', 'KND9C4V3', 13895594),
(3, '15000000', '103597', 'NCB', 'VNP13895595', 'ATM', 'Thanh toán đơn hàng 103597 tại website của ULSA IT ', '20221206051450', 'KND9C4V3', 13895595);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `FK_cart_tour` (`tourID`),
  ADD KEY `FK_cart_access` (`userID`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`categoryNews`);

--
-- Indexes for table `category_tours`
--
ALTER TABLE `category_tours`
  ADD PRIMARY KEY (`categoryTours`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`),
  ADD KEY `FK_news_uploads` (`uploadID`),
  ADD KEY `FK_news_access` (`userID`),
  ADD KEY `FK_news_category` (`categoryID`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tourID`),
  ADD KEY `FK_tours_category` (`categoryTours`),
  ADD KEY `FK_tours_access` (`sellerID`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`uploadID`);

--
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_access` FOREIGN KEY (`userID`) REFERENCES `access` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_tour` FOREIGN KEY (`tourID`) REFERENCES `tours` (`tourID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_access` FOREIGN KEY (`userID`) REFERENCES `access` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_category` FOREIGN KEY (`categoryID`) REFERENCES `category_news` (`categoryNews`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_uploads` FOREIGN KEY (`uploadID`) REFERENCES `uploads` (`uploadID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `FK_tours_access` FOREIGN KEY (`sellerID`) REFERENCES `access` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tours_category` FOREIGN KEY (`categoryTours`) REFERENCES `category_tours` (`categoryTours`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
