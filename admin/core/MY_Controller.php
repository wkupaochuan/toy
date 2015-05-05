<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 *
 * @package     DiliCMS
 * @subpackage  core
 * @category    core
 * @author      Jeongee
 * @link        http://www.dilicms.com
 */		
abstract class Admin_Controller extends CI_Controller
{
	/**
     * _admin
     * 保存当前登录用户的信息
     *
     * @var object
     * @access  public
     **/
	public $_admin = NULL;


    /**
     *构造函数
     */
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->settings->load('backend');
		$this->load->switch_theme(setting('backend_theme'));
		$this->_check_login();
		$this->load->library('acl');
		$this->load->library('plugin_manager');
	}
		
	// ------------------------------------------------------------------------

    /**
     * 检查用户是否登录
     *
     * @access  protected
     * @return  void
     */
	protected function _check_login()
	{
		if ( ! $this->session->userdata('uid'))
		{
			redirect(setting('backend_access_point') . '/login');
		}
		else
		{
			$this->_admin = $this->user_mdl->get_full_user_by_username($this->session->userdata('uid'), 'uid');
			if ($this->_admin->status != 1)
			{
				$this->session->set_flashdata('error', "此帐号已被冻结,请联系管理员!");
				redirect(setting('backend_access_point') . '/login');
			}
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 加载视图
     *
     * @access  protected
     * @param   string
     * @param   array
     * @return  void
     */
	protected function _template($template, $data = array())
	{
		$data['tpl'] = $template;
		$this->load->view('sys_entry', $data);
	}


    /**
     * smarty
     * @param $key
     * @param $val
     */
    public function assign($key,$val) {
        $this->cismarty->assign($key,$val);
    }

    /**
     * cismarty
     * @param $html
     */
    public function display($html) {
        $this->cismarty->assign('backend_title',setting('backend_title'));
        $this->cismarty->assign('base_url', base_url().'public/');
        $this->cismarty->assign('backend_logo', setting('backend_logo'));
        $this->cismarty->assign('top_menus', $this->acl->show_top_menus());
        $this->cismarty->assign('quit_url', backend_url('login/quit'));
        $this->cismarty->assign('system_home_url', backend_url('system/home'));
        $this->cismarty->assign('site_home_url', base_url().'../');
        $this->cismarty->assign('admin_user_name', $this->_admin->username);
        $this->cismarty->assign('admin_role_name', $this->_admin->name);
        $this->cismarty->assign('trigger_navigation', $this->plugin_manager->trigger_navigation());

        $this->cismarty->assign('system_left_menus', $this->acl->show_left_menus());

        $this->cismarty->assign('content_html',$html);
        $this->cismarty->display('test/sys_entry.php');
    }

    // ------------------------------------------------------------------------

    /**
     * 检查权限
     * @param string $action
     * @param string $folder
     */
    protected function _check_permit($action = '', $folder = '')
	{
		if ( ! $this->acl->permit($action, $folder))
		{
			$this->_message('对不起，你没有访问这里的权限！', '', FALSE);
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 信息提示
     *
     * @access  public
     * @param   string
     * @param   string
     * @param   bool
     * @param   string
     * @return  void
     */
	public function _message($msg, $goto = '', $auto = TRUE, $fix = '')
	{
		if($goto == '')
		{
			$goto = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url();
		}
		else
		{
			$goto = strpos($goto, 'http') !== false ? $goto : backend_url($goto);	
		}
		$goto .= $fix;
		$this->_template('sys_message', array('msg' => $msg, 'goto' => $goto, 'auto' => $auto));
		echo $this->output->get_output();
		exit();
	}

	// ------------------------------------------------------------------------

    /**
     * 请求成功
     * @param $data
     * @param $msg
     */
    public function rest_success($data, $msg = '')
    {
        $rest_data = array(
            'code' => $this->config->my_item('toy/error_code', 'success')
            , 'data' => $data
            , 'msg' => $msg
        );

        header("Content-type: application/json");
        echo json_encode($rest_data);
        exit();
    }



    /**
     * 请求失败
     * @param $msg
     * @param $error_code
     */
    public function rest_fail($msg, $error_code = NULL){
        $rest_data = array(
            'code' => empty($error_code)? $this->config->my_item('toy/app_error_code', 'fail'):$error_code
            , 'msg' => $msg
        );
        echo json_encode($rest_data);
        exit();
    }


}

	