<?php
/**
 * Created by PhpStorm.
 * User: jiefuyang
 * Date: 1/23/16
 * Time: 12:39 AM
 */

//收货人验证类
class AddressCheck extends Check
{
    //用户名不得包含指定的非法词组，敏感词
    //密码不能纯数字，纯字母，或者必须包含特殊字符，或者必须大小写混拼
    public function addCheck(&$_model,Array $_param)
    {
        if (self::isNullString($_POST['name']))
        {
            $this->_message[] = '收货人姓名不得为空！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_POST['name'], 2, 'min'))
        {
            $this->_message[] = '收货人姓名不得小于2位！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_POST['name'], 20, 'max'))
        {
            $this->_message[] = '收货人姓名不得大于20位！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['address']))
        {
            $this->_message[] = '收货人地址不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['email']))
        {
            $this->_message[] = '收货人电子邮件不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['code']))
        {
            $this->_message[] = '收货人邮编不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['tel']))
        {
            $this->_message[] = '收货人联系电话不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['buildings']))
        {
            $this->_message[] = '收货地标志性建筑不得为空！';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function updateCheck(Model &$_model)
    {
        if (self::checkStrLength($_POST['pass'], 6, 'min'))
        {
            $this->_message[] = '管理员密码不得小于6位！';
            $this->_flag = false;
        }
        if (!self::checkStrEquals($_POST['pass'], $_POST['notpass']))
        {
            $this->_message[] = '管理员密码和确认密码必须保持一致！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['level']))
        {
            $this->_message[] = '管理员等级权限必须选择！';
            $this->_flag = false;
        }

        return $this->_flag;
    }

    public function ajax(&$_model,Array $_param)
    {
        echo $_model->isOne($_param) ? 1 : 2;
    }

    public function ajaxLogin(&$_model,Array $_param)
    {
        echo !$_model->isOne($_param)? 1 : 2;
    }

    public function ajaxCode(&$_model,$_code)
    {
        echo !self::checkStrEquals(strtoupper($_SESSION['code']),strtoupper($_code))? 1 : 2;
    }

    public function loginCheck(&$_model,Array $_param)
    {
        if (self::isNullString($_POST['user']))
        {
            $this->_message[] = '管理员姓名不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['pass']))
        {
            $this->_message[] = '管理员密码不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_POST['code']))
        {
            $this->_message[] = '验证码不得为空！';
            $this->_flag = false;
        }
        if(!self::checkStrEquals(strtoupper($_SESSION['code']),strtoupper($_POST['code'])))
        {
            $this->_message[] = '验证码不正确！';
            $this->_flag = false;
        }
        if(!$_model->isOne($_param))
        {
            $this->_message[] = '用户名或密码不正确！';
            $this->_flag = false;
        }

        return $this->_flag;
    }

}