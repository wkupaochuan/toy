
<div class="headbar">
    <div class="position"><span>课程管理</span><span>></span><span>添加课程>英文单词</span></div>
</div>
<div class="content_box">
<div class="content form_content">
    <form id="story_form">
        <table class="gridtable">
            <tr>
                <th>英文单词</th>
                <td>
                    <input type="text" name="eng" id="eng">
                </td>
            </tr>
            <tr>
                <th>汉语释义</th>
                <td>
                    <input type="text" name="chinese" id="chinese">
                </td>
            </tr>

            <tr>
                <th>图片</th>
                <td>
                    <input type="file" name="upload_image" id="upload_image" />
                    <input type="hidden" name="image" id="image" />
                </td>
            </tr>

            <tr>
                <th>发音</th>
                <td>
                    <input type="file" name="upload_voice" id="upload_voice" />
                    <input type="hidden" name="voice" id="voice" />
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="button" id="submit" name="submit" value="添加单词">
                </td>
            </tr>

        </table>
    </form>
</div>
</div>

<!--js-->
<script type="text/javascript">
    seajs.use('study/class/add_eng_words.js');
</script>