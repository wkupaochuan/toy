<div class="headbar">
	<div class="position"><span>课程管理</span><span>></span><span>课程列表</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <table class="gridtable" >
            <tr>
                <th>课程名称</th>
                <th>课程类型</th>
                <th>课程封面</th>
            </tr>
            {foreach $class_list as $class}
            {if !empty($class['class_type_id'])}
            <tr>
                <td>
                    <a href="/study/index/class_detail_page?class_id={$class['class_id']}">
                        {$class['class_title']}
                    </a>
                </td>
                <td>{$class_type_map[$class['class_type_id']]}</td>
                <td><img class="my_img" src="{$class['class_cover_path']}"/></td>
            </tr>
            {/if}
            {/foreach}
        </table>
        <a href="/study/index/add_class_page"><span>添加新课程</span></a>
    </div>
</div>
