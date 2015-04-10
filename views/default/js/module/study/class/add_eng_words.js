// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    /**
     * 点击‘添加单词按钮’
     * */
    $('#submit').click(function (){
        ajaxSubmitNewWord();
    });


    /**
     * 提交新单词
     */
    function ajaxSubmitNewWord()
    {
        var params = $('#story_form').serialize();
        $.ajax({
            type: "POST",
            url: "/study/index/add_eng_word",
            data: params,
            dataType: "json",
            success: function(data){
                alert('成功');
//                window.location.href = '/story/index/home';
            }
        });
    }


    $('#upload_image').uploadify({
        'auto'     : true,
        'multi'    : false,//是否多文件上传
        'fileTypeExts': '*.jpg; *.png',//可上传的文件类型
        'buttonText' : '选择图片', //通过文字替换钮扣上的文字
        'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
        'uploader' : '/study/index/upload_eng_word_image',            // 处理上传的后端程序
        'onUploadSuccess' : function(file, data, response) {
            alert('上传成功');
            $('#image').val(data)
        }
    });


    $('#upload_voice').uploadify({
        'auto'     : true,
        'multi'    : false,//是否多文件上传
        'fileTypeExts': '*.mp3',//可上传的文件类型
        'buttonText' : '选择发音', //通过文字替换钮扣上的文字
        'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
        'uploader' : '/study/index/upload_eng_word_voice',            // 处理上传的后端程序
        'onUploadSuccess' : function(file, data, response) {
            alert('上传成功');
            $('#voice').val(data);
        }
    });

});