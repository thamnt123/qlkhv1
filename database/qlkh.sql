-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2018 lúc 05:37 PM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlkh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bomon`
--

CREATE TABLE `tbl_bomon` (
  `pk_mabomon_id` int(11) NOT NULL,
  `c_tenbomon` varchar(500) NOT NULL,
  `c_truongbomon` varchar(500) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_bomon`
--

INSERT INTO `tbl_bomon` (`pk_mabomon_id`, `c_tenbomon`, `c_truongbomon`, `fk_user_id`) VALUES
(57, 'Ngôn ngữ Anh', 'Nguyễn Văn B', 0),
(58, 'Ngôn ngữ Nhật', 'Nguyễn Văn C', 0),
(59, 'Bộ môn Toán', 'Ngô Thanh Nga', 86),
(61, 'Bộ môn Tin', 'Nguyễn Văn A', 77),
(63, 'Kinh tế quản lý', 'Ngô Thanh Tâm', 76),
(64, 'None', 'None', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_news`
--

CREATE TABLE `tbl_category_news` (
  `pk_category_news_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_news`
--

INSERT INTO `tbl_category_news` (`pk_category_news_id`, `c_name`) VALUES
(1, 'Tin đào tạo'),
(2, 'Tin phòng ban - Bộ môn'),
(3, 'Hoạt động'),
(4, 'Sự kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detai`
--

CREATE TABLE `tbl_detai` (
  `pk_madetai_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_user_hoi_dong` int(11) NOT NULL,
  `c_tendetai` varchar(500) NOT NULL,
  `c_noidungnghiencuu` varchar(1000) NOT NULL,
  `c_kinhphi` float NOT NULL,
  `c_tungay` date NOT NULL,
  `c_denngay` date NOT NULL,
  `c_trangthai` int(11) NOT NULL,
  `file_mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_detai`
--

INSERT INTO `tbl_detai` (`pk_madetai_id`, `fk_user_id`, `fk_user_hoi_dong`, `c_tendetai`, `c_noidungnghiencuu`, `c_kinhphi`, `c_tungay`, `c_denngay`, `c_trangthai`, `file_mo_ta`) VALUES
(39, 78, 0, 'đề tài 1', 'đề tài 1', 1000000000, '2018-10-03', '2018-10-13', 3, 'src/image/test.xlsx'),
(40, 80, 0, 'đề tài 1000', 'đề tài 1000', 1000000000, '2018-10-11', '2018-10-20', 3, 'src/image/test.xlsx'),
(41, 78, 0, 'đề tài 9999', 'đề tài 9999', 1000000000, '2018-10-12', '2018-10-21', 2, 'src/image/test.xlsx'),
(42, 80, 0, 'đề tài 8888', 'đề tài 8888', 1000000000, '2018-10-11', '2018-10-19', 2, 'src/image/test.xlsx'),
(43, 78, 0, 'đề tài 1111', 'đề tài 1111', 1000000000, '2018-10-12', '2018-10-20', 4, 'src/image/test.xlsx'),
(44, 78, 0, 'đề tài 7777', 'đề tài 7777', 1000000000, '2018-10-13', '2018-10-26', 1, 'src/image/test.xlsx'),
(45, 80, 0, 'đề tài 6666', 'đề tài 6666', 1000000000, '2018-10-04', '2018-10-20', 0, 'src/image/test.xlsx'),
(46, 78, 0, 'đề tài 3333', 'đề tài 3333', 1000000000, '2018-10-11', '2018-10-26', 1, 'src/image/test.zip'),
(47, 78, 0, 'đề tài 1', 'đề tài 1', 1000000000, '2018-10-04', '2018-10-20', 2, 'src/image/test.xlsx'),
(48, 78, 0, 'tt', 'rrrr', 1000000000, '2018-11-16', '2018-11-24', 0, 'src/image/test.xlsx'),
(49, 78, 0, 'xây dựng hệ thống nhân sự', 'phát triển phần mềm quản lý nhân sự', 1000000000, '2018-11-14', '2019-11-14', 1, 'src/image/test.xlsx');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detai_phieucham`
--

CREATE TABLE `tbl_detai_phieucham` (
  `pk_detai_phieucham_id` int(11) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `ghi_chu` text NOT NULL,
  `y_kien` text NOT NULL,
  `xep_loai` text NOT NULL,
  `ngay_hop` date NOT NULL,
  `dia_diem` text NOT NULL,
  `detaidunghan_quahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_detai_phieucham`
--

INSERT INTO `tbl_detai_phieucham` (`pk_detai_phieucham_id`, `fk_madetai_id`, `ghi_chu`, `y_kien`, `xep_loai`, `ngay_hop`, `dia_diem`, `detaidunghan_quahan`) VALUES
(1, 0, 'Ghi chú 1', 'Ý kiến 1', '', '0000-00-00', '', 0),
(2, 0, '', '', '', '0000-00-00', '', 0),
(3, 0, '', '', '', '0000-00-00', '', 0),
(4, 0, '', '', '', '0000-00-00', '', 0),
(5, 0, '', '', '', '0000-00-00', '', 0),
(6, 0, '', '', '', '0000-00-00', '', 0),
(7, 0, '', '', '', '0000-00-00', '', 0),
(8, 0, '', '', '', '0000-00-00', '', 0),
(9, 0, '', '', '', '0000-00-00', '', 0),
(10, 0, '', '', '', '0000-00-00', '', 0),
(11, 0, '', '', '', '0000-00-00', '', 0),
(12, 0, '', '', '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detai_user`
--

CREATE TABLE `tbl_detai_user` (
  `fk_madetai_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_detai_user`
--

INSERT INTO `tbl_detai_user` (`fk_madetai_id`, `fk_user_id`) VALUES
(1, 1),
(24, 19),
(24, 22),
(25, 19),
(26, 22),
(27, 22),
(28, 19),
(29, 22),
(30, 22),
(31, 19),
(31, 22),
(32, 22),
(33, 22),
(38, 79),
(39, 79),
(40, 80),
(41, 79),
(42, 80),
(43, 79),
(44, 78),
(45, 80),
(46, 78),
(47, 78),
(47, 79),
(48, 79),
(49, 82),
(49, 87);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_diem_phieucham`
--

CREATE TABLE `tbl_diem_phieucham` (
  `PointId` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_detai_phieucham_id` int(11) NOT NULL,
  `fk_khoanmucdiem_id` int(11) NOT NULL,
  `diem_chu_tich` float NOT NULL,
  `diem_phan_bien_1` float NOT NULL,
  `diem_phan_bien_2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaovien`
--

CREATE TABLE `tbl_giaovien` (
  `pk_magiaovien_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_mabomon_id` int(11) NOT NULL,
  `c_tengiaovien` varchar(500) NOT NULL,
  `c_ngaysinh` date NOT NULL,
  `c_hocvi` varchar(500) NOT NULL,
  `c_hocham` varchar(500) NOT NULL,
  `c_diachi` varchar(500) NOT NULL,
  `c_sdt` int(11) NOT NULL,
  `c_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaovien`
--

INSERT INTO `tbl_giaovien` (`pk_magiaovien_id`, `fk_user_id`, `fk_mabomon_id`, `c_tengiaovien`, `c_ngaysinh`, `c_hocvi`, `c_hocham`, `c_diachi`, `c_sdt`, `c_email`) VALUES
(55, 0, 62, 'Nguyễn Minh Hòa', '1998-04-02', 'Thạc sĩ', 'None', 'Hà Nội', 974685493, 'admin@mail.com'),
(56, 0, 63, 'Nguyễn Văn A', '1990-08-02', 'Thạc sĩ', 'None', 'Hà Nội', 964786367, 'nva@mail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoidong`
--

CREATE TABLE `tbl_hoidong` (
  `pk_hoidong_id` int(11) NOT NULL,
  `c_tenhoidong` varchar(1000) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `c_ngaybaove` date NOT NULL,
  `c_thoigian` time NOT NULL,
  `c_diadiem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoidong`
--

INSERT INTO `tbl_hoidong` (`pk_hoidong_id`, `c_tenhoidong`, `fk_madetai_id`, `c_ngaybaove`, `c_thoigian`, `c_diadiem`) VALUES
(9, 'Hội đồng duyệt đề tài 7777', 44, '2018-11-24', '08:30:00', 'Hà Nội'),
(10, 'Hội đồng duyệt đề tài quản lý nhân sự', 49, '2018-11-23', '09:00:00', 'Hà Nội'),
(11, 'Hội đồng duyệt đề tài 3333', 46, '2018-11-02', '13:30:00', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoidongnghiemthu`
--

CREATE TABLE `tbl_hoidongnghiemthu` (
  `pk_hoidongnghiemthu_id` int(11) NOT NULL,
  `c_tenhoidong` varchar(1000) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `c_ngaybaove` date NOT NULL,
  `c_thoigian` time NOT NULL,
  `c_diadiem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoidongnghiemthu`
--

INSERT INTO `tbl_hoidongnghiemthu` (`pk_hoidongnghiemthu_id`, `c_tenhoidong`, `fk_madetai_id`, `c_ngaybaove`, `c_thoigian`, `c_diadiem`) VALUES
(4, 'Hội đồng nghiệm thu đề tài 9999', 41, '2018-11-15', '09:30:00', 'Hà Nội'),
(5, 'Hội đồng nghiệm thu đề tài 888', 42, '2018-11-17', '09:30:00', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoidong_detai`
--

CREATE TABLE `tbl_hoidong_detai` (
  `pk_hoidong_id` int(11) NOT NULL,
  `fk_nam_id` int(11) NOT NULL,
  `fk_vaitro_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `UserType_backup` int(11) NOT NULL,
  `fk_hoidong_id` int(11) NOT NULL,
  `fk_hoidongnghiemthu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoidong_detai`
--

INSERT INTO `tbl_hoidong_detai` (`pk_hoidong_id`, `fk_nam_id`, `fk_vaitro_id`, `fk_user_id`, `UserType_backup`, `fk_hoidong_id`, `fk_hoidongnghiemthu_id`) VALUES
(3, 0, 2, 77, 2, 0, 0),
(4, 0, 1, 78, 2, 0, 0),
(5, 0, 3, 69, 1, 0, 0),
(8, 0, 3, 79, 1, 0, 0),
(9, 0, 3, 80, 2, 0, 0),
(11, 0, 1, 78, 2, 0, 0),
(12, 0, 1, 80, 3, 4, 0),
(13, 0, 3, 77, 2, 2, 0),
(14, 0, 3, 80, 3, 3, 0),
(18, 0, 3, 80, 3, 1, 0),
(22, 0, 3, 83, 1, 2, 0),
(23, 0, 3, 87, 1, 2, 0),
(24, 0, 3, 87, 1, 2, 0),
(25, 0, 3, 88, 1, 1, 0),
(26, 0, 3, 87, 1, 2, 0),
(27, 0, 3, 87, 1, 2, 0),
(28, 0, 3, 87, 1, 2, 0),
(29, 0, 3, 87, 1, 2, 0),
(30, 0, 3, 87, 1, 0, 2),
(31, 0, 2, 83, 1, 0, 2),
(32, 0, 3, 88, 1, 0, 1),
(33, 0, 1, 83, 1, 0, 2),
(34, 0, 1, 85, 1, 0, 1),
(35, 0, 1, 83, 3, 8, 0),
(39, 0, 3, 87, 1, 0, 3),
(40, 0, 3, 83, 3, 0, 3),
(42, 0, 3, 87, 1, 10, 0),
(43, 0, 4, 84, 1, 11, 0),
(44, 0, 2, 86, 2, 11, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lichbaove`
--

CREATE TABLE `tbl_lichbaove` (
  `pk_lichbaove_id` int(11) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `c_diadiem` varchar(1000) NOT NULL,
  `c_ngay` date NOT NULL,
  `c_thoigian` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nam`
--

CREATE TABLE `tbl_nam` (
  `pk_nam_id` int(11) NOT NULL,
  `c_nam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_nam`
--

INSERT INTO `tbl_nam` (`pk_nam_id`, `c_nam`) VALUES
(6, 1911),
(7, 1912),
(8, 1913),
(9, 1914),
(10, 1915),
(11, 1916),
(12, 1917),
(13, 1918),
(14, 1919),
(15, 1920),
(16, 1921),
(17, 1922),
(18, 1923),
(19, 1924),
(20, 1925),
(21, 1926),
(22, 1927),
(23, 1928),
(24, 1929),
(25, 1930),
(26, 1931),
(27, 1932),
(28, 1933),
(29, 1934),
(30, 1935),
(31, 1936),
(32, 1937),
(33, 1938),
(34, 1939),
(35, 1940),
(36, 1941),
(37, 1942),
(38, 1943),
(39, 1944),
(40, 1945),
(41, 1946),
(42, 1947),
(43, 1948),
(44, 1949),
(45, 1950),
(46, 1951),
(47, 1952),
(48, 1953),
(49, 1954),
(50, 1955),
(51, 1956),
(52, 1957),
(53, 1958),
(54, 1959),
(55, 1960),
(56, 1961),
(57, 1962),
(58, 1963),
(59, 1964),
(60, 1965),
(61, 1966),
(62, 1967),
(63, 1968),
(64, 1969),
(65, 1970),
(66, 1971),
(67, 1972),
(68, 1973),
(69, 1974),
(70, 1975),
(71, 1976),
(72, 1977),
(73, 1978),
(74, 1979),
(75, 1980),
(76, 1981),
(77, 1982),
(78, 1983),
(79, 1984),
(80, 1985),
(81, 1986),
(82, 1987),
(83, 1988),
(84, 1989),
(85, 1990),
(86, 1991),
(87, 1992),
(88, 1993),
(89, 1994),
(90, 1995),
(91, 1996),
(92, 1997),
(93, 1998),
(94, 1999),
(95, 2000),
(96, 2001),
(97, 2002),
(98, 2003),
(99, 2004),
(100, 2005),
(101, 2006),
(102, 2007),
(103, 2008),
(104, 2009),
(105, 2010),
(106, 2011),
(107, 2012),
(108, 2013),
(109, 2014),
(110, 2015),
(111, 2016),
(112, 2017),
(113, 2018),
(114, 2019),
(115, 2020),
(116, 2021),
(117, 2022),
(118, 2023),
(119, 2024),
(120, 2025),
(121, 2026),
(122, 2027),
(123, 2028),
(124, 2029),
(125, 2030),
(126, 2031),
(127, 2032),
(128, 2033),
(129, 2034),
(130, 2035),
(131, 2036),
(132, 2037),
(133, 2038),
(134, 2039),
(135, 2040),
(136, 2041),
(137, 2042),
(138, 2043),
(139, 2044),
(140, 2045),
(141, 2046),
(142, 2047),
(143, 2048),
(144, 2049),
(145, 2050),
(146, 2051),
(147, 2052),
(148, 2053),
(149, 2054),
(150, 2055),
(151, 2056),
(152, 2057),
(153, 2058),
(154, 2059),
(155, 2060),
(156, 2061),
(157, 2062),
(158, 2063),
(159, 2064),
(160, 2065),
(161, 2066);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `pk_news_id` int(11) NOT NULL,
  `fk_category_news_id` int(11) NOT NULL DEFAULT '0',
  `c_name` varchar(500) NOT NULL,
  `c_description` varchar(20000) NOT NULL,
  `c_content` text NOT NULL,
  `c_img` varchar(500) NOT NULL,
  `c_hotnews` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`pk_news_id`, `fk_category_news_id`, `c_name`, `c_description`, `c_content`, `c_img`, `c_hotnews`) VALUES
(2, 3, 'Giá nguyên liệu sữa nhập khẩu tiếp tục tăng cao', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '1539707877Koala.jpg', 1),
(3, 3, 'Giá nguyên liệu sữa nhập khẩu tiếp tục tăng cao 1', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '1539707864Penguins.jpg', 1),
(6, 3, 'Giá nguyên liệu sữa nhập khẩu tiếp tục tăng cao 4', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '<p>Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.&nbsp;Theo các Cty sữa cho biết, giá nguyên liệu sữa nhập khẩu trong tháng 11 tiếp tục tăng thêm 200USD/tấn. Với mức giá hiện nay, giá sữa béo có nguồn gốc New Zealand nhập về VN hiện là 5.700USD/tấn, tăng gấp 2 lần so với thời điểm này năm ngoái.</p>', '1539685255Jellyfish.jpg', 1),
(7, 2, 'Chàng đội trưởng sinh viên trường Bách khoa điển trai, mê khoa học', '<p>(Dân trí) - Với niềm đam mê khoa học, Phạm Lê Việt Anh – sinh viên năm thứ 3 Đại học Bách khoa Hà Nội đã đạt nhiều thành tích, giải thưởng khoa học đáng ngưỡng mộ.</p>', '<p>Phạm Lê Việt Anh được nhiều người biết đến là đội trưởng đội tuyển BK Galaxy và là một trong những gương mặt sinh viên ưu tú nhất của chuyên ngành kĩ thuật cơ - điện tử Đại học Bách khoa Hà Nội.</p><p>Chàng sinh viên điển trai sở hữu nhiều thành tích nổi bật trong nghiên cứu khoa học. Cậu từng xuất sắc giành giải Nhất lĩnh vực, giải Ba chung cuộc cuộc thi Sáng tạo khoa học kĩ thuật quốc gia Intel Isef 2015 với đề tài “Robot tiện ích”, giải Ba cuộc thi Sáng tạo khoa học kỹ thuật thanh thiếu niên - nhi đồng quốc gia với đề tài “Robot giúp việc nhà điều khiển bằng smart-phone” năm 2016, giải Nhì giao hữu Bot Battle của VNG năm 2017.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/a43eb5ece6/2018/04/09/img20180409114018730-0c7a5.jpg\" alt=\"Phạm Lê Việt Anh (ở giữa) nhận bằng khen trong lễ tổng kết và trao giải cuộc thi Sáng tạo thanh thiếu niên nhi đồng toàn quốc lần thứ 12 năm 2016\"></figure><p>Phạm Lê Việt Anh (ở giữa) nhận bằng khen trong lễ tổng kết và trao giải cuộc thi Sáng tạo thanh thiếu niên nhi đồng toàn quốc lần thứ 12 năm 2016</p><p>Năm lớp 11, khi đang theo học lớp chuyên Sinh, trường THPT chuyên Nguyễn Trãi (Hải Dương), Việt Anh đã đến với khoa học như một cái duyên.</p><p>“Em thường thích mày mò sáng tạo ra mấy đồ linh tinh. Những lúc như thế em cảm thấy rất thích thú. Một buổi sáng tại trường, lớp trưởng cầm tờ giấy do trường phát và đọc cho cả lớp. Nội dung của thông báo là về cuộc thi sáng tạo khoa học kỹ thuật do Bộ Giáo dục và Đào tạo tổ chức. Chưa tìm hiểu đến các cuộc thi khoa học bao giờ nhưng nghe xong, em đã đăng kí tham gia”, Việt Anh chia sẻ.</p><p>Theo anh chàng này, khó khăn mà phần lớn ai dấn thân vào con đường nghiên cứu khoa học sẽ gặp phải chính là “bí” đề tài.</p><p>Có người “tắc”, không nghĩ ra mình làm gì, có người thì nghĩ ra rồi cũng phải bỏ vì ý tưởng bất khả thi. Còn Việt Anh, mặc dù đã chọn được đề tài xong lại tốn rất nhiều thời gian để tìm các trang thiết bị cung ứng và địa điểm thực hiện.</p><p>“Ngoài kiến thức chuyên môn về thiết kế chế tạo cơ khí, thiết kế mạch điện, lập trình tự động, kỹ thuật điều khiển hệ thống máy tính, làm khoa học phải tận dụng tất cả những đồ ở nhà có và mượn từ mọi người như bộ khoan, máy cắt, máy bắt vít,…</p><p>Địa điểm làm cũng phải nhờ quen biết các anh chị trong hội sinh viên, giảng viên để được hỗ trợ. Những khoản kinh phí phát sinh nhiều lúc phải đi xin tài trợ từ các công ty”, Việt Anh nói.</p><p>Gặp khó khăn về nhiều mặt khi làm khoa học nên không ít lần chàng sinh viên này có ý định bỏ cuộc, con số thất bại không thể nào đếm nổi.</p><p>“Có những đêm làm liên tục đến 4,5 giờ sáng để thiết kế bảng mạch. Thực sự điện tử rất khó hiểu và phức tạp “y như con gái vậy”. Nhiều lúc chập rồi không hoạt động vì lý do hết sức đơn giản và ngớ ngẩn.</p><p>Những lúc em muốn bỏ cuộc thì nhìn lại thành viên làm cùng. Họ tin tưởng và theo mình vậy mà mình bỏ thì mất niềm tin của mọi người nên cố gắng tiếp tục. Hơn nữa, bao nhiêu đam mê chắc em đổ hết vào khoa học rồi”, chàng sinh viên Bách Khoa chia sẻ.</p><p>Tình yêu khoa học là một trong những khía cạnh giúp Việt Anh truyền cảm hứng cho đồng đội. Là đội trưởng đội tuyển BK Galaxy, dẫn dắt thành viên tham gia nhiều đấu trường khoa học, chàng trai 9X đã rút ra được kinh nghiệm khi làm việc nhóm.</p><p>Khi lắp ráp, thiết kế rất hay xảy ra tranh cãi nhưng mỗi lần đội cãi nhau, Việt Anh lại rủ mọi người cùng đi ăn và bình tĩnh nói chuyện giải tỏa khúc mắc và cùng tìm được cách thực hiện hiệu quả.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/a43eb5ece6/2018/04/09/img20180409114020031-cc44f.jpg\" alt=\"Việt Anh (thứ hai bên trái) và đồng đội trong CLB khoa học.\"></figure><p>Việt Anh (thứ hai bên trái) và đồng đội trong CLB khoa học.</p><p>&nbsp;</p><p>Dành nhiều thời gian chuyên môn cho khoa học, Việt Anh cũng chăm chỉ rèn luyện thể thao nâng cao sức khỏe, thư giãn và kết nối bạn bè.</p><p>Chia sẻ về dự định tương lai, đội trưởng đội tuyển BK Galaxy cho biết sẽ tiếp tục học tập tốt và tham gia các cuộc thi khoa học để rèn luyện bản thân. Sau khi tốt nghiệp Đại học, Phạm Lê Việt Anh mong muốn sẽ đi theo con đường nghiên cứu khoa học và sở hữu một công ty công nghệ riêng.</p><p>“Yêu thích robot là vậy nhưng em khát khao sau này được làm CEO của công ty công nghệ để giúp nhiều hơn cho những người đam mê khoa học mà còn đang gặp khó khăn cần hỗ trợ.</p><p>Em hi vọng sẽ đóng góp được vào quá trình phát triển của robot nói riêng và khoa học công nghệ nói chung để đem thành tựu ấy phục vụ cuộc sống của con người tốt hơn”, Việt Anh tâm sự.</p><p><strong>Hồng Vân</strong></p>', '1539707791Chrysanthemum.jpg', 1),
(9, 2, 'Nhiều hoạt động ý nghĩa của đoàn viên tại “Liên hoan phụ trách tài năng”', '<p>Tối ngày 9/4, tại TP. Tuy Hòa (tỉnh Phú Yên) đã diễn ra lễ khai mạc Liên hoan “Phụ trách tài năng” các Cung, Nhà thiếu nhi, Trung tâm hoạt động thanh thiếu nhi lần thứ VII – năm 2018</p>', '<p>Liên hoan “Phụ trách tài năng” có sự tham gia của 49 đơn vị phía Nam và một số đơn vị khu vực phía Bắc với hơn 500 đại biểu.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/3-15232840347462109412545.jpg\" alt=\"Đêm Liên hoan “Phụ trách tài năng” có sự tham gia của 49 đơn vị phía Nam và một số đơn vị khu vực phía Bắc.\"></figure><p>Đêm Liên hoan “Phụ trách tài năng” có sự tham gia của 49 đơn vị phía Nam và một số đơn vị khu vực phía Bắc.</p><p>Tại liên hoan sẽ diễn ta các hoạt động sôi nổi, phong phú và đa dạng như: tuyên dương phụ trách tài năng; thi thử tài phụ trách thể thao; giao lưu văn hóa; làm công tác xã hội, tham quan trải nghiệm,…</p><p>Anh Phan Xuân Hạnh, Bí thư Tỉnh đoàn Phú Yên (đơn vị đăng cai tổ chức) cho biết: Liên hoan là dịp để tuyên dương các gương “Phụ trách tài năng” trên tất cả các lĩnh vực hoạt động của các Cung, Nhà Thiếu nhi, Trung tâm hoạt động Thanh thiếu nhi trong cả nước. Đồng thời đây là sân chơi văn hóa thể thao lành mạnh, bổ ích và thiết thực; tạo sự đoàn kết, gắn bó, hỗ trợ các hoạt động giữa các đơn vị trong khu vực.</p><p>Cũng tại đêm liên hoan 49 đơn vị tham gia đã đóng góp 40 triệu đồng xây dựng Công trình “Vì đàn em thân yêu” tại xã EaBar, huyện miền núi Sông Hinh; trao 20 suất học bổng cho thiếu nhi Phú Yên vượt khó học giỏi, giá trị mỗi suất 1.000.000 đồng.</p><p>Liên hoan “Phụ trách tài năng” sẽ diễn ra đến hết ngày 11/4/2018. Các hoạt động chính diễn ra tại 2 địa điểm là TP. Tuy Hòa và huyện miền núi Sông Hinh.</p><p>Dưới đây là một số hình ảnh trong đêm liên hoan:</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/2-1523284034742179861369.jpg\" alt=\"Nhiều tiết mục văn nghệ chào mừng vô cùng đặc sắc\"></figure><p>Nhiều tiết mục văn nghệ chào mừng vô cùng đặc sắc</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/6-152328403475090296665.jpg\" alt=\"Ban tổ chức và lãnh đạo tỉnh tặng cờ, hoa cho các đơn vị\"></figure><p>Ban tổ chức và lãnh đạo tỉnh tặng cờ, hoa cho các đơn vị</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/10-15232840347662057807348.jpg\" alt=\"Tuyên dương 44 gương Phụ trách tài năng\"></figure><p>Tuyên dương 44 gương \"Phụ trách tài năng\"</p><p><strong>Trung Thi</strong></p>', '1539707755Lighthouse.jpg', 1),
(10, 2, 'Anh chàng “vô tư” miêu tả nụ hôn với ', '<p>Anh Bình tự nhận mình là người không lãng mạn và kể chi tiết về nụ hôn của anh với bạn gái cũ khi đang tiếp xúc với đối tượng hẹn hò trong chương trình thực tế “Bạn muốn hẹn hò”.</p>', '<p>Anh chàng “vô tư” miêu tả nụ hôn với bạn gái cũ cho đối tượng hẹn hò</p><p>Trong chương trình \"Bạn muốn hẹn hò\" số 373, anh Nguyễn Thanh Bình (30 tuổi, nhân viên kinh doanh bất động sản) và chị Nguyễn Thị Kim Xuyến (24 tuổi, trợ lý giám đốc) đã gặp gỡ nhau nhưng lại không bấm nút hẹn hò vì một lí do khá tế nhị.</p><p>Lí do đó chính là sự “vô tư” thái quá của anh Bình khi kể về “người cũ, chuyện cũ” trước đối tượng hẹn hò là chị Xuyến.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/bmhh-15232650348991204910246.jpg\" alt=\"Anh Bình tự nhận mình là người không lãng mạn và kể chi tiết về nụ hôn của anh với bạn gái cũ khi đang tiếp xúc với đối tượng hẹn hò.\"></figure><p>Anh Bình tự nhận mình là người không lãng mạn và kể chi tiết về nụ hôn của anh với bạn gái cũ khi đang tiếp xúc với đối tượng hẹn hò.</p><p>Chị Xuyến giới thiệu với chương trình hẹn hò rằng chị là người vui vẻ hòa đồng, dễ gần nhưng không biết nấu ăn. Chị tìm kiếm mẫu người bạn trai không hút thuốc, dáng người vừa vặn và có vốn mua đất để xây nhà hoặc kinh doanh BĐS. Anh Bình có vẻ là người đáp ứng được những tiêu chuẩn mà chị Xuyến đặt ra. Tuy nhiên anh đã phạm phải một sai lầm.</p><p>Anh Bình thú nhận là anh không lãng mạn, đã từng bị bạn gái đầu tiên “đá” vì tính cách này. Ngay sau đó, anh Bình miêu tả kĩ lưỡng về nụ hôn với bạn gái cũ, điều mà anh cho là lãng mạn nhất: \"Đó là một kỷ niệm mà anh nghĩ là rất lãng mạn. Đó là bạn gái mối tình thứ 2, lần đầu tiên anh có nụ hôn với cô ấy là trên vòng xoay thời gian ở Đầm Sen. Lúc đó đang ở trên đỉnh\".</p><p>Nhận ra bầu không khí “có gì đó sai sai” khi Bình kể lể quá chi tiết về chuyện tình với những người bạn gái cũ, MC Quyền Linh nhắc nhở anh Bình \"Không nhắc chuyện cũ\", nhưng anh Bình dường như không hiểu ý.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/bmhh2-15232650349051154442140.png\" alt=\"Chị Xuyến đã không bấm nút hẹn hò với anh Bình.\"></figure><p>Chị Xuyến đã không bấm nút hẹn hò với anh Bình.</p><p>Anh Bình cho rằng: \"Chuyện cũ qua lâu rồi, không sao đâu\". Tuy nhiên, người tinh ý đều nhận thấy thái độ của chị Xuyến khi tiếp chuyện đã có sự thay đổi khi nghe anh kể nhiều về chuyện tình cũ.</p><p>Trước đó, chị Xuyến bày tỏ mong muốn vài năm nữa mới kết hôn, anh Bình cho rằng yêu 6 tháng rồi cưới là hợp lý vì những mối tình trước của anh kéo dài 5 năm rồi chẳng đi về đâu.</p><p>Vào cuối chương trình, chị Xuyến khen ngợi anh Bình nhưng lại không bấm nút hẹn hò.</p>', '1539707738Koala.jpg', 0),
(11, 2, 'Cô gái đất võ Tây Sơn duy nhất nhận giải thưởng Lý Tự Trọng 2018', '<p>Đó là chị Nguyễn Thị Hà Giao, Bí thư Xã đoàn Tây Giang (huyện Tây Sơn, Bình Định)- chị Giao là cán bộ đoàn cơ sở duy nhất của tỉnh Bình Định vinh dự được Trung ương Đoàn trao giải thưởng Lý Tự Trọng 2018.</p>', '<p><strong>Nữ thủ lĩnh đoàn vì người nghèo…</strong></p><p>Trở về từ Hà Nội sau khi nhận Giải thưởng Lý Tự Trọng, cô Bí thư xã đoàn Tây Giang - Nguyễn Thị Hà Giao, chia sẻ: “Tôi rất bất ngờ khi được nhận Giải thưởng này. Đây không chỉ là niềm tự hào mà còn là động lực để tôi không ngừng phấn đấu, xưng đáng với niềm tin được gửi gắm”.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/1-1523118731409676839623.jpg\" alt=\"Bí thư Xã đoàn Tây Giang, Nguyễn Thị Hà Giao (giữa) là cán bộ Đoàn duy nhất của tỉnh Bình Định giành giải thưởng Lý Tự Trọng 2018.\"></figure><p>Bí thư Xã đoàn Tây Giang, Nguyễn Thị Hà Giao (giữa) là cán bộ Đoàn duy nhất của tỉnh Bình Định giành giải thưởng Lý Tự Trọng 2018.</p><p>Theo chị Giao, để hoạt động đoàn hiệu quả thì không thể thiếu các hoạt động phong trào. Qua các phong trào sẽ giúp đoàn viên thanh niên (ĐVTN) có môi trường trải nghiệm, phát huy tính xung kích, sáng tạo của tuổi trẻ. “Tuy nhiên, quan trọng nhất ở người cán bộ Đoàn là phải chịu khó đi cơ sở, nắm bắt tâm tư, nguyện vọng của ĐVTN và người dân. Từ đó, lên kế hoạch triển khai những phần việc gắn với nhu cầu thực tiễn của từng địa bàn”, chị Giao chia sẻ.</p><p>Chị Giao cũng là người đưa ra sáng kiến đề xuất thành lập nhà quần áo cũ cho người nghèo và được lãnh đạo địa phương, Đoàn cấp trên và đặc biệt là người dân đánh giá rất cao. Không lâu sau, ngôi nhà rộng chỉ chừng hơn 15m2&nbsp;, ĐVTN trong xã hoàn thành. Nhà hoạt động từ 7h sáng đến 17 chiều và đều có cán bộ đoàn phụ trách ở tại nhà để phục vụ bà con có nhu cầu đến cho và nhận.</p><p>Theo chị Giao, sau hơn 6 tháng khai trương, Đoàn xã đã vận động trong ĐVTN và nhân dân được 4.000 bộ quần áo, các vật dụng gia đình, sách học sinh để ủng hộ cho người người khó khăn.</p><p>Trong các hoạt động đền ơn đáp nghĩa, những năm qua, xã đoàn Tây Giang trao tặng hàng chục xe đạp cho học sinh có hoàn cảnh khó khăn không có phương tiện đến trường, trao hàng ngàn suất quà đến các em thiếu nhi nghèo trên địa bàn; tổ chức các hoạt động Tết thiếu nhi, đêm hội trăng rằm cho các em…</p><p><strong>Giúp ĐVTN thoát nghèo, cảm hóa thanh niên lầm lỡ</strong></p><p>Trên cương vị Bí thư xã đoàn Tây Giang, chị Giao luôn sâu sát nắm bắt nhu cầu, nguyện vọng của ĐVTN. Đặc biệt, việc chăm lo chăm lo đời sống vật chất, tinh thần của ĐVTN được nữ thủ lĩnh đặt lên hàng đầu.</p><p>Với những thanh niên cần nguồn vốn vay để làm ăn thoát nghèo, xã đoàn đứng ra nhận ủy thác các nguồn vốn vay ưu đãi từ Ngân hàng Chính sách xã hội giúp thanh niên tiếp cận nguồn vốn vay dễ dàng.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/2-15231187314121603647965.jpg\" alt=\"Chị Giao cũng là thủ lĩnh thanh niên có uy tín, nhiệt tình trong công tác và có khả năng đoàn kết tập hợp ĐVTN.\"></figure><p>Chị Giao cũng là thủ lĩnh thanh niên có uy tín, nhiệt tình trong công tác và có khả năng đoàn kết tập hợp ĐVTN.</p><p>Đến nay, xã đoàn Tây Giang đang quản lý dư nợ gần 2 tỷ đồng. Nhờ vậy, hàng chục thanh niên trên địa bàn nhờ nguồn vốn này mà vươn lên phát triển kinh tế gia đình.</p><p>Đặc biệt, để thanh niên sử dụng nguồn vốn đúng mục đích, không xảy ra tình trạng nợ quá hạn, xã đoàn thường xuyên đi kiểm tra công tác quản lý vốn vay của các tổ, đôn đốc các tổ trưởng tổ vay vốn phải thu lãi đúng hạn. Nhờ đó, 100% tổ vay vốn thực hiện tốt công tác quản lý vốn và thanh niên sử dụng vốn đúng mục đích.</p><p>Theo chị Giao, việc sâu sát, nắm bắt tâm tư nguyện vọng của ĐVTN là điều quan trọng. Bản thân mình phải luôn chứng tỏ vai trò tích cực, đầu tàu của một thủ lĩnh đoàn gương mẫu, sáng tạo và có trách nhiệm dẫn dắt, gắn kết ĐVTN tham gia vào các hoạt động có ích. Trong đó, việc quan tâm cảm hóa, giáo dục những ĐVTN chậm tiến, lầm lỡ tái hòa nhập cộng đồng, vươn lên sống tốt là việc làm hết sức ý nghĩa.</p><p>“Trong năm qua, xã đoàn đã phối hợp với công an xã mở 2 lớp cảm hóa, giáo dục pháp luật cho 56 thanh thiếu niên chậm tiến. Mở 5 lớp giáo dục cá biệt cho 42 thanh niên có dấu hiệu vi phạm pháp luật. Qua đó, hầu hết các thanh niên đều đã trở nên tiến bộ”, chị Giao cho hay.</p>', '1539707727Desert.jpg', 0),
(12, 2, 'Cô bạn 9x từng đi cấy lúa, đẩy xe rác tự trang trải tiền học đại học quốc tế', '<p>Học xong hệ cao đẳng chuyên ngành du lịch và cảm thấy mình cần phải có một bước ngoặt lớn hơn để thay đổi cuộc sống của mình cũng như trở thành tấm gương cho các bạn bè ở quê nhà Nam Định, Phạm Thuỳ Linh dũng cảm quyết định học lại từ đầu tại một trường Đại học quốc tế và tự trang trải học phí. Với bản tính mạnh mẽ độc lập, từng làm qua đủ công việc từ cấy lúa, đẩy xe rác tới dẫn tour du lịch, Linh luôn dặn mình “Chỉ cần cố gắng là việc gì cũng xong”.</p>', '<p>Mới tiếp xúc với Phạm Thị Thuỳ Linh, hẳn ai cũng sẽ bị ấn tượng với ngoại hình bé nhỏ, đôi bàn tay mảnh khảnh và khuôn mặt ưa nhìn mà không thể biết đằng sau ngoại hình tiểu thư ấy là một cô gái rất độc lập, nhanh nhẹn và không ngại dấn thân. Cô bạn thường cùng mẹ ra đồng cấy lúa, gặt lúa. Bố Linh có thời gian làm tháo dỡ công trình, hay chạy xe gom rác, tuy còn nhỏ nhưng cô bạn cũng không ngại khó ngại bẩn ngày ngày đi đẩy xe rác cùng bố. Linh nói:”Chỉ cần được đi làm cùng bố mẹ là vui lắm rồi.”</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-1-15232510823501309793721.jpg\" alt=\"\"></figure><p>Sinh ra trong một gia đình bình thường có 3 chị em ở huyện Xuân Trường, Nam Định, Linh luôn nung nấu trong mình ý muốn kiếm tiền thật sớm để thay bố mẹ lo cho các em.</p><p>Nửa vì muốn nhanh làm ra tiền lo cho gia đình, nửa vì ước mơ hồn nhiên được đi khắp thế giới mà cô học trò nhỏ ngày đó quyết định theo ngành du lịch. Linh nhớ lại ngày xưa ở quê hay mất điện, 3 chị em leo lên mái nhà hóng gió và ngắm những chiếc máy bay xuyên các tầng mây, mỗi lần như vậy Linh đều hét vang lên hỏi những chiếc may bay kia bay về đâu vậy, ước muốn mơ hồ được ngồi trên những chuyến bay đó đi khắp thế giới.</p><p>Và may mắn đã lần đầu tiên mỉm cười với Linh khi cô bạn được lựa chọn là 1 trong 2 đại diện ở Việt Nam được cử sang Nhật tham gia hội nghị International Youth Exchange do Hội chữ thập đổ quốc tế tổ chức vào năm 2010.</p><p>Chuyến đi Nhật năm lớp 12 ấy cũng là lần đầu tiên Linh được đi ra khỏi quê nhà nhỏ bé của mình, đặt chân đến một đất nước hiện đại và văn minh tới nỗi Linh chưa từng thấy cả trong những giấc mơ.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-2-15232510823541981661846.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-3-1523251082358508683824.jpg\" alt=\"\r\nLinh (thứ 3 từ trái sang) cùng các bạn bè Nhật bản trong chuyến đi Nhật Bản cùng Hội Chữ thập đỏ quốc tế.\r\n\"></figure><p>Linh (thứ 3 từ trái sang) cùng các bạn bè Nhật bản trong chuyến đi Nhật Bản cùng Hội Chữ thập đỏ quốc tế.</p><p>3 năm theo học du lịch, Linh như bất kì sinh viên nào khác, chỉ lên lớp rồi về nhà làm bài tập, ước mơ ngày xưa vẫn còn đó nhưng cô bạn thực sự chưa thấy rõ mục tiêu sự nghiệp của mình.</p><p>Học xong Linh có đi làm hướng dẫn viên du lịch một thời gian ngắn, nhưng càng tiếp xúc với nhiều khách du lịch nước ngoài và đi lại nhiều nơi, Linh mới nhận ra mình muốn thay đổi cuộc sống nhiều hơn thế. Linh có ý tưởng tự kinh doanh, muốn biết các công ty lớn nhỏ trên thị trường thực sự vận hành thế nào, Linh khao khát được biết phải bắt đầu từ đâu để biến những ý tưởng trong đầu thành hiện thực.</p><p>Và bước ngoặt lớn mà cô bạn cảm thấy thực sự đúng đắn trong cuộc đời mình là theo học chuyên ngành Quản trị kinh doanh tại Đại học Greenwich (Việt Nam). Cô bạn quyết định học lại từ đầu và vừa học vừa làm để tự lo học phí của mình.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-4-1523251082360514236155.jpg\" alt=\"\r\nLinh cùng các bạn trong một giờ học Vovinam tại Đại học Greenwich (Việt Nam)\r\n\"></figure><p>Linh cùng các bạn trong một giờ học Vovinam tại Đại học Greenwich (Việt Nam)</p><p>Phạm Thuỳ Linh cho biết: “Ban đầu mình không hề có ý định theo học một chương trình quốc tế vì không muốn làm gánh nặng cho bố mẹ. Nhưng mình đã đánh liều chọn Đại học Greenwich (Việt Nam) và đi làm thêm để tự lo học phí cho bản thân vì một tấm bằng đại học quốc tế chắc chắn sẽ giúp mình vươn xa hơn.”</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-5-1523251082362129540475.jpg\" alt=\"\"></figure><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-6-1523251082364344538620.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/photo-7-1523251082366160990811.jpg\" alt=\"\r\nPhạm Thuỳ Linh trong những chuyến du lịch của mình.\r\n\"></figure><p>Phạm Thuỳ Linh trong những chuyến du lịch của mình.</p><p>Từ một cô bé sinh viên chỉ biết lên lớp và làm bài tập, Linh đã trở nên chủ động hơn, cô bạn rất hào hứng làm bài tập nhóm, đi du lịch nhiều hơn và mở rộng quan hệ với các bạn bè quốc tế.</p><p>Cô bạn chơi thân nhất với anh bạn cùng lớp người Hàn Quốc - Kim Su Han và anh bạn nhỏ bé Spicy – sinh viên Ghana duy nhất ở trường. Cô bạn cũng học thêm tiếng Nhật để phục vụ công việc làm thêm của mình ở nhà hàng Nhật Bản tại Hà Nội. Lần đầu tiên trong đời Linh cảm thấy quyết định này của mình là thực sự đúng đắn.</p><p>Linh tâm sự: “Mình không chỉ muốn thay đổi cuộc đời của mình mà còn muốn lấy câu chuyện của mình để thay đổi suy nghĩ của các bạn bè ở quê nhà. Ở quê mình các bạn bỏ học đại học rất nhiều vì không được định hướng hoặc cảm thấy lâu kiếm ra tiền. Mình không muốn các bạn và 2 em của mình như vậy. Bằng đại học là con đường thẳng và dễ dàng nhất để bạn thay đổi cuộc sống của mình.”</p><p>Phạm Thuỳ Linh hiện là sinh viên năm 2 khoa Quản trị kinh doanh tại Đại học Greenwich (Việt Nam).</p>', '1539685203Tulips.jpg', 0),
(13, 1, 'Thần thái xuất sắc, em gái Hà Nội được ví như ', '<p>Bảo Anh thường xuyên xuất hiện trước truyền thông với tư cách là một người mẫu nhí, vừa có khả năng trình diễn catwalk, vừa có thần thái cuốn hút trước ống kính.</p>', '<p>là một người mẫu nhí được yêu thích tại Hà Nội. Cô bé được biết tới thông qua loạt ảnh trên mạng, được nhiều người nhận xét là khá giống với diễn viên Trung Quốc - Châu Tấn vào cuối năm 2015.</p><p>Từ đó tới nay, Bảo Anh thường xuyên xuất hiện trước truyền thông với tư cách là một người mẫu nhí, vừa có khả năng trình diễn catwalk, vừa có thần thái cuốn hút trước ống kính.</p><p>Mới đây, hình ảnh Bảo Anh khi đang trình diễn violin lại được cộng đồng mạng quan tâm. Cô bé say sưa kéo đàn violin toát lên vẻ đẹp có khí chất riêng.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin4-15231119972901481244292.jpg\" alt=\"Vẻ đẹp thanh khiết và thần thái của Bảo Anh khi cầm đàn violin\"></figure><p>Vẻ đẹp thanh khiết và thần thái của Bảo Anh khi cầm đàn violin</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin5-15231119972931639660320.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin2-152311199728831652813.jpg\" alt=\"\"></figure><p>Được biết, Bảo Anh là học trò của thầy giáo violin nổi tiếng là Giáo sư Bùi Công Thành và Bùi Công Duy. Cô bé đã theo học bộ môn này được 1,5 năm.</p><p>Hình ảnh của Bảo Anh trong buổi biểu diễn là tại chương trình Hoà Nhạc Mùa xuân của Khoa Dây, Học viện Âm nhạc quốc gia.</p><p>Hè này, khi đủ tuổi thi vào Học viện Âm nhạc quốc gia, Bảo Anh sẽ tham gia dự tuyển.</p><p>Ngoài sở thích chơi đàn violin, Bảo Anh cũng giữ vững thành tích học sinh giỏi trong mấy năm học vừa qua.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/lee1809-15231124906761123034280.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/lee1777-1523112250761648820156.jpg\" alt=\"Bé Bảo Anh có vẻ đẹp sắc nét, vẻ cuốn hút của thiếu nữ dù còn nhỏ tuổi\"></figure><p>Bé Bảo Anh có vẻ đẹp sắc nét, vẻ cuốn hút của thiếu nữ dù còn nhỏ tuổi</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin9-15231119973021463744655.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin7-1523111997298487795971.jpg\" alt=\"\"></figure><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/7/bao-anh-violin13-15231119973051372873197.jpg\" alt=\"Bảo Anh và thầy giáo Bùi Công Duy\"></figure><p>Bảo Anh và thầy giáo Bùi Công Duy</p><p><strong>Mai Châm</strong></p>', '1539707838Hydrangeas.jpg', 1),
(14, 1, 'Dân trí  ›   Nhịp sống trẻ  ›   Thứ Hai, 09/04/2018 - 10:00 Nữ sinh Nhạc viện xuống phố cover “Tình đơn phương1” bằng nhạc cụ dân tộc', '<p>Top 25 thí sinh xuất sắc nhất vòng Sơ loại cuộc thi Miss VNAM đã thể hiện nhiều ca khúc đang được các bạn trẻ yêu thích hiện nay như “Mặt trời của em”, “Tình đơn phương”, “Despacito”,... theo nhiều phong cách khác nhau từ thính phòng, cover nhạc cụ dân tộc, violon thu hút sự chú ý.</p>', '<p>Chiều ngày 8/4 tại khu vực quảng trường Đông Kinh Nghĩa Thục đã diễn ra sự kiện nghệ thuật do BTC cuộc thi Miss VNAM của Học viện Âm nhạc Quốc gia Việt Nam tổ chức. Sự kiện có sự tham gia top 25 thí sinh xuất sắc nhất, hội tụ nhiều gương mặt sáng giá, tài năng.</p><p>Với khẩu hiệu “Nghệ thuật tiềm ẩn trong nét đẹp”, các nữ sinh đã lần lượt thể hiện tài năng của mình như đàn, hát, chơi các nhạc cụ dân tộc,... thu hút sự chú ý của hàng trăm người đi bộ.</p><p>Từ những ca khúc trẻ trung đang được các bạn trẻ rất yêu thích hiện nay như “Mặt trời của em”, “Tình đơn phương”, “Despacito”,... đến những ca khúc đi cùng năm tháng như “Tự nguyện”,… đều được các thí sinh thể hiện đầy tự tin.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-8-1523246812714787657368.jpg\" alt=\"Các thí sinh tự tin thể hiện tài năng và tỏa sáng trên phố đi bộ\"></figure><p>Các thí sinh tự tin thể hiện tài năng và tỏa sáng trên phố đi bộ</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-7-15232454878561721391004.jpg\" alt=\"Dàn nữ sinh Học viện Âm nhạc tự tin khoe tài năng trên phố đi bộ\"></figure><p>Dàn nữ sinh Học viện Âm nhạc tự tin khoe tài năng trên phố đi bộ</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-2-15232454878401442550749.jpg\" alt=\"\"></figure><p>Bên cạnh đó, sự kiện còn là cơ hội để người xem nhận được những chiếc vé tham dự vòng Chung khảo - Vòng thi Tài năng của cuộc thi sẽ diễn ra vào ngày 15/4 tới đây bằng việc tham gia trò chơi đố vui do chính top 25 đặt câu hỏi.</p><p>Màn giao lưu nghệ thuật, tương tác giữa khán giả và các thí sinh diễn ra trong không khí vui tươi, hứng khởi, không chỉ thu hút các bạn trẻ tham gia mà ngay cả các em nhỏ và người lớn tuổi cũng bị cuốn hút vào những tiết mục biểu diễn sôi động, thú vị.</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-6-1523245487852373742076.jpg\" alt=\"Các thí sinh tự tin thể hiện tài năng và tỏa sáng trên phố đi bộ\"></figure><p>Các thí sinh tự tin thể hiện tài năng và tỏa sáng trên phố đi bộ</p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-3-15232454878441619418623.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-1-1523245487836449033543.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/9/miss-vnam-1-1523245487832984408651.jpeg\" alt=\"\"></figure><p>Cuộc thi “Tài năng &amp; Duyên dáng VNAM 2018” do Đoàn TNCS HCM – Hội Sinh viên Học viện Âm nhạc Quốc gia Việt Nam tổ chức, là nơi giới thiệu nét đẹp và tài năng của nữ sinh Học viện Âm nhạc, đồng thời tạo sức lan toả nhằm mục đích thúc đẩy việc giao lưu, đưa âm nhạc chuyên nghiệp đến gần hơn với công chúng.</p><p>Cuộc thi cũng là cơ hội giúp nữ sinh có môi trường lành mạnh để thể hiện phẩm chất cao đẹp, tài năng của bản thân. Bên cạnh đó, sự kiện này cũng góp phần định hướng, xây dựng các mối quan hệ và hỗ trợ phát triển cho các nữ sinh trong tương lai.</p><p><strong>Kim Bảo Ngân</strong></p>', '1539707706Chrysanthemum.jpg', 0),
(15, 1, 'Hot girl Kiên Giang nổi đình nổi đám nhờ niềng răng suốt 4 năm', '<p>Thân là con gái, ai cũng muốn mình thật xinh đẹp. Từng đường nét, chi tiết trên khuôn mặt, cơ thể đều phải có nét đẹp riêng, quyến rũ mới có thể gây ấn tượng với đối phương. Nhất là “cái răng, cái tóc” bởi chúng là “góc con người”.</p>', '<p>Thế nhưng, đâu phải cô nàng nào sinh ra cũng đẹp tự nhiên sẵn có. Có khi tóc xoăn một chút, răng hơi to, hơi lệch một chút cũng khiến các cô nàng tự ti đi rất nhiều.</p><p>Cô bạn Lê Khánh Linh, sinh năm 1996 ở thành phố Rạch Giá, tỉnh Kiên Giang cũng rơi vào trường hợp như thế. Hạn chế của Linh khi nhỏ là hàm răng xấu, mọc lệch, hơi nhô và to. Điều này khiến cô nàng mất hẳn sự tự tin.</p><p>Linh kể: “<i>Hồi đó đi học thấy bạn bè có người yêu cũng thích lắm mà thích đứa nào nó cũng chê mình xấu</i>.” Linh quyết tâm thay đổi nhan sắc bằng cách niềng răng và cô nhận được một thành quả cực kỳ to lớn sau 4 năm kiên trì, chịu nhiều đau đớn. Tuy nhiên, hành trình thay đổi nhan sắc của cô nàng 9x không hề dễ dàng.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai2-1523166236678823942822.jpg\" alt=\"\r\nNghe nói làm tiếp viên hàng không răng phải đều nên Khánh Linh quyết tâm niềng răng 4 năm trời.\r\n\"></figure><p>Nghe nói làm tiếp viên hàng không răng phải đều nên Khánh Linh quyết tâm niềng răng 4 năm trời.</p><p>Cô gái Kiên Giang kể: “<i>Mình niềng năm mình học lớp 8. Răng mình lúc đó quá xấu và lúc nhỏ mình có ước mơ làm tiếp viên hàng không nhưng nghe người lớn nói làm tiếp viên hàng không răng phải đều nên mình quyết định niềng răng.</i></p><p><i>Lúc đầu niềng răng mình hơi sợ vì mình phải nhổ đi 4 cây răng. Và thời gian đầu đeo niềng hơi đau nên chỉ ăn cháo và thức ăn mềm. Sau này quen rồi thì bình thường, chỉ nên tránh ăn những món cứng. Lúc mình mới niềng thì mình rất ngại, ít dám cười. Nếu cười cũng che miệng. Sau này thì mình thoải mái nên cười không ngại nữa</i>.”</p><p>Cuối cùng sau 4 năm kiên trì niềng răng, Khánh Linh đã nhận thành quả xứng đáng. “<i>Lúc niềng răng toàn bị tụi bạn chọc là răng sắt. Và bây giờ… Dám thề là ngoài niềng răng mình không tiêm hay sửa gì hết</i>” – Linh tự tin chia sẻ trên mạng xã hội.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai3-1523166236684152988731.jpg\" alt=\"\r\nHàm răng thẳng, đều, trắng giúp Linh có nụ cười tỏa nắng\r\n\"></figure><p>Hàm răng thẳng, đều, trắng giúp Linh có nụ cười tỏa nắng</p><p>Cô nàng tuyên bố như vậy là bởi gương mặt của cô hiện quá đỗi xinh đẹp. Hàm răng thẳng, đều, trắng giúp Linh có nụ cười tỏa nắng. Không những thế, mắt, mũi và vóc dáng của Linh đều rất cuốn hút người khác.</p><p>Nhờ vẻ đẹp này, cô gái nhanh chóng gây chú ý trên mạng xã hội. Facebook của Linh hiện có hơn 4000 người theo dõi và mỗi bức ảnh cô nàng đăng lên đều có hàng trăm, hàng nghìn lượt like và bình luận.</p><p>Nhiều bạn còn dành tặng lời khen đặc biệt cho Linh. “<i>Có ai nói em giống diễn viên Thúy Diễm chưa? Em cười chị thấy y chang cô ấy”, “Cái khuôn mặt này. Đẹp ở cái môi, cái mũi, và đôi mắt”. “Mặt xinh từ bé, không niềng cũng xinh”</i>&nbsp;– cư dân mạng bình luận về nhan sắc của Linh.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai4-15231662366881787751593.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai5-1523166236692208619592.jpg\" alt=\"\r\nCô gái Kiên Giang nhanh chóng nổi tiếng trên mạng xã hội.\r\n\"></figure><p>Cô gái Kiên Giang nhanh chóng nổi tiếng trên mạng xã hội.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/congai6-15231662367061359685721.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai7-15231662367161700170738.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai8-1523166236724442704568.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai9-152316623673015951600.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai10-15231662367342050533838.jpg\" alt=\"\r\nGiờ đây, Linh tự tin và cười nhiều hơn.\r\n\"></figure><p>Giờ đây, Linh tự tin và cười nhiều hơn.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai12-15231662367381512300089.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai13-15231662367421880134437.jpg\" alt=\"\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/2018/4/8/congai14-15231662367482067920988.jpg\" alt=\"\"></figure><p><br>Theo&nbsp;<strong>Thái Hòa</strong></p>', '1539707694Lighthouse.jpg', 0),
(16, 1, 'Nữ sinh HV Ngoại giao trổ tài hát chầu văn, múa lụa hoành tráng\'1', '<p>Phần thể hiện ca trù của thí sinh Hoàng Lê Mỹ Uyên, tiết mục múa đương đại của thí sinh Trần Hồng Hạnh, tiết mục kịch hình thể của thí sinh Trần Huyền Trang, tiết mục chầu văn của thí sinh Ngô Nhật Lệ và cuối cùng là tiết mục hát, nhảy hiện đại của thí sinh Nguyễn Minh Châu là 5 tiết mục được đánh giá xuất sắc nhất đêm Bán kết Tài năng Hoa khôi Ngoại giao 2018.</p>', '<p>“Hoa khôi Ngoại giao - Miss DAV 2018” là cuộc thi dành riêng cho các nữ sinh Học viện Ngoại giao. Với khẩu hiểu: “Tự tin nâng tầm vẻ đẹp – Confidence cherishes beauty”, cuộc thi là cơ hội cho các bạn nữ Học viện Ngoại giao thể hiện sự tự tin, tài năng, trí tuệ, lòng nhân ái cũng như nét duyên dáng của mình.</p><p>Bên cạnh đó, cuộc thi còn là cơ hội để các nữ sinh được giao lưu, học hỏi, trau giồi kiến thức xã hội, khẳng định phong cách, thể hiện tài năng - trí tuệ, rèn luyện kỹ năng mềm của mình.</p><p>Trải qua vòng Sơ khảo, 18 thí sinh xuất sắc nhất đã được lựa chọn để tiếp tục tham gia vòng Bán kết tối ngày 7/4 với hai nội dung chính: Phần thi Ảnh và phần thi Tài năng. Đêm bán kết diễn ra trong không khí chuyên nghiệp với sự đầu tư tập luyện của 18 thí sinh.</p><p>18 tiết mục là 18 cá tính khác nhau, mang đến nhiều màu sắc. Từ những tiết mục hát múa dân gian đến các tiết mục khó, đòi hỏi kỹ thuật cao như ca trù, chầu văn,... đều được tái hiện rõ nét trên sân khấu của đêm Bán kết. Đặc biệt, top 18 còn đem đến sự bùng nổ với những tiết mục nhảy hiện đại đầy quyến rũ.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-1-15231545316081742651548.jpg\" alt=\"Tiết mục hát múa “Giấc mơ trưa” của thí sinh Lê Ngọc Thùy Dương\"></figure><p>Tiết mục hát múa “Giấc mơ trưa” của thí sinh Lê Ngọc Thùy Dương</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-3-15231545316241551231205.jpg\" alt=\"Thí sinh Uông Hoàng Ngân mang đến tiết mục nhảy hiện đại “As if its your last – Bhoom Bhoom”\"></figure><p>Thí sinh Uông Hoàng Ngân mang đến tiết mục nhảy hiện đại “As if its your last – Bhoom Bhoom”</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-4-15231545316261663641082.jpg\" alt=\"Mộc mạc nhẹ nhàng với tiết mục đàn tranh “Bèo dạt mây trôi” của thí sinh\"></figure><p>Mộc mạc nhẹ nhàng với tiết mục đàn tranh “Bèo dạt mây trôi” của thí sinh</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-5-1523154531629940155903.jpg\" alt=\"Tiết mục múa dân gian “Đào liễu” của thí sinh Trần Hồng Hạnh\"></figure><p>Tiết mục múa dân gian “Đào liễu” của thí sinh Trần Hồng Hạnh</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-7-152315453163437780693.jpg\" alt=\"Lắng đọng và đầy cảm xúc với tiết mục diễn thuyết về Mẹ của Nguyễn Thị Mỹ Hạnh\"></figure><p>Lắng đọng và đầy cảm xúc với tiết mục diễn thuyết về Mẹ của Nguyễn Thị Mỹ Hạnh</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-8-15231545316361243820813.jpg\" alt=\"Vũ Thùy Linh thể hiện tiết mục múa đương đại “My heart will go on”\"></figure><p>Vũ Thùy Linh thể hiện tiết mục múa đương đại “My heart will go on”</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-9-1523154531638675040739.jpg\" alt=\"Tiết mục tổng hợp múa dân gian đương đại qua các thời kỳ của thí sinh Nguyễn Ngọc Anh\"></figure><p>Tiết mục tổng hợp múa dân gian đương đại qua các thời kỳ của thí sinh Nguyễn Ngọc Anh</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-10-15231545316401294340393.jpg\" alt=\"Trần Huyền Trang với tiết mục kịch hình thể mới lạ\"></figure><p>Trần Huyền Trang với tiết mục kịch hình thể mới lạ</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-14-1523154531650320011402.jpg\" alt=\"Hoàng Hà Thu đầy bí ẩn khi trình diễn ảo thuật\"></figure><p>Hoàng Hà Thu đầy bí ẩn khi trình diễn ảo thuật</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://dantricdn.com/thumb_w/640/2018/4/8/hoa-khoi-ngoai-giao-15-15231545316541994595018.jpg\" alt=\"Tiết mục múa lụa hoành tráng của thí sinh Trương Hồng Giang\"></figure><p>Tiết mục múa lụa hoành tráng của thí sinh Trương Hồng Giang</p><p><strong>Kim Bảo Ngân</strong></p>', '1539685172Penguins.jpg', 0),
(17, 3, 'Ảnh 2', '																			1ww																										', '																				ww																															', '1540308384Hydrangeas.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieucham`
--

CREATE TABLE `tbl_phieucham` (
  `pk_khoanmucdiem_id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `c_tenkhoanmuc` varchar(1000) NOT NULL,
  `c_diemtoida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieucham`
--

INSERT INTO `tbl_phieucham` (`pk_khoanmucdiem_id`, `parentId`, `c_tenkhoanmuc`, `c_diemtoida`) VALUES
(2, 0, 'Mức độ hoàn thành so với đăng kí trong Thuyết minh đề tài', 80),
(3, 0, 'Các kết quả vượt trội (chọn 1 trong 2 tiêu chí)', 15),
(6, 3, 'Có bài báo đăng tạp chí uy tín trong nước được HĐCD nhà nước công nhận', 10),
(9, 3, 'Có bài báo khoa học đăng trên tạp chí quốc tế', 15),
(12, 2, 'Tổng quan tình hình nghiên cứu', 15),
(13, 0, 'Chất lượng báo cáo tổng kết và báo cáo tóm tắt đề tài', 5),
(16, 2, 'Mục tiêu/ giải quyết câu hỏi nghiên cứu', 15),
(20, 2, 'Nội dung nghiên cứu', 40),
(21, 2, 'Phương pháp nghiên cứu', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `pk_slide_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slide`
--

INSERT INTO `tbl_slide` (`pk_slide_id`, `c_name`, `c_img`) VALUES
(1, 'Đại học Thăng Long', '1539684896đh thang long 3.jpg'),
(4, 'Quầy sách', '1539684877truong-1.jpg'),
(5, 'Vườn sinh viên', '1539684914DSC_0628-35246.jpg'),
(6, 'Seft Study', '1539684935dai hoc thang long (22).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tiendo`
--

CREATE TABLE `tbl_tiendo` (
  `pk_tiendo_id` int(11) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_mabomon_id` int(11) NOT NULL,
  `c_tungay` date NOT NULL,
  `c_denngay` date NOT NULL,
  `c_noidungtiendo` varchar(1000) NOT NULL,
  `c_hoanthanhtiendo` varchar(50) NOT NULL,
  `c_ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_tiendo`
--

INSERT INTO `tbl_tiendo` (`pk_tiendo_id`, `fk_madetai_id`, `fk_user_id`, `fk_mabomon_id`, `c_tungay`, `c_denngay`, `c_noidungtiendo`, `c_hoanthanhtiendo`, `c_ghichu`) VALUES
(1, 41, 0, 0, '2018-11-17', '2018-11-08', 'xây dựng modull quản lý', '80', 'no'),
(2, 42, 0, 0, '2018-11-23', '2018-11-22', 'xây dựng modull quản lý', '80', ''),
(3, 42, 0, 0, '2018-11-23', '2018-11-30', 'hoàn thành', '80', ''),
(4, 41, 0, 0, '2018-11-15', '2018-11-22', 'xây dựng modull quản lý', '80', ''),
(5, 41, 0, 0, '2018-11-23', '2018-11-23', 'xây dựng modull quản lý', '80', ''),
(6, 42, 0, 0, '2018-11-15', '2018-11-15', 'xây dựng modull quản lý', '80', ''),
(7, 47, 0, 0, '2018-11-16', '2018-11-23', 'xây dựng modull quản lý', '80', ''),
(8, 47, 0, 0, '2018-11-09', '2018-11-04', 'xây dựng modull quản lý', '80', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `pk_user_id` int(11) NOT NULL,
  `c_fullname` varchar(500) NOT NULL,
  `fk_mabomon_id` int(11) NOT NULL,
  `c_hocham` varchar(500) NOT NULL,
  `c_hocvi` varchar(500) NOT NULL,
  `c_ngaysinh` date NOT NULL,
  `c_diachi` varchar(500) NOT NULL,
  `c_sdt` int(11) NOT NULL,
  `c_email` varchar(500) NOT NULL,
  `c_password` varchar(500) NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`pk_user_id`, `c_fullname`, `fk_mabomon_id`, `c_hocham`, `c_hocvi`, `c_ngaysinh`, `c_diachi`, `c_sdt`, `c_email`, `c_password`, `UserType`) VALUES
(20, 'Nguyễn Văn C', 64, 'không', 'không', '1990-10-18', 'Hà Nội', 168464784, 'hoidong1@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(76, 'Ngô Thanh Tâm', 63, 'không', 'Tiến sĩ', '2018-10-12', 'Hà nội', 985698736, 'truongbomonkt@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(77, 'Nguyễn Văn A', 61, 'không', 'Tiến sĩ', '2018-10-14', 'Hà nội', 985698736, 'truongbomontin@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(78, 'Ngô Thị Thắm', 61, 'không', 'Tiến sĩ', '2018-10-12', 'Hà nội', 985698736, 'giaovientin@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(79, 'Vũ Thị Hoa', 61, 'không', 'Tiến sĩ', '2018-10-14', 'Hà nội', 985698736, 'giaovientin1@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(80, 'Đỗ Ngọc Mai', 63, 'không', 'Tiến sĩ', '2018-10-05', 'Hà nội', 985698736, 'giaovienkt@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(81, 'Nguyễn Minh Hòa', 64, 'không', 'Tiến sĩ', '2018-11-16', 'Hà nội', 985698736, 'admin@mail.com', '202cb962ac59075b964b07152d234b70', 0),
(82, 'Trần Văn Đức', 61, 'không', 'Tiến sĩ', '2018-10-31', 'Hà nội', 985698736, 'giaovientin2@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(83, 'Nguyễn Văn Tiến', 61, 'không', 'Tiến sĩ', '2018-11-16', 'Hà nội', 985698736, 'giaovientin3@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(84, 'Đỗ Thị Thu Hiền', 63, 'không', 'Tiến sĩ', '2018-11-17', 'Hà nội', 985698736, 'giaovienkt1@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(85, 'Đỗ Thị Huế', 63, 'không', 'Tiến sĩ', '2018-11-10', 'Hà nội', 985698736, 'giaovienkt2@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(86, 'Ngô Thanh Nga', 59, 'không', 'Tiến sĩ', '2018-11-02', 'Hà nội', 985698736, 'truongbomontoan@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(87, 'Đào Quang Vinh', 61, 'không', 'Tiến sĩ', '2018-11-03', 'Hà nội', 985698736, 'giaovientin4@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(88, 'Đào Quang Hưng', 63, 'không', 'Tiến sĩ', '2018-11-23', 'Hà nội', 985698736, 'giaovienkt3@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(89, 'Nguyễn Thu Trang', 59, 'không', 'Tiến sĩ', '2018-11-23', 'Hà nội', 985698736, 'giaovientoan@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `pk_vaitro_id` int(11) NOT NULL,
  `c_vaitro` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`pk_vaitro_id`, `c_vaitro`) VALUES
(1, 'Thư ký'),
(2, 'Chủ tịch'),
(3, 'Phản biện 1'),
(4, 'Phản biện 2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_bomon`
--
ALTER TABLE `tbl_bomon`
  ADD PRIMARY KEY (`pk_mabomon_id`);

--
-- Chỉ mục cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  ADD PRIMARY KEY (`pk_category_news_id`);

--
-- Chỉ mục cho bảng `tbl_detai`
--
ALTER TABLE `tbl_detai`
  ADD PRIMARY KEY (`pk_madetai_id`);

--
-- Chỉ mục cho bảng `tbl_detai_phieucham`
--
ALTER TABLE `tbl_detai_phieucham`
  ADD PRIMARY KEY (`pk_detai_phieucham_id`);

--
-- Chỉ mục cho bảng `tbl_diem_phieucham`
--
ALTER TABLE `tbl_diem_phieucham`
  ADD PRIMARY KEY (`PointId`);

--
-- Chỉ mục cho bảng `tbl_giaovien`
--
ALTER TABLE `tbl_giaovien`
  ADD PRIMARY KEY (`pk_magiaovien_id`);

--
-- Chỉ mục cho bảng `tbl_hoidong`
--
ALTER TABLE `tbl_hoidong`
  ADD PRIMARY KEY (`pk_hoidong_id`);

--
-- Chỉ mục cho bảng `tbl_hoidongnghiemthu`
--
ALTER TABLE `tbl_hoidongnghiemthu`
  ADD PRIMARY KEY (`pk_hoidongnghiemthu_id`);

--
-- Chỉ mục cho bảng `tbl_hoidong_detai`
--
ALTER TABLE `tbl_hoidong_detai`
  ADD PRIMARY KEY (`pk_hoidong_id`);

--
-- Chỉ mục cho bảng `tbl_lichbaove`
--
ALTER TABLE `tbl_lichbaove`
  ADD PRIMARY KEY (`pk_lichbaove_id`);

--
-- Chỉ mục cho bảng `tbl_nam`
--
ALTER TABLE `tbl_nam`
  ADD PRIMARY KEY (`pk_nam_id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`pk_news_id`);

--
-- Chỉ mục cho bảng `tbl_phieucham`
--
ALTER TABLE `tbl_phieucham`
  ADD PRIMARY KEY (`pk_khoanmucdiem_id`);

--
-- Chỉ mục cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`pk_slide_id`);

--
-- Chỉ mục cho bảng `tbl_tiendo`
--
ALTER TABLE `tbl_tiendo`
  ADD PRIMARY KEY (`pk_tiendo_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`pk_user_id`);

--
-- Chỉ mục cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`pk_vaitro_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_bomon`
--
ALTER TABLE `tbl_bomon`
  MODIFY `pk_mabomon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  MODIFY `pk_category_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_detai`
--
ALTER TABLE `tbl_detai`
  MODIFY `pk_madetai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_detai_phieucham`
--
ALTER TABLE `tbl_detai_phieucham`
  MODIFY `pk_detai_phieucham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_diem_phieucham`
--
ALTER TABLE `tbl_diem_phieucham`
  MODIFY `PointId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_giaovien`
--
ALTER TABLE `tbl_giaovien`
  MODIFY `pk_magiaovien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_hoidong`
--
ALTER TABLE `tbl_hoidong`
  MODIFY `pk_hoidong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_hoidongnghiemthu`
--
ALTER TABLE `tbl_hoidongnghiemthu`
  MODIFY `pk_hoidongnghiemthu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_hoidong_detai`
--
ALTER TABLE `tbl_hoidong_detai`
  MODIFY `pk_hoidong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_lichbaove`
--
ALTER TABLE `tbl_lichbaove`
  MODIFY `pk_lichbaove_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nam`
--
ALTER TABLE `tbl_nam`
  MODIFY `pk_nam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `pk_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_phieucham`
--
ALTER TABLE `tbl_phieucham`
  MODIFY `pk_khoanmucdiem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `pk_slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_tiendo`
--
ALTER TABLE `tbl_tiendo`
  MODIFY `pk_tiendo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `pk_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `pk_vaitro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
