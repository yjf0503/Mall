<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 13:16
 */
//导航验证类
class NavCheck extends Check
{
    public function addCheck(&$_model,$_requestData)
    {
        if (self::isNullString($_requestData['name']))
        {
            $this->_message[] = '导航名称不得为空！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['name'], 2, 'min'))
        {
            $this->_message[] = '导航名称不得小于2位！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['name'], 4, 'max'))
        {
            $this->_message[] = '导航名称不得大于4位！';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['info'], 200, 'max'))
        {
            $this->_message[] = '导航简介不得大于200位！';
            $this->_flag = false;
        }
        if($_model->isOne(array('name'=>$_requestData['name'])))
        {
            $this->_message[] = '导航名称被占用';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function updateCheck(&$_model,$_requestData)
    {
        if(self::checkStrLength($_requestData['info'],200,max))
        {
            $this->_message[] = '导航简介不得大于200位';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function ajax(&$_model)
    {
        echo $_model->isOne(array('name'=>$_POST['name']))?1:2;
    }
}