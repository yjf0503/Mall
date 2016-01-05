<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 20/12/2015/020
 * Time: 5:09 PM
 */
//管理员验证类
class ManageCheck extends Check
{
    //用户名不得包含指定的非法词组，敏感词
    //密码不能纯数字，纯字母，或者必须包含特殊字符，或者必须大小写混拼
    public function addCheck(&$_model,Array $_requestData, Array $_param)
    {
        if (self::isNullString($_requestData['user']))
        {
            $this->_message[] = '管理员用户名不得为空！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['user'], 2, 'min'))
        {
            $this->_message[] = '管理员用户名不得小于2位！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['user'], 20, 'max'))
        {
            $this->_message[] = '管理员用户名不得大于20位！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['pass'], 6, 'min'))
        {
            $this->_message[] = '管理员密码不得小于6位！';
            $this->_flag = false;
        }
        if (!self::checkStrEquals($_requestData['pass'], $_requestData['notpass']))
        {
            $this->_message[] = '管理员密码和确认密码必须保持一致！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['level']))
        {
            $this->_message[] = '管理员等级权限必须选择！';
            $this->_flag = false;
        }
        if ($_model->isOne($_param))
        {
            $this->_message[] = '管理员用户名被占用！';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function updateCheck(Model &$_model, Array $_requestData)
    {
        if (self::checkStrLength($_requestData['pass'], 6, 'min'))
        {
            $this->_message[] = '管理员密码不得小于6位！';
            $this->_flag = false;
        }
        if (!self::checkStrEquals($_requestData['pass'], $_requestData['notpass']))
        {
            $this->_message[] = '管理员密码和确认密码必须保持一致！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['level']))
        {
            $this->_message[] = '管理员等级权限必须选择！';
            $this->_flag = false;
        }

        return$this->_flag;
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

    public function loginCheck(&$_model,Array $_requestData,Array $_param)
    {
        if (self::isNullString($_requestData['user']))
        {
            $this->_message[] = '管理员姓名不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['pass']))
        {
            $this->_message[] = '管理员密码不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['code']))
        {
            $this->_message[] = '验证码不得为空！';
            $this->_flag = false;
        }
        if(!self::checkStrEquals(strtoupper($_SESSION['code']),strtoupper($_requestData['code'])))
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