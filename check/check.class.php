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

    //获取消息集
    public function getMessage()
    {
        return $this->_message;
    }
}