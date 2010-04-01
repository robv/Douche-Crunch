
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- douche
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `douche`;


CREATE TABLE `douche`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`submit_ip` INTEGER(11),
	`twitter_id` VARCHAR(255),
	`twitter_name` VARCHAR(255)  NOT NULL,
	`image_url` VARCHAR(255),
	`follower_count` INTEGER(11)  NOT NULL,
	`latest_tweet` VARCHAR(255),
	`display` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `douche_I_1`(`twitter_id`),
	KEY `douche_I_2`(`twitter_name`),
	KEY `DDISP`(`display`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- douche_vote
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `douche_vote`;


CREATE TABLE `douche_vote`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`douche_id` INTEGER(11)  NOT NULL,
	`submit_ip` INTEGER(11),
	`vote` VARCHAR(4) default '' NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `VOTE`(`vote`, `douche_id`),
	KEY `DVCAT`(`created_at`),
	INDEX `douche_vote_FI_1` (`douche_id`),
	CONSTRAINT `douche_vote_FK_1`
		FOREIGN KEY (`douche_id`)
		REFERENCES `douche` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
