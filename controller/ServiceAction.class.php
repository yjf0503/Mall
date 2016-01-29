<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//售后服务控制器
class ServiceAction extends Action
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
        $this->_tpl->assign('AllService',$this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN.'service/show.tpl');
    }

    public function add()
    {
        if(isset($_POST['send']))
        {
            if($this->_model->add())
            {
                $this->_redirect->succ('?a=service','售后服务新增成功');
            }
            else
            {
                $this->_redirect->error('售后服务新增失败');
            }
        }
        $this->_tpl->display(SMARTY_ADMIN.'service/add.tpl');
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
            $this->_tpl->assign('OneService',$this->_model->findOne());
            $this->_tpl->display(SMARTY_ADMIN.'service/update.tpl');

        }
    }

    public function delete()
    {
        if(isset($_GET['id']))
        {
            if($this->_model->delete())
            {
                $this->_redirect->succ(Tool::getPrevPage(),'售后服务删除成功');
            }
            else
            {
                $this->_redirect->error('售后服务删除失败，请取消默认首选');
            }
        }
    }

  public function first()
  {
      if(isset($_GET['id']))
      {
          if($this->_model->first())
          {
              $this->_redirect->succ(Tool::getPrevPage());
          }
          else
          {
              $this->_redirect->error('售后服务设置默认失败');
          }
      }
  }

    //ajax
    public function isName()
    {
        $this->_model->isName();
    }
}
