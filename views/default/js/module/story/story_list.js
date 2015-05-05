
define(function(require) {

    require('weiboyi');

    var grid;

    loadGrid();



    /**
     * 加载列表
     * @param params
     */
    function loadGrid(params) {
        if(!params)
        {
            params = {};
        }

        if (!grid) {
            grid = new W.Grid({
                pageInfo: {
                    limit: 10,
                    start: 0
                },
                autoLoad: false,
                columns: [
                    {
                    text: '公司简称',
                    dataIndex: 'company_name'
                    },{
                        text: '登录名',
                        dataIndex: 'username'
                    },{
                        text: '所属销售',
                        dataIndex: 'sale_name'
                    },{
                        text: '变动金额',
                        dataIndex: 'change_amount'
                    },{
                        text: '操作类型',
                        dataIndex: 'operation_type_name'
                    },{
                        text: '欠款时间',
                        dataIndex: 'baddebt_time'
                    },{
                        text: '录入时间',
                        dataIndex: 'created_time'
                    },{
                        text: '录入人',
                        dataIndex: 'operator_name'
                    },{
                        text: '备注',
                        dataIndex: 'comment',
                        formatter: function(data, row){
                            var a = $("<a href='javascript:void(0)' class='js_show_comment'></a>").html("查看");
                            a.attr('data-content', data);
                            return a;
                        }

                    }
                ],
                url: '/story/index/get_story_list',
                renderTo: '#story_list_div'
            });
        }

        grid.setStart(0);
        grid.setParams(params);
        grid.reload();
    }

});