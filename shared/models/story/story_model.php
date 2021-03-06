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


    /**
     * 更新数据
     * @param $new_data
     * @param $where
     */
    public function update($new_data, $where)
    {
        $this->_build_where_for_update($where);
        $this->db->update($this->_table_name, $new_data);
    }


    /**
     * 查询
     * @param $condition
     * @param null $limit
     * @param $offset
     * @return mixed
     */
    public function get($condition, $limit = null, $offset = null)
    {
        $this->_build_where_for_select($condition);
        $this->_select_from();
        $query = $this->db->get('', $limit, $offset);
        return $query->result_array();
    }


    /**
     * 查询总量
     * @param $condition
     * @return mixed
     */
    public function count($condition)
    {
        $this->_build_where_for_select($condition);
        $this->_select_from();
        return $this->db->count_all_results();
    }


    /***************************************************** private methods **********************************************************************************************/

    /**
     * 查询
     */
    private function _select_from()
    {
        $this->db->from($this->_table_name);
    }


    /**
     * 构造查询条件
     * @param $condition
     */
    private function _build_where_for_select($condition)
    {
        foreach($condition as $search_key => $search_value)
        {
            $search_value = trim($search_value);
            if(strlen($search_value) === 0)
            {
                continue;
            }

            switch($search_key)
            {
                case 'user_name':
                    $this->db->where('user_name', $search_value);
                    break;
                case 'toy_unique_id':
                    $this->db->where('toy_unique_id', $search_value);
                    break;
                case 'is_deleted':
                    $this->db->where('is_deleted', $search_value);
                    break;
                default:
                    break;
            }
        }
    }


    /**
     * 构造更新
     * @param $condition
     */
    private function _build_where_for_update($condition)
    {
        foreach($condition as $search_key => $search_value)
        {
            $search_value = trim($search_value);
            if(strlen($search_value) === 0)
            {
                continue;
            }

            switch($search_key)
            {
                case 'story_id':
                    $this->db->where('id', $search_value);
                    break;
                default:
                    break;
            }
        }
    }

}