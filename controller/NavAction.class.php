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
    private $_brand = null;
    public function __construct()
    {
        parent::__construct();
        $this->_brand = new BrandModel();
    }

    public function index()
    {
        parent::page();
        if(isset($_GET['sid']))
        {
            $this->_tpl->assign('OneNav',$this->_model->findOne());
        }
        $this->_tpl->assign('AllNav',$this->_model->findAll());
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
        if(isset($_GET['id']))
        {
            $this->_tpl->assign('AllBrand',Tool::setFormItem($this->_brand->findNavBrand(),'id','name'));
            $this->_tpl->assign('OneNav',$this->_model->findOne());
        }
        $this->_tpl->display(SMARTY_ADMIN.'nav/add.tpl');
    }

    public function update()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->update())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'导航修改成功');
            }
            else
            {
                $this->_redirect->error('导航修改失败');
            }
        }
        if(isset($_GET['id']))
        {
            $this->_tpl->assign('selectedBrand',$this->_model->findUpdateBrand());
            $this->_tpl->assign('AllBrand',Tool::setFormItem($this->_brand->findNavBrand(),'id','name'));
            $this->_tpl->assign('OneNav',$this->_model->findOne());
            $this->_tpl->display(SMARTY_ADMIN.'nav/update.tpl');
        }
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

    public function sort()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->sort())
            {
                $this->_redirect->succ(Tool::getPrevPage());
            }
            else
            {
                $this->_redirect->error('导航排序失败');
            }
        }
    }

    //ajax
    public function isName()
    {
        $this->_model->isName();
    }
}
