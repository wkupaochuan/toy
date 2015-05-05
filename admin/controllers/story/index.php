<?php


class Index extends  Admin_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->service('story/story_service');
    }

    /**
     * 故事列表页面
     */
    public function home()
    {
        $array_story_list = $this->story_service->get_story_list(array());
        $this->assign('storys', $array_story_list);
        $this->display('story/story_list.php');
    }


    /**
     * 获取故事列表
     */
    public function get_story_list()
    {
        $params = $this->input->get_params();
        $limit = isset($params['limit'])? $params['limit']:10;
        $offset = isset($params['start'])? $params['start']:0;

        $where = array(
            'is_deleted' => 2
        );
        $list = $this->story_service->get_story_list($where, $limit, $offset);
        $count = $this->story_service->get_story_count($where);

        $this->pager->set_offset($offset, $limit);
        $this->pager->config($count, 'id');
        $res = $this->pager->make($list);

        $this->rest_success($res);
    }


    /**
     * 故事详情页
     */
    public function story_detail()
    {
        // 获取参数
        $array_params = $this->input->get();
        $story_id = $array_params['story_id'];
        $story_id = 2;
        $story = $this->story_service->get_story_by_id($story_id);
        $data = array('story_detail' => $story);
        $this->_template('/story/story_detail', $data);
    }


    /**
     * 初始化添加故事页面
     */
    public function add_story()
    {
        $this->display('story/add_story_test.php');
    }


    /**
     * 上传故事封面文件
     */
    public function _upload_story_cover_post()
    {
        $res = $this->resources_path->upload_story_cover();

        $this->rest_success($res);
    }


    /**
     * 上传故事音频文件
     */
    public function _upload_story_voice_post()
    {
        $res = $this->resources_path->upload_story_voice();

        $this->rest_success($res);
    }

    /**
     * 新加故事
     */
    public function _add_new_story_post()
    {
        $array_params = $this->input->get_params();

        $array_new_story = array(
            'story_title' => $array_params['story_title']
        , 'story_cover' => $array_params['story_cover']
        , 'story_voice' => $array_params['story_voice']
        );

        $res = $this->story_service->add_new_story($array_new_story);

        $this->rest_success($res);
    }


    /**
     * 删除故事
     */
    public function _del_story_post()
    {
        $params = $this->input->get_params();

        if(!isset($params['story_id']) || empty($params['story_id']))
        {
            $this->rest_fail('必须指定故事，才可以删除');
        }

        $res = $this->story_service->del_story($params['story_id']);

        $this->rest_success($res);
    }


} 