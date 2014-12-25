<?php

class Class_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('study/class_type_model');
        $this->load->model('study/class_model');
    }


    /**
     * 获取课程类型字典
     * @return mixed
     */
    public function get_class_type_dic()
    {
        $array_class_type_dic = $this->class_type_model->get_class_type_dic();
        return $array_class_type_dic;
    }


    /**
     * 获取课程类型的key->v map
     * @return array
     */
    public function get_class_key_v_map()
    {
        $array_class_type_dic = $this->class_type_model->get_class_type_dic();
        $res = array();
        foreach($array_class_type_dic as $record)
        {
            $res[$record['class_type_id']] = $record['display_name'];
        }
        return $res;
    }


    /**
     * 添加故事
     * @param $new_class
     */
    public function add_class($new_class)
    {
        $this->class_model->add_class($new_class);
    }


    /**
     * 获取故事列表
     * @return null
     */
    public function get_class_list()
    {
        $class_list = $this->class_model->get_class_list();
        foreach($class_list as & $record)
        {
            $record['class_cover_path'] =
                empty($record['class_cover_path'])? '':TOY_ADMIN_URL . $record['class_cover_path'];

        }
        return $class_list;
    }


    /**
     * 获取课程详情
     * @param $class_id
     * @return null
     */
    public function get_class_by_id($class_id)
    {
        $class_detail = $this->class_model->get_class_detail_by_id($class_id);
        if(!empty($class_detail))
        {
            $class_detail['class_cover_path'] = TOY_ADMIN_URL . $class_detail['class_cover_path'];
        }
        return $class_detail;
    }




}