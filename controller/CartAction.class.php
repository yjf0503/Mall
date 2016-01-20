<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/18
 * Time: 11:50
 */
//购物车控制器
class CartAction extends Action{
	private $_cart = null;
	private $_nav = null;
	private $_order = null;
	private $_address = null;
	public function __construct()
	{
		parent::__construct();
		if(!isset($_COOKIE['user']))
		{
			$this->_redirect->succ('?a=member&m=login','购物前必须登录');
		}
		$this->_cart = new Cart();
		$this->_nav = new NavModel();
		$this->_order = new OrderModel();
		$this->_address = new AddressModel();
	}

	//显示购物车
	public function index()
	{
		$this->_tpl->assign('FrontCart',$this->_cart->getProduct());
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->display(SMARTY_FRONT.'public/cart.tpl');
	}

	//给购物车添加商品
	public function addProduct()
	{
		if($this->_cart->addProduct())
		{
			$this->_redirect->succ('?a=cart');
		}
	}

	//删除商品
	public function delProduct()
	{
		if($this->_cart->delProduct())
		{
			$this->_redirect->succ('?a=cart');
		}
	}

	//清空购物车
	public function clearProduct()
	{
		if($this->_cart->clearProduct())
		{
			$this->_redirect->succ('?a=cart');
		}
	}

	//改变商品数量
	public function changeNum()
	{
		if($this->_cart->changeNum())
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

	//提交订单
	public function order()
	{
		if(isset($_POST['send']))
		{
			$this->_order->order();
		}
	}

	//显示结算
	public function flow()
	{
		$this->_tpl->assign('FrontCart',$this->_cart->getProduct());
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('FrontAddress',$this->_address->findOne());
		$this->_tpl->display(SMARTY_FRONT.'public/flow.tpl');
	}
}