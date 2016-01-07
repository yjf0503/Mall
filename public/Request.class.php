<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 20/12/2015/020
 * Time: 12:05 PM
 */
class Request{
    //用于存放单例对象
    static private $_instance;

    //公共静态方法获取实例化的对象
    static public function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //私有克隆
    private function __clone() {}

    //私有构造
    private function __construct()
    {
       Tool::setRequest();
    }

    //获取新增和修改的字段
    public function filter(Array $_fields)
    {
        $_selectData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST))
        {
            //筛选准备入库的字段和数据
            foreach ($_POST as $_key=>$_value)
            {
                if (Validate::inArray($_key, $_fields))
                {
                    $_selectData[$_key] = $_value;
                }
            }
        }
        return $_selectData;
    }

    //获取参数处理
    public function getParam(Array $_param)
    {
        $_getParam = array();
        foreach($_param as $_key=>$_value)
        {
            if($_key == 'in')
            {
                $_value = str_replace(',',"','",$_value);
            }
            $_getParam[] = $_value;
        }
        return $_getParam;
    }
}