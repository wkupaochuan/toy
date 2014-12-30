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

} 