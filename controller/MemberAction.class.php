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
	private $_address = null;
	private $_order = null;
	public function __construct()
	{
		parent::__construct();
		$this->_nav = new NavModel();
		$this->_user = new UserModel();
		$this->_address = new AddressModel();
		$this->_order = new OrderModel();

	}

	public function index()
	{
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->display(SMARTY_FRONT.'public/member.tpl');
	}

	public function alipay()
	{
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('OneOrder',$this->_order->findUserDetails());
		$this->_tpl->display(SMARTY_FRONT.'public/member_alipay.tpl');
	}

	public function alipay2()
	{
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('OneOrder',$this->_order->findUserDetails());
		$this->_tpl->display(SMARTY_FRONT.'public/member_alipay2.tpl');
	}

	public function alipay3()
	{
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('OneOrder',$this->_order->findUserDetails());
		$this->_tpl->display(SMARTY_FRONT.'public/member_alipay3.tpl');
	}

	public function order()
	{
		parent::page(10,$this->_order);
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('AllOrder',$this->_order->findUserAll());
		$this->_tpl->display(SMARTY_FRONT.'public/member_order.tpl');
	}

	public function order_details()
	{
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('OneOrder',$this->_order->findUserDetails());
		$this->_tpl->assign('prev',Tool::getPrevPage());
		$this->_tpl->display(SMARTY_FRONT.'public/member_order_details.tpl');
	}

	public function address()
	{
		if (isset($_POST['send']))
		{
			if($this->_address->add())
			{
				$this->selected();
				$this->_redirect->succ('?a=member&m=address');
			}
			else
			{
				$this->_redirect->error('新增收货人失败');
			}
		}
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('AllAddress',$this->_address->findAll());
		$this->_tpl->display(SMARTY_FRONT.'public/member_address.tpl');
	}

	public function selected()
	{

		if($this->_address->selected())
		{
			$this->_redirect->succ(Tool::getPrevPage());
		}
		else
		{
			$this->_redirect->error('首选失败，请重试');
		}
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

	public function cancel()
	{
		if($this->_order->cancel())
		{
			$this->_redirect->succ(Tool::getPrevPage());
		}
		else
		{
			$this->_redirect->error('订单取消失败，请重试');
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

	public function refund()
	{
		if($this->_order->refund())
		{
			$this->_redirect->succ(Tool::getPrevPage());
		}
		else
		{
			$this->_redirect->error('申请退款失败，请重试');
		}
	}
}