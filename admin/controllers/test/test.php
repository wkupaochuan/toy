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
class Test extends  Admin_Controller{

    /**
     * 获取故事列表
     */
    public function home()
    {

        $data = array('storys' => 1222);
        $this->_template('test/test', $data);
    }


    public function _upload_post()
    {
        // Define a destination
        $targetFolder = '/mp3_files/'; // Relative to the root

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];


            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }



} 