SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `HOADON` (
  `SOHD` int(11) NOT NULL,
  `NGHD` datetime NOT NULL,
  `HOTENKH` varchar(50) NOT NULL,
  `SDT` char(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `TINH` varchar(20) NOT NULL,
  `QUAN` varchar(20) NOT NULL,
  `PHUONG` varchar(20) NOT NULL,
  `THANHTOAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `HOADON` (`SOHD`, `NGHD`, `HOTENKH`, `SDT`, `EMAIL`, `DIACHI`, `TINH`, `QUAN`, `PHUONG`, `THANHTOAN`) VALUES
(987654321, '2023-11-16 10:30:45', 'Nguyen Thi An', '0987654321', 'an.nguyen@gmail.com', '456 Le Loi', 'Ha Noi', 'Ba Dinh', 'Truc Bach', 0),
(456789012, '2023-11-16 10:35:20', 'Le Van Binh', '0918765432', 'binh.le@gmail.com', '789 Phan Chu Trinh', 'Da Nang', 'Hai Chau', 'Thanh Khe', 0),
(112233445, '2023-11-16 10:40:15', 'Tran Van Cuong', '0123456789', 'cuong.tran@gmail.com', '101 Nguyen Hue', 'Can Tho', 'Ninh Kieu', 'An Binh', 0),
(998877665, '2023-11-16 10:45:50', 'Pham Thi My Linh', '0897654321', 'mylinh.pham@gmail.com', '567 Tran Phu', 'Hai Phong', 'Hong Bang', 'Ngo Quyen', 0);


CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'quile', '31103'),
(2, 'lequi', '12345');

CREATE TABLE `QLSP` (
  `SOHD` int(11) NOT NULL,
  `MASP` char(4) NOT NULL,
  `SL` int(11) NOT NULL,
  `DONGIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `QLSP` (`SOHD`, `MASP`, `SL`, `DONGIA`) VALUES
(987654321, 'SP01', 4, 20000),
(987654321, 'SP05', 1, 8000),
(987654321, 'SP06', 1, 15000),
(456789012, 'SP04', 2, 50000),
(456789012, 'SP03', 2, 40000),
(456789012, 'SP08', 2, 14000),
(112233445, 'SP01', 1, 5000),
(112233445, 'SP02', 1, 10000),
(112233445, 'SP03', 1, 20000),
(998877665, 'SP01', 1, 5000),
(998877665, 'SP04', 1, 25000),
(998877665, 'SP03', 1, 20000),
(998877665, 'SP08', 1, 7000);

CREATE TABLE `SANPHAM` (
  `MASP` char(4) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `DVT` varchar(50) NOT NULL,
  `NUOCSX` varchar(50) NOT NULL,
  `GIA` int(11) NOT NULL,
  `HINHANH` varchar(50) NOT NULL,
  `LOAISP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `SANPHAM` (`MASP`, `TenSP`, `DVT`, `NUOCSX`, `GIA`, `HINHANH`, `LOAISP`) VALUES
('SP01', 'Phan viet bang', 'hop', 'VietNam', 5000, './../image/phan.jpeg', 'phan'),
('SP02', 'Phan viet khong bui', 'hop', 'VietNam', 10000, './../image/phan.jpeg', 'phan'),
('SP03', 'But bi Thien Long', 'hop', 'VietNam', 20000, './../image/but.jpeg', 'but'),
('SP04', 'But muc Thien Long', 'hop', 'VietNam', 25000, './../image/but_muc.jpeg', 'but'),
('SP05', 'Vo 200 trang', 'cuon', 'VietNam', 8000, './../image/vo.jpeg', 'tap'),
('SP06', 'Bang hoc sinh Thien Long', 'cai', 'VietNam', 15000, './../image/bang.jpeg', 'bang'),
('SP07', 'Vo campus', 'cuon', 'VietNam', 10000, './../image/vo_2.jpeg', 'tap'),
('SP08', 'But muc do', 'cay', 'VietNam', 7000, './../image/but_muc_do.jpeg', 'but');

ALTER TABLE `HOADON`
  ADD PRIMARY KEY (`SOHD`);

ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `QLSP`
  ADD KEY `SOHD` (`SOHD`),
  ADD KEY `QLSP_ibfk_1` (`MASP`);

ALTER TABLE `SANPHAM`
  ADD PRIMARY KEY (`MASP`);
ALTER TABLE `QLSP`
  ADD CONSTRAINT `QLSP_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `SANPHAM` (`MaSP`);
COMMIT;
ALTER TABLE sanpham MODIFY COLUMN HINHANH varchar(200);