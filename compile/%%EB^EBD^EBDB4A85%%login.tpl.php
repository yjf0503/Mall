<?php /* Smarty version 2.6.26, created on 2016-01-02 20:05:09
         compiled from admin/public/login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>在线商城后台登录</title>
    <link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
    <link rel="stylesheet" type="text/css" href="view/admin/style/login.css" />
</head>
<body>

<div id="login">
<form action="?a=admin&m=login">
    <dl>
        <dd>管理员姓名：<input type="text" name="user" class="text"/></dd>
        <dd>管理员密码：<input type="password" name="pass" class="text"/></dd>
        <dd>验   证   码：<input type="text" name="code" class="text"/></dd>
        <dd class="code"><img src="?a=index&m=validateCode" title="看不清？点击刷新" onclick="javascript:this.src='?a=index&m=validateCode&tm='+Math.random()"> </dd>
        <dd><input type="submit" class="submit" name="send" value="进入管理中心"/></dd>
    </dl>
</form>
    
</div>

</body>
</html>