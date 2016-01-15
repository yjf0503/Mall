<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//价格区间控制器
class PriceAction extends Action
{
    private $_nav;
    public function __construct()
    {
        parent::__construct();
        $this->_nav = new NavModel();
    }

    public function index()
    {
        parent::page();
        $this->_tpl->assign('AllPrice',$this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN.'price/show.tpl');
    }

    public function add()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->add())
            {
                $this->_redirect->succ('?a=price','价格区间新增成功');
            }
            else
            {
                $this->_redirect->error('价格区间新增失败');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'price/add.tpl');
    }

    public function update()
    {
//        if(isset($_POST['send']))
//        {
//            if($this->_model->update())
//            {
//                $this->_redirect->succ(Tool::getPrevPage(),'自定义属性修改成功');
//            }
//            else
//            {
//                $this->_redirect->error('自定义属性修改失败');
//            }
//        }
//        if(isset($_GET['id']))
//        {
//            $this->_tpl->assign('addNav',$this->_nav->findAddGoodsNav());
//            $this->_tpl->assign('OneAttr',$this->_model->findOne());
//            $this->_tpl->assign('way',array(0=>'单选',1=>'多选'));
            $this->_tpl->display(SMARTY_ADMIN.'price/update.tpl');
        //}

    }


    public function delete()
    {
        if(isset($_GET['id']))
        {
            if($this->_model->delete())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'自定义属性删除成功');
            }
            else
            {
                $this->_redirect->error('自定义属性删除失败');
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
