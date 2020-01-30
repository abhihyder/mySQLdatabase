
## Basic procedure of mysql database creation by comment.

* sql comments are case insensetive.


## Show database list.

* comment: SHOW DATABASES;

## Show table list.

* comment: SHOW TABLES;


## CREATE database.

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


## CREATE database table under database.

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


## INSERT INTO data to table.

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


## SELECT statement to show table data.

* Syntex1 for single column:
	
	SELECT column_name FROM table_name;


* Syntex2 for multi column:
	
	SELECT column_name1, ... column_nameN FROM table_name;


* Syntex3 for all column:
	
	SELECT* FROM table_name;


## DISTINCT  to show table data without duplicat.

* Syntex :
	
	SELECT DISTINCT column_name FROM table_name;


## LIMIT to show limitted row.

* Syntex1 for max limit from 1:
	
	SELECT * FROM table_name LIMIT 5;

* Syntex2:
	
	SELECT * FROM table_name LIMIT 2,5; [That means first 2 row will 	avoid then next 5 row will show]


## ORDER to sorting.

* Syntex1:

	SELECT column_name1, ... column_nameN
	FROM table_name
	ORDER BY column_name; [sort by a...z, 1,2,3...n]

* Syntex2:

	SELECT column_name1, ... column_nameN
	FROM table_name
	ORDER BY column_name DESC; //[sort by z...a, n....3,2,1]

## WHERE statement to show specific data.

* Syntex:
	
	SELECT * FROM table_name WHERE column_name condition;
	Example1: SELECT * FROM users WHERE age > 29;
	Example2: SELECT * FROM users WHERE age = 27 OR salary > 25000;
	Example3: SELECT * FROM users WHERE (age = 33 OR salary > 20000) AND join_date > '2012-07-11';

## BETWEEN statement to show specific data.

* Syntex:
	
	SELECT * FROM table_name WHERE column_name BETWEEN condition;
	Example1: SELECT * FROM users WHERE join_date BETWEEN '2013-07-01' AND '2013-07-10';
	Example2: SELECT * FROM users WHERE age BETWEEN '22' AND '35';
	
## IN statement to show specific data.

* Syntex:
	
	SELECT * FROM table_name WHERE column_name IN condition;
	Example1: SELECT * FROM users WHERE age IN (25, 30, 33);
	Example2: SELECT * FROM users WHERE age BETWEEN '22' AND '35';
	
## INNER JOIN statement to show data from 2 or more tables.

* Syntex:
	
	SELECT * FROM table_name INNER JOIN table_name ON table_name.column_name condition;
	Example1: SELECT * FROM users INNER JOIN profiles ON users.user_id = profiles.profile_id;
	
	
## LEFT JOIN statement to show data from 2 or more tables.

* Syntex:
	
	SELECT * FROM table_name LEFT JOIN table_name ON table_name.column_name condition;
	Example1: SELECT * FROM users LEFT JOIN profiles ON users.user_id = profiles.profile_id;
	
	
	
## RIGHT JOIN statement to show data from 2 or more tables.

* Syntex:
	
	SELECT * FROM table_name RIGHT JOIN table_name ON table_name.column_name condition;
	Example1: SELECT * FROM users RIGHT JOIN profiles ON users.user_id = profiles.user_id;
	
	
## GROUP JOIN statement to show data .

* Syntex:
	
	SELECT * FROM table_name GROUP BY table_name ;
	Example1: SELECT * FROM applicant GROUP BY course_name;
	
	
	
## ALIAS statement to show data .

	Example1: SELECT u.username AS UserName, u.age AS Age, p.favorite_color FavColor FROM users AS u LEFT JOIN profiles AS p ON u.user_id = p.user_id;
	Example2: SELECT JOB_ID, COUNT(JOB_ID) AS employees_number FROM employees GROUP BY JOB_ID;

	
## JOIN 2 more tables.

	SELECT u.username,u.email,p.country,t.title,t.id FROM users u LEFT JOIN profiles p ON u.id = p.user_id LEFT JOIN properties t ON u.id = t.added_by;
	SELECT p.title,u.username added_by,m.username modified_by FROM properties p JOIN users u ON p.added_by = u.id JOIN users m ON p.modified_by = m.id;


## SQL Query Functions.

	Example1: SELECT MAX(age) FROM applicant;
	Example2: SELECT MIN(age) FROM applicant;
	Example3: SELECT AVG(age) FROM applicant;
	Example4: SELECT COUNT(age) FROM applicant;
	Example5: SELECT SUM(age) FROM applicant;
	Example6: SELECT first_name, email, NOW() FROM applicant;
	Example7: SELECT email, CONCAT(first_name, '--->', age ) FROM applicant;


## SQL Sub-query statment.

	Example1: SELECT MAX(number) FROM users WHERE number < ( SELECT MAX(number) FROM users);
	Example2: SELECT number FROM users WHERE number = ( SELECT MAX(number) FROM users);
	Example3: SELECT * FROM users WHERE id IN ( SELECT id FROM users WHERE number < 80);

## SQL Conditional Query.

	Example1: SELECT name, number, CASE WHEN number >= 80 THEN 'A+' WHEN number < 80 THEN 'A' ELSE 'na'END Results FROM users;

## SQL Query DateTime Condition.

	SELECT * FROM users WHERE reg_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);
	SELECT id, username, DATE_ADD(reg_date, INTERVAL 1 MONTH) AS Expire_Date FROM users WHERE id IN (1,2,3);
	SELECT DATE_FORMAT(reg_date,'%M-%Y') Month,COUNT(id) Total FROM users GROUP BY MONTH(reg_date);
	SELECT SEC_TO_TIME(TIMESTAMPDIFF(SECOND,'2015:06:02 00:00:00','2015:06:03 00:25:15')) total_time;

## FULL TEXT SEARCH 

	* First of all have to indexing full-text.....
	ALTER TABLE `TableName` ADD FULLTEXT INDEX `FullText` (`ColumnName`);
	
	* Then Execute the Query
	SELECT title, MATCH(column) AGAINST("Text") relevance FROM table_name HAVING relevance;
	SELECT id,title,introtext,MATCH(title) AGAINST("Text") title_relevance, MATCH(introtext) AGAINST("Text") relevance FROM table_name HAVING relevance > 0 ORDER BY title_relevance DESC, relevance DESC