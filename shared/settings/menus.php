<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['menus']=array (
  0 =>
  array (
    'menu_id' => '1',
    'class_name' => 'system',
    'method_name' => 'home',
    'menu_name' => '系统',
    'sub_menus' =>
    array (
//      0 =>
//      array (
//        'menu_id' => '2',
//        'class_name' => 'system',
//        'method_name' => 'home',
//        'menu_name' => '后台首页',
//        'sub_menus' =>
//        array (
//          0 =>
//          array (
//            'menu_id' => '3',
//            'class_name' => 'system',
//            'method_name' => 'home',
//            'menu_name' => '后台首页',
//          ),
//        ),
//      ),
//      1 =>
//      array (
//        'menu_id' => '4',
//        'class_name' => 'setting',
//        'method_name' => 'site',
//        'menu_name' => '系统设置',
//        'sub_menus' =>
//        array (
//          0 =>
//          array (
//            'menu_id' => '5',
//            'class_name' => 'setting',
//            'method_name' => 'site',
//            'menu_name' => '站点设置',
//          ),
//          1 =>
//          array (
//            'menu_id' => '6',
//            'class_name' => 'setting',
//            'method_name' => 'backend',
//            'menu_name' => '后台设置',
//          ),
//          2 =>
//          array (
//            'menu_id' => '7',
//            'class_name' => 'system',
//            'method_name' => 'password',
//            'menu_name' => '修改密码',
//          ),
//          3 =>
//          array (
//            'menu_id' => '8',
//            'class_name' => 'system',
//            'method_name' => 'cache',
//            'menu_name' => '更新缓存',
//          ),
//        ),
//      ),
//      2 =>
//      array (
//        'menu_id' => '9',
//        'class_name' => 'model',
//        'method_name' => 'view',
//        'menu_name' => '模型管理',
//        'sub_menus' =>
//        array (
//          0 =>
//          array (
//            'menu_id' => '10',
//            'class_name' => 'model',
//            'method_name' => 'view',
//            'menu_name' => '内容模型管理',
//          ),
//          1 =>
//          array (
//            'menu_id' => '11',
//            'class_name' => 'category',
//            'method_name' => 'view',
//            'menu_name' => '分类模型管理',
//          ),
//        ),
//      ),
//      3 =>
//      array (
//        'menu_id' => '12',
//        'class_name' => 'plugin',
//        'method_name' => 'view',
//        'menu_name' => '插件管理',
//        'sub_menus' =>
//        array (
//          0 =>
//          array (
//            'menu_id' => '13',
//            'class_name' => 'plugin',
//            'method_name' => 'view',
//            'menu_name' => '插件管理',
//          ),
//        ),
//      ),
//      4 =>
//      array (
//        'menu_id' => '14',
//        'class_name' => 'role',
//        'method_name' => 'view',
//        'menu_name' => '权限管理',
//        'sub_menus' =>
//        array (
//          0 =>
//          array (
//            'menu_id' => '15',
//            'class_name' => 'role',
//            'method_name' => 'view',
//            'menu_name' => '用户组管理',
//          ),
//          1 =>
//          array (
//            'menu_id' => '16',
//            'class_name' => 'user',
//            'method_name' => 'view',
//            'menu_name' => '用户管理',
//          ),
//        ),
//      ),

        5 =>
            array (
                'menu_id' => '21',
                'class_name' => 'role',
                'method_name' => 'view',
                'menu_name' => '故事管理',
                'sub_menus' =>
                    array (
                        0 =>
                            array (
                                'menu_id' => '22',
                                'class_name' => 'story/index',
                                'method_name' => 'home',
                                'menu_name' => '故事列表',
                            ),
                        1 =>
                            array (
                                'menu_id' => '23',
                                'class_name' => 'story/index',
                                'method_name' => 'add_story',
                                'menu_name' => '添加故事',
                            )

                    ),
            ),
            6 =>
                array (
                    'menu_id' => '24',
                    'class_name' => 'role',
                    'method_name' => 'view',
                    'menu_name' => '课程管理',
                    'sub_menus' =>
                        array (
                            0 =>
                                array (
                                    'menu_id' => '25',
                                    'class_name' => 'study/index',
                                    'method_name' => 'class_list_page',
                                    'menu_name' => '课程列表',
                                ),
                            1 =>
                                array (
                                    'menu_id' => '26',
                                    'class_name' => 'study/index',
                                    'method_name' => 'add_class_page',
                                    'menu_name' => '添加课程',
                                )

                        ),
                ),
            7 =>
                array (
                    'menu_id' => '27',
                    'class_name' => 'role',
                    'method_name' => 'view',
                    'menu_name' => '玩具管理',
                    'sub_menus' =>
                        array (
                            0 =>
                                array (
                                    'menu_id' => '28',
                                    'class_name' => 'user_toy/index',
                                    'method_name' => 'toy_list_page',
                                    'menu_name' => '玩具列表',
                                )
                        ),
                ),
    ),
  ),
  1 => 
  array (
    'menu_id' => '17',
    'class_name' => 'content',
    'method_name' => 'view',
    'menu_name' => '内容管理',
    'sub_menus' => 
    array (
      0 => 
      array (
        'menu_id' => '18',
        'class_name' => 'content',
        'method_name' => 'view',
        'menu_name' => '内容管理',
        'sub_menus' => 
        array (
        ),
      ),
      1 => 
      array (
        'menu_id' => '19',
        'class_name' => 'category_content',
        'method_name' => 'view',
        'menu_name' => '分类管理',
        'sub_menus' => 
        array (
        ),
      ),
    ),
  ),
  2 => 
  array (
    'menu_id' => '20',
    'class_name' => 'module',
    'method_name' => 'run',
    'menu_name' => '工具',
    'sub_menus' => 
    array (
    ),
  ),
);