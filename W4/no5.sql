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

select * from driver where id_driver = (select id_driver from pesanan p where id_cust = 1);

update pesanan 
set biaya_perjalanan = 28000 
where id_cust = (select id_cust from customer where username = 'user0');
update pesanan 
set total_bayar = 33000 
where id_cust = (select id_cust from customer where username = 'user0');

delete from pesanan 
where id_cust = (select id_cust from customer where username = 'user0');



