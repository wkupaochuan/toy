
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
                    limit: 5,
                    start: 0
                },
                autoLoad: false,
                columns: [
                    {
                        text: '编号',
                        dataIndex: 'id'
                    },{
                    text: '故事名称',
                    dataIndex: 'story_title'
                    },{
                        text: '故事封面',
                        dataIndex: 'story_cover',
                        formatter: function(data, row){
                            var a = '';
                            if(row.cells.story_cover)
                            {
                                a = '<img height="70" width="70" src="' + row.cells.story_cover + '"/>';
                            }

                            return a;
                        }
                    }, {
                        text: '操作',
                        opts:[
                            {
                                text: '删除',
                                size: 'mini',
                                handler: function(el, row) {
                                    deleteStory(row.cells.id);
                                }
                            }
                        ]
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



    /**
     * 删除故事
     * @param storyId
     */
    function deleteStory(storyId)
    {
        if(!storyId)
        {
            W.alert('必须指定故事, 才可以删除');
            return ;
        }

        var param = {};
        param['story_id'] = storyId;

        var request = $.restPost('/story/index/del_story', param);

        request.done(function() {
            W.message('删除成功！', 'success', function(){
                loadGrid();
            });
        });

        request.fail(function(msg) {
            W.alert(msg, 'error');
        });
    }

});