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
		$this->_fields = array('id','nav','brand','service','name','keyword','sn','attr','price_sale','price_market','price_cost','unit','weight','thumbnail','content','is_up','is_freight','inventory','warn_inventory','date');
		$this->_tables = array( DB_PREFIX . 'goods' );
		$this->_check  = new GoodsCheck();
		list(
			$this->_R['id'],
			$this->_R['navid'],
			$this->_R['goodsid'],
			$this->_R['sn'],
			$this->_R['act'],
			$this->_R['price'],
			$this->_R['brand'],
			$this->_R['attr'])
				= $this->getRequest()->getParam( array(
				isset($_GET['id']) ? $_GET['id'] : null,
				isset($_GET['navid']) ? $_GET['navid'] : null,
				isset($_GET['goodsid']) ? $_GET['goodsid'] : null,
				isset($_POST['sn']) ? $_POST['sn'] : null,
				isset($_GET['act']) ? $_GET['act'] : null,
				isset($_GET['price']) ? $_GET['price'] : null,
				isset($_GET['brand']) ? $_GET['brand'] : null,
				isset($_GET['attr']) ? $_GET['attr'] : null
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
		return parent::select(array('id','service','name','sn','attr','price_sale','price_market','price_cost','keyword','unit','weight','thumbnail','content','is_up','is_freight','inventory','warn_inventory','nav','brand'),
			array('where'=>$_where, 'limit'=>'1'));
	}

	public function findDetailsGoods()
	{
		$_oneGoods = parent::select(array('id','brand','service','is_up','name','thumbnail','sn','attr','price_sale','price_market','unit','weight','content','is_freight','inventory'),array('where'=>array("id='{$this->_R['goodsid']}'")));
		$_oneGoods[0]->content = htmlspecialchars_decode($_oneGoods[0]->content);

		$this->_tables = array(DB_PREFIX.'brand');
		$_allBrand = Tool::setFormItem(parent::select(array('id','name')),'id','name');
		if($_oneGoods[0]->brand == 0)
		{
			$_oneGoods[0]->brandname = '其他品牌';
		}
		else
		{
			$_oneGoods[0]->brandname = $_allBrand[$_oneGoods[0]->brand];
		}

		$this->_tables = array( DB_PREFIX . 'service' );
		$_where = array("id='{$_oneGoods[0]->service}'");
		$_service = parent::select(array('content'),array('where'=>$_where,'limit'=>'1'));
		$_oneGoods[0]->service = htmlspecialchars_decode($_service[0]->content);
		$this->_tables = array( DB_PREFIX . 'goods' );
		return $_oneGoods;
	}

	public function findListGoods()
	{
		$_priceSQL = '';
		$_brandSQL = '';
		$_attrSQL = '';
		if ($this->_R['price'])
		{
			$_left = substr($this->_R['price'], 0, strpos($this->_R['price'], ','));
			$_right = substr($this->_R['price'], strpos($this->_R['price'], ',') + 1);
			$_priceSQL = "AND price_sale BETWEEN $_left AND $_right";
		}
		if ($this->_R['brand'])
		{
			if($this->_R['brand'] == 'other')
			{
				$_brand = 0;
			}
			else
			{
				$_brand = $this->_R['brand'];
			}
			$_brandSQL = "AND brand='$_brand'";
		}
		if($this->_R['attr'])
		{
			$_attr = explode(':',$this->_R['attr']);
			$_attrSQL = "AND attr LIKE '%$_attr[0]%$_attr[1]%'";
		}

		$_allGoods = parent::select(array('id','nav','name','price_sale','price_market','thumbnail','thumbnail2'),
			array('limit'=>$this->_limit,'where'=>array("nav in ({$this->getNavId()}) AND is_up=1 $_priceSQL $_brandSQL $_attrSQL"),'order'=>'date DESC'));
			foreach($_allGoods as $_value)
			{
				if(Validate::isNullString($_value->thumbnail2))
				{
					$_img = new Image($_value->thumbnail);
					$_img->thumb(220,220);
					$_img->out('220x220');
					$_value->thumbnail2 = $_img->getPath();
					parent::update(array("id='$_value->id'"), array('thumbnail2'=>$_img->getPath()));
				}
			}

		return $_allGoods;
	}

	public function total()
	{
		if(Validate::isNullString($this->_R['navid']))
		{
			return parent::total();
		}
		else
		{
			return parent::total(array('where'=>array('nav in('.$this->getNavId().')')));
		}

	}

	private function getNavId()
	{
		$this->_tables = array(DB_PREFIX.'nav');
		//商品副类id数组
		$_idArr = parent::select(array('id'),array('where'=>array("sid='{$this->_R['navid']}'")));
		$_id = '';

		//副类处理
		if(Validate::isNullArray($_idArr))
		{
			$_id = $this->_R['navid'];
		}
		//主类处理
		else
		{
			foreach($_idArr as $_key=>$_value)
			{
				$_id .= $_value->id.',';
			}
			$_id = substr($_id,0,-1);
		}
		$this->_tables = array(DB_PREFIX.'goods');

		return $_id;
	}

	public function isFlow()
	{
		$_goods = array();
		if(isset($_COOKIE['cart']))
		{
			foreach($_COOKIE['cart'] as $_key=>$_value)
			{
				$_temp = unserialize(stripslashes($_value));
				$_goods[$_key] = null;
				$_goods[$_key]->name = $_temp['name'];
				$_goods[$_key]->num = $_temp['num'];
			}
		}
		$_flag = false;
		foreach($_goods as $_key=>$_value)
		{
			$_where = array("id='{$_key}' AND inventory<{$_value->num}");
			if(!!$_obj=parent::select(array('id','inventory'), array('where'=>$_where, 'limit'=>'1')))
			{
				$this->_check->setMessage('您购买的“'.$_value->name.'”，超过了库存；您的购买量为：'.$_value->num.'，库存量为：'.$_obj[0]->inventory);
				$_flag = true;
			}
		}
		if($_flag)
		{
			$this->_check->error();
		}
		else
		{
			return true;
		}
	}

	public function setInventory()
	{
		$_goods = array();
		foreach($_COOKIE['cart'] as $_key=>$_value)
		{
			$_temp = unserialize(stripslashes($_value));
			$_goods[$_key] = null;
			$_goods[$_key]->num = $_temp['num'];
		}

		foreach($_goods as $_key=>$_value)
		{
			$_where =array("id='{$_key}'");
			parent::update($_where,array('inventory'=>array('inventory-'.$_value->num)));
		}
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

		$_attr = '';
		foreach($_addData['attr'] as $_key=>$_value)
		{
			$_attr .= $_key.':';
			foreach($_value as $_v)
			{
				$_attr .= $_v.'|';
			}
			$_attr = substr($_attr,0,-1).';';
		}
		$_attr = substr($_attr,0,-1);
		$_addData['attr'] = $_attr;
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
		$_updateData['thumbnail2'] = '';
		$_attr = '';
		foreach($_updateData['attr'] as $_key=>$_value)
		{
			$_attr .= $_key.':';
			foreach($_value as $_v)
			{
				$_attr .= $_v.'|';
			}
			$_attr = substr($_attr,0,-1).';';
		}
		$_attr = substr($_attr,0,-1);
		$_updateData['attr'] = $_attr;
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