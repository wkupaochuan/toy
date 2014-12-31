<div class="headbar">
	<div class="position"><span>玩具管理</span><span>></span><span>指定课程</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        玩具编号:{$toy_detail['toy_unique_id']}
        {if !empty($choosen_class_list)}
        <table class="gridtable">
            <caption>已经选择的课程</caption>
            <tr>
                <th>课程名称</th>
                <th>时间</th>
                <th>修炼进度</th>
                <th>闯关得分</th>
            </tr>
            {foreach $choosen_class_list as $class}
            <tr>
                <td>
                    {$class['class_title']}
                </td>
                <td>
                    {$class['expected_time']}
                </td>
                <td>
                    {$class['learning_progress']}
                </td>
                <td>
                    {$class['checkpoint_score']}
                </td>
            </tr>
            {/foreach}
        </table>
        {/if}


        <br><br>
        <table class="gridtable" id="class_list_table">
            <tr>
                <th>选中</th>
                <th>课程名称</th>
                <th>课程类型</th>
                <th>课程封面</th>
            </tr>
            {foreach $class_list as $class}
            {if !empty($class['class_type_id'])}
            <tr>
                <td>
                    <input type="checkbox" data-class_id="{$class['class_id']}" />
                </td>
                <td>
                    {$class['class_title']}
                </td>
                <td>{$class_type_map[$class['class_type_id']]}</td>
                <td><img class="my_img" src="{$class['class_cover_path']}"/></td>
            </tr>
            {/if}
            {/foreach}
        </table>
        <input type="button" value="提交" id="submit"/>
    </div>
</div>
<input type="hidden" value="{$toy_detail['toy_id']}" id="toy_id">
<script type="text/javascript">
    seajs.use('user_toy/set_class');
</script>
