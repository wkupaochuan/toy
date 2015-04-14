DROP TABLE IF EXISTS `toy_story`;
CREATE TABLE `toy_mp3_item` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
	, `name` varchar(100) NOT NULL DEFAULT '' COMMENT '故事名称'
	, `story_cover_path` varchar(100) not null default '' comment '故事封面地址'
	, `path` varchar(200) NOT NULL DEFAULT '' COMMENT '播放地址'
	, `file_md5` varchar (50) NOT NULL DEFAULT '' COMMENT '故事文件md5串，用来判定是否已经上传过'
	, key `file_md5`(`file_md5`)
	
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '音频文件信息';


