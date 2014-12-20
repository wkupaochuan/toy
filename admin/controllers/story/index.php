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
        $this->assign('storys', $array_story_list);
        $this->display('story/story_list.php');
    }



    /**
     * 故事详情页
     */
    public function story_detail()
    {
        // 获取参数
        $array_params = $this->input->get();
        $story_id = $array_params['story_id'];
        $story_id = 2;
        $story = $this->story_service->get_story_by_id($story_id);
        $data = array('story_detail' => $story);
        $this->_template('/story/story_detail', $data);

    }


    /**
     * 初始化添加故事页面
     */
    public function add_story()
    {
        $this->display('story/add_story_test.php');
    }


    /**
     * 上传故事封面文件
     */
    public function _upload_story_cover_post()
    {
        $uploadedFileData = $_FILES['Filedata'];

        $tempFile = $uploadedFileData['tmp_name'];

        // Define a destination
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . MP3_FILE_DIR;
        $targetFileName = time().'.'.pathinfo($uploadedFileData['name'], PATHINFO_EXTENSION);
        $targetFile = $targetPath. '/' .$targetFileName;

        // 移动文件到目的目录
        $this->moveFile($tempFile,$targetFile);

        echo MP3_FILE_DIR.'/'.$targetFileName;
    }


    /**
     * 上传故事音频文件
     */
    public function _upload_story_mp3_post()
    {
        $uploadedFileData = $_FILES['Filedata'];

        $tempFile = $uploadedFileData['tmp_name'];

        // Define a destination
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . MP3_FILE_DIR;
        $targetFileName = time().'.'.pathinfo($uploadedFileData['name'], PATHINFO_EXTENSION);
        $targetFile = $targetPath. '/' .$targetFileName;

        // 移动文件到目的目录
        $this->moveFile($tempFile,$targetFile);

        echo MP3_FILE_DIR.'/'.$targetFileName;
    }

    public function moveFile($tempFile,$targetFile)
    {
        if(!file_exists($targetFile))
        {
            move_uploaded_file($tempFile,$targetFile);
        }
    }


    /**
     * 新加故事
     */
    public function _add_new_story_post()
    {
        $array_params = $this->input->post();

        $array_new_story = array(
            'name' => $array_params['story_title']
            , 'story_cover_path' => $array_params['story_cover']
            , 'path' => $array_params['story_mp3']
        );

        $res = $this->story_service->add_new_story($array_new_story);
        print_r($res);
    }


} 