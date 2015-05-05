// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    /**
     * 提交课程
     * */
    $('#submit').click(function (){
        var params = $('#new_class_form').serialize();
        $.ajax({
            type: "POST",
            url: "/study/index/add_class",
            data: params,
            dataType: "json",
            success: function(data){
                alert('成功');
//                window.location.href = '/story/index/home';
            }
        });
    });


    /**
     * 上传课程封面
     */
    $('#upload_class_cover').uploadify({
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


    /**
     * 给隐藏的路径赋值
     * @param file_path
     */
    function getResult(file_path){
        //通过上传的图片来动态生成text来保存路径
        $('#class_cover_path').val(file_path);
    }
});