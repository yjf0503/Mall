<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/manage.css" />
</head>
<body>

<h2><a href="?a=manage">返回管理员列表</a>系统 -- 修改管理员</h2>

<form method="post" name="add" action="?a=manage&m=update">
    <input type="hidden" name="flag" id="flag" />
    <dl class="form">
        <dd>用 户 名：{$OneManage[0]->user}</dd>
        <dd>密　　码：<input type="password" name="pass" class="text" /> ( * 大于6位 )</dd>
        <dd>确认密码：<input type="password" name="notpass" class="text" /> ( * 同密码一致 )</dd>
        <dd>等　　级：<select name="level">
                <option value="0">--请选择一个等级权限--</option>
                    {if $OneManage[0]->level == 1}
                    <option value="1" selected="selected">超级管理员</option>
                    {else}
                    <option value="1">超级管理员</option>
                    {/if}

                {if $OneManage[0]->level == 2}
                    <option value="2" selected="selected">普通管理员</option>
                {else}
                <option value="2">普通管理员</option>
                {/if}

                {if $OneManage[0]->level == 3}
                    <option value="3" selected="selected">商品发布专员</option>
                {else}
                    <option value="3">商品发布专员</option>
                {/if}

                {if $OneManage[0]->level == 4}
                    <option value="4" selected="selected">订单处理专员</option>
                {else}
                    <option value="4">订单处理专员</option>
                {/if}

            </select> ( * 必须选定一个权限 )</dd>
        <dd><input type="submit" name="send" onclick="return updateManage();" value="修改管理员" class="submit" /></dd>
    </dl>
</form>
