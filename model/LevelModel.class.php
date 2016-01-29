<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/29
 * Time: 19:53
 */
//等级实体类
class LevelModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id', 'level_name');
        $this->_tables = array(DB_PREFIX . 'level');
    }

    public function findAll()
    {
        return parent::select(array('id','level_name'));
    }
}
