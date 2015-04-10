<?php

class eng_word_service extends MY_Service{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('study/eng_word_model');
    }


    public function add_word($word)
    {
        $this->eng_word_model->insert($word);
    }



}