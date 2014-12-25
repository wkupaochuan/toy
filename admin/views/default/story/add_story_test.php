
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>添加故事</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form id="story_form">
            <table class="gridtable">
                <tr>
                    <th>故事名称</th>
                    <td>
                        <input type="text" name="story_title" id="story_title">
                    </td>
                </tr>

                <tr>
                    <th>故事封面</th>
                    <td>
                        <input type="file" name="upload_story_cover" id="upload_story_cover" />
                        <input type="hidden" name="story_cover" id="story_cover" />
                    </td>
                </tr>

                <tr>
                    <th>故事音频</th>
                    <td>
                        <input type="file" name="upload_story_mp3" id="upload_story_mp3" />
                        <input type="hidden" name="story_mp3" id="story_mp3" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="button" id="submit" name="submit" value="提交">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
    seajs.use('story/add_story');
</script>