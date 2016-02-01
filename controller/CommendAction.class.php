<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//评价控制器
class CommendAction extends Action
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
        $this->_tpl->assign('AllCommend', $this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN.'commend/show.tpl');
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
                $this->_redirect->succ(Tool::getPrevPage(),'评价修改成功');
            }
            else
            {
                $this->_redirect->error('评价修改失败');
            }
        }
        if(isset($_GET['id']))
        {
            $_OneCommend = $this->_model->findUpdateOne();
            $this->_tpl->assign('OneCommend',$_OneCommend);
            $this->_tpl->assign('star',array(5=>'★★★★★',
                                             4=>'★★★★',
                                             3=>'★★★',
                                             2=>'★★',
                                             1=>'★'));
            $this->_tpl->assign('star_checked',$_OneCommend[0]->star);
            $this->_tpl->display(SMARTY_ADMIN.'commend/update.tpl');

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
