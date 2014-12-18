<?php

class Story_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('story/story_model');
    }


    /**
     * 获取故事列表
     * @return mixed
     */
    public function get_story_list()
    {
        $array_story_list = $this->story_model->get_sotry_list();
        return $array_story_list;
    }


    /**
     * 获取故事详情
     * @param $int_story_id
     * @return null
     */
    public function get_story_by_id($int_story_id)
    {
        $story = $this->story_model->get_story_by_id($int_story_id);
        return empty($story)? null:$story[0];
    }


    /**
     * 新增故事
     * @param $new_story
     * @return mixed
     */
    public function add_new_story($new_story)
    {
        return $this->story_model->add_new_story($new_story);
    }


}