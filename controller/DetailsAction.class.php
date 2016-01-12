<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/9
 * Time: 11:50
 */
class DetailsAction extends Action{
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
		$this->_tpl->assign('FrontNav',$this->_nav->findFrontNav());
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('FrontGoods', $this->_goods->findDetailsGoods());
		$this->_tpl->display(SMARTY_FRONT.'public/details.tpl');
	}
}