<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/8
 * Time: 13:01
 */
class ListAction extends Action{
	private $_nav = null;

	public function __construct()
	{
		parent::__construct();
		$this->_nav = new NavModel();
	}

	public function index()
	{
		$this->_tpl->assign('FrontNav',$this->_nav->findFrontNav());
		$this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
		$this->_tpl->display(SMARTY_FRONT.'public/list.tpl');
	}
}