
/********表结构******/
DROP TABLE IF EXISTS `toy_enum_class_type`;
CREATE TABLE `toy_enum_class_type` (
	`class_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`display_name` varchar(100) DEFAULT NULL COMMENT '展示名称',
	`comment` varchar(1000) DEFAULT NULL COMMENT '描述'

 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '课程类型枚举';


/******赋值***/
INSERT INTO toy_enum_class_type (display_name, comment)
VALUES
('唐诗', '学习唐诗'),
('英语', '学习英语'),
('数学', '学习数学'),
('英文单词', '单词卡');