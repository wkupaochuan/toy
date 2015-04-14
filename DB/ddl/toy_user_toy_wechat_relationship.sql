DROP TABLE
IF EXISTS `toy_user_toy_wechat_relationship`;

CREATE TABLE `toy_user_toy_wechat_relationship` (
	`id` INT (11) auto_increment PRIMARY KEY,
	`toy_id` INT (11) NOT NULL COMMENT '玩具用户id，外键，参见表toy_user_toy',
	`weixin_id` INT (11) NOT NULL COMMENT '微信用户ID，外键，参见表toy_user_wechat',
	`created_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci COMMENT '玩具与微信好的好友关系';