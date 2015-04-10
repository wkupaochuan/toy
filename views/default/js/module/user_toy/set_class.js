
define(function(require, exports, module) {

    /**
     * 提交课程
     * */
    $('#submit').click(function (){
        var params = serialize();
        console.log(params);
        $.ajax({
            type: "POST",
            url: "/user_toy/index/set_class",
            data: params,
            dataType: "json",
            success: function(data){
                alert('成功');
                window.location.reload();
            }
        });
    });

    function serialize()
    {
        var classIds = {};
        $('#class_list_table').find(':checkbox').each(function(index) {
            if($(this).attr('checked'))
            {
                var classId = $(this).attr('data-class_id');
                classIds[index] = classId;
            }
        });

        var param = {};
        param['toy_id'] = $('#toy_id').val();
        param['class_ids'] = classIds;

        return param;
    }

});