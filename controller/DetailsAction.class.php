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
	private $_attr = null;
	private $_commend = null;
	public function __construct()
	{
		parent::__construct();
		$this->_nav = new NavModel();
		$this->_goods = new GoodsModel();
		$this->_attr = new AttrModel();
		$this->_commend = new CommendModel();
	}

	public function index()
	{
		parent::page(20,$this->_commend);
		$this->_tpl->assign('Commend',$this->_commend->findDetailsCommend());
		$this->_tpl->assign('FrontNav',$this->_nav->findFrontNav());
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->assign('FrontGoods', $this->_goods->findDetailsGoods());
		$this->_tpl->assign('attrType',$this->_attr->getAttrType());
		$this->_tpl->assign('domain',Tool::getDomain());
		$this->_tpl->display(SMARTY_FRONT.'public/details.tpl');
	}
}