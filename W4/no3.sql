start transaction

set autocommit=0;

select * from products p

insert into products
values ("S99_0985", "9087 Motor Balap 5", "Motorcycles", "1:10", "ApaAja", "", "9999", "45.45", "98.03"),
("S99_0986", "9087 Motor Balap 5", "Motorcycles", "1:10", "ApaAja", "", "9999", "45.45", "98.03"),
("S99_0987", "9087 Motor Balap 5", "Motorcycles", "1:10", "ApaAja", "", "9999", "45.45", "98.03"),
("S99_0988", "9087 Motor Balap 5", "Motorcycles", "1:10", "ApaAja", "", "9999", "45.45", "98.03"),
("S99_0989", "9087 Motor Balap 5", "Motorcycles", "1:10", "ApaAja", "", "9999", "45.45", "98.03");

select * from products p

select * from employees e 

insert into employees 
values (1122, "Hamzah", "Nur", "x1122", "email@mail.com", 1, null, "Investor");

select * from employees e

commit

savepoint insertdata;

update employees set reportsTo = 1002 where employeeNumber = 1122;

delete from employees where employeeNumber = 1122;

select * from employees e 

rollback to savepoint insertdata;

select * from employees e