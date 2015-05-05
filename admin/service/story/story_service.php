<?php

class Story_service extends MY_Service{


    /************************************************************* public methods **********************************************************************************/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('story/story_model');
    }

    /**
     * 获取故事列表
     * @param $condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function get_story_list($condition, $limit = null, $offset = null)
    {
        $array_story_list = $this->story_model->get($condition, $limit, $offset);
        return $array_story_list;
    }

    /**
     * 获取故事列表
     * @param $condition
     * @return mixed
     */
    public function get_story_count($condition)
    {
        return $this->story_model->count($condition);
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
        return $this->story_model->insert($new_story);
    }


    /**
     * 删除故事
     * @param $story_id
     */
    public function del_story($story_id)
    {
        $new_story = array(
            'is_deleted' => 1
        );
        $where = array(
            'story_id' => $story_id
        );
        return $this->story_model->update($new_story, $where);
    }



    /************************************************************* private methods **********************************************************************************/


}