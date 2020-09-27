SET @newid=0;
UPDATE `transfer` SET `id`=(@newid:=@newid+1) ORDER BY `id`;

SELECT MAX( `id` ) AS `IDMax` FROM `transfer`;

ALTER TABLE `transfer` AUTO_INCREMENT = number;