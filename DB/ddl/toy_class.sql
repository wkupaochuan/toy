DROP TABLE IF EXISTS `toy_class`;
CREATE TABLE `toy_class` (
	`class_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`class_type_id` int(11) NOT NULL COMMENT '课程类别(参照toy_enum_class_type)',
	`class_title` varchar(300) default '暂无名称' comment '课程名称',
	`class_cover_path` varchar(250) default null COMMENT '课程封面地址'
	
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '课程';