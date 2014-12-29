// 所有模块都通过 define 来定义
define(function(require, exports, module) {


    // 诗歌表格
    var $poetryTable = $('#poetry_table');

    /**
     * 提交课程
     * */
    $('#submit').click(function (){
        var params = $('#poetry_form').serializeArray();
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
     * 增加诗句
     * */
    $('#add_poetry_sentence').click(function (){
        // 获取表格行数
        var trCount = $poetryTable.find("tr").length;

        var title = '';
        if(trCount == 0)
        {
            title += '标题';
        }
        else if(trCount == 1)
        {
            title += '作者';
        }
        else{
            title += '第' + (trCount - 1) + '句';
        }

        var newTrHtml = '\
            <tr>\
                <th>'
                + title  +
                '</th> \
                <td> \
                文字: <input type="text" name="content"> \
                 </td> \
                 <td>音频</td> \
                 <td> \
                        <input type="hidden" id="sentence_media_url_' + trCount + '" name="media_url"> \
                        <input type="file"  id="upload_sentence_media_url_' + trCount + '" /> \
                 </td> \
            </tr>\
            ';



        // 添加
        addTr($poetryTable, trCount - 1, newTrHtml);

        // 绑定上传事件
        bindUploadify('upload_sentence_media_url_' + trCount);
    });



    /**
     * 绑定上传事件
     * @param uploadId
     */
    function bindUploadify(uploadId)
    {
        $('#' + uploadId +'').uploadify({
            'auto'     : true,
            'multi'    : false,//是否多文件上传
            'fileTypeExts': '*.jpg; *.png',//可上传的文件类型
            'buttonText' : '选择文件', //通过文字替换钮扣上的文字
            'swf'      : 'js/uploadify/uploadify.swf', // 需要的flash
            'uploader' : '/story/index/upload_story_cover',            // 处理上传的后端程序
            'onUploadSuccess' : function(file, data, response) {
                alert('上传成功');
                getResult(data);//获得上传的文件路径
            }
        });
    }

    /**
     * 给隐藏的路径赋值
     * @param file_path
     */
    function getResult(file_path){
        //通过上传的图片来动态生成text来保存路径
        $('#class_cover_path').val(file_path);
    }




    ////////添加一行、删除一行封装方法///////
    /**
     * 为table指定行添加一行
     * tab 表id
     * row 行数，如：0->第一行 1->第二行 -2->倒数第二行 -1->最后一行
     * trHtml 添加行的html代码
     *
     */
    function addTr($table, row, trHtml){
        //获取table最后一行 $("#tab tr:last")
        //获取table第一行 $("#tab tr").eq(0)
        //获取table倒数第二行 $("#tableId tr").eq(-2)
        var $tr=$table.find('tr').eq(row);
        if($tr.size()==0){
            alert("指定的table id或行数不存在！");
            return;
        }
        $tr.after(trHtml);
    }

    function delTr(ckb){
        //获取选中的复选框，然后循环遍历删除
        var ckbs=$("input[name="+ckb+"]:checked");
        if(ckbs.size()==0){
            alert("要删除指定行，需选中要删除的行！");
            return;
        }
        ckbs.each(function(){
            $(this).parent().parent().remove();
        });
    }




});