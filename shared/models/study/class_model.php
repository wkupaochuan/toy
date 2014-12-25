<?php


class class_model extends  CI_Model{

    private static $_table_name = 'toy_class';


    /**
     * 构造方法
     * 1-- 加载数据库类
     */
    public function __construct()
    {
        $this->load->database('default');
    }


    /**
     * 添加课程
     * @param $new_class
     */
    public function add_class($new_class)
    {
        $set =  array(
            'class_type_id' => $new_class['class_type_id'],
            'class_title' => $new_class['class_title'],
            'class_cover_path' => $new_class['class_cover_path']
        );
        $this->db->insert(self::$_table_name, $set);
    }


    /**
     * 获取课程列表
     * @return null
     */
    public function get_class_list()
    {
        $table_name = self::$_table_name;
        $str_sql = <<<EOD
            select * from $table_name
EOD;

        $res = $this->db->query($str_sql);
        return empty($res)? null:$res->result_array();
    }


    /**
     * 获取课程详情
     * @param $class_id
     * @return null
     */
    public function get_class_detail_by_id($class_id)
    {
        $table_name = self::$_table_name;
        $str_sql = <<<EOD
            select * from $table_name where class_id = $class_id
EOD;

        $res = $this->db->query($str_sql);
        $res = empty($res)? null:$res->result_array();
        return empty($res)? null:$res[0];
    }


} 