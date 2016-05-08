<?php
//smarty配置文件，样式替换
define('SMARTY_FRONT', 'default/');
define('SMARTY_ADMIN', 'admin/');
define('SMARTY_TEMPLATE_DIR', ROOT_PATH.'/view/');
define('SMARTY_COMPILE_DIR', ROOT_PATH.'/compile/');
define('SMARTY_CONFIG_DIR', ROOT_PATH.'/configs/');
define('SMARTY_CACHE_DIR', ROOT_PATH.'/cache/');
define('SMARTY_CACHING', 0);
define('SMARTY_CACHE_LIFETIME', 60*60*24);
define('SMARTY_LEFT_DELIMITER', '{');
define('SMARTY_RIGHT_DELIMITER', '}');

//设置数据库连接参数
define('DB_DNS','mysql:host=localhost;dbname=zjwdb_499066');
define('DB_USER','zjwdb_499066');
define('DB_PASS','0503Yang');
define('DB_CHARSET','UTF8');
define('DB_PREFIX','mall_');

//系统参数设置
define('PAGE_SIZE',10);
define('UPDIR','uploads/');
?>