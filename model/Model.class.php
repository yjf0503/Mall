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
        $this->_db = parent::getInstance();
        $this->_check = Factory::setCheck();
    }

    protected function add($_addData)
    {
        return $this->_db->add($this->_tables,$_addData);
    }

    protected function update($_oneData,$_updateData)
    {
        return $this->_db->update($this->_tables,$_oneData,$_updateData);
    }

    protected function delete($_deleteData)
    {
        return $this->_db->delete($this->_tables,$_deleteData); // TODO: Change the autogenerated stub
    }

    protected function isOne($_OneData)
    {
        return $this->_db->isOne($this->_tables,$_OneData);
    }

    protected function select($_field,$_param=array())
    {
        return $this->_db->select($this->_tables,$_field,$_param); // TODO: Change the autogenerated stub
    }

    protected function total()
    {
        return $this->_db->total($this->_tables);
    }

    public function setLimit($_limit)
    {
        $this->_limit = $_limit;
    }
}