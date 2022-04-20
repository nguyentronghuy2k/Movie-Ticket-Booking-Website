-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2020 lúc 07:23 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlicinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookve`
--

CREATE TABLE `bookve` (
  `username_KH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenrap` varchar(40) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `tenphim` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaychieu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `giochieu` varchar(20) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `giave` int(11) NOT NULL,
  `giacombo` int(11) NOT NULL,
  `tonggia` int(11) NOT NULL,
  `ghe` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookve`
--

INSERT INTO `bookve` (`username_KH`, `tenrap`, `tenphim`, `ngaychieu`, `giochieu`, `giave`, `giacombo`, `tonggia`, `ghe`) VALUES
('minh111', 'CGV Aeon Bình Tân', 'VÌ ANH VẪN TIN', '2/6', '21:25', 100000, 55000, 155000, 'B2 B3'),
('minh111', 'CGV Aeon Bình Tân', 'VÌ ANH VẪN TIN', '2/6', '21:25', 100000, 55000, 155000, 'C4 D5'),
('minh111', 'CGV Celadon Tân Phú', 'BLOODSHOT', '1/6', '15:25', 200000, 55000, 255000, 'A1 A2'),
('minh111', 'CGV Celadon Tân Phú', 'BLOODSHOT', '1/6', '20:25', 400000, 180000, 580000, 'A1 A2 A3'),
('minh111', 'CGV Crescent Mall', 'VÌ ANH VẪN TIN', '3/6', '14:25', 200000, 60000, 260000, 'A1'),
('minh111', 'CGV CT Plaza', 'BLOODSHOT', '5/6', '9:30', 1000000, 300000, 1300000, 'A1 A2 A3 A4 A5'),
('minh111', 'CGV Paragon', 'NẮNG 3: LỜI HỨA CỦA CHA', '2/6', '15:25', 1000000, 600000, 1600000, 'C2 C3'),
('minh111', 'CGV Paragon', 'VÌ ANH VẪN TIN', '2/6', '14:25', 400000, 240000, 640000, 'C2 C3'),
('minh111', 'CGV Vincom Đồng Khởi', 'TRUY TÌM PHÉP THUẬT', '3/6', '15:45', 600000, 440000, 1040000, 'A3 C3 D3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chieuphim`
--

CREATE TABLE `chieuphim` (
  `maphim` int(11) NOT NULL,
  `tenrap` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ngaychieu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `giochieu` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chieuphim`
--

INSERT INTO `chieuphim` (`maphim`, `tenrap`, `ngaychieu`, `giochieu`) VALUES
(1, 'CGV Aeon Bình Tân', '1/6', '16:25'),
(1, 'CGV Celadon Tân Phú', '1/6', '15:25'),
(1, 'CGV Celadon Tân Phú', '1/6', '20:25'),
(1, 'CGV CT Plaza', '1/6', '17:25'),
(1, 'CGV Gò Vấp', '5/6', '9:30'),
(2, 'CGV Aeon Bình Tân', '2/6', '21:25'),
(2, 'CGV Crescent Mall', '3/6', '14:25'),
(2, 'CGV Paragon', '2/6', '17:25'),
(3, 'CGV Paragon', '3/6', '21:25'),
(3, 'CGV Vincom Đồng Khởi', '3/6', '15:45'),
(4, 'CGV Celadon Tân Phú', '2/6', '14:30'),
(4, 'CGV Hùng Vương Plaza', '2/6', '21:25'),
(4, 'CGV Paragon', '2/6', '15:25'),
(5, 'CGV Celadon Tân Phú', '2/6', '14:30'),
(5, 'CGV Hùng Vương Plaza', '3/6', '16:30'),
(5, 'CGV Leberty Citypoint', '3/6', '14:30'),
(5, 'CGV Saigonres Nguyễn Xí', '3/6', '15:30'),
(5, 'CGV Thảo Điền Pearl', '4/6', '21:00'),
(6, 'CGV CT Plaza', '4/6', '17:25'),
(6, 'CGV Gò Vấp', '4/6', '21:25'),
(7, 'CGV Crescent Mall', '4/6', '15:50'),
(7, 'CGV Hùng Vương Plaza', '7/6', '15:25'),
(7, 'CGV Pandora City', '6/6', '20:30'),
(8, 'CGV Celadon Tân Phú', '7/6', '15:45'),
(8, 'CGV Crescent Mall', '3/6', '21:00'),
(8, 'CGV Golden Plaza', '2/6', '14:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `TenKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `GioiTinh` varchar(3) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `username_KH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password_KH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`TenKH`, `GioiTinh`, `username_KH`, `password_KH`, `Email`, `phone`) VALUES
('Nguyễn Trọng Huy', 'Nam', 'huydeptrai123', '123456', 'huy@gmail.com', '0366733214'),
('Nguyễn Nhựt Minh', 'Nam', 'minh111', '123456', 'nguyennhutminh1258@gmail.com', '0338633175'),
('Nguyễn Thanh An', 'Nam', 'thanhan123', '123456', 'thanhan@gmail.com', '0375566345'),
('Trần Minh Tuấn', 'Nam', 'tuanteo123', '123456', 'minhtuan@gmail.com', '0335566823');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `id` int(5) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`) VALUES
('MN001', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `maphim` int(11) NOT NULL,
  `tenphim` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `daodien` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `dienvien` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `theloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `thoiluong` int(11) NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Trailer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` varchar(1024) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `khoichieu` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(20) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`maphim`, `tenphim`, `daodien`, `dienvien`, `theloai`, `thoiluong`, `hinhanh`, `Trailer`, `chitiet`, `khoichieu`, `trangthai`) VALUES
(1, 'BLOODSHOT', 'Dave Wilson', 'Vin Diesel, Eiza González, Jóhannes Haukur Jóhannesson, Michael Sheen, Toby Kebbell', 'Hành Động', 110, 'images/bloodshot.jpg', 'TP6MkGUZMQI', 'Ray Garrison là một sĩ quan cấp cao đã hy sinh trong một trận chiến. Thế nhưng, anh được tái sinh bằng công nghệ cao, giúp Ray sở hữu sức mạnh siêu nhiên và khả năng phục hồi nhanh chóng. Vận dụng những kỹ năng mới, anh săn lùng gã đàn ông đã giết vợ mình. Thế nhưng, khi sự thật dần hé mở, Ray nhận ra rằng không phải mọi thứ đều đáng tin. Ngay cả chính bản thân anh.', '13/03/2020', 'Đang Chiếu'),
(2, 'VÌ ANH VẪN TIN', 'Andrew Erwin, Jon Erwin', 'KJ Apa, Britt Robertson, Melissa Roxburgh, Shania Twain, Gary Sinise', 'Tình cảm', 117, 'images/i-still-believe-1.jpg', 'lidO3bXELzU', 'VÌ ANH VẪN TIN là bản tình ca ngọt ngào nhưng cũng thấm đượm nước mắt dựa trên cuốn hồi ký cùng tên của ca sĩ, nhạc sĩ người Mỹ Jeremy Camp. Phim kể về chính anh và Melissa Lynn Henning-Camp - người con gái mình yêu, người vợ và cũng là một trong những người có ảnh hưởng lớn nhất tới âm nhạc và cuộc đời của Jeremy từ lúc hai người gặp gỡ, kết hôn rồi đồng hành cùng nhau chiến đấu với căn bệnh ung thư đang dần cướp đi sinh mạng của Melissa.', '13/03/2020', 'Đang Chiếu'),
(3, 'TRUY TÌM PHÉP THUẬT', 'Dan Scanlon', '', 'Hoạt Hình, Phiêu Lưu', 103, 'images/onward.jpg', 'HUCQcJPwzjM', 'Lấy bối cảnh vùng ngoại ô ở một thế giới thần tiên, hai anh em yêu tinh tuổi teen, Ian và Barley Lightfoot, cùng nhau tham gia vào một chuyến hành trình đi tìm chút phép thuật còn sót lại trên thế giới để có được một ngày gặp lại người cha thân yêu quá cố của mình.', '06/03/2020', 'Đang Chiếu'),
(4, 'NẮNG 3: LỜI HỨA CỦA CHA', 'Đồng Đăng Giao', 'Kiều Minh Tuấn, Khả Như, Oanh Kiều, Ngân Chi, Hữu Châu', 'Hài, Tâm Lý', 109, 'images/nang3.jpg', 'qcqBpcf_hgo', 'Lời Hứa Của Cha kể về cuộc sống của 2 mẹ con lừa đảo Quế Phương ( Khả Như ) và bé Hồng Ân ( Ngân Chi). Mọi thứ trở nên đảo lộn khi 2 mẹ con vô tình lừa phải bác sĩ Tùng Sơn ( Kiều Minh Tuấn ), người có khả năng là cha mà bé Hồng Ân bấy lâu đang tìm kiếm. Hành trình chinh phục người cha bất đắc dĩ của 2 mẹ con không hề suôn sẻ khi gặp phải chướng ngại đáng gờm là Thùy Linh (Oanh Kiều), người yêu hiện tại của Sơn. Số phận nghiệt ngã còn trêu đùa và thử thách tình cha con hơn nữa khi đặt Hồng Ân vào tình huống hiểm nghèo.', '06/03/2020', 'Đang Chiếu'),
(5, 'KẺ VÔ HÌNH', 'Leigh Whannell', 'Elisabeth Moss, Oliver Jackson-Cohen, Storm Reid', 'Khoa Học Viễn Tưởng, Kinh Dị', 125, 'images/ke-vo-hinh.jpg', 'zWztOTVPq4c', 'Kẻ Vô Hình xoay quanh Cecilia Kass - cô gái bị mắc kẹt trong mối quan hệ đầy kiểm soát và bạo lực với khoa học gia tài năng và giàu có tên Adrian Griffin.', '28/02/2020', 'Đang Chiếu'),
(6, 'CĂN HỘ CỦA QUỶ', 'Albert Pintó', 'María Ballesteros; Javier Botet; Sergio Castellanos; José Luis De Madariaga', 'Kinh Dị', 102, 'images/can-ho-cua-quy.jpg', 'ygz_7Udu6f4', 'Dựa trên sự kiện cho thật về ngôi nhà bị quỷ ám trên con phố Malasana, thủ đô Madrid vào những năm 70. Bộ phim xoay quanh gia đình Olmedo khi họ vừa rời vùng quê lên thành phố với hy vọng đổi đời. Tuy nhiên, trong căn nhà này còn tồn tại một thế lực kì bí khác. Mọi thành viên trong gia đình bị hàng loạt hiện tượng kỳ lạ ám ảnh. Liệu chủ nhân cũ của căn nhà có liên quan gì tới cơn ác mộng này?', '06/03/2020', 'Đang Chiếu'),
(7, 'LOẠN NHỊP', 'Jade Bunyoprakarn', 'Ken Theeradeth Wongpuapan, Manasaporn Chanchalerm', 'Tình cảm', 115, 'images/loan-nhip.png', 'NOvdN9W9Rgw', 'Điển trai, độc thân và kỹ lưỡng trong lối sống, Chai là hình tượng “sugar daddy” điển hình bên ngoài ấm áp bên trong trưởng thành. Cuộc gặp gỡ vô cùng bất ngờ và định mệnh với cô gái 9x - Whan đã khiến ông chú thập niên 90s thoát ra khỏi cuộc sống đơn sắc trước đây khi cả hai chợt nhận ra rằng, trái tim họ đang ngày càng loạn nhịp vì nhau.', '13/03/2020', 'Đang Chiếu'),
(8, 'DẤU ẤN VÔ CỰC', 'Harold Holscher', 'Inge Beckmann, Keita Luna, Garth Breytenbach', 'Kinh Dị', 98, 'images/dau-an-vo-cuc.jpg', 'sdkUce1q-n4', 'Sau khi bị phá sản gia đình William trở về nông trại được thừa kế. Ở đây, cô con gái nhỏ Marry trò chuyện được với linh hồn bí ẩn... Moi điều kỳ lạ bắt đầu xảy ra... Liệu linh hồn kia là thiên thần hay ác quỷ? Dấu ấn có ý nghĩa gì khi xuất hiện...', '13/03/2020', 'Sắp Chiếu'),
(9, 'NHÍM SONIC', 'Jeff Fowler', 'Ben Schwartz, James Marsden, Jim Carrey, Tika Sumpter, Lee Majdoub', 'Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu', 99, 'images/sonic.jpg', 'MmZ_aWdT4_g', 'Bộ phim live-action về chuyến phiêu lưu đầy mạo hiểm, gay cấn cũng không kém phần vui nhộn của chú nhím Sonic nổi tiếng tại Trái Đất.', '21/02/2020', 'Sắp Chiếu'),
(10, 'ÁC MỘNG BÊN HỒ', 'Nini Bull Robsahm', 'Iben Akerlie, Jacob Andersen Schøyen, Jonathan Harboe, Sophia Lie, Elias Munk', 'Kinh Dị', 90, 'images/ac-mong-ben-ho.jpg', 'rRzGVnJOovo', 'Được chuyển thể từ tiểu thuyết kinh dị kinh điển cùng của nhà văn người Na Uy - André Bjerke, “Ác mộng bên hồ” (Lake of Death) có nội dung về một nhóm bạn đi nghỉ ở bên hồ. Nhân vật chính của phim là Lillian – cô gái có người anh trai sinh đôi là Bjørn – qua đời một cách bí ẩn trong căn nhà nghỉ dưỡng của gia đình. Một năm sau, Lillian cùng những người bạn tới căn nhà bên hồ để tưởng nhớ người anh trai xấu số, đồng thời tận hưởng kỳ nghỉ dưỡng gần với thiên nhiên biệt lập với thế giới bên ngoài. Khi những cơn ác mộng của Lillian dần bị xóa nhòa thì đột nhiên, một người trong nhóm bạn bị sát hại sau khi bơi dưới hồ. Tất cả phải tự mình tìm cách chiến đấu với một thế lực bí ẩn nằm sâu dưới đáy hồ để sinh tồn khi bị cắt đứt mọi liên lạc với thế giới bên ngoài.', '06/03/2020', 'Sắp Chiếu'),
(11, 'BÀ HOÀNG NÓI DỐI', 'Chang You-jeong', 'Ra Mi Ran, Na Moon Hee, Kim Mu Yeol', 'Hài', 105, 'images/ba-hoang-noi-doi.jpg', 'DMTVg0QtCUg', 'Bộ phim xoay quanh câu chuyện của nữ nghị sĩ Joo Sang Sook với khả năng nói dối “như cơm bữa”, nhờ đó bà gặt hái được rất nhiều thành công trong sự nghiệp chính trị. Đột nhiên một ngày nọ, bà Joo không thể nói dối được nữa. Sự việc trở nên hết sức nguy cấp khi ngày tranh cử đã gần kề, liệu Joo Sang Sook có thành công đắc cử lần thứ tư hay không khi mọi lời bà nói ra đều là sự thật nghiệt ngã?', '15/05/2020', 'Sắp Chiếu'),
(12, 'THÁNG NĂM RỰC RỠ', 'Nguyễn Quang Dũng', 'Hồng Ánh - Hoàng Yến Chibi, Thanh Hằng - Hoàng Oanh, Jun Vũ, Mỹ Uyên - Khổng Tú Quỳnh, Mỹ Duyên - Trịnh Thảo, Minh Tuyền - Minh Thảo', 'Hài, Tâm Lý', 118, 'images/thang-nam-ruc-ro.jpg', 'xoss0N9txWI', 'THÁNG NĂM RỰC RỠ là câu chuyện về tình bạn, về thời tuổi trẻ cuồng nhiệt của một nhóm bạn gái thời trung học. Bộ phim là hành trình đi tìm lại những ký ức thanh xuân của Hiểu Phương (Hồng Ánh) và nhóm nữ quái Ngựa Hoang. Tình cờ gặp lại người bạn cũ Mỹ Dung (Thanh Hằng) và cũng là trưởng nhóm Ngựa Hoang, Hiểu Phương đau xót khi biết bạn đang mắc bệnh hiểm nghèo. Để thực hiện tâm nguyện của bạn thân, Hiểu Phương quyết tâm tìm lại các thành viên của nhóm Ngựa Hoang. Hành trình đi tìm những người bạn cũ cũng chính là hành trình để Hiểu Phương trở về với những “THÁNG NĂM RỰC RỠ” của cuộc đời mình.', '09/03/2018', 'Sắp Chiếu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rap`
--

CREATE TABLE `rap` (
  `marap` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tenrap` varchar(40) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rap`
--

INSERT INTO `rap` (`marap`, `tenrap`, `diachi`) VALUES
('RAP001', 'CGV Aeon Bình Tân', 'Tầng 3, Trung tâm thương mại Aeon Mall Bình Tân, Số 1 đường số 17A, khu phố 11, phường Bình Trị Đông'),
('RAP002', 'CGV Celadon Tân Phú', 'Lầu 3, Aeon Mall 30 Bờ Bao Tân Thắng, Sơn Kỳ, Tân Phú, Hồ Chí Minh'),
('RAP003', 'CGV Crescent Mall', 'Lầu 5, Crescent Mall Đại lộ Nguyễn Văn Linh, Phú Mỹ Hưng, Quận 7, Hồ Chí Minh'),
('RAP004', 'CGV CT Plaza', '60A Trường Sơn, Phường 2, Tân Bình, Hồ Chí Minh'),
('RAP005', 'CGV Gò Vấp', 'Tầng 5 TTTM Vincom Plaza Gò Vấp, 12 Phan Văn Trị, Phường 7, Quận Gò Vấp'),
('RAP006', 'CGV Golden Plaza', 'Tầng 4, Trung tâm thương mại Golden Plaza, 922 Nguyễn Trãi, P.14, Q. 5, TP.HCM'),
('RAP007', 'CGV Hùng Vương Plaza', 'Tầng 7, Hùng Vương Plaza 126 Hùng Vương,Quận 5, Hồ Chí Minh'),
('RAP008', 'CGV Leberty Citypoint', 'Tầng M - 1, khách sạn Liberty Center Saigon Citypoint 59 - 61 Pateur, Quận 1, Hồ Chí Minh'),
('RAP009', 'CGV Pandora City', 'Lầu 3, Pandora City 1/1 Trường Chinh,Tân Phú, Hồ Chí Minh'),
('RAP010', 'CGV Paragon', '03 Nguyễn Lương Bằng, Quận 7, TP. HCM'),
('RAP011', 'CGV Pearl Plaza', 'Tầng 5, Pearl Plaza, 561A Điện Biên Phủ, P.25, Q.Bình Thạnh, TP.HCM'),
('RAP012', 'CGV Saigonres Nguyễn Xí', 'Tầng 4-5, Saigonres Plaza, 79/81 Nguyễn Xí, P 26, Q Bình Thạnh'),
('RAP013', 'CGV Thảo Điền Pearl', 'Tầng 2, Thảo Điền Mall 12 Quốc Hương, Thảo Điền, Quận 2, Hồ Chí Minh'),
('RAP014', 'CGV Vincom Đồng Khởi', 'Tầng 3, TTTM Vincom Center B, 72 Lê Thánh Tôn, Phường Bến Nghé, Quận 1, Hồ Chí Minh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookve`
--
ALTER TABLE `bookve`
  ADD PRIMARY KEY (`tenrap`,`tenphim`,`ngaychieu`,`giochieu`,`ghe`);

--
-- Chỉ mục cho bảng `chieuphim`
--
ALTER TABLE `chieuphim`
  ADD PRIMARY KEY (`maphim`,`tenrap`,`ngaychieu`,`giochieu`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`username_KH`),
  ADD UNIQUE KEY `username_KH` (`username_KH`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique` (`username`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`maphim`);

--
-- Chỉ mục cho bảng `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`marap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
