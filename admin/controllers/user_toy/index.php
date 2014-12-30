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

        // 获取课程列表
        $this->load->service('study/class_service');
        $class_list = $this->class_service->get_class_list();

        // 获取课程类型map
        $class_type_map = $this->class_service->get_class_key_v_map();


        $this->assign('class_list', $class_list);
        $this->assign('class_type_map', $class_type_map);
        $this->assign('toy_detail', $toy_detail);


        $this->display('user_toy/set_class_page.php');
    }


    /**
     * 设置课程
     */
    public function _set_class_post()
    {
        $params = $this->input->post();
        print_r($params);exit;
    }

} 