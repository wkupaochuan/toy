
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>添加故事</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form id="story_form">
            <table class="gridtable">
                <tr class="validate_item">
                    <th>故事名称</th>
                    <td>
                        <input type="text" name="story_title" id="story_title">
                        <label class="validate_success_ico"></label>
                        <label class="validate_error"></label>
                    </td>
                </tr>

                <tr>
                    <th>故事封面</th>
                    <td>

                        <div id="upload_story_cover">
                            <ul class="js_list uploadlist_smallthumb clearfix">
                            </ul>
                            <div>
                                <a class="btn_small_normal js_btn" href="javascript:;">
                                    <span class="btn_wrap">修改头像</span>
                                </a>
                            </div>
                            <p class="validateItem">
                                <label for="" class="validateTips">
                                    图片格式必须为以下格式：jpeg, jpg, gif, png <br/>
                                    图片大小不可大于2M
                                </label>
                                <label for="" class="validateErrorLabel"></label>
                            </p>
                        </div>

<!--                        <input type="file" name="upload_story_cover" id="upload_story_cover" />-->
<!--                        <input type="hidden" name="story_cover" id="story_cover" />-->
<!--                        <img src="" class="js_story_cover"/>-->
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
