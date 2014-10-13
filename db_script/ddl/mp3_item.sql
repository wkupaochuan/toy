DROP TABLE IF EXISTS `dili_mp3_item`;
DROP TABLE IF EXISTS `mp3_item`;
CREATE TABLE `dili_mp3_item` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
	, `name` varchar(100) NOT NULL DEFAULT '' COMMENT '故事名称'
	, `path` varchar(200) NOT NULL DEFAULT '' COMMENT '播放地址'
	
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '音频文件信息';



 insert into dili_mp3_item
(`name`, path)
values
('买后拆的小女', '大框框都看得开的看都快都快'),
('买后拆的小女', '大框框都看得开的看都快都快'),
('买后拆的小女', '大框框都看得开的看都快都快')
;
