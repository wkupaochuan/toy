<div class="headbar">
	<div class="position"><span>课程管理</span><span>></span><span>课程列表</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <table class="gridtable" >
            <tr>
                <th>课程名称</th>
                <td>{$class_detail['class_title']}</td>
            </tr>
            <tr>
                <th>课程类型</th>
                <td>{$class_type_map[$class_detail['class_type_id']]}</td>
            </tr>
            <tr>
                <th>课程封面</th>
                <td>
                    <img class="my_img" src="{$class_detail['class_cover_path']}"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    {if $class_detail['class_type_id'] == 1}
                        <a href="/study/index/poetry_detail_page?class_id={$class_detail['class_id']}">添加诗句</a>
                    {/if}
                </td>
            </tr>
        </table>
    </div>
</div>