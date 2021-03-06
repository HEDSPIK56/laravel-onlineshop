--1. Tạo cơ sở dữ liệu

create database SieuThiDB
-- Nhớ refesh sau khi thực thi
go
--2. Chọn cơ sở dữ liệu để thao tác
use SieuThiDB
go 
--3. Tạo bảng và khóa chính
create table SanPham
(
	MaSanPham char(4),
	Ten nvarchar(40),
	GiaTien float,
	DonViTinh nvarchar(10),
	SoLuongTon int,
	MaLoai char(1),
	primary key (MaSanPham)	
)

create table LoaiSanPham
(
	MaLoai char(1),
	TenLoai nvarchar(30),
	primary key (MaLoai)
)

create table KhachHang
(
	MaKH char(4),
	HoTen nvarchar(40),
	DiaChi nvarchar(20),
	DienThoai char(15),
	NamSinh int,
	GioiTinh nchar(3),
	primary key (MaKH)
)

create table HoaDon
(
	MaHD char(4),
	NgayLap datetime,
	MaKH char(4),
	primary key (MaHD)
)

create table CTHD
(
	MaHD char(4),
	MaSP char(4),
	SoLuong int,
	DonGia int,
	primary key (MaHD, MaSP)
)

alter table SanPham add 
constraint FK_SanPham_LoaiSanPham
foreign key (MaLoai)
references LoaiSanPham (MaLoai)

alter table CTHD add 
constraint FK_CTHD_HoaDon 
foreign key (MaHD)
references HoaDon (MaHD),
constraint FK_CTHD_SanPham
foreign key (MaSP) references SanPham (MaSanPham)

alter table HoaDon add
constraint FK_HoaDon_KhachHang
foreign key (MaKH)
references KhachHang (MaKH)

-- Nhập dữ liệu
insert into LoaiSanPham (MaLoai, TenLoai) values 
 ('A', N'Đồ Dùng'),
 ('B', N'Nồi cơm điện'),
 ('C', N'Đèn điện')

insert into SANPHAM (MaSanPham, Ten, GiaTien, SoLuongTon, DonViTinh, MaLoai) values
('SP01', N'Bột giặt Omo',30,70,N'túi','A'),
('SP02', N'Bột giặt Tide',25,200,N'túi','A'),
('SP03', N'Đèn bàn Rạng Đông',100,90,N'cái','C'),
('SP04', N'Nồi cơm điện SHARP 3041',2500,10,N'cái','B'),
('SP05', N'Bàn chải đánh răng PS',12,12,N'cái','A'),
('SP06', N'Nồi cơm điện PANASONIC 2097',2000, 8,N'cái','B'),
('SP07', N'Bàn chải đánh rang Colgate',16,100,N'cái','A')


insert into KhachHang values
('KH01', N'Nguyễn Thanh Tùng', N'Hồ Chí Minh', '9-9091-2233', 1984, N'Nam'),
('KH02', N'Lê Nhật Nam', N'Hồ Chí Minh', '9-1234-2134', 1972, N'Nữ'),
('KH03', N'Nguyễn Thị Thanh', N'Cà Mau', '9-2222-3333', 1981, N'Nữ'),
('KH04', N'Lê Thị Lan', N'Bình Dương', '9-1111-1111', 1984, N'Nữ'),
('KH05', N'Trần Minh Quang', N'Đồng Nai', '9-2222-5555', 1984, N'Nam'),
('KH06', N'Lê Văn Hải', N'Hồ Chí Minh', '9-1234-4321', 1970, N'Nam'),
('KH07', N'Dương Văn Hai', N'Đồng Nai', '9-1111-0000', 1988, N'Nam')

set dateformat dmy 
insert into HoaDon values
('HD01', N'20/3/2011', 'KH01'),
('HD02', N'15/2/2011', 'KH02'),
('HD03', N'18/1/2011', 'KH05'),
('HD04', N'16/9/2010', 'KH01'),
('HD05', N'27/2/2011', 'KH02')

set dateformat mdy 

insert into CTHD values
('HD01', 'SP01', 2, 30),
('HD01', 'SP02', 2, 25),
('HD02', 'SP01', 3, 30),
('HD03', 'SP02', 3, 25),
('HD03', 'SP03', 1, 90),
('HD03', 'SP01', 3, 30),
('HD04', 'SP04', 1, 2400),
('HD05', 'SP06', 1, 2000),
('HD05', 'SP01', 5, 30)

