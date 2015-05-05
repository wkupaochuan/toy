<?php


class Index extends  Admin_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->service('story/story_service');
    }

    /**
     * 获取故事列表
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
        $array_story_list = $this->story_service->get_story_list(array());
        $this->assign('storys', $array_story_list);
        $this->display('story/story_list.php');
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


} 