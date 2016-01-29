<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/24
 * Time: 19:49
 */
class Redirect
{
    private static $_instance = null;

    private $_tpl = null;

    public static function getInstance(TPL &$_tpl=null)
    {
        if(!self::$_instance instanceof Redirect)
        {
            self::$_instance = new self();
            self::$_instance->_tpl = $_tpl;
        }

        return self::$_instance;
    }

    //私有克隆
    private function __clone() {}

    //私有构造
    private function __construct() {}

    //成功跳转
    public function succ($_url,$_info = '')
    {
        if(!empty($_info))
        {
            //如果新增成功，跳转到成功提示页，并且再跳转到指定的页面
            $this->_tpl->assign('message',$_info);
            $this->_tpl->assign('url',$_url);
            $this->_tpl->display(SMARTY_ADMIN.'public/succ.tpl');
        }
        else
        {
            header('Location:'.$_url);
        }

        exit();
    }

    //失败返回
    public function error($_info)
    {
        //如果新增失败，跳转到失败的页面，并提供返回按钮
        $this->_tpl->assign('message',$_info);
        $this->_tpl->assign('prev',Tool::getPrevPage());
        $this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
        exit();
    }
}