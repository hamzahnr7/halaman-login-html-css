select * from employees e 

select * from employees e where jobTitle = 'President'

create index product_name on products(productName);

explain select * from products p where p.productLine = 'Classic Cars'

select * from orders o join orderdetails o2 on o.orderNumber = o2.orderNumber where o.orderNumber = 10101

