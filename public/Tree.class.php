<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2016/1/8
 * Time: 18:55
 */

//二级树形结构
class Tree{
	static private $_instance = null;

	static public function getInstance()
	{
		if(!(self::$_instance instanceof self))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	//私有克隆
	private function __clone() {}

	//私有构造
	private function __construct() {}

	//得到二级树形结构
	public function getTree(Array $_all,$_id)
	{
		//得到所有的数据必须遵循以下格式：
		//索引字段必须是id，如果不是，可以使用别名
		//主类和子类区分用的字段：sid，如果不是，可以用别名
		//类别名称必须使用name，如果不是，可以用别名
		$_resultNav = $_mainNav = $_childNav = array();
		foreach($_all as $_key=>$_value)
		{
			if($_value->sid == 0)
			{
				$_mainNav[] = $_value;
			}
			else
			{
				$_childNav[] = $_value;
			}

			if($_value->id == $_id)
			{
				$_resultNav[0] = $_value;
				$_resultNav[0]->site[$_resultNav[0]->id] = $_resultNav[0]->name;
			}

			if($_value->sid == $_id)
			{
				$_resultNav[0]->child[] = $_value;
			}
		}
		if($_resultNav[0]->sid != 0)
		{
			foreach($_mainNav as $_key=>$_value)
			{
				if($_resultNav[0]->sid == $_value->id)
				{
					$_child = $_resultNav;
					$_resultNav[0] = $_value;
					$_resultNav[0]->site[$_resultNav[0]->id] = $_resultNav[0]->name;
					$_resultNav[0]->site[$_child[0]->id] = $_child[0]->name;
				}
			}
			foreach($_childNav as $_key=>$_value)
			{
				if($_resultNav[0]->id == $_value->sid)
				{
					$_resultNav[0]->child[] = $_value;
				}
			}
		}
		return $_resultNav;
	}
}