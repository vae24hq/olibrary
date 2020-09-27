#Get patients, then get the username of the author
SELECT patient.`puid`, patient.`nationality`, user.username AS USER FROM patient INNER JOIN `user` ON patient.author = user.puid;
SELECT patient.`puid`, patient.`nationality`, user.username AS USER FROM patient INNER JOIN `user` ON patient.author = user.puid WHERE patient.puid = '8Q6831322035a16024961871555419758'



ALTER TABLE `transfer`
	AUTO_INCREMENT=3,
	CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT FIRST,
	DROP PRIMARY KEY,
	ADD PRIMARY KEY (`id`);



SELECT
domain.id, domain.name AS DomainName,
cloudflare.email AS CloudEmail, cloudflare.password AS CloudPassword,
hosting.username AS HostUser, hosting.password AS HostPassword, hosting.ip AS HostIP, hosting.database AS HostDB, hosting.provider AS HostProvider
FROM domain
INNER JOIN cloudflare ON `domain`.cloudflare = cloudflare.bind
LEFT JOIN hosting ON domain.hosting = hosting.bind
ORDER BY DomainName ;


#HOSPITAL NUMBER - AUTO_INCREMENT (from highest exisiting record)
SELECT `hospitalno` FROM `record` WHERE hospitalno = (select MAX(hospitalno) from record)