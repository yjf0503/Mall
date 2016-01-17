<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/17
 * Time: 20:25
 */
//会员控制器
class MemberAction extends Action{
	private $_nav = null;
	private $_user = null;
	public function __construct()
	{
		parent::__construct();
		$this->_nav = new NavModel();
		$this->_user = new UserModel();
	}

	public function reg()
	{
		if (isset($_POST['send']))
		{
			if($this->_user->frontReg())
			{
				$this->_redirect->succ('?a=member&m=login');
			}
			else
			{
				$this->_redirect->error('注册失败');
			}
		}
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->display(SMARTY_FRONT.'public/reg.tpl');
	}

	public function login()
	{
		if (isset($_POST['send']))
		{
			if($this->_user->frontLogin())
			{
				$this->_redirect->succ('./');
			}
			else
			{
				$this->_redirect->error('注册失败');
			}
		}
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->display(SMARTY_FRONT.'public/login.tpl');
	}
	public function logout()
	{
		if($this->_user->frontLogout())
		{
			$this->_redirect->succ('./');
		}
		else
		{
			$this->_redirect->error('退出失败');
		}
	}

	public function isUser()
	{
		$this->_user->isUser();
	}

	public function ajaxLogin()
	{
		$this->_user->ajaxLogin();
	}
}