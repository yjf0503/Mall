<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 2015/12/30
 * Time: 12:43
 */
//模板编辑器控制器
class EditAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN.'edit/show.tpl');
    }

    public function dir()
    {
        if(isset($_GET['dir']))
        {
            $_dirPath = opendir(dirname(dirname(__FILE__)).'\view\\'.$_GET['dir'].'\\');
            $_dirName = '';
            $_dirArr = array();
            while($_dirName = readdir($_dirPath))
            {
                if($_dirName != '.' && $_dirName != '..' && $_dirName != 'images')
                {
                    $_dirArr[] = $_dirName;
                }
            }
            $this->_tpl->assign('DirArr',$_dirArr);
            $this->_tpl->display(SMARTY_ADMIN.'edit/dir.tpl');
        }
    }

    public function file()
    {
        if(isset($_GET['file']))
        {
            $_file = scandir(dirname(dirname(__FILE__)).'\view\\'.$_GET['dir'].'\\'.$_GET['file'].'\\');
        }
        $this->_tpl->assign('File',$_file);
        $this->_tpl->display(SMARTY_ADMIN.'edit/file.tpl');
    }

    public function add()
    {
        if(isset($_POST['send']))
        {
            $_path = dirname(dirname(__FILE__)).'\view\\'.$_GET['dir'].'\\'.$_GET['file'].'\\'.$_POST['name'];

            $_fp = fopen($_path,'wb');
            flock($_fp,LOCK_EX);

            $outputString = $_POST['info'];
            fwrite($_fp,$outputString,strlen($outputString));

            flock($_fp,LOCK_UN);
            fclose($_fp);

            $this->_redirect->succ('?a=edit&m=file&dir='.$_GET['dir'].'&file='.$_GET['file'],'文件新建成功');
        }
        if(isset($_GET['dir']) && isset($_GET['file']))
        {
            $this->_tpl->display(SMARTY_ADMIN.'edit/add.tpl');
        }
    }

    public function delete()
    {
        if(isset($_GET['dir']) && isset($_GET['file']) && isset($_GET['name']))
        {
            unlink( dirname( dirname( __FILE__ ) ) . '\view\\' . $_GET['dir'] . '\\' . $_GET['file'] . '\\' . $_GET['name'] );
            $this->_redirect->succ( '?a=edit&m=file&dir=' . $_GET['dir'] . '&file=' . $_GET['file'], '文件删除成功' );
        }
    }

    public function update()
    {
        if(isset($_POST['send']))
        {
            $_path = dirname(dirname(__FILE__)).'\view\\'.$_GET['dir'].'\\'.$_GET['file'].'\\'.$_POST['name'];

            $_fp = fopen($_path,'wb');
            flock($_fp,LOCK_EX);

            $outputString = $_POST['info'];
            fwrite($_fp,$outputString,strlen($outputString));

            flock($_fp,LOCK_UN);
            fclose($_fp);

            $this->_redirect->succ('?a=edit&m=file&dir='.$_GET['dir'].'&file='.$_GET['file'],'文件编辑成功');
        }

        if(isset($_GET['dir']) && isset($_GET['file']) && isset($_GET['name']))
        {
            $_path = dirname(dirname(__FILE__)).'\view\\'.$_GET['dir'].'\\'.$_GET['file'].'\\'.$_GET['name'];
            $_fp = fopen($_path,'r');
            flock($_fp,LOCK_EX);

            if(filesize($_path) == 0)
            {
                $this->_tpl->assign('content','');
            }
            else
            {
                $this->_tpl->assign('content',fread($_fp,filesize($_path)));
            }

            flock($_fp,LOCK_UN);
            fclose($_fp);
            $this->_tpl->display(SMARTY_ADMIN.'edit/update.tpl');
        }
    }
}
