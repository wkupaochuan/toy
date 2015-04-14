DROP TABLE
IF EXISTS `toy_msg_app`;

CREATE TABLE `toy_msg_app` (
	`id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`app_unique_id` VARCHAR (200) NOT NULL COMMENT 'app用户unique_id,外键，参见表toy_user_toy',
	`msg_type_id` INT (11) NOT NULL COMMENT '消息类型ID',
	`msg_content` VARCHAR (2000) DEFAULT '' COMMENT '消息文字内容',
	`msg_media` VARCHAR (200) DEFAULT '' COMMENT '多媒体文件(语音、图片、视频)',
	`created_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '消息发送时间',
	KEY `app_unique_id` (`app_unique_id`),
	KEY `app_msg_time` (`app_unique_id`, `created_time`)
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci COMMENT 'app用户消息';