<?php


class Index extends  Admin_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->service('story/story_service');
    }


    /**
     * 获取故事列表
     */
    public function home()
    {
        $array_story_list = $this->story_service->get_story_list();

        $data = array('storys' => $array_story_list);
        $this->_template('story/story_list', $data);
    }

    /**
     * 故事详情页
     */
    public function story_detail()
    {
        // 获取参数
        $array_params = $this->input->get();
        $story_id = $array_params['story_id'];
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
     * 添加故事页面
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

            $uploadedFileData = $_FILES['Filedata'];

            $tempFile = $uploadedFileData['tmp_name'];

            // Define a destination
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . MP3_FILE_DIR;
            $targetFile = $targetPath. '/' .$uploadedFileData['name'];

            // 移动文件到目的目录
            move_uploaded_file($tempFile,$targetFile);

            // 保存到db
            $this->addNewStoryInfoToDb($uploadedFileData);
        }

    }



    /**
     * 存储故事信息到DB
     * @param $uploadedFileData
     */
    private function addNewStoryInfoToDb($uploadedFileData)
    {
        $new_story = array(
            'name' => substr($uploadedFileData['name'], 0, strrpos($uploadedFileData['name'], '.'))
            , 'path' => TOY_SITE_URL.'/'.MP3_FILE_DIR.'/'.$uploadedFileData['name']
        );
        // 添加故事信息
        $this->load->model('base_model/mp3/mp3_model');
        $this->mp3_model->add_new_story($new_story);
    }




} 