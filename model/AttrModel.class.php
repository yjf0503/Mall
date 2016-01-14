<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:47
 */
//自定义属性实体类
class AttrModel extends Model{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id','name','way','item','nav');
        $this->_tables = array(DB_PREFIX.'attr');
        $this->_check = new AttrCheck();
        list(
            $this->_R['id'],
            $this->_R['goodsid'],
            $this->_R['name'])
            =$this->getRequest()->getParam(array(
            isset($_GET['id'])?$_GET['id']:null,
            isset($_GET['goodsid'])?$_GET['goodsid']:null,
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
        $_allAttr = parent::select(array('id','item','name','nav'),array('limit'=>$this->_limit));

        $this->_tables = array(DB_PREFIX.'nav');
        $_allNav = Tool::setFormItem(parent::select(array('id','name'),array('where'=>array('sid<>0'))),'id','name');
       foreach($_allAttr as $_value)
       {
           if(!Validate::isNullString($_value->nav))
           {
               $_tmp = explode(',',$_value->nav);
               $_value->nav = '';
               foreach($_tmp as $_v)
               {
                   $_value->nav .= $_allNav[$_v].',';
               }
               $_value->nav = substr($_value->nav,0,-1);
           }
       }
        return $_allAttr;
    }

    public function findOne()
    {
        $_where = array("id='{$this->_R['id']}'");
        if(!$this->_check->oneCheck($this,$_where))
        {
            $this->_check->error();
        }
        $_oneAttr = parent::select(array('id','name','way','item','nav'),
                              array('where'=>$_where,'limit'=>'1'));
        foreach($_oneAttr as $_value)
        {
            $_value->nav = explode(',',$_value->nav);
        }
        return $_oneAttr;
    }

    public function findGoodsAttr()
    {
        $_allAttr = parent::select(array('name','item'),array('like'=>array('nav'=>$this->_R['id'])));

        $_allAttr = Tool::setFormItem($_allAttr,'name','item');
        $_goodsAttr = '';
        foreach($_allAttr as $_key=>$_value)
        {
            $_goodsAttr .= $_key.':'.$_value.';';
        }
        $_goodsAttr = substr($_goodsAttr,0,-1);
        return $_goodsAttr;
    }

    public function add()
    {
        $_where = array("name='{$this->_R['name']}'");
        if(!$this->_check->addCheck($this,$_where))
        {
            $this->_check->error();
        }
        $_addData = $this->getRequest()->filter($this->_fields);
        if(isset($_addData['nav']))
        {
            $_addData['nav'] = implode(',',$_addData['nav']);
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
        $_updateData['nav'] = implode(',',$_updateData['nav']);
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
        return parent::total();
    }

    public function getAttrType()
    {
        $this->_tables = array(DB_PREFIX.'goods');
        $_oneGoods = parent::select(array('attr'),array('where'=>array("id='{$this->_R['goodsid']}'")));
        $_attrTypeArr = explode(';',$_oneGoods[0]->attr);
        $_attrname = '';
        foreach($_attrTypeArr as $_value)
        {
            $_attrname .= mb_substr($_value,0,mb_strpos($_value,':',0,'utf-8'),'utf-8').',';
        }
        $_attrname = substr($_attrname,0,-1);
        $_attrname = str_replace(',',"','",$_attrname);
        $this->_tables = array(DB_PREFIX.'attr');
        $_attr = parent::select(array('way'),array('where'=>array("name in ('$_attrname')")));

        $_attrValue = '';
        foreach($_attr as $_value)
        {
            $_attrValue .= $_value->way.'|';
        }
        $_attrValue = substr($_attrValue,0,-1);
        return $_attrValue;
    }

    public function isName()
    {
        $_where = array("name='{$this->_R['name']}'");
        $this->_check->ajax($this,$_where);
    }
}