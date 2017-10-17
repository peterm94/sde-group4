DROP TABLE IF EXISTS orders;

CREATE TABLE IF NOT EXISTS orders(
firstname varchar(50) not null primary key,
lastname varchar(50) not null,
noOftyres int not null);

alter table orders add Amount INT(11) null;
Update orders set Amount=noOftyres*110;
