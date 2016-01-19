<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 20/12/2015/020
 * Time: 12:40 PM
 */
class Tool{
    //获取客户端IP
    static public function getIP()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    //获取当前时间
    static public function getDate()
    {
        date_default_timezone_set('Asia/Shanghai');
        return date('Y-m-d H:i:s');
    }

    //以时间生成订单号
    static public function getOrderNum()
    {
        return date('YmdHis'.mt_rand(1,99999));
    }

    //获取地址
    static public function getUrl()
    {
        $_url = $_SERVER["REQUEST_URI"];
        $_par = parse_url($_url);
        if (isset($_par['query']))
        {
            parse_str($_par['query'],$_query);
            $_url = $_par['path'].'?'.http_build_query($_query);
        }
        return $_url;
    }

    //表单提交字符转义
    static public function setFormString($_string)
    {
        if(!get_magic_quotes_gpc())
        {
            if(Validate::isArray($_string))
            {
                foreach($_string as $_key => $_value)
                {
                    $_string[$_key] = self::setFormString($_value);
                }
            }
            else
            {
                return addslashes($_string);
            }
        }
        return $_string;
    }

    //显示html过滤
    static public function setHtmlString($_data)
    {
        $_string = null;
        if(Validate::isArray($_data))
        {
            if(Validate::isNullArray($_data))
            {
                return $_data;
            }
            foreach($_data as $_key=>$_value)
            {
                $_string[$_key] = self::setHtmlString($_value);
            }
        }
        elseif(is_object($_data))
        {
            foreach($_data as $_key=>$_value)
            {
                $_string->$_key = self::setHtmlString($_value);
            }
        }
        else
        {
            $_string = htmlspecialchars($_data);
        }
        return $_string;
    }

    //表单选项转换
    static public function setFormItem($_data,$_key,$_value)
    {
        $_items = array();
        if(Validate::isArray($_data))
        {
            foreach($_data as $_v)
            {
                $_items[$_v->$_key] = $_v->$_value;
            }
        }
        return $_items;
    }

    //得到上一页
    static public function getPrevPage()
    {
        if(empty($_SERVER['HTTP_REFERER']))
        {
            return '###';
        }
        else
        {
            return $_SERVER["HTTP_REFERER"];
        }
    }

    //过滤
    public static function setRequest()
    {
        if(isset($_GET))
        {
            $_GET = Tool::setFormString($_GET);
        }
        if(isset($_POST))
        {
            $_POST = Tool::setFormString($_POST);
        }
    }
}