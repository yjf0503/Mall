<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 13:16
 */
//自定义属性验证类
class PriceCheck extends Check
{
    public function addCheck(&$_model,Array $_param)
    {
        if (self::isNullString($_POST['price_left']))
        {
            $this->_message[] = '价格左区间不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['price_right']))
        {
            $this->_message[] = '价格右区间不得为空！';
            $this->_flag = false;
        }
        if(!self::isNumeric($_POST['price_left']))
        {
            $this->_message[] = '价格左区间必须为数字！';
            $this->_flag = false;
        }
        if(!self::isNumeric($_POST['price_right']))
        {
            $this->_message[] = '价格右区间必须为数字！';
            $this->_flag = false;
        }
        if($_POST['price_left'] >= $_POST['price_right'])
        {
            $this->_message[] = '价格左区间必须小于右区间！';
            $this->_flag = false;
        }
        if($_model->isOne($_param))
        {
            $this->_message[] = '此价格区间已存在';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function updateCheck(&$_model)
    {
        return $this->_flag;
    }

    public function ajax(&$_model,Array $_param)
    {
        echo $_model->isOne($_param)?1:2;
    }
}