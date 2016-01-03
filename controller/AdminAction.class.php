<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 8:39 PM
 */
class AdminAction extends Action
{
    private $_manage = null;

    public function __construct()
    {
        parent::__construct();
        $this->_manage = new ManageModel();
    }

    public function index()
    {
        if(isset($_SESSION['admin']))
        {
            $this->_tpl->assign('admin',$_SESSION['admin']);
            $this->_tpl->display(SMARTY_ADMIN.'public/admin.tpl');
        }
        else
        {
            $this->_redirect->succ('?a=admin&m=login');
        }

    }

    public function main()
    {
        $this->_tpl->display(SMARTY_ADMIN.'public/main.tpl');
    }

    //后台登录
    public function login()
    {
        $_SESSION['admin']['user'] = 'root';
        $_SESSION['admin']['pass'] = '111111';
        $_SESSION['admin']['level'] = '超级管理员';
        if(isset($_POST['send']))
        {
            if($this->_manage->login())
            {
                $this->_redirect->succ('?a=admin','后台登录成功');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'public/login.tpl');
    }
}