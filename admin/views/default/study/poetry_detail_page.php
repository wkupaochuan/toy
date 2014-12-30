<div class="headbar">
	<div class="position"><span>课程管理</span><span>></span><span>课程列表</span></div>
</div>
<div class="content_box" id="poetry_div">
    <div class="content form_content">
        <form>
        <table class="gridtable" id="poetry_table">
            <tr>
                <th>标题</th>
                <td>
                    文字:
                    <input type="text" id="sentence_content" name="content">
                </td>
                <td>音频</td>
                <td>
                    <input type="hidden" id="sentence_media_url_0"  name="media_url">
                    <input type="file"  id="upload_sentence_media_url_0" />
                </td>
            </tr>
        </table>
        </form>
    </div>

    <div class="content form_content">
        <form>
            <table class="gridtable" id="poetry_table">
                <tr>
                    <th>作者</th>
                    <td>
                        文字:
                        <input type="text" id="sentence_content" name="content">
                    </td>
                    <td>音频</td>
                    <td>
                        <input type="hidden" id="sentence_media_url_1"  name="media_url">
                        <input type="file"  id="upload_sentence_media_url_1" />
                    </td>
                </tr>
            </table>
        </form>
    </div>


</div>
<input type="hidden" id="class_id" name="class_id" value="{$class_id}" />
<input type="button" value="添加诗句" id="add_poetry_sentence">
<input type="button" value="提交" id="submit">
<script type="text/javascript">
    seajs.use('study/add_poetry_sentence');
</script>