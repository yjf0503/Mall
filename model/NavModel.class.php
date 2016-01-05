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
        $this->_check = new NavCheck();
        list(
            $this->_R['id'],
            $this->_R['sid'],
            $this->_R['name'])
            =$this->getRequest()->getParam(array(
            isset($_GET['id'])?$_GET['id']:null,
            isset($_GET['sid'])?$_GET['sid']:0,
            isset($_POST['name'])?$_POST['name']:null
        ));
    }

    public function findAll()
    {
        $this->_tables = array(DB_PREFIX.'nav');
        return parent::select(array('id','info','name','sort'),
            array('where'=>array("sid='{$this->_R['sid']}'"),'limit'=>$this->_limit,'order'=>'sort ASC'));
    }

    public function findOne()
    {
      if(isset($_GET['sid']))
      {
          return parent::select(array('id','name','info'),
              array('where'=>array("id='{$this->_R['sid']}'"),'limit'=>'1'));
      }
        $_where = array("id='{$this->_R['id']}'");
        $this->getRequest()->one($_where);
        return parent::select(array('id','name','info'),
                              array('where'=>$_where,'limit'=>'1'));
    }

    public function add()
    {
        $_where = array("name='{$this->_R['name']}'");
        $_addData = $this->getRequest()->add($this->_fields,$_where);
        $_addData['sort'] = $this->nextId();
        return parent::add($_addData);
    }

    public function update()
    {
        $_where = array("id='{$this->_R['id']}'");
        $_updateData = $this->getRequest()->update($this->_fields,$_where);
        return parent::update($_where,$_updateData);
    }

    public function sort()
    {
        foreach($_POST['sort'] as $_key=>$_value)
        {
            if(!is_numeric($_value))
            {
                continue;
            }
            $_setField = array('sort'=>$_value);
            $_where = array("id='$_key'");
          parent::update($_where,$_setField);
        }
        return true;
    }

    public function delete()
    {
        $_where = array("id='{$this->_R['id']}'");
        return parent::delete($_where);
    }

    public function total()
    {
        return parent::total(array('where'=>array("sid='{$this->_R['sid']}'")));
    }

    public function isName()
    {
        $_where = array("name='{$this->_R['name']}'");
        $this->_check->ajax($this,$_where);
    }
}