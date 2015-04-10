<?php

/**
 * 课程：英文单词卡
 * Class eng_word_model
 */
class eng_word_model extends CI_Model{

    private $_table_name = 'toy_class_eng_word';

    public function __construct()
    {
        parent::__construct();
    }

    /*********************************public methods**********************************************************/


    /**
     * 添加单词卡
     * @param $eng_word
     */
    public function insert($eng_word)
    {
        $this->db->insert($this->_table_name, $eng_word);
    }




    /*********************************private methods**********************************************************/

} 