<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/11
 * Time: 14:53
 */
//商品实体类
class GoodsModel extends Model {
	public function __construct()
	{
		parent::__construct();
		$this->_fields = array('id','nav','brand','name','keyword','sn','price_sale','price_market','price_cost','unit','weight','thumbnail','content','is_up','is_freight','inventory','warn_inventory','date');
		$this->_tables = array( DB_PREFIX . 'goods' );
		$this->_check  = new GoodsCheck();
		list(
			$this->_R['id'],
			$this->_R['sn'],
			$this->_R['act'])
				= $this->getRequest()->getParam( array(
				isset($_GET['id']) ? $_GET['id'] : null,
				isset($_POST['sn']) ? $_POST['sn'] : null,
				isset($_GET['act']) ? $_GET['act'] : null
		) );
	}

	public function findAll()
	{
		$this->_tables = array(DB_PREFIX.'goods a',DB_PREFIX.'nav b');
		$_allGoods = parent::select(array('a.id','a.name','a.brand','a.price_sale','a.sn','a.is_up','a.inventory','b.name as nav_name'),array('where'=>array('a.nav=b.id'),'limit'=>$this->_limit,'order'=>'date DESC'));

		$this->_tables = array(DB_PREFIX.'brand');
		$_allBrand = Tool::setFormItem(parent::select(array('id','name')),'id','name');
		foreach($_allGoods as $_key=>$_value)
		{
			if($_value->brand == 0)
			{
				$_value->brand = '其他品牌';
			}
			else
			{
				$_value->brand = $_allBrand[$_value->brand];
			}
		}
		return $_allGoods;
	}

	public function findOne()
	{
		$_where = array("id='{$this->_R['id']}'");
		if(!$this->_check->oneCheck($this,$_where))
		{
			$this->_check->error();
		}
		return parent::select(array('id','name','sn','price_sale','price_market','price_cost','keyword','unit','weight','thumbnail','content','is_up','is_freight','inventory','warn_inventory','nav','brand'),
			array('where'=>$_where, 'limit'=>'1'));
	}

	public function total( Array $_param = array() )
	{
		return parent::total();
	}

	public function add()
	{
		$_where = array("sn='{$this->_R['sn']}'");
		if(!$this->_check->addCheck($this,$_where))
		{
			$this->_check->error();
		}
		$_addData = $this->getRequest()->filter($this->_fields);
		$_addData['date'] = Tool::getDate();

		return parent::add($_addData);
	}

	public function update()
	{
		$_where = array("id='{$this->_R['id']}'");
		if(!$this->_check->oneCheck($this,$_where))
		{
			$this->_check->error();
		}
		if(!$this->_check->updateCheck($this,array("id<>'{$this->_R['id']}'","sn='{$this->_R['sn']}'")))
		{
			$this->_check->error();
		}
		$_updateData = $this->getRequest()->filter($this->_fields);
		return parent::update($_where,$_updateData);
	}

	public function delete()
	{
		$_where = array("id='{$this->_R['id']}'");
		return parent::delete($_where);
	}

	public function isSn()
	{
		$_where = array("sn='{$this->_R['sn']}'");
		$this->_check->ajax($this,$_where);
	}

	public function isUpdateSn()
	{
		$_where = array("id<>'{$this->_R['id']}'","sn='{$this->_R['sn']}'");
		$this->_check->ajax($this,$_where);
	}

	public function isUp()
	{
		if(!Validate::isNullString($this->_R['id']) && !Validate::isNullString($this->_R['act']));
		{
			if($this->_R['act'] == 'up')
			{
				return parent::update(array("id='{$this->_R['id']}'"),array('is_up'=>'1'));
			}
			elseif($this->_R['act'] == 'down')
			{
				return parent::update(array("id='{$this->_R['id']}'"),array('is_up'=>'0'));
			}
		}
	}
}