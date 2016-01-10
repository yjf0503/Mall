<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/10
 * Time: 14:29
 */
//品牌尸体类
class BrandModel extends Model {
	public function __construct() {
		parent::__construct();
		$this->_fields = array( 'id','name','info','url','reg_time');
		$this->_tables = array( DB_PREFIX . 'brand' );
		$this->_check  = new BrandCheck();
		list( $this->_R['id'],$this->_R['name']) = $this->getRequest()->getParam( array( isset( $_POST['id'] ) ? $_GET['id'] : null,isset( $_POST['name'] ) ? $_POST['name'] : null ) );
	}

	public function findAll()
	{
		return parent::select(array('id','name','url','info'),array('order'=>'reg_time DESC'));
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
		$_where = array("name='{$this->_R['name']}'");
		if(!$this->_check->addCheck($this,$_where))
		{
			$this->_check->error();
		}
		$_addData = $this->getRequest()->filter($this->_fields);
		$_addData['reg_time'] = Tool::getDate();

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