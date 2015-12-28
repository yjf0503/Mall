<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 20/12/2015/020
 * Time: 12:18 PM
 */
class Validate{
    public static function isArray($_array)
    {
        return is_array($_array)?true:false;
    }

    public static function isNullArray($_array)
    {
        return count($_array)==0?true:false;
    }

    public static function inArray($_data,$_array)
    {
        return in_array($_data,$_array)?true:false;
    }

    public static function isNullString($_string)
    {
        return empty($_string)?true:false;
    }

    //判断字符串长度是否合法
    static public function checkStrLength($_string, $_length, $_flag, $_charset = 'utf-8')
    {
        if ($_flag == 'min')
        {
            if (mb_strlen(trim($_string), $_charset) < $_length)
            {
                return true;
            }
        }
        elseif ($_flag == 'max')
        {
            if (mb_strlen(trim($_string), $_charset) > $_length)
            {
                return true;
            }
        }
        elseif ($_flag == 'equals')
        {
            if (mb_strlen(trim($_string), $_charset) != $_length)
            {
                return true;
            }
        }
        return false;
    }

    //判断数据是否一致
    static public function checkStrEquals($_string, $_otherstring)
    {
        if (trim($_string) == trim($_otherstring)) return true;
        return false;
    }
}