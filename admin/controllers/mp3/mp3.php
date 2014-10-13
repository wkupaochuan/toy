<?php
/**
 * Created by PhpStorm.
 * User: Gain
 * Date: 14-10-10
 * Time: 17:28
 */


/**
 * mp3操作类
 * Class Mp3
 */
class Mp3 extends  Admin_Controller{

    /**
     * 获取故事列表
     */
    public function home()
    {
        // 获取参数
        $params = $this->input->post();

        $params = $this->input->get();

        // 获取搜索条件
        $search_words = $params['search_words'];

        $res = $this->get_story_list_by_search($search_words);

        $data = array('storys' => $res);
        $this->_template('mp3/story_list', $data);
    }

    /**
     * 获取故事列表
     */
    public function _get_story_list_for_mobile_post()
    {
        // 获取参数
        $params = $this->input->post();

        $params = $this->input->get();

        // 获取搜索条件
        $search_words = $params['search_words'];

        $res = $this->get_story_list_by_search($search_words);

        echo json_encode($res);
    }


    /**
     * 搜索故事
     * @param $search_words
     * @return array
     */
    private function get_story_list_by_search($search_words)
    {
        $res = array();

        // 获取所有故事
        $this->load->model('base_model/mp3/mp3_model');
        $all_storys = $this->mp3_model->get_sotry_list();

        if(!empty($search_words)){
            // 根据搜索条件获取故事列表
        }
        else{
            $res = $all_storys;
        }

        return $res;

    }


    /**
     * 添加故事
     */
    public function add_story()
    {

        $data = array('storys' => 11);
        $this->_template('mp3/add_sotry', $data);
    }


    /**
     * 上传故事文件
     */
    public function _upload_new_mp3_post()
    {
        // 校验
        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        // 校验成功
        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];

            // Define a destination
            $targetFolder = '/mp3_files'; // Relative to the root
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

            // 移动文件到目的目录
            move_uploaded_file($tempFile,$targetFile);

            // 保存到db
            $new_story_data = array(
                'name' => substr($_FILES['Filedata']['name'], 0, strrpos($_FILES['Filedata']['name'], '.')),
                'path' => $_FILES['Filedata']['name']
            );
            $this->add_new_story_to_db($new_story_data);
        }

        //redirect( base_url('/mp3/mp3/home') );
    }



    /**
     * 存储故事信息到DB
     * @param $upload_data
     */
    private function add_new_story_to_db($upload_data)
    {
        $new_story = array(
            'name' => $upload_data['name']
            , 'path' => 'http://toy.wkupaochuan.com/mp3_files/'.$upload_data['path']
        );
        // 获取所有故事
        $this->load->model('base_model/mp3/mp3_model');
        $this->mp3_model->add_new_story($new_story);
    }




} 