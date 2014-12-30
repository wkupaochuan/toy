<?php

class user_toy_model extends CI_Model{


    private static $_table_name = 'toy_user_toy';

    public function __construct()
    {
        parent::__construct();
        $this->load->database('detault');
    }


    /**
     * 获取玩具用户列表
     */
    public function get_user_toy_list()
    {
        $str_sql = <<<EOD
            select * from toy_user_toy;
EOD;

        $res = $this->db->query($str_sql);

        return $res->result_array();
    }

} 