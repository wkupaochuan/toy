DROP TABLE
IF EXISTS `toy_msg_wechat`;

CREATE TABLE `toy_msg_wechat` (
	`id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`wechat_open_id` VARCHAR (200) NOT NULL COMMENT 'wechat用户open_id,外键，参见表toy_user_wechat',
	`msg_type_id` INT (11) NOT NULL COMMENT '消息类型ID',
	`msg_content` VARCHAR (2000) DEFAULT '' COMMENT '消息文字内容',
	`msg_media_id` VARCHAR (200) DEFAULT '' COMMENT '微信服务器media_id，三天后过期',
	`msg_media` VARCHAR (200) DEFAULT '' COMMENT '多媒体文件(语音、图片、视频)',
	`created_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '消息发送时间',
	KEY `wechat_open_id` (`wechat_open_id`),
	KEY `wechat_msg_time` (`wechat_open_id`, `created_time`)
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci COMMENT '微信用户消息';