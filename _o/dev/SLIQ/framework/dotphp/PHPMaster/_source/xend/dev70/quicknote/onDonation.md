TYPE - PH | RC
STATUS - ready | partial | matched [rematch]
PHA - awaiting | paired | provided | confirmed [dispute]
PHB - awaiting | paired | provided | confirmed [dispute]


TYPE - GH | SQ
STATUS - ready | partial | matched [rematch]
PHA - awaiting | paired | received | confirm [indispute]
PHB - awaiting | paired | received | confirm [indispute]






ALTER TABLE `activation`
	CHANGE COLUMN `amount` `amount` INT(11) NULL DEFAULT '4000' AFTER `code`;





INSERT INTO customers(id, name)
VALUES(UUID_TO_BIN(UUID()),'John Doe')

SELECT 
    BIN_TO_UUID(id) id, 
    name
FROM
    customers;




8d981f6e-5df1-11e9-8459-00ffa179a421