<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 20/12/2015/020
 * Time: 5:06 PM
 */
class Check extends Validate{
    //判断验证是否通过,默认通过
    protected $_flag = true;
    //错误消息集
    protected $_message = array();
    //模板对象
    protected $_tpl = null;

    public function __construct()
    {
        $this->_tpl = TPL::getInstance();
    }

    public function setMessage($_message)
    {
        $this->_message[] = $_message;
    }

    //获取消息集
    public function getMessage()
    {
        return $this->_message;
    }

    public function oneCheck(&$_model,Array $_param)
    {
        if(!$_model->isOne($_param))
        {
            $this->_message[] = '找不到指定的数据';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function error($_url='')
    {
        if(empty($_url))
        {
            $this->_tpl->assign('message', $this->_message);
            $this->_tpl->assign('prev', Tool::getPrevPage());
            $this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
            exit();
        }
        else
        {
            Redirect::getInstance()->succ($_url);
        }

    }
}