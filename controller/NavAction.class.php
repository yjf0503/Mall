<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//导航条控制器
class NavAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN.'nav/show.tpl');
    }

    public function add()
    {
        if (isset($_POST['send']))
        {
            if($this->_model->add())
            {
                $this->_redirect->succ('?a=nav','导航新增成功');
            }
            else
            {
                $this->_redirect->error('导航新增失败');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'nav/add.tpl');
    }

    public function update()
    {
        $this->_tpl->display(SMARTY_ADMIN.'nav/update.tpl');
    }

    public function delete()
    {

    }
}
