<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 8:39 PM
 */
class AdminAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN.'public/admin.tpl');
    }

    public function main()
    {
        $this->_tpl->display(SMARTY_ADMIN.'public/main.tpl');
    }
}