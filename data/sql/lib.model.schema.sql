
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
	`submit_ip` VARCHAR(16),
	`twitter_id` VARCHAR(255),
	`twitter_screen_name` VARCHAR(255)  NOT NULL,
	`twitter_name` VARCHAR(255),
	`twitter_protected` TINYINT default 0 NOT NULL,
	`twitter_followers` INTEGER(11),
	`twitter_tweets` INTEGER(11),
	`twitter_friends` INTEGER(11),
	`twitter_verified` TINYINT default 0 NOT NULL,
	`twitter_description` VARCHAR(255),
	`image_url` VARCHAR(255),
	`latest_tweet` VARCHAR(255),
	`display` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `douche_U_1` (`twitter_id`),
	UNIQUE KEY `douche_U_2` (`twitter_screen_name`),
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
	`submit_ip` VARCHAR(16),
	`vote` VARCHAR(4) default '' NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `VOTE`(`vote`, `douche_id`),
	KEY `DVCAT`(`created_at`),
	KEY `IPADDR`(`submit_ip`),
	INDEX `douche_vote_FI_1` (`douche_id`),
	CONSTRAINT `douche_vote_FK_1`
		FOREIGN KEY (`douche_id`)
		REFERENCES `douche` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
