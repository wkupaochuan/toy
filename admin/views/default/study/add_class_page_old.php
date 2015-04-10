
<div class="headbar">
    <div class="position"><span>课程管理</span><span>></span><span>添加课程</span></div>
</div>
<div class="content_box">
<div class="content form_content">
    <form id="new_class_form">
        <table class="gridtable">
            <tr>
                <th>课程名称</th>
                <td><input type="text" id="class_title" name="class_title"></td>
            </tr>
            <tr>
                <th>课程类型</th>
                <td>
                    <select id="class_type_id" name="class_type_id">
                        <option value="">请选择</option>
                        {foreach $class_type_dic as $class_type}
                            <option value="{$class_type['class_type_id']}">{$class_type['display_name']}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th>课程封面</th>
                <td>
                    <input type="hidden" id="class_cover_path" name="class_cover_path">
                    <input type="file"  id="upload_class_cover" />
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="添加" id="submit"></td>
            </tr>
        </table>
    </form>
</div>
</div>

<!--js-->
<script type="text/javascript">
    seajs.use('study/add_class');
</script>