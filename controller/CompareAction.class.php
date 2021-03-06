<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/4
 * Time: 13:34
 */
class CompareAction extends Action{
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
        $this->_tpl->assign('FrontTenNav', $this->_nav->findFrontTenNav());
        $this->_tpl->assign('FrontRecord', $this->_goods->getRecord());
        $this->_tpl->assign('Compare', $this->_goods->getCompare());
        $this->_tpl->display(SMARTY_FRONT.'public/compare.tpl');
    }

    //添加对比商品
    public function setCompare()
    {
        $this->_goods->setCompare();
        $this->_redirect->succ('?a=compare');
    }

    //删除对比商品
    public function delCompare()
    {
        $this->_goods->delCompare();
        $this->_redirect->succ('?a=compare');
    }

    //清除对比商品
    public function clearCompare()
    {
        $this->_goods->clearCompare();
        $this->_redirect->succ('?a=compare');
    }
}