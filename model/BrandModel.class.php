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
		list( $this->_R['id'],$this->_R['name']) = $this->getRequest()->getParam( array( isset( $_GET['id'] ) ? $_GET['id'] : null,isset( $_POST['name'] ) ? $_POST['name'] : null ) );
	}

	public function findGoodsBrand()
	{
		$this->_tables = array(DB_PREFIX.'nav' );
		$_oneBrand = parent::select(array('brand'),array('where'=>array("id='{$this->_R['id']}'")));
		if(Validate::isNullString($_oneBrand[0]->brand))
		{
			return '-1:其他品牌';
		}
		$_brandId = implode(',',unserialize(htmlspecialchars_decode($_oneBrand[0]->brand)));
		$this->_tables = array( DB_PREFIX . 'brand' );
		$_brand = parent::select(array('id','name'),array('where'=>array("id in ($_brandId)")));
		$_brandStr = '';
		foreach($_brand as $_key=>$_value)
		{
			$_brandStr .= $_value->id.':'.$_value->name.';';
		}
		$_brandStr = substr($_brandStr,0,-1);
		return $_brandStr;
	}

	public function findAll()
	{
		return parent::select(array('id','name','url','info'),array('limit'=>$this->_limit,'order'=>'reg_time DESC'));
	}

	public function findNavBrand()
	{
		return parent::select(array('id','name'));
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