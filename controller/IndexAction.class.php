<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 6:03 PM
 */
class IndexAction extends Action
{
    private $_nav = null;

    public function __construct()
    {
        parent::__construct();
        $this->_nav = new NavModel();
    }

    public function index()
    {
        $this->_tpl->assign('FrontTenNav',$this->_nav->findFrontTenNav());
        $this->_tpl->display(SMARTY_FRONT.'public/index.tpl');
    }


}