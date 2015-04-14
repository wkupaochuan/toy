DROP TABLE
IF EXISTS `toy_user_wechat`;

CREATE TABLE `toy_user_wechat` (
	`id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`open_id` VARCHAR (200) NOT NULL DEFAULT '' COMMENT '公众号关注者的微信open_id(微信加密后的微信号,每个关注着对应对应每个公众号的不同)',
	`developer_weixin_name` VARCHAR (200) NOT NULL DEFAULT '' COMMENT '开发者微信号',
	`subscribe_time` INT (11) NOT NULL DEFAULT 0 COMMENT '关注公众号的时间',
	`subscribe_status` TINYINT (2) NOT NULL DEFAULT 1 COMMENT '关注状态:0--未关注, 1--关注中',
	`unsubscribe_time` INT (11) NOT NULL DEFAULT 0 COMMENT '取消关注时间',
	`nickname` VARCHAR (300) DEFAULT '' COMMENT '微信用户昵称',
	`sex` TINYINT (3) DEFAULT 3 COMMENT '微信用户性别:1--男,2--女,3--未知',
	`language` VARCHAR (50) DEFAULT '' COMMENT '所用语言',
	`city` VARCHAR (30) DEFAULT '' COMMENT '用户所在城市',
	`province` VARCHAR (30) DEFAULT '' COMMENT '用户所在省',
	`country` VARCHAR (30) DEFAULT '' COMMENT '用户所在国家',
	`headimgurl` VARCHAR (300) DEFAULT '' COMMENT '用户头像',
	UNIQUE KEY `open_id_developer_weixin_id` (
		`open_id`,
		`developer_weixin_name`
	)
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci COMMENT '微信用户';

