{*<script type="text/javascript" src="view/default/js/rewrite.js"></script>*}
<div id="header">
	<div class="top">
		{if $smarty.cookies.user}
			您好，{$smarty.cookies.user}，欢迎再次光临，<a href="?a=member">个人中心</a> | <a href="?a=cart">购物车</a> | <a href="?a=member&m=logout">退出</a>
		{else}
			<a href="?a=member&m=login"><img src="view/default/images/bnt_log.gif" alt="登录" /></a>
			<a href="?a=member&m=reg"><img src="view/default/images/bnt_reg.gif" alt="注册" /></a>
		{/if}
	</div>
</div>
<div id="nav">
	<ul>
		{if $smarty.get.navid}
			<li><a href="./">首页</a></li>
		{else}
			<li><a href="./" class="strong">首页</a></li>
		{/if}
		{foreach from=$FrontTenNav key=key item=value}
			{if $value->id == $FrontNav[0]->id}
				<li><a href="?a=list&navid={$value->id}" class="strong">{$value->name}</a></li>
			{else}
				<li><a href="?a=list&navid={$value->id}">{$value->name}</a></li>
			{/if}
		{/foreach}
	</ul>
</div>

<div id="search">
	<select name="type">
		<option>--所有类别--</option>
	</select>
	<input type="text" name="keyword" />
	<input type="submit" value="提交" onclick="javascript:alert('自行完成！')" />
	<a href="###">高级搜索</a>
</div>