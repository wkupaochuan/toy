<?php


class daily_class_model extends CI_Model{

    private static $_table_name = 'toy_daily_class';

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }


    /**
     * 新增每日课程
     * @param $data
     */
    public function add_daily_class($data)
    {
        $this->db->insert(self::$_table_name, $data);
    }


    /**
     * 获取玩具端的每日课程
     * @param $toy_id
     * @param null $expected_time
     * @return mixed
     */
    public function get_daily_class_by_toy_id($toy_id, $expected_time = null)
    {
        $expected_time = empty($expected_time)? date('Y-m-d'):$expected_time;
        $str_sql = <<<EOD
        select daily_class.class_id, daily_class.checkpoint_score, daily_class.expected_time, daily_class.learning_progress
            , daily_class.toy_id, class.class_title, class.class_type_id, class.class_cover_path, class_type_dic.display_name
            from
        toy_daily_class daily_class
        left join toy_class class on class.class_id = daily_class.class_id
        left join toy_enum_class_type class_type_dic on class.class_type_id = class_type_dic.class_type_id
        where toy_id =$toy_id and expected_time = '$expected_time'
EOD;


        $res = $this->db->query($str_sql);

        return $res->result_array();
    }

} 