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

        // 获取课程类型字典
        $array_class_type_k_v_map = $this->class_service->get_class_key_v_map();


        $this->assign('class_type_map', $array_class_type_k_v_map);
        $this->assign('class_list', $class_list);

        $this->display('study/class_list.php');
    }


    /**
     * 课程详情页
     */
    public function class_detail_page()
    {

        $class_id = $this->input->get('class_id');
        $class_detail = $this->class_service->get_class_by_id($class_id);

        // 获取课程类型字典
        $array_class_type_k_v_map = $this->class_service->get_class_key_v_map();

        $this->assign('class_type_map', $array_class_type_k_v_map);
        $this->assign('class_detail', $class_detail);

        $this->display('study/class_detail_page.php');
    }


    /**
     * 诗歌详情页
     * 1--可修改、可添加
     */
    public function poetry_detail_page()
    {
        $class_id = $this->input->get('class_id');

        $this->assign('class_id', $class_id);
        $this->display('study/poetry_detail_page.php');
    }


    /**
     * 添加诗句
     */
    public function _add_poetry_sentences_post()
    {
        // 获取参数
        $params = $this->input->post();

        $this->class_service->batch_add_poetrys($params);
    }


    /**
     * 添加英文单词卡页面
     */
    public function add_eng_word_page()
    {
        $this->display('study/add_class_eng_words.php');
    }



    /**
     * 上传英文单词卡音频
     */
    public function _upload_eng_word_voice_post()
    {
        $file = $this->_handle_upload_file('eng_words/voice');

        echo $file;
    }


    /**
     * 上传英文单词卡图片
     */
    public function _upload_eng_word_image_post()
    {
        $file = $this->_handle_upload_file('eng_words/image');

        echo $file;
    }


    /**
     * 新增英文单词卡
     */
    public function _add_eng_word_post()
    {
        $array_params = $this->input->post();
        $this->load->service('study/eng_word_service');
        $this->eng_word_service->add_word($array_params);
    }



/**********************************private method*****************************************************************/


    /**
     * 处理上传文件
     * @param $target_dir
     * @return string
     */
    private function _handle_upload_file($target_dir)
    {

        $uploadedFileData = $_FILES['Filedata'];

        $tempFile = $uploadedFileData['tmp_name'];

        // Define a destination
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/upload_files/'.$target_dir;
        $targetFileName = time().'.'.pathinfo($uploadedFileData['name'], PATHINFO_EXTENSION);
        $targetFile = $targetPath. '/' .$targetFileName;

        // 移动文件到目的目录
        if(!file_exists($targetFile))
        {
            $this->_makesure_output_folder($targetPath);
            move_uploaded_file($tempFile,$targetFile);
        }

        return 'upload_files/' . $target_dir . '/' .$targetFileName;
    }



    private function _makesure_output_folder($folder)
    {
        if (!is_dir($folder)) {
            if (!mkdir($folder, 0777, TRUE)) {
                throw new Exception('Failed to create folder: ' . $folder);
            }
        }
    }

} 