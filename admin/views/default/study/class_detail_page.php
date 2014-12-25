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
                    <input type="button" value="添加诗句" id="add_sentence">
                </td>
            </tr>
        </table>
    </div>
</div>
