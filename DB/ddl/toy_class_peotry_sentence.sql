DROP TABLE IF EXISTS `toy_class_peotry_sentence`;
CREATE TABLE `toy_class_peotry_sentence` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
	,`class_id` int(11) unsigned NOT NULL COMMENT ''这句话所属的课程id(参照表toy_class)'' 
	, `order_in_poetry` TINYINT(3) NOT NULL COMMENT ''这句诗歌在一首诗的中位置(从0开始，标题，作者，诗句1，诗句2，诗句3……)''
	, `content` varchar(500)  NULL DEFAULT '''' COMMENT ''这句话对应的文本''
	, `media_url` varchar(500)  NULL DEFAULT '''' COMMENT ''这句话对应的音频地址''
	, `created_time` TIMESTAMP NOT NULL default ''0000-00-00 00:00:00'' COMMENT ''创建时间''
	, `updated_time` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT ''修改时间''
	, key `class_id`(`class_id`)
	, UNIQUE KEY `class_id_order_id`(`class_id`, `order_in_poetry`) COMMENT ''一首诗中的每句话的顺序是唯一的''
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT ''诗歌中的诗句'';