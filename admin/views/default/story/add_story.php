<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/uploadify/jquery.uploadify.min.js?ver=<?php echo rand(0,9999);?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
<style type="text/css">
    body {
        font: 13px Arial, Helvetica, Sans-serif;
    }
</style>
<div class="headbar">
	<div class="position"><span>故事管理</span><span>></span><span>添加故事</span></div>
</div>
<div class="content_box">
    <div class="content form_content">
        <form>
            <div id="queue"></div>
            <p><input type="file" name="file_upload" id="file_upload" multiple="true"/></p>
            <p><a href="javascript:$('#file_upload').uploadify('upload')">开始上传</a></p>
        </form>
    </div>

</div>


<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'auto'     : true,
            'fileTypeExts': '*.mp3',//可上传的文件类型
            'buttonText' : '选择故事', //通过文字替换钮扣上的文字
            'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
            'uploader' : '/mp3/mp3/upload_new_mp3'            // 处理上传的后端程序
        });
    });
</script>