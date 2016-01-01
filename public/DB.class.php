<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 8:04 PM
 */
class DB
{
    //PDO对象
    private $_pdo;
    //用于存放单例对象
    static private $_instance;

    //用于获取单例对象
    static protected function getInstance()
    {
        if(!self::$_instance instanceof self)
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
        try
        {
            $this->_pdo = new PDO(DB_DNS, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES '.DB_CHARSET));
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            exit($e->getMessage());
        }
    }

    //新增
    protected function add($_tables,$_addData)
    {
        $_addData = Tool::setFormString($_addData);
        $_addFields = array();
        $_addValues = array();
        foreach ($_addData as $_key=>$_value)
        {
            $_addFields[] = $_key;
            $_addValues[] = $_value;
        }
        $_addFields = implode(',', $_addFields);
        $_addValues = implode("','", $_addValues);
        $_sql = "INSERT INTO $_tables[0] ($_addFields) VALUES ('$_addValues')";
        return $this->execute($_sql)->rowCount();
    }

    //修改
    protected function update($_tables,$_oneData,$_updateData)
    {
        $_isAnd = '';
        foreach($_oneData as $_key=>$_value)
        {
            $_isAnd .= "$_key='$_value' AND ";
        }
        $_isAnd = substr($_isAnd,0,-4);

        $_setData = '';
        foreach($_updateData as $_key=>$_value)
        {
            $_setData .= "$_key='$_value',";
        }
        $_setData = substr($_setData,0,-1);
        $_sql = "UPDATE $_tables[0] SET $_setData WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();
    }

    //删除
    protected function delete($_tables,$_deleteData)
    {
        $_isAnd = '';
        foreach ($_deleteData as $_key=>$_value)
        {
            $_isAnd .= "$_key='$_value' AND ";
        }
        $_isAnd = substr($_isAnd, 0, -4);
        $_sql = "DELETE FROM $_tables[0] WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();
    }

    //查询
    protected function select($_tables,$_field,$_param=array())
    {
        $_limit = '';
        $_order = '';
        $_where = '';
        if(Validate::isArray($_param) && !Validate::isNullArray($_param))
        {
            $_limit = isset($_param['limit'])?'LIMIT '.$_param['limit']:'';
            $_order = isset($_param['order'])?'ORDER BY '.$_param['order']:'';
            $_where = '';
            if(isset($_param['where']) && Validate::isArray($_param['where']))
            {
                $_isAnd = '';
                foreach ($_param['where'] as $_key=>$_value)
                {
                    $_isAnd .= "$_key='$_value' AND ";
                }
                $_where = 'WHERE '.substr($_isAnd, 0, -4);
            }
            elseif(isset($_param['where']))
            {
                $_where = 'WHERE '.$_param['where'];
            }
        }
        $_selectFields = implode(',',$_field);
        $_table = isset($_tables[1])?$_tables[0].','.$_tables[1]:$_tables[0];
        $_sql = "SELECT $_selectFields FROM $_table $_where $_order $_limit";
        $_stmt = $this->execute($_sql);
        $_result = array();
        while(!!$_objs = $_stmt->fetchObject())
        {
            $_result[] = $_objs;
        }
        return Tool::setHtmlString($_result);
    }

    //验证一条数据
    protected function isOne($_tables,$_oneData)
    {
        $_isAnd = '';
        foreach ($_oneData as $_key=>$_value)
        {
            $_isAnd .= "$_key='$_value' AND ";
        }
        $_isAnd = substr($_isAnd, 0, -4);
        $_sql = "SELECT id FROM $_tables[0] WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();
    }

    //总记录
    protected function total($_tables,$_param = array())
    {
        $_where = '';
        if(isset($_param['where']))
        {
            foreach ($_param['where'] as $_key=>$_value)
            {
                $_where .= "$_key='$_value' AND ";
            }
            $_where = 'WHERE '.substr($_where, 0, -4);
        }

        $_sql = "SELECT COUNT(*) as count FROM $_tables[0] $_where";
        $_stmt = $this->execute($_sql);
        return $_stmt->fetchObject()->count;
    }

    //得到下一个id
    protected function nextId($_tables)
    {
        $_sql = "SHOW TABLE STATUS LIKE '$_tables[0]'";
        $_stmt = $this->execute($_sql);
        return $_stmt->fetchObject()->Auto_increment;

    }

    //执行sql并返回句柄
    private function execute($_sql)
    {
        $_stmt = $this->_pdo->prepare($_sql);
        $_stmt->execute();
        return $_stmt;
    }
}