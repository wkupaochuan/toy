DROP TABLE IF EXISTS `toy_user_toy`;
CREATE TABLE `toy_user_toy` (
	`toy_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`toy_unique_id` varchar(100) NOT NULL COMMENT '玩具的唯一标示，从app端采集android平板的唯一id',
	`toy_name` varchar(100) DEFAULT NULL COMMENT '玩具名称',
	`created_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '玩具端用户';