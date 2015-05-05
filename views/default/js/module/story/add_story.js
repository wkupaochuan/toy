// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    require('validate');
    require('plupload');
    require('weiboyi');

    processValidate();
    processUploadStoryCover('');
    processUploadStoryVoice();


    /**
     * 提交故事
     * */
    $('#submit').click(function (){

        if(!submitCheck())
        {
            return ;
        }

        var params = $('#story_form').serialize();

        var request = $.restPost('/story/index/add_new_story', params);

        request.done(function(msg, data) {
            W.message('操作成功！', 'success', function(){
            });
        });

        request.fail(function(msg) {
            W.alert(msg, 'error');
        });

    });


    /**
     * 提交前校验
     * @returns {boolean}
     */
    function submitCheck()
    {
        var valid = true;
//        if (!processValidate()) {
//            valid = false;
//        }

        return valid;
    }


    /**
     * 上传故事声音
     * @param path
     */
    function processUploadStoryVoice() {
        var uploader = $('#upload_story_voice').plupload({
            upload_limit: 1,
            max_file_size : '5mb',
            url:'/story/index/upload_story_voice',
            filters: [
                {title: "Image files", extensions: "mp3"}
            ],
            onitemappend: function(up, $list, $item, filepath) {
                $item.find('.js_link').fancybox();

                $item.find('img').imageScale({
                    height: 70,
                    width: 70
                });
            },
            onitemschange: function (up, $list) {
                var items = uploader.getItems();
                if (items.length) {
                    $('#story_voice').val(items[0].path);
                } else {
                    $('#story_voice').val('');
                }
            }
        });
    }


    /**
     * 上传故事封面
     * @param path
     */
    function processUploadStoryCover(path) {
        var uploader = $('#upload_story_cover').plupload({
            upload_limit: 1,
            max_file_size : '5mb',
            url:'/story/index/upload_story_cover',
            filters: [
                {title: "Image files", extensions: "jpg,png,jpeg,gif"}
            ],
            onitemappend: function(up, $list, $item, filepath) {
                $item.find('.js_link').fancybox();

                $item.find('img').imageScale({
                    height: 70,
                    width: 70
                });
            },
            onitemschange: function (up, $list) {
                var items = uploader.getItems();
                if (items.length) {
                    $('#story_cover').val(items[0].path);
                } else {
                    $('#story_cover').val('');
                }
            }
        });

        if (path) {
            uploader.addItem(path);
        }
    }


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
            },{
                name: 'story_cover',
                display: '故事封面',
                rules: 'required'
            },{
                name: 'story_voice',
                display: '故事音频',
                rules: 'required'
            }
            ]
        });
    }


});