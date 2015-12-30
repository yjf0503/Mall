<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/nav.css" />
</head>
<body>

<h2><a href="?a=nav">返回导航条列表</a>系统 -- 修改导航条</h2>

<form method="post" name="update" action="?a=nav&m=update">
    <input type="hidden" name="flag" id="flag" />
    <dl class="form">
        <dd>名    称：<input type="text" name="name" class="text" /> ( * 2-4位之间 )</dd>
        <dd>简    介：<textarea name="info"></textarea></dd>
        <dd><input type="submit" name="send" onclick="return updateNav();" value="修改导航" class="submit" /></dd>
    </dl>
</form>

</body>
</html>
