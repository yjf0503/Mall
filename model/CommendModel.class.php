<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/29
 * Time: 14:29
 */
//评价实体类
class CommendModel extends Model {
	public function __construct() {
		parent::__construct();
		$this->_fields = array( 'id','goods_id','order_id','star','attr','content','user','date');
		$this->_tables = array( DB_PREFIX . 'commend' );
		//$this->_check  = new BrandCheck();
		list( $this->_R['id'],
			$this->_R['goods_id'],
			$this->_R['goodsid'],
			$this->_R['order_id']) = $this->getRequest()->getParam( array(
			isset( $_GET['id'] ) ? $_GET['id'] : null,
			isset($_GET['goods_id'])?$_GET['goods_id']:null,
			isset($_GET['goodsid'])?$_GET['goodsid']:null,
			isset($_GET['order_id'])?$_GET['order_id']:null) );
	}



	public function findAll()
	{
		return parent::select(array('id','name','url','info'),array('limit'=>$this->_limit,'order'=>'reg_time DESC'));
	}

	public function findDetailsCommend()
	{
		$_where = array("goods_id='{$this->_R['goodsid']}'");
		return parent::select(array('content','star','date','user','attr'),array('where'=>$_where,'limit'=>$this->_limit,'order'=>'date DESC'));
	}

	public function total()
	{
		return parent::total();
	}

	public function findOne()
	{
		$_where = array("goods_id='{$this->_R['goods_id']}' AND order_id='{$this->_R['order_id']}'");
//		if(!$this->_check->oneCheck($this,$_where))
//		{
//			$this->_check->error();
//		}
		return parent::select(array('star','content'),array('where'=>$_where,'limit'=>'1'));
	}

	public function add()
	{
		//$_where = array("name='{$this->_R['name']}'");
		//if (!$this->_check->addCheck($this, $_where)) $this->_check->error();
		$_addData = $this->getRequest()->filter($this->_fields);
		$_addData['user'] = $_COOKIE['user'];
		$_addData['date'] = Tool::getDate();
		return parent::add($_addData);
	}


	public function delete()
	{
		$_where = array("id='{$this->_R['id']}'");
		return parent::delete($_where);
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

		return parent::update($_where,$_updateData);
	}

	public function isName()
	{
		$_where = array("name='{$this->_R['name']}'");
		$this->_check->ajax($this,$_where);
	}
}