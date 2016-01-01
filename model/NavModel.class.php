<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:47
 */
//导航条实体类
class NavModel extends Model{
    private $_sid = 0;
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id','name','info','sort','sid');
        $this->_tables = array(DB_PREFIX.'nav');
        $this->_sid = isset($_GET['sid'])?Tool::setFormString($_GET['sid']):0;
    }

    public function findAll()
    {
        $this->_tables = array(DB_PREFIX.'nav');
        return parent::select(array('id','info','name','sort'),
            array('where'=>array('sid'=>$this->_sid),'limit'=>$this->_limit,'order'=>'sort ASC'));
    }

    public function findOne()
    {
      if(isset($_GET['sid']))
      {
          return parent::select(array('id','name','info'),
              array('where'=>array('id'=>$this->_sid),'limit'=>'1'));
      }
        $_oneData = $this->getRequest()->one($this->_fields);
        return parent::select(array('id','name','info'),
                              array('where'=>$_oneData,'limit'=>'1'));
    }

    public function add()
    {
        $_addData = $this->getRequest()->add($this->_fields);
        $_addData['sort'] = $this->nextId();
        return parent::add($_addData);
    }

    public function update()
    {
        $oneData = $this->getRequest()->one($this->_fields);
        $_updateData = $this->getRequest()->update($this->_fields);
        return parent::update($oneData,$_updateData);
    }

    public function sort()
    {
        foreach($_POST['sort'] as $_key=>$_value)
        {
            if(!is_numeric($_value))
            {
                continue;
            }
          parent::update(array('id'=>$_key),array('sort'=>$_value));
        }
        return true;
    }

    public function total()
    {
        return parent::total(array('where'=>array('sid'=>$this->_sid))); // TODO: Change the autogenerated stub
    }

    public function isName()
    {
        $this->_check->ajax($this);
    }
}