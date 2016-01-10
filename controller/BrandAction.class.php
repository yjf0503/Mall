<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//品牌控制器
class BrandAction extends Action
{
    private $_nav = null;
    public function __construct()
    {
        parent::__construct();
        $this->_nav = new NavModel();
    }

    public function index()
    {
        parent::page();
        $this->_tpl->assign('AllBrand',$this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN.'brand/show.tpl');
    }

    public function add()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->add())
            {
                $this->_redirect->succ('?a=brand','品牌新增成功');
            }
            else
            {
                $this->_redirect->error('品牌新增失败');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'brand/add.tpl');
    }

    public function update()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->update())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'品牌修改成功');
            }
            else
            {
                $this->_redirect->error('品牌修改失败');
            }
        }
        if(isset($_GET['id']))
        {
            $this->_tpl->assign('OneBrand',$this->_model->findOne());
            $this->_tpl->display(SMARTY_ADMIN.'brand/update.tpl');

        }
    }

    public function delete()
    {
        if(isset($_GET['id']))
        {
            if($this->_model->delete())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'品牌删除成功');
            }
            else
            {
                $this->_redirect->error('品牌删除失败');
            }
        }
    }

    //ajax
    public function isName()
    {
        $this->_model->isName();
    }
}
