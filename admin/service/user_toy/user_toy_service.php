<?php


class user_toy_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_toy/user_toy_model');
    }


    /**
     * 获取玩具列表
     * @return mixed
     */
    public function get_user_toy_list()
    {
        $user_toy_list = $this->user_toy_model->get_user_toy_list();

        return $user_toy_list;
    }


    /**
     * 根据id，获取玩具详情
     * @param $toy_id
     * @return null
     */
    public function get_toy_by_id($toy_id)
    {
        $toy_detail = $this->user_toy_model->get_toy_by_id($toy_id);
        return $toy_detail;
    }


} 