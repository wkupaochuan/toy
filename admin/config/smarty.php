<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$config['theme']        = 'default';

// 暂时迎合源码，将来可以任意修改位置
$config['template_dir'] = APPPATH . 'views/default';
$config['compile_dir']  = FCPATH . 'templates_c';
$config['cache_dir']    = FCPATH . 'cache';
$config['config_dir']   = FCPATH . 'configs';
//$config['config_dir']   = APPPATH . 'configs';
//$config['template_ext'] = '.php';
$config['caching']      = false;
$config['lefttime']     = 60;   