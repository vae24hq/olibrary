ALTER TABLE `firm`
CHANGE COLUMN `sendmail` `sendmail` CHAR(50) NULL DEFAULT 'no' AFTER `lang`;


ALTER TABLE `firm`
ADD COLUMN `sendmail` CHAR(50) NULL DEFAULT 'no' AFTER `lang`;