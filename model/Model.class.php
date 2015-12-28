<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 8:17 PM
 */
class Model extends DB
{
    protected $_db = null;
    protected $_fields = array();
    protected $_tables = array();
    protected $_check = null;
    protected $_request = null;
    protected $_limit = '';

    protected function __construct()
    {
        $this->_db = parent::getInstance($this->_tables);
        $this->_check = Factory::setCheck();
        $this->_request = Request::getInstance($this,$this->_check);
    }

    protected function add($_addData)
    {
        return $this->_db->add($_addData);
    }

    protected function delete($_deleteData)
    {
        return $this->_db->delete($_deleteData); // TODO: Change the autogenerated stub
    }

    protected function isOne($_isOneData)
    {
        return $this->_db->isOne($_isOneData);
    }

    protected function select($_field,$_param=array())
    {
        return $this->_db->select($_field,$_param); // TODO: Change the autogenerated stub
    }

    protected function total()
    {
        return $this->_db->total();
    }

    public function setLimit($_limit)
    {
        $this->_limit = $_limit;
    }
}