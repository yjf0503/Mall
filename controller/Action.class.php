<?php
/**
 * Created by PhpStorm.
 * User: Jiefu Yang
 * Date: 18/12/2015/018
 * Time: 7:05 PM
 */
class Action
{
    protected $_tpl = null;
    protected $_model = null;
    protected $_redirect = null;
    protected $_request = null;

    protected function __construct(&$_model = null)
    {
        $this->_model = $_model;
        $this->_tpl = TPL::getInstance();
        $this->_redirect = Redirect::getInstance($this->_tpl);
        $this->_request = Request::getInstance($this->_model);
    }

    protected function page($_total,$_pagesize = PAGE_SIZE)
    {
        $_page = new Page($_total,$_pagesize);
        $this->_model->setLimit($_page->getLimit());
        $this->_tpl->assign('page',$_page->showpage());
        $this->_tpl->assign('num',($_page->getPage()-1)*$_pagesize);
    }

    public function run()
    {
        $_m = isset($_GET['m'])?$_GET['m']:'index';
        method_exists($this,$_m)?eval('$this->'.$_m.'();'):$this->index();
    }
}