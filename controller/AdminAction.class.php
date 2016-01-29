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

        if(isset($_POST['send']))
        {
            if($this->_manage->login())
            {
                $_login = $this->_manage->findLogin();
                $_SESSION['admin']['user'] = $_login[0]->user;
                $_SESSION['admin']['level'] = $_login[0]->level_name;
                $this->_manage->countLogin();
                $this->_redirect->succ('?a=admin','后台登录成功');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'public/login.tpl');
    }

    public function logout()
    {
        if(isset($_SESSION['admin']))
        {
            session_destroy();
        }
        $this->_redirect->succ('?a=admin&m=login');
    }

    public function ajaxLogin()
    {
        $this->_manage->ajaxLogin();
    }

    public function ajaxCode()
    {
        $this->_manage->ajaxCode();
    }
}