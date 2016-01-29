<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 10:59 AM
 */
class TPL extends Smarty{

    //用于存放单例对象
    static private $_instance;

    //用于获取单例对象
    static public function getInstance()
    {
        if(!self::$_instance instanceof self)
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    //私有克隆
    private function __clone() {}

    private function __construct()
    {
        $this->setConfigs();
    }

    public function setConfigs()
    {
        //模板目录
        $this->template_dir = SMARTY_TEMPLATE_DIR;
        //编译目录
        $this->compile_dir = SMARTY_COMPILE_DIR;
        //配置变量目录
        $this->config_dir = SMARTY_CONFIG_DIR;
        //缓存目录
        $this->cache_dir = SMARTY_CACHE_DIR;
        //是否开启缓存，网站开发调试阶段，我们应该关闭缓存
        $this->caching = SMARTY_CACHING;
        //缓存的声明周期
        $this->cache_lifetime = SMARTY_CACHE_LIFETIME;
        //左定界符
        $this->left_delimiter = SMARTY_LEFT_DELIMITER;
        //右定界符
        $this->right_delimiter = SMARTY_RIGHT_DELIMITER;
    }
}