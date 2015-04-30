<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$backend_title}----Powered By TOY</title>
<base href="{$base_url}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="images/admin.css" />

<script type="text/javascript" src="js/lib/seajs/sea.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/uploadify/jquery.uploadify.min.js?ver=<?php echo rand(0,9999);?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
    <script type='text/javascript'>
        seajs.config({
            base: '/views/default/js/module'
            , charset: 'utf-8'
            , paths: {
                'lib': '/views/default/js/lib'
            }
            , alias: {
                jquery : 'lib/jquery/1.8.2/jquery.js'
                , rest : 'lib/rest/rest_cmd.js'
                , validate : 'lib/validate/validate_jquery_ext_cmd.js'
                , plupload_full: 'lib/plupload/plupload.full.js'
                , plupload: 'lib/plupload/plupload_cmd.js'
            }
            , debug: true
        });

        seajs.use('default/default_table', function(detail){
            detail.init();
        });

    </script>
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
</body>
</html>
