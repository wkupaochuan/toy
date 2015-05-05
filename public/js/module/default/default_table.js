// 所有模块都通过 define 来定义
define(function(require, exports, module) {

    // 通过 exports 对外提供接口
    exports.init = function init(){
        var testValue = $('#test_input').val();
//        alert('woshi' + testValue);

        //隔行换色
        $(".list_table tr::nth-child(even)").addClass('even');
        $(".list_table tr").hover(
            function () {
                $(this).addClass("sel");
            },
            function () {
                $(this).removeClass("sel");
            }
        );
    }

});