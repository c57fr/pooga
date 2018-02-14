create database pooga;

CREATE TABLE `blog_articles` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`titre` VARCHAR(255) NULL DEFAULT NULL,
	`contenu` LONGTEXT NULL,
	`date` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

select * from blog_articles
