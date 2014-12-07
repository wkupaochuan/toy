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
}