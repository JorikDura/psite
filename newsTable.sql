CREATE DATABASE IF NOT EXISTS `news`;

CREATE TABLE IF NOT EXISTS `news`.`languages` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL DEFAULT '0' COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
CREATE TABLE IF NOT EXISTS `news`.`news` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`date` DATE NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
CREATE TABLE IF NOT EXISTS `news`.`news_translate` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`news_id` INT(10) NOT NULL,
	`title` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_0900_ai_ci',
	`content` TEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`language_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `news_id` (`news_id`) USING BTREE,
	INDEX `language_id` (`language_id`) USING BTREE,
	CONSTRAINT `news_id` FOREIGN KEY (`news_id`) REFERENCES `news`.`news` (`id`) ON UPDATE NO ACTION ON DELETE CASCADE,
	CONSTRAINT `language_id` FOREIGN KEY (`language_id`) REFERENCES `news`.`languages` (`id`) ON UPDATE NO ACTION ON DELETE CASCADE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
CREATE TABLE IF NOT EXISTS `news`.`suggestnews` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`text` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

SELECT news_translate.id,news_translate.title,news_translate.content,news_translate.language_id 
FROM news_translate 
INNER JOIN news 
ON news.id = news_translate.id 
WHERE news_translate.language_id = 1 
ORDER BY `date` ASC LIMIT 4 OFFSET 0;

SELECT * 
FROM news
INNER JOIN news_translate 
ON news.id = news_translate.id 
WHERE news_translate.language_id = 2 
ORDER BY `date` ASC LIMIT 4 OFFSET 0;