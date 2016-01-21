<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 19/12/2015/019
 * Time: 1:02 PM
 */
//订单实体类
class OrderModel extends Model{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id','user','name','email','tel','address','goods','buildings','code','delivery','pay','price','text','ps','orderNum','order_state','order_pay','order_delivery');
        $this->_tables = array(DB_PREFIX.'order');
        //$this->_check = new ManageCheck();
        list($this->_R['id'],
            $this->_R['out_trade_no']
            ) = $this->getRequest()->getParam(array(
            isset($_GET['id'])?$_GET['id']:null,
            isset($_GET['out_trade_no'])?$_GET['out_trade_no']:null));
    }

    public function findAll()
    {
        return parent::select(array('id','ordernum','date','price','order_state','order_pay','order_delivery'),array('limit'=>$this->_limit,'order'=>'date DESC'));

    }

    public function findUserAll()
    {
        return parent::select(array('id','ordernum','date','price','order_state','order_pay','order_delivery'),array('where'=>array("user='{$_COOKIE['user']}'"),'limit'=>$this->_limit,'order'=>'date DESC'));
    }

    public function order()
    {
        $_orderData = $this->getRequest()->filter($this->_fields);
        $_orderData['date'] = Tool::getDate();
        $_orderData['ordernum'] = Tool::getOrderNum();
        foreach($_COOKIE['cart'] as $_key=>$_value)
        {
            $_COOKIE['cart'][$_key] = stripslashes($_value);
        }
        $_orderData['goods'] = serialize($_COOKIE['cart']);

        return parent::add($_orderData);
    }

    public function update()
    {
        $_where = array("id='{$this->_R['id']}'");
        $_updateData = $this->getRequest()->filter($this->_fields);
        return parent::update($_where,$_updateData);
    }

    public function getNextId()
    {
        return parent::nextId();
    }

    public function delete()
    {
        $_where = array("id='{$this->_R['id']}'");
        return parent::delete($_where);
    }

    public function findUserDetails()
    {
        $_orderDetails = parent::select(array('id','ordernum','goods','delivery','pay','price','text','ps','order_state','order_pay','order_delivery'),array('where'=>array("id='{$this->_R['id']}'")));

        $_orderDetails[0]->goods = unserialize(htmlspecialchars_decode($_orderDetails[0]->goods));
        foreach($_orderDetails[0]->goods as $_key=>$_value)
        {
            $_orderDetails[0]->goods[$_key] = unserialize($_value);
        }
        return $_orderDetails;
    }

    public function updateOrderNum()
    {
        $_where = array("ordernum='{$this->_R['out_trade_no']}'");
        $_updateData = $this->getRequest()->filter($this->_fields);
        $_updateData['order_pay'] = '已付款';
        return parent::update($_where,$_updateData);
    }

    public function total()
    {
        if(isset($_COOKIE['user']) && $_GET['a'] == 'member' && $_GET['m'] == 'order')
        {
            return parent::total(array('where'=>array("user='{$_COOKIE['user']}'")));
        }
        else
        {
            return parent::total();
        }
    }
}