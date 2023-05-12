CREATE TABLE pesanan (
   id_pesanan INT PRIMARY key auto_increment,
   id_cust INT,
   id_driver INT,
   titik_jemput LONGTEXT,
   tujuan LONGTEXT,
   biaya_perjalanan INT(14),
   biaya_aplikasi INT(14),
   total_bayar INT(14),
   metode_bayar VARCHAR(50),
   created_date DATETIME
);

CREATE TABLE driver (
   id_driver INT PRIMARY key auto_increment,
   nama_depan VARCHAR(50),
   nama_belakang VARCHAR(50),
   no_plat VARCHAR(10),
   jenis_mobil VARCHAR(50)   
);

CREATE TABLE customer (
   id_cust INT PRIMARY key auto_increment,
   nama_depan VARCHAR(50),
   nama_belakang VARCHAR(50),
   username VARCHAR(50),
   password VARCHAR(50)
);

ALTER TABLE pesanan
ADD CONSTRAINT cust_FK FOREIGN KEY (id_cust)
REFERENCES customer(id_cust);

ALTER TABLE pesanan
ADD CONSTRAINT driver_FK FOREIGN KEY (id_driver)
REFERENCES driver(id_driver);

insert into driver 
values ( null , 'Aditya', 'Nugroho', 'AA 5123 FA', 'Hyundai Ionic 5'),
(null , 'Anas', 'Satria', 'B 3729 AS', 'Honda CRV' ),
(null , 'Budi', 'Santoso', 'G 5769 SB', 'Honda HRV' ),
(null , 'Asep', 'Sutisna', 'T 3921 GT', 'Toyota Agya' ),
(null , 'Udin', 'Sarudi', 'S 9103 TP', 'Kijang Inova' );

insert into customer 
values (null, 'Adinda', 'Putri', 'user0', 'pass123'), 
(null, 'Fikri', 'Putra', 'user1', 'pass123'),
(null, 'Hamzah', 'Haz', 'user2', 'pass123');

select id_driver from driver where no_plat = 'S 9103 TP';
select id_cust  from customer c where username = 'user2';

insert into pesanan 
values (null, (select id_cust from customer where username = 'user2'), 
(select id_driver from driver where no_plat = 'S 9103 TP'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Komp. Buah Batu Regency A2 No.9 - 10 Kel. Kujangsari / Cijawura, Kujangsari, Bandung Kidul, Bandung City, West Java 40287',
25000, 5000, 30000, 'Tunai', '2023-05-11');

insert into pesanan 
values (null, (select id_cust from customer where username = 'user0'), 
(select id_driver from driver where jenis_mobil = 'Honda CRV'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Komp. Buah Batu Regency A2 No.9 - 10 Kel. Kujangsari / Cijawura, Kujangsari, Bandung Kidul, Bandung City, West Java 40287',
25000, 5000, 30000, 'Tunai', '2023-05-12');

select * from driver where id_driver in (select id_driver from pesanan p where id_cust = 1);

update pesanan 
set biaya_aplikasi = 6000 
where id_driver = (select id_driver  from driver where id_driver = 2);
update pesanan 
set total_bayar = 33000 
where id_cust = (select id_cust from customer where username = 'user0');

delete from pesanan 
where id_cust = (select id_cust from customer where username = 'user0')
&& id_driver = 2;

insert into pesanan 
values (null, (select id_cust from customer where username = 'user1'), 
(select id_driver from driver where jenis_mobil = 'Honda CRV'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Sukajadi No.131-139, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162',
67000, 5000, 72000, 'QRIS', '2023-05-12'),
(null, (select id_cust from customer where username = 'user2'), 
(select id_driver from driver where jenis_mobil = 'Hyundai Ionic 5'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Purnawarman No.13-15, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117',
49000, 5000, 54000, 'QRIS', '2023-05-12');

select d.*, p3.total_bayar as tota_bayar_tertinggi from driver d 
join pesanan p3 ON p3.id_driver = d.id_driver 
where d.id_driver = 
( select id_driver from pesanan p2 where p2.total_bayar = 
(select max(p.total_bayar) from pesanan p) );

insert into pesanan 
values (null, (select id_cust from customer where username = 'user0'), 
(select id_driver from driver where jenis_mobil = 'Kijang Inova'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Sukajadi No.131-139, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162',
62000, 5000, 67000, 'QRIS', '2023-05-12'),
(null, (select id_cust from customer where username = 'user0'), 
(select id_driver from driver where jenis_mobil = 'Hyundai Ionic 5'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Purnawarman No.13-15, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117',
44000, 5000, 49000, 'QRIS', '2023-05-12');
insert into pesanan 
values (null, (select id_cust from customer where username = 'user1'), 
(select id_driver from driver where jenis_mobil = 'Kijang Inova'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Sukajadi No.131-139, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162',
62000, 5000, 67000, 'Tunai', '2023-05-12'),
(null, (select id_cust from customer where username = 'user2'), 
(select id_driver from driver where jenis_mobil = 'Hyundai Ionic 5'),  
'Kp. Cijeungjing RT 05 / RW 01, No 44, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
'Jl. Purnawarman No.13-15, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117',
44000, 5000, 49000, 'Tunai', '2023-05-12');

SELECT nama_depan, nama_belakang, metode_bayar, total_uang 
FROM (SELECT p.id_cust, p.metode_bayar, SUM(total_bayar) as total_uang
      FROM pesanan p
      GROUP BY p.id_cust) as p1
JOIN customer c ON p1.id_cust = c.id_cust
WHERE p1.id_cust = 2;

SELECT d.nama_depan , d.jenis_mobil , id_cust , total_bayar  
FROM pesanan p 
JOIN driver d ON d.id_driver = p.id_driver 
WHERE id_cust = 1
UNION
SELECT d1.nama_depan , d1.jenis_mobil , id_cust , total_bayar
FROM pesanan p2 
join driver d1 on d1.id_driver = p2.id_driver
WHERE id_cust = 2;

SELECT d.*
FROM pesanan p 
join driver d on d.id_driver = p.id_driver 
WHERE p.id_cust  = 3
INTERSECT
SELECT d1.*
FROM pesanan p1 
join driver d1 on d1.id_driver = p1.id_driver 
WHERE p1.id_cust  = 2;












