create database QuanLyNhanSu;
use QuanLyNhanSu;

CREATE TABLE `CHINHANH` (
  `MaChiNhanh` varchar(40) NOT NULL,
  `TenChiNhanh` varchar(40) NOT NULL,
  `DiaChi` varchar(40) NOT NULL,
  `MaCongTy` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `CHINHANH` (`MaChiNhanh`, `TenChiNhanh`, `DiaChi`, `MaCongTy`) VALUES
('CN01', 'Đà Nẵng', '56 Lê Duẩn, Q.Hải Châu', 'CT01'),
('CN02', 'Hồ Chí Minh', '321 Điện Biên Phủ, Q.Bình Thạnh', 'CT02'),
('CN03', 'Cần Thơ', '98 Mậu Thân, Q.Ninh Kiều', 'CT03');

CREATE TABLE `CONGTY` (
  `MaCongTy` varchar(40) NOT NULL,
  `TenCongTy` varchar(40) NOT NULL,
  `DiaChi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `CONGTY` (`MaCongTy`, `TenCongTy`, `DiaChi`) VALUES
('CT01', 'Điện Máy Xanh', '220 Cách Mạng Tháng 8, Q.3, TP HCM'),
('CT02', 'FPT Shop', '45 Hoàng Diệu, Q.4, TP HCM'),
('CT03', 'Mobile World', '72 Trần Phú, Q.Hải Châu, Đà Nẵng');

CREATE TABLE `NHANVIEN` (
  `MaNhanVien` varchar(40) NOT NULL,
  `TenNhanVien` varchar(40) NOT NULL,
  `LuongThang` float NOT NULL,
  `GioiTinh` tinyint(4) NOT NULL,
  `MaPhong` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `NHANVIEN` (`MaNhanVien`, `TenNhanVien`, `LuongThang`, `GioiTinh`, `MaPhong`) VALUES
('NV01', 'Nguyễn Thị Mai', 28000000, 0, 'PB02'),
('NV02', 'Trần Văn An', 26000000, 1, 'PB01'),
('NV03', 'Lê Thị Hương', 32000000, 0, 'PB03');

CREATE TABLE `PHONGBAN` (
  `MaPhong` varchar(40) NOT NULL,
  `TenPhong` varchar(40) NOT NULL,
  `MaChiNhanh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `PHONGBAN` (`MaPhong`, `TenPhong`, `MaChiNhanh`) VALUES
('PB01', 'Kế toán', 'CN01'),
('PB02', 'Kinh doanh', 'CN02'),
('PB03', 'Tài chính', 'CN03'),
('PB04', 'Quản trị', 'CN03'),
('PB05', 'Sản xuất', 'CN01');

ALTER TABLE `CHINHANH`
  ADD PRIMARY KEY (`MaChiNhanh`),
  ADD KEY `MaCongTy` (`MaCongTy`);

ALTER TABLE `CONGTY`
  ADD PRIMARY KEY (`MaCongTy`);

ALTER TABLE `NHANVIEN`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `MaPhong` (`MaPhong`);

ALTER TABLE `PHONGBAN`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaChiNhanh` (`MaChiNhanh`);

ALTER TABLE `CHINHANH`
  ADD CONSTRAINT `CHINHANH_ibfk_1` FOREIGN KEY (`MaCongTy`) REFERENCES `CONGTY` (`MaCongTy`);

ALTER TABLE `NHANVIEN`
  ADD CONSTRAINT `NHANVIEN_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `PHONGBAN` (`MaPhong`);

ALTER TABLE `PHONGBAN`
  ADD CONSTRAINT `PHONGBAN_ibfk_1` FOREIGN KEY (`MaChiNhanh`) REFERENCES `CHINHANH` (`MaChiNhanh`);
COMMIT;