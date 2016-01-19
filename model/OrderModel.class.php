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
        $this->_fields = array('id','user','name','email','tel','address','goods','buildings','code','delivery','pay','price','text','ps','orderNum');
        $this->_tables = array(DB_PREFIX.'order');
        //$this->_check = new ManageCheck();
        list($this->_R['id']
            ) = $this->getRequest()->getParam(array(
            isset($_GET['id'])?$_GET['id']:null));
    }

    public function order()
    {
        $_orderData = $this->getRequest()->filter($this->_fields);
        $_orderData['date'] = Tool::getDate();
        $_orderData['ordernum'] = Tool::getOrderNum();
        $_orderData['goods'] = serialize($_COOKIE['cart']);

        return parent::add($_orderData);
    }
}