DROP TABLE
IF EXISTS `toy_msg_type_enum`;

CREATE TABLE `toy_msg_type_enum` (
	`msg_type_id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`display` VARCHAR (30) NOT NULL COMMENT '展示',
	`description` VARCHAR (200) NOT NULL DEFAULT '' COMMENT ''
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci COMMENT '消息类型枚举';

INSERT INTO toy_msg_type_enum
VALUES
	(
		DEFAULT,
		'text',
		'文字类型消息'
	),
	(DEFAULT, 'voice', '语音消息'),
	(DEFAULT, 'image', '图片消息'),
	(
		DEFAULT,
		'event',
		'事件推送消息'
	);