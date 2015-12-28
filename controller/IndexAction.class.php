<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 6:03 PM
 */
class IndexAction extends Action
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_tpl->assign('name', '首页');
        $this->_tpl->display(SMARTY_FRONT.'public/index.tpl');
    }
}