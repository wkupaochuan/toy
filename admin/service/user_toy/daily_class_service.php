<?php

class daily_class_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_toy/daily_class_model');
    }


    /**
     * 新增每日课程
     */
    public function add_daily_class($data)
    {
        $this->daily_class_model->add_daily_class($data);
    }


    /**
     * 批量新增每日课程
     * @param $toy_id
     * @param $class_ids
     */
    public function batch_add_daily_class($toy_id, $class_ids)
    {
        $expected_time = date('Y-m-d');
        foreach($class_ids as $class_id)
        {
            $new_daily_class = array(
                'toy_id' => $toy_id
                , 'class_id' => $class_id
                , 'expected_time' => $expected_time
            );
            $this->add_daily_class($new_daily_class);
        }
    }


    /**
     * 获取玩具今日课程
     * @param $toy_id
     * @return mixed
     */
    public function get_toy_daily_class($toy_id)
    {
        $today = date('Y-m-d');
        $class_list = $this->daily_class_model->get_daily_class_by_toy_id($toy_id, $today);
        return $class_list;
    }


    /**
     * 获取课程列表
     */
    public function get_class_list($choosen_class_list)
    {
        $choosen_class_ids = $this->get_one_dimensional_array($choosen_class_list, 'class_id');

        // 获取课程列表
        $CI = & get_instance();
        $CI->load->service('study/class_service');
        $class_list = $CI->class_service->get_class_list_by_ids($choosen_class_ids);

        return $class_list;
    }


    /**
     * 从多维数组中获取一个一维数组
     * @param $array
     * @param $key
     * @return array
     */
    public function get_one_dimensional_array($array, $key)
    {
        $res = array();
        foreach($array as $record)
        {
            if(!empty($record[$key]))
            {
                $res[] = $record[$key];
            }
        }
        return $res;
    }


} 