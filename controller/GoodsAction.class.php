<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//商品控制器
class GoodsAction extends Action
{
    private $_nav = null;
    public function __construct()
    {
        parent::__construct();
        $this->_nav = new NavModel();
    }

    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN.'goods/show.tpl');
    }

    public function add()
    {
        $this->_tpl->assign('addNav',$this->_nav->findAddGoodsNav());
        $this->_tpl->display(SMARTY_ADMIN.'goods/add.tpl');
    }

    public function update()
    {
        $this->_tpl->display(SMARTY_ADMIN.'goods/update.tpl');
    }


    public function delete()
    {
        if(isset($_GET['id']))
        {
            if($this->_model->delete())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'导航删除成功');
            }
            else
            {
                $this->_redirect->error('导航删除失败');
            }
        }
    }
}
