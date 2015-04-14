DROP TABLE IF EXISTS `toy_daily_class`;
CREATE TABLE `toy_daily_class` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`toy_id` int(11)  NOT NULL COMMENT ''玩具id'',
	`class_id` int(11) NOT NULL COMMENT ''课程id'',
	`expected_time` TIMESTAMP NOT NULL DEFAULT 0 COMMENT ''期望的学习时间'',
	`checkpoint_score` TINYINT(3) NOT NULL DEFAULT 0 COMMENT ''闯关得分'',
	`learning_progress` TINYINT(3) NOT NULL DEFAULT 0 COMMENT ''学习进度'',
	`updated_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT ''修改时间'',
	unique KEY `toy_class_time`(`toy_id`, `class_id`, `expected_time`),
	INDEX `toy_id`(`toy_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT ''玩具端用户'';