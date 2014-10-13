<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>故事列表</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form >
            <table class="form_table dili_tabs" id="site_basic" >
                <col width="150px" />
                <col />
                <?php $num = 1; foreach($storys as $story){?>
                    <tr>
                        <td><?php echo $num?></td>
                        <td><?php echo $story['name']?></td>
                        <td><?php echo $story['path']?></td>
                    </tr>
                <?php ++$num; }?>

            </table>
        </form>

        <a href="/mp3/mp3/add_story"><span>添加新故事</span></a>
    </div>

</div>
