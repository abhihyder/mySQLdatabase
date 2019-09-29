
## Basic procedure of mysql database creation by comment.

* sql comments are case insensetive.


## Show database list.

* comment: SHOW DATABASES;


## Create database.

* comment: CREATE DATABASE database_name;


## Delete database.

* comment: DROP DATABASE database_name;


## About data types.

* Numaric data type:

	int [Recommended]
	smallint
	bigint

	float
	double (M,D)  [Recommended]
	decimal (M,D) [M= total digite D= digite after fullstop]

* Character data type:

	char(m) [max number of character can contain]
	varchar(m) [Recommended]
	text


## Create database table under database.

* Syntex:

	CREATE TABLE table_name
	(
	column_name1 data_type(size),
	column_name2 data_type(size),
	column_name3 data_type(size),
	........
	column_nameN data_type(size),
	PRIMARY KEY (column_name)
	);


## Rename table name.

* Comment: RENAME TABLE old_name TO new_name;


## Insert data to table.

* Syntex1 for single line data insert:
	
	INSERT INTO table_name
		(column1, column2, column3, columnN)
		VALUE
		(value1,  value2, value3, valueN);

* Syntex2 for single line data insert:
	
	INSERT INTO table_name 
		VALUE
		(value1,  value2, value3, valueN);

* Syntex3 for multi lines data insert:
	
	INSERT INTO table_name 
		VALUE
		(value1,  value2, value3, valueN),
		(value1,  value2, value3, valueN),
		(value1,  value2, value3, valueN),
		.................
		(value1,  value2, value3, valueN);


## Select statement to show table data.

* Syntex1 for single column:
	
	SELECT column_name FROM table_name;


* Syntex2 for multi column:
	
	SELECT column_name1, ... column_nameN FROM table_name;


* Syntex3 for all column:
	
	SELECT* FROM table_name;


## Select distinct to show table data without duplicat.

* Syntex :
	
	SELECT DISTINCT column_name FROM table_name;


## Select Limit to show limitted row.

* Syntex1 for max limit from 1:
	
	SELECT* FROM table_name LIMIT 5;

* Syntex2:
	
	SELECT* FROM table_name LIMIT 2,5; [That means first 2 row will 	avoid then next 5 row will show]


## Select order to sorting.

* Syntex1:

	SELECT column_name1, ... column_nameN
	FROM table_name
	ORDER BY column_name; [sort by a...z, 1,2,3...n]

* Syntex2:

	SELECT column_name1, ... column_nameN
	FROM table_name
	ORDER BY column_name DESC; //[sort by z...a, n....3,2,1]


