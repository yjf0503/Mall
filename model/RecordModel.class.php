<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/10
 * Time: 14:29
 */
//品牌实体类
class RecordModel extends Model {
	public function __construct() {
		parent::__construct();
		$this->_fields = array( 'id','name','user','attr','date','num','goods_id');
		$this->_tables = array( DB_PREFIX . 'record' );
		//$this->_check  = new BrandCheck();
		list( $this->_R['id'],
			$this->_R['goodsid']) = $this->getRequest()->getParam(
			array(isset($_GET['id'])?$_GET['id']:null,
				isset($_GET['goodsid'])?$_GET['goodsid']:null));
	}

	public function findDetailsRecord()
	{
		return parent::select(array('id','name','user','attr','date','price','num'),array('where'=>array("goods_id='{$this->_R['goodsid']}'"),'limit'=>$this->_limit,'order'=>'date DESC'));
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