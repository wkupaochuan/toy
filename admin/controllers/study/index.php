<?php


class Index  extends  Admin_Controller{


/**********************************public method*****************************************************************/

    public function __construct()
    {
        parent::__construct();

        $this->load->service('study/class_service');
    }


    /**
     * 添加课程页面
     */
    public function add_class_page()
    {
        // 获取课程类型字典
        $array_class_type_dic = $this->class_service->get_class_type_dic();

        // 课程类型字典赋值
        $this->assign('class_type_dic', $array_class_type_dic);
        $this->display('study/add_class_page.php');
    }


    /**
     * 添加课程
     */
    public function _add_class_post()
    {
        // 获取参数
        $array_params = $this->input->post();

        // 获取课程类型字典

        $this->class_service->add_class($array_params);
    }


    /**
     * 课程列表页面
     */
    public function class_list_page()
    {
        // 获取课程列表
        $class_list = $this->class_service->get_class_list();

        //
        // 获取课程类型字典
        $array_class_type_k_v_map = $this->class_service->get_class_key_v_map();


        $this->assign('class_type_map', $array_class_type_k_v_map);
        $this->assign('class_list', $class_list);

        $this->display('study/class_list.php');

    }


/**********************************private method*****************************************************************/


} 