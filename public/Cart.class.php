<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/18
 * Time: 10:48
 */
//购物车类
class Cart{

	//获取购物车里的商品
	public function getProduct()
	{
		$_cartArr = array();
		if(isset($_COOKIE['cart']))
		{
			foreach($_COOKIE['cart'] as $_key=>$_value)
			{
				$_cartArr[$_key] = unserialize(stripslashes($_value));
			}
		}
		return $_cartArr;
	}
	//给购物车添加商品
	public function addProduct()
	{
		return setcookie('cart['.$_POST['id'].']',serialize(array(
								'id'=>$_POST['id'],
								'nav'=>$_POST['nav'],
								'name'=>$_POST['name'],
								'attr'=>$_POST['attr'],
								'num'=>$_POST['num'],
								'sn'=>$_POST['sn'],
								'weight'=>$_POST['weight'],
								'thumbnail2'=>$_POST['thumbnail2'],
								'price_sale'=>$_POST['price_sale']
		)),time()+60*60*24*7);
	}

	//从购物车里删除商品
	public function delProduct()
	{
		if(isset($_COOKIE['cart'][$_GET['id']]))
		{
			return setcookie('cart['.$_GET['id'].']','',time()-60*60*24*7);
		}
	}

	//清空购物车
	public function clearProduct()
	{
		if(isset($_COOKIE['cart']))
		{
			foreach($_COOKIE['cart'] as $_key=>$_value)
			{
				setcookie('cart['.$_key.']','',time()-60*60*24*7);
			}
		}
		return true;
	}

	//改变商品数量
	public function changeNum()
	{
		$_id = $_POST['id'];
		$_num = $_POST['num'];
		$_cartArr = array();
		if(isset($_COOKIE['cart'][$_id]))
		{
			$_cartArr = unserialize(stripslashes($_COOKIE['cart'][$_id]));
		}
		$_cartArr['num'] = $_num;
		return setcookie('cart['.$_POST['id'].']', serialize($_cartArr), time() + 60 * 60 * 24 * 7);	}
}