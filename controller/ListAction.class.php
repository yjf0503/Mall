<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/8
 * Time: 13:01
 */
class ListAction extends Action{
	private $_nav = null;
	private $_goods = null;

	public function __construct()
	{
		parent::__construct();
		$this->_nav = new NavModel();
		$this->_goods = new GoodsModel();
	}

	public function index()
	{
		parent::page(15, $this->_goods);
		$this->_tpl->assign('ListGoods', $this->_goods->findListGoods());
		$this->_tpl->assign('FrontNav', $this->_nav->findFrontNav());
		$this->_tpl->assign('FrontTenNav', $this->_nav->findFrontTenNav());
		$this->_tpl->assign('FrontPrice', $this->_nav->findFrontPrice());
		$this->_tpl->assign('FrontBrand', $this->_nav->findFrontBrand());
		$this->_tpl->assign('FrontAttr', $this->_nav->findFrontAttr());
		$this->_tpl->assign('FrontRecord', $this->_goods->getRecord());
		$this->_tpl->assign('NavSort', $this->_goods->navSort());
		$this->_tpl->assign('url', Tool::getUrl());
		$this->_tpl->display(SMARTY_FRONT.'public/list.tpl');
	}

	public function delRecord()
	{
		if($this->_goods->delRecord())
		{
			$this->_redirect->succ('?a=list');
		}
		else
		{
			$this->_redirect->error('浏览记录删除失败');
		}
	}
}