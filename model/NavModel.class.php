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
        $this->_fields = array('id','name','info','sort','sid','brand');
        $this->_tables = array(DB_PREFIX.'nav');
        $this->_check = new NavCheck();
        list(
            $this->_R['id'],
            $this->_R['navid'],
            $this->_R['sid'],
            $this->_R['name'])
            =$this->getRequest()->getParam(array(
            isset($_GET['id'])?$_GET['id']:null,
            isset($_GET['navid'])?$_GET['navid']:null,
            isset($_GET['sid'])?$_GET['sid']:0,
            isset($_POST['name'])?$_POST['name']:null
        ));
    }

    public function findUpdateBrand()
    {
        $_oneBrand = parent::select(array('brand'),array('where'=>array("id='{$this->_R['id']}'")));
        return unserialize(htmlspecialchars_decode($_oneBrand[0]->brand));
    }

    public function findAddGoodsNav()
    {
        $_allNav = parent::select(array('id','name','sid'),
                                  array('order'=>'sort ASC'));
        $_mainNav =  $_childNav = array();
        foreach($_allNav as $_key=>$_value)
        {
            if($_value->sid == 0)
            {
                $_mainNav[] = $_value;
            }
            else
            {
                $_childNav[] = $_value;
            }
        }

        foreach($_mainNav as $_key =>$_value)
        {
            foreach($_childNav as $_k=>$_v)
            {
                if($_value->id == $_v->sid)
                {
                    $_value->child[$_v->id] = $_v->name;
                }
            }
        }

        return $_mainNav;
    }

    public function findFrontNav()
    {
        $_where = array("id='{$this->_R['navid']}'");
       if(!$this->_check->oneCheck($this,$_where))
       {
           $this->_check->error('./');
       }
        $_allNav = parent::select(array('id','name','sid'));
        return Tree::getInstance()->getTree($_allNav,$this->_R['navid']);

    }

    public function findFrontTenNav()
    {
        return parent::select(array('id','name'),
                               array('where'=>array('sid=0'),'limit'=>'10','order'=>'sort ASC'));
    }

    public function findAll()
    {
        $_allNav = parent::select(array('id','info','name','sort','brand'),
            array('where'=>array("sid='{$this->_R['sid']}'"),'limit'=>$this->_limit,'order'=>'sort ASC'));
        $this->_tables = array(DB_PREFIX.'brand');
        $_allBrand = Tool::setFormItem(parent::select(array('id','name')),'id','name');
        foreach($_allNav as $_key=>$_value)
        {
            if(Validate::isNullString($_value->brand))
            {
                $_value->brand = '其他品牌';
            }
            else
            {
                $_tempArr = unserialize(htmlspecialchars_decode($_value->brand));
                $_value->brand = '';
                foreach($_tempArr as $_k=>$_v)
                {
                    $_value->brand .= $_allBrand[$_v].',';
                }
                $_value->brand = substr($_value->brand,0,-1);
            }
        }
        return $_allNav;
    }

    public function findOne()
    {
      if(isset($_GET['sid']))
      {
          return parent::select(array('id','name','info'),
              array('where'=>array("id='{$this->_R['sid']}'"),'limit'=>'1'));
      }
        $_where = array("id='{$this->_R['id']}'");
        if(!$this->_check->oneCheck($this,$_where))
        {
            $this->_check->error();
        }
        return parent::select(array('id','name','info','sid'),
                              array('where'=>$_where,'limit'=>'1'));
    }

    public function add()
    {
        $_where = array("name='{$this->_R['name']}'");
        if(!$this->_check->addCheck($this,$_where))
        {
            $this->_check->error();
        }
        $_addData = $this->getRequest()->filter($this->_fields);
        $_addData['sort'] = $this->nextId();
        if(isset($_addData['brand']))
        {
            $_addData['brand'] = serialize($_addData['brand']);
        }
        return parent::add($_addData);
    }

    public function update()
    {
        $_where = array("id='{$this->_R['id']}'");
        if(!$this->_check->oneCheck($this,$_where))
        {
            $this->_check->error();
        }
        if(!$this->_check->updateCheck($this))
        {
            $this->_check->error();
        }
        $_updateData = $this->getRequest()->filter($this->_fields);
        if(isset($_updateData['brand']))
        {
            $_updateData['brand'] = serialize($_updateData['brand']);
        }
        else
        {
            $_updateData['brand'] = '';
        }
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