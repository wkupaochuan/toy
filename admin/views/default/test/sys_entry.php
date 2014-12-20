<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$backend_title}----Powered By TOY</title>
<base href="{$base_url}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="images/admin.css" />
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/admin.js"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<img src="{$backend_logo}" />
		</div>
		<div id="menu">
			<ul name="menu">
                {$top_menus}
            </ul>
		</div>
		<p>
        	<a href="{$quit_url}">退出管理</a>
            <a href="{$system_home_url}">后台首页</a>
            <a href="{$site_home_url}" target='_blank'>站点首页</a>
            <span>您好 <label class='bold'>{$admin_user_name}</label>，
            当前身份 <label class='bold'>{$admin_role_name}</label></span>
        </p>
	</div>
	<div id="info_bar">
        <span class="nav_sec">
            {$trigger_navigation}
        </span>
    </div>
	<div id="admin_left">
		<ul class="submenu">
            {$system_left_menus}
        </ul>
	</div>
	<div id="admin_right">
        {include file=$content_html}
	</div>
	<div id="separator"></div>
</div>

<script type='text/javascript'>
	//隔行换色
	$(".list_table tr::nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);
</script>
</body>
</html>
