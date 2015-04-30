// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    require('validate');
    require('rest');

    processValidate();


    /**
     * 校验必填项
     * @param $form
     */
    function processValidate() {
        $('#story_form').formValidate({
            fields:[{
                name: 'story_title',
                display: '故事名称',
                rules: 'required'
            }
            ]
        });
    }


    /**
     * 提交故事
     * */
    $('#submit').click(function (){
        var params = $('#story_form').serialize();

        var request = $.restPost('/story/index/add_new_story', params);

        request.done(function(msg, data) {
//            W.message('操作成功！', 'success', function(){
//            });
        });

        request.fail(function(msg) {
//            W.alert(msg, 'error');
        });


//        $.ajax({
//            type: "POST",
//            url: "/story/index/add_new_story",
//            data: params,
//            dataType: "json",
//            success: function(data){
//                alert('成功');
//                window.location.href = '/story/index/home';
//            }
//        });
    });


    $('#upload_story_cover').uploadify({
        'auto'     : true,
        'multi'    : false,//是否多文件上传
        'fileTypeExts': '*.jpg; *.png',//可上传的文件类型
        'buttonText' : '选择图片', //通过文字替换钮扣上的文字
        'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
        'uploader' : '/story/index/upload_story_cover',            // 处理上传的后端程序
        'onUploadSuccess' : function(file, data, response) {
//            alert('上传成功');
//            getResult(data);//获得上传的文件路径
            var xx = data;

            $('.js_story_cover').attr("src", data.data.url);
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


    /**
     * 给隐藏的路径赋值
     * @param file_path
     */
    function getResult(file_path){
        //通过上传的图片来动态生成text来保存路径
        $('#story_cover').val(file_path);

    }
});