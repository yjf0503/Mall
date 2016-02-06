<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//图片控制器
class PicAction extends Action
{
    private $_goods = null;
    public function __construct()
    {
        parent::__construct();
        $this->_goods = new GoodsModel();
    }

    public function index()
    {
        $_dirPath = opendir(dirname(dirname(__FILE__)).'\uploads\\');
        $_dirName = '';
        $_dirArr = array();
        while($_dirName = readdir($_dirPath))
        {
            if($_dirName != '.' && $_dirName != '..')
            {
                $_dirArr[count(scandir(dirname(dirname(__FILE__)).'\uploads\\'.$_dirName.'\\')) - 2]  = $_dirName;
            }
        }
        $this->_tpl->assign('DirArr',$_dirArr);
        $this->_tpl->display(SMARTY_ADMIN.'pic/show.tpl');
    }

    public function file()
    {
        if(isset($_GET['file']))
        {
            $_file = scandir(dirname(dirname(__FILE__)).'\uploads\\'.$_GET['file'].'\\');
            $this->_tpl->assign('File', $this->_goods->fileGoods($_file));
            $this->_tpl->display(SMARTY_ADMIN.'pic/file.tpl');
        }
    }
}
