<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>故事详情</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form >
            <table class="form_table dili_tabs" id="site_basic" >
                <tr>
                    <td>故事编号:</td>
                    <td><?php echo $story_detail['id']?></td>
                </tr>
                <tr>
                    <td>故事名称:</td>
                    <td><?php echo $story_detail['name']?></td>
                </tr>
                <tr>
                    <td>播放地址:</td>
                    <td><a href="<?php echo $story_detail['path']?>"><?php echo $story_detail['path']?></a></td>
                </tr>
            </table>
        </form>
    </div>

</div>
