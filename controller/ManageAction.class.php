<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 19/12/2015/019
 * Time: 11:21 AM
 */
//管理员控制器
class ManageAction extends Action
{
    public function __construct()
    {
        parent::__construct(Factory::setModel());
    }

    //管理员列表
    public function index()
    {
        parent::page($this->_model->total());
        $this->_tpl->assign('AllManage',$this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN.'manage/show.tpl');
    }

    //添加管理员
    public function add()
    {
        if (isset($_POST['send']))
        {
            if($this->_model->add())
            {
               $this->_redirect->succ('?a=manage','管理员新增成功');
            }
            else
            {
                $this->_redirect->error('管理员新增失败');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'manage/add.tpl');
    }

    //删除管理员
    public function delete()
    {
        if(isset($_GET['id']))
        {
            if($this->_model->delete())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'管理员删除成功');
            }
            else
            {
                $this->_redirect->error('管理员删除失败');
            }
        }
    }

    //修改管理员
    public function update()
    {
        $this->_tpl->display(SMARTY_ADMIN.'manage/update.tpl');
    }

    //ajax
    public function isUser()
    {
        $this->_model->isUser();
    }

}