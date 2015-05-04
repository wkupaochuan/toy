<?php


class Story_model extends CI_Model{

    // 数据库表名常量
    private $_table_name = 'toy_story';

    /**
     * 构造方法
     * 1-- 加载数据库类
     */
    public function __construct()
    {
        $this->load->database('default');
    }


    /**
     * 获取故事列表
     */
    public function get_sotry_list()
    {
        // 查询sql
        $s_sql = <<<EOD
	        select * from $this->_table_name order by id desc
EOD;

        // 查询
        $query = $this->db->query($s_sql);

        // 返回数据
        return $query->result_array();
    }


    /**
     * 获取故事详情
     * @param $int_story_id
     * @return null
     */
    public function get_story_by_id($int_story_id)
    {
        if(empty($int_story_id))
        {
            return null;
        }

        $s_sql = <<<EOD
	        select * from $this->_table_name where id = $int_story_id
EOD;

        // 查询
        $query = $this->db->query($s_sql);

        // 返回数据
        return $query->result_array();

    }


    /**
     * 新增
     * @param $story
     * @return mixed
     */
    public function insert($story)
    {
        $this->db->insert($this->_table_name, $story);
        return $this->db->insert_id();
    }

}