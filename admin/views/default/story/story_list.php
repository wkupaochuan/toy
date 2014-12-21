<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>

<style type="text/css">
    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>故事列表</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <table class="gridtable" id="site_basic" >
            <tr>
                <th>编号</th>
                <th>名称</th>
                <th>播放地址</th>
            </tr>
            {foreach $storys as $story}
            <tr>
                <td>1</td>
                <td>{$story['name']}</td>
                <td>{$story['path']}</td>
            </tr>
            {/foreach}
        </table>
        <a href="/mp3/mp3/add_story"><span>添加新故事</span></a>
    </div>
</div>
