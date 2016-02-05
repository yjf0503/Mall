<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/10
 * Time: 14:29
 */
//收藏实体类
class CollectModel extends Model {
	public function __construct() {
		parent::__construct();
		$this->_fields = array( 'id','goods_id','user','date');
		$this->_tables = array( DB_PREFIX . 'collect' );
		$this->_check  = new CollectCheck();
		list( $this->_R['id'],$this->_R['name']) = $this->getRequest()->getParam( array( isset( $_GET['id'] ) ? $_GET['id'] : null,isset( $_POST['name'] ) ? $_POST['name'] : null ) );
	}

	public function findAll()
	{
		return parent::select(array('id','name','url','info'),array('limit'=>$this->_limit,'order'=>'reg_time DESC'));
	}

	public function total()
	{
		return parent::total();
	}

	public function findOne()
	{
		$_where = array("id='{$this->_R['id']}'");
		if(!$this->_check->oneCheck($this,$_where))
		{
			$this->_check->error();
		}
		return parent::select(array('id','name','url','info'),
			array('where'=>$_where,'limit'=>'1'));
	}

	public function add()
	{
		$_where = array("goods_id='{$this->_R['id']}'");
		if(!$this->_check->addCheck($this,$_where))
		{
			$this->_check->error();
		}
		$_addData = $this->getRequest()->filter($this->_fields);
		$_addData['date'] = Tool::getDate();
		$_addData['goods_id'] = $this->_R['id'];
		$_addData['user'] = $_COOKIE['user'];
		return parent::add($_addData);
	}

	public function delete()
	{
		$_where = array("goods_id='{$this->_R['id']}'");
		return parent::delete($_where);
	}
}