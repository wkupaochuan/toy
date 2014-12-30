<div class="headbar">
	<div class="position"><span>玩具管理</span><span>></span><span>玩具列表</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <table class="gridtable" >
            <tr>
                <th>玩具编号</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            {foreach $toy_list as $toy}
            <tr>
                <td>
                    {$toy['toy_unique_id']}
                </td>
                <td>{$toy['created_time']}</td>
                <td>
                    <a href="/user_toy/index/set_class_page?toy_id={$toy['toy_id']}">课程设置</a>
                </td>
            </tr>
            {/foreach}
        </table>
    </div>
</div>
