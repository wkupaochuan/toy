<?php

class poetry_model extends  CI_Model{

    private static $_table_name = 'toy_class_peotry_sentence';

    public function __construct()
    {
        parent::__construct();

        $this->load->database('default');
    }


    /**
     * 批量新增诗句
     */
    public function batch_add_poetry_sentence($data)
    {
        $this->db->insert_batch(self::$_table_name, $data);

    }

} 