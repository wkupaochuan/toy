<?php


class class_type_model extends  CI_Model{

    private static $_table_name = 'toy_enum_class_type';


    /**
     * 构造方法
     * 1-- 加载数据库类
     */
    public function __construct()
    {
        $this->load->database('default');
    }


    /**
     * 获取课程类型字典
     * @return mixed
     */
    public function get_class_type_dic()
    {
        $table_name = self::$_table_name;
        $sql = <<<EOD
            select * from $table_name;
EOD;

        // 查询
        $query = $this->db->query($sql);

        // 返回数据
        return $query->result_array();
    }

} 