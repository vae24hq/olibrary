SELECT drink.*, category.name AS `category` FROM `drink`
LEFT JOIN category ON drink.categoryid = category.euid ORDER BY `category`, `name`;


<!-- SELECT ALL CATEGORY -->
CREATE PROCEDURE `CategoryAll`()
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
SELECT * FROM `category` ORDER BY `category`.`name`;
SELECT category.auid AS RecordID, category.euid AS CategoryID, category.name AS CategoryName,  category.`description` AS CategoryDescription FROM `category`;
END

<!-- GET ALL CATEGORY -->
CALL CategoryAll;


<!-- SELECT ALL DRINKS, include category name -->
CREATE PROCEDURE `DrinkAll`()
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
SELECT drink.auid AS RecordID, drink.euid AS DrinkID, drink.name AS DrinkName, drink.categoryid AS DrinkCategoryID, category.name AS DrinkCategoryName, drink.`description` AS DrinkDescription, drink.`price` AS DrinkPrice FROM `drink`
LEFT JOIN category ON drink.categoryid = category.euid ORDER BY `DrinkCategoryName`, `DrinkName`;
END

<!-- GET ALL DRINKS, include category name -->
CALL DrinkAll;


<!-- SELECT DRINKS BY CATEGORY -->
CREATE PROCEDURE `DrinkByCategoryID`(
	IN `CategoryID` VARCHAR(50)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
SELECT * FROM `drink` WHERE drink.`categoryid` = CategoryID ORDER BY drink.`name`;
SELECT drink.auid AS RecordID, drink.euid AS DrinkID, drink.categoryid AS CategoryID, drink.name AS DrinkName, drink.price AS DrinkPrice FROM `drink` WHERE drink.`categoryid` = CategoryID ORDER BY DrinkName;
END

<!-- GET DRINKS BY CATEGORY -->
CALL DrinkByCategoryID ('20200818D');