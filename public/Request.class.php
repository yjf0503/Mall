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
    //验证对象
    private $_check = null;
    //模版对象
    private $_tpl = null;
    //实体对象
    private $_model = null;

    //公共静态方法获取实例化的对象
    static public function getInstance(&$_model, &$_check)
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self();
            self::$_instance->_model = $_model;
            self::$_instance->_check = $_check;
            self::$_instance->_tpl = TPL::getInstance();
        }
        return self::$_instance;
    }

    //私有克隆
    private function __clone() {}

    //私有构造
    private function __construct() {}

    //处理新增数据请求
    public function add($_fields)
    {
        $_addData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST))
        {
            //验证数据的合法性
            if (!$this->_check->addCheck($this->_model,$_POST))
            {
                $this->check();
            }
            //筛选准备入库的字段和数据
           $_addData = $this->selectData($_POST,$_fields);
        }
        return $_addData;
    }

    //处理修改数据请求
    public function update($_fields)
    {
        $_updateData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST))
        {
            //验证数据的合法性
            if (!$this->_check->updateCheck($this->_model,$_POST))
            {
                $this->check();
            }
            //筛选准备入库的字段和数据
            $_updateData = $this->selectData($_POST,$_fields);
        }
        return $_updateData;
    }

    public function delete($_fields)
    {
        $_deleteData = array();
        if(Validate::isArray($_GET) && !Validate::isNullArray($_GET))
        {
            //筛选准备入库的字段和数据
            $_deleteData = $this->selectData($_GET,$_fields);
            //验证数据的合法性
            if(!$this->_check->oneCheck($this->_model,$_deleteData))
            {
                $this->check();
            }
        }
        return $_deleteData;
    }

    //处理一条数据请求
    public function one($_fields)
    {
        $_oneData = array();
        if(Validate::isArray($_GET) && !Validate::isNullArray($_GET))
        {
            //筛选准备入库的字段和数据
            $_oneData = $this->selectData($_GET,$_fields);
            //验证数据合法性
            if(!$this->_check->oneCheck($this->_model,$_oneData))
            {
                $this->check();
            }
        }
        return $_oneData;
    }
    //筛选数据
    private function selectData($_requestData,$_fields)
    {
        $_selectData = array();
        foreach ($_requestData as $_key=>$_value)
        {
            if (Validate::inArray($_key, $_fields))
            {
                $_selectData[$_key] = $_value;
            }
        }
        return $_selectData;
    }

    private function check()
    {
        $this->_tpl->assign('message', $this->_check->getMessage());
        $this->_tpl->assign('prev', Tool::getPrevPage());
        $this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
        exit();
    }
}