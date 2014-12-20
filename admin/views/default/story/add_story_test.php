<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/common/common.js" type="text/javascript"></script>
<script src="js/uploadify/jquery.uploadify.min.js?ver=<?php echo rand(0,9999);?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
<style type="text/css">
    body {
        font: 13px Arial, Helvetica, Sans-serif;
    }
</style>
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
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
    $(function() {

        /**
         * 提交故事
         * */
        $('#submit').click(function (){
            var params = $('#story_form').serialize();
            $.ajax({
                type: "POST",
                url: "/story/index/add_new_story",
                data: params,
                dataType: "json",
                success: function(data){
                    alert('成功');
                    window.location.href = '/story/index/home';
//                    W.message('添加成功', 'success', function() {
//                        //窗口关闭后再刷新页面
//                        window.location.href = '/story/index/home';
//                    });
                }
            });
        });

        $('#upload_story_cover').uploadify({
            'auto'     : true,
            'multi'    : false,//是否多文件上传
            'fileTypeExts': '*.jpg; *.png',//可上传的文件类型
            'buttonText' : '选择图片', //通过文字替换钮扣上的文字
            'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
            'uploader' : '/story/index/upload_story_cover',            // 处理上传的后端程序
            'onUploadSuccess' : function(file, data, response) {
                alert('上传成功');
                getResult(data);//获得上传的文件路径
            }
        });


        $('#upload_story_mp3').uploadify({
            'auto'     : true,
            'multi'    : false,//是否多文件上传
            'fileTypeExts': '*.mp3',//可上传的文件类型
            'buttonText' : '选择故事', //通过文字替换钮扣上的文字
            'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
            'uploader' : '/story/index/upload_story_mp3',            // 处理上传的后端程序
            'onUploadSuccess' : function(file, data, response) {
                alert('上传成功');
                $('#story_mp3').val(data);
            }
        });


    });


    /**
     * 给隐藏的路径赋值
     * @param file_path
     */
    function getResult(file_path){
        //通过上传的图片来动态生成text来保存路径
        $('#story_cover').val(file_path);
    }

</script>