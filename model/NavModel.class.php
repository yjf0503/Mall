<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:47
 */
//导航条实体类
class NavModel extends Model{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id','name','info','sort','sid');
        $this->_tables = array(DB_PREFIX.'nav');
    }

    public function add()
    {
        $_addData = $this->getRequest()->add($this->_fields);
        $_addData['sort'] = $this->nextId();
        return parent::add($_addData);
    }

}