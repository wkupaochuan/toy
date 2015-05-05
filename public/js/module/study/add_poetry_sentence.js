// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    // 诗句div
    var $poetryDiv = $('#poetry_div');

    //
    var uploadId = 2;

    /**
     * 提交课程
     * */
    $('#submit').click(function (){
        var params = serialize();
        $.ajax({
            type: "POST",
            url: "/study/index/add_poetry_sentences",
            data: params,
            dataType: "json",
            success: function(data){
                alert('成功');
//                window.location.href = '/story/index/home';
            }
        });
    });

    /**
     * 提交时，组装参数
     * @returns {{}}
     */
    function serialize() {
        var data = {};
        var classId = $('#class_id').val();
        $poetryDiv.find('form').each(function(index) {
            var para = {};
            $.each($(this).serializeArray(), function(index, item) {
                para[item.name] = item.value;
            });

            para['class_id'] = classId;
            para['order_in_poetry'] = index;
            data[index] = para;
        });

        return data;
    }


    /**
     * 增加诗句
     * */
    $('#add_poetry_sentence').click(function (){

        // 获取html内容
        var newPoetryHtml = getNewPoetrySentenceHtml();

        // 添加
        $poetryDiv.append(newPoetryHtml);

        // 绑定上传事件
        bindUploadify(uploadId);

        uploadId++;
    });


    /**
     * 获取新一行的内容
     * @param trCount
     */
    function getNewPoetrySentenceHtml()
    {
        var newPoetryHtml = '<div class="content form_content">\
            <form>\
            <table class="gridtable" id="poetry_table">\
                <tr>\
                    <th>诗句</th>\
                    <td>\
                    文字:\
                        <input type="text" id="sentence_content" name="content">\
                        </td>\
                        <td>音频</td>\
                        <td>\
                                <input type="hidden" id="sentence_media_url_' + uploadId + '" name="media_url">\
                                <input type="file"  id="upload_sentence_media_url_' + uploadId + '"  />\
                        </td>\
                        </tr>\
                    </table>\
                </form>\
            </div>\
            ';

        return newPoetryHtml;
    }



    /**
     * 绑定上传事件
     * @param uploadId
     */
    function bindUploadify(id)
    {
        $('#upload_sentence_media_url_' + id).uploadify({
            'auto'     : true,
            'multi'    : false,//是否多文件上传
            'fileTypeExts': '*.jpg; *.png',//可上传的文件类型
            'buttonText' : '选择文件', //通过文字替换钮扣上的文字
            'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
            'uploader' : '/story/index/upload_story_cover',            // 处理上传的后端程序
            'onUploadSuccess' : function(file, data, response) {
                getResult(data, '#sentence_media_url_' + id);//获得上传的文件路径
            }
        });
    }

    /**
     * 给隐藏的路径赋值
     * @param file_path
     */
    function getResult(file_path, id){
        //通过上传的图片来动态生成text来保存路径
        $(id).val(file_path);
    }

    bindUploadify(0);
    bindUploadify(1);

});