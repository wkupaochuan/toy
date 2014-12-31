<?php

class index extends Admin_Controller{

    public function __construct()
    {
        parent::__construct();


    }


    /**
     * 玩具用户列表
     */
    public function toy_list_page()
    {
        $this->load->service('user_toy/user_toy_service');

        $user_toy_list = $this->user_toy_service->get_user_toy_list();

        $this->assign('toy_list', $user_toy_list);

        $this->display('user_toy/toy_list_page.php');
    }


    /**
     * 玩具端课程设置页面
     */
    public function set_class_page()
    {
        // 获取参数
        $toy_id = $this->input->get('toy_id');

        // 获取玩具详情
        $this->load->service('user_toy/user_toy_service');
        $toy_detail = $this->user_toy_service->get_toy_by_id($toy_id);

        // 获取已经选定的每日课程
        $this->load->service('user_toy/daily_class_service');
        $choosen_class_list = $this->daily_class_service->get_toy_daily_class($toy_id);

        // 获取课程列表
        $class_list = $this->daily_class_service->get_class_list($choosen_class_list);

        // 获取课程类型map
        $this->load->service('study/class_service');
        $class_type_map = $this->class_service->get_class_key_v_map();

        $this->assign('class_list', $class_list);
        $this->assign('choosen_class_list', $choosen_class_list);
        $this->assign('class_type_map', $class_type_map);
        $this->assign('toy_detail', $toy_detail);


        $this->display('user_toy/set_class_page.php');
    }


    /**
     * 设置每日课程
     */
    public function _set_class_post()
    {
        // 获取参数
        $params = $this->input->post();

        // 添加每日课程
        $this->load->service('user_toy/daily_class_service');
        $toy_id = $params['toy_id'];
        $class_ids = $params['class_ids'];
        $this->daily_class_service->batch_add_daily_class($toy_id, $class_ids);

    }

} 