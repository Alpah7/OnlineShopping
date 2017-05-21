USE project_ecommerce;

-- SELECT
--     order_product.id_order AS O_ID_ORDER, 
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
-- 	CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT,
-- 	CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
-- 	CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE,
-- 	users.address AS O_ADDR,
-- 	order_product.total_price AS O_TOTAL_PRICE,
-- 	order_product.status AS O_STATUS 
-- FROM order_product 
-- JOIN products ON order_product.id_product = products.id_product 
-- JOIN users ON order_product.id_user = users.id_user 
-- GROUP BY order_product.id_order;

-- SELECT
-- 	order_product.id_order AS O_ID_ORDER, 
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
-- 	CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT,
-- 	CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
-- 	CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, 
-- 	order_product.account_name AS O_ACCOUNT_NAME, 
-- 	order_product.amount AS O_AMOUNT, 
-- 	order_product.tax AS O_TAX, 
-- 	order_product.total_price AS O_TOTAL_PRICE, 
-- 	order_product.status AS O_STATUS 
-- FROM order_product 
-- JOIN products ON order_product.id_product = products.id_product 
-- JOIN users ON order_product.id_user = users.id_user 
-- WHERE order_product.id_order = 'ORD-0425-17-1'
-- GROUP BY order_product.id_order;

-- SELECT 
-- 	users.id_user AS ID,
-- 	users.email AS EMAIL,
-- 	members.name AS MEMBER,
-- 	users.status AS STATUS
-- FROM users 
-- JOIN members
-- ON users.id_member = members.id_member;

-- SELECT 
-- 	DISTINCT(CONCAT(users.firstname, ' ' ,users.lastname)) AS O_FULLNAME,
-- 	users.email AS O_EMAIL,
-- 	order_product.id_order AS O_ID_ORDER,
-- 	order_product.status AS O_STATUS
-- FROM order_product
-- 	JOIN users
-- ON order_product.id_user = users.id_user;

-- SELECT DISTINCT(account_name) FROM order_product;

-- SELECT * FROM order_product;

-- SELECT struk_payment.*, users.*, order_product.* 
-- FROM struk_payment JOIN users
-- ON struk_payment.id_user = users.id_user
-- JOIN order_product
-- ON users.id_user =  order_product.id_user
-- WHERE users.status=0 
-- AND order_product.status=0 
-- AND struk_payment.status=0;

-- DESCRIBE struk_payment;
-- DESCRIBE users;

-- UPDATE transactions SET date_transaction='2017-05-15 10:35:04' WHERE id_transaction=15;
-- INSERT INTO `transactions` (`id_transaction`,`id_order`,`id_product`,`id_user`,`gross_income`,`net_income`,`date_transaction`) VALUES
-- ('','ORD-0425-17-5','PRD-0416-17-13','USR-0414-17-6',309000,300000,'2017-01-25 09:58:00'),
-- ('','ORD-0425-17-6','PRD-0416-17-14','USR-0414-17-7',309000,300000,'2017-01-25 09:58:00'),
-- ('','ORD-0425-17-7','PRD-0416-17-15','USR-0414-17-8',309000,300000,'2017-02-25 09:58:00'),
-- ('','ORD-0425-17-8','PRD-0416-17-17','USR-0414-17-9',309000,300000,'2017-02-25 09:58:00'),
-- ('','ORD-0425-17-9','PRD-0416-17-18','USR-0414-17-10',309000,300000,'2017-02-25 09:58:00'),
-- ('','ORD-0425-17-10','PRD-0416-17-19','USR-0414-17-11',309000,300000,'2017-03-25 09:58:00'),
-- ('','ORD-0425-17-11','PRD-0416-17-17','USR-0406-17-12',882000,900000,'2017-03-25 10:35:04')
-- ;
-- SELECT * FROM transactions;
-- DELETE FROM transactions;
-- DESCRIBE transactions;

-- SELECT 
-- 	struk_payment.id_struk AS ID_STRUK,
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS FULLNAME,
-- 	struk_payment.struk_image AS IMAGES,
-- 	struk_payment.status AS STATUS
-- FROM struk_payment JOIN users
-- ON struk_payment.id_user = users.id_user;

-- DELETE FROM struk_payment;

-- SELECT 
-- 	order_product.id_product AS ID_PRD, 
-- 	order_product.id_user AS ID_USER, 
-- 	order_product.status AS STATUS, 
-- 	order_product.qty AS QTY_ORD, 
-- 	products.stock AS STOCK, 
-- 	order_product.amount AS TOTAL_AMOUNT, 
-- 	order_product.total_price AS TOTAL_EARNING, 
-- 	order_product.id_order AS ID_ORDER, 
-- 	DATE_FORMAT(order_product.order_date, '%Y-%m') AS ORDER_DATE 
-- FROM order_product JOIN products 
-- ON order_product.id_product = products.id_product 
-- WHERE order_product.status=1;

-- SELECT
--   DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m') AS `DateTrasaction`,
--   COUNT(`transactions`.`id_product`) AS `Total`,
--   SUM(`transactions`.`gross_income`) AS `Gross`,
--   SUM(`transactions`.`net_income`) AS `Net`
-- FROM `transactions`
-- WHERE DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
--   BETWEEN '2017-01' AND DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
-- GROUP BY DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
-- UNION ALL
-- SELECT
-- 	'Total Transaction',
-- 	SUM(Total_Data) AS TotalTransaction,
-- 	SUM(Gross) AS TotalGrossIncome,
-- 	SUM(Net) AS TotalNetIncome
-- FROM (
-- 		SELECT COUNT(id_product) AS Total_Data,
-- 		SUM(gross_income) AS Gross,
-- 		SUM(net_income) AS Net
-- 		FROM transactions
-- 			WHERE DATE_FORMAT(date_transaction, '%Y-%m')
--   		BETWEEN '2017-01' AND DATE_FORMAT(date_transaction, '%Y-%m')
--   		GROUP BY id_transaction, DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m') 
--   		ORDER BY id_transaction 
-- ) AS DataTotal;

-- DESCRIBE members;
-- DESCRIBE users;

-- SELECT 
-- 	CONCAT(users.firstname, ' ',users.lastname) AS Fullname,
-- 	users.username AS Username,
-- 	users.email AS Email, 
-- 	users.address AS Address,
-- 	users.phone AS Phone,
-- 	members.name AS Member,
-- 	users.status AS Status
-- FROM users JOIN members ON users.id_member = members.id_member WHERE users.status=0;