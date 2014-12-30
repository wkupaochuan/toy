<?php


class user_toy_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_user_toy_list()
    {
        $this->load->model('user_toy/user_toy_model');
        $user_toy_list = $this->user_toy_model->get_user_toy_list();

        return $user_toy_list;
    }

} 